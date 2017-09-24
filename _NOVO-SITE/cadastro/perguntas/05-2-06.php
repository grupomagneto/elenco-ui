<form action="#" method="post">
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'> 
            <div class='titulo heavy white large'>
            Qual a forma de pagamento?
            </div>
            <div class='subtitulo avenir white small'>
            Parcele em até 10x no cartão ou ganhe 5% de desconto no boleto
            </div>
            <div class='botoes'>
                <input type="hidden" name="id_elenco" id="input-hidden-boleto-id-elenco" value="<?php echo $_SESSION['id_elenco']; ?>" />
                <input type="hidden" name="data_nascimento" id="input-hidden-boleto-data_nascimento" value="" />
                <input type="hidden" name="email" id="input-hidden-boleto-email" value="<?php echo $_SESSION['email']; ?>" />
                <input type="hidden" name="cpf_titular" id="input-hidden-boleto-cpf_titular" value="" />
                <input type="hidden" name="nome_titular" id="input-hidden-boleto-nome_titular" value="" />
                <input type="hidden" name="DDD" id="input-hidden-boleto-DDD" value="" />
                <input type="hidden" name="cel" id="input-hidden-boleto-cel" value="" />
                <input type="hidden" name="cep" id="input-hidden-boleto-cep" value="" />
                <input type="hidden" name="endereco" id="input-hidden-boleto-endereco" value="" />
                <input type="hidden" name="bairro" id="input-hidden-boleto-bairro" value="" />
                <input type="hidden" name="cidade" id="input-hidden-boleto-cidade" value="" />
                <input type="hidden" name="uf" id="input-hidden-boleto-uf" value="" />
                <input type="hidden" name="numero" id="input-hidden-boleto-numero" value="" />
                <input type="hidden" name="complemento" id="input-hidden-boleto-complemento" value="" />
                <input type="hidden" name="produto" id="input_produto-boleto" value="" />
                <input type="hidden" name="valor" id="input_valor-boleto" value="" />
                <input type="hidden" name="desconto" id="input_desconto-boleto" value="" />
                <button id='btn_cartao-de-credito' class='botao'>Cartão de crédito</button>
                <button id='btn_boleto-bancario' class='botao'>Boleto bancário</button>
                <div class='moip'>
                  <a href='http://www.moip.com.br' target='_blank'><img src='../_images/moip167px.png' /></a>
                </div>
            </div>
        </div>
    </div>
</form>
