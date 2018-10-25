</div>
<!-- ###     Fim Layout/Site     ### -->

<!-- ###     Início Rodapé     ### -->
<div id="Footer"><div class="content_footer">

	<div class="copyright">
		<div class="simbMP"></div>
		<span class="system">Controlplus, <?php echo date("Y") ?> .</span> <span class="versao">Versão 2.5</span>
		Todos os direitos reservados.
	</div>

	<div class="developed_by">by <a href="http://www.mediaplus.com.br/" target="_blank" title="Desenvolvido por: Media Plus">Mediaplus</a></div>
</div></div>
<!-- ###     Fim Rodapé     ### -->
<div id='info_sendsupport' title='controlplus - informação'></div>

<?php 
require_once("model/Perfilmodulo.class.php");
if(isset($_SESSION['modss_objects'])){
	foreach($_SESSION['modss_objects'] as $perfmod){	
		    $perfmod = unserialize($perfmod);				
			?>
			<script type="text/javascript">
				document.getElementById("menu_<?php echo $perfmod->Modulo->idmodulo ?>").style.display = 'block';
			</script>
			<?php 
	}
}
?>

</body>
</html>
