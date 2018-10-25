<?php include "template-site/header.php"; ?>
<?php include "template-site/top.php"; ?>

    <section id="_institucional-page" class="fluid">

        <div class="area-page-tit">
            <h1>Parceiros</h1>
        </div>

        <div class="responsive">

            <div class="categorias">
                <ul>
                    <li>
                        <a href="<?php echo $mainFolder; ?>/institucional" <?php if ($page == "institucional") { ?> class="ativo" <?php } ?>>Sobre
                            Nós</a></li>
                    <li><a href="">Objetivos</a></li>
                    <li><a href="">Responsabilidade</a></li>
                    <li>
                        <a href="<?php echo $mainFolder; ?>/parceiros" <?php if ($page == "parceiros") { ?> class="ativo" <?php } ?>>Parceiros</a>
                    </li>
                </ul>
            </div>

            <div class="select-mobile">
                <div class="form-select">
                    <span><strong>Selecione uma categoria</strong></span>
                    <select name="categoria" required="true" aria-required="true">
                        <option value="">Selecione uma categoria</option>
                        <option value="institucional">Sobre Nós</option>
                        <option value="objetivos">Objetivos</option>
                        <option value="responsabilidade">Responsabilidade</option>
                        <option value="parceiros">Parceiros</option>
                    </select>
                </div>
            </div>


            <p class="area-txt">

                Sed id eleifend mi. Aliquam fringilla urna dui, a fringilla sapien eleifend molestie. Pellentesque eget
                felis et ligula consectetur feugiat aecenas lobortis orci ac magna gravida dignissim. Phasellus eget
                tempor ligula, et pulvinar ante. Maecenas tempor ante auctor magna porta, sed lobortis dolor auctored
                posuere lacus et posuere aliquet. Sed non leo in diam ultrices scelerisque ac vitae ante.
            </p>


            


        </div>
    </section>

<?php include "template-site/footer.php"; ?>