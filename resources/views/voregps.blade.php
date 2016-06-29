<!DOCTYPE html>
<html>
<head>
    <title>My Position</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
            color: white;
            background-color: black;
        }

        .container {
            text-align: center;
            display: table-cell;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .max {
            color: #98E080;
            display: inline;
        }

        .title {
            font-size: 50px;
        }
    </style>


</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">My Position</div>
        <h2><strong>Latitude :</strong>
            <div style="display: inline" id=lat>
                {{ $dades->lat }}
            </div>
        </h2>

        <h2>
            <strong>Longitude :</strong>
            <div style="display: inline" id=lon>
                {{ $dades->lon  }}
            </div>
        </h2>
        <h2>
            <strong>Speed :</strong>
            <div style="display: inline" id=speed>
                {{ $dades->speed }}
            </div>
            Km/h
        </h2>


        <script type="text/javascript">
            $(document).ready(function () {
                setInterval(refreshDades, 10000);
            });

            function refreshDades() {

                // alert("test1");
                $.get('/llegir', function (response) {
                    $("#lat").html(response.lat);
                    $("#lon").html(response.lon);
                    $("#speed").html(response.speed);

                    var myPosX = new google.maps.LatLng(response.lat, response.lon);

                    marker.setPosition(myPosX);
                });
            }
        </script>
        <script>
            var map;
            var marker;


            function initMap() {

                var mapProp = {
                    center: new google.maps.LatLng({{$dades->lat}},{{$dades->lon}}),
                    zoom: 7,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                var myPos = new google.maps.LatLng({{$dades->lat}},{{$dades->lon}});


                marker = new google.maps.Marker({
                    position: myPos,
                    map: map,
                    title: 'It\'s me!'
                });

                marker.setMap(map);

            }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
                async defer></script>
        <div id="googleMap" style="width:500px;height:380px;"></div>


    </div>
</div>
</body>
</html>
