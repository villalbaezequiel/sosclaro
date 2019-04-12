$(document).ready(function(){

  MELI.init({ client_id: 8175887529615074 });

  $("#change-product-catalogo").submit(function(event) {
    event.preventDefault();

    var nickname = $("input[name=voucher_product]").val();

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

          document.getElementById("change-product-catalogo").submit()

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
    });

  });

});
