$(document).ready(function(){

  const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

  // Creacion de Usuarios por Meses
  new Chart(document.getElementById("users_create"), {
      type: 'line',
      data: {
        labels: months,
        datasets: [
          {
            label: "Vendedores",
            borderColor: "#8e5ea2",
            data: [20,50,30,80,56,70,68,89,54,64,19,45,]
          }
        ]
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: 'Cantidad Total de Vendedores: 500'
        }
      }
  });

  // Resultados y BonusTrack, puntos por meses
  new Chart(document.getElementById("results_puntos"), {
      type: 'bar',
      data: {
        labels: months,
        datasets: [
          {
            label: "Puntos",
            backgroundColor: ["#3e95cd", "#3cba9f","#3e95cd","#3cba9f","#3e95cd","#3cba9f", "#3e95cd","#3cba9f","#3e95cd","#3cba9f","#3e95cd","#3cba9f"],
            data: [20,50,30,80,56,70,68,89,54,64,19,45,]
          }
        ]
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: 'Evaluación de Puntos segun Mes de Todos los Vendedores.'
        }
      }
  });

  // top 10 de los usuarios que mas puntos tienen actualmente
  new Chart(document.getElementById("top_then_users"), {
    type: 'pie',
    data: {
      labels: ["CARINA SCHEFFER	",
               "IVAN BARENGO",
               "German Ferrari",
               "PRISCILA TORRES",
               "JONATHAN EMMANUEL MARINI",
               "FABIÁN MOLINA",
               "LEONARDO ECHEVERRIA",
               "LEONARDO ECHEVERRIA",
               "NICOLAS LEDESMA",
               "TOMAS PANADEIRO"],
      datasets: [{
        label: "Vendedor, Puntos",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#FFB00D", "#C0E8E7","#223663","#FF0000","#635F56"],
        data: [2478,5267,734,784,433,1000,500,700,123,400]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Rankig Puntos'
      }
    }
  });

  // canjes realizados, Meses Vertical, Cantidad horizontal
  new Chart(document.getElementById("exchanges_users"), {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
          data: [2,3,5,1,3,1,3,4,3,9,2,12],
          label: "Moto C  XT1756 LTE T",
          borderColor: "#3e95cd",
          fill: false
        }, {
          data: [4,5,7,3,5,3,5,6,5,11,4,14],
          label: "Cafetera Oster 4401",
          borderColor: "#8e5ea2",
          fill: false
        }, {
          data: [0,1,3,0,9,5,3,2,1,7,0,9],
          label: "Pelota Oficial Original Mundial Rusia 2018",
          borderColor: "#3cba9f",
          fill: false
        }, {
          data: [4,6,8,5,14,10,8,7,6,12,5,14],
          label: "Set Matero Claro",
          borderColor: "#c45850",
          fill: false
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: ''
      }
    }
  });

  // Encuestas each
  // top 10 de los usuarios que mas puntos tienen actualmente
  new Chart(document.getElementById("guests_users_1"), {
    type: 'pie',
    data: {
      labels: ["Completas", "Incompletas"],
      datasets: [{
        label: "Vendedor, Puntos",
        backgroundColor: ["#3e95cd", "#3cba9f"],
        data: [78,25]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Intereses'
      }
    }
  });

  new Chart(document.getElementById("guests_users_2"), {
    type: 'pie',
    data: {
      labels: ["Completas", "Incompletas"],
      datasets: [{
        label: "Vendedor, Puntos",
        backgroundColor: ["#3e95cd", "#3cba9f"],
        data: [14,85]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Netshoes'
      }
    }
  });

  new Chart(document.getElementById("guests_users_3"), {
    type: 'pie',
    data: {
      labels: ["Completas", "Incompletas"],
      datasets: [{
        label: "Vendedor, Puntos",
        backgroundColor: ["#3e95cd", "#3cba9f"],
        data: [45,38]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Mercado Libre'
      }
    }
  });

});
