<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Magneto Elenco</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/form2.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
 <form name="form2" action="adiciona-usuario.php" id="form2" method="post" enctype="multipart/form-data" onsubmit="return valida_form2(this)">
  <!-- Swiper Container -->
<div class="swiper-container">
  <!-- Swiper W -->
    <div class="swiper-wrapper">

<div class="swiper-slide gradient">


        <div class="container">
          <div class="div1">
            <div class="row">
              <div class=" div1_t col-lg-offset-3 col-lg-5">

                <h1>Qual o cpf do responsável?<sup>*</sup></h1>

              </div>
              <div class=" div1_box col-lg-offset-3 col-lg-5">

                <input name="cpf" id="cpf" type="text" data-mask="000.000.000-00" onfocus="this.value=''" class='TabOnEnter' autofocus tabindex="1" required />
                <input type="button" class="sendBtn" id="btSend" name="btSend" style="display: none;">

                <img id="seta" class="swiper-control next" onclick="focusFoo()" src="images/seta_ok.svg" alt="seta" style="display: none;">
               
              </div>

            </div>
          </div>
        </div>

        <div class="progress1">

          <progress id="progressbar" value="5" max="75"></progress>

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

           <h1>Qual o nome completo do responsável?<sup>*</sup></h1>

          </div>
          <div class=" div2_box col-lg-offset-3 col-lg-5">

           <input name="nome_responsavel" id="nome_responsavel" type="text" onfocus="this.value=''" tabindex="2" autocomplete="off" required />
           <input type="button" class="sendBtn2" id="btSend2" name="btSend2" style="display: none;">

           <img id="seta2" class="swiper-control next" onclick="focusFoo()" src="images/seta_ok.svg" alt="seta" style="display: none;">
          
          </div>

         </div>
        </div>
       </div>



<div class="progress2">
 
<progress id="progressbar2" value="10" max="75" ></progress>
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
         <h1 class="TabOnEnter" tabindex="3" >Qual o sexo da pessoa sendo cadastrada?<sup>*</sup></h1>
        </div>

         <div class="div3_box col-lg-offset-3 col-lg-5">
          <input name="sexo" value="masculino" type="radio" id="radio0" class="radio" onchange="exibeMsg2(this.value);"
onchange="exibeMsg2(this.value);">
          <label id="input3" for="radio0" class="radio-label2">
           <span>Masculino</span>
          </label>
         </div>

         <div class="div3_box col-lg-offset-3 col-lg-5">
         <input name="sexo" type="radio" value="feminino" id="radio1" class="radio" onchange="exibeMsg2(this.value);"
onchange="exibeMsg2(this.value);">
         <label for="radio1" class="radio-label">

          <span>Feminino</span>
         </label>
        </div>
      </div>
     </div>
    </div>



 <div class="progress3">
 
<progress id="progressbar3" value="15" max="75" ></progress>
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

           <h1 id="proxima">Qual o primeiro nome <span id="txt2"></span>?<sup>*</sup></h1>

          </div>
          <div class=" div4_box col-lg-offset-3 col-lg-5">

           <input name="nome_menor" id="nome_menor" type="text" onfocus="this.value=''" tabindex="4"  autocomplete="off" required />
           <input type="button" class="sendBtn" id="btSend4" name="btSend4" style="display: none;">

           <img id="seta4" onclick="gravar()" class="swiper-control next" onclick="focusFoo()" src="images/seta_ok.svg" alt="seta" style="display: none;">
           
          </div>

         </div>
        </div>
       </div>


 <div class="progress4">
 
 <progress id="progressbar4" value="20" max="75" ></progress>

</div>

        <nav>
        <ul class="vs-vertical-nav none">

          <li><a href="#" class="vs-prev swiper-control prev"></a></li>

         <li><a href="#" class="vs-next swiper-control next"></a></li>

        </ul>

       </nav>
</div>

<div id="5" class="swiper-slide gradient"><nav>


       <div class="container">
        <div class="div5">
         <div class="row">
          <div class=" div5_t col-lg-offset-3 col-lg-5">

           <h1>E o sobrenome?<sup>*</sup></h1>

          </div>
          <div class=" div5_box col-lg-offset-3 col-lg-5">

           <input name="sobrenome_menor" id="sobrenome_menor" type="text" onfocus="this.value=''" class='TabOnEnter' tabindex="5"  autocomplete="off" required />
           <input type="button" class="sendBtn5" id="btSend5" name="btSend5" style="display: none;">

           <img id="seta5" class="swiper-control next" onclick="focusFoo()" src="images/seta_ok.svg" alt="seta" style="display: none;">
          
          </div>

         </div>
        </div>
       </div>

 <div class="progress5">
 
 <progress id="progressbar5" value="25" max="75" ></progress>

