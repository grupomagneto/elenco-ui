<div class="conteudo flexbox wrap text-align-center space-between-vertical justify-center">
    <div class="conteudo flexbox wrap text-align-center space-between-vertical justify-center">
        <div class="titulo heavy white large">
        Quem você deseja cadastrar?
        </div>
        <div class="subtitulo avenir white small">
        Apenas o Representante Legal pode cadastrar um menor
        </div>
        <div class="botoes">
            <form action="#" method="post">
                <input type="hidden" name="field" value="dt_nascimento" />
                <input type="hidden" name="value" id="dt_nascimento-maior" value="<?php echo $_SESSION['dt_nascimento']; ?>" />
                <input type="hidden" name="field2" value="sexo" />
                <input type="hidden" name="value2" id="sexo-maior" value="<?php echo $_SESSION['sexo']; ?>" />
                <input type="hidden" name="field3" value="nome_artistico" />
                <input type="hidden" name="value3" value="<?php echo $_SESSION['nome_artistico']; ?>" />
                <button id="btn_eu-mesmo-tenho-18" class="botao">Eu mesmo, tenho 18+</button>
            </form>
            <button id="btn_um-menor-de-idade" class="botao">Um menor de idade</button>
        </div>
    </div>
</div>