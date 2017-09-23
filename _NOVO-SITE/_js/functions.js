// Converte em maiusculas palavras com mais de 2 caracteres
function ucFirstAllWords( str )
{
    var pieces = str.split(" ");
    for ( var i = 0; i < pieces.length; i++ ){
	    var pedaco = pieces[i];
		var c = 2;
	    if (c < pedaco.length){
	        var j = pieces[i].charAt(0).toUpperCase();
	        pieces[i] = j + pieces[i].substr(1);
	    }
	    else {
	    	pieces[i] = pieces[i].toLowerCase();
	    }
    }
    return pieces.join(" ");
}
// AVANÇA PARA O PRÓXIMO INPUT QUANDO ATINGIR O MÁXIMO DE CARACTERES PERMITIDO
$(".inputs").keyup(function () {
  if (this.value.length == this.maxLength) {
    $(this).next('.inputs').focus();
  }
});
// Formata data e define a timezone
function formataData(dataCompleta){
  var data = new Date(dataCompleta);
  var dataOk = new Date( data.getTime() + Math.abs(data.getTimezoneOffset()*60000) );
  var dd = dataOk.getDate();
  var mm = dataOk.getMonth()+1; //January is 0!
  var yyyy = dataOk.getFullYear();
  if(dd<10){
    dd='0'+dd;
  }
  if(mm<10){
    mm='0'+mm;
  }
  var dataOk = dd+'/'+mm+'/'+yyyy;
  return dataOk;
}
// Formata data e define a timezone
function formataData2(dataCompleta){
  var data = new Date(dataCompleta);
  var dataOk = new Date( data.getTime() + Math.abs(data.getTimezoneOffset()*60000) );
  var dd = dataOk.getDate();
  var mm = dataOk.getMonth()+1; //January is 0!
  var yyyy = dataOk.getFullYear();
  if(dd<10){
    dd='0'+dd;
  }
  if(mm<10){
    mm='0'+mm;
  }
  var dataOk = yyyy+'-'+mm+'-'+dd;
  return dataOk;
}
// Calcula Idade
function getAge(dateString) {
  var today = new Date();
  var birthDate = new Date(dateString);
  if (dateString != "") {
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }
  } else {
    var age = "empty";
  }
  return age;
}
// Valida a Data para que seja no passado
function checarDataPassado(valorData){
  var valorData = new Date(valorData);
  if (Object.prototype.toString.call(valorData) === "[object Date]") {
    // it is a date
    var dataOk = formataData2(valorData);
    var today = formataData2(new Date());
    if (isNaN(valorData.getTime())) {
        // Date is not valid
        var dataOk = "Invalid Date";
        return dataOk;
    } else {
      // Date is valid and is in the past
      if (dataOk < today) {
        return dataOk;
      }
      // Date is in the past
      else {
        var dataOk = "Invalid Date";
        return dataOk;
      }
    }
  }
  else {
    // not a date
    var dataOk = "Invalid Date";
    return dataOk;
  }
}
// Valida CPF
/*!
*   Gerador e Validador de CPF v3.1.1
*   http://tiagoporto.github.io/gerador-validador-cpf
*   Copyright (c) 2014-2016 Tiago Porto (http://tiagoporto.com)
*   Released under the MIT license
*/
var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };
/**
 * CPF Class
 *
 * generate function
 * @param  {string} param      Formatting option
 * @return {string}            Valid and formatted CPF
 *
 * validate function
 * @param  {string} value      The value for validation
 * @return {boolean}           True = valid || False = invalid
 *
 * format function
 * @param  {string} value      The value for formatting
 * @param  {string} param      Formatting option
 *
 * @return {string}            Formatted CPF || error message
 */
