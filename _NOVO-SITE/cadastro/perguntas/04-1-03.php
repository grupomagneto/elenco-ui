<form name="form_drt" id="form_drt" action="ajax/upload_drt.php" method="post" enctype="multipart/form-data" accept="image/*" target="upload_target">
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
            <div class='titulo heavy white large'>
            Envie uma foto do seu registro DRT
            </div>
            <div class='subtitulo avenir white small'>
                <div id="drt_enviar">
                    <input type="file" name="drt_file" /><img id="icon_drt-enviar" class="enviar" src="../_images/upload.svg" />
                </div>
                <div id="upload_percentage" class="upload_percentage"></div>
                <div id="drt_upload_text">Clique para escolher</div>
            </div>
            <div class='botoes'>
                <button type='submit' id='btn_drt-enviar' class='botao disabled' value='Submit' disabled>Continuar</button>
                <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;display:none;"></iframe>
            </div>
        </div>
    </div>
</form>