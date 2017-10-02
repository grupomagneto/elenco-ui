<form action="#" method="post" id="form_aceita-desconto">
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
            <div class='titulo heavy white large'>
            Desconto para horário sugerido
            </div>
            <div class='subtitulo avenir white small'>
            Ganhe 5% de desconto ao aceitar o seguinte horário para sessão de fotos: <BR /><BR /><span class="heavy medium"><?php echo $data_desconto; ?></span>
            </div>
            <div class='botoes'>
                <input type="hidden" name="date" id="input-hidden_discount-date" value="<?php echo $data_desconto_unformat; ?>" />
                <input type="hidden" name="hour" id="input-hidden_discount-hour" value="<?php echo $hour; ?>" />
                <input type="hidden" name="minutes" id="input-hidden_discount-minutes" value="<?php echo $minutes; ?>" />
                <input type="hidden" name="tipo_ensaio" id="input-hidden_discount-tipo_ensaio" value="" />
                <button id='btn_aceito-data-desconto' class='botao'>Aceito, quero o desconto</button>
                <button id='btn_nao-posso-nesse-horario' class='botao'>Não posso nesse horário</button>
            </div>
        </div>
    </div>
</form>
