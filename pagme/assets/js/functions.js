function acesso(pagina) {
  var dado = { pagina: pagina };
  jQuery.ajax({
    type: "POST",
    dataType: "html",
    url: "http://pagme.magnetoelenco.com.br/registra_acesso.php",
    data: dado,
    success: function( data ) {
      event.preventDefault();
    }
  });
  return false;
}
