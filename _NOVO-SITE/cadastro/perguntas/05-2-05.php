<form action="#" method="post">
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
            <div class='titulo heavy white large'>
            Complete o seu endereço
            </div>
            <div class='subtitulo avenir white small'>
                <div class="endereco-descricao">
                    Endereço:<BR />
                    Bairro:<BR />
                    Cidade:<BR />
                    CEP:<BR />
                </div>
                <div class="endereco-dados">
                    <span id="confirma-endereco" class="confirma-endereco"></span><BR />
                    <span id="confirma-bairro" class="confirma-bairro"></span><BR />
                    <span id="confirma-cidade-uf" class="confirma-cidade-uf"></span><BR />
                    <span id="confirma-cep" class="confirma-cep"></span><BR />
                </div>
                <div class="endereco-inputs">
                    <div class="descricao-inputs">
                        <span class='texto_input'>COMPLEMENTO:</span>
                        <input type="hidden" id="input_complemento-field" name="field2" value="complemento" />
                        <input type='text' id="input_complemento-value" name='value2' class="input-field inputs complemento" value='' placeholder='Complemento' required />
                    </div>
                    <div class="descricao-inputs">
                        <span class='texto_input'>NÚMERO:</span>
                        <input type="hidden" id="input_numero-field" name="field" value="numero" />
                        <input type='text' id="input_numero-value" name='value' class="input-field inputs numero-casa" value='' placeholder='Nº' required />
                    </div>
                </div>
            </div>
            <div class='botoes'>
                <button id='btn_completa-endereco' class='botao'>Continuar</button>
            </div>
        </div>
    </div>
</form>