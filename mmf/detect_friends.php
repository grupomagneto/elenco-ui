<?php
// SE O CANDIDATO 1 E O USUARIO SÃO AMIGOS NO FACEBOOK
if (isset($candidate_facebook_ID_1) && $candidate_facebook_ID_1 != NULL) {
	// EXECUTA A FUNÇÃO DE INTERSEÇÃO
	if (array_intersect_fixed($a1, $array_friends) == true) {
	  $friends1 = "Facebook Friends";
	}
	else {
	  $friends1 = "Not Friends";
	}
}
// CANDIDATO AINDA NÃO LOGOU NO JOGO E POR ISSO NÃO TEMOS CERTEZA
elseif (!isset($candidate_facebook_ID_1) || $candidate_facebook_ID_1 == NULL) {
	  $friends1 = "Unclear";
}
// SE O CANDIDATO 2 E O USUARIO SÃO AMIGOS NO FACEBOOK
if (isset($candidate_facebook_ID_2) && $candidate_facebook_ID_2 != NULL) {
	// EXECUTA A FUNÇÃO DE INTERSEÇÃO
	if (array_intersect_fixed($a2, $array_friends) == true) {
	  $friends2 = "Facebook Friends";
	}
	else {
	  $friends2 = "Not Friends";
	}
}
// CANDIDATO AINDA NÃO LOGOU NO JOGO E POR ISSO NÃO TEMOS CERTEZA
elseif (!isset($candidate_facebook_ID_2) || $candidate_facebook_ID_2 == NULL) {
	  $friends2 = "Unclear";
}
// SE O USUÁRIO ESCOLHEU UM AMIGO E ELE É O AMIGO
if (!empty($_SESSION['friend_ID']) && $_SESSION['friend_ID'] != NULL) {
  if (isset($candidate_elenco_ID_1) && $candidate_elenco_ID_1 == $_SESSION['friend_ID']) {
    $friends1 = "Chosen Friend";
  }
  elseif (isset($candidate_elenco_ID_2) && $candidate_elenco_ID_2 == $_SESSION['friend_ID']) {
    $friends2 = "Chosen Friend";
  }
}
// SE O USUÁRIO VEIO DE UM LINK DE UM SHARE E O CANDIDATO É O DO LINK
elseif (!empty($_SESSION['candidate_ID']) && $_SESSION['candidate_ID'] != NULL) {
  if (isset($candidate_elenco_ID_1) && $candidate_elenco_ID_1 == $_SESSION['candidate_ID']) {
    $friends1 = "From share";
  }
  elseif (isset($candidate_elenco_ID_2) && $candidate_elenco_ID_2 == $_SESSION['candidate_ID']) {
    $friends2 = "From share";
  }
}
// SE O USUÁRIO É CANDIDATO NO JOGO
if (!empty($_SESSION['voter_elenco_ID']) && $_SESSION['voter_elenco_ID'] != NULL) {
	if (!empty($_SESSION['voter_elenco_ID']) && $candidate_elenco_ID_1 == $_SESSION['voter_elenco_ID']) {
		$friends1 = "Self voter";
	}
		if (isset($candidate_elenco_ID_2)) {
			if (!empty($_SESSION['voter_elenco_ID']) && $candidate_elenco_ID_2 == $_SESSION['voter_elenco_ID']) {
			$friends2 = "Self voter";
		}
	}
}
?>