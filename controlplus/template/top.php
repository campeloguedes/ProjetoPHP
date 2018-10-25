<style type="text/css">.developed_by{display:none;}</style><style type="text/css">.developed_by{display:none;}</style><style type="text/css">.developed_by{display:none;}</style><style type="text/css">.developed_by{display:none;}</style><style type="text/css">.developed_by{display:none;}</style><style type="text/css">.developed_by{display:none;}</style><style type="text/css">.developed_by{display:none;}</style><style type="text/css">.developed_by{display:none;}</style><style type="text/css">.developed_by{display:none;}</style> </head>
<body>

<!-- ###     Início Layout/Site     ### -->
<div id="Layout">

	<!-- ###     Início Topo     ### -->
	<div id="Header">
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/logo_control_plus_2.png" alt="Control Plus" class="logo" style="cursor:pointer;" onClick="window.location='<?php echo $mainFolder; ?>/controlplus/home';" />
		
		<div class="top_menu">
			<a href="<?php echo $mainFolder; ?>/controlplus/home" title="Página inicial"><strong>Página inicial</strong></a>
			<a href="<?php echo $mainFolder; ?>/controlplus/listAdmin" title="Controle de acesso">Controle de acesso</a>
			<a href="<?php echo $mainFolder; ?>/controlplus/listLog" title="Logs" class="last">Logs</a>
			
		</div>
		
		<input type="text" alt="Digite sua solicitação de suporte ou manutenção. A mensagem será enviada para Media Plus e será retornada o mais breve possível." title="Digite sua solicitação de suporte ou manutenção que retornaremos o mais breve possível." value="Envie sua solicitação de suporte ..." name="c2" id="c2" class="ipt_search" onFocus="if (this.value == 'Envie sua solicitação de suporte ...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Envie sua solicitação de suporte ...';}" />
		<input onClick="enviaSolicitacao();" type="image" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_ok.png" id="btn_access" class="btn" alt="Pesquisar" />
		
		<div class="top_links">
			<a href="<?php echo $mainFolder; ?>/controlplus/alterarDados/<?php echo $_SESSION['codAdmin']; ?>" title="Alterar dados">Alterar dados</a>
			<a href="<?php echo $mainFolder; ?>/controlplus/sair" title="Sair" class="last">Sair</a>
		</div>

		<div class="painel">
		  <img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_msg.jpg" alt="Mensagem" />
		  <span class="mensagem_info">Você possui <a href="#" title="Clique aqui para ler suas mensagens">0</a> mensagem(s).</span>
			
		  <div>
			Cliente: <span>Feito no Tocantins</span><br />
			Usuário: <span><?php echo $_SESSION['identificacao']; ?></span>
		  </div>
		  
		  <div class="last">
			Último acesso: <span><?php echo $_SESSION['log_dt']; ?></span> às <span><?php echo str_replace(":", "h", $_SESSION['log_hr']); ?></span><br />
			Host IP: <span><?php echo $_SESSION['log_ip']; ?></span>
		  </div>
		</div>
	</div>
	<!-- ###     Fim Topo     ### -->
