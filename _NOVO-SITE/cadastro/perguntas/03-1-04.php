<div class='conteudo flexbox wrap text-align-center validacao-ok justify-center'>
    <div class='conteudo flexbox wrap text-align-center validacao-ok justify-center'>
        <div class='titulo heavy white large'>
        Qual o CEP da sua residência?
        </div>
        <div class='subtitulo avenir white small flexbox wrap text-align-center justify-center input-validacao-ok'>
            <form action="#" method="post">
                <input type="hidden" id="cep_field" name="field" value="cep" />
                <input type="text" id="cep-maior" name="value" class="cep" placeholder="00.000-000" />
                <input type="hidden" id="bairro_field" name="field2" value="bairro" />
                <input type="hidden" id="bairro_value" name="value2" value="" />
                <input type="hidden" id="cidade_field" name="field3" value="cidade" />
                <input type="hidden" id="cidade_value" name="value3" value="" />
                <input type="hidden" id="uf_field" name="field4" value="uf" />
                <input type="hidden" id="uf_value" name="value4" value="" />
                <input type="hidden" id="endereco_field" name="field5" value="endereco" />
                <input type="hidden" id="endereco_value" name="value5" value="" />
                <button class="ok" id="ok_cep-maior" style="display: none;"><img src="../_images/ok_neg.svg" /></button>
            </form>
            <div class="subtexto flexbox nowrap text-align-center">
                <p id="status" class="status"></p>
                <img id="cep-maior-valido" class="icon-cpf valido" src="../_images/ok_check.svg" style="display: none;" />
                <img id="cep-maior-invalido" class="icon-cpf invalido" src="../_images/wrong.svg" style="display: none;" />
            </div>
        </div>
    </div>
</div>
