<?php
if(!session_id()) {
	session_start();
}
include('functions.php');
$ip = $_SESSION['ip'];
$player_facebook_ID = $_SESSION['id'];
if (isset($_SESSION['friend_ID'])) { $friend_ID = $_SESSION['friend_ID']; }
if (isset($_SESSION['candidate_ID'])) { $friend_ID = $_SESSION['candidate_ID']; }
if (isset($_SESSION['share_ID'])) { $from_share_ID = $_SESSION['share_ID']; }
if (isset($_SESSION['game_ID'])) { $game_ID = $_SESSION['game_ID']; }

date_default_timezone_set("America/Sao_Paulo");
$hoje = date('Y-m-d H:i:s', time());
$hoje_format = date('Y-m-d_H-i-s', $hoje);

$sql_photo = "SELECT id, nome_artistico, arquivo FROM (SELECT id_elenco AS id, nome_artistico FROM tb_elenco) T1 INNER JOIN (SELECT cd_elenco AS id, arquivo FROM tb_foto WHERE cd_elenco = '$friend_ID' ORDER BY dh_cadastro ASC LIMIT 0, 1) T2 USING (id)";
$result01 = mysqli_query($link2, $sql_photo);
$row = mysqli_fetch_array($result01);
$photo = $row['arquivo'];
$name = $row['nome_artistico'];
$names = explode(" ", $name);
$name = $names[0];
$sql_share = "INSERT INTO tb_shares (type, from_share_ID, game_ID, candidate_ID, player_facebook_ID, media, timestamp, ip) VALUES ('out','$from_share_ID','$game_ID','$friend_ID','$player_facebook_ID','facebook','$hoje','$ip')";
mysqli_query($link2, $sql_share);
$id_share = mysqli_insert_id($link2);
mysqli_close($link2);

$photo_link = "http://www.magnetoelenco.com.br/fotos/".$photo;
$dest = imagecreatefrompng('images/share_images/_background.png');
$src = imagecreatefromjpeg($photo_link);

imagealphablending($dest, false);
imagesavealpha($dest, true);

imagecopymerge($dest, $src, 0, 0, 0, 0, 461, 461, 100);

$image_name = "images/share_images/".$id_share.".jpg";
imagejpeg($dest, $image_name);

imagedestroy($dest);
imagedestroy($src);

$fb_link = "https://www.facebook.com/dialog/feed?app_id=1267791739920152&ref=site&display=page&
name=$name precisa da sua ajuda para trabalhar
&caption=Marque seus amigos nos comentários
&description=Ajude a escolher quem participa das propagandas que você vê. Ajude votando e convidando seus amigos para votar também.
&picture=http://www.meumodelofavorito.com.br/mmf/$image_name
&link=http://www.meumodelofavorito.com.br/mmf/index.php?from_share_ID=$id_share
&redirect_uri=http://www.meumodelofavorito.com.br/mmf/success.php?from_share_ID=$id_share";

echo"<!DOCTYPE html><html><head><meta http-equiv='refresh' content='0;url=$fb_link'></head><body></body></html>";
?>