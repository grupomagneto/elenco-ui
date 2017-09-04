<div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='titulo heavy white large'>
        Qual a sua data de nascimento?
        </div>
        <form action="#" method="post">
            <div class='subtitulo avenir white small'>
                <input type="hidden" id="dt_nascimento_field" name="field" value="dt_nascimento" />
                <input type="date" id="data-maior" name="value" class="data" placeholder="00/00/0000" />
                <div class="subtexto flexbox nowrap text-align-center">
                    <p id="status" class="status"></p>
                    <img id="data-maior-valido" class="icon-cpf valido" src="../_images/ok_check.svg" style="display: none;" />
                    <img id="data-maior-invalido" class="icon-cpf invalido" src="../_images/wrong.svg" style="display: none;" />
                </div>
            </div>
            <div class='botoes'>
                <button id='btn_data-maior' class='botao'>Continuar</button>
            </div>
        </form>
    </div>
</div>