<div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='titulo heavy white large'>
        Escolha o horário da sessão de fotos
        </div>
        <div class='subtitulo avenir white small'>
          <section class="drum-selector" id="drum-selector">
            <form action="" class="scroll" name="date">
              <select class="date list drum-select" id="date" name="date">
                  <?php 
                  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                  date_default_timezone_set('America/Sao_Paulo');
                  $timestamp = strtotime('now') + 60*60;
                  $time = date('H', $timestamp);
                   ?>
                <option value="
                <?php 
                  if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime("%a %d %b %H:%M:%S", strtotime('now'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime("%a %d %b %H:%M:%S", strtotime('+1 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+1 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime("%a %d %b %H:%M:%S", strtotime('+1 day'));
                    } else {
                        echo "Não identificamos a hora";
                    }
                 ?>
                " selected>
                  <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo "Hoje";
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo "Amanhã";
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+1 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo "Hoje";
                    } else {
                        echo "Não identificamos a hora";
                    }
                   ?>
                </option>
                <option value="<?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo "Amanhã";
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+2 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+1 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+3 day'));
                    } else {
                        echo "Não identificamos a hora";
                    }
                   ?>
">
                
                 <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo "Amanhã";
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+2 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+1 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+3 day'));
                    } else {
                        echo "Não identificamos a hora";
                    }
                   ?>
                </option>
                <option value="<?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+2 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+3 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+2 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+4 day'));
                    } else {
                        echo "Não identificamos a hora";
                    }
                  ?>" >
                  <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+2 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+3 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+2 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+4 day'));
                    } else {
                        echo "Não identificamos a hora";
                    }
                  ?>
                </option>
                <option value="<?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+3 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+4 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+3 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+5 day'));
                    } else {
                        echo "Não identificamos a hora";
                    }
                  ?>" >
                  <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+3 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+4 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+3 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+5 day'));
                    } else {
                        echo "Não identificamos a hora";
                    }
                  ?>
                </option>
                <option value="<?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+4 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+5 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+4 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+6 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>">
                  <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+4 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+5 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+4 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+6 day'));
                    } else {
                        echo "Não identificamos a hora";
                    }
                  ?>
                </option>
                <option value="<?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+5 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+6 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+5 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+7 day'));
                    } else {
                        echo "Não identificamos a hora";
                    }
                  ?>">
                  <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+5 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+6 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+5 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+7 day'));
                    } else {
                        echo "Não identificamos a hora";
                    }
                  ?>
                </option>
                <option value="<?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+6 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+7 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+6 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+8 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>">
                  <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+6 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+7 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+6 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+8 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>
                </option>
                <option value="<?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+7 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+8 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+7 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+9 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>">
                  <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+7 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+8 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+7 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+9 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>
                </option>
                <option value="<?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+8 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+9 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+8 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+10 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>">
                  <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+8 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+9 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+8 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+10 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>
                </option>
                <option value="<?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+9 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+10 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+9 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+11 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>">
                  <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+9 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+10 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+9 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+11 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>
                </option>
                <option value="<?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+10 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+11 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+10 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+12 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>">
                  
                  <?php 
                    if (strftime("%a %d %b %H:%M:%S", strtotime('now')) < strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+10 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('now')) > strftime("%a %d %b 18:45:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+11 day'));
                    } elseif( strftime("%a %d %b %H:%M:%S", strtotime('+10 day')) > strftime("%a %d %b 00:00:00", strtotime('now')) ) {
                      echo strftime('%a %d de %b', strtotime('+12 day'));
                    } else {
                        echo "Não identificamos a hora";
                    } ?>
                </option>
              </select>
   
    
            
          <?php
        //Se for acima de 18:45 mostra horários de 9:00 às 18hrs
         if (strftime("%H:%M:%S", strtotime('now')) > strftime("18:45:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' selected>9</option>";
                echo "<option class='option' value='' >10</option>";
                echo "<option class='option' value='' >11</option>";
                echo "<option class='option' value='' >12</option>";
                echo "<option class='option' value='' >13</option>";
                echo "<option class='option' value='' >14</option>";
                echo "<option class='option' value='' >15</option>";
                echo "<option class='option' value='' >16</option>";
                echo "<option class='option' value='' >17</option>";
                echo "<option class='option' value='' >18</option>";
            echo "</select>";
         }
        //se for 18hrs mostra o horário de 18hrs
         elseif(strftime("%H:%M:%S", strtotime('now')) > strftime("18:00:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' selected>18</option>";
            echo "</select>";
                        
         }
        //se for 9hrs mostra o horário 10hrs
         elseif(strftime("%H:%M:%S", strtotime('now')) > strftime("09:00:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' selected>10</option>";
                echo "<option class='option' value='' >11</option>";
                echo "<option class='option' value='' >12</option>";
                echo "<option class='option' value='' >13</option>";
                echo "<option class='option' value='' >14</option>";
                echo "<option class='option' value='' >15</option>";
                echo "<option class='option' value='' >16</option>";
                echo "<option class='option' value='' >17</option>";
                echo "<option class='option' value='' >18</option>";
            echo "</select>";
                        
         }
        //se for antes das 10hrs mostra o horário de 11hrs
         elseif(strftime("%H:%M:%S", strtotime('now')) > strftime("10:00:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' selected>11</option>";
                echo "<option class='option' value='' >12</option>";
                echo "<option class='option' value='' >13</option>";
                echo "<option class='option' value='' >14</option>";
                echo "<option class='option' value='' >15</option>";
                echo "<option class='option' value='' >16</option>";
                echo "<option class='option' value='' >17</option>";
                echo "<option class='option' value='' >18</option>";
            echo "</select>";
                        
         }
        //se for antes das 11hrs mostra o horário de 12hrs
         elseif(strftime("%H:%M:%S", strtotime('now')) > strftime("11:00:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' >12</option>";
                echo "<option class='option' value='' >13</option>";
                echo "<option class='option' value='' >14</option>";
                echo "<option class='option' value='' >15</option>";
                echo "<option class='option' value='' >16</option>";
                echo "<option class='option' value='' >17</option>";
                echo "<option class='option' value='' >18</option>";
            echo "</select>";
                        
         }
        //se for antes das 12hrs mostra o horário de 13hrs
         elseif(strftime("%H:%M:%S", strtotime('now')) > strftime("12:00:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' >13</option>";
                echo "<option class='option' value='' >14</option>";
                echo "<option class='option' value='' >15</option>";
                echo "<option class='option' value='' >16</option>";
                echo "<option class='option' value='' >17</option>";
                echo "<option class='option' value='' >18</option>";
            echo "</select>";
                        
         }
        //se for antes das 13hrs mostra o horário de 14hrs
         elseif(strftime("%H:%M:%S", strtotime('now')) > strftime("13:00:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' >14</option>";
                echo "<option class='option' value='' >15</option>";
                echo "<option class='option' value='' >16</option>";
                echo "<option class='option' value='' >17</option>";
                echo "<option class='option' value='' >18</option>";
            echo "</select>";
                        
         }
        //se for antes das 14hrs mostra o horário de 15hrs
         elseif(strftime("%H:%M:%S", strtotime('now')) > strftime("14:00:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' >15</option>";
                echo "<option class='option' value='' >16</option>";
                echo "<option class='option' value='' >17</option>";
                echo "<option class='option' value='' >18</option>";
            echo "</select>";
                        
         }
        //se for antes das 15hrs mostra o horário de 16hrs
         elseif(strftime("%H:%M:%S", strtotime('now')) > strftime("15:00:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' >16</option>";
                echo "<option class='option' value='' >17</option>";
                echo "<option class='option' value='' >18</option>";
            echo "</select>";
                        
         }
        //se for antes das 16hrs mostra o horário de 17hrs
         elseif(strftime("%H:%M:%S", strtotime('now')) > strftime("16:00:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' >17</option>";
                echo "<option class='option' value='' >18</option>";
            echo "</select>";
                        
         }
        //se for antes das 17hrs mostra o horário de 18hrs
         elseif(strftime("%H:%M:%S", strtotime('now')) > strftime("17:00:00", strtotime('now')) ) {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' >18</option>";
            echo "</select>";
                        
         } else {
            echo "<select class='drum-select list' id='hour' name='hour'>";
                echo "<option class='option' value='' selected>18</option>";
            echo "</select>";
                        
         }
                   
        ?>
              
              
            <span class="dois-pontos">:</span>
              <select class="drum-select list" id="minutes" name="minutes" size="2">
                <option class="option">
                  00
                </option>
                <option class="option">
                  15
                </option>
                <option class="option">
                  30
                </option>
                <option class="option">
                  45
                </option>
                <option class="option">
                  00
                </option>
                <option class="option">
                  15
                </option>
                <option class="option">
                  30
                </option>
                <option class="option">
                  45
                </option>
              </select>
              
            </form>
          </section>
        </div>
        <div class='botoes'>
            <button id='btn_novo-horario-fotos' class='botao'>Continuar</button>
        </div>
    </div>
</div>
