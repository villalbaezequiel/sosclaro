function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}

$(document).ready(function(){

  if($("input[name=is_voucher]").length != 0){

    $("#change-product-catalogo").submit(function(event) {

      //disable the submit button
      $("#btnSubmit").attr("disabled", true);

      event.preventDefault();

      var nickname = $("input[name=voucher_product]").val();

      /*axios.get('https://auth.mercadolibre.com.ar/authorization?response_type=token&client_id=5707152971206336')
          .then(function (response) {
              var seller = response.data;
              console.log (seller);
          }) */

        axios.post('https://auth.mercadolibre.com.ar/authorization?response_type=token&client_id=5707152971206336', {
            headers: {
                'Access-Control-Allow-Origin': '*',
            }
        }).then(function (response) {
            console.log('response is : ' + response.data);
        }).catch(function (error) {
            if (error.response) {
                console.log(error.response.headers);
            }
            else if (error.request) {
                console.log(error.request);
            }
            else {
                console.log(error.message);
            }
            console.log(error.config);
        });

      /*
      axios.get('https://api.mercadolibre.com/sites/MLA/search?nickname='+nickname)
      .then(function (response) {
        var seller = response.data.seller;

        if(seller != null){

          axios.get('https://api.mercadolibre.com/users/'+seller.id)
          .then(function (res) {
            var dataUsers = res.data;
            var profileUser = dataUsers.permalink;

            $("input[name=nickname_ml]").val(nickname);
            $("input[name=id_ml]").val(seller.id);
            $("input[name=profile_ml]").val(profileUser);

            $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $("input[name=_token]").val()} });
            $.ajax({
               type: "POST",
               url: $("#change-product-catalogo").attr('action'),
               data: { _method: 'POST', data: getFormData($("#change-product-catalogo")) },
               dataType: "json",
               success: function(data)
               {
                 if(data.status == 1){
                   window.location.href = window.origin+'/catalogo/producto/success_ml';
                 }
               }
           });

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


        } else {
          Swal.fire({
            title: 'Usuario de MercadoLibre Incorrecto',
            type: 'warning',
            html:
                '<p>¡Verifique sus <a target="_blank" href="https://myaccount.mercadolibre.com.ar/profile">"Datos de cuenta"</a> de MercadoLibre!</p>'+
                '<p>Nota: <em>Su Nickname se encuentra en la sección "Datos de cuenta", y es la información de "Usuario".</em></p>'+
                '<p>Su Nickname se puede modificar <a target="_blank" href="https://myaccount.mercadolibre.com.ar/profile/changeNickName">aquí</a></p>',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
          });
        }

      })
      .catch(function (error) {
        Swal.fire({
          title: 'Se ha Producido un error! Por favor comuniquese con Soporte Tecnico. Gracias!',
          type: 'info',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Aceptar'
        });
        console.log(error);
        return false;
      });*/

    });

  }

});
