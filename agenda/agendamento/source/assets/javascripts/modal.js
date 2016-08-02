$(".button-modal-agenda__premium").click(function() {
  $('#aviso-premium').modal('hide');
});

$(".button-modal-agenda__premium-mobile").click(function() {
  $('#aviso-premium_mobile').modal('hide');
});

$(".button-modal-agenda__gratuito").click(function() {
  $('#aviso-gratuito').modal('hide');
});

$(".button-modal-agenda__profissional").click(function() {
  $('#aviso-profissional').modal('hide');
});

$(document).ready(function() {
    $('.carousel').each(function(){
        $(this).carousel({
            interval: false
        });
    });
});​



