<div class='conteudo flexbox wrap text-align-center validacao-ok justify-center'>
    <div class='conteudo flexbox wrap text-align-center validacao-ok justify-center'>
        <div class='titulo heavy white large'>
        Qual o seu CPF?
        </div>
        <div class='subtitulo avenir white small flexbox wrap text-align-center justify-center input-validacao-ok'>
            <form action="#" method="post">
                <input type="hidden" name="field" value="cpf" />
                <input type="text" name="value" id="cpf-maior" class="cpf" placeholder="000.000.000-00" />
                <input type="hidden" id="nome-cpf_field" name="field2" value="" />
                <input type="hidden" id="nome-cpf_value" name="value2" value="" />
                <button class="ok" id="ok_cpf-maior" style="display: none;"><img src="../_images/ok_neg.svg" /></button>
            </form>
            <div class="subtexto flexbox nowrap text-align-center">
                <p id="status" class="status"></p>
                <img id="cpf-maior-valido" class="icon-cpf valido" src="../_images/ok_check.svg" style="display: none;" />
                <img id="cpf-maior-invalido" class="icon-cpf invalido" src="../_images/wrong.svg" style="display: none;" />
            </div>
        </div>
    </div>
</div>
