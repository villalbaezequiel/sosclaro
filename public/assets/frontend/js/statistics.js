$(document).ready(function(){

  const months18 = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

  // RESULTADOS
  $.ajax({
      type: 'GET',
      url: '/estadisticas/results/'+id_user+'/'+type_user,
      dataType: 'json',
      success: function(data){

        var results = data.results;

        new Chart(document.getElementById("results"), {
            type: 'bar',
            data: {
              labels: months18,
              datasets: [
                {
                  label: "Puntos",
                  backgroundColor: ["#3e95cd", "#3cba9f","#3e95cd","#3cba9f","#3e95cd","#3cba9f", "#3e95cd","#3cba9f","#3e95cd","#3cba9f","#3e95cd","#3cba9f"],
                  data: Object.values(results)
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Evaluación de Puntos en "Resultados" según cada Mes relacionado a tu Agencia.'
              },
              onClick: function(c,i) {
                  e = i[0];
                  var x_value = this.data.labels[e._index];
                  var y_value = this.data.datasets[0].data[e._index];
                  console.log(x_value);
                  console.log(y_value);

                  // ajax

              }
            }
        });
      },
      error: function(xhr, status){
          console.log('Error: '+xhr);
      }
  });

  // BONUS TRACK
  $.ajax({
      type: 'GET',
      url: '/estadisticas/bonus_track/'+id_user+'/'+type_user,
      dataType: 'json',
      success: function(data){

        var results = data.results;

        new Chart(document.getElementById("bonus_track"), {
            type: 'bar',
            data: {
              labels: months18,
              datasets: [
                {
                  label: "Puntos",
                  backgroundColor: ["#3e95cd", "#3cba9f","#3e95cd","#3cba9f","#3e95cd","#3cba9f", "#3e95cd","#3cba9f","#3e95cd","#3cba9f","#3e95cd","#3cba9f"],
                  data: Object.values(results)
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Evaluación de Puntos en "Bonus Track" según cada Mes relacionado a tu Agencia.'
              },
              onClick: function(c,i) {
                  e = i[0];
                  var x_value = this.data.labels[e._index];
                  var y_value = this.data.datasets[0].data[e._index];
                  console.log(x_value);
                  console.log(y_value);

                  // ajax

              }
            }
        });
      },
      error: function(xhr, status){
          console.log('Error: '+xhr);
      }
  });

  // TOP 10, actual
  $.ajax({
      type: 'GET',
      url: '/estadisticas/top_then_puntos/'+id_user+'/'+type_user+'/actual',
      dataType: 'json',
      success: function(data){

        var results = data.results;
        var name = [];
        var puntos = [];

        $.each(results, function(i,v){
            name.push(v.name);
            puntos.push(v.puntos);
        });

        new Chart(document.getElementById("top_then_users"), {
          type: 'pie',
          data: {
            labels: name,
            datasets: [{
              label: "Vendedor, Puntos",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#FFB00D", "#C0E8E7","#223663","#FF0000","#635F56"],
              data: puntos
            }]
          },
          options: {
            title: {
              display: true,
              text: 'Rankig de Puntos Actual'
            }
          }
        });

      },
      error: function(xhr, status){
          console.log('Error: '+xhr);
      }
  });

  // TOP 10, history
  $.ajax({
      type: 'GET',
      url: '/estadisticas/top_then_puntos/'+id_user+'/'+type_user+'/history',
      dataType: 'json',
      success: function(data){

        var results = data.results;
        var name = [];
        var puntos = [];

        $.each(results, function(i,v){
            name.push(v.name);
            puntos.push(v.puntos);
        });

        new Chart(document.getElementById("top_then_history"), {
          type: 'pie',
          data: {
            labels: name,
            datasets: [{
              label: "Vendedor, Puntos",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#FFB00D", "#C0E8E7","#223663","#FF0000","#635F56"],
              data: puntos
            }]
          },
          options: {
            title: {
              display: true,
              text: 'Rankig de Puntos Historial'
            }
          }
        });

      },
      error: function(xhr, status){
          console.log('Error: '+xhr);
      }
  });


  // EXCHANJES
  $.ajax({
      type: 'GET',
      url: '/estadisticas/exchanges/'+id_user+'/'+type_user,
      dataType: 'json',
      success: function(data){

        var results = data.results;
        var products = [];
        var counts = [];

        $.each(results, function(i,v){
          if(v.count != 0){
            products.push(v.product);
            counts.push(v.count);
          }
        });

        new Chart(document.getElementById("exchanges_users"), {
            type: 'bar',
            data: {
              labels: products,
              datasets: [
                {
                  label: "Canjes",
                  // backgroundColor: ["#FF0000", "#635F56", "#FF0000", "#635F56", "#FF0000", "#635F56", "#FF0000", "#635F56", "#FF0000", "#635F56", "#FF0000", "#635F56", "#FF0000", "#635F56"],
                  backgroundColor: ["#3e95cd", "#3cba9f","#3e95cd","#3cba9f","#3e95cd","#3cba9f", "#3e95cd","#3cba9f","#3e95cd","#3cba9f","#3e95cd","#3cba9f"],
                  data: counts
                }
              ]
            },
            options: {
              legend: { display: false },
              title: {
                display: true,
                text: 'Cantidad de Canjes por Producto relacionado a tu Agencia.'
              },
              onClick: function(c,i) {
                  e = i[0];
                  var x_value = this.data.labels[e._index];
                  var y_value = this.data.datasets[0].data[e._index];
                  console.log(x_value);
                  console.log(y_value);

                  // ajax

              }
            }
        });
      },
      error: function(xhr, status){
          console.log('Error: '+xhr);
      }
  });

// ENCUESTAS
$.ajax({
    type: 'GET',
    url: '/estadisticas/guests/'+id_user+'/'+type_user,
    dataType: 'json',
    success: function(data){

      var results = data.results;

      $.each(results, function(i,v){



        new Chart($("#guests_users_"+i), {
          type: 'pie',
          data: {
            labels: ["Completas %", "Incompletas %"],
            datasets: [{
              backgroundColor: ["#3e95cd", "#3cba9f"],
              data: [v.completas,v.incompletas]
            }]
          },
          options: {
            title: {
              display: true,
              text: v.guest
            }
          }
        });
      });

    },
    error: function(xhr, status){
        console.log('Error: '+xhr);
    }
});


});
