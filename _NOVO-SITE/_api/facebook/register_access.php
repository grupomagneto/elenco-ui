<?php

require 'vendor/autoload.php';
require 'ids.php';

if(!session_id()) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
     $fb = new Facebook\Facebook([
    'app_id' => $app_id,
    'app_secret' => $app_secret
    ]);


    if (!empty($_SESSION['facebook_access_token'])) {

        // $user = $fb->User()->get($_SESSION['facebook_access_token']);


        $Response = $fb->get('/me?fields=email,first_name,gender,id,last_name', $_SESSION['facebook_access_token']);
        $user = $Response->getGraphUser();
        $_SESSION['id'] = $user->getId();
        $_SESSION['firstname'] = $user->getFirstName();
        $_SESSION['lastname'] = $user->getLastName();
        $_SESSION['gender'] = $user->getGender();
        $_SESSION['email'] = $user->getEmail();
        echo "<pre>";
        print_r($_SESSION['id']);
        print_r($_SESSION['firstname']);
        print_r($_SESSION['lastname']);
        print_r($_SESSION['gender']);
        print_r($_SESSION['email']);

        exit();
        // $_SESSION['id'] = $user->getId();
        // $_SESSION['firstname'] = $user->getFirstName();
        // $_SESSION['lastname'] = $user->getLastName();
        // $_SESSION['gender'] = $user->getGender();
        // $_SESSION['email'] = $user->getEmail();
        // echo "<pre>";
        // print_r($_SESSION['friends']);
        // // exit();
        // $id                 = $_SESSION['id'];
        // $firstname          = $_SESSION['firstname'];
        // $lastname           = $_SESSION['lastname'];
        // $email              = $_SESSION['email'];
        // $sex                = $_SESSION['gender'];

// ACESSO REGISTRADO, SEGUE PARA PRÓXIMA ETAPA
header('location: http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/cadastro.php');
} else {
    if (!empty($_GET['code']) and !empty($_GET['state'])) {
        $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();

        header('location: http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/cadastro.php');
        
    } else {
        $url = $fb->Login()->url('http://localhost:8888/elenco-ui/_NOVO-SITE/cadastro/');
        header('location: '.$url.'');
    }
}
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}
?>
