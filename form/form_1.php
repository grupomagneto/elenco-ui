<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Magneto Elenco</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
  <form name="form" action="adiciona-usuario.php" id="form" method="post" enctype="multipart/form-data">
    <!-- Swiper Container -->
<div class="swiper-container">
    <!-- Swiper W -->
        <div class="swiper-wrapper">


            <div class="swiper-slide gradient">


              <div class="container">
                <div class="div1">
                  <div class="row">
                    <div class=" div1_t col-lg-offset-3 col-lg-5">

                      <h1>Qual o seu primeiro nome?</h1>

                    </div>
                    <div class=" div1_box col-lg-offset-3 col-lg-5">

                      <input  name="nome" id="nome" type="text" class="TabOnEnter" tabindex="1" autofocus autocomplete="off"  required="required"  />
                      <input type="button" class="sendBtn" id="btSend" name="btSend" style="display: none;">
                      <img id="seta" src="images/seta_ok.svg" alt="seta" style="display: none;">
                      <!-- <button ></button><span class="seta"><img src="img/seta_ok.svg" alt="seta"></span> -->
                    </div>

                  </div>
                </div>
              </div>


<div class="progress1">
  
<progress id="progressbar" value="5" max="50"></progress>

</div>


               <nav>
                <ul class="vs-vertical-nav1 none">

                  <li><a href="#" class="vs-next1 swiper-control next"></a></li>

                </ul>

              </nav>

            </div>


<div id="2" class="swiper-slide gradient">


              <div class="container">
                <div class="div2">
                  <div class="row">
                    <div class=" div2_t col-lg-offset-3 col-lg-5">

                      <h1>E o sobrenome?</h1>

                    </div>
                    <div class=" div2_box col-lg-offset-3 col-lg-5">

                      <input  name="sobrenome" id="sobrenome" type="text" onfocus="this.value=''" class="TabOnEnter" tabindex="2"  autocomplete="off"   required="required"  />
                     <input type="button" class="sendBtn2" id="btSend2" name="btSend2" style="display: none;"> 
                     <img class="swiper-control next" id="seta2" src="images/seta_ok.svg" alt="seta" style="display: none;">
                      <!-- <button ></button><span class="seta"><img src="img/seta_ok.svg" alt="seta"></span> -->
                    </div>

                  </div>
                </div>
              </div>

 <div class="progress2">
  
<progress id="progressbar2" value="10" max="50" ></progress>
</div>


               <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

              </nav>

            </div>

 <div id="3" class="swiper-slide gradient">


          <div class="container">
            <div class="div3">
              <div class="row">

                <div class=" div3_t col-lg-offset-3 col-lg-5">
                  <h1 class="TabOnEnter"  tabindex="3">Qual o seu sexo?</h1>
                </div>

                  <div class="div3_box col-lg-offset-3 col-lg-5">
                   <input name="sexo" value="masculino" type="radio" id="radio0" class="radio" onchange="exibeMsg(this.value);"
onchange="exibeMsg(this.value);" onclick="setTimeout(myFunction, 2000)">
                    <label id="input3" for="radio0" class="radio-label2">
                     <span>Masculino</span>
                   </label>
                 </div>

                 <div class="div3_box col-lg-offset-3 col-lg-5">
                  <input name="sexo" type="radio" value="feminino" id="radio1" class="radio" onchange="exibeMsg(this.value);"
onchange="exibeMsg(this.value);" onclick="setTimeout(myFunction, 2000)">
                  <label for="radio1" class="radio-label">

                    <span>Feminino</span>
                  </label>
                </div>
            </div>


          </div>
        </div>


 <div class="progress3">
  
<progress id="progressbar3" value="15" max="50" ></progress>
</div>


                <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

              </nav>
            </div>

<div id="4" class="swiper-slide gradient">

              <div class="container">
                <div class="div4">
                  <div class="row">
                    <div class=" div4_t col-lg-offset-3 col-lg-5">
                          <img src="images/camera.svg" tabindex="4" id="proxima" class="TabOnEnter" alt="camera">

                    </div>
                    <div class=" div4_box col-lg-offset-3 col-lg-5">
                        <h1>Para começar vamos precisar de duas fotos suas feitas hoje.</h1>
                    <img class="swiper-control next" src="images/seta.svg" alt="seta">

                    </div>

                  </div>
                </div>
              </div>


 <div class="progress4">
  
  <progress id="progressbar4" value="20" max="50" ></progress>

</div>

                <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

              </nav>
</div>

