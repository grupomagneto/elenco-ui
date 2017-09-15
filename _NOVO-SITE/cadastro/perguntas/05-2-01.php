<form action="#" method="post">
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center caixas-cadastros'>
        <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
            <div class='titulo heavy white large'>
            Mais chances de trabalhar
            </div>
            <div class='subtitulo avenir white small'>
    			Melhor custo benefício e que te deixa em vantagem nas buscas
            </div>
            <div class='botoes flexbox wrap text-align-center'>
                <div class='quadro-premium'>
                    <div class='icon'>
                        <img src='../_images/premium_icon.svg' style='width:100%' />
                    </div>
                    <div class='texto'>
                        <img src='../_images/premium_title.svg' style='width:100%' />
                        <ul class='lista_cadastro avenir white small'>
                            <li class='itens'>Cadastro com fotos e vídeos profissionais feitos em nosso estúdio;</li>
                            <li class='itens'>Seu perfil tem destaque nas buscas;</li>
                            <li class='itens'>Você recebe 80% do cachê líquido nos trabalhos;</li>
                            <li class='itens'>Plano válido por 1 ano;</li>
                        </ul>
                    </div>
                    <div class='preco'><img src='../_images/preco_premium.svg' /></div>
                    <input type="hidden" name="field" value="tipo_cadastro_vigente" />
                    <input type="hidden" name="value" id="input_tipo_cadastro_vigente-premium" value="Premium" />
                    <input type="hidden" name="field2" value="data_contrato_vigente" />
                    <input type="hidden" name="value2" id="input_data_contrato_vigente-premium" value="<?php echo $hoje; ?>" />
                    <input type="hidden" name="field3" value="concordo_timestamp" />
                    <input type="hidden" name="value3" id="input_concordo_timestamp-premium" value="<?php echo $timestamp; ?>" />
                    <input type="hidden" name="field4" value="ip" />
                    <input type="hidden" name="value4" id="input_ip-premium" value="<?php echo $ip; ?>" />
                    <?php if (!empty($_SESSION['data_1o_contrato']) || $_SESSION['data_1o_contrato'] != "") {
                            echo "<input type='hidden' name='field5' value='data_1o_contrato' />
                                  <input type='hidden' name='value5' id='input_data_1o_contrato-premium' value='".$_SESSION['data_1o_contrato']."' />";
                    } ?>
                    <button id='btn_cadastro-premium' class='botao botao_cadastro'>Escolher</button>
                    <div class='aviso'>
                      <div class='checkbox'>
                        <input type='checkbox' id='terms-3' class='checado' />
                        <img src='../_images/campo_obrigatorio.svg' class='requerido' />
                      </div>
                      <div class='declaro avenir white x-small'>
                        <label for='terms'>Li e estou de acordo com o <a href='termo_gratuito-drt.pdf' target="_blank">Termo de Adesão</a></label>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

