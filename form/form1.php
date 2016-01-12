<!DOCTYPE html>
<html lang="pt-br">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/jquery.jscrollpane.css" />
    <link rel="stylesheet" href="css/customSelectBox.css" />


	<title>Cadastro Magneto Elenco</title>

</head>
<body id="gradient" class="noJS"  >
  

<div class="container">


  <form action="#" method="post">
<!-- PRIMEIRA DIV-->
  <div id="um" class="item module parallax parallax-1">
    <h1>Qual o seu primeiro nome?</h1>
    <input name="nome" id="nome" type="text" onkeypress ="autoTab(this, event);" autofocus required  />

  <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#" class="vs-prev">Next</a></li>

      <li><a href="#2" class="vs-next">Prev</a></li>

    </ul>

  </nav>

<div class="progress1">
  
<progress id="progressbar" value="0"></progress>

</div>

  </div>

  <!--FIM PRIMEIRA DIV-->

  <!--SEGUNDA DIV-->

  <div id="2" class="item module parallax parallax-2">  
    <h1>Qual o seu sobrenome?</h1>
    <input name="sobrenome" id="sobrenome" type="text" required onkeypress ="autoTab(this, event);"  />


 <div class="progress2">
  
<progress id="progressbar2" value="0"></progress>
</div>

  <nav>
    <ul class="vs-vertical-nav2">

      <li><a href="#1" class="vs-prev2">Next</a></li>

      <li><a href="#3" class="vs-next2">Prev</a></li>

    </ul>

  </nav>


  </div>

  <!--FIM SEGUNDA DIV-->

  <!--TERCEIRA DIV-->

  <div id="3" class="item module parallax parallax-3">  
    <div class="camera"><img src="images/camera.svg" alt="camera"></div>  
    
    <h1 >Precisamos de duas fotos <br /> suas feitas hoje</h1>


  <div class="progress3">
  
    <progress id="progressbar3" value="0"></progress>
  </div>

  <nav>
    <ul class="vs-vertical-nav3">

      <li><a href="#2" class="vs-prev3">Next</a></li>

      <li><a href="#4" class="vs-next3">Prev</a></li>

    </ul>

  </nav>


  </div>
  <!--FIM TERCEIRA DIV-->
  
  <!--QUARTA DIV-->

  <div id="4" class="item module parallax parallax-4">  
<div id="gradient2"></div>
    <h1>Sorria!</h1>

<label class="myFile">
  <img src="images/upload.svg"  alt="upload" />
  <input type="file" />
</label>

  <div class="progress4">
  
    <progress id="progressbar4" value="0"></progress>
  </div>

    <nav>
    <ul class="vs-vertical-nav4">

      <li><a href="#3" class="vs-prev4">Next</a></li>

      <li><a href="#5" class="vs-next4">Prev</a></li>

    </ul>

  </nav>

  </div>

  <!--FIM QUARTA DIV-->

  <!--QUINTA DIV-->

  <div id="5" class="item module parallax parallax-5"> 
<div id="gradient3"></div>  
    <h1>Agora séri@!</h1>
<label class="myFile2">
  <img src="images/upload.svg"  alt="upload" />
  <input type="file" />
</label>


  <div class="progress5">
  
    <progress id="progressbar5" value="0"></progress>
  </div>


    <nav>
    <ul class="vs-vertical-nav5">

      <li><a href="#4" class="vs-prev5">Next</a></li>

      <li><a href="#6" class="vs-next5">Prev</a></li>

    </ul>

  </nav>

  </div>

  <!--FIM QUINTA DIV-->

  <!-- SEXTA DIV-->

  <div id="6" class="item module parallax parallax-6">   
    <h1>Qual o seu celular?</h1>
    <input name="celular" id="celular" type="text" onkeypress ="autoTab(this, event);" required />

  <div class="progress6">
  
    <progress id="progressbar6" value="0"></progress>
  </div>


    <nav>
    <ul class="vs-vertical-nav6">

      <li><a href="#5" class="vs-prev6">Next</a></li>

      <li><a href="#7" class="vs-next6">Prev</a></li>

    </ul>

  </nav>

  </div>
  <!--FIM SEXTA DIV-->

  <!--SÉTIMA DIV-->

  <div id="7" class="item module parallax parallax-7">   
    <h1>E o seu email?</h1> 
    <input name="email" id="email" type="email" onkeypress ="autoTab(this, event);" required />

  <div class="progress7">
  
    <progress id="progressbar7" value="0"></progress>
  </div>



    <nav>
    <ul class="vs-vertical-nav7">

      <li><a href="#6" class="vs-prev7">Next</a></li>

      <li><a href="#8" class="vs-next7">Prev</a></li>

    </ul>

  </nav>


  </div>

  <!--FIM SÉTIMA DIV-->

  <!--OITAVA DIV-->

  <div id="8" class="item module parallax parallax-8">   
    <h1>Qual o seu sexo?</h1>

    <div class="toggleswitch">
      <input id="opt_a" name="option" type="radio" value="opt_a" onkeypress ="autoTab(this, event);">
      <label for="opt_a">Feminino</label>
      <input checked="checked" id="opt_b" name="option" type="radio" value="opt_b" onkeypress ="autoTab(this, event);">
      <label for="opt_b">Masculino</label>  
    </div>


  <div class="progress8">
  
    <progress id="progressbar8" value="0"></progress>
  </div>

    <nav>
    <ul class="vs-vertical-nav8">

      <li><a href="#7" class="vs-prev8">Next</a></li>

      <li><a href="#9" class="vs-next8">Prev</a></li>

    </ul>

  </nav>

  </div>
  <!--FIM OITAVA DIV-->


  <!--INICIO NONA DIV-->

  <div id="9" class="item module parallax parallax-9">   
    <h1>Qual a sua raça?</h1>
    
  <select name="raca" class="custom" onkeypress ="autoTab(this, event);">
    <option  selected="selected"  value="amarelo">Amarela</option>
    <option value="branca">Branca</option>
    <option value="indigena">Indigena</option>
    <option value="preta">Preta</option>
    <option value="parda">Parda</option>
  </select>  

  <div class="progress9">
  
    <progress id="progressbar9" value="0"></progress>
  </div>

      <nav>
    <ul class="vs-vertical-nav9">

      <li><a href="#8" class="vs-prev9">Next</a></li>

      <li><a href="#10" class="vs-next9">Prev</a></li>

    </ul>

  </nav>

  </div>

  <!--FIM NONA DIV-->


  <!--INICIO DÉCIMA DIV-->

  <div id="10" class="item module parallax parallax-10">   
    <h1>Em qual bairro você mora?</h1>

    <div class="left">

