<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Perfil</title>
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="stylesheets/ion.rangeSlider.css">
  <link rel="stylesheet" href="stylesheets/ion.rangeSlider.skinFlat.css">
  <link rel="stylesheet" href="stylesheets/bootstrap-glyphicons.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="stylesheets/slick.css">
  <link rel="stylesheet" href="stylesheets/slick-theme.css">
  <link rel="stylesheet" href="stylesheets/contato.css">
  <link rel="stylesheet" href="stylesheets/assinatura.css">
  <link rel="stylesheet" href="stylesheets/portfolio.css">
  <link rel="stylesheet" href="stylesheets/caches.css">
  <link rel="stylesheet" href="stylesheets/jobs.css">
  <link rel="stylesheet" href="stylesheets/fisicos.css">
  <link rel="stylesheet" href="stylesheets/popularidade.css">
  <link rel="stylesheet" href="stylesheets/reputacao.css">
  <link rel="stylesheet" href="stylesheets/newsite.css">

</head>
<body>
  
<div class="gradient">
  <div class="container-outline__content">
    <div class="topbar">
      <div class="container-outline__center">
        <a class="menu-button cursor">
          <img src="images/menu.svg" />
        </a>
        <a class="logo cursor">
          <img src="images/logo.svg" />
        </a>
        <a class="menu-fav cursor">
          <img src="images/menu-fav.svg" />
          <span class="fav-number font-family">1</span>
        </a>
      </div>
    </div>
    <div class="fullscreen-menu">
      <div class="mask">
        <div class="container-outline__center">
          <span class="arrow-up">
            <form action="#">
              <div class="content-menu-trigger">
                <table class="table-menu">
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="busca" src="images/search.svg" />
                        <p>
                          Busca
                        </p>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="jobs" src="images/jobs.svg" />
                        <p>
                          Meus Jobs
                        </p>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="notificação" src="images/notification.svg" />
                        <p>
                          Notificações
                        </p>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="perfil" src="images/perfil.svg" />
                        <p>
                          Meu Perfil
                        </p>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="configurar" src="images/configuration.svg" />
                        <p>
                          Configurações
                        </p>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font-family color-primary cursor" href="">
                        <img alt="sair" src="images/logout.svg" />
                        <p>
                          Sair
                        </p>
                      </a>
                    </td>
                  </tr>
                </table>
              </div>
            </form>
          </span>
        </div>
      </div>
    </div>
    <div class="fullscreen-menu-fav">
      <div class="mask-fav">
        <div class="container-outline__center">
          <span class="arrow-up-fav">
            <form action="#">
              <div class="content-menu-fav container-outline__center">
                <div class="top-menu-fav-left">
                  <img alt="" src="images/jobs.svg" />
                  <p class="bold font-family color-primary">
                    criar job
                  </p>
                </div>
                <div class="top-menu-fav-right">
                  <div class="top-menu-fav-right__picture">
                    <img alt="" src="images/criar-jogo.svg" />
                    <p class="bold font-family color-primary">
                      criar jogo
                    </p>
                  </div>
                  <div class="top-menu-fav-right__picture">
                    <img alt="" src="images/encaminhar.svg" />
                    <p class="bold font-family color-primary">
                      encaminhar
                    </p>
                  </div>
                </div>
                <div class="perfil-fav">

                  <table class="table-menu-fav">

                  </table>

                </div>
              </div>
            </form>
          </span>
        </div>
      </div>
    </div>

    <div class="middle">
      <div class="container-outline__center">
 
        <div class="wrapper">

          <form method="post" action="" class="formfavorita">
            <div class="container">
                
        <?php 

              require_once ("api/conecta.php");

              $gender = $_POST['gender'];
              $bairro = $_POST['bairro'];
              $ranger_age = $_POST['ranger_age'];
              $age1 =  $ranger_age[0]; 
              $age1 .=  $ranger_age[1];
              $age2 =  $ranger_age[3]; 
              $age2 .=  $ranger_age[4];
              $raca_index = $_POST['raca_index'];

                  $sql = "SELECT * FROM (SELECT id_elenco AS id, nome_artistico, sexo, bairro, cd_pele, TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) AS idade, tipo_cadastro_vigente FROM tb_elenco WHERE sexo='$gender' AND TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) >= '$age1' AND TIMESTAMPDIFF(YEAR, dt_nascimento, CURDATE()) <= '$age2' AND cd_pele='$raca_index' AND bairro='$bairro') t1 INNER JOIN (SELECT cd_elenco AS id, arquivo, dt_foto FROM tb_foto ORDER BY dh_cadastro ASC) t2 USING (id) GROUP BY id ORDER BY dt_foto DESC";
          // $sql = "SELECT sexo, bairro, nome, cd_pele FROM tb_elenco WHERE sexo='$gender' AND bairro='$bairro' AND cd_pele='raca_index' ";

          $res    = mysqli_query($conexao_index, $sql) or die (alerta("Falha na Conexão  ".mysqli_error()));

          $count = mysqli_num_rows($res);

            while($row = mysqli_fetch_array($res)) {
              $nome = $row["nome_artistico"];
              $nome = explode(" ", $nome);
              $nome = $nome[0];
              $idade = $row['idade'];
              $arquivo = $row["arquivo"];
              $id = $row['id'];
                $nomefoto = "idfavoritada_";
                $nomeFotoCompleta = $nomefoto.$id;
              echo  "
            <div class='box animated'>
              <div class='tab__box'>
              <div class='tab-actions tab-actions__multiples'>

                <input type='radio' name='"; echo $nomeFotoCompleta."'";
                echo "' value='valor da imagem' class='checkbox-multiples' />
                <button type='submit' class='checkbox-multiples-action__fav botaofavorita";
                echo $id."'"; echo " fav' onclick='AddTableRow()'>
                  <img class='checkbox-multiples-img__fav' src='images/fav-icon.svg' alt=''>
                </button>

                <input type='radio' name='imagediscard' value='valor da imagem' class='checkbox-multiples' />
                <button type='submit' class='checkbox-multiples-action__discard botaodiscard discard'>
                  <img src='images/discard-icon.svg' alt=''>
                </button>

                <img alt='discard' class='discard-action cursor' src='images/discard.svg' />
                <img alt='fav' class='fav-action cursor' src='images/fav.svg' />
                <p class='subtitle font-family color-primary font-small cursor'>";
                echo $nome.", ".$idade;
                echo "
                </p>

                <img onmouseenter='onEnterFunction()' alt='background' class='tab-image__background cursor' src='http://www.magnetoelenco.com.br/fotos/";
                echo $arquivo;
                echo "' />

                <button type='button' class='dislike'>
                  <img alt='overlay discard' src='images/discard-single.svg' />
                </button>

                <button type='button' class='like'>
                  <img alt='overlay fav' src='images/fav-single.svg' />
                </button>

              </div>
            </div>        
          </div>";
            }
        ?>
                      
            </div>

          </form>
        </div>
        
        <div class="container-outline__categories">
              <section class="intro">
               <?php 
                  include "contato.php";
                ?>  
              </section>
              
             <section class="second">
               <?php 
                  include "planoassinatura.php";
                ?>  
              </section>
            
              <section class="third">
               <?php 
                  include "portfolio.php";
                ?>  
              </section>
              
              <section class="fourth">
               <?php 
                 include "caches.php";
                ?>  
              </section>
              
              <section class="fifth">
               <?php 
                 include "jobs.php";
                ?>  
              </section>
                
              <section class="sixth">
               <?php 
                 include "fisicos.php";
                ?>  
              </section>
              
              <section class="seventh">
               <?php 
                 include "popularidade.php";
                ?>  
              </section>
              
              <section class="eighth">
               <?php 
                 include "reputacao.php";
                ?>  
              </section>
              
              <section class="footer__section">
                <div class="container-outline__content">
                  <a href="#intro">
                    <img src="images/arrow-to-top.svg" alt="">
                  </a>
                  <hr>
                  <p class="font-family color-primary">Magneto Elenco © 2009-2017</p>
                </div>
              </section>
        </div>
         
      </div>
    </div>

    <div class="container-outline__center">
      <div class="footer">
        <div class="bottombar">
          <div class="container-outline__center">
            <a class="menu-search cursor" id="menu-link">
              <div class="search" id="search">
                <img src="images/search.svg" />
                <p class="font-family color-primary">
                  <?php echo $count." perfis"; ?>
                </p>
              </div>
            </a>
            <p class="font-family color-primary" id="perfil-name">
              Daniela, 22
            </p>
          <footer class="tabs">
            <button class="show-list-single">
              <svg width="24px" height="25px" viewBox="0 0 24 25" version="1.1" xmlns="http://www.w3.org/2000/svg" id="single-image" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Perfil---Mobile-(iPhone-4)" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Resultado---Grid-4" transform="translate(-224.000000, -400.000000)">

                        <g id="Group-5" transform="translate(225.000000, 401.000000)" fill="#FFFFFF" opacity="0.6">
                            <g id="Group-4">
                                <rect id="rect-single" x="0" y="0" width="22.1280637" height="23"></rect>
                            </g>
                        </g>
                    </g>
                </g>
              </svg>
            </button>
            <button class="show-list">
              <svg width="26px" height="25px" viewBox="0 0 26 25" version="1.1" xmlns="http://www.w3.org/2000/svg" id="box-4__image" xmlns:xlink="http://www.w3.org/1999/xlink">

                <g id="Perfil---Mobile-(iPhone-4)" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Resultado---Grid-9" transform="translate(-250.000000, -400.000000)">
                        <g id="iPhone-4-Safari">
                 
                        <g id="Group-5" transform="translate(225.000000, 401.000000)" fill="#FFFFFF" opacity="0.6">
                            <g id="Group-4">
                                <g id="Group-3" transform="translate(26.869792, 0.000000)">
                                    <rect id="Rectangle-Copy-3" x="0" y="0" width="10.2737439" height="10.6785714"></rect>
                                    <rect id="Rectangle-Copy-10" class="rect1" x="11.8543199" y="0" width="10.2737439" height="10.6785714"></rect>
                                    <rect id="Rectangle-Copy-9" x="0" y="12.3214286" width="10.2737439" height="10.6785714"></rect>
                                    <rect id="Rectangle-Copy-11" x="11.8543199" y="12.3214286" width="10.2737439" height="10.6785714"></rect>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
              </svg>
            </button>
            <button class="hide-list">
              <svg width="27px" height="27px" viewBox="0 0 27 27" version="1.1" xmlns="http://www.w3.org/2000/svg" id="multiple-image" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <!-- Generator: Sketch 41 (35326) - http://www.bohemiancoding.com/sketch -->
                  <title>Resultado - Grid 4</title>
                  <desc>Created with Sketch.</desc>
                  <defs>
                      <rect id="path-1" x="0" y="0" width="320" height="64"></rect>
                      <filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-2">
                          <feOffset dx="0" dy="0.5" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                          <feComposite in="shadowOffsetOuter1" in2="SourceAlpha" operator="out" result="shadowOffsetOuter1"></feComposite>
                          <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.3 0" type="matrix" in="shadowOffsetOuter1"></feColorMatrix>
                      </filter>
                      <path d="M1.25,0 L21.25,0 C21.9404167,0 22.5,0.580367801 22.5,1.29546384 L22.5,8.20460434 C22.5,8.9201322 21.94,9.5005 21.25,9.5005 L1.25,9.5005 C0.559583333,9.5005 0,8.9201322 0,8.20460434 L0,1.29546384 C0,0.580367801 0.559583333,0 1.25,0 L1.25,0 Z" id="path-3"></path>
                      <mask id="mask-4" maskContentUnits="userSpaceOnUse" maskUnits="objectBoundingBox" x="0" y="0" width="22.5" height="9.5005" fill="white">
                          <use xlink:href="#path-3"></use>
                      </mask>
                      <path d="M33.5483842,2.75 C33.5483842,4.26878571 32.3062501,5.5 30.773994,5.5 C29.2417379,5.5 28.0000001,4.26917857 28.0000001,2.75 C27.9996038,1.23121429 29.2417379,0 30.773994,0 C32.3062501,0 33.5483842,1.23121429 33.5483842,2.75 Z" id="path-5"></path>
                      <mask id="mask-6" maskContentUnits="userSpaceOnUse" maskUnits="objectBoundingBox" x="0" y="0" width="5.54838424" height="5.5" fill="white">
                          <use xlink:href="#path-5"></use>
                      </mask>
                      <rect id="path-7" x="0" y="0" width="320" height="44"></rect>
                      <filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-8">
                          <feOffset dx="0" dy="-0.5" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                          <feComposite in="shadowOffsetOuter1" in2="SourceAlpha" operator="out" result="shadowOffsetOuter1"></feComposite>
                          <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.3 0" type="matrix" in="shadowOffsetOuter1"></feColorMatrix>
                      </filter>
                      <path d="M263.5,8 L263.5,27 L282.5,27 L282.5,8 L263.5,8 Z M269,3.5 L270,3.5 L270,7 L269,7 L269,3.5 Z M269,2.5 L288,2.5 L288,3.5 L269,3.5 L269,2.5 Z M287,3.5 L288,3.5 L288,21.5 L287,21.5 L287,3.5 Z M283.5,20.5 L287,20.5 L287,21.5 L283.5,21.5 L283.5,20.5 Z" id="path-9"></path>
                      <mask id="mask-10" maskContentUnits="userSpaceOnUse" maskUnits="objectBoundingBox" x="0" y="0" width="24.5" height="24.5" fill="white">
                          <use xlink:href="#path-9"></use>
                      </mask>
                  </defs>
                  <g id="Perfil---Mobile-(iPhone-4)" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g id="Resultado---Grid-4" transform="translate(-277.000000, -399.000000)">
                          <g id="iPhone-4-Safari">
                              <g id="Top-Bar">
                                  <g id="background-#F8F8F8">
                                      <use fill="black" fill-opacity="1" filter="url(#filter-2)" xlink:href="#path-1"></use>
                                      <use fill-opacity="0.86" fill="#F8F8F8" fill-rule="evenodd" xlink:href="#path-1"></use>
                                  </g>
                                  <g id="Search" transform="translate(9.500000, 24.500000)">
                                      <rect id="background" fill-opacity="0.62" fill="#E6E7E8" x="0" y="0" width="301" height="29" rx="5.5"></rect>
                                      <path d="M285.9955,8.49100152 C282.407569,8.49343248 279.5,11.4029999 279.5,14.991 C279.5,18.581 282.41,21.491 286,21.491 C289.4145,21.491 292.214,18.8425 292.4795,15.496 C292.1035,15.496 291.4965,15.489 290.9725,15.4895 C290.708,18.0015 288.5825,19.9915 286,19.9915 C283.2385,19.9915 281,17.7525 281,14.991 C281,12.2314999 283.236069,9.99343278 285.9955,9.99100198 L285.9955,12.5035 L291.1945,9.5015 L285.9955,6.5 L285.9955,8.49100141 Z" id="refresh" fill="#000000"></path>
                                      <text id="www.magnetoelenco.co" font-family="HelveticaNeue, Helvetica Neue" font-size="17" font-weight="normal" letter-spacing="0.100000016" fill="#000000">
                                          <tspan x="40.0579998" y="19.237999">www.magnetoelenco.com.br</tspan>
                                      </text>
                                  </g>
                                  <g id="Status-Bar" transform="translate(6.000000, 0.500000)">
                                      <g id="Battery" transform="translate(242.000000, 3.000000)">
                                          <g id="Icon" transform="translate(42.000000, 2.000000)">
                                              <path d="M23.5,6.5 C24.052,6.5 24.4995,5.97733333 24.4995,5.33333333 L24.4995,4.16666667 C24.4995,3.52266667 24.052,3 23.5,3 L23,3 L23,6.5 L23.5,6.5 Z" id="Shape" fill="#000000"></path>
                                              <use id="Shape" stroke="#000000" mask="url(#mask-4)" xlink:href="#path-3"></use>
                                              <rect id="Rectangle-15" fill="#000000" x="1" y="1" width="20.5" height="7.5" rx="0.5"></rect>
                                          </g>
                                          <text id="100%" font-family="HelveticaNeue, Helvetica Neue" font-size="12" font-weight="normal" letter-spacing="-1.04347825" fill="#000000">
                                              <tspan x="7.52747825" y="11">1</tspan>
                                              <tspan x="13.156" y="11">00%</tspan>
                                          </text>
                                      </g>
                                      <g id="Bluetooth" transform="translate(236.000000, 3.000000)" fill="#000000" opacity="0.45">
                                          <path d="M5.662,7.252 L8.485,4.489 L4.273,0.5 L4.173,0.5 L4.173,6.048 L1.314,3.1225 L0.5,3.9525 L3.9395,7.252 L0.5,10.5515 L1.314,11.381 L4.173,8.455 L4.173,14.003 L4.355,14.003 L8.5255,10.0035 L5.662,7.252 L5.662,7.252 Z M7.1075,4.489 L5.205,6.3565 L5.205,2.8175 L7.1075,4.489 L7.1075,4.489 Z M5.205,11.771 L5.205,8.0815 L7.024,10.015 L5.205,11.771 L5.205,11.771 Z" id="Icon"></path>
                                      </g>
                                      <g id="Time" transform="translate(138.000000, 0.000000)" fill="#000000" font-weight="400">
                                          <text id="10" font-family="HelveticaNeue-Medium, Helvetica Neue" font-size="12" letter-spacing="-1.5">
                                              <tspan x="0.5" y="14">1</tspan>
                                              <tspan x="5.672" y="14">0</tspan>
                                          </text>
                                          <text id="10" font-family="HelveticaNeue-Medium, Helvetica Neue" font-size="12" letter-spacing="-1.5">
                                              <tspan x="16.5" y="14">1</tspan>
                                              <tspan x="21.672" y="14">0</tspan>
                                          </text>
                                          <text id=":" font-family="AvenirNext-Medium, Avenir Next" font-size="11.6363636" letter-spacing="1">
                                              <tspan x="12.75" y="12.5">:</tspan>
                                          </text>
                                      </g>
                                      <g id="Carrier" transform="translate(0.000000, 2.500000)">
                                          <path d="M81.7413432,8.50912484 C80.9856958,8.50912484 80.2935197,8.82760846 79.755703,9.28693094 L81.7413432,11.555 L83.7292368,9.28918436 C83.1910446,8.82873517 82.4984929,8.50912484 81.7413432,8.50912484 Z M81.8198374,4.02293758 C83.7025713,4.02293758 85.4189276,4.738399 86.7341748,5.9120562 L87.6471862,4.87097532 C86.088945,3.47573165 84.0537296,2.5 81.8194618,2.5 C79.5889498,2.5 77.5563633,3.47310265 76,4.86459063 L76.9115091,5.90642265 C78.2263808,4.73577001 79.9397325,4.02293758 81.8198374,4.02293758 Z M81.7935475,7.0275 C82.9221363,7.0275 83.9530767,7.45076773 84.7481591,8.14632393 L85.714877,7.04477623 C84.6632802,6.11336188 83.294702,5.50456242 81.7939231,5.50456242 C80.2957731,5.50456242 78.9290728,6.11148403 77.8778515,7.04026939 L78.8430672,8.14331937 C79.6373984,7.44888988 80.6668366,7.0275 81.7935475,7.0275 Z" id="Wifi" fill="#000000"></path>
                                          <text id="Claro" font-family="HelveticaNeue, Helvetica Neue" font-size="12" font-weight="normal" letter-spacing="1.13286722" fill="#000000">
                                              <tspan x="38" y="11.5">Claro</tspan>
                                          </text>
                                          <g id="Signal" transform="translate(0.000000, 4.500000)">
                                              <path d="M2.77439024,0 C4.30664634,0 5.54917683,1.23121429 5.54917683,2.75 C5.54917683,4.26878571 4.30704268,5.5 2.77439024,5.5 C1.24213415,5.5 0,4.26917857 0,2.75 C0,1.23121429 1.24253049,0 2.77439024,0 L2.77439024,0 Z" id="Shape" fill="#000000"></path>
                                              <path d="M9.77439024,0 C11.3066463,0 12.5487805,1.23121429 12.5487805,2.75 C12.5487805,4.26878571 11.3066463,5.5 9.77439024,5.5 C8.24213415,5.5 7,4.26917857 7,2.75 C7,1.23121429 8.24213415,0 9.77439024,0 L9.77439024,0 Z" id="Shape" fill="#000000"></path>
                                              <path d="M16.7496028,0 C18.2818589,0 19.5239931,1.23121429 19.5239931,2.75 C19.5239931,4.26878571 18.2818589,5.5 16.7496028,5.5 C15.2177431,5.5 13.9756089,4.26917857 13.9756089,2.75 C13.9752126,1.23121429 15.2173467,0 16.7496028,0 L16.7496028,0 Z" id="Shape" fill="#000000"></path>
                                              <path d="M23.7743902,0 C25.3066463,0 26.5487805,1.23121429 26.5487805,2.75 C26.5487805,4.26878571 25.3070427,5.5 23.7743902,5.5 C22.2421341,5.5 21,4.26917857 21,2.75 C21,1.23121429 22.2421341,0 23.7743902,0 L23.7743902,0 Z" id="Shape" fill="#000000"></path>
                                              <use id="Shape" stroke="#000000" mask="url(#mask-6)" xlink:href="#path-5"></use>
                                          </g>
                                      </g>
                                  </g>
                              </g>
                              <g id="Navigation-Bar" transform="translate(0.000000, 436.000000)">
                                  <g id="background-#F8F8F8">
                                      <use fill="black" fill-opacity="1" filter="url(#filter-8)" xlink:href="#path-7"></use>
                                      <use fill-opacity="0.86" fill="#F8F8F8" fill-rule="evenodd" xlink:href="#path-7"></use>
                                  </g>
                                  <g id="Icons" transform="translate(16.000000, 7.000000)">
                                      <use id="tabs" stroke="#007AFF" mask="url(#mask-10)" stroke-width="2" xlink:href="#path-9"></use>
                                      <path d="M215.656,3 C213.0275,3 210.833,4.1065 209.5,6.0635 C208.1675,4.1065 205.9725,3 203.344,3 C200.28,3 197,4.6395 197,7.08 L197,25.423 C197,25.616 197.105,25.793 197.274,25.8845 C197.4435,25.975 197.6495,25.966 197.808,25.86 C197.8485,25.833 201.8935,23.164 205.1555,23.164 C207.269,23.164 208.5225,24.2795 208.9895,26.5755 C208.9925,26.591 209.002,26.604 209.0065,26.619 C209.015,26.6475 209.0255,26.674 209.0385,26.7005 C209.0535,26.7305 209.07,26.7575 209.09,26.7835 C209.1065,26.8055 209.124,26.826 209.144,26.845 C209.168,26.8685 209.194,26.888 209.2225,26.906 C209.245,26.9205 209.267,26.935 209.2925,26.9455 C209.325,26.96 209.3585,26.968 209.394,26.976 C209.4125,26.98 209.4285,26.99 209.448,26.992 C209.465,26.9935 209.482,26.9945 209.4995,26.9945 L209.4995,26.9945 L209.5,26.9945 L209.5005,26.9945 L209.501,26.9945 C209.518,26.9945 209.535,26.993 209.5525,26.992 C209.5715,26.99 209.5875,26.9805 209.606,26.976 C209.641,26.968 209.675,26.9605 209.7075,26.9455 C209.7325,26.9345 209.7545,26.9205 209.7775,26.906 C209.806,26.888 209.832,26.8685 209.856,26.845 C209.876,26.826 209.893,26.8055 209.9095,26.7835 C209.9295,26.7575 209.946,26.7305 209.9605,26.7005 C209.9735,26.674 209.984,26.6475 209.9925,26.619 C209.997,26.604 210.0065,26.591 210.0095,26.5755 C210.4765,24.2795 211.7305,23.164 213.8435,23.164 C217.106,23.164 221.1505,25.8325 221.191,25.86 C221.35,25.9655 221.5555,25.975 221.725,25.8845 C221.894,25.793 221.999,25.616 221.999,25.423 L221.999,7.08 C222,4.6395 218.7205,3 215.656,3 L215.656,3 Z M205.156,22.1165 C202.472,22.1165 199.456,23.6655 198.042,24.4885 L198.042,7.08 C198.042,5.4935 200.5695,4.0485 203.3445,4.0485 C205.8545,4.0485 207.901,5.1985 208.9795,7.2095 L208.9795,23.886 C208.1195,22.72 206.8295,22.1165 205.156,22.1165 L205.156,22.1165 Z M220.9585,24.4885 C219.5445,23.6655 216.5285,22.1165 213.8445,22.1165 C212.171,22.1165 210.881,22.72 210.021,23.886 L210.021,7.21 C211.0995,5.199 213.1465,4.049 215.656,4.049 C218.431,4.049 220.958,5.494 220.958,7.0805 L220.958,24.4885 L220.9585,24.4885 Z" id="bookmarks" fill="#007AFF"></path>
                                      <path d="M142.5,2.207 L139.3535,5.3535 L138.6465,4.6465 L143,0.293 L147.3535,4.6465 L146.6465,5.3535 L143.5,2.207 L143.5,17.5 L142.5,17.5 L142.5,2.207 Z M152.507,27 L133.5,27 L133.5,8 L140.5,8 L140.5,9 L134.5,9 L134.5,26 L151.507,26 L151.507,9 L145.5,9 L145.5,8 L152.507,8 L152.507,27 Z" id="share" fill="#007AFF"></path>
                                      <path d="M71.0032056,15.2187499 L71,15.222 L72.113,16.35 L72.1160256,16.3469325 L79.8735,24.2115 L80.9825,23.087 L73.225298,15.2222716 L81.0155,7.324 L79.9025,6.196 L72.112509,14.0940577 L72.109,14.0905 L71,15.2155 L71.0032056,15.2187499 Z" id="forward" fill="#C4C4C4" transform="translate(76.007750, 15.203750) scale(-1, 1) translate(-76.007750, -15.203750) "></path>
                                      <path d="M0.503205638,15.2187499 L0.5,15.222 L1.613,16.35 L1.61602556,16.3469325 L9.3735,24.2115 L10.4825,23.087 L2.72529804,15.2222716 L10.5155,7.324 L9.4025,6.196 L1.61250903,14.0940577 L1.609,14.0905 L0.5,15.2155 L0.503205638,15.2187499 Z" id="back" fill="#C4C4C4"></path>
                                  </g>
                              </g>
                          </g>
                          <g id="Group-5" transform="translate(225.000000, 401.000000)" fill="#FFFFFF" opacity="0.6">
                              <g id="Group-4">
                                  <g id="Group-2" transform="translate(53.739583, 0.000000)">
                                      <rect id="Rectangle" x="0" y="0" width="6.32230392" height="6.57142857"></rect>
                                      <rect id="Rectangle-Copy-3" x="7.9028799" y="0" width="6.32230392" height="6.57142857"></rect>
                                      <rect id="Rectangle-Copy" x="0" y="8.21428571" width="6.32230392" height="6.57142857"></rect>
                                      <rect id="Rectangle-Copy-4" x="7.9028799" y="8.21428571" width="6.32230392" height="6.57142857"></rect>
                                      <rect id="Rectangle-Copy-2" x="0" y="16.4285714" width="6.32230392" height="6.57142857"></rect>
                                      <rect id="Rectangle-Copy-5" x="7.9028799" y="16.4285714" width="6.32230392" height="6.57142857"></rect>
                                      <rect id="Rectangle-Copy-8" x="15.8057598" y="0" width="6.32230392" height="6.57142857"></rect>
                                      <rect id="Rectangle-Copy-7" x="15.8057598" y="8.21428571" width="6.32230392" height="6.57142857"></rect>
                                      <rect id="Rectangle-Copy-6" x="15.8057598" y="16.4285714" width="6.32230392" height="6.57142857"></rect>
                                  </g>
                              </g>
                          </g>
                      </g>
                  </g>
              </svg>
            </button>
          </footer>
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
  </div>
