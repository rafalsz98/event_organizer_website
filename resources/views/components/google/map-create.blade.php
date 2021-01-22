<div id="googleMap" style="width:100%;height:500px;"></div>
<script>
    function myMap() {
        var marker, lat, lng;
        var coords = new google.maps.LatLng(50.0646501, 19.9449799);
        // map options
        var mapProp = {
            center: coords,
            zoom: 11,
        };

        // new map
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        // click listener
        map.addListener('click', function(e) {
            document.getElementById('latitude').value = e.latLng.lat();
            document.getElementById('longitude').value = e.latLng.lng();
            placeMarker(e.latLng);
        });

        // marker adding
        function placeMarker(position) {
            if(marker) marker.setPosition(position);
            else
            {
                marker = new google.maps.Marker({
                    position: position,
                    map:map
                });
            }
            map.panTo(position);
        }
    }

</script>

<?php $api_key = config('GOOGLE_API_KEY') ?>
<script src="https://maps.googleapis.com/maps/api/js?key={{$api_key}}&callback=myMap"></script>