/* eslint-env node */
(function () {
    'use strict';
    var root = (typeof self === 'undefined' ? 'undefined' : _typeof(self)) === 'object' && self.self === self && self || (typeof global === 'undefined' ? 'undefined' : _typeof(global)) === 'object' && global.global === global && global || this;
    var CPF = function CPF() {};
    if (typeof exports !== 'undefined' && !exports.nodeType) {
        if (typeof module !== 'undefined' && !module.nodeType && module.exports) {
            exports = module.exports = CPF;
        }
        exports.CPF = CPF;
    } else {
        root.CPF = CPF;
    }
    function calcChecker1(firstNineDigits) {
        var sum = null;
        for (var j = 0; j < 9; ++j) {
            sum += firstNineDigits.toString().charAt(j) * (10 - j);
        }
        var lastSumChecker1 = sum % 11;
        var checker1 = lastSumChecker1 < 2 ? 0 : 11 - lastSumChecker1;
        return checker1;
    }
    function calcChecker2(cpfWithChecker1) {
        var sum = null;
        for (var k = 0; k < 10; ++k) {
            sum += cpfWithChecker1.toString().charAt(k) * (11 - k);
        }
        var lastSumChecker2 = sum % 11;
        var checker2 = lastSumChecker2 < 2 ? 0 : 11 - lastSumChecker2;
        return checker2;
    }
    function formatCPF(value, formatter) {
        var digitsSeparator = '.',
            checkersSeparator = '-';
        if (formatter === 'digits') {
            digitsSeparator = '';
            checkersSeparator = '';
        } else if (formatter === 'checker') {
            digitsSeparator = '';
            checkersSeparator = '-';
        }
        if (value.length > 11) {
            return 'The value contains error. Has more than 11 digits.';
        } else if (value.length < 11) {
            return 'The value contains error. Has fewer than 11 digits.';
        } else {
            return value.slice(0, 3) + digitsSeparator + value.slice(3, 6) + digitsSeparator + value.slice(6, 9) + checkersSeparator + value.slice(9, 11);
        }
    }
    CPF.generate = function (param) {
        var firstNineDigits = '';
        // Generating the first 9 digits of the CPF
        for (var i = 0; i < 9; ++i) {
            firstNineDigits += Math.floor(Math.random() * 9) + '';
        }
        var checker1 = calcChecker1(firstNineDigits);
        var generatedCPF = firstNineDigits + checker1 + calcChecker2(firstNineDigits + checker1);
        return formatCPF(generatedCPF, param);
    };
    CPF.validate = function (value) {
        var cleanCPF = value.replace(/\.|\-|\s/g, ''),
            firstNineDigits = cleanCPF.substring(0, 9),
            checker = cleanCPF.substring(9, 11);
        if (cleanCPF.length !== 11) {
            return false;
        }
        // Checking if all digits are equal
        for (var i = 0; i < 10; i++) {
            if ('' + firstNineDigits + checker === Array(12).join(i)) {
                return false;
            }
        }
        var checker1 = calcChecker1(firstNineDigits);
        var checker2 = calcChecker2(firstNineDigits + '' + checker1);
        if (checker.toString() === checker1.toString() + checker2.toString()) {
            return true;
        } else {
            return false;
        }
    };
    CPF.format = function (value, param) {
        var getCPF = value.replace(/[^\d]/g, '');
        return formatCPF(getCPF, param);
    };
    return CPF;
})();
$(function(){
  function validCPF (cpf) {
    return cpf.match(/^\d{3}\.?\d{3}\.?\d{3}\-?\d{2}$/);
  }
  $(".cpf").mask("000.000.000-00");
  $.bipbopDefaults.automaticLoader = false;
  $('#cpf-maior').keyup(function() {
    if ($.trim(this.value).length == 14) {
      var cpf = $(this).val();
      if (validCPF(cpf) && /^\d{2}\/\d{2}\/\d{4}$/) {
        if ( CPF.validate($(this).val()) === true ) {
          $('.ok').show();
          $.bipbop("SELECT FROM 'BIPBOPJS'.'CPFCNPJ'", BIPBOP_FREE, {
            data: {
                documento: cpf
            },
            success: function(data) {
                var nome = $(data).find("body nome").text();
                nome = nome.toLowerCase();
                mensagem = ucFirstAllWords(nome);
                $('.valido').show();
                $('.invalido').hide();
                // $('.ok').show();
                $('.status').show();
                $(".status").text(mensagem);
                $("#nome-cpf_value").val(mensagem);
            }
          });
        } else {
          var mensagem = 'CPF inválido!';
          $('.invalido').show();
          $('.valido').hide();
          $('.ok').hide();
          $('.status').show();
          $(".status").text(mensagem);
        }
      }
    }
    else {
      $('.status').hide();
      $('.invalido').hide();
      $('.valido').hide();
      $('.ok').hide();
    }
  });
  $('#cpf-menor-value').keyup(function() {
    if ($.trim(this.value).length == 14) {
      var cpf = $(this).val();
      if (validCPF(cpf) && /^\d{2}\/\d{2}\/\d{4}$/) {
        if ( CPF.validate($(this).val()) === true ) {
          $('.ok').show();
          $.bipbop("SELECT FROM 'BIPBOPJS'.'CPFCNPJ'", BIPBOP_FREE, {
            data: {
                documento: cpf
            },
            success: function(data) {
                var nome = $(data).find("body nome").text();
                nome = nome.toLowerCase();
                var mensagem = ucFirstAllWords(nome);
                var res = mensagem.split(" ");
                if (res[1] == "de") {
                  var nome_artistico = res[0] + " " + res[2];
                }
                else {
                  var nome_artistico = res[0] + " " + res[1];
                }
                $('.valido').show();
                $('.invalido').hide();
                // $('.ok').show();
                $('.status').show();
                $(".status").text(mensagem);
                $("#nome-cpf_value_menor").val(mensagem);
                $("#nome-artistico_value_menor").val(nome_artistico);
            }
          });
        } else {
          var mensagem = 'CPF inválido!';
          $('.invalido').show();
          $('.valido').hide();
          $('.ok').hide();
          $('.status').show();
          $(".status").text(mensagem);
        }
      }
    }
    else {
      $('.status').hide();
      $('.invalido').hide();
      $('.valido').hide();
      $('.ok').hide();
    }
  });
});
// Checa se o celular está correto
$('.input_celular').keyup(function() {
	$(".input_celular").mask("0 0000 0000");
	if ($.trim(this.value).length == 11 && $(".input_ddd").val() == "") {
		var mensagem_ddd = 'Por favor informe o DDD';
		$(".status").text(mensagem_ddd);
		$('.status').show();
		$('.celular-sem-ddd').show();
	} if ($.trim(this.value).length == 11 && $(".input_ddd").val().length == 2) {
		$('.ok').show();
	} if ($.trim(this.value).length < 11) {
		$('.ok').hide();
	}
});
$('.input_ddd').keyup(function() {
	$('.status').hide();
	$('.celular-sem-ddd').hide();
	if ($(".input_celular").val().length == 11 && $.trim(this.value).length == 2) {
		$('.ok').show();
	}
	 if ($.trim(this.value).length < 2) {
		$('.ok').hide();
	}
});
// Checa se o CEP está correto
function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        var endereco = (conteudo.logradouro);
        var bairro = (conteudo.bairro);
        var cidade = (conteudo.localidade);
        var uf = (conteudo.uf);
        var mensagem = bairro + " - " + cidade + " - " + uf;
        // console.log(mensagem);
        $('.ok').show();
        $(".status").text(mensagem);
        $("#bairro_value").val(bairro);
        $("#cidade_value").val(cidade);
        $("#uf_value").val(uf);
        $("#endereco_value").val(endereco);
        $("#confirma-endereco").html(endereco);
        $("#confirma-bairro").html(bairro);
        $("#confirma-cidade-uf").html(cidade + "-" + uf);
		$('.status').show();
		$('.valido').show();
    } //end if.
    else {
        //CEP não Encontrado.
        $('.ok').hide();
        var mensagem = "CEP não encontrado";
        $(".status").text(mensagem);
		$('.status').show();
		$('.invalido').show();
        // console.log(mensagem);
        // alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');
    //Verifica se campo cep possui valor informado.
    if (cep != "") {
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;
        //Valida o formato do CEP.
        if(validacep.test(cep)) {
            //Cria um elemento javascript.
            var script = document.createElement('script');
            //Sincroniza com o callback.
            script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        } //end if.
        else {
            //cep é inválido.
            $('.ok').hide();
            // alert("Formato de CEP inválido.");
            var mensagem = "Formato de CEP inválido";
	        $(".status").text(mensagem);
    			$('.status').show();
    			$('.invalido').show();
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        $('.ok').hide();
    }
};
$('.cep').keyup(function() {
	$(".cep").mask("00.000-000");
	if ($.trim(this.value).length == 10) {
		var cep = $(".cep").val();
		pesquisacep(cep);
    $('.ok').show();
    $('#confirma-cep').html(cep);
	} if ($.trim(this.value).length < 10) {
		$('.ok').hide();
		$('.status').hide();
		$('.valido').hide();
		$('.invalido').hide();
	}
});
$('#numero-cartao-de-credito').keyup(function() {
  $("#numero-cartao-de-credito").mask("0000 0000 0000 0000");
});
$('#validade-cartao').keyup(function() {
  $("#validade-cartao").mask("00/00");
});
// Formata os selects
$(".select-dropdown").each(function(){
  var $this = $(this);
  var numberOfOptions = $(this).children("option").length;
  $this.addClass("select-dropdown-hidden");
  $this.wrap("<div class='select-dropdown'></div>");
  $this.after("<div class='select-dropdown-styled'></div>");
  var $styledSelect = $this.next("div.select-dropdown-styled");
  $styledSelect.text($this.children("option").eq(0).text());
  var $list = $("<ul />", {
      "class": "select-dropdown-options"
  }).insertAfter($styledSelect);
  for (var i = 0; i < numberOfOptions; i++) {
      $("<li />", {
          text: $this.children("option").eq(i).text(),
          rel: $this.children("option").eq(i).val()
      }).appendTo($list);
  }
  var $listItems = $list.children("li");
  $styledSelect.click(function(e) {
      e.stopPropagation();
      $("div.select-dropdown-styled.active").each(function(){
          $(this).removeClass("active").next("ul.select-dropdown-options").hide();
      });
      $(this).toggleClass("active").next("ul.select-dropdown-options").toggle();
  });
  $listItems.click(function(e) {
      e.stopPropagation();
      $styledSelect.text($(this).text()).removeClass("active");
      $this.val($(this).attr("rel"));
      $list.hide();
      //console.log($this.val());
  });
  $(document).click(function() {
      $styledSelect.removeClass("active");
      $list.hide();
  });
});
$(document).ready(function(){
  $(".cel").mask("0 0000 0000");
  var mascara = function() {
  if (window.matchMedia('(min-width: 1024px)').matches) {
    var ua = navigator.userAgent.toLowerCase();
    if (ua.indexOf('safari') != -1) {
      if (ua.indexOf('chrome') > -1) {

      } else {
        $('.data').mask('00/00/0000');
      }
    }
  } else {
   $('.data').unmask();
  }
};
$(window).resize(mascara);
  mascara();
});
