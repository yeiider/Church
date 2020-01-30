@include('../thema.header')

<div class="right_col" role="main">
    <div class="">

<!-- Main -->

      <div class="clearfix">
<script>
    function pulsar(e){
     tecla=(document.all)?e.keyCode :e.which;
    return (tecla!=13)
    }
}</script>


            <div class="col-sm-5 col-md-5">
            <form action="{{route('diezmo-registrar')}}" onsubmit="return false;" id="form" method="post" class="form" style="margin-top:10%">
                <div class="form-group row">
                    <label class="label-align" for="buscar"><h3>Buscar Diezmante</h3>
                    </label>

                    <input type="text" id="buscar" onsubmit="return false;" onkeypress="return pulsar(event)" name="nombre"   required="required" aria-describedby="basic-addon2" class="form-control col-sm-8 col-md-8" style="border-radius:15px" />
                    <span class="input-group-addon btn-primary " style="border-radius:15px" id="basic-addon2"><i class="glyphicon glyphicon-search"></i></span>
                  </div>
                  {{ csrf_field() }}
                  <div class="dropdown-divider"></div>
                  <div class="form-group row">
                   <h4>Informacion de Diezmante</h4>

                   <div class="dropdown-divider"></div>

                   <div id="rest">

                     <p>
                   </div>
                  </div>



               </form>
            </div>
            <h5 style=" color:#000000; "><strong>Nota!:</strong>Solo se mostraran el diezmo del dia de hoy!</h5>
            <div class="col-sm-6 col-md-6" style="margin-top:5%;" >
                @if(session('success'))
                <div class="alert alert-success alert-dismissible" role="alert"><p style="font-size:17px"><strong>{{session('success')}}!</strong></p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button></div>
                    @endif
                    @if(session('duplicado'))
                    <div class="alert alert-danger  alert-dismissible" role="alert"><p style="font-size:17px"><strong>{{session('duplicado')}}!</strong></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button></div>
                        @endif
           <table class="table table-bordered table-hover" >
              <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Valor</th>
                  </tr>

              </thead>
              <tbody>
                  <?php $total =0;?>
                  @foreach ($data['diezmos'] as $d)
                  <tr>
                  <td>{{$d->miembro->nombres .' ' .$d->miembro->apellidos}}</td>
                  <td>{{$d->fecha}}</td>
                  <td>${{number_format($d->valor,2,',','.') }}</td>

                  </tr>
                  <?php $total+=$d->valor;?>
                  @endforeach
                  <tr>
                      <td colspan="2"><strong>TOTAL</strong></td>
                      <td>${{number_format($total,2,',','.')}}</td>
                  </tr>

              </tbody>
           </table>
            </div>
        </div>


      <!--EndMain-->

    </div>
    </div>
  </div>


@include('../thema.footer')
<script type="text/javascript">

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})

$('#diezmo').on('input',function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
      });


