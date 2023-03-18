<script>
	import { onMount } from "svelte";
	import mapboxgl from "mapbox-gl/dist/mapbox-gl.js";
	import MapboxGeocoder from "@mapbox/mapbox-gl-geocoder";
    import Navbar from "../../components/Navbar.svelte";

	let map;
	let marker;
  
	onMount(async () => {
		mapboxgl.accessToken = "pk.eyJ1Ijoibmljb2xhc2dyayIsImEiOiJjbGZkdDduNjUxZXpiM3dtdThud3lrMzNpIn0.RLIfsotUuehM4zmivT2Oxw";

		// Get user's current position
		navigator.geolocation.getCurrentPosition((position) => {
			const { latitude, longitude } = position.coords;
	  
			console.log("Latitude:", latitude);
			console.log("Longitude:", longitude);
	  
			map = new mapboxgl.Map({
				container: "map",
				style: "mapbox://styles/nicolasgrk/clfbgxa4s002401ln0g7u59t2",
				center: [longitude, latitude],
				zoom: 12
			});

			// Add navigation control
			map.addControl(new mapboxgl.NavigationControl());

			// Initialize geocoder
			const geocoder = new MapboxGeocoder({
				accessToken: mapboxgl.accessToken,
				mapboxgl: mapboxgl,
				marker: false // Disable the built-in marker
			});
	  
			// Add geocoder to the page
			document.getElementById("geocoder").appendChild(geocoder.onAdd(map));
	  
			// Add event listener for geocoder result
			geocoder.on("result", (event) => {
				const { coordinates } = event.result.geometry;
	  
				// Remove existing marker if any
				if (marker) {
					marker.remove();
				}
	  
				// Add marker to the map
				marker = new mapboxgl.Marker().setLngLat(coordinates).addTo(map);
				map.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
				map.addControl(new mapboxgl.ScaleControl({ maxWidth: 80, unit: 'metric' }), 'bottom-right');
			});

			// Add marker at user's location
			console.log("Adding marker at:", [longitude, latitude]);
			marker = new mapboxgl.Marker().setLngLat([longitude, latitude]).addTo(map);

		}, (error) => {
			console.error(error);
			map = new mapboxgl.Map({
				container: "map",
				style: "mapbox://styles/nicolasgrk/clfbgxa4s002401ln0g7u59t2",
				center: [0, 0],
				zoom: 1
			});
			// Add navigation control
			map.addControl(new mapboxgl.NavigationControl());
			// Initialize geocoder
			const geocoder = new MapboxGeocoder({
				accessToken: mapboxgl.accessToken,
				mapboxgl: mapboxgl,
				marker: false // Disable the built-in marker
			});
	  
			// Add geocoder to the page
			document.getElementById("geocoder").appendChild(geocoder.onAdd(map));
	  
			// Add event listener for geocoder result
			geocoder.on("result", (event) => {
				const { coordinates } = event.result.geometry;
	  
				// Remove existing marker if any
				if (marker) {
					marker.remove();
		}

		// Add marker to the map
		marker = new mapboxgl.Marker().setLngLat(coordinates).addTo(map);
		map.addControl(new mapboxgl.NavigationControl(), 'bottom-right');
		map.addControl(new mapboxgl.ScaleControl({ maxWidth: 80, unit: 'metric' }), 'bottom-right');


	  });
	});
});
  </script>
  
  <div id="map" class="map"></div>
  <div id="geocoder"></div>
  <Navbar home={"Home"} pin={"Pin_active"} like={"Like"} />

  <style>
	#geocoder {
	  position: absolute;
	  top: 10px;
	  left: 10px;
	  z-index: 1;
	}

  </style>
  