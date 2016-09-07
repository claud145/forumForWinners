/*! =========================================================
 *
 * Material Kit PRO - V1.0.0
 *
 * =========================================================
 *
 * Copyright 2016 Creative Code Srl
 * Available with purchase of license from http://www.creative-tim.com/product/material-kit-pro
 *
 * ========================================================= */
 $.fn.extend({
     animateCss: function (animationName) {
         var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
         $(this).addClass('animated ' + animationName).one(animationEnd, function() {
             $(this).removeClass('animated ' + animationName);
         });
     }
 });
var transparent = true;

var transparentDemo = true;
var fixedTop = false;

var navbar_initialized = false;

$(document).ready(function(){
  $('#total_user').text($('#sectors_quantity option:selected').val());

  $('#sectors_select').change(function(){
    $('#list-detail').text($("#sectors_select option:selected").text());
  });

  $('#sectors_quantity').change(function(){
    $('#list-quantity').text($("#sectors_quantity option:selected").text());
    $('#total_user').text($('#sectors_quantity option:selected').val());

  });
  var cout = 0;
  var assistants_add = '';

  $('#addUsers').click(function(){
    if (!$('#userName').val()) {
      alert("Necesita agregar el Nombre Completo");
    }else {
      var quantity = $('#sectors_quantity option:selected').val();
      var userName = $('#userName').val();
      if (quantity > cout) {
        $('#list-users').append("<li><h4 class='card-title'><p><span id='numberUser'> #"+($('#list-users li').size() + 1) +" </span>"+userName+"</p></h4></li>");
        assistants_add = assistants_add+'['+ userName +']';
        $('#assistants').val(assistants_add);
        $('#userName').val('');
        cout = cout+1;
      }
      else {
        alert('Llego al limite de usuarios');
      }
    }
  });

  $('#tabNameNext').click(function(e){
    var quantity = $('#sectors_quantity option:selected').val();
    var countlist = $('#list-users li').size();
    if (quantity > countlist) {
      alert("Faltan agregar los asistentes");
    }
    else {
      e.preventDefault();
        $('#item_history').html("<a href='#history' data-toggle='tab' aria-expanded='false'>Finalizar<div class='ripple-container'></div></a>");
        $('#mytabs a[href="#history"]').tab('show');
        $('#item_updates').html("<a>Completado</a>");
    }
  });

  function sample() {
    $('#laoding').modal('show');
  }
  $('.btn-reload').click(function(){
     location.reload();
  });

  function sampleFinal() {
    window.open($("#comprar").attr('href'))
    $('#smallAlertModalFinal').modal('hide');
  }

  $('#comprar').click(function(event) {
      $('#smallAlertModalFinal').modal('show');
     setTimeout(sampleFinal, 4000);
  });
//<a id="btn_home" href="#home" data-toggle="tab" aria-expanded="true">Paso 1 --></a>
//<a href="#updates" data-toggle="tab" aria-expanded="false">Paso 2 --><div class="ripple-container"></div></a>
//<a href="#history" data-toggle="tab" aria-expanded="false">Finalizar<div class="ripple-container"></div></a>

  //CHANGE TABS
  $('#tabNext').click(function(e){
  	e.preventDefault();
      $('#item_updates').html("<a href='#updates' data-toggle='tab' aria-expanded='false'>Paso 2 --><div class='ripple-container'></div></a>");
      $('#mytabs a[href="#updates"]').tab('show');
      $('#item_home').html("<a>Completado</a>");
   });


  $('#siguiente').click(function(event) {
      $('#smallAlertModal').modal('show');
     setTimeout(sample, 4000);
  });

  $('#registrarTigo').click(function(){
    if (!$('#transaction_name_tigomoney').val() || !$('#transaction_phone_tigomoney').val() || !$('#transaction_nit_tigomoney').val()) {
        alert("Se necesita, Nombre, Telefono, Nit");
    }
    else {
      var data_name = $('#transaction_name_tigomoney').val();
      var data_user_id = $('#user_id').val();
      var data_nit = $('#transaction_nit_tigomoney').val();
      var data_phone = $('#transaction_phone_tigomoney').val();
      var data_sector = $('#sectors_select').val();
      var data_sector_price = $('#'+$('#sectors_select').val()+'').attr('name');
      var data_quantity = $('#sectors_quantity option:selected').val();
      var data_total = (data_quantity * data_sector_price);
      var data_route = 'http://localhost:8000/transaction';
      var data_assistants = $("#assistants").val();
      var data_payment = 'tigo_money';
      var token = $('#token').val();
      $('#modal_tigomoney').modal('hide');
      $('#loading').modal('show');
      $.ajax({
        url: data_route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data: {transaction_user: data_user_id,
              transaction_name: data_name,
              transaction_nit: data_nit,
              transaction_phone: data_phone,
              transaction_sector: data_sector,
              transaction_total: data_total,
              sector_price: data_sector_price,
              sector_quantity: data_quantity,
              transaction_assistants: data_assistants,
              payment_type: data_payment},
        success:function(){
          $('#typeSale').text('Compra');
          $('#loading').modal('hide');
          $('#congratulation').modal('show');
        },
        error: function (data) {
          $('#loading').modal('hide');
          $('#error').modal('show');
          var dataAux = '';
          // console.log(data.responseJSON['sector_quantity']);
          $.each( data.responseJSON, function( index, value ){
              for (var i = 0; i < value.length; i++) {
                dataAux = dataAux + value[i];
              }
          });
          $('#error_coment').html("Ocurrio algun problema. Vuelva a intentarlo. <br>"+ dataAux);
         }
      });
    }
  });
  $('#registrarMultipago').click(function(){
    if (!$('#transaction_name_multipago').val() || !$('#transaction_nit_multipago').val()) {
        alert("Se necesita, Nombre, Nit");
    }
    else {
      var data_name = $('#transaction_name_multipago').val();
      var data_user_id = $('#user_id').val();
      var data_nit = $('#transaction_nit_multipago').val();
      var data_phone = $('#transaction_phone_multipago').val();
      var data_sector = $('#sectors_select').val();
      var data_sector_price = $('#'+$('#sectors_select').val()+'').attr('name');
      var data_quantity = $('#sectors_quantity option:selected').val();
      var data_total = (data_quantity * data_sector_price);
      var data_assistants = $("#assistants").val();
      var data_payment = 'multipago';
      var data_route = 'http://localhost:8000/transaction';
      var token = $('#token').val();
      $('#modal_multipago').modal('hide');
      $('#loading').modal('show');
      $.ajax({
        url: data_route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'POST',
        dataType: 'json',
        data: {transaction_user: data_user_id,
              transaction_name: data_name,
              transaction_nit: data_nit,
              transaction_phone: data_phone,
              transaction_sector: data_sector,
              transaction_total: data_total,
              sector_price: data_sector_price,
              sector_quantity: data_quantity,
              transaction_assistants: data_assistants,
              payment_type: data_payment},
        success:function(data){
          $('#typeSale').text('Reserva');
          console.log(data.mensaje);
          $('#loading').modal('hide');
          $('#congratulation').modal('show');
        },
        error: function (data) {
          $('#loading').modal('hide');
          $('#error').modal('show');
          var dataAux = '';
          // console.log(data.responseJSON['sector_quantity']);
          $.each( data.responseJSON, function( index, value ){
              for (var i = 0; i < value.length; i++) {
                dataAux = dataAux + value[i];
              }
          });
          $('#error_coment').html("Ocurrio algun problema. Vuelva a intentarlo. <br>"+ dataAux);
       }
      });
    }
  });

  $('#multipago').click(function(){
    if ($('#sectors_select').val() == $('#'+$('#sectors_select').val()+'').val()) {
      $('#transaction_name_multipago').prop('disabled', false);
      $('#transaction_nit_multipago').prop('disabled', false);

      $("#sectors-detail").text('Sector: '+$('#sectors_select option:selected').text()+' - '+$('#'+$('#sectors_select').val()+'').attr('name')+'Bs. Unidad');
      $("#sector-quantity").text('Cantidad: '+$('#sectors_quantity option:selected').text()+' Entradas');
      $("#transaction-total").text('Total: '+($('#sectors_quantity option:selected').text()*$('#'+$('#sectors_select').val()+'').attr('name'))+'Bs.')
      var splt = $("#assistants").val().split('[');
      for (var i = 0; i < splt.length; i++) {
        $(".assistants_list").append("<p>"+splt[i].substring(0,splt[i].length-1)+"</p>");
      }
      $("#sectors-detail-congratulation").text('Sector: '+$('#sectors_select option:selected').text()+' - '+$('#'+$('#sectors_select').val()+'').attr('name')+'Bs. Unidad');
      $("#sector-quantity-congratulation").text('Cantidad: '+$('#sectors_quantity option:selected').text()+' Entradas');
      $("#transaction-total-congratulation").text('Total: '+($('#sectors_quantity option:selected').text()*$('#'+$('#sectors_select').val()+'').attr('name'))+'Bs.')
    }
  });




  $('#tigomoney').click(function(){
    if ($('#sectors_select').val() == $('#'+$('#sectors_select').val()+'').val()) {
      $('#transaction_name_tigomoney').prop('disabled',false);
      $('#transaction_nit_tigomoney').prop('disabled',false);
      $('#transaction_phone_tigomoney').prop('disabled',false);

      $("#sectors-detail-tigo").text('Sector: '+$('#sectors_select option:selected').text()+' - '+$('#'+$('#sectors_select').val()+'').attr('name')+'Bs. Unidad');
      $("#sector-quantity-tigo").text('Cantidad: '+$('#sectors_quantity option:selected').text()+' Entradas');
      $("#transaction-total-tigo").text('Total: '+($('#sectors_quantity option:selected').text()*$('#'+$('#sectors_select').val()+'').attr('name'))+'Bs.');
      var splt = $("#assistants").val().split('[');
      for (var i = 0; i < splt.length; i++) {
        $(".assistants_list").append("<p>"+splt[i].substring(0,splt[i].length-1)+"</p>");
        console.log(splt[i]);
      }

      $("#sectors-detail-congratulation").text('Sector: '+$('#sectors_select option:selected').text()+' - '+$('#'+$('#sectors_select').val()+'').attr('name')+'Bs. Unidad');
      $("#sector-quantity-congratulation").text('Cantidad: '+$('#sectors_quantity option:selected').text()+' Entradas');
      $("#transaction-total-congratulation").text('Total: '+($('#sectors_quantity option:selected').text()*$('#'+$('#sectors_select').val()+'').attr('name'))+'Bs.')
    }
  });

  $('.btn-cancel').click(function(){
    $(".assistants_list").html('');

    $('#transaction_name_multipago').prop('disabled', true);
    $('#transaction_nit_multipago').prop('disabled', true);

    $('#transaction_name_tigomoney').prop('disabled',true);
    $('#transaction_nit_tigomoney').prop('disabled',true);
    $('#transaction_phone_tigomoney').prop('disabled',true);


  });
    // Init Material scripts for buttons ripples, inputs animations etc, more info on the next link https://github.com/FezVrasta/bootstrap-material-design#materialjs
    $.material.init();

    window_width = $(window).width();

    //  Activate the Tooltips
    $('[data-toggle="tooltip"], [rel="tooltip"]').tooltip();

    // Activate Datepicker
    if($('.datepicker').length != 0){
        $('.datepicker').datepicker({
             weekStart:1
        });
    }

    //    Activate bootstrap-select
    $(".select").dropdown({ "dropdownClass": "dropdown-menu", "optionClass": "" });

    // Activate Popovers
    $('[data-toggle="popover"]').popover();

    // Active Carousel
	$('.carousel').carousel({
      interval: 400000
    });

    //Activate tags
    if($(".tagsinput").length != 0){
        $(".tagsinput").tagsInput();
    }

    if($('.navbar-color-on-scroll').length != 0){
        $(window).on('scroll', materialKit.checkScrollForTransparentNavbar)
    }

    if (window_width >= 768){
        big_image = $('.page-header[data-parallax="active"]');
        if(big_image.length != 0){
            $(window).on('scroll', materialKitDemo.checkScrollForParallax);
        }

    }

});

