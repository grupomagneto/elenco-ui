<form id="form-cartao" action="#" method="post">
  <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
      <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
          <div class='titulo heavy white large'>
          Dados do cartão de crédito
          </div>
          <div class='subtitulo avenir white small'>
          Clique nos campos para inserir os dados do Cartão de Crédito
              <div class="titular-inputs">
                <div class="descricao-inputs">
                    <span class='texto_input'>NÚMERO:</span>
                    <input type='text' id='numero-cartao-de-credito' class="input-field inputs" placeholder='Número do cartão' required />
                </div>
                <div class="descricao-inputs">
                    <span class='texto_input'>NOME:</span>
                    <input type='text' id='Portador' class="input-field inputs" placeholder='Nome no cartão' required />
                </div>
                <div class="descricao-inputs">
                    <span class='texto_input'>VALIDADE:</span>
                    <input type='text' id='validade-cartao' class="input-field inputs validade" size='5' maxlength="5" required placeholder='MM/AA' />
                    <span class='texto_input'>CVV:</span>
                    <input type='text' id='cvv' class="input-field inputs cvv" size='4' maxlength="4" required placeholder= 'CVV' />

                    <span class='texto_input' id='texto_input-parcelas'>PARCELAS:</span>
                    <input type='number' id='parcelas' name='parcelas' class="input-field inputs parcelas" value='1' max="10" min="1" maxlength="2" required placeholder= '1' />

                    <textarea id="public_key" style="display:none;">
                          -----BEGIN PUBLIC KEY-----
                    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAq3OIiMNWs40s509N2Jqo
                    hcvvb/ebp9AoTjwv+apK08EBlk64MK890R1wpXWR21Fn6LN+b7RP6afkyN/Du0e7
                    KBO99DJ97MA3h3d1R38AQkhogfnh34CaVL56vx/Bpo3yXuNXkbXFq1YIBfbEHJar
                    zSxl0wPnPo46Vt4/vO3MYUVyEPgLzRV8aSf1JdQ6Tyjhg5QpCye0BEDRPwMxRKkT
                    +We8JeKtsLEi0y1tkHjbPcSMdHEowkgUkjL5zzBdE+F6bs5hdAg4OD/VGfhWp+jn
                    z+vWGEqZxHDgEraHjzTXQnl6GoJqPojMfp3TxIMZDk/8rla432zy/qUHuMSAk6eB
                    VQIDAQAB
                    -----END PUBLIC KEY-----
                    </textarea>
                    <input type="hidden" name="id_elenco" id="input-hidden-cartao-id-elenco" value="<?php echo $_SESSION['id_elenco']; ?>" />
                    <input type="hidden" name="data_nascimento" id="input-hidden-cartao-data_nascimento" value="" />
                    <input type="hidden" name="email" id="input-hidden-cartao-email" value="<?php echo $_SESSION['email']; ?>" />
                    <input type="hidden" name="cpf_titular" id="input-hidden-cartao-cpf_titular" value="" />
                    <input type="hidden" name="nome_pagador" id="input-hidden-cartao-nome_titular" value="" />
                    <input type="hidden" name="DDD" id="input-hidden-cartao-DDD" value="" />
                    <input type="hidden" name="cel" id="input-hidden-cartao-cel" value="" />
                    <input type="hidden" name="cep" id="input-hidden-cartao-cep" value="" />
                    <input type="hidden" name="endereco" id="input-hidden-cartao-endereco" value="" />
                    <input type="hidden" name="bairro" id="input-hidden-cartao-bairro" value="" />
                    <input type="hidden" name="cidade" id="input-hidden-cartao-cidade" value="" />
                    <input type="hidden" name="uf" id="input-hidden-cartao-uf" value="" />
                    <input type="hidden" name="numero" id="input-hidden-cartao-numero" value="" />
                    <input type="hidden" name="complemento" id="input-hidden-cartao-complemento" value="" />
                    <input type="hidden" name="produto" id="input-hidden-cartao-produto" value="" />
                    <input type="hidden" name="valor" id="input-hidden-cartao-valor" value="" />
                    <input type="hidden" name="forma_pagamento" id="input-hidden-cartao-forma_pagamento" value="" />
                    <input type="hidden" name="desconto" id="input-hidden-cartao-desconto" value="0" />
                    <input type="hidden" name="encrypted_value" id="encrypted_value" value="" />
                </div>
              </div>
          </div>
          <div class='botoes'>
              <button class='botao' id='btn_pagar-com-cartao-de-credito'><span id="valor-pagar-cartao" class="valor_pagar"></span></button>
              <div class='moip'>
                <a href='http://www.moip.com.br' target='_blank'><img src='../_images/moip167px.png' /></a>
              </div>
          </div>
      </div>
  </div>
</form>
