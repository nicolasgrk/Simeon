<script>
    import L from 'leaflet';
    import 'leaflet-routing-machine';
    import 'leaflet-control-geocoder';

    import { onMount } from 'svelte';
  
    let map;
    let marker;
    let routingControl;
  
    onMount(() => {
      map = L.map('map').setView([51.505, -0.09], 13);
  
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1Ijoibmljb2xhc2dyayIsImEiOiJjbGU2MGM4bXgwaTkxM29vN3lleWwxdXl6In0.CDSgdoe6qseAL_5yIDcgPw'
      }).addTo(map);
  
      // Create a marker at a specific location
      marker = L.marker([51.505, -0.09]).addTo(map);
  
      // Create the Leaflet Routing Machine control and add it to the map
      routingControl = L.Routing.control({
        waypoints: [
          L.latLng(51.505, -0.09),
          L.latLng(51.5, -0.1)
        ],
        router: L.Routing.mapbox('pk.eyJ1Ijoibmljb2xhc2dyayIsImEiOiJjbGU2MGM4bXgwaTkxM29vN3lleWwxdXl6In0.CDSgdoe6qseAL_5yIDcgPw'),
        routeWhileDragging: true,
        show: false,
        geocoder: L.Control.Geocoder.nominatim(),
        autoRoute: true,
        createMarker: function(i, wp, nWps) {
          return L.marker(wp.latLng, {
            draggable: true
          });
        }
      }).addTo(map);
    });
  </script>
  
  <style>
    #map {
      height: 500px;
    }
  </style>
  
  <div id="map"></div>
  