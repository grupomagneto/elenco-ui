<!-- <?php 

// $conexao = mysqli_connect ('localhost', 'root', '', 'vinigoulart18');	

// if (mysqli_connect_errno())
//         	{
//           		echo "Erro ao se conectar com banco de dados: " . mysqli_connect_error();
//         	}

// ?> -->
<html>

<head>
	
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>

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
                break;

                case 'masculino':
                document.getElementById( 'txt' ).innerHTML = 'o';
                document.getElementById( 'txt2' ).innerHTML = 'o';
                break;

                default:
                document.getElementById( 'txt' ).innerHTML = 'Nenhum valor informado';
                break;
            }
        }

          function gravar(){
            var nome = document.getElementById("txtNome").value;
            var div = document.getElementById("divResultado");
            var div2 = document.getElementById("divResultado2");
             
            div.innerHTML = "" + nome +"";
            div2.innerHTML = "" + nome +"";
        }


    </script>
</head>
	

<form action="#">
  

      <h1>Qual o seu sexo?</h1>

        <select id="" onchange="exibeMsg(this.value);">
            <option value="">-- Selecione --</option>
            <option value="feminino">feminino</option>
            <option value="masculino">masculino</option>
        </select>
        
        <br/>

        
    <div>
        <label>Escreva seu nome:</label>
        <input type="text" id="txtNome"/>
        <button id="btnEnviar" onclick="gravar()" >Gravar</button>
    </div>

        <br/>

        <h1>Pronto, <span id="divResultado"></span> ! Você já está cadastrad<span id="txt"></span> e pront<span id="txt2"></span> para trabalhar. Sempre que precisar de algo, dê um alô em nossa página do Facebook.</h1>
        <br />
        <br />
        <h1>Quando você nasceu, <span id="divResultado2"></span> ?</h1>

</form>

<!-- 
<select name="sexo" id="sexo">

  <option value="feminino">feminino</option>
  <option value="masculino">masculino</option>

</select>

<button onclick="myFunction()">ok</button>



<h1>Olá, car<span id="resposta"></span> cliente!</h1> -->




</html>