<?php include "template-site/header.php"; ?>
<?php include "template-site/top.php"; ?>

<script>
$(function () {
   $('#cpf').mask('000.000.000-00', {reverse: true});
   $('#cnpj').mask('00.000.000/0000-00', {reverse: true});


   var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
   },
   spOptions = {
      onKeyPress: function(val, e, field, options) {
         field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
   };

   //$('.telefone').mask(SPMaskBehavior, spOptions);

});

</script>

<section id="_contato-page" class="fluid">

   <div class="area-page-tit"><h1>Contato</h1></div>

   <div class="responsive">
      <div class="left">

         <form action="<?php echo $mainFolder; ?>/post/EmailPost" method="POST" mp-form>
            <div class="cmp">
               <input type="text" name="nome" placeholder="Nome" autocomplete="off" required>
            </div>
            <div class="cmp">
               <input type="email" name="email" placeholder="E-mail" autocomplete="off" required>
            </div>
            <div class="cmp">
               <input type="text" class="telefone" name="telefone" placeholder="Telefone" autocomplete="off" required>
            </div>
            <div class="cmp">
               <textarea name="mensagem" placeholder="Mensagem" autocomplete="off" required></textarea>
            </div>
            <button type="submit">Enviar mensagem</button>
         </form>

      </div>
      <div class="right">

         <div class="area-infos">
            <li class="telefone"><?php echo mascara_telefone($geral->telefone,'9999 999 9999'); ?></li>
            <li class="email"><?php echo $geral->email; ?></li>

            <div class="divider"></div>

            <li class="local">
               <?php echo $geral->endereco; ?><br>
               <?php echo $geral->bairro; ?><br>
               <?php echo $geral->cidade; ?>
            </li>

            <div id="mapa">
               <?php echo html_entity_decode($geral->googlemaps); ?>
            </div>
         </div>

      </div>
   </div>
</section>

<?php include "template-site/footer.php"; ?>
