<form action="#" method="post">
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center caixas-cadastros'>
        <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
            <div class='titulo heavy white large'>
            Ideal para quem trabalha muito
            </div>
            <div class='subtitulo avenir white small'>
    			Fotos profissionais, menor taxa, maior destaque nas buscas e mais!
            </div>
            <div class='botoes flexbox wrap text-align-center'>
                <div class='quadro-profissional'>
                    <div class='icon'>
                        <img src='../_images/profissional_icon.svg' style='width:100%' />
                    </div>
                    <div class='texto'>
                        <img src='../_images/profissional_title.svg' style='width:100%' />
                        <ul class='lista_cadastro avenir white small'>
                            <li class='itens'>Ensaio fotográfico completo com 30 fotos tratadas entregues em DVD;</li>
                            <li class='itens'>Cadastro e atualizações com fotos e vídeos profissionais feitos em nosso estúdio;</li>
                            <li class='itens'>Você recebe 90% do cachê líquido nos trabalhos;</li>
                            <li class='itens'>Seu perfil aparece primeiro nas buscas;</li>
                            <li class='itens'>Cachês disponíveis transferidos automaticamente para sua conta bancária;</li>
                            <li class='itens'>Plano válido por 2 anos;</li>
                        </ul>
                    </div>
                    <div class='preco'><img src='../_images/preco_profissional.svg' /></div>
                    <input type="hidden" name="field" value="tipo_cadastro_vigente" />
                    <input type="hidden" name="value" id="input_tipo_cadastro_vigente-profissional" value="Profissional" />
                    <input type="hidden" name="field2" value="data_contrato_vigente" />
                    <input type="hidden" name="value2" id="input_data_contrato_vigente-profissional" value="<?php echo $hoje; ?>" />
                    <input type="hidden" name="field3" value="concordo_timestamp" />
                    <input type="hidden" name="value3" id="input_concordo_timestamp-profissional" value="<?php echo $timestamp; ?>" />
                    <input type="hidden" name="field4" value="ip" />
                    <input type="hidden" name="value4" id="input_ip-profissional" value="<?php echo $ip; ?>" />
                    <?php if (!empty($_SESSION['data_1o_contrato']) || $_SESSION['data_1o_contrato'] != "") {
                            echo "<input type='hidden' name='field5' value='data_1o_contrato' />
                                  <input type='hidden' name='value5' id='input_data_1o_contrato-profissional' value='".$_SESSION['data_1o_contrato']."' />";
                    } ?>
                    <button id='btn_cadastro-profissional' class='botao botao_cadastro'>Escolher</button>
                    <div class='aviso'>
                      <div class='checkbox'>
                        <input type='checkbox' id='terms-4' class='checado' />
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

