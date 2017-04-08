<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Styles -->

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            /*align-items: center;*/
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 54px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Reverse Geocoding
        </div>

        <div class="col-lg-12 form">
            <form method="post" action="/reverse/geocode" class="form">
                <div class="row" id="warning" style="height: 55px; width: 100%; display: none;">

                </div>
                <div class="row">
                    <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h5 style="color: green;"><b>Latitude</b></h5>
                    </div>
                    <div class="form-group col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <input style="font-family: Arial" type="number" step="any" name="lat" class="form-control" required id="lat">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <h5 style="color: green;"><b>Longitude</b></h5>
                    </div>
                    <div class="form-group col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <input type="number" style="font-family: Arial" name="log" step="any" class="form-control" required id="lon">
                    </div>
                    {{csrf_field()}}
                </div>
                <center>
                    <input type="submit" name="payment" style="font-family: Arial"
                           class="btn btn-danger" value="Submit">
                </center>
            </form>
        </div>

        <div class="clearfix"></div>
        @if(Session::has('city'))
            <div class="result" style="padding-top: 50px">
                <span style="font-family: Arial;font-weight: 600;font-size: 20px">Result : </span>
                <span class="city" style="font-family: Arial;font-weight: 600;font-size: 16px">{{session('city')}} , </span>
                <span class="country" style="font-family: Arial;font-weight: 600;font-size: 16px">{{session('country')}}</span>
            </div>
        @endif
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>
