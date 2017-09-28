<div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='titulo heavy white large'>
        Boleto Bancário gerado!
        </div>
        <div class='subtitulo avenir white small'>
          Pague o boleto até <?php echo $vencimento_boleto; ?> para ativar seu cadastro.
        </div>
        <div class="total heavy white large">
          TOTAL R$ <span id="valor-pagar-boleto" class="valor-pagar"></span>
        </div>
        <div class='botoes'>
            <button id='link_boleto' class='botao'>Imprimir Boleto</button>         
            <div class='moip'>
              <a href='http://www.moip.com.br' target='_blank'><img src='../_images/moip167px.png' /></a>
            </div>
        </div>
    </div>
</div>
