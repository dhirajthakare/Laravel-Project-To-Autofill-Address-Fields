var cc_object = new clickToAddress({
    accessToken: "674c3-d013e-970d7-0763d",
    domMode: 'class', // Use names to find form elements
    defaultCountry: 'gbr',
    countryLanguage: 'en',
    enabledCountries: ['gbr']
});

if ($(".auto_search")[0]){ // an class which available then only search address work
    cc_object.attach({
        search:		'auto_search', // class name should be here 
        postcode:	'auto_search',
        town:		'auto_addr_town',
        company:    'auto_house',
        county:		'auto_addr_county',
        line_1:		'auto_house',
        line_2:		'auto_addr_line2',
        street_name:'auto_street_add',
        country:    'auto_addr_country'


    },
    {
    onResultSelected: function(c2a, elements, address) {
    var street = '';
    if(address.street_name){
      street += address.street_name;
    }
    if(address.street_suffix){
      street += street ? ' ' + address.street_suffix : address.street_suffix;
    }

    if(street){
      $('.auto_street_add').val(street);
    }else{
      $(".auto_street_add").val(address.line_1);
      $(".auto_addr_line2").val(address.line_2);
    }

    if(address.alternative_province){
      $('.auto_addr_county').val(address.alternative_province);
    }
    $(".auto_addr_nickname").val($(".auto_house").val());
    updateValue();
        }
    })
}


// MAP

var map;
  function getPostion(marker){
    infoWindow = new google.maps.InfoWindow;
      
      google.maps.event.addListener(marker, 'dragend', function (event) {
          document.getElementById("lat").value = event.latLng.lat();
          document.getElementById("long").value = event.latLng.lng();
          Latlng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
          geocoder = new google.maps.Geocoder();
          infoWindow.open(map, marker);
          geocoder.geocode({
            latLng: Latlng
          }, function(responses) {
            if (responses && responses.length > 0) {
              infoWindow.setContent(responses[0].formatted_address);
              var addr = responses[0].formatted_address;
              addr = addr.split(',');
              addr1 = addr[0].split(' ');
              if(addr1.length > 1){
                var len = addr1.length;
                var streetAddr = '';
                for(i=1;i<len;i++){
                  streetAddr += addr1[i];
                }


                $('.auto_house').val(addr1[0]);
                $('.auto_street_add').val(streetAddr);

              }else{
                $('.auto_house').val(addr1[0]);

              }

              $('.auto_addr_line2').val(addr[1]);

              
              if(addr[addr.length-1] == "UK"){
                $('.auto_house').val(addr1[0]);

              }else{
                $('.auto_addr_country').val('United Kingdom');
                $('.auto_addr_town').val(addr[addr.length-2]);

              }
            } else {
              infoWindow.setContent('Cannot determine address at this location.');
            }
          });
          
      });
  }

  function setPosition(marker,latitude,longitude){
      infoWindow = new google.maps.InfoWindow;
      document.getElementById("lat").value = latitude;
      document.getElementById("long").value = longitude;
      Latlng = new google.maps.LatLng(latitude, longitude);
      geocoder = new google.maps.Geocoder();
      infoWindow.open(map, marker);
      geocoder.geocode({
        latLng: Latlng
      }, function(responses) {
        if (responses && responses.length > 0) {
          infoWindow.setContent(responses[0].formatted_address);
          var addr = responses[0].formatted_address;
          
        } else {
          infoWindow.setContent('Cannot determine address at this location.');
        }
      });
  }

   // function initialize() {
    window.onload=function(){
      var myLatlng = new google.maps.LatLng(51.507351, -0.127758);

      var myOptions = {
          zoom: 5,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

      var marker = new google.maps.Marker({
          draggable: true,
          position: myLatlng,
          map: map,
          title: "Your location"
      });

      getPostion(marker);
      
      //const log = document.getElementById('address2');

      // log.addEventListener('input', updateValue);

      

      // $("#address2").on('change',function(){
        
      // });
  }

  function updateValue(val){
    clearMarker();
    
    geocoder = new google.maps.Geocoder();
    var houseNameNumber = $(".auto_house").val();
    var propertynickname = $(".auto_addr_nickname").val();
    var streetname = $(".auto_street_add").val();
    var address2 = $(".auto_addr_line2").val();
    //var address3 = $("#address3").val();
    var town = $(".auto_addr_town").val();
    //var county = $("#county").val();
    var address = '';
    if(houseNameNumber){
      if(streetname){
        if(address2){
          if(town){
            address = houseNameNumber + ', ' + streetname + ', ' + address2 + ', ' + town;
          }else{
            address = houseNameNumber + ', ' + streetname + ', ' + address2;
          }
        }else{
          address = houseNameNumber + ', ' + streetname;
        }
      }else{
        address = houseNameNumber;
      }
    }else{
      address = 'London';
    }

    // if(propertynickname){
    //   address = propertynickname + ', ' + address; 
    // }

    address = address + ', ' +'United Kingdom';
    
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
            var latitude = results[0].geometry.location.lat();
            var longitude = results[0].geometry.location.lng();
            marker = new google.maps.Marker({
                draggable: true,
                map: map,
                position: results[0].geometry.location,
                title: results[0].geometry.location
            });
            //infoWindow.open(map, marker);
            //infoWindow.setContent(address);
            
            $('#lat').val(marker.position.lat());
            $('#long').val(marker.position.lng());
            setPosition(marker,latitude,longitude);
        } else {
            //infoWindow.setContent('Cannot Determine Your Location');
            console.log('Geocode was not successful for the following reason: ' + status);
            
        }
    }); 
}

function clearMarker(){
    //infoWindow = new google.maps.InfoWindow;
    var marker = new google.maps.Marker({
        //draggable: true,
        map: null,
        //position: results[0].geometry.location,
        //title: results[0].geometry.location
    });
    markers = [];
    map = null;
    for (let i = 0; i < markers.length; i++) {
      marker[i].setMap(map);
    }
    //var myLatlng = new google.maps.LatLng(51.507351, -0.127758);
    var myOptions = {
        zoom: 14,
        //center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
}
