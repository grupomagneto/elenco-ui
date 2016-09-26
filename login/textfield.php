<form action="#" method="get">
	<div class="gradient container">
		<div class="box">
			<h1 class="pergunta font-family color-font"><?php echo $pergunta; ?></h1>
		</div>
		<div class="box">
			<div class="box-outline_textfield">

				<div class="column-full font-family color-font">

						<input id='<?php echo $id; ?>' name='<?php echo $name; ?>' <?php $extra; ?> type="tel">
						<img alt="" class="ok" src="images/ok_neg.svg">

						<!-- MENSAGEM DE ERRO -->
						<div id="txt2"></div>
				</div>

			</div>
		</div>
	</div>
</form>

