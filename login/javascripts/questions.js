//= require_tree .

var colors = new Array(
[165, 0, 200], [176, 116, 255], [255, 41, 129], [237, 107, 107], [201, 87, 222], [35, 188, 237]
);

var step = 0;
var colorIndices = [0,1,2,3];

var gradientSpeed = 0.001;

function updateGradient(container) {
  var c0_0 = colors[colorIndices[0]];
  var c0_1 = colors[colorIndices[1]];
  var c1_0 = colors[colorIndices[2]];
  var c1_1 = colors[colorIndices[3]];

  var istep = 1 - step;
  var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
  var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
  var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
  var color1 = "rgb("+r1+","+g1+","+b1+")";

  var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
  var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
  var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
  var color2 = "rgb("+r2+","+g2+","+b2+")";

  $(container).css({
    background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});

  step += gradientSpeed;
  if ( step >= 1 ) {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];

    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;

  }
}
setInterval(function(){updateGradient('.gradient')},10);

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mcep(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2")       
    return v
}


//  var yourInput = jQuery('#cep');
//     yourInput.keyup(function() {
//         yourInput.val((yourInput.val().replace(/[^\d]/g,'')))
// })   


var inputsCEP = $('#logradouro, #bairro, #localidade, #uf, #ibge');
var inputsRUA = $('#cep, #bairro, #ibge');
var validacep = /^[0-9]{8}$/;

function limpa_formulário_cep(valor) {
  if (valor !== undefined) {
    document.getElementById('txt_cep').innerHTML = 'CEP não encontrado.';
  }

  inputsCEP.val('');
}

function get(url) {

  $.get(url, function(data) {

    if (!("erro" in data)) {

      if (Object.prototype.toString.call(data) === '[object Array]') {
        var data = data[0];
      }

      $.each(data, function(nome, info) {
        $('#' + nome).val(nome === 'cep' ? info.replace(/^(\d{5})(\d)/,"$1-$2") : info).attr('info', nome === 'cep' ? info.replace(/\D/g, '') : info);
      });


    
    $('#txt_cep').css('display' ,'none');

    } else {
      limpa_formulário_cep(" ");
      $('#txt_cep').css('display' ,'block');
    }

  });
}

// Digitando RUA/CIDADE/UF
$('#logradouro, #localidade, #uf').on('blur', function(e) {

  if ($('#logradouro').val() !== '' && $('#logradouro').val() !== $('#logradouro').attr('info') && $('#localidade').val() !== '' && $('#localidade').val() !== $('#localidade').attr('info') && $('#uf').val() !== '' && $('#uf').val() !== $('#uf').attr('info')) {

    inputsRUA.val('...');
    get('https://viacep.com.br/ws/' + $('#uf').val() + '/' + $('#localidade').val() + '/' + $('#logradouro').val() + '/json/');
  }

});

// Digitando CEP
$('#cep').on('blur', function(e) {

  var cep = $('#cep').val().replace(/\D/g, '');

  if (cep !== "" && validacep.test(cep)) {

    inputsCEP.val('...');
    get('https://viacep.com.br/ws/' + cep + '/json/');

  } else {
    limpa_formulário_cep(cep == "" ? undefined : "Formato de CEP inválido.");
  }
});



//LANDSCAPE ANDROID
var isAndroid = navigator.userAgent.toLowerCase().indexOf("android") > -1; //&& ua.indexOf("mobile");
if(isAndroid) {
    document.write('<meta name="viewport" content="width=device-width,height='+window.innerHeight+', initial-scale=1.0">');
}




// SELECT

$('#dropdown').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden5'); 
    $this.wrap('<div class="select5"></div>');
    $this.after('<div class="select-styled5"></div>');

    var $styledSelect = $this.next('div.select-styled5');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options5'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active5').each(function(){
            $(this).removeClass('active').next('ul.select-options5').hide();
        });
        $(this).toggleClass('active').next('ul.select-options5').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));

        document.getElementById("form").submit();

        $list.hide();
        //console.log($this.val());
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});


$(window).load(function() {
  $("#cep").keyup(function() {
    if ($.trim(this.value).length > 7) {
     
    $('#btn').css('display' ,'block');
    $('#btn_img').css('display' ,'block');

    $('#txt_filhos').css('display' ,'none');

    } else {

    $('#btn').css('display' ,'none');
    $('#btn_img').css('display' ,'none');
    }
  });
});

document.getElementById('txt_filhos').innerHTML = '(digite 0 caso não tenha filhos)';

$(window).load(function() {
  $("#filhos").keyup(function() {
    if ($.trim(this.value).length > 1) {
     
    $('#btn').css('display' ,'block');
    $('#btn_img').css('display' ,'block');


    $('#txt_filhos').css('display' ,'block');

    } else {

    $('#txt_filhos').css('display' ,'block');

    $('#btn').css('display' ,'none');
    $('#btn_img').css('display' ,'none');
    }
  });
});


