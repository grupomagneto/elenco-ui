<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Magneto Elenco</title>

  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">

    
    <link rel="stylesheet" href="css/form4.css">
<link rel="stylesheet" href="css/jquery.jscrollpane.css">
    <link rel="stylesheet" href="css/customSelectBox2.css" />

    
  </head>

  <body class="noJS" id="gradient" >

 
<form action="adiciona-usuario.php" method="post" enctype="multipart/form-data">

<section class="section1">

  <div class="content"> 
    <i class="arrow icon-arrow-up"></i>

    <h1>Qual o seu primeiro nome?</h1>

    <input name="nome" id="nome" type="text" onkeypress ="autoTab(this, event);" autofocus required  />


    <i class="arrow icon-arrow-down"></i>




<div class="progress1">
  
<progress id="progressbar" value="0"></progress>

</div>

      <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#" class="vs-prev">Next</a></li>

      <li><a href="#2" class="vs-next">Prev</a></li>

    </ul>

  </nav>

  </div>

</section>

<section class="section2 gradient" id="2"  data-section="2">
  <div class="content"> 
    <div class="responsavel"><h1>Qual seu sobrenome?</h1></div>

    <input name="sobrenome" id="sobrenome" type="text" onkeypress ="autoTab(this, event);" autofocus required  />



 <div class="progress2">
  
<progress id="progressbar2" value="0"></progress>
</div>


         <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#1" class="vs-prev">Next</a></li>

      <li><a href="#3" class="vs-next">Prev</a></li>

    </ul>

  </nav>


  </div>
</section>

<section class="section3 gradient" id="3" data-section="3">
  <div class="content"> 
 
    <div class="camera"><img src="images/camera.svg" alt="camera"></div>  
  <div class="fotos"> <h1 >Precisamos de duas fotos <br /> suas feitas hoje</h1></div> 


  <div class="progress5">
  
    <progress id="progressbar5" value="0"></progress>

  </div>

  <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#2" class="vs-prev">Next</a></li>

      <li><a href="#4" class="vs-next">Prev</a></li>

    </ul>

  </nav>

  </div>
</section>

<section class="section4 gradient" id="4" data-section="4">
  <div class="gradient2"></div>

  <div class="content"> 

    <div class="sorria"><h1>Sorria!</h1></div>


<label class="myFile">
  <img src="images/upload.svg"  alt="upload" />
  <input type="file" />
</label>


  <div class="progress6">
  
    <progress id="progressbar6" value="0"></progress>

  </div>

         <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#3" class="vs-prev">Next</a></li>

      <li><a href="#5" class="vs-next">Prev</a></li>

    </ul>

  </nav>

  </div>
</section>

<section class="section5 gradient" id="5" data-section="5">
      <div class="gradient3"></div>
  <div class="content"> 

    <div class="serio"><h1>Agora Séri@!</h1></div>


<label class="myFile2">
  <img src="images/upload.svg"  alt="upload" />
  <input type="file" name="fotos" />
</label>


  <div class="progress7">
  
    <progress id="progressbar7" value="0"></progress>

  </div>

  <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#4" class="vs-prev">Next</a></li>

      <li><a href="#6" class="vs-next">Prev</a></li>

    </ul>

  </nav>


  </div>

</section>

<section class="section6" id="6" data-section="6">  
  <div class="content"> 

  <div class="contato">
    <h1>Qual o seu celular?</h1>

    <input name="celular" id="celular" type="text" onkeypress ="autoTab(this, event);" maxlength="15" required />

  </div> 




  <div class="progress8">
  
    <progress id="progressbar8" value="0"></progress>

  </div>

         <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#5" class="vs-prev">Next</a></li>

      <li><a href="#7" class="vs-next">Prev</a></li>

    </ul>

  </nav>



  </div>
</section>

<section class="section7" id="7" data-section="7">
 <div class="content"> 

<div class="email"> <h1>E o seu email?</h1>  </div>
  

    <input name="email" id="email" type="email" onkeypress ="autoTab(this, event);"  required />



  <div class="progress9">
  
    <progress id="progressbar9" value="0"></progress>

  </div>

  <nav>

    <ul class="vs-vertical-nav">

      <li><a href="#6" class="vs-prev">Next</a></li>

      <li><a href="#8" class="vs-next">Prev</a></li>

    </ul>

  </nav>



  </div>
</section>

<section class="section8 gradient" id="8" data-section="8">
  <div class="content"> 

   <div class="sexo"> <h1>Qual o seu sexo?</h1></div>

    <div class="toggleswitch">
      <input id="opt_a" name="sexo" type="radio" value="feminino" onkeypress ="autoTab(this, event);">
      <label for="opt_a">Feminino</label>
      <input checked="checked" id="opt_b" name="sexo" type="radio" value="masculino" onkeypress ="autoTab(this, event);">
      <label for="opt_b">Masculino</label>  
    </div>



  <div class="progress10">
  
    <progress id="progressbar10" value="0"></progress>

  </div>



  <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#7" class="vs-prev">Next</a></li>

      <li><a href="#9" class="vs-next">Prev</a></li>

    </ul>

  </nav>





  </div>
