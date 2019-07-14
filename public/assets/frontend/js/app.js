var myApp = {
  // Setup
  init: function() {
    myApp.responsiveMenu();
    myApp.sliders();
    myApp.sortCatalog();
    myApp.drawChart();
  },

  // Responsive burguer menu for mobile
  responsiveMenu: function() {
    var nav = $('.nav');
    var btn = $('.nav-toggle a');
    btn.on('click', function() {
      if (nav.hasClass('nav-open')) {
        nav.removeClass('nav-open');
      } else {
        nav.addClass('nav-open');
      }
    });
  },

  // Sliders
  // https://github.com/kenwheeler/slick/
  sliders: function() {
    $('.slider-home').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      autoplay: true,
      autoplaySpeed: 2000
    });

    $('.slider-single').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      dots: true,
      fade: false,
      prevArrow:
        '<button type="button" class="slick-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
      nextArrow:
        '<button type="button" class="slick-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>'
    });
  },

  // Catálogo
  // https://isotope.metafizzy.co/
  sortCatalog: function() {
    var $grid = $('#catalogo').isotope({
      getSortData: {
        puntos: '.puntos parseInt',
        nombre: function(item) {
          var nombre = $(item)
            .find('.card-title')
            .text();
          return nombre.toLowerCase();
        }
      }
    });

    // layout Isotope after each image loads
    $grid.imagesLoaded().progress(function() {
      $grid.isotope('layout');
    });

    // Ordenar
    $('#sortPuntosAsc').on('click', function(e) {
      $grid.isotope({
        sortBy: 'puntos',
        sortAscending: false
      });
      e.preventDefault();
    });

    $('#sortPuntosDesc').on('click', function(e) {
      $grid.isotope({
        sortBy: 'puntos',
        sortAscending: true
      });
      e.preventDefault();
    });

    $('#sortNombre').on('click', function(e) {
      $grid.isotope({
        sortBy: 'nombre',
        sortAscending: true
      });
      e.preventDefault();
    });

    // Filtrar
    $('#filterPuntos').change(function(e) {
      if (this.checked) {
        $grid.isotope({ filter: '.disponible' });
      } else {
        $grid.isotope({ filter: '*' });
      }
      e.preventDefault();
    });
  },

  drawChart: function() {
    // Any of the following formats may be used
    var ctx = document.getElementById('myChart');
    if (ctx) {
      console.log(ctx);
      var myChart = new Chart(ctx, {
        type: 'line',
        // usar sólo los ultimos 12 registros
        data: historialUsuario,
        options: {
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true
                }
              }
            ]
          }
        }
      });
    }
  }
};

// START
$(document).ready(myApp.init);
