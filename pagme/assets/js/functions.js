function acesso(pagina) {
  var dado = { pagina: pagina };
  jQuery.ajax({
    type: "POST",
    dataType: "html",
    url: "http://www.grupomagneto.com.br/magnetoelenco/pagme/registra_acesso.php",
    data: dado,
    success: function( data ) {
      event.preventDefault();
    }
  });
  return false;
}