</section>

<section class="section9 gradient" id="9" data-section="9">
  <div class="content"> 

     <div class="raca"> <h1>Qual a sua raça?</h1></div>
    
  <select name="raca" class="custom" onkeypress ="autoTab(this, event);">
    <option  selected="selected"  value="amarelo">Amarela</option>
    <option value="branca">Branca</option>
    <option value="indigena">Indigena</option>
    <option value="preta">Preta</option>
    <option value="parda">Parda</option>
  </select>  




  <div class="progress11">
  
    <progress id="progressbar11" value="0"></progress>

  </div>

         <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#8" class="vs-prev">Next</a></li>

      <li><a href="#10" class="vs-next">Prev</a></li>

    </ul>

  </nav>





  </div>
</section>

<section class="section10 gradient" id="10" data-section="10">
  <div class="content"> 
     
     <div class="bairro"> <h1>Em qual bairro você mora?</h1> </div>

    <div class="left">

<select name="bairro" class="custom" onkeypress ="autoTab(this, event);">
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



  <div class="progress12">
  
    <progress id="progressbar12" value="0"></progress>

  </div>
  
    <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#9" class="vs-prev">Next</a></li>

      <li><a href="#11" class="vs-next">Prev</a></li>

    </ul>

  </nav>


  </div>
</section>

<section class="section11 gradient" id="11" data-section="11">
  <div class="content"> 

     <div class="ator"> <h1>Você é ator ou atriz com DRT?</h1> </div>  

    <div class="toggleswitch2">
      <input id="sim" name="ator" type="radio" value="sim" required onkeypress ="autoTab(this, event);">
      <label for="sim">Sim</label>
      <input checked="checked" id="nao" name="ator" type="radio" required value="nao" onkeypress ="autoTab(this, event);">
      <label for="nao">Não</label>  
    </div>

  <div class="sim2">
    <div class="centered">

    <h3>Ótimo!</h3>

    <p class="p1">Isso quer dizer que você pode se agenciar  <br />pelo <b>Cadastro Premium</b> gratuitamente</p> 

    <p class="p1">Ao finalizar este cadastro, entre em contato <br /> com a Magneto Elenco para mais informações</p>
    </div>
  </div>




  <div class="progress13">
  
    <progress id="progressbar13" value="0"></progress>

  </div>
  
         <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#10" class="vs-prev">Next</a></li>

      <li><a href="#12" class="vs-next">Prev</a></li>

    </ul>

  </nav>

  </div>
</section>


<section class="section12 gradient" id="12" data-section="12">
  <div class="content"> 

  <div class="quartoze"><h1>Que tal deixar seu perfil mais completo?</h1></div>   

    <div class="ig">

      <img class="insta" src="images/ig.svg" alt="instagram">
      <input name="instagram" id="ig" class="ig2" type="text" required onkeypress ="autoTab(this, event);" />

    </div>

    <div class="face">

      <img src="images/face.svg" alt="facebook">
      <input name="facebook" id="face" class="face2" type="text" required onkeypress ="autoTab(this, event);" />

    </div>

    <div class="tt">

      <img src="images/tt.svg" class="imgtt"  alt="twitter">
      <input name="twitter" id="twitter" class="twitter2" type="text" required onkeypress ="autoTab(this, event);" />
      
    </div>

      <button class="enviar" type="submit">Enviar</button>


  <div class="progress14">
  
    <progress id="progressbar14" value="0"></progress>

  </div>
  
         <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#11" class="vs-prev">Next</a></li>

      <li><a href="#13" class="vs-next">Prev</a></li>

    </ul>

  </nav>



  </div>
</section>



<section class="section13 gradient" id="13" data-section="13">

<div class="gradient4"></div> 
  <div class="content">   

 <div class="ultima"><h1>Bem-vind@ ao <br />nosso elenco!</h1></div>   
  
  <div class="logomag"><img src="images/logo.svg" alt="LOGO"></div>



  
  <nav>
    <ul class="vs-vertical-nav">

      <li><a href="#12" class="vs-prev">Next</a></li>

    </ul>

  </nav>

  
    
  </div>



</section> 


</form>


    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/1.4.7/jquery.scrollTo.min.js'></script>  
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>  

<script src="js/jScrollPane.js"></script>
    <script src="js/jquery.mousewheel.js"></script>
    <script src="js/SelectBox.js"></script>

        <script src="js/forms.js"></script>

    
    
    
  </body>
</html>