</div>



<!-- <script src="javascripts/jquery-2.2.4.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="javascripts/slick.min.js"></script>
<script src="javascripts/jquery.easing.min.js"></script>
<script src="javascripts/ion.rangeSlider.min.js"></script>
<script src="javascripts/jquery.easy-pie-chart.js"></script>
<script src="javascripts/all.js"></script>
<!-- <script src="javascripts/tabs.js"></script> -->
<script>
// var myTabs = tabs({
//   el: '#tabs',
//   tabNavigationLinks: '.c-tabs-nav__link',
//   tabContentContainers: '.c-tab'
// });
// myTabs.init();
$(document).ready(function() {
  document.getElementById('dislike').style.display = 'none';
  document.getElementById('like').style.display = 'none';
  $(".box-multiple").click(function(){
    document.getElementById("menu-link").style.display = "block";
    document.getElementById("perfil-name").style.display = "none";
    document.getElementById("single-perfil").style.display = "none";
  });
});
    
  $('.show-list-single').click(function(){
    $('.wrapper').removeClass('list-mode');
    $('.wrapper').addClass('list-mode-single');
    $('.checkbox-multiples-action__fav img').css('display', 'none');
    $('.checkbox-multiples-action__discard img').css('display', 'none');
    $('.dislike').css('display', 'block');
    $('.like').css('display', 'block');
    $('.container-outline__categories').css('display', 'block');
  });
