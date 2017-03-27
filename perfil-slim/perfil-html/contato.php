<?php
  require_once ("api/functions.php");
  require_once ("api/conecta.php");
  $sql_contato = "SELECT nome_artistico, tl_celular, endereco, email, bairro FROM tb_elenco WHERE id_elenco='$id'";
  // echo $sql_contato;
  $result_contato = mysqli_query($conexao_index, $sql_contato) or die (alerta("Falha na Conexão  ".mysqli_error()));
  $row_contato = mysqli_fetch_array($result_contato);
  $nome_artistico = $row_contato['nome_artistico'];
  $tl_celular = $row_contato['tl_celular'];
  $email = $row_contato['email'];
  $endereco = strtolower($row_contato['endereco']);
  $endereco = ucwords($endereco);
  $bairro = strtolower($row_contato['bairro']);
  $bairro = ucwords($bairro);
?>

<div class="container-outline__content">
    <div class="contact">
      <div class="title-section">
        <img alt="contato" src="images/contato.svg" />
        <p class="font-family font-medium color-primary">
          Contato
        </p>
      </div>
      <div class="content_section">
        <div class="content_contact">
          <h2 class="font-family font-medium color-primary">
             <?php echo $nome_artistico; ?>
          </h2>
          <table class="table-left">
            <tr>
              <td>
                <img src="images/icon-fone.svg" />
              </td>
            </tr>
            <tr>
              <td>
                <img src="images/icon-maps.svg" />
              </td>
            </tr>
            <tr>
              <td>
                <img src="images/icon-email.svg" />
              </td>
            </tr>
          </table>
          <span class="after__table-left"><img alt="" src="images/after-redes.svg" /></span>
          <table class="table-right">
            <tr>
              <td class="font-family color-primary">
                <?php echo mask($tl_celular, "+## (##) #####-####"); ?>
              </td>
            </tr>
            <tr>
              <td class="font-family color-primary">
                <?php echo $endereco.", ".$bairro; ?>
              </td>
            </tr>
            <tr>
              <td class="font-family color-primary">
                <?php echo $email; ?>
              </td>
            </tr>
          </table>
          <h2 class="second-title__contact font-family font-medium color-primary">
            redes sociais
          </h2>
          <ul class="redes-icon__contact">
            <li>
              <img alt="" src="images/icon-face.svg" />
            </li>
            <li>
              <img alt="" src="images/icon-insta.svg" />
            </li>
            <li>
              <img alt="" src="images/icon-twitter.svg" />
            </li>
          </ul>
         <button class="button__contact button button__medium cursor">editar</button>
        </div>
      </div>
    </div>
  </div>