</div>

        <nav>
        <ul class="vs-vertical-nav none">

          <li><a href="#" class="vs-prev swiper-control prev"></a></li>

         <li><a href="#" class="vs-next swiper-control next"></a></li>

        </ul>

       </nav>

     </div>


<div id="6" class="swiper-slide gradient"><nav>

       <div class="container">
        <div class="div6">
         <div class="row">
          <div class=" div6_t col-lg-offset-3 col-lg-5">
             <img src="images/camera.svg" tabindex="6" class='TabOnEnter' alt="camera">

          </div>
          <div class=" div6_box col-lg-offset-3 col-lg-5">
            <h1>Para começar vamos precisar de duas fotos <span id="txt5"></span> <span class="concat2_texto"></span> feitas hoje.</h1>
          <img class="swiper-control next" src="images/seta.svg" alt="seta">

          </div>

         </div>
        </div>
       </div>


 <div class="progress6">
 
 <progress id="progressbar6" value="30" max="75" ></progress>

</div>

        <nav>
        <ul class="vs-vertical-nav none">

          <li><a href="#" class="vs-prev swiper-control prev"></a></li>

         <li><a href="#" class="vs-next swiper-control next"></a></li>

        </ul>

       </nav>

     </div>

<div id="7" class="swiper-slide gradient2">

      <div class="container">
        <div class="div7">
         <div class="row">


          <div class=" div7_box col-lg-offset-3 col-lg-5">

          <div class="wrapper">
          <div class="file-upload TabOnEnter" tabindex="7">
           <input type="file" id="foto" name="foto" />
              <img src="images/upload.svg" alt="">
             </div>
          </div>
           <h4>upload<sup>*</sup></h4>
          </div>

          <div class=" div7_t col-lg-offset-3 col-lg-5">
            <h1>Sorrindo!</h1>
            <ol> 
             <li>Enquadre os ombros para cima;</li> 
             <li>Gire levemente o rosto <span id="txt8"></span> para <b>ESQUERDA</b>;</li> 
             <li>Peça para <span id="txt9"></span> olhar para a câmera <b>SORRINDO!</b></li> 
            </ol>

            <p>DICA: Use a luz de uma janela à sua frente para um melhor resultado.</p>


          </div>



         </div>
        </div>
       </div>

 <div class="progress7">
 
 <progress id="progressbar7" value="35" max="75" ></progress>

</div>
      <nav>
        <ul class="vs-vertical-nav none">

          <li><a href="#" class="vs-prev swiper-control prev"></a></li>

         <li><a href="#" class="vs-next swiper-control next"></a></li>

        </ul>

      </nav>
      </div>


<div id="8" class="swiper-slide gradient3">        

      <div class="container">
        <div class="div8">
         <div class="row">



          <div class=" div8_box col-lg-offset-3 col-lg-5">

           <div class="wrapper2">
             <div class="file-upload2 TabOnEnter" tabindex="8">
             <input type="file" id="foto2" name="fotos" tabindex="8" class='TabOnEnter' />
             <img src="images/upload.svg" alt="">
             </div>
           </div>

           <h4>upload<sup>*</sup></h4>
          </div>

          <div class=" div8_t col-lg-offset-3 col-lg-5">
            <h1>Agora sem sorrir!</h1>
            <ol> 
             <li>Enquadre os ombros para cima;</li> 
             <li>Gire levemente o rosto <span id="txt11"></span> para <b>DIREITA</b>;</li> 
             <li>Peça para <span id="txt10"></span> olhar para a câmera <b>SEM SORRIR!</b></li> 
            </ol>

            <p>DICA: Use a mesma luz da foto anterior.</p>


          </div>


         </div>
        </div>
       </div>

 <div class="progress8">
 
 <progress id="progressbar8" value="40" max="75" ></progress>

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
          <div class="div9_t col-lg-offset-3 col-lg-5">

           <h1>Qual a data de nascimento <span id="txt6"></span>?<sup>*</sup></h1>

          </div>
          <div class="div9_box col-lg-offset-3 col-lg-5">

           <input name="data" id="data" type="date" data-mask="00-00-0000" onfocus="this.value=''" class="TabOnEnter " tabindex="9" autocomplete="off"  required="required" />
           
          </div>

         </div>

        </div>
       </div>



 <div class="progress9">
 
 <progress id="progressbar9" value="45" max="75" ></progress>

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

           <h1>Qual o celular para contato?<sup>*</sup></h1>

          </div>
          <div class=" div10_box col-lg-offset-3 col-lg-5">

           <input name="celular" id="celular" data-mask="(00) 0000-00009" class='TabOnEnter' tabindex="10" type="text" onfocus="this.value=''"  autocomplete="off" />
           <input type="button" class="sendBtn10" id="btSend10" name="btSend10" style="display: none;">
           <img id="seta10" src="images/seta_ok.svg" alt="seta" style="display: none;">
          </div>

         </div>
        </div>
