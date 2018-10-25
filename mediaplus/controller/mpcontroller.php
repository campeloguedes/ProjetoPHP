<?php 
	
	@header("Content-Type: text/html; charset=ISO-8859-1",true);

	if(isset($_POST['acao'])){
		//salvar
		//listarTodos
		//listarPorId
		//excluir
		
		/*
		 * TIPOS DE RESPOSTA
		 * 0 - erro
		 * 1 - ok e reset
		 * 2 - ok e no reset
		 * 
		 * */
		
		  $acao = $_POST['acao'];
		  $classe = $_POST['classe'];
		  $objeto = $_POST['objeto'];
		  
		  
		  require("controller/".$classe.".class.php");
		  
		  
		    if($acao == "salvar"){
		  	  
		  	  $obj = $class = new ReflectionClass($objeto);
		  	   foreach($class->getProperties() as $prop){
		  	  		if(isset($_POST[$prop->getName()])){
		  	  			$prop->setValue($obj, utf8_decode($_POST[$prop->getName()]));	 	
		  	  		}else{
		  	  		  if(ucwords($prop->getName()) == $prop->getName()){	///////// aqui 
		  	  			require("controller/".$prop->getName()."Controller.class.php");
		  	  			$obj2 = $class2 = new ReflectionClass($prop->getName());
		  	  			$contAux = 0;
		  	  			foreach($class2->getProperties() as $prop2){
		  	  				if(isset($_POST[strtolower($prop->getName())."_".$prop2->getName()])){	
		  	  					$contAux++;
		  	  					$prop2->setValue($obj2, addslashes(utf8_decode($_POST[strtolower($prop->getName())."_".$prop2->getName()])));
		  	  				}else{
		  	  				  if(ucwords($prop2->getName()) == $prop2->getName()){	
				  	  			//require("/model/".$prop2->getName().".class.php");
				  	  			$obj3 = $class3 = new ReflectionClass($prop2->getName());
				  	  			foreach($class3->getProperties() as $prop3){
				  	  				if(isset($_POST[strtolower($prop2->getName())."_".$prop3->getName()])){	
				  	  					$prop3->setValue($obj3, addslashes(utf8_decode($_POST[strtolower($prop2->getName())."_".$prop3->getName()])));
				  	  				}	
				  	  			}	
				  	  		  
				  	  		    $prop2->setValue($obj2, $obj3);	
				  	  		    
		  	  				  }/**/else{//aqui foi alterado por mmff 16/12/09
				  	  				$prop2->setValue($obj2, null);
				  	  		    }//ate aqui -- apenas retirar esta parte em caso de problema.
				  	  		   
		  	  				 } //fim else	
		  	  			}
		  	  			
		  	  			if($contAux > 1){
		  	  				
			  	  			$class2 = new ReflectionClass($prop->getName()."Controller");
			  	  		    $action2 = $class2->getMethod($acao);
				   			//echo $obj2->getProperty("idperfil")->getValue($obj2)." <---- <br/><br/>";
				   			$strResposta = $action2->invoke($class2->newInstance(), $obj2);
					   		if($strResposta != 0){	
					   			$arrResposta = explode('*',$strResposta);
					   			$resposta = $arrResposta[0];
					   			$lastId = $arrResposta[1];
					   			$obj2->getProperty("id".strtolower($prop->getName()))->setValue($obj2, $lastId);
					   		}else{
					   			$resposta = 0;	
					   		 }	 
		  	  			}
		  	  			
		  	  			$prop->setValue($obj, $obj2);
		  	  			
		  	  		 }//fim ucwords($prop->getName()) == $prop->getName()
		  	  	   }//fim else		
		  	   }//fim foreach			
		  	   
		  	   $class = new ReflectionClass($classe);
		  	   $action = $class->getMethod($acao);
			   
			   $strResposta = $action->invoke($class->newInstance(), $obj);
				
		  	   if($strResposta != 0){	
					$arrResposta = explode('*',$strResposta);
					$resposta = $arrResposta[0];
					$lastId = $arrResposta[1];
					
				}else{
					$resposta = 0;	
				 }	 
			   
			    if(isset($_POST['retorno']) && $resposta != 0){
		  	     	if($_POST['retorno'] == "lastID")
		  	     	 echo $lastId;	
		  	     }else{
			     	echo $resposta;	
		  	      }
			   
			   
		  }else if($acao == "excluir"){
		  		$id = $_POST['idPkey'];
		  		$class = new ReflectionClass($classe);
		  	    $action = $class->getMethod($acao);
			   
			    $resposta = $action->invoke($class->newInstance(), $id) ? '1' : '0';
			    //$resposta = $action->invoke($class->newInstance(), $id);
			   
			    echo $resposta;		
		   }else if($acao == "excluirEmMassa"){
		   		$acao = "excluir";
		  		$ids = $_POST['idPkeys'];
		  		
		  		$arr = explode(";", $ids);
		  		for($i = 0; $i < sizeof($arr); $i++){
		  			
		  			$id = $arr[$i];
			  		$class = new ReflectionClass($classe);
			  	    $action = $class->getMethod($acao);
				    
				    $action->invoke($class->newInstance(), $id);
		  		}
			    //$resposta = $action->invoke($class->newInstance(), $id);
			   
			    echo 1;		
		   }else if($acao == "salvarEmCascata"){
		   		
		   		
			  		//cadastro com coleção
			  		  $_acao = "salvar"; 
			  		  $typeColl	= $_POST['typeCollection'];
			  		  $idColl = $_POST['idCollection'];
			  		  if($typeColl == "file"){
				  		  $folderColl = $_POST['folderCollection'];
				  		  $dirColl = $_POST['dirCollection'];
				  		  $cont = $_POST['cont_'.$idColl];
				  		  
				  		  $cont = 999;
			  		  }else{
			  		  	  $cont = $_POST['cont_'.$idColl];
			  		   }
			  		  
			  		  $cont = 999;
			  		  
			  		  $arrayObj = new ArrayObject();
					  
					  if($typeColl == "file" || $typeColl == "string"){
					  		
					  		for($i = 1; $i <= $cont; $i++){
					  			if(isset($_POST[$idColl.'_'.$i])){
					  				$arrayObj->append(utf8_decode($_POST[$idColl.'_'.$i]));
					  			}
					  		}
					  		
					  		
					  }
					  
					  
				     /***********************************************/
		   			/***********************************************/
		   			/***********************************************/
		   		    if($typeColl == "object"){
		   		    	$acao = "salvar";
		   		    }
		   		    /***********************************************/
		   			/***********************************************/
		   			/***********************************************/	  
					  
					  
		   		
		   		 $obj = $class = new ReflectionClass($objeto);
			  	   foreach($class->getProperties() as $prop){
			  	  		if(isset($_POST[$prop->getName()])){
			  	  			$prop->setValue($obj, addslashes(utf8_decode($_POST[$prop->getName()])));	 	
			  	  		}else{
			  	  		  if(ucwords($prop->getName()) == $prop->getName()){	///////// aqui  	 
			  	  			require("controller/".$prop->getName()."Controller.class.php");
			  	  			$obj2 = $class2 = new ReflectionClass($prop->getName());
			  	  			$contAux = 0;
			  	  			foreach($class2->getProperties() as $prop2){
			  	  				if(isset($_POST[strtolower($prop->getName())."_".$prop2->getName()])){	
			  	  					$contAux++;
			  	  					$prop2->setValue($obj2, addslashes(utf8_decode($_POST[strtolower($prop->getName())."_".$prop2->getName()])));
			  	  				}
			  	  				
			  	  				else{
			  	  				  if(ucwords($prop2->getName()) == $prop2->getName()){	
					  	  			//require("/model/".$prop2->getName().".class.php");
					  	  			$obj3 = $class3 = new ReflectionClass($prop2->getName());
					  	  			foreach($class3->getProperties() as $prop3){
					  	  				if(isset($_POST[strtolower($prop2->getName())."_".$prop3->getName()])){	
					  	  					$prop3->setValue($obj3, addslashes(utf8_decode($_POST[strtolower($prop2->getName())."_".$prop3->getName()])));
					  	  				}	
					  	  			}	
					  	  		  
					  	  		    $prop2->setValue($obj2, $obj3);	
			  	  				  }	
			  	  				} //fim else	
			  	  					
			  	  			}
			  
			  	  			if($contAux > 1){
			  	  				
				  	  			$class2 = new ReflectionClass($prop->getName()."Controller");
				  	  		    $action2 = $class2->getMethod($_acao);
					   			//echo $obj2->getProperty("idperfil")->getValue($obj2)." <---- <br/><br/>";
					   			$strResposta = $action2->invoke($class2->newInstance(), $obj2);
						   		if($strResposta != 0){	
						   			$arrResposta = explode('*',$strResposta);
						   			$resposta = $arrResposta[0];
						   			$lastId = $arrResposta[1];
						   			$obj2->getProperty("id".strtolower($prop->getName()))->setValue($obj2, $lastId);
						   		}else{
						   			$resposta = 0;	
						   		 }	 
			  	  			}
			  	  			
			  	  			$prop->setValue($obj, $obj2);
			  	  			
			  	  		 }
			  	  	  }		
			  	   }		
		   		 $class = new ReflectionClass($classe);
		  	     $action = $class->getMethod($acao);
			   
			     if($typeColl == "file"){
			     	$strResposta = $action->invoke($class->newInstance(), $obj, $arrayObj, $dirColl, $folderColl);
			     }else if($typeColl == "string"){
			     	$strResposta = $action->invoke($class->newInstance(), $obj, $arrayObj);
			      }else if($typeColl == "object"){
			      	
			      	$action = $class->getMethod($_acao);
			      	$strResposta = $action->invoke($class->newInstance(), $obj);
			      	
			      	if($strResposta != 0){	
						$arrResposta = explode('*',$strResposta);
						$resposta = $arrResposta[0];
						$id = $arrResposta[1];
					}else{
						$resposta = 0;	
					 }	
					
			      	/********************************************/
			      		if($resposta != 0){
			      			$classColl = $_POST['classeCollection'];
					  		$objColl = $_POST['objetoCollection']; 
					  		require("controller/".$classColl.".class.php");
					  		$tot = $_POST['cont_'.$idColl]+1;
					  		for($i = 1; $i <= $tot; $i++){
					  		  if(isset($_POST[$idColl.'_id'.strtolower($objColl).'_'.$i])){	
					  			$_class = $_obj = new ReflectionClass($objColl);
					  			foreach($_class->getProperties() as $_prop){
						  		  	if(isset($_POST[$idColl.'_'.$_prop->getName().'_'.$i])){
						  				$_prop->setValue($_obj, addslashes(utf8_decode($_POST[$idColl.'_'.$_prop->getName().'_'.$i])));
						  			}else{
							  	  		  if(ucwords($_prop->getName()) == $_prop->getName()){	///////// aqui  	 
							  	  			if(ucwords($_prop->getName()) == $objeto){
							  	  			 	$_obj2 = $_class2 = new ReflectionClass($_prop->getName());
							  	  			 	foreach($_class2->getProperties() as $_prop2){
							  	  			 		if($_prop2->getName() == "id".strtolower($objeto)){
							  	  			 			$_prop2->setValue($_obj2, $id);	
							  	  			 			
							  	  			 		}	
							  	  			 	}	
							  	  			}else{
								  	  			require("controller/".$_prop->getName()."Controller.class.php");	
								  	  			$_obj2 = $_class2 = new ReflectionClass($_prop->getName());
								  	  			$contAux = 0;
								  	  			foreach($_class2->getProperties() as $_prop2){
								  	  				if(isset($_POST[$idColl.'_'.strtolower($_prop->getName())."_".$_prop2->getName().'_'.$i])){	
								  	  					$contAux++;
								  	  					$_prop2->setValue($_obj2, addslashes(utf8_decode($_POST[$idColl.'_'.strtolower($_prop->getName())."_".$_prop2->getName().'_'.$i])));
								  	  				}else{
									  	  				  if(ucwords($_prop2->getName()) == $_prop2->getName()){	
											  	  			//require("/model/".$prop2->getName().".class.php");
											  	  			$_obj3 = $_class3 = new ReflectionClass($_prop2->getName());
											  	  			foreach($_class3->getProperties() as $_prop3){
											  	  				if(isset($_POST[$idColl.'_'.strtolower($_prop2->getName())."_".$_prop3->getName().'_'.$i])){	
											  	  					$prop3->setValue($_obj3, addslashes(utf8_decode($_POST[$idColl.'_'.strtolower($_prop2->getName())."_".$_prop3->getName().'_'.$i])));
											  	  				}	
											  	  			}	
											  	  		  
											  	  		    $_prop2->setValue($_obj2, $_obj3);	
									  	  				  }	
								  	  				 } //fim else	
								  	  					
								  	  			}
								  
								  	  			if($contAux > 1){
								  	  				
									  	  			$_class2 = new ReflectionClass($_prop->getName()."Controller");
									  	  		    $_action2 = $_class2->getMethod($_acao);
										   			//echo $obj2->getProperty("idperfil")->getValue($obj2)." <---- <br/><br/>";
										   			$_strResposta = $_action2->invoke($_class2->newInstance(), $_obj2);
											   		if($_strResposta != 0){	
											   			$arrResposta = explode('*',$_strResposta);
											   			$resposta = $arrResposta[0];
											   			$lastId = $arrResposta[1];
											   			$_obj2->getProperty("id".strtolower($_prop->getName()))->setValue($_obj2, $lastId);
											   		}else{
											   			$resposta = 0;	
											   		 }	 
								  	  			}
								  	  			
								  	  			
								  	  	   }
								  		   	 
								  	  	   $_prop->setValue($_obj, $_obj2);
								  	  	  
							  	  		 } 		
							  	   }//fim else
							  	   /********************************************************************************************************/
							
					  		    }//fim foreach	
					  			
					  			//salva item collection
					  			$_class = new ReflectionClass($classColl);
					  			$_action = $_class->getMethod($_acao);
								$_action->invoke($_class->newInstance(), $_obj);
								
					  		 }//fim idobjcoll	
					  	   }//fim for
			     		}// fim resposta != 0
			      	/**********************************************/
			      	
			      	
			      	
			      }//fim if "object"  
			  	   
			  	   if($strResposta != 0){	
						$arrResposta = explode('*',$strResposta);
						$resposta = $arrResposta[0];
						$lastId = $arrResposta[1];
					}else{
						$resposta = 0;	
					 }	 
		  	     
		  	     if(isset($_POST['retorno']) && $resposta != 0){
		  	     	if($_POST['retorno'] == "lastID")
		  	     	 echo $lastId;	
		  	     }else{
			     	echo $resposta;	
		  	      }
		  	      
		  	    
		    }else if($acao == "logar"){
		    	
				
				$class = new ReflectionClass($classe);
		  	    $action = $class->getMethod($acao);
			    
			    $resposta = $action->invoke($class->newInstance(), utf8_decode($_POST['usuario']), utf8_decode($_POST['senha']));
				

		     	if($resposta!=0){
		     		//session_start();
		     		$_SESSION['codAdmin'] = $resposta;
		     		$_SESSION['identificacao'] = $_POST['usuario'];
		     		$_SESSION['senha'] = $_POST['senha'];
		    		$_SESSION['logado_controlplus'] = true;
		     	}
		     	echo $resposta;
		     }else if(strtolower(substr($acao, 0, 6)) == "listar"){
		     	
		     	$param = $_POST['param'];
		      	
		      	$class = new ReflectionClass($classe);
		  	    $action = $class->getMethod($acao);
			   
			    $resposta = $action->invoke($class->newInstance(), $param);
		        
		        if(isset($_POST['uso'])){
		        	if($_POST['uso'] == "Combobox"){
		        		$campoExibe = $_POST['campoExibe'];
		        		$obj = new ReflectionClass($objeto);
		        		$arrayObj = new ArrayObject();
		        		
		        		$arrayObj = $resposta;
		        		$saida = "<option value=''>Selecione uma opção..</option>";
		        		
		        		foreach($arrayObj as $o){
		        			foreach($obj->getProperties() as $prop){
		        				if(substr($prop->getName(), 0, 2) == "id"){
		        					$id = $prop->getValue($o);
		        				}
		        				if($prop->getName() == $campoExibe){
		        					$txt = $prop->getValue($o);
		        				}
		        				
		        			}
		        			$saida .= "<option value='".$id."'>".$txt."</option>";
		        			 
		        		}
		        	
		        	  $resposta = $saida;
		        	}
		        	
		        }
		        
		        echo $resposta;
		      
		      }else if($acao == "salvarColecao"){
		      		  $acao = "salvar";
		      		  if(isset($_POST['metodo'])){
		      		  	$acao = $_POST['metodo'];
		      		  }
		      		  $tamanhoColecao = $_POST['tamanhoColecao'];
		      		  
		      		  
					  	 for($j = 1; $j <= $tamanhoColecao; $j++){  
					  	   $obj = $class = new ReflectionClass($objeto);
					  	   foreach($class->getProperties() as $prop){
					  	  		if(isset($_POST[$prop->getName()."_".$j])){
					  	  			$prop->setValue($obj, addslashes(utf8_decode($_POST[$prop->getName()."_".$j])));	 	
					  	  		}else{
					  	  		  if(ucwords($prop->getName()) == $prop->getName()){	///////// aqui 	
					  	  			//require("/controller/".$prop->getName()."Controller.class.php");
					  	  			$obj2 = $class2 = new ReflectionClass($prop->getName());
					  	  			$contAux = 0;
					  	  			foreach($class2->getProperties() as $prop2){
					  	  				if(isset($_POST[strtolower($prop->getName())."_".$prop2->getName()."_".$j])){	
					  	  					$contAux++;
					  	  					$prop2->setValue($obj2, addslashes(utf8_decode($_POST[strtolower($prop->getName())."_".$prop2->getName()."_".$j])));
					  	  				}else{
					  	  				  if(ucwords($prop2->getName()) == $prop2->getName()){	
							  	  			//require("/model/".$prop2->getName().".class.php");
							  	  			$obj3 = $class3 = new ReflectionClass($prop2->getName());
							  	  			foreach($class3->getProperties() as $prop3){
							  	  				if(isset($_POST[strtolower($prop2->getName())."_".$prop3->getName()."_".$j])){	
							  	  					$prop3->setValue($obj3, addslashes(utf8_decode($_POST[strtolower($prop2->getName())."_".$prop3->getName()."_".$j])));
							  	  				}	
							  	  			}	
							  	  		  
							  	  		    $prop2->setValue($obj2, $obj3);	
					  	  				  }	
					  	  				 } //fim else	
					  	  			}
					  	  			
					  	  			if($contAux > 1){
					  	  				
						  	  			$class2 = new ReflectionClass($prop->getName()."Controller");
						  	  		    $action2 = $class2->getMethod($acao);
							   			//echo $obj2->getProperty("idperfil")->getValue($obj2)." <---- <br/><br/>";
							   			$strResposta = $action2->invoke($class2->newInstance(), $obj2);
								   		if($strResposta != 0){	
								   			$arrResposta = explode('*',$strResposta);
								   			$resposta = $arrResposta[0];
								   			$lastId = $arrResposta[1];
								   			$obj2->getProperty("id".strtolower($prop->getName()))->setValue($obj2, $lastId);
								   		}else{
								   			$resposta = 0;	
								   		 }	 
					  	  			}
					  	  			
					  	  			$prop->setValue($obj, $obj2);
					  	  			
					  	  		 }
					  	  		}		
					  	   }
					  	   
					  	   $class = new ReflectionClass($classe);
					  	   $action = $class->getMethod($acao);
						   
						   $strResposta = $action->invoke($class->newInstance(), $obj);

					  	   if($strResposta != 0){	
								$arrResposta = explode('*',$strResposta);
								$resposta = $arrResposta[0];
								$lastId = $arrResposta[1];
							}else{
								$resposta = 0;	
							 }	 
					  	   
					    }			
				  	   
				  	   
					     if(isset($_POST['retorno']) && $resposta != 0){
				  	     	if($_POST['retorno'] == "lastID")
				  	     	 echo $lastId;	
				  	     }else{
					     	 echo $resposta;	
				  	      }
		      		
		      		
		      		
		       }else if($acao == "salvarEmCascataM2M"){
		      		   $acao = "salvar";
		      		   
		      		   $obj = $class = new ReflectionClass($objeto);
				  	   foreach($class->getProperties() as $prop){
				  	  		if(isset($_POST[$prop->getName()])){
				  	  			$prop->setValue($obj, addslashes(utf8_decode($_POST[$prop->getName()])));	 	
				  	  		}else{
				  	  		  if(ucwords($prop->getName()) == $prop->getName()){	///////// aqui 
				  	  			require("controller/".$prop->getName()."Controller.class.php");
				  	  			$obj2 = $class2 = new ReflectionClass($prop->getName());
				  	  			$contAux = 0;
				  	  			foreach($class2->getProperties() as $prop2){
				  	  				if(isset($_POST[strtolower($prop->getName())."_".$prop2->getName()])){	
				  	  					$contAux++;
				  	  					$prop2->setValue($obj2, addslashes(utf8_decode($_POST[strtolower($prop->getName())."_".$prop2->getName()])));
				  	  				}else{
				  	  				  if(ucwords($prop2->getName()) == $prop2->getName()){	
						  	  			//require("/model/".$prop2->getName().".class.php");
						  	  			$obj3 = $class3 = new ReflectionClass($prop2->getName());
						  	  			foreach($class3->getProperties() as $prop3){
						  	  				if(isset($_POST[strtolower($prop2->getName())."_".$prop3->getName()])){	
						  	  					$prop3->setValue($obj3, addslashes(utf8_decode($_POST[strtolower($prop2->getName())."_".$prop3->getName()])));
						  	  				}	
						  	  			}	
						  	  		  
						  	  		    $prop2->setValue($obj2, $obj3);	
						  	  		    
				  	  				  }/**/else{//aqui foi alterado por mmff 16/12/09
						  	  				$prop2->setValue($obj2, null);
						  	  		    }//ate aqui -- apenas retirar esta parte em caso de problema.
						  	  		   
				  	  				 } //fim else	
				  	  			}
				  	  			
				  	  			if($contAux > 1){
				  	  				
					  	  			$class2 = new ReflectionClass($prop->getName()."Controller");
					  	  		    $action2 = $class2->getMethod($acao);
						   			//echo $obj2->getProperty("idperfil")->getValue($obj2)." <---- <br/><br/>";
						   			$strResposta = $action2->invoke($class2->newInstance(), $obj2);
							   		if($strResposta != 0){	
							   			$arrResposta = explode('*',$strResposta);
							   			$resposta = $arrResposta[0];
							   			$lastId = $arrResposta[1];
							   			$obj2->getProperty("id".strtolower($prop->getName()))->setValue($obj2, $lastId);
							   		}else{
							   			$resposta = 0;	
							   		 }	 
				  	  			}
				  	  			
				  	  			$prop->setValue($obj, $obj2);
				  	  			
				  	  		 }//fim ucwords($prop->getName()) == $prop->getName()
				  	  	   }//fim else		
				  	   }//fim foreach			
				  	   
				  	   $class = new ReflectionClass($classe);
				  	   $action = $class->getMethod($acao);
					   
					   $strResposta = $action->invoke($class->newInstance(), $obj);
		
				  	   if($strResposta != 0){	
							$arrResposta = explode('*',$strResposta);
							$resposta = $arrResposta[0];
							$id = $arrResposta[1];
							
							
							/*******************************************************************/
							/*******************************************************************/
							$objetosM2M = explode('*', $_POST['objetoM2M']);
							$objetosM 	= explode('*', $_POST['objetoM']);
							$acoesdelM2M = explode('*', $_POST['acaodelM2M']);
							$acoesM2M = explode('*', $_POST['acaoM2M']);
							for($j = 0; $j < sizeof($objetosM2M); $j++){
										
									$objetoM2M = $objetosM2M[$j];
									$classeM2M = $objetoM2M."Controller"; 
									$objetoM   = $objetosM[$j];
									$classeM   = $objetoM."Controller";
									$acaoM2M   = $acoesM2M[$j];
									$acaodelM2M= $acoesdelM2M[$j];
									 
									require_once('controller/'.$classeM2M.'.class.php');
									require_once('controller/'.$classeM.'.class.php');
									$classM = new ReflectionClass($classeM);
						  	  		$action = $classM->getMethod("listarTodos");
							        
							        $objM_arr = $action->invoke($classM->newInstance());
									$objM = $classM = new ReflectionClass($objetoM);
									foreach($objM_arr as $oM){
										
										if(isset($_POST[strtolower($objetoM)."_"."id".strtolower($objetoM)."_".$objM->getProperty("id".strtolower($objetoM))->getValue($oM)])){
											$classM2M = new ReflectionClass($classeM2M);	
											$action = $classM2M->getMethod($acaoM2M);
											$_objM = $action->invoke($classM2M->newInstance(), $id, $objM->getProperty("id".strtolower($objetoM))->getValue($oM));	
											
											if($_objM == null){
												 
												 $_classM2M = $_objM2M = new ReflectionClass($objetoM2M);
												 foreach($_classM2M->getProperties() as $propM2M){
									  	   			if(isset($_POST[$propM2M->getName()])){
									  	   				$propM2M->setValue($_objM2M, addslashes(utf8_decode($_POST[$prop2M->getName()])));	
									  	   			}else{
									  	   				if($propM2M->getName() == $objetoM){
									  	   					$objAux = new ReflectionClass($objetoM);	
									  	   					$objAux->getProperty("id".strtolower($objetoM))->setValue($objAux, $objM->getProperty("id".strtolower($objetoM))->getValue($oM));
									  	   					$propM2M->setValue($_objM2M, $objAux);	
									  	   				}else if($propM2M->getName() == $objeto){
									  	   					$objAux = new ReflectionClass($objeto);	
									  	   					$objAux->getProperty("id".strtolower($objeto))->setValue($objAux, $id);
									  	   					$propM2M->setValue($_objM2M, $objAux);	
									  	   				 }else if($propM2M->getName() == "id".strtolower($objetoM2M)){
									  	   				 	$propM2M->setValue($_objM2M, 0);	
									  	   				  }	
									  	   			 }
									  	   		 }
												 
												 $classM2M = new ReflectionClass($classeM2M);	
												 $action = $classM2M->getMethod($acao);
												 //
											     $action->invoke($classM2M->newInstance(), $_objM2M);
											     /*$sss = $action->invoke($classM2M->newInstance(), $_objM2M);
											     echo $sss;*/
											}else{
												//
											 }
											
										}else{
											$classM2M = new ReflectionClass($classeM2M);	
											$action = $classM2M->getMethod($acaodelM2M);
											$action->invoke($classM2M->newInstance(), $id, $objM->getProperty("id".strtolower($objetoM))->getValue($oM));
										 }
										
										
						  	   			
									}
							}
							/*******************************************************************/
							/*******************************************************************/
							
							
						}else{
							$resposta = 0;	
						 }	 
					   
					    if(isset($_POST['retorno']) && $resposta != 0){
				  	     	if($_POST['retorno'] == "lastID")
				  	     	 echo $lastId;	
				  	     }else{
					     	echo $resposta;	
				  	      }
				      		
				      		
				      		
				 }else if($acao == "salvarMultiColecao"){
		      		  $acao = "salvar";
		      		  $qtdColecoes = $_POST['qtdColecoes'];
		      		  
		      		  for($n = 1; $n <= $qtdColecoes; $n++){
		      		   if(isset($_POST['tamanhoColecao_'.$n])){
		      		  	 $tamanhoColecao = $_POST['tamanhoColecao_'.$n];
					  	 for($j = 1; $j <= $tamanhoColecao; $j++){  
						   if(isset($_POST[$n.'tem_'.$j])){   	
						  	   $obj = $class = new ReflectionClass($objeto);
						  	   foreach($class->getProperties() as $prop){
						  	  		if(isset($_POST[$n.$prop->getName()."_".$j])){
						  	  			$prop->setValue($obj, addslashes(utf8_decode($_POST[$n.$prop->getName()."_".$j])));	 	
						  	  		}else{
						  	  		  if(ucwords($prop->getName()) == $prop->getName()){	///////// aqui 	
						  	  			//require("/controller/".$prop->getName()."Controller.class.php");
						  	  			$obj2 = $class2 = new ReflectionClass($prop->getName());
						  	  			$contAux = 0;
						  	  			foreach($class2->getProperties() as $prop2){
						  	  				if(isset($_POST[$n.strtolower($prop->getName())."_".$prop2->getName()."_".$j])){	
						  	  					$contAux++;
						  	  					$prop2->setValue($obj2, addslashes(utf8_decode($_POST[$n.strtolower($prop->getName())."_".$prop2->getName()."_".$j])));
						  	  				}else{
						  	  				  if(ucwords($prop2->getName()) == $prop2->getName()){	
								  	  			//require("/model/".$prop2->getName().".class.php");
								  	  			$obj3 = $class3 = new ReflectionClass($prop2->getName());
								  	  			foreach($class3->getProperties() as $prop3){
								  	  				if(isset($_POST[$n.strtolower($prop2->getName())."_".$prop3->getName()."_".$j])){	
								  	  					$prop3->setValue($obj3, addslashes(utf8_decode($_POST[$n.strtolower($prop2->getName())."_".$prop3->getName()."_".$j])));
								  	  				}	
								  	  			}	
								  	  		  
								  	  		    $prop2->setValue($obj2, $obj3);	
						  	  				  }	
						  	  				 } //fim else	
						  	  			}
						  	  			
						  	  			if($contAux > 1){
						  	  				
							  	  			$class2 = new ReflectionClass($prop->getName()."Controller");
							  	  		    $action2 = $class2->getMethod($acao);
								   			//echo $obj2->getProperty("idperfil")->getValue($obj2)." <---- <br/><br/>";
								   			$strResposta = $action2->invoke($class2->newInstance(), $obj2);
									   		if($strResposta != 0){	
									   			$arrResposta = explode('*',$strResposta);
									   			$resposta = $arrResposta[0];
									   			$lastId = $arrResposta[1];
									   			$obj2->getProperty("id".strtolower($prop->getName()))->setValue($obj2, $lastId);
									   		}else{
									   			$resposta = 0;	
									   		 }	 
						  	  			}
						  	  			
						  	  			$prop->setValue($obj, $obj2);
						  	  			
						  	  		 }
						  	  		}		
						  	   }
						  	   
						  	   $class = new ReflectionClass($classe);
						  	   $action = $class->getMethod($acao);
							   
							   $strResposta = $action->invoke($class->newInstance(), $obj);
	
						  	   if($strResposta != 0){	
									$arrResposta = explode('*',$strResposta);
									$resposta = $arrResposta[0];
									$lastId = $arrResposta[1];
								}else{
									$resposta = 0;	
								 }	 
						  }//isset	   
					    }// fim for 2	
		      		  }// fim if   		
		      		 }// fim for 1 
				  	   
					     if(isset($_POST['retorno']) && $resposta != 0){
				  	     	if($_POST['retorno'] == "lastID")
				  	     	 echo $lastId;	
				  	     }else{
					     	 echo $resposta;	
				  	      }
		      		
		      		
		      		
		       }else if($acao == "datagrid"){
		       		
		       		$acao = "listar";
		       		$like = $_POST['like'];
		       		$order = $_POST['order'];
		       		$limit = $_POST['limit'];
		       		
		       		if(isset($_POST['metodo'])){
		       			$acao = $_POST['metodo']; 
		       		}
		      	
			      	$class = new ReflectionClass($classe);
			  	    $action = $class->getMethod($acao);
				    
				    $resposta = $action->invoke($class->newInstance(), $like, $order, $limit);
			        
			        if($resposta->count() > 0){ 
			        		$obj = new ReflectionClass($objeto);
			        		$arrayObj = new ArrayObject();
			        		$arrayObj = $resposta;
			        		$a = 0;
			        		$ids = '';
			        		foreach($arrayObj as $o){
			        			$a++;
			        			if($a % 2 == 0){
			        				echo "<tr class='odd' onmouseout=\"this.style.backgroundColor='#F8F8F8';\" onmouseover=\"this.style.backgroundColor='#FFFDB2';\">";
			        			}else{
			        				echo "<tr onmouseout=\"this.style.backgroundColor='#FFFFFF';\" onmouseover=\"this.style.backgroundColor='#FFFDB2';\">";
			        			 }
			        			 
			        			 
			        			if(strtolower($objeto) != "log" && (!isset($_POST['acoes']))){ 	
			        			 echo '<td><input type="checkbox"  id="chb_'.$obj->getProperty("id".strtolower($objeto))->getValue($o).'" name="chb_'.$obj->getProperty("id".strtolower($objeto))->getValue($o).'" /></td>';
			        			} 	
			        			 
			        			foreach($obj->getProperties() as $prop){
			        				if(ucwords($prop->getName()) != $prop->getName()){
			        					
			        					if($prop->getValue($o) != ""){
			        						
			        						if(strlen($prop->getValue($o)) > 200){
			        							$valexb = substr($prop->getValue($o), 0, 197).'...'; 
			        						}else{
			        							$valexb = $prop->getValue($o);
			        						}
			        						
			        						echo "<td>" . $valexb . "</td>"; 
			        					}
			        					if($prop->getName() == "id".strtolower($objeto)){
			        						$idobj = $prop->getValue($o);
			        						$ids .= $prop->getValue($o) . ';';
			        						
			        					}
			        				}else{
			        					
			        					$obj2 = new ReflectionClass($prop->getName());
			        					$o2 = $obj->getProperty($prop->getName())->getValue($o);
								  	  	//print_r($obj->getProperty("Admin")->getValue($o));
			        					foreach($obj2->getProperties() as $prop2){
								  	  		/*******************************************/
										  	  	if(ucwords($prop2->getName()) != $prop2->getName()){
						        					if($prop2->getValue($o2) != ""){
						        						echo "<td>" . $prop2->getValue($o2) . "</td>";
						        					}
						        				}else{
						        					$obj3 = new ReflectionClass($prop2->getName());
						        					$o3 = $obj2->getProperty($prop2->getName())->getValue($o2);
											  	  	//print_r($obj->getProperty("Admin")->getValue($o));
						        					foreach($obj3->getProperties() as $prop3){
											  	  		/*******************************************/
													  	  	if(ucwords($prop3->getName()) != $prop3->getName()){
									        					if($prop3->getValue($o3) != ""){
									        						echo "<td>" . $prop3->getValue($o3) . "</td>";
									        					}
									        				}else{
									        					$obj4 = new ReflectionClass($prop3->getName());
									        					$o4 = $obj3->getProperty($prop3->getName())->getValue($o3);
														  	  	//print_r($obj->getProperty("Admin")->getValue($o));
									        					foreach($obj4->getProperties() as $prop4){
														  	  		/*******************************************/
																  	  	if(ucwords($prop4->getName()) != $prop4->getName()){
												        					if($prop4->getValue($o4) != ""){
												        						echo "<td>" . $prop4->getValue($o4) . "</td>";
												        					}
												        				}else{
												        					$obj5 = new ReflectionClass($prop4->getName());
												        					$o5 = $obj4->getProperty($prop4->getName())->getValue($o4);
																	  	  	//print_r($obj->getProperty("Admin")->getValue($o));
												        					foreach($obj5->getProperties() as $prop5){
																	  	  		/*******************************************/
																			  	  	if(ucwords($prop5->getName()) != $prop5->getName()){
															        					if($prop5->getValue($o5) != ""){
															        						echo "<td>" . $prop5->getValue($o5) . "</td>";
															        					}
															        				}else{
															        				 }
																	  	  		/*******************************************/
																	  	  	}				
												        				 }
														  	  		/*******************************************/
														  	  	}			
									        				 }
											  	  		/*******************************************/
											  	  	}		
						        				 }
								  	  		/*******************************************/
								  	  	}	
			        				 }
			        			}
			        			if(strtolower($objeto) != "log" && (!isset($_POST['acoes']))){ 	 
			        				echo '<td><a href="'.$mainFolder.'/controlplus/cad'.ucwords($objeto).'/'.$idobj.'"><img alt="Editar" title="Editar" src="'.$mainFolder.'/controlplus/includes/imgs/icoEdit.png" style="margin-left:10px;" /></a><a href=\'javascript:$("#confirmDel").dialog("open"); document.getElementById("idPkey").setAttribute("value","'.$idobj.'"); \'><img alt="Excluir" title="Excluir" src="'.$mainFolder.'/controlplus/includes/imgs/icoDelete.png" style="margin-left:20px;" /></a></td>';
			        			}else if(isset($_POST['acoes'])){
			        				echo '<td><a style="color:#0066ff;" href=\'javascript:addMusica('.$idobj.'); \'>Add</a></td>';
			        			}
			        			
			        			
			        			echo "</tr>";
			        			
			        			
			        		}
			        }else{ // resposta->count == 0
			          	echo "<tr><td colspan='50'>Nenhum registro encontrado.</td></tr>";		
			         }			
				   				if(isset($ids)){/*$ids[strlen($ids)-1] = "";*/}else{$ids = "";}
			         			$total = $action->invoke($class->newInstance(), $like, $order, '9999999999999999999')->count();
			       				echo "***********";
			       				echo $total;
			       				echo "***********";
			       				echo $ids;
			        
		       }else if($acao == "pdf"){
		       		$acao = "listar";
		       		$like = $_POST['like'];
		       		$order = $_POST['order'];
		       		$limit = $_POST['limit'];
		      	
			      	$class = new ReflectionClass($classe);
			  	    $action = $class->getMethod($acao);
				    
				    $resposta = $action->invoke($class->newInstance(), $like, $order, $limit);
			        $dados = "";
			        if($resposta->count() > 0){ 
			        		$obj = new ReflectionClass($objeto);
			        		$arrayObj = new ArrayObject();
			        		$arrayObj = $resposta;
			        		$a = 0;
			        		foreach($arrayObj as $o){
			        			$a++;
			        			if($a != 1){
			        				$dados[strlen($dados)-1] = "*";
			        			}
			        			$b = 0;
			        			foreach($obj->getProperties() as $prop){
			        				$b++;
			        				if($b != 1){
			        					$dados .= ";";
			        				}
			        				if(ucwords($prop->getName()) != $prop->getName()){
			        					if($prop->getValue($o) != ""){
			        						$dados .= $prop->getValue($o);
			        					}
			        					if($prop->getName() == "id".strtolower($objeto)){
			        						$idobj = $prop->getValue($o);
			        					}
			        				}else{
			        					
			        					$obj2 = new ReflectionClass($prop->getName());
			        					$o2 = $obj->getProperty($prop->getName())->getValue($o);
								  	  	//print_r($obj->getProperty("Admin")->getValue($o));
			        					foreach($obj2->getProperties() as $prop2){
								  	  		/*******************************************/
										  	  	if(ucwords($prop2->getName()) != $prop2->getName()){
						        					if($prop2->getValue($o2) != ""){
						        						$dados .= $prop2->getValue($o2);
						        					}
						        				}else{
						        					$obj3 = new ReflectionClass($prop2->getName());
						        					$o3 = $obj2->getProperty($prop2->getName())->getValue($o2);
											  	  	//print_r($obj->getProperty("Admin")->getValue($o));
						        					foreach($obj3->getProperties() as $prop3){
											  	  		/*******************************************/
													  	  	if(ucwords($prop3->getName()) != $prop3->getName()){
									        					if($prop3->getValue($o3) != ""){
									        						$dados .= $prop3->getValue($o3);
									        					}
									        				}else{
									        					$obj4 = new ReflectionClass($prop3->getName());
									        					$o4 = $obj3->getProperty($prop3->getName())->getValue($o3);
														  	  	//print_r($obj->getProperty("Admin")->getValue($o));
									        					foreach($obj4->getProperties() as $prop4){
														  	  		/*******************************************/
																  	  	if(ucwords($prop4->getName()) != $prop4->getName()){
												        					if($prop4->getValue($o4) != ""){
												        						$dados .= $prop4->getValue($o4);
												        					}
												        				}else{
												        					$obj5 = new ReflectionClass($prop4->getName());
												        					$o5 = $obj4->getProperty($prop4->getName())->getValue($o4);
																	  	  	//print_r($obj->getProperty("Admin")->getValue($o));
												        					foreach($obj5->getProperties() as $prop5){
																	  	  		/*******************************************/
																			  	  	if(ucwords($prop5->getName()) != $prop5->getName()){
															        					if($prop5->getValue($o5) != ""){
															        						$dados .= $prop5->getValue($o5);
															        					}
															        				}else{
															        				 }
																	  	  		/*******************************************/
																	  	  	}				
												        				 }
														  	  		/*******************************************/
														  	  	}			
									        				 }
											  	  		/*******************************************/
											  	  	}		
						        				 }
								  	  		/*******************************************/
								  	  	}	
			        				 }
			        			} 
			        			
			        			
			        			
			        		}
			        		
			        		/*$dados[strlen($dados)-1] = "";
			        		//echo $dados;
			        		require('mediaplus/utils/PDF.class.php');
			        		$pdf=new PDF();
							//Column titles
							$header=array('a','b','c','d', 'e', 'f');
							//Data loading
							$data=$pdf->LoadData($dados);
							$pdf->SetFont('Arial','',14);
							$pdf->AddPage();
							//$pdf->FancyTable($header,$data);
							$pdf->Cell(40,10,'Hello World!');
							$pdf->Output();*/
			        		echo $dados;
			        		
			        		
			        }else{ // resposta->count == 0
			          	echo "0";		
			         }			
				   				
		        }else if($acao == "salvarEmCascata2"){
		   		
		   		
			  		//cadastro com coleção
			  		$_acao = "salvar"; 
			  		$acao = "salvar";
			  		 
			  		$arrayObj = new ArrayObject();
					  
					  
		   		
		   		   $obj = $class = new ReflectionClass($objeto);
			  	   foreach($class->getProperties() as $prop){
			  	  		if(isset($_POST[$prop->getName()])){
			  	  			$prop->setValue($obj, addslashes(utf8_decode($_POST[$prop->getName()])));	 	
			  	  		}else{
			  	  		  if(ucwords($prop->getName()) == $prop->getName()){	///////// aqui  	 
			  	  			require_once("controller/".$prop->getName()."Controller.class.php");
			  	  			$obj2 = $class2 = new ReflectionClass($prop->getName());
			  	  			$contAux = 0;
			  	  			foreach($class2->getProperties() as $prop2){
			  	  				if(isset($_POST[strtolower($prop->getName())."_".$prop2->getName()])){	
			  	  					$contAux++;
			  	  					$prop2->setValue($obj2, addslashes(utf8_decode($_POST[strtolower($prop->getName())."_".$prop2->getName()])));
			  	  				}
			  	  				
			  	  				else{
			  	  				  if(ucwords($prop2->getName()) == $prop2->getName()){	
					  	  			//require("/model/".$prop2->getName().".class.php");
					  	  			$obj3 = $class3 = new ReflectionClass($prop2->getName());
					  	  			foreach($class3->getProperties() as $prop3){
					  	  				if(isset($_POST[strtolower($prop2->getName())."_".$prop3->getName()])){	
					  	  					$prop3->setValue($obj3, addslashes(utf8_decode($_POST[strtolower($prop2->getName())."_".$prop3->getName()])));
					  	  				}	
					  	  			}	
					  	  		  
					  	  		    $prop2->setValue($obj2, $obj3);	
			  	  				  }	
			  	  				} //fim else	
			  	  					
			  	  			}
			  
			  	  			if($contAux > 1){
			  	  				
				  	  			$class2 = new ReflectionClass($prop->getName()."Controller");
				  	  		    $action2 = $class2->getMethod($_acao);
					   			//echo $obj2->getProperty("idperfil")->getValue($obj2)." <---- <br/><br/>";
					   			$strResposta = $action2->invoke($class2->newInstance(), $obj2);
					   			//echo $strResposta;
						   		if($strResposta != 0){	
						   			$arrResposta = explode('*',$strResposta);
						   			$resposta = $arrResposta[0];
						   			$lastId = $arrResposta[1];
						   			$obj2->getProperty("id".strtolower($prop->getName()))->setValue($obj2, $lastId);
						   		}else{
						   			$resposta = 0;	
						   		 }	 
			  	  			}
			  	  			
			  	  			$prop->setValue($obj, $obj2);
			  	  			
			  	  		 }
			  	  	  }		
			  	   }		
		   		 $class = new ReflectionClass($classe);
		  	     $action = $class->getMethod($acao);
			   
			  	 
		  	     //if($typeColl == "object"){
			      	
			      	$action = $class->getMethod($_acao);
			      	$strResposta = $action->invoke($class->newInstance(), $obj);
			      	
			      	if($strResposta != 0){	
						$arrResposta = explode('*',$strResposta);
						$resposta = $arrResposta[0];
						$id = $arrResposta[1];
					}else{
						$resposta = 0;	
					 }	
					
			      	/********************************************/
			      		if($resposta != 0){
							
			      		 $totalSavesCascata = $_POST['totalSavesCascata']; 	
			      		 for($g = 1; $g <= $totalSavesCascata; $g++){ 	
			      		 	
					  		$typeObj = $_POST['typeObject_'.$g];

					  		if($typeObj == "f"){
					  			
								@rename($_POST['dir'].$_POST['folderName'], $_POST['dir'].$id);
									
								if(isset($_POST['dir2'])){
									@rename($_POST['dir2'].$_POST['folderName2'], $_POST['dir2'].$id);
								}
									
								if(isset($_POST['dir3'])){
									@rename($_POST['dir3'].$_POST['folderName3'], $_POST['dir3'].$id);
								}
								
								if(isset($_POST['dir4'])){
									@rename($_POST['dir4'].$_POST['folderName4'], $_POST['dir4'].$id);
								}
								
								if(isset($_POST['dir5'])){
									@rename($_POST['dir5'].$_POST['folderName5'], $_POST['dir5'].$id);
								}
								
								if(isset($_POST['dir6'])){
									@rename($_POST['dir6'].$_POST['folderName6'], $_POST['dir6'].$id);
								}
								
								if(isset($_POST['dir7'])){
									@rename($_POST['dir7'].$_POST['folderName7'], $_POST['dir7'].$id);
								}
								
								if(isset($_POST['dir8'])){
									@rename($_POST['dir8'].$_POST['folderName8'], $_POST['dir8'].$id);
								}
								
								if(isset($_POST['dir9'])){
									@rename($_POST['dir9'].$_POST['folderName9'], $_POST['dir9'].$id);
								}
								
					  		}
								
					  		
					  		
					  		
					  		
					  		if($typeObj != "n"){
						  		$typeColl	= $_POST['typeCollection_'.$g];
				  			 	$idColl = $_POST['idCollection_'.$g];
				  				$classColl = $_POST['classeCollection_'.$g];
						  		$objColl = $_POST['objetoCollection_'.$g];
						  		
						  		require_once("controller/".$classColl.".class.php");
						  		$tot = $_POST['cont_'.$idColl];
						  		
						  		for($i = 1; $i <= $tot; $i++){
						  		  if(isset($_POST[$idColl.'_id'.strtolower($objColl).'_'.$i])){	
						  			$_class = $_obj = new ReflectionClass($objColl);
						  			foreach($_class->getProperties() as $_prop){
							  		  	if(isset($_POST[$idColl.'_'.$_prop->getName().'_'.$i])){
							  				$_prop->setValue($_obj, addslashes(utf8_decode($_POST[$idColl.'_'.$_prop->getName().'_'.$i])));
							  			}else{
								  	  		  if(ucwords($_prop->getName()) == $_prop->getName()){	///////// aqui  	 
								  	  			if(ucwords($_prop->getName()) == $objeto){
								  	  			 	$_obj2 = $_class2 = new ReflectionClass($_prop->getName());
								  	  			 	foreach($_class2->getProperties() as $_prop2){
								  	  			 		if($_prop2->getName() == "id".strtolower($objeto)){
								  	  			 			$_prop2->setValue($_obj2, $id);	
								  	  			 			
								  	  			 		}	
								  	  			 	}	
								  	  			}else{
								  	  				
								  	  				require_once("controller/".$_prop->getName()."Controller.class.php");	
									  	  			$_obj2 = $_class2 = new ReflectionClass($_prop->getName());
									  	  			$contAux = 0;
									  	  			foreach($_class2->getProperties() as $_prop2){
									  	  				if(isset($_POST[$idColl.'_'.strtolower($_prop->getName())."_".$_prop2->getName().'_'.$i])){	
									  	  					$contAux++;
									  	  					$_prop2->setValue($_obj2, addslashes(utf8_decode($_POST[$idColl.'_'.strtolower($_prop->getName())."_".$_prop2->getName().'_'.$i])));
									  	  				}else{
										  	  				  if(ucwords($_prop2->getName()) == $_prop2->getName()){	
												  	  			//require("/model/".$prop2->getName().".class.php");
												  	  			$_obj3 = $_class3 = new ReflectionClass($_prop2->getName());
												  	  			foreach($_class3->getProperties() as $_prop3){
												  	  				if(isset($_POST[$idColl.'_'.strtolower($_prop2->getName())."_".$_prop3->getName().'_'.$i])){	
												  	  					$_prop3->setValue($_obj3, addslashes(utf8_decode($_POST[$idColl.'_'.strtolower($_prop2->getName())."_".$_prop3->getName().'_'.$i])));
												  	  				}else{
																		 /*********************************************************************/					
												  	  					 if(ucwords($_prop3->getName()) == $_prop3->getName()){	
															  	  			//require("/model/".$prop2->getName().".class.php");
															  	  			$_obj4 = $_class4 = new ReflectionClass($_prop3->getName());
															  	  			foreach($_class4->getProperties() as $_prop4){
															  	  				if(isset($_POST[$idColl.'_'.strtolower($_prop3->getName())."_".$_prop4->getName().'_'.$i])){	
															  	  					$_prop4->setValue($_obj4, addslashes(utf8_decode($_POST[$idColl.'_'.strtolower($_prop3->getName())."_".$_prop3->getName().'_'.$i])));
															  	  				}else{
															  	  				 }	
															  	  			}	
															  	  		  
															  	  		    $_prop3->setValue($_obj3, $_obj4);	
													  	  				  }	
												  	  					
												  	  					/*********************************************************************/
												  	  				 }	
												  	  			}	
												  	  		  
												  	  		    $_prop2->setValue($_obj2, $_obj3);	
										  	  				  }	
									  	  				 } //fim else	
									  	  					
									  	  			}
									  
									  	  			if($contAux > 1){
									  	  				
										  	  			$_class2 = new ReflectionClass($_prop->getName()."Controller");
										  	  		    $_action2 = $_class2->getMethod($_acao);
											   			//echo $obj2->getProperty("idperfil")->getValue($obj2)." <---- <br/><br/>";
											   			//print_r($_obj2);
											   			$_strResposta = $_action2->invoke($_class2->newInstance(), $_obj2);
											   			
											   			//echo $_strResposta;
												   		if($_strResposta != 0){	
												   			$arrResposta = explode('*',$_strResposta);
												   			$resposta = $arrResposta[0];
												   			$lastId = $arrResposta[1];
												   			$_obj2->getProperty("id".strtolower($_prop->getName()))->setValue($_obj2, $lastId);
												   		}else{
												   			$resposta = 0;	
												   		 }	 
									  	  			}
									  	  			
									  	  			
									  	  	   }
									  		   	 
									  	  	   $_prop->setValue($_obj, $_obj2);
									  	  	  
								  	  		 } 		
								  	   }//fim else
								  	   /********************************************************************************************************/
								
						  		    }//fim foreach	
						  			
						  			//salva item collection
						  			$_class = new ReflectionClass($classColl);
						  			$_action = $_class->getMethod($_acao);
									$resp2 = $_action->invoke($_class->newInstance(), $_obj);
									
									/*if($g==2){
									print_r($_obj);
									}*/
									//echo $resp2;
						  		 }//fim idobjcoll	
						  	   }//fim for
					  		}// fim typeObj != "n"
					  		 else{
					  		 	//M2M
					  		 	
					  		 	
					  		 	/*******************************************************************/
								/*******************************************************************/
								

											
										$objetoM2M = $_POST['objetoM2M_'.$g];
										$classeM2M = $objetoM2M."Controller"; 
										$objetoM   = $_POST['objetoM_'.$g];
										$classeM   = $objetoM."Controller";
										
										 
										require_once('controller/'.$classeM2M.'.class.php');
										require_once('controller/'.$classeM.'.class.php');
										$classM = new ReflectionClass($classeM);
							  	  		$action = $classM->getMethod("listarTodos");
								        
								        $objM_arr = $action->invoke($classM->newInstance());
										$objM = $classM = new ReflectionClass($objetoM);
										foreach($objM_arr as $oM){
											
											$objj = strtolower($objeto);
											
											if(isset($_POST[strtolower($objetoM)."_"."id".strtolower($objetoM)."_".$objM->getProperty("id".strtolower($objetoM))->getValue($oM)])){
												$classM2M = new ReflectionClass($classeM2M);	
												$action = $classM2M->getMethod("listarOnde2");
												
												$_objM = $action->invoke($classM2M->newInstance(), $objj.'_id'.$objj.' = ' . $id . ' and ' . $objetoM.'_id'.$objetoM.' = ' . $objM->getProperty("id".strtolower($objetoM))->getValue($oM));	
												
												if($_objM == null){
													 
													 $_classM2M = $_objM2M = new ReflectionClass($objetoM2M);
													 foreach($_classM2M->getProperties() as $propM2M){
										  	   			if(isset($_POST[$propM2M->getName()])){
										  	   				$propM2M->setValue($_objM2M, addslashes(utf8_decode($_POST[$prop2M->getName()])));	
										  	   			}else{
										  	   				if($propM2M->getName() == $objetoM){
										  	   					$objAux = new ReflectionClass($objetoM);	
										  	   					$objAux->getProperty("id".strtolower($objetoM))->setValue($objAux, $objM->getProperty("id".strtolower($objetoM))->getValue($oM));
										  	   					$propM2M->setValue($_objM2M, $objAux);	
										  	   				}else if($propM2M->getName() == $objeto){
										  	   					$objAux = new ReflectionClass($objeto);	
										  	   					$objAux->getProperty("id".strtolower($objeto))->setValue($objAux, $id);
										  	   					$propM2M->setValue($_objM2M, $objAux);	
										  	   				 }else if($propM2M->getName() == "id".strtolower($objetoM2M)){
										  	   				 	$propM2M->setValue($_objM2M, 0);	
										  	   				  }	
										  	   			 }
										  	   		 }
													 
													 $classM2M = new ReflectionClass($classeM2M);	
													 $action = $classM2M->getMethod($acao);
													 //
												     $action->invoke($classM2M->newInstance(), $_objM2M);
												     /*$sss = $action->invoke($classM2M->newInstance(), $_objM2M);
												     echo $sss;*/
												}else{
													//
												 }
												
											}else{
												$classM2M = new ReflectionClass($classeM2M);	
												$action = $classM2M->getMethod("excluirOnde");
												$action->invoke($classM2M->newInstance(), $objj.'_id'.$objj.' = ' . $id . ' and ' . $objetoM.'_id'.$objetoM.' = ' . $objM->getProperty("id".strtolower($objetoM))->getValue($oM));
											 }
											
											
							  	   			
										}
								
								/*******************************************************************/
								/*******************************************************************/
					  		 	
					  		 	
					  		 	
					  		 	
					  		 	
					  		 }  // fim else = "n" 
			      		 }// fim for $totalSaves  
			     		}// fim resposta != 0
			      	/**********************************************/
			      	
			      	
			      	
			     // }//fim if "object"  
			  	   
			  	   if($strResposta != 0){	
						$arrResposta = explode('*',$strResposta);
						$resposta = $arrResposta[0];
						$lastId = $arrResposta[1];
					}else{
						$resposta = 0;	
					 }	 
		  	     
		  	     if(isset($_POST['retorno']) && $resposta != 0){
		  	     	if($_POST['retorno'] == "lastID")
		  	     	 echo $lastId;	
		  	     }else{
			     	echo $resposta;	
		  	      }
		  	      
		  	    
		    }else if($acao == 'atualizarCampo'){
				
				$field = $_POST['campo'];
				$value = $_POST['valor'];
				$where = $_POST['onde'];
		  		
				$class = new ReflectionClass($classe);
		  	    $action = $class->getMethod($acao);
			   
			    $resposta = $action->invoke($class->newInstance(), $field, $value, $where) ? '1' : '0';
			    //$resposta = $action->invoke($class->newInstance(), $id);
			   
			    echo $resposta;		
				
				
					
			 }
		      
		
	}

?>