function init_autocomplete() {
  if( typeof ($.fn.autocomplete) === 'undefined'){ return; }
    console.log(peticion);

  // var countries = { C6:"Yeider Adrian Mina Caicedo",AD:"Andorra",A2:"Andorra Test",AE:"United Arab Emirates",AF:"Afghanistan",AG:"Antigua and Barbuda",AI:"Anguilla",AL:"Albania",AM:"Armenia",AN:"Netherlands Antilles",AO:"Angola",AQ:"Antarctica",AR:"Argentina",AS:"American Samoa",AT:"Austria",AU:"Australia",AW:"Aruba",AX:"Åland Islands",AZ:"Azerbaijan",BA:"Bosnia and Herzegovina",BB:"Barbados",BD:"Bangladesh",BE:"Belgium",BF:"Burkina Faso",BG:"Bulgaria",BH:"Bahrain",BI:"Burundi",BJ:"Benin",BL:"Saint Barthélemy",BM:"Bermuda",BN:"Brunei",BO:"Bolivia",BQ:"British Antarctic Territory",BR:"Brazil",BS:"Bahamas",BT:"Bhutan",BV:"Bouvet Island",BW:"Botswana",BY:"Belarus",BZ:"Belize",CA:"Canada",CC:"Cocos [Keeling] Islands",CD:"Congo - Kinshasa",CF:"Central African Republic",CG:"Congo - Brazzaville",CH:"Switzerland",CI:"Côte d’Ivoire",CK:"Cook Islands",CL:"Chile",CM:"Cameroon",CN:"China",CO:"Colombia",CR:"Costa Rica",CS:"Serbia and Montenegro",CT:"Canton and Enderbury Islands",CU:"Cuba",CV:"Cape Verde",CX:"Christmas Island",CY:"Cyprus",CZ:"Czech Republic",DD:"East Germany",DE:"Germany",DJ:"Djibouti",DK:"Denmark",DM:"Dominica",DO:"Dominican Republic",DZ:"Algeria",EC:"Ecuador",EE:"Estonia",EG:"Egypt",EH:"Western Sahara",ER:"Eritrea",ES:"Spain",ET:"Ethiopia",FI:"Finland",FJ:"Fiji",FK:"Falkland Islands",FM:"Micronesia",FO:"Faroe Islands",FQ:"French Southern and Antarctic Territories",FR:"France",FX:"Metropolitan France",GA:"Gabon",GB:"United Kingdom",GD:"Grenada",GE:"Georgia",GF:"French Guiana",GG:"Guernsey",GH:"Ghana",GI:"Gibraltar",GL:"Greenland",GM:"Gambia",GN:"Guinea",GP:"Guadeloupe",GQ:"Equatorial Guinea",GR:"Greece",GS:"South Georgia and the South Sandwich Islands",GT:"Guatemala",GU:"Guam",GW:"Guinea-Bissau",GY:"Guyana",HK:"Hong Kong SAR China",HM:"Heard Island and McDonald Islands",HN:"Honduras",HR:"Croatia",HT:"Haiti",HU:"Hungary",ID:"Indonesia",IE:"Ireland",IL:"Israel",IM:"Isle of Man",IN:"India",IO:"British Indian Ocean Territory",IQ:"Iraq",IR:"Iran",IS:"Iceland",IT:"Italy",JE:"Jersey",JM:"Jamaica",JO:"Jordan",JP:"Japan",JT:"Johnston Island",KE:"Kenya",KG:"Kyrgyzstan",KH:"Cambodia",KI:"Kiribati",KM:"Comoros",KN:"Saint Kitts and Nevis",KP:"North Korea",KR:"South Korea",KW:"Kuwait",KY:"Cayman Islands",KZ:"Kazakhstan",LA:"Laos",LB:"Lebanon",LC:"Saint Lucia",LI:"Liechtenstein",LK:"Sri Lanka",LR:"Liberia",LS:"Lesotho",LT:"Lithuania",LU:"Luxembourg",LV:"Latvia",LY:"Libya",MA:"Morocco",MC:"Monaco",MD:"Moldova",ME:"Montenegro",MF:"Saint Martin",MG:"Madagascar",MH:"Marshall Islands",MI:"Midway Islands",MK:"Macedonia",ML:"Mali",MM:"Myanmar [Burma]",MN:"Mongolia",MO:"Macau SAR China",MP:"Northern Mariana Islands",MQ:"Martinique",MR:"Mauritania",MS:"Montserrat",MT:"Malta",MU:"Mauritius",MV:"Maldives",MW:"Malawi",MX:"Mexico",MY:"Malaysia",MZ:"Mozambique",NA:"Namibia",NC:"New Caledonia",NE:"Niger",NF:"Norfolk Island",NG:"Nigeria",NI:"Nicaragua",NL:"Netherlands",NO:"Norway",NP:"Nepal",NQ:"Dronning Maud Land",NR:"Nauru",NT:"Neutral Zone",NU:"Niue",NZ:"New Zealand",OM:"Oman",PA:"Panama",PC:"Pacific Islands Trust Territory",PE:"Peru",PF:"French Polynesia",PG:"Papua New Guinea",PH:"Philippines",PK:"Pakistan",PL:"Poland",PM:"Saint Pierre and Miquelon",PN:"Pitcairn Islands",PR:"Puerto Rico",PS:"Palestinian Territories",PT:"Portugal",PU:"U.S. Miscellaneous Pacific Islands",PW:"Palau",PY:"Paraguay",PZ:"Panama Canal Zone",QA:"Qatar",RE:"Réunion",RO:"Romania",RS:"Serbia",RU:"Russia",RW:"Rwanda",SA:"Saudi Arabia",SB:"Solomon Islands",SC:"Seychelles",SD:"Sudan",SE:"Sweden",SG:"Singapore",SH:"Saint Helena",SI:"Slovenia",SJ:"Svalbard and Jan Mayen",SK:"Slovakia",SL:"Sierra Leone",SM:"San Marino",SN:"Senegal",SO:"Somalia",SR:"Suriname",ST:"São Tomé and Príncipe",SU:"Union of Soviet Socialist Republics",SV:"El Salvador",SY:"Syria",SZ:"Swaziland",TC:"Turks and Caicos Islands",TD:"Chad",TF:"French Southern Territories",TG:"Togo",TH:"Thailand",TJ:"Tajikistan",TK:"Tokelau",TL:"Timor-Leste",TM:"Turkmenistan",TN:"Tunisia",TO:"Tonga",TR:"Turkey",TT:"Trinidad and Tobago",TV:"Tuvalu",TW:"Taiwan",TZ:"Tanzania",UA:"Ukraine",UG:"Uganda",UM:"U.S. Minor Outlying Islands",US:"United States",UY:"Uruguay",UZ:"Uzbekistan",VA:"Vatican City",VC:"Saint Vincent and the Grenadines",VD:"North Vietnam",VE:"Venezuela",VG:"British Virgin Islands",VI:"U.S. Virgin Islands",VN:"Vietnam",VU:"Vanuatu",WF:"Wallis and Futuna",WK:"Wake Island",WS:"Samoa",YD:"People's Democratic Republic of Yemen",YE:"Yemen",YT:"Mayotte",ZA:"South Africa",ZM:"Zambia",ZW:"Zimbabwe",ZZ:"Unknown or Invalid Region" };
//var countries = peticion

var countries = {
@foreach($data['miembros'] as $i)
{{$i->id}}:"{{$i->nombres .'  '.$i->apellidos}}",
@endforeach
}

$('#basic-addon2').on('click',function(){
   var valor =$('#buscar').val()
   if(valor.length>4){
    $.ajax({
     url:'{{route('buscar_diezmante')}}',
     data:{'data':valor},
     type:'post',
     success:function(rest){
      $('#rest').html(rest);
  }
   })
   }

})
    var countriesArray = $.map(countries, function(value, key) {
      return {
        value: value,
        data: key
      };
    });

    // initialize autocomplete with custom appendTo
    $('#buscar').autocomplete({
      lookup: countriesArray
    });

};


</script>

</body>
</html>
