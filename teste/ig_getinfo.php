<?php
$html = file_get_contents("https://www.instagram.com/vinigoulart/?__a=1");
// $html = file_get_contents("https://www.instagram.com/rhaoniaragao/?__a=1");
$data = json_decode($html, true);
echo "<pre>";
print_r($data);
exit();
echo "id: ".$data["user"]["id"];
echo "<BR />";
echo "followed_by: ".$data["user"]["followed_by"]["count"];
echo "<BR />";
echo "follows: ".$data["user"]["follows"]["count"];
echo "<BR />";
echo "full_name: ".$data["user"]["full_name"];
echo "<BR />";
echo "is_private: ".$data["user"]["is_private"];
echo "<BR />";
echo "username: ".$data["user"]["username"];
echo "<BR />";
echo "media: ".$data["user"]["media"]["count"];
echo "<BR />";
if ($data["user"]["is_private"] != 1) {
	$likes01 = $data["user"]["media"]["nodes"]["0"]["likes"]["count"];
	$likes02 = $data["user"]["media"]["nodes"]["1"]["likes"]["count"];
	$likes03 = $data["user"]["media"]["nodes"]["2"]["likes"]["count"];
	$likes04 = $data["user"]["media"]["nodes"]["3"]["likes"]["count"];
	$likes05 = $data["user"]["media"]["nodes"]["4"]["likes"]["count"];
	$likes06 = $data["user"]["media"]["nodes"]["5"]["likes"]["count"];
	$likes07 = $data["user"]["media"]["nodes"]["6"]["likes"]["count"];
	$likes08 = $data["user"]["media"]["nodes"]["7"]["likes"]["count"];
	$likes09 = $data["user"]["media"]["nodes"]["8"]["likes"]["count"];
	$likes10 = $data["user"]["media"]["nodes"]["9"]["likes"]["count"];
	$likes11 = $data["user"]["media"]["nodes"]["10"]["likes"]["count"];
	$likes12 = $data["user"]["media"]["nodes"]["11"]["likes"]["count"];
	$likes_media = ($likes01+$likes02+$likes03+$likes04+$likes05+$likes05+$likes06+$likes07+$likes08+$likes09+$likes10+$likes11+$likes12) / 12;
	echo "media_likes: ".$likes_media;
	echo "<BR />";

	$comments01 = $data["user"]["media"]["nodes"]["0"]["comments"]["count"];
	$comments02 = $data["user"]["media"]["nodes"]["1"]["comments"]["count"];
	$comments03 = $data["user"]["media"]["nodes"]["2"]["comments"]["count"];
	$comments04 = $data["user"]["media"]["nodes"]["3"]["comments"]["count"];
	$comments05 = $data["user"]["media"]["nodes"]["4"]["comments"]["count"];
	$comments06 = $data["user"]["media"]["nodes"]["5"]["comments"]["count"];
	$comments07 = $data["user"]["media"]["nodes"]["6"]["comments"]["count"];
	$comments08 = $data["user"]["media"]["nodes"]["7"]["comments"]["count"];
	$comments09 = $data["user"]["media"]["nodes"]["8"]["comments"]["count"];
	$comments10 = $data["user"]["media"]["nodes"]["9"]["comments"]["count"];
	$comments11 = $data["user"]["media"]["nodes"]["10"]["comments"]["count"];
	$comments12 = $data["user"]["media"]["nodes"]["11"]["comments"]["count"];
	$comments_media = ($comments01+$comments02+$comments03+$comments04+$comments05+$comments05+$comments06+$comments07+$comments08+$comments09+$comments10+$comments11+$comments12) / 12;
	echo "media_comments: ".$comments_media;
	echo "<BR />";
}
?>