materialKit = {
    misc:{
        navbar_menu_visible: 0
    },

    checkScrollForTransparentNavbar: debounce(function() {
            if($(document).scrollTop() > 260 ) {
                if(transparent) {
                    transparent = false;
                    $('.navbar-color-on-scroll').removeClass('navbar-transparent');
                }
            } else {
                if( !transparent ) {
                    transparent = true;
                    $('.navbar-color-on-scroll').addClass('navbar-transparent');
                }
            }
    }, 17),

    initSliders: function(){
        // Sliders for demo purpose
        $('#sliderRegular').noUiSlider({
            start: 40,
            connect: "lower",
            range: {
                min: 0,
                max: 100
            }
        });

        $('#sliderDouble').noUiSlider({
            start: [20, 60] ,
            connect: true,
            range: {
                min: 0,
                max: 100
            }
        });
    }
}


var big_image;

materialKitDemo = {

    checkScrollForParallax: debounce(function(){
        if(isElementInViewport(big_image)){
            var current_scroll = $(this).scrollTop();

            oVal = ($(window).scrollTop() / 3);
            big_image.css({
                'transform':'translate3d(0,' + oVal +'px,0)',
                '-webkit-transform':'translate3d(0,' + oVal +'px,0)',
                '-ms-transform':'translate3d(0,' + oVal +'px,0)',
                '-o-transform':'translate3d(0,' + oVal +'px,0)'
            });
        }
    }, 4),

    initContactUsMap: function(){
        var myLatlng = new google.maps.LatLng(44.433530, 26.093928);
        var mapOptions = {
          zoom: 14,
          center: myLatlng,
          styles:
[{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}],
          scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
        }
        var map = new google.maps.Map(document.getElementById("contactUsMap"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Hello World!"
        });
        marker.setMap(map);
    },

    initContactUs2Map: function(){
        var lat = 44.433530;
        var long = 26.093928;

        var centerLong = long - 0.025;

        var myLatlng = new google.maps.LatLng(lat,long);
        var centerPosition = new google.maps.LatLng(lat, centerLong);

        var mapOptions = {
          zoom: 14,
          center: centerPosition,
          styles:
[{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}],
          scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
        }
        var map = new google.maps.Map(document.getElementById("contactUs2Map"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title:"Hello World!"
        });
        marker.setMap(map);
    },

    initSharrre: function(){
        $('#twitter').sharrre({
          share: {
            twitter: true
          },
          enableHover: false,
          enableTracking: true,
          enableCounter: false,
          buttons: { twitter: {via: 'CreativeTim'}},
          click: function(api, options){
            api.simulateClick();
            api.openPopup('twitter');
          },
          template: '<i class="fa fa-twitter"></i> Twitter',
          url: 'http://demos.creative-tim.com/material-kit-pro/presentation.html'
        });

        $('#facebook').sharrre({
          share: {
            facebook: true
          },
          enableHover: false,
          enableTracking: true,
          enableCounter: false,
          click: function(api, options){
            api.simulateClick();
            api.openPopup('facebook');
          },
          template: '<i class="fa fa-facebook-square"></i> Facebook',
          url: 'http://demos.creative-tim.com/material-kit-pro/presentation.html'
        });

        $('#google').sharrre({
          share: {
            googlePlus: true
          },
          enableCounter: false,
          enableHover: false,
          enableTracking: true,
          click: function(api, options){
            api.simulateClick();
            api.openPopup('googlePlus');
          },
          template: '<i class="fa fa-google-plus"></i> Google',
          url: 'http://demos.creative-tim.com/material-kit-pro/presentation.html'
        });

    }

}
// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};


function isElementInViewport(elem) {
    var $elem = $(elem);

    // Get the scroll position of the page.
    var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html');
    var viewportTop = $(scrollElem).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    // Get the position of the element on the page.
    var elemTop = Math.round( $elem.offset().top );
    var elemBottom = elemTop + $elem.height();

    return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
}



(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-46172202-1', 'auto');
ga('send', 'pageview');
