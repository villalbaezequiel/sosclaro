function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

function comprobarEmail(){

    if ($("#email_fanbag").val() == $("#email_fanbag_repeat").val()) {
        return true;
    }
    return false;

}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}


$(document).ready(function(){


     $("#connect-ml").click(function(e) {

         $( "#connect-ml" ).prop( "disabled", true );

         e.preventDefault();
          $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()} });

         $.ajax({
              type: "POST",
              url: window.origin + '/admin/meli/authentication',
              success: function(result) {
                  console.log(result);
                  localStorage.setItem('url', result);
                  $.ajax({
                      type: "GET",
                      url: result,
                      dataType : "jsonp",
                      corsDomain: true ,
                      headers: {
                          'Access-Control-Allow-Origin': '*',
                      },
                      beforeSend: function (xhr) {
                          xhr.setRequestHeader ("Authorization", "Basic " + btoa(""));
                      },
                      success: function(res) {
                          changeProductML();
                          console.log(res);
                      },
                      error: function(res) {
                          changeProductML();
                          console.log(res);

                      }
                  });
              },
              error: function(error) {
                  console.log(xhr.status + ": " + xhr.responseText);

                  console.log(error);
                  alert('error');
              }
          }).catch(function (er) {
             Swal.fire({
                 title: 'Se ha Producido un error! Por favor comuniquese con Soporte Tecnico. Gracias!',
                 type: 'info',
                 showCancelButton: false,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Aceptar'
             });
             console.log(er);
             return false;
         });

      });

     function changeProductML() {
         $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()} });
         $.ajax({
             type: "POST",
             url: $("#change-product-catalogo").attr('action'),
             data: { _method: 'POST', data: getFormData($("#change-product-catalogo")) },
             dataType: "json",
             success: function(data) {
                 if(data.status == 1){
                     window.location.href = window.origin+'/catalogo/producto/success_ml';
                 } else {
                     Swal.fire({
                         title: 'Se ha Producido un error! Por favor comuniquese con Soporte Tecnico. Gracias!',
                         type: 'info',
                         showCancelButton: false,
                         confirmButtonColor: '#3085d6',
                         cancelButtonColor: '#d33',
                         confirmButtonText: 'Aceptar'
                     });
                     return false;
                 }
             }
         });

     }

      $("#fanbagSubmit").click(function(event) {

          $( "#fanbagSubmit" ).prop( "disabled", true );

          if (!isEmail($("#email_fanbag").val())) {
              Swal.fire({
                  title: 'Debe ingresar un email válido. Por favor intente nuevamente.',
                  type: 'info',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Aceptar'
              });
              return false;
          }

          if (!isEmail($("#email_fanbag_repeat").val())) {
              Swal.fire({
                  title: 'Debe ingresar un email válido. Por favor intente nuevamente.',
                  type: 'info',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Aceptar'
              });
              return false;
          }

          if (!comprobarEmail()) {
              Swal.fire({
                  title: 'Los emails deben coincidir. Por favor intente nuevamente.',
                  type: 'info',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Aceptar'
              });
              return false;
          }

          event.preventDefault();

          $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()} });
          $.ajax({
              type: "POST",
              url: $("#change-product-catalogo").attr('action'),
              data: { _method: 'POST', data: getFormData($("#change-product-catalogo")) },
              dataType: "json",
              success: function(data)
              {

                  if(data.status == 1){
                      window.location.href = window.origin+'/catalogo/producto/success_fanbag?codigo=' + data.codigo_fanbag;
                  } else {
                      Swal.fire({
                          title: 'Se ha Producido un error! Por favor comuniquese con Soporte Tecnico. Gracias!',
                          type: 'info',
                          showCancelButton: false,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Aceptar'
                      });
                      return false;
                  }
              }
          })
              .catch(function (er) {
                  Swal.fire({
                      title: 'Se ha Producido un error! Por favor comuniquese con Soporte Tecnico. Gracias!',
                      type: 'info',
                      showCancelButton: false,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Aceptar'
                  });
                  console.log(er);
                  return false;
              });
      });




    $("#email_fanbag_repeat").on('paste', function(e){
        e.preventDefault();
        alert('Esta acción está prohibida');
    });

    $("#email_fanbag").on('copy', function(e){
        e.preventDefault();
        alert('Esta acción está prohibida');
    });


});
