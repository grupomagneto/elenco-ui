<?php
require '../../_sys/conecta.php';
if(!session_id()) {
      session_start();
  }
date_default_timezone_set('America/Sao_Paulo');
$username = $_SESSION['ig_username'];
$ig_json = file_get_contents("https://www.instagram.com/".$username."/?__a=1");
$json_data = json_decode($ig_json, true);

// $_SESSION['ig_id']         = $json_data["user"]["id"];
// $_SESSION['ig_username']   = $json_data["user"]["username"];
// $_SESSION['ig_full_name']  = $json_data["user"]["full_name"];
// $_SESSION['ig_followers']  = $json_data["user"]["followed_by"]["count"];
// $_SESSION['ig_follows']    = $json_data["user"]["follows"]["count"];
// $_SESSION['ig_media']      = $json_data["user"]["media"]["count"];
$is_private                = $json_data["user"]["is_private"];

if ($is_private != 1) {
  $likes01 = $json_data["user"]["media"]["nodes"]["0"]["likes"]["count"];
  $likes02 = $json_data["user"]["media"]["nodes"]["1"]["likes"]["count"];
  $likes03 = $json_data["user"]["media"]["nodes"]["2"]["likes"]["count"];
  $likes04 = $json_data["user"]["media"]["nodes"]["3"]["likes"]["count"];
  $likes05 = $json_data["user"]["media"]["nodes"]["4"]["likes"]["count"];
  $likes06 = $json_data["user"]["media"]["nodes"]["5"]["likes"]["count"];
  $likes07 = $json_data["user"]["media"]["nodes"]["6"]["likes"]["count"];
  $likes08 = $json_data["user"]["media"]["nodes"]["7"]["likes"]["count"];
  $likes09 = $json_data["user"]["media"]["nodes"]["8"]["likes"]["count"];
  $likes10 = $json_data["user"]["media"]["nodes"]["9"]["likes"]["count"];
  $likes11 = $json_data["user"]["media"]["nodes"]["10"]["likes"]["count"];
  $likes12 = $json_data["user"]["media"]["nodes"]["11"]["likes"]["count"];
  $_SESSION['likes_avg'] = ($likes01+$likes02+$likes03+$likes04+$likes05+$likes05+$likes06+$likes07+$likes08+$likes09+$likes10+$likes11+$likes12)/12;
  $comments01 = $json_data["user"]["media"]["nodes"]["0"]["comments"]["count"];
  $comments02 = $json_data["user"]["media"]["nodes"]["1"]["comments"]["count"];
  $comments03 = $json_data["user"]["media"]["nodes"]["2"]["comments"]["count"];
  $comments04 = $json_data["user"]["media"]["nodes"]["3"]["comments"]["count"];
  $comments05 = $json_data["user"]["media"]["nodes"]["4"]["comments"]["count"];
  $comments06 = $json_data["user"]["media"]["nodes"]["5"]["comments"]["count"];
  $comments07 = $json_data["user"]["media"]["nodes"]["6"]["comments"]["count"];
  $comments08 = $json_data["user"]["media"]["nodes"]["7"]["comments"]["count"];
  $comments09 = $json_data["user"]["media"]["nodes"]["8"]["comments"]["count"];
  $comments10 = $json_data["user"]["media"]["nodes"]["9"]["comments"]["count"];
  $comments11 = $json_data["user"]["media"]["nodes"]["10"]["comments"]["count"];
  $comments12 = $json_data["user"]["media"]["nodes"]["11"]["comments"]["count"];
  $_SESSION['comments_avg'] = ($comments01+$comments02+$comments03+$comments04+$comments05+$comments05+$comments06+$comments07+$comments08+$comments09+$comments10+$comments11+$comments12)/12;
}
if (!empty($_SESSION['instagram_access_token'])) {
    $ig_id        = $_SESSION['ig_id'];
    $ig_username   = $_SESSION['ig_username'];
    $ig_link      = "https://www.instagram.com/".$ig_username;
    $ig_full_name = $_SESSION['ig_full_name'];
    $ig_media     = $_SESSION['ig_media'];
    $ig_followers = $_SESSION['ig_followers'];
    $ig_follows   = $_SESSION['ig_follows'];
    $ig_token     = $_SESSION['instagram_access_token'];
    $likes_avg    = $_SESSION['likes_avg'];
    $comments_avg = $_SESSION['comments_avg'];
    $nome_artistico = $ig_full_name;
    if (empty($_SESSION['id_elenco'])) {
    // CHECAR SE O IG_ID JÁ ESTÁ NO DB
      $sql = "SELECT id_elenco FROM tb_elenco WHERE instagram_ID = '$ig_id'";
      $result = mysqli_query($link, $sql);
      $row = mysqli_fetch_array($result);
      if (mysqli_fetch_array($result)) {
        $_SESSION['id_elenco'] = $row['id_elenco'];
      }
      // ADICIONA O IG ID
      if (!mysqli_fetch_array($result)) {
        $sql_2 = "SELECT id_elenco FROM tb_elenco WHERE nome_artistico = '$nome_artistico' LIMIT 1";
        $result = mysqli_query($link, $sql_2);
        $row = mysqli_fetch_array($result);
        if (!empty($row['id_elenco'])) {
          $id_elenco = $row['id_elenco'];
          $sql_3 = "UPDATE tb_elenco SET instagram_ID = '$ig_id', ig_link = '$ig_link', ig_seguindo_total = '$ig_follows', ig_seguidores_total = '$ig_followers', ig_total_posts = '$ig_media', ig_likes_avg = '$likes_avg', ig_comments_avg = '$comments_avg' WHERE id_elenco = '$id_elenco'";
          mysqli_query($link, $sql_3);
          $_SESSION['id_elenco'] = $row['id_elenco'];
        }
        // CRIA UM NOVO ID DE USUARIO
        else {
          mysqli_query($link, "INSERT INTO tb_elenco (instagram_ID, ig_link, ig_seguindo_total, ig_seguidores_total, ig_total_posts, ig_likes_avg, ig_comments_avg) VALUES ('$ig_id', '$ig_link', '$ig_follows', '$ig_followers', '$ig_media', '$likes_avg', '$comments_avg')");
          $_SESSION['id_elenco'] = mysqli_insert_id($link);
          $id_OLD = $_SESSION['id_elenco'];
          mysqli_query($link2, "INSERT INTO tb_elenco (id_elenco) VALUES ('$id_OLD')");
        }
      }
    }
    // SABENDO QUEM É O USUARIO, ASSOCIA UM ID DE INSTAGRAM A ELE
    if (!empty($_SESSION['id_elenco'])) {
      $id_elenco = $_SESSION['id_elenco'];
      $sql = "UPDATE tb_elenco SET instagram_ID = '$ig_id', ig_link = '$ig_link', ig_seguindo_total = '$ig_follows', ig_seguidores_total = '$ig_followers', ig_total_posts = '$ig_media', ig_likes_avg = '$likes_avg', ig_comments_avg = '$comments_avg' WHERE id_elenco = '$id_elenco'";
      mysqli_query($link, $sql);
    }
}
mysqli_close($link);
mysqli_close($link2);
header('Location: https://www.magnetoelenco.com.br/cadastro/cadastro.php');
?>
