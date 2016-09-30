<?php

$query_info = "SELECT * FROM tb_voters WHERE facebook_ID = '$id'";
$result = mysqli_query($link2, $query_info);
$row = mysqli_fetch_array($result);

$question1	= $row['transportation'];
$question2 	= $row['scholarity'];
$question3	= $row['cep'];
$question4	= $row['pet'];
$question5 	= $row['physical_activity'];
$question6 	= $row['tech_level'];
$question7	= $row['social_network'];
$question8 	= $row['music'];
$question9 	= $row['children'];
$question10 = $row['diet'];
$question11	= $row['traveling'];
$question12	= $row['destinations'];
$question13	= $row['grastronomy'];
$question14 = $row['occupation'];
$question15 = $row['relationship_status'];

$page1	= "transportation";
$page2 	= "scholarity";
$page3	= "cep";
$page4	= "pet";
$page5 	= "physical_activity";
$page6 	= "tech_level";
$page7	= "social_network";
$page8 	= "music";
$page9 	= "children";
$page10 = "diet";
$page11	= "traveling";
$page12	= "destinations";
$page13	= "grastronomy";
$page14 = "occupation";
$page15 = "relationship_status";

$max 	 = 15;

if (!isset($_SESSION['answers'])) {
	$_SESSION['answers'] = 2;
}
?>