</div>


 <div class="progress10">
 
 <progress id="progressbar10" value="50" max="75" ></progress>

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

           <h1>E o email?<sup>*</sup></h1>

          </div>
          <div class=" div11_box col-lg-offset-3 col-lg-5">

           <input name="email" id="email" class='TabOnEnter' tabindex="11" type="text" onfocus="this.value=''" autocomplete="off"/>
           <input type="button" class="sendBtn11" id="btSend11" name="btSend11" style="display: none;">
           <img id="seta11" src="images/seta_ok.svg" alt="seta" style="display: none;">
          </div>

         </div>
        </div>
</div>


 <div class="progress11">
 
 <progress id="progressbar11" value="55" max="75" ></progress>

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

           <h1 class='TabOnEnter' tabindex="12" >Qual é a cor da pele <span id="txt3"></span>?<sup>*</sup></h1>

          </div>
          <div class=" div12_box col-lg-offset-3 col-lg-5">
             <select required="required" name="raca" id="raca">
              <option disabled selected="selected" value="1">Selecione</option>
              <option value="Amarela" >Amarela</option>
              <option value="Branca">Branca</option>
              <option value="Indígena">Indígena</option>
              <option value="Negra">Negra</option>
              <option value="Parda">Parda</option>
             </select> 


          </div>

         </div>
        </div>
</div>

 
     


 <div class="progress12">
 
 <progress id="progressbar12" value="60" max="75" ></progress>

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

           <h1 id="proxima2" class='TabOnEnter' tabindex="13" >Em qual bairro <span id="txt4"></span> mora?<sup>*</sup></h1>

          </div>
          <div class=" div11_box col-lg-offset-3 col-lg-5">


             <select name="bairro" id="bairro2">
              <option disabled value="1">Selecione</option>
              <option value="Águas Claras"> Águas Claras</option>
              <option value="Asa Norte"> Asa Norte</option>
              <option value="Asa Sul"> Asa Sul</option>
              <option value="Brazlândia"> Brazlândia</option>
              <option value="CA do Lago Norte"> CA do Lago Norte</option>
              <option value="Candangolândia"> Candangolândia</option>
              <option value="Ceilândia"> Ceilândia</option>
              <option value="Colorado"> Colorado</option>
              <option value="Cruzeiro"> Cruzeiro</option>
              <option value="Gama"> Gama</option>
              <option value="Granja do Torto"> Granja do Torto</option>
              <option value="Guará"> Guará</option>
              <option value="Itapoã"> Itapoã</option>
              <option value="Jardim Botânico"> Jardim Botânico</option>
              <option value="Lago Norte"> Lago Norte</option>
              <option value="Lago Sul"> Lago Sul</option>
              <option value="MI/ML do Lago Norte"> MI/ML do Lago Norte</option>
              <option value="Noroeste"> Noroeste</option>
              <option value="Núcleo Bandeirante"> Núcleo Bandeirante</option>
              <option value="Octogonal"> Octogonal</option>
              <option value="Paranoá"> Paranoá</option>
              <option value="Park Sul"> Park Sul</option>
              <option value="Park Way"> Park Way</option>
              <option value="Planaltina"> Planaltina</option>
              <option value="Recanto das Emas"> Recanto das Emas</option>
              <option value="Riacho Fundo"> Riacho Fundo</option>
              <option value="Riacho Fundo II"> Riacho Fundo II</option>
              <option value="Samambaia"> Samambaia</option>
              <option value="Santa Maria"> Santa Maria</option>
              <option value="São Sebastião"> São Sebastião</option>
              <option value="SCIA"> SCIA</option>
              <option value="SIA"> SIA</option>
              <option value="Sobradinho"> Sobradinho</option>
              <option value="Sobradinho II"> Sobradinho II</option>
              <option value="Sudoeste"> Sudoeste</option>
              <option value="Taguatinga"> Taguatinga</option>
              <option value="Taquari"> Taquari</option>
              <option value="Varjão"> Varjão</option>
              <option value="Vicente Pires"> Vicente Pires</option>
              <option value="Vila da Telebrasília"> Vila da Telebrasília</option>
              <option value="Vila Estrutural"> Vila Estrutural</option>
              <option value="Vila Planalto"> Vila Planalto</option>
              <option value="Zona Rural"> Zona Rural</option>
              <option value="outros"> Outros</option>
             </select> 

          </div>

         </div>
        </div>
