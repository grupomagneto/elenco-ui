<div class="conteudo flexbox wrap text-align-center space-between-vertical justify-center">
    <div class="conteudo flexbox wrap text-align-center space-between-vertical justify-center">
        <div class="titulo heavy white large">
        Quem você deseja cadastrar?
        </div>
        <div class="subtitulo avenir white small">
        Apenas o Representante Legal pode cadastrar um menor
        </div>
        <div class="botoes" id="div_03_quem-voce-esta-cadastrando">
            <form action="#" method="post">
                <button id="btn_eu-mesmo-tenho-18" class="botao">Eu mesmo, tenho 18+</button>
                <input type="hidden" name="field" value="dt_nascimento" />
                <input type="hidden" name="value" value="<?php echo $birthday; ?>" />
                <input type="hidden" name="field2" value="sexo" />
                <input type="hidden" name="value2" value="<?php echo $sexo; ?>" />
                <input type="hidden" name="field3" value="nome_artistico" />
                <input type="hidden" name="value3" value="<?php echo $nome_artistico; ?>" />
            </form>
            <button id="btn_um-menor-de-idade" class="botao">Um menor de idade</button>
        </div>
    </div>
</div>