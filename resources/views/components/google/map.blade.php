@props(['lat' => 50.0646501, 'lon' => 19.9449799])

<div id="googleMap" style="width:100%;height:500px;"></div>

<script>
    function myMap() {
        var coords = new google.maps.LatLng({{$lat}},{{$lon}});
        // map options
        var mapProp= {
            center: coords,
            zoom:11,
        };

        // new map
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

        // add marker
        var marker = new google.maps.Marker({
            position: coords,
            map:map
        });
    }
</script>

<?php $api_key = config('GOOGLE_API_KEY') ?>
<script src="https://maps.googleapis.com/maps/api/js?key={{$api_key}}&callback=myMap"></script>
