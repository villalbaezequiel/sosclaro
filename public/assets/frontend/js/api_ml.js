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

        event.preventDefault();

        //disable the submit button
        $("#btnSubmit").attr("disabled", true);

        MELI.init({
            client_id: 5707152971206336,
            xauth_protocol: "https://",
            xauth_domain: "secure.mlstatic.com",
            xd_url: "/org-img/sdk/xd-1.0.4.html"
        });

        MELI.login(function() {
            MELI.get("/users/me", {}, function(dataMl) {
                var dataUser = dataMl[2];

                if(dataUser != null){
                    $("input[name=nickname_ml]").val(dataUser.nickname);
                    $("input[name=id_ml]").val(dataUser.id);
                    $("input[name=profile_ml]").val(dataUser.permalink);
                    $("input[name=email_ml]").val(dataUser.email);

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

                }
            });
        });
        
      })
  }

});
