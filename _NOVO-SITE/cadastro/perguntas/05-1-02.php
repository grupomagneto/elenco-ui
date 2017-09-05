<form action="#" method="post">
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center caixas-cadastros'>
        <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
            <div class='titulo heavy white large'>
            Perfeito para quem tem DRT
            </div>
            <div class='subtitulo avenir white small'>
    			Plano com taxa de agenciamento reduzida para profissionais
            </div>
            <div class='botoes flexbox wrap text-align-center'>
                <div class='quadro-gratuito'>
                    <div class='icon'>
                        <img src='../_images/gratuito_icon.svg' style='width:100%' />
                    </div>
                    <div class='texto'>
                        <img src='../_images/gratuito_title-drt.svg' style='width:100%' />
                        <ul class='lista_cadastro avenir white small'>
                            <li class='itens'>Você faz suas próprias fotos e vídeo e nos envia para cadastro e atualizações;</li>
                            <li class='itens'>Você recebe 80% do cachê líquido nos trabalhos;</li>
                            <li class='itens'>Perfil com vídeo de apresentação;</li>
                            <li class='itens'>Sem custos e nem prazo de validade;</li>
                        </ul>
                    </div>
                    <input type="hidden" name="field" value="tipo_cadastro_vigente" />
                    <input type="hidden" name="value" id="input_tipo_cadastro_vigente-gratuito-drt" value="Gratuito" />
                    <input type="hidden" name="field2" value="data_contrato_vigente" />
                    <input type="hidden" name="value2" id="input_data_contrato_vigente-gratuito-drt" value="<?php echo $hoje; ?>" />
                    <input type="hidden" name="field3" value="concordo_timestamp" />
                    <input type="hidden" name="value3" id="input_concordo_timestamp-gratuito-drt" value="<?php echo $timestamp; ?>" />
                    <input type="hidden" name="field4" value="ip" />
                    <input type="hidden" name="value4" id="input_ip-gratuito-drt" value="<?php echo $ip; ?>" />
                    <button id='btn_cadastro-gratuito-DRT' class='botao'>Escolher</button>
                    <div class='aviso'>
                      <div class='checkbox'>
                        <input type='checkbox' id='terms-2' class='checado' />
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

