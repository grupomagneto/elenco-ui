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

$(document).ready(function () {


    $(".for_review-mobile").click(function () {
        $(".for_hours-mobile").animate({
            marginLeft: "-1600px"
        }, 1000)

        $(".item-hours-mobile").animate({
            marginLeft: "0px"
        }, 1000)
    })


    $(".for_hours-mobile").click(function () {
        $(".item-shift-mobile").animate({
            marginLeft: "-1600px"
        }, 1000)

        $(".item-hours-mobile").animate({
            marginLeft: "0px"
        }, 1000)
    })

    $(".for_shift").click(function () {
        $(".item-weeks-mobile").animate({
            marginLeft: "-1600px"
        }, 1000)

        $(".item-shift-mobile").animate({
            marginLeft: "0px"
        }, 1000)
    })

    $(".for_weeks-mobile").click(function () {
        $(".item-shift-mobile").animate({
            marginLeft: "1600px"
        }, 1000)
        $(".item-weeks-mobile").animate({
            marginLeft: "0px"
        }, 1000)
    })
})

