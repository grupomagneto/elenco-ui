window.onload = function () {

  'use strict';

  var Exif = window.Exif;
  var URL = window.URL || window.webkitURL;
  // var checkbox = document.getElementsByClassName('docs-checkbox')[0];
  var preview = document.getElementsByClassName('docs-preview')[0];
  // var dropzone = document.getElementsByClassName('docs-dropzone')[0];
  // var showcase = document.getElementsByClassName('docs-showcase')[0];
  var fileInput = document.getElementsByTagName('file-input')[0];
  var options = {
        done: function (tags) {
          var segments = [];
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
              if (tag == 'Orientation') {
                var orientation = tags[tag];
                console.log("Orientação: "+orientation);
                // giraImagem(orientation);
                // alert(orientation);
                // img.style.transform = ORIENT_TRANSFORMS[ getOrientation(fileInput) ];
              }
              if (tag == 'DateTime') {
                var datetime = tags[tag];
                console.log("Data e Hora: "+datetime);
              }
            }
          }
          // showcase.innerHTML = '<p>' + segments.join('</p><p>') + '</p>';
        },
        
        fail: function (message) {
          // showcase.innerHTML = '<p>' + message + '</p>';
        }
      };

  function readExif() {
    return new Exif(preview.getElementsByTagName('img')[0], options);
  }

  function readExifFromFile(file) {
    var image;

    if (file.type === 'image/jpeg') {
      if (URL) {
        image = new Image();

        image.onload = function () {
          this.onload = null;
          URL.revokeObjectURL(file);
        };

        image.src = URL.createObjectURL(file);

        // Clear existing image
        preview.innerHTML = '';

        preview.appendChild(image);
      }

      // Clear chosen file
      fileInput.value = '';

      // Clear previous Exif tags
      // showcase.innerHTML = '';

      return new Exif(file, options);
    } else {
      window.alert('Por favor envie uma imagem JPEG.');
    }
  }

  readExif();

  // checkbox.onchange = function (e) {
  //   var target = e.target;

  //   options[target.name] = target.checked;
  //   readExif();
  // };

  fileInput.onchange = function (e) {
    var files = e.target.files;

    if (files && files.length) {
      readExifFromFile(files[0]);
    }
  };

  dropzone.ondragover = function (e) {
    e.preventDefault();
  };

  dropzone.ondrop = function (e) {
    var files = e.dataTransfer.files;

    e.preventDefault();

    if (files && files.length) {
      readExifFromFile(files[0]);
    }
  };
};
