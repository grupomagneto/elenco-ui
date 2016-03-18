
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">



  <script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.js"></script>


  
    <link rel="stylesheet" type="text/css" href="/css/result-light.css">

  <style type="text/css">
    
  </style>

  <title></title>

  
    




<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$('input').keyup(function () {
    if ($.trim(this.value).length > 0) $('#btSend').show()
    else $('#btSend').hide()
});
});//]]> 

</script>

  
</head>

<body>
  <input type="text" id="phoneNumber" name="Number" maxlength="10" size="15" onfocus="this.value=''" value="Enter your number" autocomplete="off">
<br/>
<br/>
<span style="color:red" class="title1" id="checkPhone"></span>
<br/>
<input type="button" class="sendBtn" id="btSend" name="btSend" value="NextStep" style="display: none">
  
</body>

</html>




 <?php 

// $conexao = mysqli_connect ('localhost', 'root', '', 'vinigoulart18');	

// if (mysqli_connect_errno())
//         	{
//           		echo "Erro ao se conectar com banco de dados: " . mysqli_connect_error();
//         	}

// ?> 
<html>

<head>
	
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js'></script>

    <script type="text/javascript">
// function myFunction()
// {
// var a=document.getElementById("sexo").value;

// if (a=="feminino")
//   {
// document.getElementById("resposta").innerText="a";
//   }
// else
//   {
// document.getElementById("resposta").innerHTML="o";
//   }
// }
    function exibeMsg( valor )
        {
            
            switch (valor)
            {
                case 'feminino':
                document.getElementById( 'txt' ).innerHTML = 'a';
                document.getElementById( 'txt2' ).innerHTML = 'a';
                document.getElementById( 'txt3' ).innerHTML = 'atriz';
                break;

                case 'masculino':
                document.getElementById( 'txt' ).innerHTML = 'o';
                document.getElementById( 'txt3' ).innerHTML = 'ator';
                break;

                default:
                document.getElementById( 'txt' ).innerHTML = 'Nenhum valor informado';
                break;
            }
        }

          function gravar(){
            document.getElementById("myText").disabled = false;
            var nome = document.getElementById("txtNome").value;
            var div = document.getElementById("divResultado");
            var div2 = document.getElementById("divResultado2");
            var div3 = document.getElementById("divResultado3");
             
            div.innerHTML = "" + nome +"";
            div2.innerHTML = "" + nome +"";
            div3.innerHTML = "" + nome +"";
        }

          function proximo(){

            document.getElementById("myText2").disabled = false;
          }


          function verify_form(obj_form) {
             if (obj_form.nome.value.length < 3) {
             $( "p" ).toggle();
              obj_form.nome.focus();
              return false; 
             } else {
              return true; 
             }

          }

function mostraBotao() {
    document.getElementById('meuBotao').style.display = 'inline-block';    
}


    </script>
</head>
	

<form action="#" onSubmit="return verify_form(this);">
  

      <h1>Qual o seu sexo?</h1>


      <input id="opt_a" name="sexo" type="radio" value="feminino" onkeypress ="autoTab(this, event);"  onchange="exibeMsg(this.value);">
      <label for="opt_a">Feminino</label>
      <input id="opt_b" name="sexo" type="radio" value="masculino" onkeypress ="autoTab(this, event);"  onchange="exibeMsg(this.value);">
      <label for="opt_b">Masculino</label>  
        
        <br/>
        
    <div>
        <label>Escreva seu nome:</label>
        <input type="text" id="txtNome" name="nome"  onClick='mostraBotao()' onKeyDown='mostraBotao'/>
        <button id='meuBotao' value='AlgumaCoisa' style='display:none' onclick="gravar()" >Gravar</button>
        <p style="display: none">Por favor seu nome tem que ter no mínimo três letras</p>

        <label>Escreva seu sobrenome:</label>
        <input type="text" id="myText" disabled="disabled"/>
        <button id="btnEnviar" onclick="proximo()" >Gravar</button>


        <label>Escreva seu ultimo nome:</label>
        <input type="text" id="myText2" disabled="disabled"/>

    </div>

        <br/>

        <h1>Pronto, <span id="divResultado"></span> ! Você já está cadastrad<span id="txt"></span> e pront<span id="txt2"></span> para trabalhar. Sempre que precisar de algo, dê um alô em nossa página do Facebook.</h1>
        <br />
        <br />
        <h1>Quando você nasceu, <span id="divResultado2"></span> ?</h1>

        <h1>Você é, <span id="txt3"></span> ?</h1>

</form>




<!-- 
<select name="sexo" id="sexo">

  <option value="feminino">feminino</option>
  <option value="masculino">masculino</option>

</select>

<button onclick="myFunction()">ok</button>



<h1>Olá, car<span id="resposta"></span> cliente!</h1> -->


<!-- 

</html> -->