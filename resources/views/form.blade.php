<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script async="false" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=4AIzaSyAYccXBYqfjf1o3Z_kBoOirRcTClPpzfxI4" async defer></script>
    

</head>
<body>

    <div class="mt-4">
        <div class="col-md-6 offset-md-3  card">
            <div class="card-body m-4">
                <h4 class="mt-4">Auto PostCode fill </h4>
        
                <form action="">
                    <div class="mt-3">
                        <label for="name">PostCode :</label>
                        <input  class="form-control auto_search" type="text" name="postcode" id="postcode">
                    </div>
                    <div class="row">
                        <div class="mt-3 col-md-6">
                            <label for="name">HOUSE NAME/NO.  :</label>
                            <input  class="form-control auto_house" type="text" placeholder="HOUSE NAME/NO" name="Address" id="Address">
                        </div>
                        <div class="mt-3 col-md-6">
                            <label for="name">PROPERTY NICK NAME  :</label>
                            <input  class="form-control auto_addr_nickname" type="text" placeholder="PROPERTY NICK NAME" name="Address2" id="Address2">
                        </div>
                    </div>
                   <div class="row">
                    <div class="mt-3 col-md-6">
                        <label for="name">STREET NAME :</label>
                        <input  class="form-control auto_street_add" type="text" placeholder="STREET NAME" name="street" id="street">
                    </div>
                    <div class="mt-3 col-md-6">
                        <label for="name">ADDRESS 2 :</label>
                        <input  class="form-control auto_addr_line2" type="text" placeholder="ADDRESS 2" name="Address2" id="Address2">
                    </div>
                   </div>
                   <div class="row">
                    <div class="mt-3 col-md-6">
                        <label for="name">ADDRESS 3 :</label>
                        <input  class="form-control auto_addr_line3" type="text" placeholder="ADDRESS 3" name="Address3" id="Address3">
                    </div>
                    <div class="mt-3 col-md-6">
                        <label for="name">TOWN  :</label>
                        <input  class="form-control auto_addr_town" type="text" placeholder="TOWN" name="town" id="town">
                    </div>
                   </div>
                   <div class="row">
                    <div class="mt-3 col-md-6">
                        <label for="name">COUNTY :</label>
                        <input  class="form-control auto_addr_county" type="text" placeholder="COUNTY" name="county" id="county">
                    </div>
                    <div class="mt-3 col-md-6">
                        <label for="name">COUNTRY :</label>
                        <input  class="form-control auto_addr_country" type="text" placeholder="COUNTRY" name="country" id="country">
                    </div>
                   </div>
                   <div class="row">
                    <div class="mt-3 col-md-6">
                        <label for="name">UNIT NO :</label>
                        <input  class="form-control auto_addr_country" type="text" placeholder="UNIT NO" name="unitNo" id="unitNo">
                    </div>
                   </div>
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                          <input type="hidden" id="lat" name="latitude" value="{{old('latitude')}}"> <br/>
                          <input type="hidden" id="long" name="longitude" value="{{old('longitude')}}"> <br/>
                          <div class="map-field">
                            <div id="map_canvas" style="500px; height: 250px;" ></div>
                          </div>
                        </div>
                      </div>
                    <div class="mt-3">
                        <button  class="form-control btn btn-primary" type="submit">Submit </button>
                    </div>
                </form>
        
            </div>
        </div>
    </div>
    <script src="https://cc-cdn.com/generic/scripts/v1/cc_c2a.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/autoFileeMap.js') }}"></script>

</body>
</html>