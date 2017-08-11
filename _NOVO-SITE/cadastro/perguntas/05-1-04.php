<form action="ajax/processa_upload.php" id="form-sorrindo" name="form-sorrindo" method="POST" enctype="multipart/form-data">
    <div class='conteudo flexbox wrap text-align-center space-between-vertical'>
        <div class='conteudo flexbox wrap text-align-center space-between-vertical'>
            <div class='titulo heavy white large'>
            Envie uma foto sorrindo
            </div>
            <div class='subtitulo avenir white small upload'>
                <div class="docs-preview docs-dropzone">
                    <input id="sorrindo" type="file" name="file" accept="image/*" />
                    <label for="sorrindo">
                        <div id="imagem-input01"><img src="../_images/upload.svg" alt="Clique para enviar"></div>
                    </label>
                </div>
                <div class="txt-clique-enviar">Clique para enviar</div>
            </div>
            <div class='botoes'>
                <button id='btn_sorrindo-enviar' class='botao'>Continuar</button>
            </div>
        </div>
    </div>
</form>