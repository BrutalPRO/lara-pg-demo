<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel PostgreSql demo task</title>
        <style>
            html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}
            html,body{min-height: 100%;padding: 0;margin: 0}
            #map{
                width: 100%;
                height: 460px;
            }
            .container{width: 90%; max-width: 1440px; margin: 0 auto;}
            .form{
                background-color: #fff;
                padding: 1.5em;
                border: 1px solid rgb(229, 231, 235);
                border-radius: 15px;
            }
            @media (min-width: 768px) {
                .form{
                    display: flex;
                    justify-content: space-between;
                }
            }
            label{margin: 15px 0;}
        </style>
    </head>
    <body>
    <div class="container">
        <h1>PHP Developer Test Task</h1>
        @include('form')
        <div id="map"></div>
    </div>
        <script type='text/javascript' src='https://cdn.polyfill.io/v2/polyfill.min.js?ver=2.0.0'></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkCODI1n53Gz1uN9rY_boH53kq5eUPIl8&callback=initMap&v=weekly" defer></script>
        <script>
            var points = {!! json_encode($points) !!},
                markers = {},
                map,
                isInitMap = false;

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('d403838c5e50de03781a', {
                cluster: 'eu'
            });

            var channel = pusher.subscribe('points');
            channel.bind('actual', function(data) {
                if( Pusher.logToConsole ) console.log(JSON.stringify(data));
                addMarker(data.point);
            }).bind('remove', function(data) {
                if( Pusher.logToConsole ) console.log(JSON.stringify(data));
                removeMarker(data.point);
            });

            function initMap(){
                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 4,
                    center:  new google.maps.LatLng(0, 0),
                });
                points.map(function (point){
                    addMarker(point);
                });
                isInitMap = true;
            }
            function addMarker(point){
                markers[point.id] = new google.maps.Marker({
                    position: { lat: parseFloat(point.latitude), lng: parseFloat(point.longitude) },
                    map,
                    title: point.label,
                });
            }
            function removeMarker(point){
                if( typeof markers[point.id] != "undefined" ) markers[point.id].setMap(null);
            }
        </script>
    </body>
</html>
