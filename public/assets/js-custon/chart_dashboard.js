var peticion=''
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})

var url = $('#dashboar').data('url')
$.ajax({

     url:url[0],
     dataType:'json',
     async:false,
     success:function(rest){
     peticion=rest
     }


})

/*$.get(url).done(function(rest){
dameDato(rest)

})*/

function init_chart_doughnut(){

      if( typeof (Chart) === 'undefined'){ return; }

      console.log('init_chart_doughnut');

      if ($('.canvasDoughnut').length){

      var chart_doughnut_settings = peticion

          $('.canvasDoughnut').each(function(){

              var chart_element = $(this);
              var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);

          });

      }

  }