</div>



 <div class="progress13">
 
 <progress id="progressbar13" value="65" max="75" ></progress>

</div>

      <nav>
        <ul class="vs-vertical-nav none">

          <li><a href="#" class="vs-prev swiper-control prev"></a></li>

         <li><a href="#" class="vs-next swiper-control next"></a></li>

        </ul>

       </nav>

</div>

<div id="14" class="swiper-slide gradient">        

 <div class="container">
        
   <div class="div14">

      <div class="row">

              <div class="div14_t col-lg-offset-3 col-lg-5">

                <h1 class="penultimo_p" tabindex="14" class="TabOnEnter">Escolha uma opção para o cadastro <span id="txt12"></span> <span class="concat2_texto"></span>:<sup>*</sup></h1>

              </div>
      </div>


      <div class="row col-xs-12">
       <div class="div14_box">


<div class="versao_m">

<div class="div_m" data-toggle="modal" data-target="#myModal1_m">
 <h3>premium</h3>
 <p>fotos em estúdio feitas exclusivamente para cadastro</p>

 <div id="mais"></div>
</div>

<div class="modal modal1_m modal2_m" id="myModal1_m" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-content conteudo_modal_m">
   <h3>premium</h3>
 <p>fotos em estúdio feitas exclusivamente para cadastro</p>
   <ol>
    <li>Recebe 80% do cachê líquido em todos os trabalhos</li>
    <li>Pode se cadastrar em outras agências</li> 
    <li>Aviso de cachê liberado</li>
    <li>Contrato de 2 anos</li>
   </ol>
  <ul class="text-left list-unstyled">
    <li>10x</li>
    <li>R$</li>
  </ul>
  <h2 class="text-center">29<span>,90</span></h2>

   <button type="button" class="botao_escolha_m" data-toggle="modal" data-target="#myModal2_m">escolher</button>
 <div id="menos" data-dismiss="modal"></div>

 </div>
</div>

<div class="modal modal2_m" id="myModal2_m" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-content conteudo_modal_m2">

  <h3>termos e condições</h3>

   <ol>
    <li>Você, <span class="concat_texto"></span> , está contratando a Magneto Elenco para divulgar sua imagem e 
      intermediar sua contratação junto a produtoras audiovisuais, 
      clientes anunciantes e agências de publicidade e promoção de eventos;
    </li>
    <li>
     Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;
    </li>
    <li>
     Nós não garantimos conseguir trabalhos para você, 
     assim como você não tem obrigação de aceitar os trabalhos que lhe oferecermos;
    </li>
    <li>
     Porém, uma vez que você aceite um trabalho que lhe oferecermos, 
     você deverá realizá-lo ou poderá ter que pagar uma multa;
    </li>
    <li>
     Você optou pelo cadastro Premium e por isso sua remuneração sempre será de 80% do cachê líquido 
     (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados os 20% de impostos);
    </li>
    <li>
     Para efetivar seu contrato você deverá pagar R$ 299 ou comprar um de nossos ensaios fotográficos;
    </li>
    <li>
     Você poderá estar inscrito em outra agência enquanto nosso contrato estiver valendo;
    </li>
    <li>
     Nosso contrato valerá por 24 meses;
    </li>
   </ol>

   <p class="acordo">Clicando abaixo você declara estar ciente e concordar com os termos acima apresentados</p>


    <input name="premium" type="radio" id="premium" class="sim_acordo" >
     <label for="premium" class="radio_sim_acordo">
      <span>concordo</span>
     </label> 

     <div id="menos1_1m" data-dismiss="modal"></div>

 </div>
</div>
<!-- FIM MODAL PREMIUM-->
<!-- INÍCIO MODAL GRATUITO -->

<div class="div_m2" data-toggle="modal" data-target="#myModal1_m2">
 <h3>gratuito</h3>
 <p>fotos em estúdio feitas exclusivamente para cadastro</p>

 <div id="mais2"></div>

</div>

<div class="modal modal1_m2" id="myModal1_m2" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-content conteudo_modal_m2_2">
   <h3>gratuito</h3>
 <p>fotos em estúdio feitas exclusivamente para cadastro</p>

   <ol>
    <li>Sem custo, mas deve ser agenciado exclusivamente pela Magneto Elenco</li>
    <li>Recebe 20% do cachê líquido no primeiro trabalho e 60% nos demais trabalhos </li>
    <li>Contrato de 2 anos</li>
   </ol>
   
    <h2>GRÁTIS</h2>



   <button type="button" class="botao_escolha_m2_2" data-toggle="modal" data-target="#gratuito_mobile">escolher</button>
 <div id="menos2_2" data-dismiss="modal"></div>

 </div>
