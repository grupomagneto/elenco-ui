<!DOCTYPE html>
<html lang='pt-br'>
<head>
	<meta charset='UTF-8'>
	<title>Meu Modelo Favorito por Magneto Elenco</title>
  	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
  	<link rel='stylesheet' href='stylesheets/animate.css'>
	<link rel='stylesheet' href='stylesheets/site.css'>
	<link rel='stylesheet' href='stylesheets/swiper.min.css'>
	<link rel='stylesheet' href='stylesheets/loading.css'>
</head>
<body>
<div id='loading' style='display: none' class='overlay'>
<div class='loader loader--style1' title='0'>
  <svg version='1.1' id='loader-1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px'
   width='40px' height='40px' viewBox='0 0 40 40' enable-background='new 0 0 40 40' xml:space='preserve'>
  <path opacity='0.2' fill='#000' d='M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
    s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
    c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z'/>
  <path fill='#000' d='M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
    C22.32,8.481,24.301,9.057,26.013,10.047z'>
    <animateTransform attributeType='xml'
      attributeName='transform'
      type='rotate'
      from='0 20 20'
      to='360 20 20'
      dur='0.5s'
      repeatCount='indefinite'/>
    </path>
  </svg>
  </div>
</div>
	<div class='swiper-container'>
		<div class='swiper-wrapper'>
			<div class='swiper-slide gradient'>

			      <div class='box box-outline__content-after-login'>

			        <div class='row'>
			        	<div class='box-before__question'>	
				        	<img src='http://www.magnetoelenco.com.br/fotos/$photo' alt='' />
			        	</div>
			        </div>

			        <div class='row'>
			          <p class='content-slide_after-login before_questions font-family color-font'>
			            É você na foto?
			          </p>
			        </div>
					<div class='column-full font-family color-font'>
					<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' id='form'>
			        <!-- <div class='row'> -->
						<input class='radio-inline__input-full' id='sim' name='confirm_identity' type='submit' value='sim' onclick='showLoading()'>
						<label class='radio-inline__label-full cursor' for='sim'> 
							Sim
						</label>
						<input class='radio-inline__input-full' id='nao' name='confirm_identity' type='submit' value='nao' onclick='showLoading()'>
						<label class='radio-inline__label-full cursor' for='nao'> 
							Não
						</label>
			        <!-- </div> -->
			        </form>
			        </div>

			      </div>
			</div>
		</div>
	</div>
	<script src='javascripts/jquery-1.12.1.min.js'></script>
	<script src='javascripts/swiper.jquery.min.js'></script>
	<script src='javascripts/swiper.min.js'></script>
	<script src='javascripts/progressbar.min.js'></script>
	<script src='javascripts/all.js'></script>	
<script>
function showLoading() {
   document.getElementById('loading').style.display = 'block';
}
</script>
</body>
</html>";