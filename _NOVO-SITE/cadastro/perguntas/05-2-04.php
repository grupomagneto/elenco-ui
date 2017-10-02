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
                  $horario = proximoHorario($timestamp)['horario'];
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
                  ?>
              </select>
              <select class='drum-select list' id='hour' name='hour'>
                <option class='option' value='09' selected>09</option>
                <option class='option' value='10'>10</option>
                <option class='option' value='11'>11</option>
                <option class='option' value='14'>14</option>
                <option class='option' value='15'>15</option>
                <option class='option' value='16'>16</option>
                <option class='option' value='17'>17</option>
                <option class='option' value='18'>18</option>
              </select>

            <span class="dois-pontos">:</span>

              <select class="drum-select list" id="minutes" name="minutes">
                <option class="option" value='00' selected>00</option>
                <option class="option" value='15'>15</option>
                <option class="option" value='30'>30</option>
                <option class="option" value='45'>45</option>
              </select>
          </section>
        </div>
        <div class='botoes'>
          <?php echo $horario; ?>
            <input type="hidden" name="tipo_ensaio" id="input_tipo_ensaio" value="">
            <button id='btn_novo-horario-fotos' class='botao'>Continuar</button>
        </div>
    </div>
</div>
</form>