<div id="5" class="swiper-slide gradient2"><nav>

            <div class="container">
                <div class="div5">
                  <div class="row">


                    <div class=" div5_box col-lg-offset-3 col-lg-5">

                    <div class="wrapper">
                    <div class="file-upload" tabindex="5" class="TabOnEnter">
                     <input type="file" name="foto"  required="required"  />
                           <img src="images/upload.svg" alt="">
                          </div>
                    </div>
                      <h4>upload</h4>
                    </div>

                    <div class=" div5_t col-lg-offset-3 col-lg-5">
                        <h1>Sorrindo!</h1>
                        <ol> 
                          <li>Enquadre os ombros para cima;</li> 
                          <li>Gire levemente seu rosto para <b>ESQUERDA</b>;</li> 
                          <li>Olhe para a câmera <b>SORRINDO!</b></li> 
                        </ol>

                        <p>DICA: Use a luz de uma janela à sua frente para um melhor resultado.</p>


                    </div>



                  </div>
                </div>
              </div>

 <div class="progress5">
  
  <progress id="progressbar5" value="25" max="50" ></progress>

</div>

                <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

              </nav>

          </div>


<div id="6" class="swiper-slide gradient3"><nav>


            <div class="container">
                <div class="div6">
                  <div class="row">



                    <div class=" div6_box col-lg-offset-3 col-lg-5">

                      <div class="wrapper2">
                          <div class="file-upload2" tabindex="6" class="TabOnEnter">
                          <input type="file" name="fotos"  required="required" />
                          <img src="images/upload.svg" alt="">
                          </div>
                      </div>

                      <h4>upload</h4>
                    </div>

                    <div class=" div6_t col-lg-offset-3 col-lg-5">
                        <h1>Agora sem sorrir!</h1>
                        <ol> 
                          <li>Enquadre os ombros para cima;</li> 
                          <li>Gire levemente seu rosto para DIREITA;</li> 
                          <li>Olhe para a câmera SEM SORRIR!</li> 
                        </ol>

                        <p>DICA: Use a mesma luz da foto anterior.</p>


                    </div>


                  </div>
                </div>
              </div>



 <div class="progress6">
  
  <progress id="progressbar6" value="30" max="50" ></progress>

</div>

                <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

              </nav>

          </div>

<div id="7" class="swiper-slide gradient">
                
<div class="container">
                <div class="div7">
                  <div class="row"> <div class="row">
                      <div class="div7_t col-sm-offset-3 col-sm-6">
                          <h1 tabindex="7" class="TabOnEnter">Qual a sua data de nascimento?</h1>
                      </div>
                    </div>
                    <div class="div7_box col-xs-3 col-sm-offset-1 col-lg-offset-2">
                          <p>Dia</p>

                           <select   required="required" name="dia" id="dia">
                              <option selected disabled value="hide">selec..
                              </option>
                                    <?php
                                        for($dia=1; $dia<=31; $dia++){
                                        ?>
                                        <option value="<?= $dia?>"><?= $dia?></option>
                                        <?php
                                        }
                                    ?>
                          </select>
                    </div>

                    <div class=" div7_box2 col-xs-3">
                          <p>Mês</p>

                            <select   required="required"  name="mes" id="mes">
                              <option selected disabled value="hide">selec..
                              </option>
                              <?php
                                  $mes=1;
                                  while($mes<=12)
                                  {
                                  ?>
                                  <option value= "<?php echo $mes?>"> <?php echo $mes?> </option>
                                  <?php $mes++;
                                  }
                              ?>
                            </select> 

                    </div>
                    <div class=" div7_box3 col-xs-3">
                          <p>Ano</p>

                          <select   required="required"  name="ano" id="ano">
                              <option selected disabled value="hide">selec..
                              </option>
                              <?php
                                  $ano=2020;
                                  while($ano>=1900)
                                  {
                                  ?>
                                  <option value= "<?php echo $ano?>"> <?php echo $ano?> </option>
                                  <?php $ano--;
                                  }
                              ?>
                          </select> 
                    </div>

                  </div>
                </div>
</div>



 <div class="progress7">
  
  <progress id="progressbar7" value="35" max="50" ></progress>

</div>
            <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

            </nav>
            </div>


<div id="8" class="swiper-slide gradient">                

<div class="container">
                <div class="div8">
                  <div class="row">
                    <div class=" div8_t col-lg-offset-3 col-lg-5">

                      <h1>Qual o seu celular?</h1>

                    </div>
                    <div class=" div8_box col-lg-offset-3 col-lg-5">

                      <input tabindex="8" class="TabOnEnter" name="celular" id="celular" type="text" onfocus="this.value=''" autofocus autocomplete="off"   required="required"   />
                      <input type="button" class="sendBtn8" id="btSend8" name="btSend8" style="display: none;">
                      <img id="seta8" class="swiper-control next" src="images/seta_ok.svg" alt="seta" style="display: none;">
                    </div>

                  </div>
                </div>
