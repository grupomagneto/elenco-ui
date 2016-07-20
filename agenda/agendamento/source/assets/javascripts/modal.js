$(".button-modal-agenda__premium").click(function() {
  $('#aviso-premium').modal('hide');
});

$(".button-modal-agenda__premium").click(function() {
  $('#aviso-gratuito').modal('hide');
});

$(".button-modal-agenda__profissional").click(function() {
  $('#aviso-profissional').modal('hide');
});

$(document).ready(function () {

    $("#for_a").click(function () {
        $("#item-one").animate({
            marginLeft: "-1600px"
        }, 1000)

        $("#item-two").animate({
            marginLeft: "0px"
        }, 1000)
    })

    $("#for_b").click(function () {
        $("#item-two").animate({
            marginLeft: "1600px"
        }, 1000)
        $("#item-one").animate({
            marginLeft: "0px"
        }, 1000)
    })
})
