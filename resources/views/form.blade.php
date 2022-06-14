<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>

    <div class="mt-4">
        <div class="col-md-6 offset-md-3  card">
            <div class="card-body m-4">
                <h4 class="mt-4">Auto PostCode fill </h4>
        
                <form action="">
                    <div class="mt-3">
                        <label for="name">Name :</label>
                        <input  class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="mt-3">
                        <label for="name">PostCode :</label>
                        <input  class="form-control auto_search" type="text" name="postcode" id="postcode">
                    </div>
                    <div class="mt-3">
                        <label for="name">Address :</label>
                        <input  class="form-control auto_town" type="text" name="Address" id="Address">
                    </div>
                    <div class="mt-3">
                        <label for="name">Address 2 :</label>
                        <input  class="form-control auto_county" type="text" name="Address2" id="Address2">
                    </div>
                    <div class="mt-3">
                        <label for="name">Town :</label>
                        <input  class="form-control auto_addr_line" type="text" name="Address3" id="Address3">
                    </div>
                    <div class="mt-3">
                        <label for="name">City :</label>
                        <input  class="form-control auto_addr_line3" type="text" name="Address4" id="Address4">
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

<script>
    var cc_object = new clickToAddress({
            accessToken: "{!! '674c3-d013e-970d7-0763d' !!}",
            domMode: 'class', // Use names to find form elements
            defaultCountry: 'gbr',
            countryLanguage: 'en',
            enabledCountries: ['gbr']
        });

        if ($(".auto_search")[0]){ // an class which available then only search address work
            cc_object.attach({
                search:		'auto_search', // class name should be here 
                town:		'auto_town',
                county:		'auto_county',
                line_1:		'auto_addr_line',
                line_2:		'auto_addr_line3',
                postcode:	'auto_search'
            }),
            {}
        }

</script>


</body>
</html>