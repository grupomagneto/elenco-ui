<div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
      <input type="hidden" name="DataNascimento" id="dt_nascimento-maior" value="<?php echo $_SESSION['dt_nascimento']; ?>" />
      
        <div class='titulo heavy white large'>
        Pagamento via boleto bancário
        </div>
        <div class='subtitulo avenir white small'>
          Clique nos campos para inserir os dados do Cartão de Crédito
        <div class="total heavy white large">
          TOTAL R$ 269,10
        </div>

        </div>
        <div class='botoes'>
            <a href="<?php  echo $boleto;?>" target="_blank">
              <button class='botao'>Gerar Boleto</button>
            </a>
             
            <div class='moip'>
              <a href='http://www.moip.com.br' target='_blank'><img src='../_images/moip167px.png' /></a>
            </div>
        </div>
    </div>
</div>
