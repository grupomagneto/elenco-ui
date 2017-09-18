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
                  <input type='text' id='Numero' name='Numero' class="input-field inputs" value='' placeholder= 'Número do cartão' required />
              </div>
              <div class="descricao-inputs">
                  <span class='texto_input'>NOME:</span>
                  <input type='text' id='Portador' name='Portador' class="input-field inputs" value='' placeholder= 'Nome no cartão' required />
              </div>
              <div class="descricao-inputs">
                  <span class='texto_input'>MÊS:</span>
                  <input type='text' id='mes' name='Expiracao' class="input-field inputs validade" value='' size='5' maxlength="5" required placeholder= 'MM/AA' />
                  <span class='texto_input'>ANO:</span>
                  <input type='text' id='mes' name='Expiracao' class="input-field inputs validade" value='' size='5' maxlength="5" required placeholder= 'AAAA' />

                  <span class='texto_input'>CVV:</span>
                  <input type='text' id='CodigoSeguranca' name='CodigoSeguranca' class="input-field inputs cvv" value='' size='4' maxlength="4" required placeholder= 'CVV' />

                  <input type='hidden' id='CPF' name='CPF' value='<? echo $cpf;?>' />
                  <input type='hidden' id='DataNascimento' name='DataNascimento' value='<? echo $dt_nascimento; ?>' />
                  <input type='hidden' id='Telefone' name='Telefone' value='<? echo $ddd.$cel; ?>' />

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
    <textarea style="display:none;" name="encrypted_value" id="encrypted_value"></textarea>

      <input type="hidden" class='botao' value="encrypt" id='encrypt' />
                  <!-- <select id='parcelas' class="select-dropdown parcelas" name='Parcelas'>
                    <option value='1' selected>1x</option>
                    <option value='2'>2x</option>
                    <option value='3'>3x</option>
                    <option value='4'>4x</option>
                    <option value='5'>5x</option>
                    <option value='6'>6x</option>
                    <option value='7'>7x</option>
                    <option value='8'>8x</option>
                    <option value='9'>9x</option>
                    <option value='10'>10x</option>
                  </select> -->
              </div>
            </div>
        </div>
        <div class='botoes'>
            <button class='botao' id='sendToMoip'>Pagar (R$ <span id='valor_pagar-cartao'></span>,00)</button>
            <input type="hidden" name="forma_pagamento" id="forma_pagamento" value="" />
            <input type="hidden" name="n_parcelas" id="n_parcelas" value="" />
            <div class='moip'>
              <a href='http://www.moip.com.br' target='_blank'><img src='../_images/moip167px.png' /></a>
            </div>
        </div>
    </div>
</div>