// .checkbox-multiples-action__fav img 
// .checkbox-multiples-action__discard img
  $('.show-list').click(function(){
    $('.wrapper').removeClass('list-mode-single');
    $('.wrapper').addClass('list-mode');
    $('.checkbox-multiples-action__fav img').css('display', 'block');
    $('.checkbox-multiples-action__discard img').css('display', 'block');
    $('.dislike').css('display', 'none');
    $('.like').css('display', 'none');
    $('.container-outline__categories').css('display', 'none');
  });
  $('.hide-list').click(function(){
    $('.wrapper').removeClass('list-mode-single');
    $('.wrapper').removeClass('list-mode');
    $('.checkbox-multiples-action__fav img').css('display', 'block');
    $('.checkbox-multiples-action__discard img').css('display', 'block');
    $('.dislike').css('display', 'none');
    $('.like').css('display', 'none');
    $('.container-outline__categories').css('display', 'none');
  });
    
  $(".dislike").click(function(){
      $(".wrapper.list-mode-single .box:last-child").addClass('fadeOutLeft');
    $(this).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
                function(event) {
      // Do something when the transition ends
      $(".wrapper.list-mode-single .box:last-child").remove();
    });
  });
    
  $(".like").click(function(){
      $(".wrapper.list-mode-single .box:last-child").addClass('fadeOutRight');
    $(this).one("webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
                function(event) {
      // Do something when the transition ends
      $(".wrapper.list-mode-single .box:last-child").remove();
    });
  });
    
</script>

<script src="javascripts/ajax.js"></script>

</body>
</html>