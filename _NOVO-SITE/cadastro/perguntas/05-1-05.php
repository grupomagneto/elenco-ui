<form action="#" method="post" id="form_serio-enviar">
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
            <div class='titulo heavy white large comando' id="comando-2">
                Agora uma foto sem sorrir
            </div>
            <div class="result" id="result-2">
                <div class='upload'>
                    <label for="file-input-2">
                        <img class="upload" src="../_images/upload.svg"/>
                    </label>
                    <input type="file" id="file-input-2" class="file-input" accept="image/*">
                </div>
            </div>
            <div class="img-result hide" id="img-result-2">
                <img class="cropped" id="cropped-2" src="" height="100%" width="100%">
                <input type="hidden" id="foto-2" class="foto" value="1" />
            </div>
            <div class="subtitulo avenir white small instrucao" id="instrucao-2">Clique para escolher</div>
            <div class='botoes'>
                    <button type="button" id="disabled-2" class="botao disabled" disabled>Continuar</button>
                    <button type="button" id="save-2" class="botao save hide">Continuar</button>
                    <input type="hidden" name="field" id="field_ativo" value="ativo" />
                    <input type="hidden" name="value" id="value_ativo" value="New" />
                    <button id='btn_serio-enviar' class="botao download hide">Enviar</button>
            </div>
        </div>
    </div>
</form>