<select name="bairros" class="custom" onkeypress ="autoTab(this, event);">
   <option selected="selected" value="aguasclaras"> Águas Claras</option>
   <option value="asanorte"> Asa Norte</option>
   <option value="asanorte"> Asa Sul</option>
   <option value="brazlandia"> Brazlandia</option>
   <option value="ca"> CA Do Lago Norte</option>
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

  <div class="progress10">
  
    <progress id="progressbar10" value="0"></progress>
  </div> 

        <nav>
    <ul class="vs-vertical-nav10">

      <li><a href="#9" class="vs-prev10">Next</a></li>

      <li><a href="#11" class="vs-next10">Prev</a></li>

    </ul>

  </nav>

  </div>


  <!--FIM DÉCIMA DIV-->


  <!--INICIO DIV ONZE - DÉCIMA PRIMEIRA-->


  <div id="11" class="item module parallax parallax-11">   
    <h1>Você é ator ou atriz com DRT?</h1>

    <div class="toggleswitch2">
      <input id="sim" name="option" type="radio" value="sim" onkeypress ="autoTab(this, event);">
      <label for="sim">Sim</label>
      <input checked="checked" id="nao" name="option" type="radio" value="nao" onkeypress ="autoTab(this, event);">
      <label for="nao">Não</label>  
    </div>

  <div class="sim2">
    <div class="sim2_1">fundo</div>

    <h3>Ótimo!</h3>

    <p class="p1">Isso quer dizer que você pode se agenciar  <br />pelo <b>Cadastro Premium</b> gratuitamente</p> 

    <p class="p2">Ao finalizar este cadastro, entre em contato <br /> com a Magneto Elenco para mais informações</p>

  </div>


  <div class="progress11">
  
    <progress id="progressbar11" value="0"></progress>
  </div> 

  <nav>
    <ul class="vs-vertical-nav11">

      <li><a href="#10" class="vs-prev11">Next</a></li>

      <li><a href="#12" class="vs-next11">Prev</a></li>

    </ul>

  </nav>

</div>

  <div id="12" class="item module parallax parallax-12">  

    <h1>Que tal deixar seu perfil mais completo?</h1> 

    <div class="ig">
      <img src="images/ig.svg" alt="instagram">
      <input name="ig" id="ig" type="ig" required onkeypress ="autoTab(this, event);" />
    </div>

    <div class="face">
      <img src="images/face.svg" alt="facebook">
      <input name="face" id="face" type="face" required onkeypress ="autoTab(this, event);" />
    </div>

    <div class="tt">
      <img src="images/tt.svg" alt="twitter">
      <input name="twitter" id="twitter" type="twitter" required onkeypress ="autoTab(this, event);" />
    </div>

  <div class="progress12">
  
    <progress id="progressbar12" value="0"></progress>
  </div> 


  <nav>
    <ul class="vs-vertical-nav12">

      <li><a href="#11" class="vs-prev12">Next</a></li>

      <li><a href="#13" class="vs-next12">Prev</a></li>

    </ul>

  </nav>

  </div>


  <div id="13" class="item module parallax parallax-13"> 

<div id="gradient4"></div>   
    <h1>Bem-vind@ ao <br />nosso elenco!</h1>
  
  <div class="logomag"><img src="images/logo.svg" alt="LOGO"></div>

  </div>




  </form>


</div>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
   <!--  // <script src='http://alico.me/lib/slimscroll.js'></script> -->

      <script src="js/jScrollPane.js"></script>
    <script src="js/jquery.mousewheel.js"></script>
    <script src="js/SelectBox.js"></script>
    <script src="js/midway.min.js"></script>

        <script src="js/forms.js"></script>


</body>
</html>