</div>


<div class="modal modal_gratuito_mobile" id="gratuito_mobile" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-content conteudo_gratuito_mobile">

  <h3>termos e condições</h3>

    <ol>
    <li>
     Você, <span class="concat_texto"></span>, está contratando a MAGNETO ELENCO para divulgar sua imagem e intermediar sua contratação junto
      a PRODUTORAS AUDIOVISUAIS, CLIENTES ANUNCIANTES e AGÊNCIAS DE PUBLICIDADE E PROMOÇÃO DE EVENTOS; 
    </li>
    <li>
     Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;
    </li>
    <li>
     Nós não garantimos conseguir trabalhos para você, 
     assim como você não tem obrigação de aceitar os trabalhos que lhe oferecermos;
    </li>
    <li>
     Porém, uma vez que você aceite um trabalho que lhe oferecermos, 
     você deverá realizá-lo ou poderá ter que pagar uma multa;
    </li>
    <li>
      Você optou pelo CADASTRO GRATUITO e por isso sua remuneração será de apenas 20% do 
      CACHÊ LÍQUIDO no seu PRIMEIRO TRABALHO e de 60% do CACHÊ LÍQUIDO no seu segundo trabalho em diante 
      (Cachê Líquido é o Cachê Bruto recebido pela Magneto Elenco descontados 20% de impostos);
     </li>
     <li>
       Você não precisa pagar para se agenciar;
     </li>
     <li>
      Você não poderá estar inscrito em outra agência enquanto nosso contrato estiver valendo;
     </li>
     <li>
       Nosso contrato valerá por 24 meses;
     </li>
   </ol>

   <p class="acordo_gratuito">Clicando abaixo você declara estar ciente e concordar com os termos acima apresentados</p>


    <input name="gratuito_m" type="radio" id="gratuito_m" class="sim_acordo_gratuito" >
     <label for="gratuito_m" class="radio_sim_acordo_gratuito">
      <span>concordo</span>
     </label> 



     <div id="menos2_2m" data-dismiss="modal"></div>

 </div>
</div>
<!-- FIM GRATUITO MODAL -->



<div class="div_m3" data-toggle="modal" data-target="#myModal3_m1">
 <h3>profissional</h3>
 <p>ensaio fotográfico completo p/cadastro e entrega em DVD</p>

 <div id="mais3"></div>
</div>

<div class="modal modal3_m1" id="myModal3_m1" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-content conteudo_modal_m3_m1">
   <h3>Profissional</h3>
    <p>ensaio fotográfico completo p/cadastro e entrega em DVD</p>


    <ol>
     <li>10x de R$ 99,90, pode se cadastrar em outras agências</li>
     <li>Recebe 90% do cachê líquido em todos os trabalhos</li>
     <li>Aviso de cachê liberado</li>
     <li>DVD com 30 fotos tratadas</li>
     <li>Contrato de 3 anos</li>
    </ol>

    <ul class="text-left list-unstyled">
      <li>10x</li>
      <li>R$</li>
    </ul>
    <h2 class="text-center">99<span>,90</span></h2>


   <button type="button" class="botao_escolha_m3_m1" data-toggle="modal" data-target="#gratuito_mobile3">escolher</button>
 <div id="menos3_m1" data-dismiss="modal"></div>

 </div>
</div>


<div class="modal modal_gratuito_mobile3" id="gratuito_mobile3" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-content conteudo_gratuito_mobile3">

  <h3>termos e condições</h3>

    <ol>
    <li>
     Você, <span class="concat_texto"></span>, está contratando a MAGNETO ELENCO para divulgar sua imagem e intermediar sua contratação junto
      a PRODUTORAS AUDIOVISUAIS, CLIENTES ANUNCIANTES e AGÊNCIAS DE PUBLICIDADE E PROMOÇÃO DE EVENTOS; 
    </li>
    <li>
     Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;
    </li>
    <li>
     Nós não garantimos conseguir trabalhos para você, 
     assim como você não tem obrigação de aceitar os trabalhos que lhe oferecermos;
    </li>
    <li>
     Porém, uma vez que você aceite um trabalho que lhe oferecermos, 
     você deverá realizá-lo ou poderá ter que pagar uma multa;
    </li>
    <li>
      Você optou pelo CADASTRO GRATUITO e por isso sua remuneração será de apenas 20% do 
      CACHÊ LÍQUIDO no seu PRIMEIRO TRABALHO e de 60% do CACHÊ LÍQUIDO no seu segundo trabalho em diante 
      (Cachê Líquido é o Cachê Bruto recebido pela Magneto Elenco descontados 20% de impostos);
     </li>
     <li>
       Você não precisa pagar para se agenciar;
     </li>
     <li>
      Você não poderá estar inscrito em outra agência enquanto nosso contrato estiver valendo;
     </li>
     <li>
       Nosso contrato valerá por 24 meses;
     </li>
   </ol>

   <p class="acordo_gratuito3">Clicando abaixo você declara estar ciente e concordar com os termos acima apresentados</p>


    <input name="profissional_m" type="radio" id="profissional_m" class="sim_acordo_gratuito3" >
     <label for="profissional_m" class="radio_sim_acordo_gratuito3">
      <span>concordo</span>
     </label> 



     <div id="menos3_3m" data-dismiss="modal"></div>

 </div>
