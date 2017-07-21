<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>teste moip</title>
</head>
<body>

 <form class='forms' name='form_atualiza-dados' id='form_atualiza-dados' action='' method='post'>
              <span class='texto_input'>Nome:</span>
              <input type='text' name='nome' id='nome' value='Karina Pereira' placeholder='nome' required />
              <span class='texto_input'>DDD:</span>
              <input type='tel' name='DDD' id='DDD' value='61' placeholder='DDD' required />
              <span class='texto_input'>CELULAR:</span>
              <input type='tel' name='cel' id='cel' value='982837175' placeholder='Telefone' required /><BR />
              <span class='texto_input'>E-MAIL:</span>
              <input type='email' name='email' id='email' value='kapcruz@gmail.com' placeholder='E-mail' required /><BR />
              <span class='texto_input'>CEP:</span>
              <input type='text' name='cep' id='cep' value='72210105' placeholder='CEP' required /><BR />
              <span class='texto_input'>ENDEREÇO:</span>
              <input type='text' name='endereco' id='endereco' value='QNM 10 CONJUNTO E' placeholder='Endereço' required />
              <span class='texto_input'>NÚMERO:</span>
              <input type='text' name='numero' id='numero-casa' value='20' placeholder='Nº' required /><BR />
              <span class='texto_input'>COMPLEMENTO:</span>
              <input type='text' name='complemento' id='complemento' value='casa 20' placeholder='Complemento' required />
              <span class='texto_input'>BAIRRO:</span>
              <input type='text' name='bairro' id='bairro' value='ceilândia' placeholder='Bairro' required />
              <BR />
              <span class='texto_input'>CIDADE:</span>
              <input type='text' name='cidade' id='cidade' value='brasilia' placeholder='Cidade' required />
              <span class='texto_input'>UF:</span>
              <input type='text' name='uf' id='uf' value='df' placeholder='UF' required />
            </div>

            <!-- <input type='hidden' name='id_usuario' value='<? ?>' /> -->
            <!-- <input type='hidden' name='cadastro' value='' id='input-botao_atualiza-dados' /> -->

            <span class='texto_input'>NOME:</span>
            <input type='text' id='Portador' name='Portador' value='karina pereira' placeholder= 'Nome (como no cartão)' required />
            <br/>

 <input type="text" placeholder="Credit card number" id="number" value="5555666677778884" />
    <input type="text" placeholder="CVC" id="cvc" value="123" />
    <input type="text" placeholder="Month" id="month" value="05" />
    <input type="text" placeholder="Year" id="year" value="18" />
    <textarea id="public_key">
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
    <textarea name="encrypted_value" id="encrypted_value"></textarea>

            <input type='hidden' id='CPF' name='CPF' value='03484087145' />
            <input type='hidden' id='DataNascimento' name='DataNascimento' value='1993-01-23' />
           

            <span class='texto_input' id='texto_input-parcelas'>PARCELAS:</span>
            <select id='parcelas' name='Parcelas'>
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
            </select>

            <br/>


    <input type="text" placeholder="Card Type" id="card_type" />
      <input type="button" class='botao' value="encrypt" id='encrypt' />
      <input type="submit" class='botao' value="pagar com cartão" id='pagar-com-cartao' />
      <input type="submit" class='botao' value="pagar com boleto" id='pagar-com-boleto' />

 </form>

 <pre id="boleto"></pre>

 <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
 <script type="text/javascript" src="//assets.moip.com.br/v2/moip.min.js"></script>
 <script>

  $("#encrypt").click(function(){
       var cc = new Moip.CreditCard({
            number  : $("#number").val(),
            cvc     : $("#cvc").val(),
            expMonth: $("#month").val(),
            expYear : $("#year").val(),
            pubKey  : $("#public_key").val()
          });
          console.log(cc);
          if( cc.isValid()){
            $("#encrypted_value").val(cc.hash());
            $("#card_type").val(cc.cardType());
          }
          else{
            $("#encrypted_value").val('');
            $("#card_type").val('');

            alert('Cartão de Crédito inválido. Por favor verifique os parâmetros: número, cvv e validade');
          }

           jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/teste/moip-teste/atualiza-dados.php",
        data: dados,
        success: function( data ) {

          alert('dados enviados');
        }
      });
      return false;
    });
  });


  $("#pagar-com-cartao").click(function(){
    // Ajax Pagamento com cartão
    jQuery("form").submit(function(){
      var dados = jQuery(this).serialize();
      jQuery.ajax({
        type: "POST",
        dataType: "html",
        url: "http://localhost:8888/elenco-ui/teste/moip-teste/atualiza-dados.php",
        data: dados,
        success: function( data ) {

          alert('dados enviados');
        }
      });
      return false;
    });
  });

  $("#pagar-com-boleto").click(function(){
      // Ajax Pagamento com cartão
      jQuery("form").submit(function(){
        var dados = jQuery(this).serialize();
        jQuery.ajax({
          type: "POST",
          dataType: "html",
          url: "http://localhost:8888/elenco-ui/teste/moip-teste/pagamento-boleto.php",
          data: dados,
          success: function( data ) {

            $("#boleto").html(data);
          }
        });
        return false;
      });
    });

 </script>

</body>
</html>



