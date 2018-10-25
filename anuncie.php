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

   $(document).on("input", "#produz", function () {
      var limite = 256;
      var informativo = "caracteres restantes.";
      var caracteresDigitados = $(this).val().length;
      var caracteresRestantes = limite - caracteresDigitados;


      if (caracteresRestantes <= 0) {
         var comentario = $("textarea[id=produz]").val();
         $("textarea[name=produz]").val(comentario.substr(0, limite));
         $(".caracteres").text("0 " + informativo);
      } else {
         $(".caracteres").text(caracteresRestantes + " " + informativo);
      }
   });

   $("input[name=realizaentrega]").click(function () {
      var valor = $(this).val();

      if (valor == "1") {
         $(".transporte").show();
      } else {
         $(".transporte").hide();
      }

   })
})
</script>

<section id="_anuncie-page" class="fluid">

   <div class="area-page-tit">
      <h1>Anuncie Grátis</h1>
   </div>

   <div class="responsive">

      <div class="area-anuncie">
         <div class="area-anuncie-int">
            <div class="left">
               <form action="<?php echo $mainFolder; ?>/post/AnunciantePost" method="POST" mp-form>
                  <div class="cmp">
                     <input type="text" name="titulo" placeholder="Nome" autocomplete="off" required maxlength="150">
                  </div>
                  <div class="cmp ck">
                     <input type="radio" name="sexo" value="masculino"> <span>Masculino</span>
                     <input type="radio" name="sexo" value="feminino"> <span>Feminino</span>
                  </div>
                  <div class="cmp">
                     <input id="cpf" type="text" name="cpf" placeholder="CPF" autocomplete="off" required maxlength="30">
                  </div>
                  <div class="cmp">
                     <input type="text" name="fantasia" placeholder="Nome fantasia do seu negócio" maxlength="150">
                  </div>
                  <div class="cmp">
                     <input id="cnpj" type="text" name="cnpj" placeholder="CNPJ" autocomplete="off" required maxlength="30">
                  </div>
                  <div class="cmp">
                     <input type="email" name="email" placeholder="E-mail" autocomplete="off" required>
                  </div>
                  <div class="cmp">
                     <input type="text" class="telefone" name="telefone1" placeholder="Telefone 1" required maxlength="20">
                     <div class="whats">
                        <input type="checkbox" name="wh">
                        <span>Marque se for <br> Whatsapp</span>
                     </div>
                  </div>
                  <div class="cmp">
                     <input type="text" class="telefone" name="telefone2" placeholder="Telefone 2" maxlength="20">
                     <div class="whats">
                        <input type="checkbox" name="wh">
                        <span>Marque se for <br> Whatsapp</span>
                     </div>
                  </div>
                  <div class="cmp">
                     <input type="text" class="telefone" name="telefone3" placeholder="Telefone 3" maxlength="20">
                     <div class="whats">
                        <input type="checkbox" name="wh">
                        <span>Marque se for <br> Whatsapp</span>
                     </div>
                  </div>
                  <div class="cmp">
                     <textarea name="endereco" placeholder="Endereço Completo" autocomplete="off"
                     required maxlength="256"></textarea>
                  </div>
                  <div class="cmp">
                     <input type="text" name="cidade" placeholder="Cidade" autocomplete="off" required maxlength="80">
                     <div class="uf">/ TO</div>
                  </div>
                  <div class="cmp">
                     <textarea name="oqueproduz" placeholder="O que você produz?" id="produz"></textarea>
                     <div class="contador">
                        <small class="caracteres">256 caracteres restantes.</small>
                     </div>
                  </div>
                  <div class="tit-cmp">Você realiza a entrega dos seus produtos?</div>
                  <div class="cmp ck">
                     <input type="radio" name="realizaentrega" value="1"> <span>Sim</span>
                     <input type="radio" name="realizaentrega" value="0"> <span>Não</span>
                  </div>
                  <div class="cmp transporte" style="display: none;">
                     <input type="text" name="transporte" placeholder="Qual o meio de transporte">
                  </div>
                  <div class="tit-cmp">Quais as formas de pagamento que você oferece?</div>
                  <div class="cmp ck ckb">
                     <div class="line">
                        <input type="checkbox" name="credito" value="Crédito">
                        <span>Cartão de Crédito</span>
                     </div>
                     <div class="line">
                        <input type="checkbox" name="formasdepagamento[]" value="Débito"> <span>Cartão de Débito</span>
                     </div>
                     <div class="line">
                        <input type="checkbox" name="formasdepagamento[]" value="Cheque"> <span>Cheque</span>
                     </div>
                     <div class="line">
                        <input type="checkbox" name="formasdepagamento[]" value="Boleto"> <span>Boleto</span>
                     </div>
                     <div class="line">
                        <input type="checkbox" name="formasdepagamento[]" value="Dinheiro">
                        <span>Dinheiro em Espécie</span>
                     </div>
                  </div>
                  <div class="tit-cmp">Tem disponibilidade para atender ligações telefônicas de futuros
                     clientes?
                  </div>
                  <div class="cmp ck">
                     <input type="radio" name="atendeligacoes" value="1"> <span>Sim</span>
                     <input type="radio" name="atendeligacoes" value="0"> <span>Não</span>
                  </div>
                  <div class="tit-cmp">Qual a frequência que você abre sua caixa de e-mail?</div>
                  <div class="cmp ck ckb">
                     <div class="line">
                        <input type="radio" name="frequenciaemail" value="A todo instante">
                        <span>A todo instante</span>
                     </div>
                     <div class="line">
                        <input type="radio" name="frequenciaemail" value="1 vez ao dia">
                        <span>1 vez ao dia</span>
                     </div>
                     <div class="line">
                        <input type="radio" name="frequenciaemail" value="1 vez por semana"> <span>1 vez por semana</span>
                     </div>
                     <div class="line">
                        <input type="radio" name="frequenciaemail" value="1 vez por mês">
                        <span>1 vez por mês</span>
                     </div>
                     <div class="line">
                        <input type="radio" name="frequenciaemail" value="Raramente"> <span>Raramente</span>
                     </div>
                  </div>
                  <div class="tit-cmp">Autoriza o Sebrae Tocantins levantar informações detalhadas referente
                     aos seus produtos, bem como produção das imagens que deverão ilustrar seus anúncios?
                  </div>
                  <div class="cmp ck">
                     <input type="radio" name="autorizaosebrae" value="1"> <span>Sim</span>
                     <input type="radio" name="autorizaosebrae" value="0"> <span>Não</span>
                  </div>

                  <button type="submit">Enviar Cadastro</button>

               </form>
            </div>

            <div class="right">
               <div class="area-infos">
                  <div class="info-top">
                     <h1><?php echo mascara_telefone($geral->telefone, '9999 999 9999'); ?></h1>
                     <h2><?php echo $geral->email; ?></h2>
                  </div>

                  <div class="info-txt">
                     <h1>Informações</h1>
                     <p>Sabemos que cada produto e serviço tem muito valor. Reunimos o que há de melhor no Tocantins em uma vitrine virtual para mostramos ao mundo, valorizar nossas técnicas e aproximar quem precisa de quem tem e faz bem feito. Ao preencher essas perguntinhas básicas você nos ajuda nessa missão. É bem rapidinho. Bons Negócios!</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </section>

   <?php include "template-site/footer.php"; ?>
