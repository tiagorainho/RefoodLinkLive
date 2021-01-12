<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ env("APP_NAME", "RefoodLink") }}</title>
    <link rel="stylesheet" href={{ asset("assets/bootstrap/css/bootstrap.min.css") }}>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href={{ asset("assets/fonts/fontawesome-all.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/fonts/font-awesome.min.css") }}>
    <link rel="stylesheet" href={{ asset("assets/fonts/fontawesome5-overrides.min.css") }}>
    <link rel="stylesheet" href={{ asset("css/app.css") }}>
    <link rel="stylesheet" href={{ asset("css/notiflix.css") }}>

    <!-- map box -->
    <!-- css -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css"/>

    <!-- js -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <script src={{ asset("js/MapBoxScript.js") }}></script>
    <script src={{ asset("js/notiflix.js") }}></script>
    @livewireStyles
</head>

<body id="page-top">
    <div id="wrapper">

        @livewire('sidebar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @livewire('navbar')
                <div wire:offline>
                    <div style="margin: 0 auto;">
                        You are offline.
                    </div>
                </div>
                {{ $slot }}
            </div>
            @livewire('footer')
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src={{ asset("assets/js/jquery.min.js") }}></script>
    <script src={{ asset("assets/bootstrap/js/bootstrap.min.js") }}></script>
    <script src={{ asset("assets/js/chart.min.js") }}></script>
    <script src={{ asset("assets/js/bs-init.js") }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src={{ asset("assets/js/theme.js") }}></script>
    <script src={{ asset("js/app.js") }}></script>

    @livewireScripts
    <script>
        window.addEventListener('closeModal', event => {
            $('#'+event.detail.modalId).modal('hide');
        });

        window.addEventListener('openModal', event => {
            $('#'+event.detail.modalId).modal('show');
        });

        window.addEventListener('startMap', event => {
            startMap(event.detail.api_key, event.detail.destination);
        });

        window.addEventListener('getCoordinates', event => {
            var latitude;
            var longitude;
            console.log("getCoordinates");
            navigator.geolocation.getCurrentPosition(
                function success(pos) {
                    var loc = pos.coords;
                    latitude = loc.latitude;
                    longitude = loc.longitude;
                    window.livewire.emit('returnCoordinates', latitude, longitude)
                }, 
                function error(err) {
                    $.getJSON('https://ipinfo.io/geo', function(response) { 
                        var loc = response.loc.split(',');
                        latitude = parseFloat(loc[0]);
                        longitude = parseFloat(loc[1]);
                        window.livewire.emit('returnCoordinates', latitude, longitude)
                    });
                }
            );
        });
    </script>
    @livewire('server-message')
    </body>
</html>