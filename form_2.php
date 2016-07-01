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
<body >
<form name="form2" action="adiciona-usuario.php" id="form2" method="post" enctype="multipart/form-data" onsubmit="return valida_form2(this)">
<div class="swiper-container menor"> <!-- Swiper Container -->
  <div class="swiper-wrapper"> <!-- Swiper wrapper -->
    <!-- DIV QUEM VOCÊ ESTÁ CADASTRANDO  -->
    <div id="0" class="swiper-slide gradient">
      <div class="container">
        <div class="div0">
          <div class="row">
              <div class="pergunta col-lg-offset-3 col-lg-5">
                <h1>Quem você está cadastrando?</h1>
              </div>
            <div class="row">
              <div class="primeiro col-lg-offset-3 col-lg-5">
                <a href="#form_maior" class="btn teste" onClick="inputFocus()">Eu mesmo(a), sou maior de idade</a> 
              </div>
            </div>
            <div class="row">
              <div class="segunda col-lg-offset-3 col-lg-5">
                <a href="#" class="btn swiper-control next">Uma criança ou adolescente</a> 
              </div>
            </div>
          </div>
        </div>
        <div class="progress0">
          <progress id="progressbar0" value="0" max="80"></progress>
        </div>
<!--           <nav>
            <ul class="vs-vertical-nav1 none">
              <li><a href="#" class="vs-next1 swiper-control next"></a></li>
            </ul>
          </nav> -->
      </div>
    </div>
    <!-- FIM DIV QUEM VOCÊ ESTÁ CADASTRANDO -->
    <!-- DIV VOCÊ É O RESPONSÁVEL  -->
    <div id="1" class="swiper-slide gradient">
      <div class="container">
        <div class="div1">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1 class="TabOnEnter" tabindex="1">Você é legalmente responsável por essa criança/adolescente?<sup>*</sup></h1>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input name="responsavel" type="radio" value="nao" id="responsavel_nao" class="radio_0"  />
                <label id="responsavel_nao_label" for="responsavel_nao" class="radio-label4">
                  <span>Não</span>
                </label>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input name="responsavel" type="radio" value="sim" id="responsavel_sim" class="radio_0" />
                <label id="responsavel_sim_label" for="responsavel_sim" class="radio-label3">
                  <span>Sim</span>
                </label>
            </div>
          </div>
        </div>
      </div>
      <div class="progress1">
        <progress id="progressbar1" value="5" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev"></a></li>
          <li><a href="#" class="vs-next swiper-control next focus1"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV VOCÊ É O RESPONSÁVEL -->
    <!-- DIV CPF RESPONSÁVEL  -->
    <div id="2" class="swiper-slide gradient">
      <div class="container">
        <div class="div2">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1>Qual o seu cpf?<sup>*</sup></h1>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input type="text" name="cpf_responsavel" id="cpf_responsavel" data-mask="000.000.000-00" min="11" max= "11" class="TabOnEnter" tabindex="2" placeholder="000.000.000-00" required />
                <input type="button" class="sendBtn" id="btSend" name="btSend" style="display: none;" />
                  <img id="seta" class="vs-next swiper-control next" src="images/ok_neg.svg" style="display: none;">
            </div>
          </div>
        </div>
      </div>
      <div class="progress2">
        <progress id="progressbar2" value="10" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev"></a></li>
          <li><a href="#" class="vs-next swiper-control next focus2"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV CPF RESPONSÁVEL -->
    <!-- DIV NOME RESPONSÁVEL -->
    <div id="3" class="swiper-slide gradient">
      <div class="container">
        <div class="div3">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1>E o seu nome completo?<sup>*</sup></h1>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input type="text" name="nome_responsavel" id="nome_responsavel" tabindex="3" autocomplete="off" required placeholder=" " />
                <input type="button" class="sendBtn2" id="btSend2" name="btSend2" style="display: none;" />
                  <img id="seta2" class="vs-next swiper-control next" src="images/ok_neg.svg" style="display: none;">
            </div>
          </div>
        </div>
      </div>
      <div class="progress3">
        <progress id="progressbar3" value="15" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev focus2"></a></li>
          <li><a href="#" class="vs-next swiper-control next"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV NOME RESPONSÁVEL -->
    <!-- DIV SEXO -->
    <div id="4" class="swiper-slide gradient">
      <div class="container">
        <div class="div4">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1 class="TabOnEnter" tabindex="4">Qual o sexo do menor?<sup>*</sup></h1>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input type="radio" name="sexo_menor" value="masculino" id="radio0" class="radio" onchange="exibeMsg2(this.value);" />
                <label for="radio0" class="radio-label2">
                  <span>Masculino</span>
                </label>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input type="radio" name="sexo_menor" value="feminino" id="radio1" class="radio" onchange="exibeMsg2(this.value);" />
                <label for="radio1" class="radio-label">
                  <span>Feminino</span>
                </label>
            </div>
          </div>
        </div>
      </div>
      <div class="progress4">
        <progress id="progressbar4" value="20" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev focus3"></a></li>
          <li><a href="#" class="vs-next swiper-control next focus4"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV SEXO -->
    <!-- DIV NOME DA PESSOA SENDO CADASTRADA -->
    <div id="5" class="swiper-slide gradient">
      <div class="container">
        <div class="div5">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1 id="proxima">Qual o primeiro nome <span id="txt2"></span>?<sup>*</sup></h1>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input name="nome_menor" id="nome_menor" type="text" class="TabOnEnter" tabindex="5" autocomplete="off" placeholder=" " required />
                <input type="button" class="sendBtn" id="btSend4" name="btSend4" style="display: none;" />
                  <img id="seta4" onclick="gravar()" class="swiper-control next" src="images/ok_neg.svg" style="display: none;">
            </div>
          </div>
        </div>
      </div>
      <div class="progress5">
        <progress id="progressbar5" value="25" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev"></a></li>
          <li><a href="#" class="vs-next swiper-control next focus5"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV NOME DA PESSOA SENDO CADASTRADA -->
    <!-- DIV SOBRENOME -->
    <div id="6" class="swiper-slide gradient">
      <div class="container">
        <div class="div6">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1>E o sobrenome?<sup>*</sup></h1>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input type="text" name="sobrenome_menor" id="sobrenome_menor" class="TabOnEnter" tabindex="6" autocomplete="off" placeholder=" " required />
                <input type="button" class="sendBtn5" id="btSend5" name="btSend5" style="display: none;" />
                  <img id="seta5" class="swiper-control next" src="images/ok_neg.svg" style="display: none;">
            </div>
          </div>
        </div>
      </div>
      <div class="progress6">
        <progress id="progressbar6" value="30" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev focus6"></a></li>
          <li><a href="#" class="vs-next swiper-control next"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV SOBRENOME -->
    <!-- DIV ANTES DAS FOTOS -->
    <div id="7" class="swiper-slide gradient">
      <div class="container">
        <div class="div7">
          <div class="row">
            <div class="div7_t col-lg-offset-3 col-lg-5">
              <img src="images/camera.svg" alt="camera">
            </div>
            <div class="div7_box col-lg-offset-3 col-lg-5">
              <h1>Legal! Agora precisamos de duas fotos <span id="txt5"></span> <span class="concat2_texto"></span> feitas hoje.</h1>
                <button class="swiper-control next TabOnEnter botao" tabindex="7">Continuar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="progress7">
        <progress id="progressbar7" value="35" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev focus7"></a></li>
          <li><a href="#" class="vs-next swiper-control next"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV ANTES DAS FOTOS -->
    <!-- DIV PRIMEIRA FOTO -->
    <div id="8" class="swiper-slide gradient2">
      <div class="container">
        <div class="div8">
          <div class="row">
            <div class="div8_box col-lg-offset-3 col-lg-5">
              <div class="wrapper">
                <div class="file-upload TabOnEnter" tabindex="8">
                  <input type="file" id="foto" name="foto" />
                    <img src="images/upload.svg" alt="">
                </div>
              </div>
              <h4>clique para upload<sup>*</sup></h4>
            </div>
            <div class=" div8_t col-lg-offset-3 col-lg-5">
              <h1>A primeira foto sorrindo!</h1>
                <ol>
                  <li>Enquadre dos ombros para cima;</li>
                  <li>Deixe o rosto <span id="txt8"></span> <b>bem reto</b>;</li>
                  <li>Peça para <span id="txt9"></span> olhar para a câmera <b>SORRINDO!</b></li>
                </ol>
              <p>DICA: Use a luz de uma janela à sua frente para um melhor resultado.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="progress8">
        <progress id="progressbar8" value="40" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev"></a></li>
          <li><a href="#" class="vs-next swiper-control next"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV PRIMEIRA FOTO -->
    <!-- DIV SEGUNDA FOTO -->
    <div id="9" class="swiper-slide gradient3">
      <div class="container">
        <div class="div9">
          <div class="row">
            <div class=" div9_box col-lg-offset-3 col-lg-5">
              <div class="wrapper2">
                <div class="file-upload2 TabOnEnter" tabindex="9">
                  <input type="file" id="foto2" name="fotos" />
                  <img src="images/upload.svg" alt="">
                </div>
              </div>
                <h4>clique para upload<sup>*</sup></h4>
            </div>
            <div class=" div9_t col-lg-offset-3 col-lg-5">
              <h1>Agora sem sorrir.</h1>
                <ol>
                  <li>Enquadre dos ombros para cima;</li>
                  <li>Gire levemente o rosto <span id="txt11"></span> para <b>DIREITA</b>;</li>
                  <li>Peça para <span id="txt10"></span> olhar para a câmera <b>SEM SORRIR!</b></li>
                </ol>
              <p>DICA: Use a mesma luz da foto anterior.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="progress9">
        <progress id="progressbar9" value="45" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev"></a></li>
          <li><a href="#" class="vs-next swiper-control next focus8"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV SEGUNDA FOTO -->
    <!-- DIV DATA DE NASCIMENTO -->
    <div id="10" class="swiper-slide gradient">
      <div class="container">
        <div class="div10">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1>Qual a data de nascimento <span id="txt6"></span>?<sup>*</sup></h1>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input type="date" name="data_menor" id="data_menor" class="TabOnEnter" tabindex="10" autocomplete="off" placeholder="dd/mm/aaaa" required  />
              <input type="button" class="sendBtn6" id="btSend6" name="btSend6" style="display: none;" />
                <img id="seta6" class="swiper-control next" src="images/ok_neg.svg" style="display: none;">
            </div>
          </div>
        </div>
      </div>
      <div class="progress10">
        <progress id="progressbar10" value="50" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev"></a></li>
          <li><a href="#" class="vs-next swiper-control next focus9"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV DATA DE NASCIMENTO -->
    <!-- DIV CELULAR PARA CONTATO -->
    <div id="11" class="swiper-slide gradient">
      <div class="container">
        <div class="div11">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1>Qual o celular para contato?<sup>*</sup></h1>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input name="celular_responsavel" id="celular_responsavel" data-mask="(00) 00000-0000" class="TabOnEnter" tabindex="11" type="tel" autocomplete="off" placeholder="(61) 9xxxx-xxxx" required />
              <input type="button" class="sendBtn10" id="btSend10" name="btSend10" style="display: none;" />
              <img id="seta10" class="swiper-control next" src="images/ok_neg.svg" style="display: none;">
            </div>
          </div>
        </div>
      </div>
      <div class="progress11">
        <progress id="progressbar11" value="55" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev focus10"></a></li>
          <li><a href="#" class="vs-next swiper-control next focus11"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV CELULAR PARA CONTATO -->
    <!-- DIV EMAIL -->
    <div id="12" class="swiper-slide gradient">
      <div class="container">
        <div class="div12">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1>E o email?<sup>*</sup></h1>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input name="email_responsavel" id="email_responsavel" class="TabOnEnter" tabindex="12" type="email" autocomplete="off" placeholder=" " required />
                <input type="button" class="sendBtn11" id="btSend11" name="btSend11" style="display: none;" />
                  <img id="seta11" class="swiper-control next" src="images/ok_neg.svg" style="display: none;">
            </div>
          </div>
        </div>
      </div>
      <div class="progress12">
        <progress id="progressbar12" value="60" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev focus12"></a></li>
          <li><a href="#" class="vs-next swiper-control next"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV EMAIL -->
    <!-- DIV COR DA PELE -->
    <div id="13" class="swiper-slide gradient">
      <div class="container">
        <div class="div13">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1>Qual é a cor da pele <span id="txt3"></span>?<sup>*</sup></h1>
            </div>
            <div class="div13_box col-lg-offset-3 col-lg-5">
              <select id="raca" name="raca" class="TabOnEnter" tabindex="13">
                <option disabled value="1">Selecione...</option>
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
      <div class="progress13">
        <progress id="progressbar13" value="65" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev focus13"></a></li>
          <li><a href="#" class="vs-next swiper-control next"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV COR DA PELE -->
    <!-- DIV BAIRRO -->
    <div id="14" class="swiper-slide gradient">
      <div class="container">
        <div class="div14">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1 id="proxima2">Em qual bairro <span id="txt4"></span> mora?<sup>*</sup></h1>
            </div>
            <div class="div14_box col-lg-offset-3 col-lg-5">
              <select name="bairro" id="bairro2" class="TabOnEnter" tabindex="14">
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
        </div>
      </div>
      <div class="progress14">
        <progress id="progressbar14" value="70" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev"></a></li>
          <li><a href="#" class="vs-next swiper-control next"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM DIV BAIRRO -->
    <!-- DIV PLANOS -->
    <div id="15" class="swiper-slide gradient">        
      <div class="container">     
        <div class="div15">
          <div class="row">
            <div class="div15_t col-lg-offset-3 col-lg-5">
              <h1 class="pergunta TabOnEnter" tabindex="15">Escolha uma modalidade para o cadastro <span id="txt12"></span> <span class="concat2_texto"></span>:<sup>*</sup></h1>
            </div>
          </div>
          <div class="row col-xs-12">
            <!-- DIV PLANOS MOBILE -->
            <div class="versao_m">
              <!-- INÍCIO MODAL GRATUITO -->
              <div class="div_m2" data-toggle="modal" data-target="#myModal1_m2">
                  <h3>Gratuito</h3>
                  <p>fotos simples em estúdio apenas para site</p>
                  <div id="mais2"></div>
              </div>
              <div class="modal modal1_m2" id="myModal1_m2" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-content conteudo_modal_m2_2">
                  <h3>Gratuito</h3>
                  <p>fotos simples em estúdio apenas para site</p>
                  <ol>
                    <li>Recebe 20% do cachê líquido no 1º trabalho, 60% nos demais</li>
                    <li>Deve ser agenciado apenas pela Magneto Elenco</li>
                    <li>Contrato de 1 ano</li>
                  </ol>
                  <h2>CADASTRO SEM DESEMBOLSO</h2>
                  <button type="button" class="botao_escolha_m2_2" data-toggle="modal" data-target="#termo_gratuito_mobile">ESCOLHER</button>
                  <div id="menos2_2" data-dismiss="modal"></div>
                </div>
              </div>
                <div class="modal modal_termo_gratuito_mobile" id="termo_gratuito_mobile" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-content conteudo_termo_gratuito_mobile">
                    <h3>Termos e Condições</h3>
                    <div class="termo_um_gratuito_desktop">
                      <ol>
                        <li>Você, <span class="concat3_texto"></span>, está contratando a Magneto Elenco para divulgar a imagem <span id="txt36"></span> <span class="concat2_texto"></span> e intermediar a contratação <span id="txt37"></span> junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e promoção de eventos;</li>
                        <li>Para isso nos autoriza a utilizar a imagem <span id="txt38"></span> em nossos canais de comunicação;</li>
                        <li>Nós não garantimos conseguir trabalhos para <span id="txt39"></span>, assim como vocês não têm obrigação de aceitar os trabalhos oferecidos;</li>
                        <li>Porém, uma vez que aceitem participar de um trabalho, vocês deverão realizá-lo ou poderão ter que pagar uma multa;</li>
                      </ol>
                    </div>
                    <div class="termo_dois_gratuito_desktop">
                      <ol start="5">
                        <li>Você optou pelo Cadastro Gratuito e por isso a remuneração <span id="txt40"></span> <span class="concat2_texto"></span> será de apenas 20% do cachê líquido no primeiro trabalho e de 60% do cachê líquido nos demais trabalhos (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li>
                        <li>Você não precisa desembolsar nada para cadastrar <span id="txt57"></span> <span class="concat2_texto"></span>;</li>
                        <li><span id="txt41"></span> <span class="concat2_texto"></span> não poderá estar inscrit<span id="txt42"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li>
                        <li>Este contrato valerá por 12 meses;</li>
                      </ol>
                    </div>
                    <p class="acordo_termo_gratuito_mobile">Você concorda com os termos do agenciamento?</p>
                      <input name="modalidade_menor" type="radio" id="gratuito_m" class="sim_acordo_termo_gratuito_mobile" />
                        <label for="gratuito_m" class="radio_sim_acordo_termo_gratuito_mobile">
                          <span>CONCORDO</span>
                        </label> 
                    <div id="menos2_2m" data-dismiss="modal"></div>
                  </div>
                </div>
                <!-- FIM GRATUITO MODAL MOBILE -->
                <!-- MODAL PREMIUM MOBILE -->
                <div class="div_m" data-toggle="modal" data-target="#myModal1_m">
                  <h3>Premium</h3>
                  <p>fotos simples em estúdio apenas para site</p>
                  <div id="mais"></div>
                </div>
                <div class="modal modal1_m modal2_m" id="myModal1_m" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-content conteudo_modal_m">
                    <h3>Premium</h3>
                    <p>fotos simples em estúdio apenas para site</p>
                    <ol>
                      <li>Recebe 80% do cachê líquido em todos os trabalhos</li>
                      <li>Pode se cadastrar em outra(s) agência(s)</li>
                      <li>Aviso de cachê liberado</li>
                      <li>Contrato de 2 anos</li>
                    </ol>
                    <ul class="text-left list-unstyled">
                      <li>10x</li>
                      <li>R$</li>
                    </ul>
                    <h2 class="text-center">29<span>,90</span></h2>
                    <button type="button" class="botao_escolha_m" data-toggle="modal" data-target="#termo_premium_mobile">ESCOLHER</button>
                    <div id="menos" data-dismiss="modal"></div>
                  </div>
                </div>
                <div class="modal modal2_m" id="termo_premium_mobile" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-content conteudo_termo_premium_mobile">
                    <h3>Termos e Condições</h3>
                    <div class="termo_um_premium_desktop">
                      <ol>
                        <li>Você, <span class="concat3_texto"></span>, está contratando a Magneto Elenco para divulgar a imagem <span id="txt43"></span> <span class="concat2_texto"></span> e intermediar a contratação <span id="txt44"></span> junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e/ou promoção de eventos;</li>
                        <li>Para isso nos autoriza a utilizar a imagem <span id="txt45"></span> em nossos canais de comunicação;</li>
                        <li>Nós não garantimos conseguir trabalhos para <span id="txt46"></span>, assim como vocês não têm obrigação de aceitar os trabalhos oferecidos;</li>
                        <li>Porém, uma vez que aceitem participar de um trabalho, vocês deverão realizá-lo ou poderão ter que pagar uma multa;</li>
                      </ol>
                    </div>
                    <div class="termo_dois_premium_desktop">
                      <ol start="5">
                        <li>Você optou pelo Cadastro Premium e por isso a remuneração <span id="txt47"></span> <span class="concat2_texto"></span> sempre será de 80% do cachê líquido (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li>
                        <li>Para efetivar o cadastro <span id="txt58"></span> <span class="concat2_texto"></span> você deverá pagar R$ 299,00 em até 10x sem juros;</li>
                        <li><span id="txt48"></span> <span class="concat2_texto"></span> poderá estar inscrit<span id="txt49"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li>
                        <li>Este contrato valerá por 24 meses a partir da data do pagamento;</li>
                      </ol>
                    </div>
                    <p class="acordo_termo_premium_mobile">Você concorda com os termos do agenciamento?</p>
                    <input name="modalidade_menor" type="radio" id="premium_m" class="sim_acordo_termo_premium_mobile" />
                      <label for="premium_m" class="radio_sim_acordo_termo_premium_mobile">
                        <span>CONCORDO</span>
                      </label> 
                    <div id="menos1_1m" data-dismiss="modal"></div>
                  </div>
                </div>
                <!-- FIM MODAL PREMIUM MOBILE -->
                <!-- DIV PROFISSIONAL MODAL MOBILE -->
                <div class="div_m3" data-toggle="modal" data-target="#myModal3_m1">
                  <h3>Profissional</h3>
                  <p>ensaio fotográfico completo para site + entrega em DVD</p>
                  <div id="mais3"></div>
                </div>
                <div class="modal modal3_m1" id="myModal3_m1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-content conteudo_modal_m3_m1">
                    <h3>Profissional</h3>
                    <p>ensaio fotográfico completo para site + entrega em DVD</p>
                    <ol>
                      <li>Recebe 90% do cachê líquido em todos os trabalhos</li>
                      <li>Pode se cadastrar em outra(s) agência(s)</li>
                      <li>Aviso de cachê liberado</li>
                      <li>Ensaio com 30 fotos tratadas</li>
                      <li>Contrato de 3 anos</li>
                    </ol>
                    <ul class="text-left list-unstyled">
                      <li>10x</li>
                      <li>R$</li>
                    </ul>
                    <h2 class="text-center">99<span>,90</span></h2>
                    <button type="button" class="botao_escolha_m3_m1" data-toggle="modal" data-target="#termo_profissional_mobile">ESCOLHER</button>
                    <div id="menos3_m1" data-dismiss="modal"></div>
                  </div>
                </div>
                <div class="modal modal_termo_profissional_mobile" id="termo_profissional_mobile" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-content conteudo_termo_profissional_mobile">
                    <h3>Termos e Condições</h3>
                    <div class="termo_um_profissional_desktop">
                      <ol>
                        <li>Você, <span class="concat3_texto"></span>, está contratando a Magneto Elenco para divulgar a imagem <span id="txt50"></span> <span class="concat2_texto"></span> e intermediar a contratação <span id="txt51"></span> junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e/ou promoção de eventos;</li>
                        <li>Para isso nos autoriza a utilizar a imagem <span id="txt52"></span> em nossos canais de comunicação;</li>
                        <li>Nós não garantimos conseguir trabalhos para <span id="txt53"></span>, assim como vocês não têm obrigação de aceitar os trabalhos oferecidos;</li>
                        <li>Porém, uma vez que aceitem participar de um trabalho, vocês deverão realizá-lo ou poderão ter que pagar uma multa;</li>
                      </ol>
                    </div>
                    <div class="termo_dois_profissional_desktop">
                      <ol start="5">
                        <li>Você optou pelo Cadastro Profissional e por isso a remuneração <span id="txt54"></span> <span class="concat2_texto"></span> sempre será de 90% do cachê líquido (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li>
                        <li>Para efetivar o cadastro você deverá pagar R$ 999,00 em até 10x sem juros;</li>
                        <li><span id="txt55"></span> <span class="concat2_texto"></span> poderá estar inscrit<span id="txt56"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li>
                        <li>Um Ensaio Fotográfico Completo com <span id="txt59"></span> <span class="concat2_texto"></span> será realizado e entregue a você em DVD com mínimo de 30 fotos tratadas em até 30 dias;</li>
                        <li>Este contrato valerá por 36 meses a partir da data do pagamento;</li>
                      </ol>
                    </div>
                    <p class="acordo_termo_profissional_mobile">Você concorda com os termos do agenciamento?</p>
                    <input name="modalidade_menor" type="radio" id="profissional_m" class="sim_acordo_termo_profissional_mobile" />
                      <label for="profissional_m" class="radio_sim_acordo_termo_profissional_mobile">
                        <span>CONCORDO</span>
                      </label> 
                    <div id="menos3_3m" data-dismiss="modal"></div>
                  </div>
                </div>
                <!-- FIM DIV PROFISSIONAL MOBILE -->
            <!-- FIM DIV PLANOS MOBILE -->
            </div>
            <!-- DIV PLANOS DESKTOP -->
            <div class="versao_d">
              <!-- DIV PLANO GRATUITO DESTOP -->
              <div class="div15_box2">
                <div class="thumbnail">
                  <div class="caption">
                    <h3>Gratuito</h3>
                    <p>fotos simples em estúdio apenas para site</p>
                    <ol>
                    <li>Recebe 20% do cachê líquido no 1º trabalho, 60% nos demais</li>
                    <li>Deve ser agenciado apenas pela Magneto Elenco</li>
                    <li>Contrato de 1 ano</li>
                    </ol>
                    <h2>CADASTRO SEM DESEMBOLSO</h2>
                    <button type="button" class="botao_modal2" data-toggle="modal" data-target="#myModal2">ESCOLHER</button>
                  </div>
                </div>
              </div>
              <div class="modal hidden-xs modal2" id="myModal2" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-content conteudo_modal2">
                  <div class="modal_esquerda2">
                    <h3>Gratuito</h3>
                    <p>fotos simples em estúdio apenas para site</p>
                    <ol>
                      <li>Recebe 20% do cachê líquido no 1º trabalho, 60% nos demais</li>
                      <li>Deve ser agenciado apenas pela Magneto Elenco</li>
                      <li>Contrato de 1 ano</li>
                    </ol>
                    <h4>CADASTRO SEM</h4>
                    <h2>DESEMBOLSO</h2>
                  </div>
                  <div class="modal_direita">
                    <h3>Termos e Condições</h3>
                    <div class="termo_um2">
                      <ol>
                        <li>Você, <span class="concat3_texto"></span>, está contratando a Magneto Elenco para divulgar a imagem <span id="txt22"></span> <span class="concat2_texto"></span> e intermediar a contratação <span id="txt23"></span> junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e promoção de eventos;</li><BR />
                        <li>Para isso nos autoriza a utilizar a imagem <span id="txt24"></span> em nossos canais de comunicação;</li><BR />
                        <li>Nós não garantimos conseguir trabalhos para <span id="txt25"></span>, assim como vocês não têm obrigação de aceitar os trabalhos oferecidos;</li><BR />
                        <li>Porém, uma vez que aceitem participar de um trabalho, vocês deverão realizá-lo ou poderão ter que pagar uma multa;</li>
                      </ol>
                    </div>
                    <div class="termo_dois2">
                      <ol start="5">
                        <li>Você optou pelo Cadastro Gratuito e por isso a remuneração <span id="txt26"></span> <span class="concat2_texto"></span> será de apenas 20% do cachê líquido no primeiro trabalho e de 60% do cachê líquido nos demais trabalhos (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li><BR />
                        <li>Você não precisa desembolsar nada para cadastrar <span id="txt21"></span> <span class="concat2_texto"></span>;</li><BR />
                        <li><span id="txt27"></span> <span class="concat2_texto"></span> não poderá estar inscrit<span id="txt28"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li><BR />
                        <li>Nosso contrato valerá por 12 meses;</li>
                      </ol>
                      <p class="descricao_contrato2">Você concorda com os termos do agenciamento?</p>
                      <div class="button2" id="gratuito_menor">
                        <input type="radio" name="modalidade_menor" value="Gratuito" id="gratuito" class="sim_acordo2" />
                          <label for="gratuito">CONCORDO</label>
                      </div>
                      <div id="menos2_d" data-dismiss="modal"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- FIM DIV PLANO GRATUITO DESTOP -->
              <!-- DIV PLANO PREMIUM DESTOP -->
              <div class="div15_box">
                <div class="thumbnail">
                  <div class="caption">
                    <h3>Premium</h3>
                    <p>fotos simples em estúdio apenas para site</p>
                    <ol>
                      <li>Recebe 80% do cachê líquido em todos os trabalhos</li>
                      <li>Pode se cadastrar em outra(s) agência(s)</li>
                      <li>Aviso de cachê liberado</li>
                      <li>Contrato de 2 anos</li>
                    </ol>
                    <ul class="text-left list-unstyled">
                      <li>10x</li>
                      <li>R$</li>
                    </ul>
                    <h2 class="text-center">29<span>,90</span></h2>
                    <button type="button" class="botao_modal" data-toggle="modal" data-target="#myModal">ESCOLHER</button>
                  </div>
                </div>
              </div>
              <div class="modal hidden-xs modal2" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-content conteudo_modal">
                  <div class="modal_esquerda">
                    <h3>Premium</h3>
                    <p>fotos simples em estúdio apenas para site</p>
                    <ol>
                      <li>Recebe 80% do cachê líquido em todos os trabalhos</li>
                      <li>Pode se cadastrar em outra(s) agência(s)</li>
                      <li>Aviso de cachê liberado</li>
                      <li>Contrato de 2 anos</li>
                    </ol>

                    <ul class="text-left list-unstyled">
                      <li>10x</li>
                      <li>R$</li>
                    </ul>
                    <h2 class="text-center">29<span>,90</span></h2>
                  </div>
                  <div class="modal_direita">
                    <h3>Termos e Condições</h3>
                    <div class="termo_um">
                      <ol>
                        <li>Você, <span class="concat3_texto"></span>, está contratando a Magneto Elenco para divulgar a imagem <span id="txt13"></span> <span class="concat2_texto"></span> e intermediar a contratação <span id="txt14"></span> junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e/ou promoção de eventos;</li><BR />
                        <li>Para isso nos autoriza a utilizar a imagem <span id="txt15"></span> em nossos canais de comunicação;</li><BR />
                        <li>Nós não garantimos conseguir trabalhos para <span id="txt16"></span>, assim como vocês não têm obrigação de aceitar os trabalhos oferecidos;</li><BR />
                        <li>Porém, uma vez que aceitem participar de um trabalho, vocês deverão realizá-lo ou poderão ter que pagar uma multa;</li>
                      </ol>
                    </div>
                    <div class="termo_dois">
                      <ol start="5">
                        <li>Você optou pelo Cadastro Premium e por isso a remuneração <span id="txt17"></span> <span class="concat2_texto"></span> sempre será de 80% do cachê líquido (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li><BR />
                        <li>Para efetivar o cadastro você deverá pagar R$ 299,00 em até 10x sem juros;</li><BR />
                        <li><span id="txt18"></span> <span class="concat2_texto"></span> poderá estar inscrit<span id="txt19"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li><BR />
                        <li>Este contrato valerá por 24 meses a partir da data do pagamento;</li>
                      </ol>
                      <p class="descricao_contrato">Você concorda com os termos do agenciamento?</p>
                      <div class="button"  id="premium_menor">
                        <input type="radio" name="modalidade_menor" value="Premium" id="premium" class="sim_acordo" />
                          <label for="premium">CONCORDO</label>
                      </div>
                      <div id="menos_d" data-dismiss="modal"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- FIM DIV PLANO PREMIUM DESTOP -->
              <!-- DIV PLANO PROFISSIONAL DESTOP -->
              <div class="div15_box3">
                <div class="thumbnail">
                  <div class="caption">
                    <h3>Profissional</h3>
                    <p>ensaio fotográfico completo para site + entrega em DVD</p>
                    <ol>
                      <li>Recebe 90% do cachê líquido em todos os trabalhos</li>
                      <li>Pode se cadastrar em outra(s) agência(s)</li>
                      <li>Aviso de cachê liberado</li>
                      <li>Ensaio com 30 fotos tratadas</li>
                      <li>Contrato de 3 anos</li>
                    </ol>
                    <ul class="text-left list-unstyled">
                      <li>10x</li>
                      <li>R$</li>
                    </ul>
                    <h2 class="text-center">99<span>,90</span></h2>
                    <button type="button" class="botao_modal3" data-toggle="modal" data-target="#myModal3">ESCOLHER</button>
                  </div>
                </div>
              </div>
              <div class="modal modal2 hidden-xs" id="myModal3" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-content conteudo_modal3">
                  <div class="modal_esquerda3">
                    <h3>Profissional</h3>
                    <p>ensaio fotográfico completo para site + entrega em DVD</p>
                    <ol>
                      <li>Recebe 90% do cachê líquido em todos os trabalhos</li>
                      <li>Pode se cadastrar em outra(s) agência(s)</li>
                      <li>Aviso de cachê liberado</li>
                      <li>Ensaio com 30 fotos tratadas</li>
                      <li>Contrato de 3 anos</li>
                    </ol>
                    <ul class="text-left list-unstyled">
                      <li>10x</li>
                      <li>R$</li>
                    </ul>
                    <h2 class="text-center">99<span>,90</span></h2>
                  </div>
                  <div class="modal_direita3">
                    <h3>Termos e Condições</h3>
                    <div class="termo_um3">
                      <ol>
                        <li>Você, <span class="concat3_texto"></span>, está contratando a Magneto Elenco para divulgar a imagem <span id="txt29"></span> <span class="concat2_texto"></span> e intermediar a contratação <span id="txt30"></span> junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e/ou promoção de eventos;</li><BR />
                        <li>Para isso nos autoriza a utilizar a imagem <span id="txt31"></span> em nossos canais de comunicação;</li><BR />
                        <li>Nós não garantimos conseguir trabalhos para <span id="txt32"></span>, assim como vocês não têm obrigação de aceitar os trabalhos oferecidos;</li><BR />
                        <li>Porém, uma vez que aceitem participar de um trabalho, vocês deverão realizá-lo ou poderão ter que pagar uma multa;</li>
                      </ol>
                    </div>
                    <div class="termo_dois3">
                      <ol start="5">
                        <li>Você optou pelo Cadastro Profissional e por isso a remuneração <span id="txt33"></span> <span class="concat2_texto"></span> sempre será de 90% do cachê líquido (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li><BR />
                        <li>Para efetivar o cadastro você deverá pagar R$ 999,00 em até 10x sem juros;</li><BR />
                        <li><span id="txt34"></span> <span class="concat2_texto"></span> poderá estar inscrit<span id="txt35"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li><BR />
                        <li>Um Ensaio Fotográfico Completo com <span id="txt20"></span> <span class="concat2_texto"></span> será realizado e entregue a você em DVD com mínimo de 30 fotos tratadas em até 30 dias;</li><BR />
                        <li>Este contrato valerá por 36 meses a partir da data do pagamento;</li>
                      </ol>
                      <p class="descricao_contrato3">Você concorda com os termos do agenciamento?</p>
                      <div class="button3"  id="profissional_menor">
                        <input type="radio" name="modalidade_menor" value="Profissional" id="profissional" class="sim_acordo3" />
                          <label for="profissional">CONCORDO</label>
                      </div>
                      <div id="menos3_d" data-dismiss="modal"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- FIM DIV PLANO PROFISSIONAL DESTOP -->
              </div>
            </div>
            <!-- FIM DIV PLANOS DESKTOP -->
          </div>
          <div class="progress15">
                <progress id="progressbar15" value="75" max="80"></progress>
              </div>
              <nav>
                <ul class="vs-vertical-nav none">
                  <li><a href="#" class="vs-prev swiper-control prev"></a></li>
                  <li><a href="#" class="vs-next swiper-control next focus14"></a></li>
                </ul>
              </nav> 
        </div>
      </div>
    <!-- FIM DIV PLANOS -->
    <!-- DIV REDES SOCIAIS -->
    <div id="16" class="swiper-slide gradient">
      <div class="container">
        <div class="div16">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1 class="ultimo_p">Que tal deixar o perfil <span id="txt7"></span> <span class="concat2_texto"></span> mais completo?</h1>
            </div>
            <div class="input_ig col-lg-offset-3 col-lg-5">
              <img src="images/ig.svg" alt="instagram">
                <input name="ig_menor" id="ig_responsavel" type="text" class="TabOnEnter ig"autocomplete="off" placeholder="www.instagram.com/usuario" tabindex="16"/>
            </div>
            <div class="input_fb col-lg-offset-3 col-lg-5">
              <img src="images/face.svg" alt="facebook">
                <input name="face_menor" id="face_responsavel" type="text" class="TabOnEnter face" autocomplete="off" placeholder="www.facebook.com/usuario" />
            </div>
            <div class="input_tt col-lg-offset-3 col-lg-5">
              <img src="images/tt.svg" alt="twitter">
                <input name="tt_menor" id="tt_responsavel" type="text" class="TabOnEnter tt" autocomplete="off" placeholder="www.twitter.com/usuario" />
            </div>
          </div>
          <button class="botao" id="cadastra" name="submit" type="submit">Enviar Cadastro</button>
          <p id="erro" style="display: none;">Por favor verifique se preencheu todos os campos obrigatórios marcados com <sup>*</sup></p>
        </div>
      </div>
      <div class="progress16">
        <progress id="progressbar16" value="80" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav2 none">
          <li><a href="#" class="vs-prev2 swiper-control prev"></a></li>
        </ul>
      </nav>
    </div>
</div>
</div>
    <!-- FIM DIV REDES SOCIAIS -->
</form>
<div id="form_maior"></div>
<form name="form" action="adiciona-usuario.php" id="form" method="post" enctype="multipart/form-data">
  <!-- Swiper Container -->
<div class="swiper-container maior">
  <!-- Swiper Wrapper -->
    <div class="swiper-wrapper">

    <!-- DIV NOME DA PESSOA SENDO CADASTRADA -->
    <div id="17" class="swiper-slide gradient">
      <div class="container">
        <div class="div17">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1>Qual o seu primeiro nome?<sup>*</sup></h1>
            </div>
            <div class="input_box col-lg-offset-3 col-lg-5">
              <input name="nome_maior" id="nome_maior" type="text" class="TabOnEnter" tabindex="17" autocomplete="off" placeholder=" " required="required" />
                <input type="button" class="sendBtn" id="btSend17" name="btSend17" style="display: none;" />
                  <img id="seta17" onclick="gravar()" class="swiper-control next2" src="images/ok_neg.svg" style="display: none;">
            </div>
          </div>
        </div>
      </div>
      <div class="progress17">
        <progress id="progressbar17" value="5" max="80"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#div0" class="vs-prev swiper-control prev2"></a></li>
          <li><a href="#" class="vs-next swiper-control next2 focus15"></a></li>
        </ul>
      </nav>
    </div>
<!-- FIM DIV NOME DA PESSOA SENDO CADASTRADA -->
<!-- FIM DIV SOBRENOME DA PESSOA SENDO CADASTRADA -->
<div id="18" class="swiper-slide gradient">
       <div class="container">
        <div class="div18">
         <div class="row">
          <div class="pergunta col-lg-offset-3 col-lg-5">
           <h1>E o sobrenome?<sup>*</sup></h1>
          </div>
          <div class="input_box col-lg-offset-3 col-lg-5">
           <input name="sobrenome_maior" id="sobrenome_maior" type="text" class="TabOnEnter" tabindex="18" autocomplete="off"  required="required" />
           <input type="button" class="sendBtn" id="btSend18" name="btSend18" style="display: none;">
           <img id="seta18" class="swiper-control next2" src="images/ok_neg.svg" style="display: none;">
          </div>
         </div>
        </div>
       </div>
<div class="progress18">
  <progress id="progressbar18" value="10" max="75"></progress>
</div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2 focus16"></a></li>
      <li><a href="#" class="vs-next swiper-control next2"></a></li>
    </ul>
  </nav>
</div>
  <!-- FIM DIV SOBRENOME DA PESSOA SENDO CADASTRADA -->
  <!-- INÍCIO DIV SEXO DA PESSOA SENDO CADASTRADA -->
<div id="19" class="swiper-slide gradient">
  <div class="container">
    <div class="div3">
      <div class="row">
        <div class="pergunta col-lg-offset-3 col-lg-5">
          <h1 class="TabOnEnter" tabindex="19" id="titulo-sexo-maior">Qual o seu sexo?<sup>*</sup></h1>
        </div>
        <div class="input_box col-lg-offset-3 col-lg-5">
          <input name="sexo_maior" value="masculino" type="radio" id="sexo_maior_m" class="radio" onchange="exibeMsg(this.value);"  />
            <label id="input3" for="sexo_maior_m" class="radio-label2">
              <span>Masculino</span>
            </label>
        </div>
        <div class="div3_box col-lg-offset-3 col-lg-5">
          <input name="sexo_maior" type="radio" value="feminino" id="sexo_maior_f"  class="radio" onchange="exibeMsg(this.value);" onclick="getFocus()" />
            <label for="sexo_maior_f" class="radio-label">
              <span>Feminino</span>
            </label>
        </div>
      </div>
    </div>
  </div>
<div class="progress19">
  <progress id="progressbar19" value="15" max="75"></progress>
</div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2 focus17"></a></li>
      <li><a href="#" class="vs-next swiper-control next2"></a></li>
    </ul>
  </nav>
</div>
  <!-- FIM DIV SEXO DA PESSOA SENDO CADASTRADA -->
<!-- DIV ANTES DAS FOTOS -->
 <div id="20" class="swiper-slide gradient">
  <nav>
  <div class="container">
    <div class="div7">
      <div class="row">
        <div class="div7_t col-lg-offset-3 col-lg-5">
          <img src="images/camera.svg" alt="camera"  id="camera_maior">
        </div>
        <div class="div7_box col-lg-offset-3 col-lg-5">
          <h1>Legal! Agora precisamos de duas fotos suas feitas hoje.</h1>
          <button class="swiper-control next2 TabOnEnter botao" tabindex="20">Continuar</button>
<!--            <img src="images/ok_neg.svg"> -->
        </div>
      </div>
    </div>
  </div>
  <div class="progress20">
    <progress id="progressbar20" value="20" max="75"></progress>
  </div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2"></a></li>
      <li><a href="#" class="vs-next swiper-control next2"></a></li>
    </ul>
  </nav>
</div>
<!-- FIM DIV ANTES DAS FOTOS -->
<!-- DIV PRIMEIRA FOTO -->
<div id="21" class="swiper-slide gradient2">
  <div class="container">
    <div class="div8">
      <div class="row">
        <div class="div8_box col-lg-offset-3 col-lg-5">
          <div class="wrapper">
            <div class="file-upload TabOnEnter">
              <input type="file" id="foto_maior1" name="foto_maior1" tabindex="21" />
              <img src="images/upload.svg" alt="">
            </div>
          </div>
          <h4>clique para upload<sup>*</sup></h4>
        </div>
        <div class="div8_t col-lg-offset-3 col-lg-5">
          <h1>A primeira foto sorrindo!</h1>
          <ol>
            <li>Enquadre dos ombros para cima;</li>
            <li>Deixe seu rosto <b>bem reto</b> para a câmera;</li>
            <li>Olhe para a câmera <b>SORRINDO!</b></li>
          </ol>
          <p>DICA: Use a luz de uma janela à sua frente para um melhor resultado.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="progress21">
    <progress id="progressbar21" value="25" max="75"></progress>
  </div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2"></a></li>
      <li><a href="#" class="vs-next swiper-control next2"></a></li>
    </ul>
  </nav>
</div>
<!-- FIM DIV PRIMEIRA FOTO -->
<!-- DIV SEGUNDA FOTO -->
<div id="22" class="swiper-slide gradient3">
  <div class="container">
    <div class="div9">
      <div class="row">
        <div class="div9_box col-lg-offset-3 col-lg-5">
          <div class="wrapper2">
            <div class="file-upload2 TabOnEnter">
              <input type="file" id="foto_maior2" name="foto_maior2" tabindex="22"  />
              <img src="images/upload.svg" alt="">
            </div>
          </div>
          <h4>clique para upload<sup>*</sup></h4>
        </div>
        <div class="div9_t col-lg-offset-3 col-lg-5">
          <h1>Agora sem sorrir.</h1>
          <ol>
            <li>Enquadre dos ombros para cima;</li>
            <li>Gire levemente seu rosto para <b>DIREITA</b>;</li>
            <li>Olhe para a câmera <b>SEM SORRIR!</b></li>
          </ol>
          <p>DICA: Use a mesma luz da foto anterior.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="progress22">
    <progress id="progressbar22" value="30" max="75"></progress>
  </div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2"></a></li>
      <li><a href="#" class="vs-next swiper-control next2 focus18"></a></li>
    </ul>
  </nav>
</div>
<!-- FIM DIV SEGUNDA FOTO -->
<!-- DIV DATA DE NASCIMENTO -->
<div id="23" class="swiper-slide gradient">
  <div class="container">
    <div class="div10">
      <div class="row">
        <div class="pergunta col-lg-offset-3 col-lg-5">
          <h1>Qual sua data de nascimento?<sup>*</sup></h1>
        </div>
        <div class="input_box col-lg-offset-3 col-lg-5">
          <input type="date" name="data_maior" id="data_maior" class="TabOnEnter" tabindex="23" autocomplete="off" placeholder="dd/mm/aaaa" required  />
          <input type="button" class="sendBtn19" id="btSend19" name="btSend19" style="display: none;">
          <img id="seta19" class="swiper-control next2" src="images/ok_neg.svg" style="display: none;">
        </div>
      </div>
    </div>
  </div>
  <div class="progress23">
    <progress id="progressbar23" value="35" max="75"></progress>
  </div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2"></a></li>
      <li><a href="#" class="vs-next swiper-control next2 focus19"></a></li>
    </ul>
  </nav>
</div>
<!-- FIM DIV DATA DE NASCIMENTO -->
<!-- DIV CELULAR PARA CONTATO -->
<div id="24" class="swiper-slide gradient">
  <div class="container">
    <div class="div11">
      <div class="row">
        <div class="pergunta col-lg-offset-3 col-lg-5">
          <h1>Qual seu celular para contato?<sup>*</sup></h1>
        </div>
        <div class="input_box col-lg-offset-3 col-lg-5">
          <input name="celular_maior" id="celular_maior" data-mask="(00) 00000-0000" class="TabOnEnter" tabindex="24" type="tel" autocomplete="off" placeholder="(61) 9xxxx-xxxx" required />
          <input type="button" class="sendBtn20" id="btSend20" name="btSend20" style="display: none;">
          <img id="seta20" class="swiper-control next2" src="images/ok_neg.svg" style="display: none;">
        </div>
      </div>
    </div>
  </div>
  <div class="progress24">
    <progress id="progressbar24" value="40" max="75"></progress>
  </div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2 focus20"></a></li>
      <li><a href="#" class="vs-next swiper-control next2 focus21"></a></li>
    </ul>
  </nav>
</div>
<!-- FIM DIV CELULAR PARA CONTATO -->
<!-- DIV EMAIL -->
<div id="25" class="swiper-slide gradient">
  <div class="container">
    <div class="div12">
      <div class="row">
        <div class="pergunta col-lg-offset-3 col-lg-5">
          <h1>E seu email?<sup>*</sup></h1>
        </div>
        <div class="input_box col-lg-offset-3 col-lg-5">
          <input name="email_maior" id="email_maior" class="TabOnEnter" tabindex="25" type="email" autocomplete="off" placeholder=" " required />
          <input type="button" class="sendBtn21" id="btSend21" name="btSend21" style="display: none;">
          <img id="seta21" class="swiper-control next2" src="images/ok_neg.svg" style="display: none;">
        </div>
      </div>
    </div>
  </div>
  <div class="progress25">
    <progress id="progressbar25" value="45" max="75"></progress>
  </div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2 focus22"></a></li>
      <li><a href="#" class="vs-next swiper-control next2"></a></li>
    </ul>
  </nav>
</div>
<!-- FIM DIV EMAIL -->
<!-- DIV COR DA PELE -->
<div id="26" class="swiper-slide gradient">
  <div class="container">
    <div class="div13">
      <div class="row">
        <div class="pergunta col-lg-offset-3 col-lg-5">
          <h1>Qual é a cor da pele <span id="txt3"></span>?<sup>*</sup></h1>
        </div>
        <div class="div13_box col-lg-offset-3 col-lg-5">
          <select id="raca_maior" name="raca_maior" class="TabOnEnter">
            <option disabled value="1">Selecione...</option>
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
  <div class="progress26">
    <progress id="progressbar26" value="50" max="75"></progress>
  </div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2 focus23"></a></li>
      <li><a href="#" class="vs-next swiper-control next2"></a></li>
    </ul>
  </nav>
</div>
<!-- FIM DIV COR DA PELE -->
<!-- DIV BAIRRO -->
<div id="27" class="swiper-slide gradient">
  <div class="container">
    <div class="div14">
      <div class="row">
        <div class="pergunta col-lg-offset-3 col-lg-5">
          <h1 id="proxima2">Em qual bairro <span id="txt4"></span> mora?<sup>*</sup></h1>
        </div>
        <div class="div14_box col-lg-offset-3 col-lg-5">
          <select name="bairro_maior" id="bairro_maior" class="TabOnEnter">
            <option disabled value="1">Selecione...</option>
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
  <div class="progress27">
    <progress id="progressbar27" value="55" max="75"></progress>
  </div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2"></a></li>
      <li><a href="#" class="vs-next swiper-control next2 focus24"></a></li>
    </ul>
  </nav>
</div>
<!-- FIM DIV BAIRRO -->
<!-- DIV CPF -->
<div id="28" class="swiper-slide gradient">
  <div class="container">
    <div class="div2">
      <div class="row">
        <div class="pergunta col-lg-offset-3 col-lg-5">
          <h1>Qual o seu cpf?<sup>*</sup></h1>
        </div>
        <div class="input_box col-lg-offset-3 col-lg-5">
          <input type="text" name="cpf_maior" id="cpf_maior" data-mask="000.000.000-00" min="11" max= "11" placeholder="000.000.000-00" required />
          <input type="button" class="sendBtn22" id="btSend22" name="btSend22" style="display: none;">
          <img id="seta22" class="swiper-control next2" src="images/ok_neg.svg" style="display: none;">
        </div>
      </div>
    </div>
  </div>
  <div class="progress28">
    <progress id="progressbar28" value="60" max="75"></progress>
  </div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2"></a></li>
      <li><a href="#" class="vs-next swiper-control next2"></a></li>
    </ul>
  </nav>
</div>
<!-- DIV CPF RESPONSÁVEL -->
<!-- DIV DRT -->
<div id="29" class="swiper-slide gradient"> 
  <div class="container">
    <div class="div29" id="drt">
      <div class="row">
        <div class="pergunta col-lg-offset-3 col-lg-5">
          <h1 class="TabOnEnter" tabindex="29">Você é <span id="txt"></span> com registro profissional na DRT?<sup>*</sup></h1>
        </div>
        <div class="input_box col-lg-offset-3 col-lg-5">
          <input name="ator" value="sim" type="radio" id="radio2" class="radio" onchange="exibeMsg3(this.value);"  onclick="setTimeout(simAtor, 3000)">
            <label id="input3" for="radio2" class="radio-label5">
              <span>Sim</span>
            </label>
        </div>
        <div class="input_box col-lg-offset-3 col-lg-5">
          <input name="ator" type="radio" value="nao" id="radio3" class="radio" onchange="exibeMsg3(this.value);"  onclick="naoAtor()">
            <label for="radio3" class="radio-label6">
              <span>Não</span>
            </label>
        </div>
    </div>
    <p class="descricao">Não sabe o que é? Conheça mais <b><a href="http://goo.gl/25Uv6h" target="_blank">clicando aqui.</a></b> </p> 
    <div class="blue box">
      <h1>Ótimo!</h1>
      <p class="p1">Atores, atrizes e modelos profissionais recebem tratamento especial na Magneto Elenco.</p> 
      <p class="p2">Para vocês, oferecemos nosso Cadastro Premium sem custo algum. Aproveite!</p>
    </div>
  </div>
</div>  
<div class="progress29">
  <progress id="progressbar29" value="65" max="75"></progress>
</div>
  <nav>
    <ul class="vs-vertical-nav none">
      <li><a href="#" class="vs-prev swiper-control prev2 focus25"></a></li>
      <li><a href="#" class="vs-next swiper-control next2"></a></li>
    </ul>
  </nav>
</div>
<!-- FIM DIV DRT -->
<!-- DIV PLANOS -->
<div id="30" class="swiper-slide gradient">        
 <div class="container">     
   <div class="div15">
      <div class="row">
              <div class="div15_t col-lg-offset-3 col-lg-5">
                <h1 class="penultimo_p" class="TabOnEnter">Escolha uma modalidade para seu cadastro:<sup>*</sup></h1>
              </div>
      </div>
      <div class="row col-xs-12">
       <div class="div15_box">
<!--DIV PLANO MOBILE -->
<div class="versao_m">
<div class="div_m" data-toggle="modal" data-target="#Modalm-maior-premium">
  <h3>Premium</h3>
  <p>fotos simples em estúdio apenas para site</p>
  <div id="mais"></div>
</div>
<div class="modal modal1_m modal2_m" id="Modalm-maior-premium" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-content conteudo_modal_m">
    <h3>Premium</h3>
    <p>fotos simples em estúdio apenas para site</p>
    <ol>
      <li>Recebe 80% do cachê líquido em todos os trabalhos</li>
      <li>Pode se cadastrar em outra(s) agência(s)</li>
      <li>Aviso de cachê liberado</li>
      <li>Contrato de 2 anos</li>
    </ol>
  <ul class="text-left list-unstyled premium_desktop" id="premium_desktop1_mobile">
    <li>10x</li>
    <li>R$</li>
  </ul>
  <h2 class="text-center premium_desktop"  id="premium_desktop2_mobile">29<span>,90</span></h2>
  <h2 id="premium_desktop3_mobile" >CADASTRO SEM DESEMBOLSO</h2>
    <button type="button" class="botao_escolha_m maior" data-toggle="modal" data-target="#termo_maior_premium_mobile">ESCOLHER</button>
    <div id="menos" data-dismiss="modal"></div>
  </div>
</div>

<div class="modal modal2_m" id="termo_maior_premium_mobile" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-content conteudo_termo_premium_mobile">
    <h3>Termos e Condições</h3>
    <div class="termo_um_premium_desktop">
    <ol>
      <li>Você, <span class="concat_texto"></span>, está contratando a Magneto Elenco para divulgar sua imagem e intermediar sua contratação junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e/ou promoção de eventos;</li><BR />
      <li>Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;</li><BR />
      <li>Nós não garantimos conseguir trabalhos para você, assim como você não tem obrigação de aceitar os trabalhos oferecidos;</li><BR />
      <li>Porém, uma vez que aceite participar de um trabalho, você deverá realizá-lo ou poderá ter que pagar uma multa;</li>
    </ol>
    </div>
    <div class="termo_dois_premium_desktop">
    <ol start="5">
      <li>Você optou pelo Cadastro Premium e por isso sua remuneração será de 80% do cachê líquido (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li>
      <li><span id="txtpremium1_mobile" class="txtpremium1_mobile"></span> <span id="txtpremium2_mobile" class="txtpremium2_mobile"></span></li>
      <li>Você poderá estar inscrit<span id="txt65"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li>
      <li>Este contrato valerá por 24 meses a partir da data do pagamento;</li>
    </ol>
    </div>
    <p class="acordo_termo_premium_mobile">Você concorda com os termos do agenciamento?</p>
    <input name="modalidade_maior" type="radio" id="premium_maior_m" class="sim_acordo_termo_premium_mobile maior" value="Premium" />
    <label for="premium_maior_m" class="radio_sim_acordo_termo_premium_mobile">
    <span>CONCORDO</span>
    </label> 
    <div id="menos1_1m" data-dismiss="modal"></div>
  </div>
</div>
<!-- FIM MODAL PREMIUM-->
<!-- INÍCIO MODAL GRATUITO -->
<div class="div_m2" data-toggle="modal" data-target="#Modalm-maior-gratuito">
  <h3>Gratuito</h3>
  <p>fotos simples em estúdio apenas para site</p>
  <div id="mais2"></div>
</div>

<div class="modal modal1_m2" id="Modalm-maior-gratuito" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-content conteudo_modal_m2_2">
    <h3>Gratuito</h3>
    <p>fotos simples em estúdio apenas para site</p>
    <ol>
      <li>Recebe 20% do cachê líquido no 1º trabalho, 60% nos demais</li>
      <li>Deve ser agenciado apenas pela Magneto Elenco</li>
      <li>Contrato de 1 ano</li>
    </ol>
    <h2>CADASTRO SEM DESEMBOLSO</h2>
    <button type="button" class="botao_escolha_m2_2 maior" data-toggle="modal" data-target="#termo_maior_gratuito_mobile">ESCOLHER</button>
    <div id="menos2_2" data-dismiss="modal"></div>
  </div>
</div>

<div class="modal modal_termo_gratuito_mobile" id="termo_maior_gratuito_mobile" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-content conteudo_termo_gratuito_mobile">
                  <h3>Termos e Condições</h3>
                <div class="termo_um_gratuito_desktop">
                <ol>
                  <li>Você, <span class="concat_texto"></span>, está contratando a Magneto Elenco para divulgar sua imagem e intermediar sua contratação junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e/ou promoção de eventos;</li><BR />
                  <li>Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;</li><BR />
                  <li>Nós não garantimos conseguir trabalhos para você, assim como você não tem obrigação de aceitar os trabalhos oferecidos;</li><BR />
                  <li>Porém, uma vez que aceite participar de um trabalho, você deverá realizá-lo ou poderá ter que pagar uma multa;</li>
                </ol>
                </div>
                <div class="termo_dois_gratuito_desktop">
                <ol start="5">
                  <li>Você optou pelo Cadastro Gratuito e por isso sua remuneração será de apenas 20% do cachê líquido no primeiro trabalho e de 60% do cachê líquido nos demais trabalhos (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li>
                  <li>Você não precisa desembolsar nada para se cadastrar;</li>
                  <li>Você não poderá estar inscrit<span id="txt64"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li>
                  <li>Este contrato valerá por 12 meses;</li>
                </ol>
                </div>
      <p class="acordo_termo_gratuito_mobile">Você concorda com os termos do agenciamento?</p>
    <input name="modalidade_maior" type="radio" id="gratuito_maior_m" class="sim_acordo_termo_gratuito_mobile maior" value="Gratuito" />
    <label for="gratuito_maior_m" class="radio_sim_acordo_termo_gratuito_mobile">
    <span>CONCORDO</span>
    </label> 
    <div id="menos2_2m" data-dismiss="modal"></div>
  </div>
</div>
<!-- FIM GRATUITO MODAL MOBILE -->
<!-- DIV PROFISSIONAL MODAL MOBILE -->
<div class="div_m3" data-toggle="modal" data-target="#Modalm-maior-profissional">
  <h3>Profissional</h3>
  <p>ensaio fotográfico completo para site + entrega em DVD</p>
  <div id="mais3"></div>
</div>

<div class="modal modal3_m1" id="Modalm-maior-profissional" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-content conteudo_modal_m3_m1">
    <h3>Profissional</h3>
    <p>ensaio fotográfico completo para site + entrega em DVD</p>
    <ol>
      <li>Recebe 90% do cachê líquido em todos os trabalhos</li>
      <li>Pode se cadastrar em outra(s) agência(s)</li>
      <li>Aviso de cachê liberado</li>
      <li>Ensaio com 30 fotos tratadas</li>
      <li>Contrato de 3 anos</li>
    </ol>
    <ul class="text-left list-unstyled">
      <li>10x</li>
      <li>R$</li>
    </ul>
    <h2 class="text-center">99<span>,90</span></h2>
    <button type="button" class="botao_escolha_m3_m1 maior" data-toggle="modal" data-target="#termo_maior_profissional_mobile">ESCOLHER</button>
    <div id="menos3_m1" data-dismiss="modal"></div>
  </div>
</div>
<div class="modal modal_termo_profissional_mobile" id="termo_maior_profissional_mobile" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-content conteudo_termo_profissional_mobile">
    <h3>Termos e Condições</h3>
    <div class="termo_um_profissional_desktop">
    <ol>
      <li>Você, <span class="concat_texto"></span>, está contratando a Magneto Elenco para divulgar sua imagem e intermediar sua contratação junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e/ou promoção de eventos;</li><BR />
      <li>Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;</li><BR />
      <li>Nós não garantimos conseguir trabalhos para você, assim como você não tem obrigação de aceitar os trabalhos oferecidos;</li><BR />
      <li>Porém, uma vez que aceite participar de um trabalho, você deverá realizá-lo ou poderá ter que pagar uma multa;</li>
    </ol>
    </div>
    <div class="termo_dois_profissional_desktop">
    <ol start="5">
      <li>Você optou pelo Cadastro Profissional e por isso sua remuneração será de 90% do cachê líquido (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li><BR />
      <li>Para efetivar o cadastro você deverá pagar R$ 999,00 em até 10x sem juros;</li><BR />
      <li>Você poderá estar inscrit<span id="txt63"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li><BR />
      <li>Um Ensaio Fotográfico Completo será realizado e entregue a você em DVD com mínimo de 30 fotos tratadas em até 30 dias;</li><BR />
      <li>Este contrato valerá por 36 meses a partir da data do pagamento;</li>
    </ol>
    </div>
    <p class="acordo_termo_profissional_mobile">Você concorda com os termos do agenciamento?</p>
    <input name="modalidade_maior" type="radio" id="profissional_maior_m" class="sim_acordo_termo_profissional_mobile maior" value="Profissional" />
    <label for="profissional_maior_m" class="radio_sim_acordo_termo_profissional_mobile">
    <span>CONCORDO</span>
    </label> 
    <div id="menos3_3m" data-dismiss="modal"></div>
  </div>
</div>
</div>
<!-- FIM DIV PROFISSIONAL MOBILE -->
<!-- FIM DIV PLANO MOBILE -->
<div class="versao_d">
  <div class="thumbnail">
    <div class="caption">
      <h3>Premium</h3>
      <p>fotos simples em estúdio apenas para site</p>
      <ol>
        <li>Recebe 80% do cachê líquido em todos os trabalhos</li>
        <li>Pode se cadastrar em outra(s) agência(s)</li>
        <li>Aviso de cachê liberado</li>
        <li>Contrato de 2 anos</li>
      </ol>
      <ul class="text-left list-unstyled premium_desktop" id="premium_desktop1">
        <li>10x</li>
        <li>R$</li>
      </ul>
      <h2 class="text-center premium_desktop"  id="premium_desktop2">29<span>,90</span></h2>
      <h2 id="premium_desktop3" >CADASTRO SEM DESEMBOLSO</h2>
      <!--modal -->
       <button type="button" class="botao_modal" data-toggle="modal" data-target="#Modalmaior-premium">ESCOLHER</button>
<div class="modal" id="Modalmaior-premium" role="dialog" aria-labelledby="exampleModalPremiumLabel">
    <div class="modal-content modal-content-maior-premium">
          <div class="modal_esquerda">
            <h3>Premium</h3>
            <p>fotos simples em estúdio apenas para site</p>
            <ol>
              <li>Recebe 80% do cachê líquido em todos os trabalhos</li>
              <li>Pode se cadastrar em outra(s) agência(s)</li>
              <li>Aviso de cachê liberado</li>
              <li>Contrato de 2 anos</li>
            </ol>
            <ul class="text-left list-unstyled premium_desktop" id="premium_desktop1_1">
              <li>10x</li>
              <li>R$</li>
            </ul>
            <h2 class="text-center premium_desktop"  id="premium_desktop2_1">29<span>,90</span></h2>
            <h4 id="premium_desktop3_1">CADASTRO SEM</h4>
            <h2 id="premium_desktop3_2">DESEMBOLSO</h2>
          </div>

          <div class="modal_direita">
            <h3>Termos e Condições</h3>
              <div class="termo_um">
                <ol>
                  <li>Você, <span class="concat_texto"></span>, está contratando a Magneto Elenco para divulgar sua imagem e intermediar sua contratação junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e/ou promoção de eventos;</li><BR />
                  <li>Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;</li><BR />
                  <li>Nós não garantimos conseguir trabalhos para você, assim como você não tem obrigação de aceitar os trabalhos oferecidos;</li><BR />
                  <li>Porém, uma vez que aceite participar de um trabalho, você deverá realizá-lo ou poderá ter que pagar uma multa;</li>
                </ol>
              </div>
              <div class="termo_dois">
                <ol start="5">
                  <li>Você optou pelo Cadastro Premium e por isso sua remuneração será de 80% do cachê líquido (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li><BR />
                  <li><span id="txtpremium1"></span> <span id="txtpremium2" class="test"></span></li><BR />
                  <li>Você poderá estar inscrit<span id="txt62"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li><BR />
                  <li>Este contrato valerá por 24 meses a partir da data do pagamento;</li>
                </ol>
                <p class="descricao_contrato">Você concorda com os termos do agenciamento?</p>
              <div class="button" id="premium_maior">
                <input type="radio" name="modalidade_maior" value="Premium" id="premium_maior_input" class="sim_acordo" />
                <label for="premium_maior_input">CONCORDO</label>
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


<div class="div15_box2" id="modal-opaco-gratuito">
  <div class="versao_d">
    <div class="thumbnail">
      <div class="caption">
        <h3>Gratuito</h3>
        <p>fotos simples em estúdio apenas para site</p>
        <ol>
          <li>Recebe 20% do cachê líquido no 1º trabalho, 60% nos demais</li>
          <li>Deve ser agenciado apenas pela Magneto Elenco</li>
          <li>Contrato de 1 ano</li>
        </ol>
       <h2>CADASTRO SEM DESEMBOLSO</h2>
        <!--modal -->
        <button type="button" id="bota-modal-opaco-gratuito" class="botao_modal2" data-toggle="modal" data-target="#Modalmaior-gratuito">ESCOLHER</button>
            
            <div class="modal" id="Modalmaior-gratuito" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-content modal-content-maior-gratuito">
                <div class="modal_esquerda2">
                        <h3>Gratuito</h3>
                        <p>fotos simples em estúdio apenas para site</p>
                        <ol>
                          <li>Recebe 20% do cachê líquido no 1º trabalho, 60% nos demais</li>
                          <li>Deve ser agenciado apenas pela Magneto Elenco</li>
                          <li>Contrato de 1 ano</li>
                        </ol>
                        <h4>CADASTRO SEM</h4>
                        <h2>DESEMBOLSO</h2>
                      </div>

                      <div class="modal_direita">
                        <h3>Termos e Condições</h3>
                        <div class="termo_um2">
                          <ol>
                            <li>Você, <span class="concat_texto"></span>, está contratando a Magneto Elenco para divulgar sua imagem e intermediar sua contratação junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e/ou promoção de eventos;</li><BR />
                            <li>Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;</li><BR />
                            <li>Nós não garantimos conseguir trabalhos para você, assim como você não tem obrigação de aceitar os trabalhos oferecidos;</li><BR />
                            <li>Porém, uma vez que aceite participar de um trabalho, você deverá realizá-lo ou poderá ter que pagar uma multa;</li>
                          </ol>
                        </div>
                        <div class="termo_dois2">
                          <ol start="5">
                            <li>Você optou pelo Cadastro Gratuito e por isso sua remuneração será de apenas 20% do cachê líquido no primeiro trabalho e de 60% do cachê líquido nos demais trabalhos (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li><BR />
                            <li>Você não precisa desembolsar nada para se cadastrar;</li><BR />
                            <li>Você não poderá estar inscrit<span id="txt61"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li><BR />
                            <li>Nosso contrato valerá por 12 meses;</li>
                          </ol>
                          <p class="descricao_contrato2">Você concorda com os termos do agenciamento?</p>
                          <div class="button2" id="gratuito_maior_button">
                            <input type="radio" name="modalidade_maior" value="Gratuito" id="gratuito_maior_input" class="sim_acordo2" />
                            <label for="gratuito_maior_input">CONCORDO</label>
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


<div class="div15_box3">
  <div class="versao_d">
    <div class="thumbnail">
      <div class="caption">
        <h3>Profissional</h3>
        <p>ensaio fotográfico completo para site + entrega em DVD</p>
        <ol>
          <li>Recebe 90% do cachê líquido em todos os trabalhos</li>
          <li>Pode se cadastrar em outra(s) agência(s)</li>
          <li>Aviso de cachê liberado</li>
          <li>Ensaio com 30 fotos tratadas</li>
          <li>Contrato de 3 anos</li>
        </ol>
        <ul class="text-left list-unstyled">
          <li>10x</li>
          <li>R$</li>
        </ul>
        <h2 class="text-center">99<span>,90</span></h2>
        <!--modal -->
        <button type="button" class="botao_modal3" data-toggle="modal" data-target="#Modalmaior-profissional">ESCOLHER</button>
            <div class="modal" id="Modalmaior-profissional" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-content modal-content-maior-profissional">

                  <div class="modal_esquerda3">
                    <h3>Profissional</h3>
                    <p>ensaio fotográfico completo para site + entrega em DVD</p>
                    <ol>
                      <li>Recebe 90% do cachê líquido em todos os trabalhos</li>
                      <li>Pode se cadastrar em outra(s) agência(s)</li>
                      <li>Aviso de cachê liberado</li>
                      <li>Ensaio com 30 fotos tratadas</li>
                      <li>Contrato de 3 anos</li>
                    </ol>
                    <ul class="text-left list-unstyled">
                      <li>10x</li>
                      <li>R$</li>
                    </ul>
                    <h2 class="text-center">99<span>,90</span></h2>
                  </div>
                  <div class="modal_direita3">
                    <h3>Termos e Condições</h3>
                    <div class="termo_um3">
                      <ol>
                        <li>Você, <span class="concat_texto"></span>, está contratando a Magneto Elenco para divulgar sua imagem e intermediar sua contratação junto a produtoras audiovisuais, clientes anunciantes e agências de publicidade e/ou promoção de eventos;</li><BR />
                        <li>Para isso nos autoriza a utilizar sua imagem em nossos canais de comunicação;</li><BR />
                        <li>Nós não garantimos conseguir trabalhos para você, assim como você não tem obrigação de aceitar os trabalhos oferecidos;</li><BR />
                        <li>Porém, uma vez que aceite participar de um trabalho, você deverá realizá-lo ou poderá ter que pagar uma multa;</li>
                      </ol>
                    </div>
                    <div class="termo_dois3">
                      <ol start="5">
                        <li>Você optou pelo Cadastro Profissional e por isso sua remuneração será de 90% do cachê líquido (cachê líquido é o cachê bruto recebido pela Magneto Elenco descontados 20% de impostos);</li><BR />
                        <li>Para efetivar o cadastro você deverá pagar R$ 999,00 em até 10x sem juros;</li><BR />
                        <li>Você poderá estar inscrit<span id="txt60"></span> em outra(s) agência(s) enquanto nosso contrato estiver valendo;</li><BR />
                        <li>Um Ensaio Fotográfico Completo será realizado e entregue a você em DVD com mínimo de 30 fotos tratadas em até 30 dias;</li><BR />
                        <li>Este contrato valerá por 36 meses a partir da data do pagamento;</li>
                      </ol>
                      <p class="descricao_contrato3">Você concorda com os termos do agenciamento?</p>
                      <div class="button3" id="profissional_maior_button">
                        <input type="radio" name="modalidade_maior" value="Profissional" id="profissional_maior_input" class="sim_acordo3" />
                          <label for="profissional_maior_input">CONCORDO</label>
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


      <div class="progress30">
        <progress id="progressbar30" value="70" max="75"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav none">
          <li><a href="#" class="vs-prev swiper-control prev2"></a></li>
          <li><a href="#" class="vs-next swiper-control next2"></a></li>
        </ul>
      </nav> 
      </div> 
    </div>
    <!-- FIM DIV PLANOS -->
    <!-- ÚLTIMA DIV -->
    <div id="31" class="swiper-slide gradient">
      <div class="container">
        <div class="div16">
          <div class="row">
            <div class="pergunta col-lg-offset-3 col-lg-5">
              <h1 class="ultimo_p">Que tal deixar o perfil <span id="txt7"></span> <span class="concat2_texto"></span> mais completo?</h1>
            </div>
            <div class="input_ig col-lg-offset-3 col-lg-5">
              <img src="images/ig.svg" alt="instagram">
              <input name="ig_maior" id="ig_maior" type="text" class="TabOnEnter ig" autocomplete="off" placeholder="www.instagram.com/usuario" />
              <!-- <button ></button><span class="seta"><img src="img/seta_ok_neg.svg"></span> -->
            </div>
            <div class="input_fb col-lg-offset-3 col-lg-5">
              <img src="images/face.svg" alt="facebook">
              <input name="face_maior" id="face_maior" type="text" class="TabOnEnter face" autocomplete="off" placeholder="www.facebook.com/usuario" />
              <!-- <button ></button><span class="seta"><img src="img/seta_ok_neg.svg"></span> -->
            </div>
            <div class="input_tt col-lg-offset-3 col-lg-5">
              <img src="images/tt.svg" alt="twitter">
              <input name="tt_maior" id="tt_maior" type="text" class="TabOnEnter tt" autocomplete="off" placeholder="www.twitter.com/usuario" />
              <!-- <button ></button><span class="seta"><img src="img/seta_ok_neg.svg"></span> -->
            </div>
          </div>
          <button class="botao" id="cadastra" name="submit" type="submit">Enviar Cadastro</button>
          <p id="erro" style="display: none;">Por favor verifique se preencheu todos os campos obrigatórios marcados com <sup>*</sup></p>
        </div>
      </div>
      <div class="progress31">
        <progress id="progressbar31" value="75" max="75"></progress>
      </div>
      <nav>
        <ul class="vs-vertical-nav2 none">
          <li><a href="#" class="vs-prev2 swiper-control prev2"></a></li>
        </ul>
      </nav>
    </div>
    <!-- FIM ÚLTIMA DIV -->
  </div> <!-- Swiper Container -->
</div> <!-- Swiper wrapper -->
</form>
  <!-- Swiper JS -->
  <script src="js/jquery-1.12.1.min.js"></script>
  <script src="js/swiper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.mask.min.js"></script>
  <script src="js/script-form.js"></script>
  <script src="js/select.js"></script>
  <script src="js/jquery-ui.min.js"></script>
</body>
</html>