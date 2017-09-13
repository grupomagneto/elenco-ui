<form action="#" method="post">
    <div class='conteudo flexbox wrap text-align-center validacao-ok justify-center'>
        <div class='conteudo flexbox wrap text-align-center validacao-ok justify-center'>
            <div class='titulo heavy white large'>
            Qual o CPF del<span class="dele"></span>?
            </div>
            <div class='subtitulo avenir white small flexbox wrap text-align-center justify-center input-validacao-ok'>
                <input type="hidden" name="field" value="cpf_menor" />
                <input type="text" name="value" id="cpf-menor-value" class="cpf" placeholder="000.000.000-00" />
                <input type="hidden" name="field2" value="nome" />
                <input type="hidden" id="nome-cpf_value_menor" name="value2" value="" />
                <input type="hidden" name="field3" value="nome_artistico" />
                <input type="hidden" id="nome-artistico_value_menor" name="value3" value="" />
                <button class="ok" id="ok_cpf-menor" style="display: none;"><img src="../_images/ok_neg.svg" /></button>
                <div class="subtexto flexbox nowrap text-align-center">
                    <p id="status" class="status"></p>
                    <img id="cpf-menor-valido" class="icon-cpf valido" src="../_images/ok_check.svg" style="display: none;" />
                    <img id="cpf-menor-invalido" class="icon-cpf invalido" src="../_images/wrong.svg" style="display: none;" />
                </div>
            </div>
        </div>
    </div>
</form>
