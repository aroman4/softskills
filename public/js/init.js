$(document).ready(function() {
   /*  $('.collapsible').collapsible({
      accordion: false
    });
    
    $('select').material_select();
  
    $('.modal-trigger').leanModal(); */
  
    $(document).on('click', '.delete-option', function() {
      $(this).parent(".input-field").remove();
    });
  
    // will replace .form-g class when referenced
    var material = '<div class="input-field list-group-item input-g">' +
      '<input name="opcion[]" id="opcion[]" type="text" class="form-control">' +
      '<span style="float:right; cursor:pointer;"class="delete-option btn btn-danger">Borrar opción</span>' +
      '<span class="add-option btn btn-success" style="cursor:pointer;">Añadir opción</span>' +
      '</div>';
  
    // for adding new option
    $(document).on('click', '.add-option', function() {
      $(".form-g").append(material);
    });
    // allow for more options if radio or checkbox is enabled
    $(document).on('change', '#tipo_pregunta', function() {
      var selected_option = $('#tipo_pregunta :selected').val();
      if (selected_option === "radio" || selected_option === "checkbox") {
        $(".form-g").html(material);
      } else {
        $(".input-g").remove();
      }
    });
  });
//menu de los investigadores
$('.menu-bar').on('click', function(){
  $('.contenido').toggleClass('abrir');
})