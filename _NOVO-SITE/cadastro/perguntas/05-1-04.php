<div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='titulo heavy white large comando' id="comando">
            Envie uma foto sorrindo
        </div>
        <div class="result" id="result">
            <div class='upload'>
                <label for="file-input">
                    <img class="upload" src="../_images/upload.svg"/>
                </label>
                <input type="file" id="file-input" class="file-input" accept="image/*">
            </div>
        </div>
        <div class="img-result hide" id="img-result">
            <img class="cropped" id="cropped" src="" height="100%" width="100%">
            <input type="hidden" id="foto" class="foto" value="0" />
        </div>
        <div class="subtitulo avenir white small instrucao" id="instrucao">Clique para escolher</div>
        <div class='botoes botoes-fotos'>
            <button type="button" id="disabled" class="botao disabled" disabled>Continuar</button>
            <button type="button" id="save" class="botao save hide">Continuar</button>
            <button type="button" id='btn_sorrindo-enviar' class="botao download hide">Enviar</button>
        </div>
    </div>
</div>
