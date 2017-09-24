<div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='titulo heavy white large'>
        Dados do titular do cartão
        </div>
        <div class='subtitulo avenir white small'>
        Clique nos campos para inserir os dados do Titular do Cartão
            <div class="titular-inputs">
                <div class="descricao-inputs">
                    <span class='texto_input'>CPF:</span>
                    <input type='text' class="input-field cpf inputs" id='cpf-titular' maxlength="14" value='' placeholder='CPF' required />
                </div>
                <div class="descricao-inputs">
                    <span class='texto_input'>NOME COMPLETO:</span>
                    <input type='text' class="input-field inputs" id='nome_completo-titular' value='' placeholder='Nome completo' required />
                </div>
                <div class="descricao-inputs">
                    <span class='texto_input'>DATA DE NASCIMENTO:</span>
                    <input type='date' class="input-field inputs" id='data_nascimento-titular' value='' placeholder='dd/mm/aaaa'required />
                </div>
                <div class="descricao-inputs">
                    <span class='texto_input'>DDD:</span>
                    <input type='tel' id='DDD-titular' class="input-field inputs" maxlength="2" value='' placeholder='DDD' required />
                    <span class='texto_input'>CELULAR:</span>
                    <input type='tel' id='cel-titular' class="input-field cel inputs" maxlength="11" value='' placeholder='Telefone' required />
                </div>
                <div class="descricao-inputs">
                    <span class='texto_input'>E-MAIL:</span>
                    <input type='email' class="input-field inputs" id='email-titular' value='' placeholder='E-mail' required />
                </div>
            </div>
        </div>
        <div class='botoes'>
            <button id='btn_dados-titular-cartao' class='botao'>Continuar</button>
        </div>
    </div>
</div>