</div>

 <div class="progress8">
  
  <progress id="progressbar8" value="40" max="50" ></progress>

</div>
            <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

              </nav>

            </div>

<div id="9" class="swiper-slide gradient">               

<div class="container">
                <div class="div9">
                  <div class="row">
                    <div class=" div9_t col-lg-offset-3 col-lg-5">

                      <h1>E o seu email?</h1>

                    </div>
                    <div class=" div9_box col-lg-offset-3 col-lg-5">

                      <input tabindex="9" class="TabOnEnter" name="email" id="email" type="text" onfocus="this.value=''" autofocus autocomplete="off"   required="required"   />
                      <input type="button" class="sendBtn9" id="btSend9" name="btSend9" style="display: none;">
                      <img id="seta9" class="swiper-control next" src="images/seta_ok.svg" alt="seta" style="display: none;">
                    </div>

                  </div>
                </div>
</div>


 <div class="progress9">
  
  <progress id="progressbar9" value="45" max="50" ></progress>

</div>
             <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

              </nav>
          </div>

<div id="10" class="swiper-slide gradient">               


<div class="container">
                <div class="div10">
                  <div class="row">
                    <div class=" div10_t col-lg-offset-3 col-lg-5">

                      <h1 tabindex="10" class="TabOnEnter">Qual a cor da sua pele?</h1>

                    </div>
                    <div class=" div10_box col-lg-offset-3 col-lg-5">
                          <select required="required" name="raca" id="raca">
                            <option disabled selected="selected" value="1">Selecione</option>
                          <option value="amarelo" >Amarelo</option>
                          <option value="branco">Branco</option>
                          <option value="indigena">Índigena</option>
                          <option value="negra">Negra</option>
                          <option value="pardo">Pardo</option>
                          </select> 


                    </div>

                  </div>
                </div>
</div>

 <div class="progress10">
  
  <progress id="progressbar10" value="50" max="50" ></progress>

</div>

            <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

              </nav>

</div> 

            <div id="11" class="swiper-slide gradient">               


<div class="container">
                <div class="div11">
                  <div class="row">
                    <div class=" div11_t col-lg-offset-3 col-lg-5">

                      <h1 tabindex="11" class="TabOnEnter" id="proxima2">Qual é o seu bairro?</h1>

                    </div>
                    <div class=" div11_box col-lg-offset-3 col-lg-5">


                          <select  required="required"  name="bairro" id="bairro">
                            <option disabled value="1">Selecione</option>
                           <option  value="aguasclaras"> Águas Claras</option>
                           <option value="asanorte"> Asa Norte</option>
                           <option value="asanorte"> Asa Sul</option>
                           <option value="brazlandia"> Brazlandia</option>
                           <option value="ca do lago norte"> CA Do Lago Norte</option>
                           <option value="candangolandia"> Candangolândia</option>
                           <option value="ceilandia"> Ceilândia</option>
                           <option value="colorado"> Colorado</option>
                           <option value="cruzeiro"> Cruzeiro</option>
                           <option value="gama"> Gama</option>
                           <option value="granja"> Granja do torto</option>
                           <option value="guara"> Guará</option>
                           <option value="jardim"> Jardim Botânico</option>
                           <option value="lagonorte"> Lago Norte</option>
                           <option value="lagosul"> Lago Sul</option>
                           <option value="noroeste"> Noroeste</option>
                           <option value="nucleobandeirante"> Núcleo Bandeirante</option>
                           <option value="miml"> MI/ML Do Lago Norte</option>
                           <option value="octogonal"> Octogonal</option>
                           <option value="paranoa"> Paranoá</option>
                           <option value="parksul"> Park Sul</option>
                           <option value="parkway"> Park Way</option>
                           <option value="planaltina"> Planaltina</option>
                           <option value="recanto"> Recanto das Emas</option>
                           <option value="riacho"> Riacho Fundo</option>
                           <option value="samambaia"> Samambaia</option>
                           <option value="santamaria"> Santa Maria</option>
                           <option value="sebastiao"> São Sesbastião</option>
                           <option value="sobradinho"> Sobradinho</option>
                           <option value="sudoeste"> Sudoeste</option>
                           <option value="taguatinga"> Taguantinga</option>
                           <option value="taquari"> Taquari</option>
                           <option value="varjao"> Varjão</option>
                           <option value="vicentepires"> Vicente Pires</option>
                           <option value="telebrasilia"> Vila da Telebrasília</option>
                           <option value="estrutural"> Vila Estrutural</option>
                           <option value="planalto"> Vila Planalto</option>
                           <option value="rural"> Zona Rural</option>
                           <option value="outros"> Outros</option>
                          </select> 

                    </div>

                  </div>
                </div>
