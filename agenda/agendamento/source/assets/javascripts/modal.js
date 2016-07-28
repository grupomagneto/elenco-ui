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

    $(".for_hours").click(function () {
        $(".item-weeks").animate({
            marginLeft: "-1600px"
        }, 1000)

        $(".item-hours").animate({
            marginLeft: "0px"
        }, 1000)
    })

    $(".for_weeks").click(function () {
        $(".item-hours").animate({
            marginLeft: "1600px"
        }, 1000)
        $(".item-weeks").animate({
            marginLeft: "0px"
        }, 1000)
    })
})
