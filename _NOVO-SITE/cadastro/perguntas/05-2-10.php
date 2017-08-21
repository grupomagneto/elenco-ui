<div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='titulo heavy white large'>
        Endereço da fatura do cartão
        </div>
        <div class='subtitulo avenir white small'>
        Clique nos campos para inserir os dados do Endereço da Fatura
            <div class="titular-inputs">
                <div class="descricao-inputs">
                    <span class="texto_input">CEP:</span>
                    <input type="text" name="cep" id="cep-pagador" class="input-field inputs" value="" placeholder="CEP" required />
                </div>
                <div class="descricao-inputs">
                    <span class="texto_input">ENDEREÇO:</span>
                    <input type="text" name="endereco" id="endereco-pagador" class="input-field inputs" value="" placeholder="Endereço" required />
                </div>
                <div class="descricao-inputs">
                    <span class="texto_input">NÚMERO:</span>
                    <input type="text" name="numero" id="numero-casa-pagador" class="input-field inputs numero-casa" value="" placeholder="Nº" required />
                    <span class="texto_input">COMPLEMENTO:</span>
                    <input type="text" name="complemento" id="complemento-pagador" class="input-field inputs complemento" value="" placeholder="Complemento" required />
                </div>
                <div class="descricao-inputs">
                    <span class="texto_input">BAIRRO:</span>
                    <input type="text" name="bairro" id="bairro-pagador" class="input-field inputs" value="" placeholder="Bairro" required />
                </div>
                <div class="descricao-inputs">
                    <span class="texto_input">CIDADE:</span>
                    <input type="text" name="cidade" id="cidade-pagador" class="input-field inputs cidade" value="" placeholder="Cidade" required />
                    <span class="texto_input">UF:</span>
                    <input type="text" name="uf" id="uf-pagador" class="input-field inputs uf" value="" placeholder="UF" required />
                    <input type="hidden" name="id_usuario" value="<? echo $id_usuario; ?>" />
                    <input type="hidden" name="produto" id="envia_pagador-cadastro" value="" />
                    <input type="hidden" name="valor" id="envia_pagador-valor" value="" />
                    <input type="hidden" name="nome" id="envia_pagador-nome" value="" />
                    <input type="hidden" name="cpf" id="envia_pagador-cpf" value="" />
                    <input type="hidden" name="email" id="envia_pagador-email" value="" />
                    <input type="hidden" name="tel" id="envia_pagador-tel" value="" />
                </div>
            </div>
        </div>
        <div class='botoes'>
            <button id='btn_endereco-titular-cartao' class='botao'>Continuar</button>
        </div>
    </div>
</div>