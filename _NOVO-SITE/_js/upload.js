window.onload = function () {

'use strict';

// EXTRAI INFO DO EXIF
var Exif = window.Exif;
var options = {
      done: function (tags) {
        // var segments = [];
        var tag;
        for (tag in tags) {
          if (tags.hasOwnProperty(tag)) {
            // segments.push(console.log("tag: "+tag+"tags[tag]: "+tags[tag]));
            if (tag == 'Make') {
              var make = tags[tag];
              console.log("Fabricante: "+make);
            }
            if (tag == 'Model') {
              var model = tags[tag];
              console.log("Modelo: "+model);
            }
            if (tag == 'DateTime') {
              var datetime = tags[tag];
              console.log("Data e Hora: "+datetime);
            }
            if (tag == 'Flash') {
              var flash = tags[tag];
              console.log("Flash: "+flash);
            }
            if (tag == 'GPSLatitudeRef') {
              var GPSLatitudeRef = tags[tag];
              console.log("Latitude: "+GPSLatitudeRef);
            }
            if (tag == 'GPSLatitude') {
              var GPSLatitude = tags[tag];
              console.log("Lat Nº: "+GPSLatitude);
            }
            if (tag == 'GPSLongitudeRef') {
              var GPSLongitudeRef = tags[tag];
              console.log("Longitude: "+GPSLongitudeRef);
            }
            if (tag == 'GPSLongitude') {
              var GPSLongitude = tags[tag];
              console.log("Lon Nº: "+GPSLongitude);
            }
            if (tag == 'GPSAltitude') {
              var GPSAltitude = tags[tag];
              console.log("Altitude: "+GPSAltitude);
            }
          }
        }
      },
      fail: function (message) {
        // showcase.innerHTML = '<p>' + message + '</p>';
      }
    };

function readExifFromFile(file) {
  return new Exif(file, options);
}

// UPLOAD FOTO SORRINDO
// CROPPER VARS
var result = document.querySelector('#result'),
    img_result = document.querySelector('#img-result'),
    img_w = 461,
    save = document.querySelector('#save'),
    cropped = document.querySelector('#cropped'),
    dwn = document.querySelector('#btn_sorrindo-enviar'),
    upload = document.querySelector('#file-input'),
    instrucao = document.querySelector('#instrucao'),
    disabled = document.querySelector('#disabled'),
    comando = document.querySelector('#comando'),
    foto = document.querySelector('#foto'),
    cropper = '';

// on change show image with crop options
upload.addEventListener('change', function (e) {
  var files = e.target.files;
  if (e.target.files.length) {
    // Read EXIF from file
    readExifFromFile(files[0]);
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
         imgBase64: imgSrc,
         tipo: foto.value,
         timestamp: ,
         dt_foto: ,
         camera: make + " " + model,
         flash: flash,
         coordenadas: ,
         altitude: GPSAltitude
      }
    }).done(function(o) {
      // console.log('saved');
    });
  });
});

// UPLOAD FOTO SERIO
// CROPPER VARS
var result2 = document.querySelector('#result-2'),
    img_result2 = document.querySelector('#img-result-2'),
    img_w2 = 461,
    save2 = document.querySelector('#save-2'),
    cropped2 = document.querySelector('#cropped-2'),
    dwn2 = document.querySelector('#btn_serio-enviar'),
    upload2 = document.querySelector('#file-input-2'),
    instrucao2 = document.querySelector('#instrucao-2'),
    disabled2 = document.querySelector('#disabled-2'),
    comando2 = document.querySelector('#comando-2'),
    foto2 = document.querySelector('#foto-2'),
    cropper2 = '';

// on change show image with crop options
upload2.addEventListener('change', function (e) {
  var files2 = e.target.files;
  if (e.target.files.length) {
    // Read EXIF from file
    readExifFromFile(files2[0]);
    // start file reader
    var reader2 = new FileReader();
    reader2.onload = function (e) {
      if (e.target.result) {
        // create new image
        var img2 = document.createElement('img');
        img2.id = 'image2';
        img2.src = e.target.result;
        // clean result before
        result2.innerHTML = '';
        disabled2.classList.add('hide');
        comando2.classList.add('hide');
        // append new image
        result2.appendChild(img2);
        // show save btn and options
        save2.classList.remove('hide');
        instrucao2.style.margin = '0';
        instrucao2.innerHTML = 'Redimensione e alinhe os olhos';
        // init cropper
        cropper2 = new Cropper(img2);
      }
    };
    reader2.readAsDataURL(e.target.files[0]);
  }
});

// save on click
save2.addEventListener('click', function (e) {
  e.preventDefault();
  // get result to data uri
  var imgSrc2 = cropper2.getCroppedCanvas({
    width: img_w2 // input value
  }).toDataURL();
  // remove hide class of img
  cropped2.classList.remove('hide');
  img_result2.style.display = 'flex';
  result2.style.display = 'none';
  // show image cropped
  cropped2.src = imgSrc2;
  dwn2.classList.remove('hide');
  save2.classList.add('hide');
  instrucao2.innerHTML = 'OK! Clique para enviar';
  // console.log(imgSrc);
  dwn2.addEventListener('click', function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "ajax/upload.php",
      data: { 
         imgBase64: imgSrc2,
         tipo: foto2.value
      }
    }).done(function(o) {
      // console.log('saved');
    });
  });
});

};