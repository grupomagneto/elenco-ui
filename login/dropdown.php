
<form action="#" method="post">
	<div class="gradient container" >
		<div class="box">
			<h1 class="pergunta font-family color-font"><?php echo $pergunta; ?></h1>
		</div>
		<div class="box">
			<div class="box-outline_dropdown">
				<div class="column-full font-family color-font">
					<select id='<?php echo $id; ?>' name='<?php echo $name; ?>'>
						<option disabled="" value="1"> Selecione...</option>
						<?php while ($numero > 0) {
							echo "<option value='".${'opcao'.$numero}."'>".${'opcao'.$numero}."</option>";
							$numero--;
						} ?>
					</select>	
				</div>
			</div>
		</div>
	</div>
</form>
