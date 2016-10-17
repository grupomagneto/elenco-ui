<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' id='form'>
	
<div class='gradient container' >
	<div class='box'>
		<h1 class='pergunta__box font-family color-font'><?php echo $pergunta; ?></h1>
	</div>
	<div class='box'>
		<div class='box-outline_box'>
			<div class='column-full font-family color-font'>

				<input class='radio-inline__input-full' id='<?php echo $id1; ?>' name='<?php echo $name; ?>' type='submit' value='<?php echo $opcao1; ?>' onclick='showLoading()'>
				<label class='radio-inline__label-full cursor' for='<?php echo $id1; ?>'> 
					<?php echo $opcao1; ?>
				</label>
				<input class='radio-inline__input-full' id='<?php echo $id2; ?>' name='<?php echo $name; ?>' type='submit' value='<?php echo $opcao2; ?>' onclick='showLoading()'>
				<label class='radio-inline__label-full cursor' for='<?php echo $id2; ?>'> 
					<?php echo $opcao2; ?>
				</label>
				<input class='radio-inline__input-full' id='<?php echo $id3; ?>' name='<?php echo $name; ?>' type='submit' value='<?php echo $opcao3; ?>' onclick='showLoading()'>
				<label class='radio-inline__label-full cursor' for='<?php echo $id3; ?>'>
					<?php echo $opcao3; ?>
				</label>
				<input class='radio-inline__input-full' id='<?php echo $id4; ?>' name='<?php echo $name; ?>' type='submit' value='<?php echo $opcao4; ?>' onclick='showLoading()'>
				<label class='radio-inline__label-full cursor' for='<?php echo $id4; ?>'>
				<?php echo $opcao4; ?>
				</label>
				
			</div>
		</div>
	</div>
</div>

</form>
