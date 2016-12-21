<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Perfil</title>
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="stylesheets/swiper.css">
  <link rel="stylesheet" href="stylesheets/ion.rangeSlider.css">
  <link rel="stylesheet" href="stylesheets/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" href="stylesheets/index.css">
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
</head>
<body>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide gradient">
		     <div class="container-outline__content">
				<div class="topbar">
					<?php 
						include "top-menu.php";
					 ?>
       			</div>

				<div class="middle">
					<div class="question">
						<h1 class="font-family color-primary"> Quem você está buscando?</h1>
					</div>
					<div class="content__index">
	                  <div class="gender_age-group__index">
	                    <input id="male" name="gender" type="radio" value="male" />
	                    <label class="gender-cc male_index" for="male"></label>
	                    <input id="female" name="gender" type="radio" value="female" /><label class="gender-cc female_index" for="female"></label>
	                  </div>
						
					</div>
				</div>

		     	<div class="bottombar">
			     	<div class="container-outline__content">
					    <a class="menu-search cursor" id="menu-link">
			              <div class="search" id="search">
			                <img src="images/search.svg" />
			              </div>
			            </a>
		              <div class="button-search">
				     	<div class="container-outline__content">
			              	<button class="button button-xsmall swiper-control next" type="button"><p>Avançar</p></button>
				     	</div>
		              </div>
			     	</div>
		     	</div>
		  <div class="fullscreen-menu-search">
          <div class="mask-search">
            <form action="">
              <div class="content-menu-search">
                <div class="container-outline__center">
                  <div class="search-menu">
                    <input class="font-family color-primary" name="search" placeholder="Parâmetros da Busca:" type="text" />
                  </div>
                  <div class="gender_age-group">
                    <p class="title-menu font-family color-primary">
                      Sexo:
                    </p>
                    <input id="male" name="gender" type="radio" value="male" />
                    <label class="gender-cc male" for="male"></label>
                    <input id="female" name="gender" type="radio" value="female" /><label class="gender-cc female" for="female"></label>
                  </div>
                  <div class="ranger-slide">
                    <p class="font-family color-primary">
                      Faixa etária:
                    </p>
                    <input class="js-range-slider" name="ranger" type="text" value="" />
                  </div>
                  <div class="after-ranger-slide__search">
                    <p class="font-family color-primary">
                      Cor da pele: <span class="font-family color-primary bold">Branca</span>
                    </p>
                    <p class="font-family color-primary">
                      Bairro: <span class="font-family color-primary bold">Lago Norte</span>
                    </p>
                    <button class="button button__small" type="button"> Alterar</button>
                  </div>
                  <div class="title__order-perfil">
                    <span class="glyphicon glyphicon-sort" />
                    <p class="font-family color-primary">
                      Exibir primeiro perfis:
                    </p>
                    <hr />
                  </div>
                  <div class="button__order-perfil">
                    <div class="switch-field font-family">
                      <input checked="" id="switch_left" name="order" type="radio" value="yes" />
                      <label class="button button__small" for="switch_left"> Mais avaliados</label>
                      <input id="switch_right" name="order" type="radio" value="no" />
                      <label class="button button__small" for="switch_right"> Mais novos</label>
                    </div>
                  </div>
                  <div class="arrow-down"></div>
                </div>
              </div>
            </form>
          </div>
        </div>

		     </div>

            </div>

            <div class="swiper-slide gradient">
            			     <div class="container-outline__content">
				<div class="topbar">
					<?php 
						include "top-menu.php";
					 ?>
       			</div>

				<div class="middle">
					<div class="question">
						<h1 class="font-family color-primary"> Defina a faixa etária?</h1>
					</div>
					<div class="content__index">
	                  <div class="ranger-slide__index">
	                    <input class="js-range-slider font-family color-primary" name="ranger" type="text" value="" />
	                  </div>
					</div>
				</div>

		     	<div class="bottombar">
			     	<div class="container-outline__content">
					    <a class="menu-search cursor" id="menu-link">
			              	<button class="button button-back button-xsmall swiper-control prev" type="button"><p>Voltar</p></button>
			            </a>
		              <div class="button-search">
      				     	<div class="container-outline__content">
      			              	<button class="button  button-next button-xsmall swiper-control next" type="button"><p>Avançar</p></button>
      				     	</div>
		              </div>
			     	</div>
		     	</div>


		     </div>
            </div>

       <div class="swiper-slide gradient">     
          <div class="container-outline__content">
              <div class="topbar">
                <?php 
                  include "top-menu.php";
                 ?>
              </div>

            <div class="middle">
              <div class="question">
                <h1 class="font-family color-primary"> Qual a cor da pele?</h1>
              </div>
              <div class="content__index">
                  <select id="raca" name="raca">
                    <option disabled value="1">Selecione...</option>
                    <option value="Amarela" >Amarela</option>
                    <option value="Branca">Branca</option>
                    <option value="Indígena">Indígena</option>
                    <option value="Negra">Negra</option>
                    <option value="Parda">Parda</option>
                  </select>
              </div>
            </div>

            <div class="bottombar">
              <div class="container-outline__content">
                <a class="menu-search cursor" id="menu-link">
                        <button class="button button-back button-xsmall  swiper-control prev" type="button"><p>Voltar</p></button>
                    </a>
                    <div class="button-search">
                <div class="container-outline__content">
                        <button class="button button-xsmall button-next swiper-control next" type="button"><p>Avançar</p></button>
                </div>
                    </div>
              </div>
            </div>


           </div>
            	
        </div>


       <div class="swiper-slide gradient">     
          <div class="container-outline__content">
              <div class="topbar">
                <?php 
                  include "top-menu.php";
                 ?>
              </div>

            <div class="middle">
              <div class="question">
                <h1 class="font-family color-primary"> Qual a cor da pele?</h1>
              </div>
              <div class="content__index">
                  <select id="bairro" name="bairro">
                    <option disabled value="1">Selecione...</option>
                    <option value="Águas Claras">Águas Claras</option>
                    <option value="Asa Norte">Asa Norte</option>
                    <option value="Asa Sul">Asa Sul</option>
                    <option value="Brazlândia">Brazlândia</option>
                    <option value="CA do Lago Norte">CA do Lago Norte</option>
                    <option value="Candangolândia">Candangolândia</option>
                    <option value="Ceilândia">Ceilândia</option>
                    <option value="Colorado">Colorado</option>
                    <option value="Cruzeiro">Cruzeiro</option>
                    <option value="Gama">Gama</option>
                    <option value="Granja do Torto">Granja do Torto</option>
                    <option value="Guará">Guará</option>
                    <option value="Itapoã">Itapoã</option>
                    <option value="Jardim Botânico">Jardim Botânico</option>
                    <option value="Lago Norte">Lago Norte</option>
                    <option value="Lago Sul">Lago Sul</option>
                    <option value="MI/ML do Lago Norte">MI/ML do Lago Norte</option>
                    <option value="Noroeste">Noroeste</option>
                    <option value="Núcleo Bandeirante">Núcleo Bandeirante</option>
                    <option value="Octogonal">Octogonal</option>
                    <option value="Paranoá">Paranoá</option>
                    <option value="Park Sul">Park Sul</option>
                    <option value="Park Way">Park Way</option>
                    <option value="Planaltina">Planaltina</option>
                    <option value="Recanto das Emas">Recanto das Emas</option>
                    <option value="Riacho Fundo">Riacho Fundo</option>
                    <option value="Riacho Fundo II">Riacho Fundo II</option>
                    <option value="Samambaia">Samambaia</option>
                    <option value="Santa Maria">Santa Maria</option>
                    <option value="São Sebastião">São Sebastião</option>
                    <option value="SCIA">SCIA</option>
                    <option value="SIA">SIA</option>
                    <option value="Sobradinho">Sobradinho</option>
                    <option value="Sobradinho II">Sobradinho II</option>
                    <option value="Sudoeste">Sudoeste</option>
                    <option value="Taguatinga">Taguatinga</option>
                    <option value="Taquari">Taquari</option>
                    <option value="Varjão">Varjão</option>
                    <option value="Vicente Pires">Vicente Pires</option>
                    <option value="Vila da Telebrasília">Vila da Telebrasília</option>
                    <option value="Vila Estrutural">Vila Estrutural</option>
                    <option value="Vila Planalto">Vila Planalto</option>
                    <option value="Zona Rural">Zona Rural</option>
                    <option value="outros">Outros</option>
                  </select>
              </div>
            </div>

            <div class="bottombar">
              <div class="container-outline__content">
                <a class="menu-search cursor" id="menu-link">
                        <button class="button button-back button-xsmall  swiper-control prev" type="button"><p>Voltar</p></button>
                    </a>
                    <div class="button-search">
                <div class="container-outline__content">
                        <button class="button button-next button-xsmall" type="button"><p>Buscar</p></button>
                </div>
                    </div>
              </div>
            </div>


           </div>
              
        </div>

        </div>
    </div>

    <!-- Swiper JS -->
    <script src="javascripts/jquery-1.12.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="http://alico.me/lib/slimscroll.js"></script>
    <script src="javascripts/swiper.min.js"></script>
	 <script src="javascripts/ion.rangeSlider.min.js"></script>

    <!-- Initialize Swiper -->
    <script src="javascripts/index.js"> </script>
</body>
</html>
