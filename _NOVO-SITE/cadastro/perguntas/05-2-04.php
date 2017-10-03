<div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
    <div class='conteudo flexbox wrap text-align-center space-between-vertical justify-center'>
        <div class='titulo heavy white large'>
        Escolha o horário da sessão de fotos
        </div>
        <div class='subtitulo avenir white small'>
          <section class="drum-selector" id="drum-selector">
            <form action="#" method="post" class="scroll" name="date" id="form_nova_data">
              <select class="date list drum-select" id="date" name="date">
                  <?php
                  // Começa buscando o próximo dia e adiciona 7
                  $prox_data_unformat = proximoHorario($timestamp)['data_unformat'];
                  $escolheHorario = proximoHorario($timestamp)['horario'];
                  // Primeira opção
                  $data_desconto = strftime('%a %d de %b', strtotime($prox_data_unformat));
                  echo "<option value='$prox_data_unformat' selected>$data_desconto</option>";
                  $n = 1;
                  while ($n <= 6) {
                    $verificaData = date('Y-m-d', strtotime($prox_data_unformat . '+'.$n.' day'));
                    $verificaFeriado = var_export(verificarFeriado($verificaData), true);
                    // Se for domingo ou feriado, adiciona um dia
                    while (date('N', strtotime($verificaData)) == 7 || $verificaFeriado != 'false'){
                      $verificaData = date('Y-m-d', strtotime($verificaData . ' +1 day'));
                      $verificaFeriado = var_export(verificarFeriado($verificaData), true);
                      $n++;
                    }
                    // Formata e exibe as opções
                    $proxData = strftime('%a %d de %b', strtotime($verificaData));
                    echo "<option value='$verificaData'>$proxData</option>";
                    $n++;
                  }
                  echo "</select>";
                  // SELECT DA HORA
                  $pieces_hora = explode(":", $escolheHorario);
                  $hora_select = $pieces_hora[0];
                  $minutos_select = $pieces_hora[1];
                  $horaAgora = date('H', strtotime($timestamp));
                  $minutosAgora = date('i', strtotime($timestamp));
                  $h = 9;
                  if ($minutosAgora <= 15 && $minutosAgora > 0) {
                    $m = 15;
                    $minutosAgora = 15;
                  }
                  if ($minutosAgora > 15 && $minutosAgora <= 30) {
                    $m = 30;
                    $minutosAgora = 30;
                  }
                  if ($minutosAgora > 30 && $minutosAgora <= 45) {
                    $m = 45;
                    $minutosAgora = 45;
                  }
                  if ($minutosAgora == "00" || $minutosAgora == 0 || ($minutosAgora > 45 && $minutosAgora <= 59)) {
                    $m = "00";
                    $minutosAgora = "00";
                    $h++;
                  }
                  echo "<select class='drum-select list' id='hour' name='hour'>";
                  while ($h < 19) {
                    if ($horaAgora == $h) {
                      echo "<option class='option' value='$h' selected>$h</option>";
                    }
                    if ($horaAgora != $h) {
                      echo "<option class='option' value='$h'>$h</option>";
                    }
                    $h++;
                  }
                  echo "</select>";
                  echo "<span class='dois-pontos'>:</span>";
                  // SELECT DOS MINUTOS
                  echo "<select class='drum-select list' id='minutes' name='minutes'>";
                  $v = 1;
                  while ($v < 5) {
                    if ($minutosAgora == $m) {
                      echo "<option class='option' value='$m' selected>$m</option>";
                    }
                    if ($minutosAgora != $m) {
                      echo "<option class='option' value='$m'>$m</option>";
                    }
                    $m = $m + 15;
                    if ($m == 60) {
                      $m = "00";
                    }
                    $v++;
                  }
                  echo "</select>";
                  ?>
          </section>
        </div>
        <div class='botoes'>
            <input type="hidden" name="tipo_ensaio" id="input_tipo_ensaio" value="">
            <button id='btn_novo-horario-fotos' class='botao'>Continuar</button>
        </div>
    </div>
</div>
</form>
