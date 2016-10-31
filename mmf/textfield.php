<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' id='form'>
	<div class="gradient container">
		<div class="box">
			<h1 class="pergunta font-family color-font"><?php echo $pergunta; ?></h1>
		</div>
		<div class="box">
			<div class="box-outline_textfield">

				<div class="column-full font-family color-font">

					<input id='<?php echo $input_id; ?>' name='<?php echo $name; ?>' <?php $extra; ?> type="tel">
					
					<button id="btn" class="ok" type="submit" onclick="showLoading()">
						<img id="btn_img" alt="" src="images/ok_neg.svg" />
					</button>
					
					<!-- MENSAGEM DE ERRO -->
					<div id='<?php echo $text_id; ?>'></div>
				</div>

			</div>
		</div>
	</div>
</form>