</div>

</div>



           <div class="versao_d">
              <div class="thumbnail">
               <div class="caption">
                <h3>Premium</h3>
                <p>fotos em estúdio feitas exclusivamente para cadastro</p>
                <ol>
                 <li>Recebe 80% do cachê líquido em todos os trabalhos</li>
                 <li>Pode se cadastrar em outras agências</li>
                 <li>Aviso de cachê liberado</li>
                 <li>Contrato de 2 anos</li>
                </ol>
                <ul class="text-left list-unstyled">
                  <li>10x</li>
                  <li>R$</li>
                </ul>
                <h2 class="text-center">29<span>,90</span></h2>
                <!--modal -->
                 <button type="button" class="botao_modal" data-toggle="modal" data-target="#myModal">
                  Escolher
                 </button>

                 <div class="modal hidden-xs modal2" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-content conteudo_modal">
                   <div class="modal_esquerda">
                    <h3>premium</h3>
                    <p>fotos em estúdio feitas exclusivamente para cadastro</p>

                  <ol>
                   <li>Por apenas 10x de R$ 29,90, pode se cadastrar em outras agências</li>
                   <li>Recebe 80% do cachê líquido em todos os trabalhos</li>
                   <li>Aviso de cachê liberado</li>
                   <li>Contrato de 2 anos</li>
                  </ol>

                    <!-- <p class="preco">Por apenas 10x R$ 29,90 ou já incluso na compra de qualquer ensaio.</p> -->
                   </div>

                   <div class="modal_direita">
                    <h3>Termos e Condições</h3>
                    <div class="termo_um">
                    <ol>
                     <li>
                      Você, <span class="concat_texto"></span>, está contratando a Magneto Elenco 
                      para divulgar sua imagem e intermediar sua contratação junto a produtoras audiovisuais, 
                      clientes anunciantes e agências de publicidade e promoção de eventos; 
                     </li>
                     <li>
                      Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;
                     </li>
                     <li>
                      Nós não garantimos conseguir trabalhos para você,
                       assim como você não tem obrigação de aceitar os trabalhos que lhe oferecermos;
                     </li>
                     <li>
                        Porém, uma vez que você aceite um trabalho que lhe oferecermos, 
                        você deverá realizá-lo ou poderá ter que pagar uma multa;
                     </li>
                    </ol>
                    </div>

                    <div class="termo_dois">
                    <ol start="5">
                     <li>
                       Você optou pelo cadastro Premium e por isso sua remuneração
                        sempre será de 80% do cachê líquido 
                       (cachê líquido é o cachê bruto recebido pela 
                       Magneto Elenco descontados os 20% de impostos);
                     </li>
                     <li>
                       Para efetivar seu contrato você deverá pagar R$ 299 
                       ou comprar um de nossos ensaios fotográficos;
                     </li>
                     <li>
                       Você poderá estar inscrito em outra agência 
                       enquanto nosso contrato estiver valendo;
                     </li>
                     <li>
                       Nosso contrato valerá por 24 meses;
                     </li>
                    </ol>

                    <p class="descricao_contrato">
                     Clicando abaixo você declara estar ciente e 
                     concordar com os termos acima apresentados
                    </p>

                   <div class="button">
                     <input type="radio" name="premium" value="premium" id="premium" class="sim_acordo" />
                     <label for="premium">CONCORDO</label>
                   </div>

              <div id="menos_d" data-dismiss="modal"></div>

                    </div>

                   </div>
                 </div>
                 </div>
  
               </div>
              </div>


              </div>
        </div>


       <div class="div14_box2">
          
        <div class="versao_d">
         <div class="thumbnail">
          <div class="caption">
           <h3>Gratuito</h3>
           <p>fotos em estúdio feitas exclusivamente para cadastro</p>
           <ol>
            <li>Sem custo, mas deve ser agenciado exclusivamente pela Magneto Elenco</li>
            <li>Recebe 20% do cachê líquido no primeiro trabalho e 60% nos demais trabalhos </li>
            <li>Contrato de 2 anos</li>
           </ol>
            <h2>GRÁTIS</h2>
           <!--modal -->
           <button type="button" class="botao_modal2" data-toggle="modal" data-target="#myModal2">
            Escolher
           </button>


                 <div class="modal hidden-xs modal2" id="myModal2" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-content conteudo_modal2">
                   <div class="modal_esquerda2">
                    <h3>gratuito</h3>
                    <p>fotos em estúdio feitas exclusivamente para cadastro</p>
                    <ol>
                      <li>Recebe 20% do cachê líquido no primeiro trabalho e 60% nos demais trabalhos </li>
                      <li>Deve ser agenciado exclusivamente pela Magneto Elenco</li>
                      <li>Contrato de 2 anos</li>
                    </ol>
                  <h2>GRÁTIS</h2>
                   </div>
                   <div class="modal_direita2">
                    <h3>Termos e Condições</h3>
                    <div class="termo_um2">
                    <ol>
                     <li>
                      Você, <span class="concat_texto"></span>, está contratando a MAGNETO ELENCO para divulgar sua imagem e intermediar sua contratação junto
                       a PRODUTORAS AUDIOVISUAIS, CLIENTES ANUNCIANTES e AGÊNCIAS DE PUBLICIDADE E PROMOÇÃO DE EVENTOS; 
                     </li>
                     <li>
                      Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;
                     </li>
                     <li>
                      Nós não garantimos conseguir trabalhos para você, 
                      assim como você não tem obrigação de aceitar os trabalhos que lhe oferecermos;
                     </li>
                     <li>
                      Porém, uma vez que você aceite um trabalho que lhe oferecermos, 
                      você deverá realizá-lo ou poderá ter que pagar uma multa;
                     </li>
                    </ol>
                    </div>

                    <div class="termo_dois2">
                    <ol start="5">
                     <li>
                      Você optou pelo CADASTRO GRATUITO e por isso sua remuneração será de apenas 20% do 
                      CACHÊ LÍQUIDO no seu PRIMEIRO TRABALHO e de 60% do CACHÊ LÍQUIDO no seu segundo trabalho em diante 
                      (Cachê Líquido é o Cachê Bruto recebido pela Magneto Elenco descontados 20% de impostos);
                     </li>
                     <li>
                       Você não precisa pagar para se agenciar;
                     </li>
                     <li>
                      Você não poderá estar inscrito em outra agência enquanto nosso contrato estiver valendo;
                     </li>
                     <li>
                       Nosso contrato valerá por 24 meses;
                     </li>
                    </ol>

                    <p class="descricao_contrato2">
                     Clicando abaixo você declara estar ciente e 
                     concordar com os termos acima apresentados
                    </p>

                   <div class="button2">
                     <input type="radio" name="gratuito" value="gratuito" id="gratuito" class="sim_acordo2" />
                     <label for="gratuito">CONCORDO</label>
                   </div>
                      <div id="menos2_d" data-dismiss="modal"></div>
                    </div>
                   </div>
                 </div>
                 </div>
          </div>
         </div>
        </div>
       </div>
       <div class="div14_box3">
           <div class="versao_d">
           <div class="thumbnail">
            <div class="caption">
             <h3>Profissional</h3>
             <p>ensaio fotográfico completo p/cadastro e entrega em DVD</p>
            <ol>
              <li>Recebe 90% do cachê líquido em todos os trabalhos</li>
              <li>Pode se cadastrar em outras agências</li>
              <li>Aviso de cachê liberado</li>
              <li>DVD com 30 fotos tratadas</li>
              <li>Contrato de 3 anos</li>
            </ol>
            <ul class="text-left list-unstyled">
              <li>10x</li>
              <li>R$</li>
            </ul>
            <h2 class="text-center">99<span>,90</span></h2>
           <!--modal -->
           <button type="button" class="botao_modal3" data-toggle="modal" data-target="#myModal3">
            Escolher
           </button>

              <div class="modal modal2 hidden-xs" id="myModal3" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-content conteudo_modal3">
                   <div class="modal_esquerda3">
                      <h3>Profissional</h3>
                         <p>ensaio fotográfico completo p/cadastro e entrega em DVD</p>
                         <ol>
                          <li>DVD com 30 fotos tratadas</li>
                          <li>Recebe 90% do cachê líquido em todos os trabalhos</li>
                          <li>10x de R$ 99,90, pode se cadastrar em outras agências</li>
                          <li>Aviso de cachê liberado</li>
                          <li>Contrato de 3 anos</li>
                         </ol>
                   </div>
                   <div class="modal_direita3">
                    <h3>Termos e Condições</h3>
                    <div class="termo_um3">
                    <ol>
                     <li>Você, <span class="concat_texto"></span>, está contratando a MAGNETO ELENCO para divulgar sua imagem e intermediar sua contratação junto a PRODUTORAS AUDIOVISUAIS, CLIENTES ANUNCIANTES e AGÊNCIAS DE PUBLICIDADE E PROMOÇÃO DE EVENTOS;</li>
                     <li>Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;</li>
                     <li>Nós não garantimos conseguir trabalhos para você, assim como você não tem obrigação de aceitar os trabalhos que lhe oferecermos;</li>
                     <li>Porém, uma vez que você aceite um trabalho que lhe oferecermos, você deverá realizá-lo ou poderá ter que pagar uma multa;</li>
                    </ol>
                    </div>
                    <div class="termo_dois3">
                    <ol start="5">
                      <li>Você optou pelo CADASTRO PROFISSIONAL e por isso sua remuneração sempre será de 90% do CACHÊ LÍQUIDO (Cachê Líquido é o Cachê Bruto recebido pela Magneto Elenco descontados 20% de impostos);</li>
                      <li>Para efetivar seu contrato você deverá pagar R$ 999 em até 10x;</li>
                      <li>Você poderá estar inscrito em outra agência enquanto nosso contrato estiver valendo;</li>
                      <li>Um Ensaio Fotográfico completo será realizado e entregue a você em DVD com mínimo de 30 fotos tratadas;</li>
                      <li>Nosso contrato valerá por 36 meses;</li>
                    </ol>
                    <p class="descricao_contrato3">
                     Clicando abaixo você declara estar ciente e 
                     concordar com os termos acima apresentados
                    </p>
                   <div class="button3">
                     <input type="radio" name="opcao" value="Profissional" id="profissional" class="sim_acordo3" />
                     <label for="profissional">CONCORDO</label>
                   </div>
                  <div id="menos3_d" data-dismiss="modal"></div>

                    </div>

                   </div>
                 </div>
                 </div>

             
            </div>
           </div>