</div>

 <div class="progress11">
  
  <progress id="progressbar11" value="50" max="50" ></progress>

</div>

            <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

              </nav>

</div> 


<div id="12" class="swiper-slide gradient">  



<div class="container">
            <div class="div12">
              <div class="row">

                <div class=" div12_t col-lg-offset-3 col-lg-5">
                   <h1  id="proxima3" tabindex="12" class="TabOnEnter">Você é <span id="txt"></span> com DRT?</h1>
                </div>

                  <div class="div12_box col-lg-offset-3 col-lg-5">
                   <input   name="ator"  value="sim" type="radio" id="radio2" class="radio2">
                    <label id="input3" for="radio2" class="radio-label4">
                     <span>Sim</span>
                   </label>
                 </div>

                 <div class="div12_box col-lg-offset-3 col-lg-5">
                  <input name="ator" type="radio"  value="nao"  id="radio3" class="radio2">
                  <label for="radio3" class="radio-label3">

                    <span>Não</span>
                  </label>
                </div>
            </div>
<p class="p3">DRT é o resgistro profissional de artistas, conheça mais clicando <b><a href="http://goo.gl/BNtrok">aqui.</a></b>  </p> 


    <div class="blue box">
      <h1>Ótimo</h1>
 <p class="p1">Isso quer dizer que você pode se agenciar  <br />pelo <b>Cadastro Premium</b> gratuitamente</p> 
 <p class="p2">Ao finalizar este cadastro, entre em contato <br /> com a Magneto Elenco para mais informações</p>
    </div>
          </div>
        </div>    
         


 <div class="progress12">
  
  <progress id="progressbar12" value="50" max="50" ></progress>

</div>

            <nav>
                <ul class="vs-vertical-nav none">

                    <li><a href="#" class="vs-prev swiper-control prev"></a></li>

                  <li><a href="#" class="vs-next swiper-control next"></a></li>

                </ul>

              </nav>

</div> 

<div id="13" class="swiper-slide gradient">               

              <div class="container">
                <div class="div13">
                  <div class="row">
                    <div class=" div13_t col-lg-offset-3 col-lg-5">

                      <h1>Que tal deixar seu perfil mais completo?</h1>

                    </div>
                    <div class=" div13_box col-lg-offset-3 col-lg-5">
                        <img src="images/ig.svg" alt="instagram">
                      <input name="ig" id="ig" type="text" onfocus="this.value=''" class="TabOnEnter" tabindex="13"  autocomplete="off" />
                      <!-- <button ></button><span class="seta"><img src="img/seta_ok.svg" alt="seta"></span> -->
                    </div>
                    <div class=" div13_box2 col-lg-offset-3 col-lg-5">
                        <img src="images/face.svg" alt="facebook">
                      <input name="face" id="face" type="text" onfocus="this.value=''" class="TabOnEnter" tabindex="14"  autocomplete="off" />
                      <!-- <button ></button><span class="seta"><img src="img/seta_ok.svg" alt="seta"></span> -->
                    </div>
                    <div class=" div13_box3 col-lg-offset-3 col-lg-5">
                        <img src="images/tt.svg" alt="twitter">
                      <input name="tt" id="tt" type="text" onfocus="this.value=''" class="TabOnEnter" tabindex="15"  autocomplete="off" />
                      <!-- <button ></button><span class="seta"><img src="img/seta_ok.svg" alt="seta"></span> -->
                    </div>

                  </div>

                      <button  class="TabOnEnter enviar" tabindex="16" id="cadastra" name="submit" type="submit">Enviar Cadastro</button>

                </div>

              </div>



 <div class="progress13">
  
  <progress id="progressbar13" value="50" max="50" ></progress>

</div>

            <nav>
                <ul class="vs-vertical-nav2 none">


                  <li><a href="#" class="vs-prev2 swiper-control prev"></a></li>

                </ul>

              </nav>

</div> 

          </div>
        
</div>


</form>
    <!-- Swiper JS -->

<script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mask.min.js"></script>

    <script src="js/form.js"></script>
    <script src="js/select.js"></script>
    <script src="js/jquery-ui.min.js"></script>

</body>
</html>