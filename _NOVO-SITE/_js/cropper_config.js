'use strict';

// vars
var result = document.querySelector('.result'),
    img_result = document.querySelector('.img-result'),
    img_w = 461,
    save = document.querySelector('.save'),
    cropped = document.querySelector('.cropped'),
    dwn = document.querySelector('.download'),
    upload = document.querySelector('#file-input'),
    instrucao = document.querySelector('.instrucao'),
    disabled = document.querySelector('.disabled'),
    comando = document.querySelector('.comando'),
    cropper = '';

// on change show image with crop options
upload.addEventListener('change', function (e) {
  if (e.target.files.length) {
    // start file reader
    var reader = new FileReader();
    reader.onload = function (e) {
      if (e.target.result) {
        // create new image
        var img = document.createElement('img');
        img.id = 'image';
        img.src = e.target.result;
        // clean result before
        result.innerHTML = '';
        disabled.classList.add('hide');
        comando.classList.add('hide');
        // append new image
        result.appendChild(img);
        // show save btn and options
        save.classList.remove('hide');
        instrucao.style.margin = '0';
        instrucao.innerHTML = 'Redimensione e alinhe os olhos';
        // init cropper
        cropper = new Cropper(img);
      }
    };
    reader.readAsDataURL(e.target.files[0]);
  }
});

// save on click
save.addEventListener('click', function (e) {
  e.preventDefault();
  // get result to data uri
  var imgSrc = cropper.getCroppedCanvas({
    width: img_w // input value
  }).toDataURL();
  // remove hide class of img
  cropped.classList.remove('hide');
  img_result.style.display = 'flex';
  result.style.display = 'none';
  // show image cropped
  cropped.src = imgSrc;
  dwn.classList.remove('hide');
  save.classList.add('hide');
  instrucao.innerHTML = 'OK! Clique para enviar';
  // console.log(imgSrc);
  dwn.addEventListener('click', function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "ajax/upload.php",
      data: { 
         imgBase64: imgSrc
      }
    }).done(function(o) {
      console.log('saved'); 
    });
  });
});