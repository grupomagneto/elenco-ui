
      <div class="title-section">
        <p class="avenir white small text-align-left uppercase">
          daniela souza
        </p>
      </div>

      <div class="content_section">
        <div class="content_contact">
          <h2 class="avenir small white">
             <?php echo $nome_artistico; ?>
          </h2>
          <table class="table-left">
            <tr>
              <td>
                <img src="../_images/icon-fone.svg" />
              </td>
            </tr>
            <tr>
              <td>
                <img src="../_images/icon-maps.svg" />
              </td>
            </tr>
            <tr>
              <td>
                <img src="../_images/icon-email.svg" />
              </td>
            </tr>
          </table>
          <span class="after__table-left"><img alt="" src="../_images/after-redes.svg" /></span>
          <table class="table-right">
            <tr>
              <td class="avenir small white">
                <?php echo $_SESSION['tl_celular']  = $row['tl_celular']; ?>
                <!-- +55 61 99311-0767 -->
              </td>
            </tr>
            <tr>
              <td class="avenir small white">
                <!-- São Sebastião, Brasília, DF -->
                <?php echo $_SESSION['bairro']  = $row['bairro']; ?>
              </td>
            </tr>
            <tr>
              <td class="avenir small white">
                <?php echo $_SESSION['email']  = $row['email']; ?>
                <!-- daniela.souza@gmail.com -->
              </td>
            </tr>
          </table>
          </div>
       </div>