</div>
       </div>
      </div>

   </div>



  <div class="progress14">
  
  <progress id="progressbar14" value="70" max="75" ></progress>

 </div>

     <nav>
         <ul class="vs-vertical-nav none">

           <li><a href="#" class="vs-prev swiper-control prev"></a></li>

          <li><a href="#" class="vs-next swiper-control next"></a></li>

         </ul>

        </nav> 

 </div> 

</div>

<div id="15" class="swiper-slide gradient">        

       <div class="container">
        <div class="div15">
         <div class="row">
          <div class=" div15_t col-lg-offset-3 col-lg-5">

           <h1 class="ultimo_p">Que tal deixar o perfil <span id="txt7"></span> <span class="concat2_texto"></span> mais completo?</h1>
           

          </div>
          <div class=" div15_box col-lg-offset-3 col-lg-5">
            <img src="images/ig.svg" alt="instagram">
           <input name="ig" id="ig" type="text" onfocus="this.value=''" class="TabOnEnter ig" tabindex="14" autocomplete="off" />
           <!-- <button ></button><span class="seta"><img src="img/seta_ok.svg" alt="seta"></span> -->
          </div>
          <div class=" div15_box2 col-lg-offset-3 col-lg-5">
            <img src="images/face.svg" alt="facebook">
           <input name="face" id="face" type="text" onfocus="this.value=''" class="TabOnEnter face" tabindex="15" autocomplete="off" />
           <!-- <button ></button><span class="seta"><img src="img/seta_ok.svg" alt="seta"></span> -->
          </div>
          <div class=" div15_box3 col-lg-offset-3 col-lg-5">
            <img src="images/tt.svg" alt="twitter">
           <input name="tt" id="tt" type="text" onfocus="this.value=''" class="TabOnEnter tt" tabindex="16" autocomplete="off" />
           <!-- <button ></button><span class="seta"><img src="img/seta_ok.svg" alt="seta"></span> -->
          </div>

         </div>

           <button class="TabOnEnter enviar" tabindex="17" id="cadastra" name="submit" type="submit">Enviar Cadastro</button>
            
        <p id="erro" style="display: none;">Por favor verifique se preencheu todos os campos obrigatórios marcados com <sup>*</sup></p>
            
        </div>
       </div>



 <div class="progress15">
 
 <progress id="progressbar15" value="75" max="75" ></progress>

</div>

      <nav>
        <ul class="vs-vertical-nav2 none">


         <li><a href="#" class="vs-prev2 swiper-control prev"></a></li>

        </ul>

</nav>
</div> 
</div>
</nav>
</div>
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