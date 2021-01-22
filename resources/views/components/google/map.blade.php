@props(['function', 'lat' => 50.0646501, 'lon' => 19.9449799])

<div id="googleMap" style="width:100%;height:500px;"></div>
<script>
    function myMap()
    {
        var fun = {{$function}};
        var coords = new google.maps.LatLng(parseFloat({{$lat}}), parseFloat({{$lon}}));

        var mapProp = {
            center: coords,
            zoom: 11,
        };

        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        if((fun == 1) || (fun == 3))
        {
            var marker = new google.maps.Marker({
                position: coords,
                map: map
            });
        }
        
        if(fun == 3)
        {
        	document.getElementById('latitude').value = {{$lat}};
            document.getElementById('longitude').value = {{$lon}};
        }

        if((fun == 2) || (fun == 3))
        {
            map.addListener('click', function(e) {
                document.getElementById('latitude').value = e.latLng.lat();
                document.getElementById('longitude').value = e.latLng.lng();
                placeMarker(e.latLng);
            });

            function placeMarker(position)
            {
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
    }

</script>

<?php $api_key = config('GOOGLE_API_KEY') ?>
<script src="https://maps.googleapis.com/maps/api/js?key={{$api_key}}&callback=myMap"></script>
