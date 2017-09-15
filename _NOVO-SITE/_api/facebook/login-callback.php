<?php

require 'bootstrap.php';

  $helper = $fb->getRedirectLoginHelper();

  $_SESSION['FBRLH_state']=$_GET['state'];


  try {
      $accessToken = $helper->getAccessToken();
  } catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
  }

  if (isset($accessToken)) {
    // Logged in!
      $_SESSION['facebook_access_token'] = (string) $accessToken;

      if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

        try {
            $response = $fb->get('/me?fields=email,first_name,gender,id,last_name,link,friends,birthday');
            $userNode = $response->getGraphUser();
            // $userNode = $response->getGraphObject(GraphUser::className());
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $Response = $fb->get('/me?fields=email,first_name,gender,id,last_name,link,friends,birthday', $_SESSION['facebook_access_token']);
        $user = $Response->getGraphUser();
        $_SESSION['id'] = $user->getId();
        $_SESSION['firstname'] = $user->getFirstName();
        $_SESSION['lastname'] = $user->getLastName();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['link'] = $user->getLink();
        $_SESSION['dt_nascimento'] = $user->getProperty('birthday')->format('Y-m-d');
        $_SESSION['friends'] = $user->getProperty('friends');
        $_SESSION['total_count'] = $user->getProperty('friends')->getTotalCount();
        $_SESSION['nome_artistico'] = $_SESSION['firstname']." ".$_SESSION['lastname'];
        $sexo = $user->getGender();
        if ($sexo == "male") {
          $sexo = "M";
          $_SESSION['sexo'] = "M";
        }
        if ($sexo == "female") {
          $sexo = "F";
          $_SESSION['sexo'] = "F";
        }

        require '../../_sys/conecta.php';
        require 'vendor/autoload.php';
        require 'ids.php';

        try {
          $fb = new Facebook\Facebook([
          'app_id' => $app_id,
          'app_secret' => $app_secret
          ]);

          if (!empty($_SESSION['facebook_access_token'])) {
            // CHECAR SE O FB_ID JÁ ESTÁ NO DB
            $fb_id = $_SESSION['id'];
            $dt_nascimento = $_SESSION['dt_nascimento'];
            $nome_artistico = $_SESSION['firstname']." ".$_SESSION['lastname'];
            // if ($_SESSION['sexo'] == "male") {
            //   $sexo = "M";
            //   $_SESSION['sexo'] = "M";
            // }
            // if ($_SESSION['sexo'] == "female") {
            //   $sexo = "F";
            //   $_SESSION['sexo'] = "F";
            // }
            if (empty($_SESSION['id_elenco'])) {
              $sql = "SELECT id_elenco FROM tb_elenco WHERE facebook_ID = '$fb_id'";
              $result = mysqli_query($link, $sql);
              $row = mysqli_fetch_array($result);
              if (mysqli_fetch_array($result)) {
                $_SESSION['id_elenco'] = $row['id_elenco'];
              }
              // ADICIONA O FB ID
              if (!mysqli_fetch_array($result)) {
                // CHECA SE JÁ EXISTE O EMAIL CADASTRADO
                $email = $_SESSION['email'];
                $fb_link = $_SESSION['link'];
                $fb_total_friends = $_SESSION['total_count'];
                $sql_2 = "SELECT id_elenco FROM tb_elenco WHERE email = '$email' ORDER BY dt_nascimento ASC LIMIT 1";
                $result = mysqli_query($link, $sql_2);
                $row = mysqli_fetch_array($result);
                if (!empty($row['id_elenco'])) {
                  $id_elenco = $row['id_elenco'];
                  $sql_3 = "UPDATE tb_elenco SET facebook_ID = '$fb_id', fb_link = '$fb_link', fb_total_friends = '$fb_total_friends' WHERE id_elenco = '$id_elenco'";
                  mysqli_query($link, $sql_3);
                  $_SESSION['id_elenco'] = $row['id_elenco'];
                }
                // CRIA UM NOVO ID DE USUARIO
                else {
                  mysqli_query($link, "INSERT INTO tb_elenco (facebook_ID, email, fb_link, fb_total_friends) VALUES ('$fb_id', '$email', '$fb_link', '$fb_total_friends')");
                  $_SESSION['id_elenco'] = mysqli_insert_id($link);
                  $id_OLD = $_SESSION['id_elenco'];
                  mysqli_query($link2, "INSERT INTO tb_elenco (id_elenco, email) VALUES ('$id_OLD', '$email')");
                }
              }
            }
            // SABENDO QUEM É O USUARIO, ASSOCIA UM ID DE FACEBOOK A ELE
            if (!empty($_SESSION['id_elenco'])) {
              $id_elenco = $_SESSION['id_elenco'];
              $sql = "UPDATE tb_elenco SET facebook_ID = '$fb_id', fb_link = '$fb_link', fb_total_friends = '$fb_total_friends' WHERE id_elenco = '$id_elenco'";
              mysqli_query($link, $sql);
            }
          }
        }
        catch (Exception $e) {
          echo 'Erro: '.$e->getMessage();
        }

        header('location: https://www.magnetoelenco.com.br/cadastro/cadastro.php');

      } else {
        header('location: https://www.magnetoelenco.com.br/cadastro/index.php');
    }
  }
mysqli_close($link);
mysqli_close($link2);
?>
