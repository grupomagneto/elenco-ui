<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';

if(!session_id()) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//se usuario está logado
    //exibo os dados desse usuário
//senão
    //se eu ja tenho $_GET['code'] e $_GET['state']
        //então eu armazeno o access token
    //se não eu crio o link de login

try {
    $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);

    if (!empty($_SESSION['facebook_access_token'])) {

        $user = $fb->User()->get($_SESSION['facebook_access_token']);
        // echo '<pre>';
        // var_dump($user = $fb->User()->get($_SESSION['facebook_access_token']));

        $_SESSION['id'] = $user->getId();
        $_SESSION['firstname'] = $user->getFirstName();
        $_SESSION['lastname'] = $user->getLastName();
        $_SESSION['gender'] = $user->getGender();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['link'] = $user->getLink();
        $_SESSION['birthday'] = $user->getProperty('birthday')->format('Y-m-d');
        $_SESSION['friends'] = $user->getProperty('friends');
        $_SESSION['total_count'] = $user->getProperty('friends')->getTotalCount();

        require_once 'colect_data.php';

        require_once 'warning.php';

    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
            // header('location: /home.php');
        } else {
            $url = $fb->Login()->url('http://www.meumodelofavorito.com.br/index.php');
            header('location: '.$url.'');
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
/**
 * Caso não goste de métodos mágicos:
 *
 * $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);
 * $user = new WebDevBr\Facebook\Actions\User($fb);
 * $user->get();
 */
?>
