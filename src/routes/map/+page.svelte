<script>
	import Navbar from "../../components/Navbar.svelte";
	import { onMount } from 'svelte';
	import L from 'leaflet';
	import 'leaflet-routing-machine';
	let home;
	let pin;
	let like;

	let mapContainer;
	let searchForm;
	let searchInput = {
		value: "",
		options: []
	};
	let marker;
	let userMarker;

	function getSuggestions() {
		fetch(`https://nominatim.openstreetmap.org/search.php?q=${searchInput.value}&format=jsonv2`)
			.then(response => response.json())
			.then(data => {
				searchInput.options = data.map(result => result.display_name);
			});
	}

	onMount(async () => {
		let map = L.map(mapContainer);

		L.tileLayer('https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png', {
			maxZoom: 20,
			attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
		}).addTo(map);

		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
			map.setView([position.coords.latitude, position.coords.longitude], 13);

			// Add a marker for the user's location
			userMarker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
			userMarker.bindPopup("Vous êtes ici!").openPopup();
		});
		navigator.geolocation.getCurrentPosition(position => {
			let start = [position.coords.latitude, position.coords.longitude];
			
			searchForm.onsubmit = function(e) {
				e.preventDefault();
				fetch(`https://nominatim.openstreetmap.org/search?q=${searchInput.value}&format=json`)
					.then(response => response.json())
					.then(data => {
						if (data.length > 0) {
							let firstResult = data[0];
							if (marker) {
								map.removeLayer(marker);
							}
							marker = L.marker([firstResult.lat, firstResult.lon]).addTo(map);
							map.setView([firstResult.lat, firstResult.lon], 13);

							let end = [firstResult.lat, firstResult.lon];

							L.Routing.control({
								waypoints: [
								L.latLng(start),
								L.latLng(end)
								],
								routeWhileDragging: true
							}).addTo(map);
						}
					});
			};
		});
	}
});
</script>

<section class="section">
	<div class="container">
		<div class="columns is-mobile">
			<div class="column is-four-fifths">
				<form bind:this={searchForm}>
					<div class="field">
						<p class="control has-icons-left">
							<input class="input" id="searchBox" type="text" placeholder="Recherche..." bind:value={searchInput.value} on:input={getSuggestions} list="suggestions" />
							<span class="icon is-small is-left" id="searchIconBackground">
								<i class="fas fa-search"></i>
							</span>
							<datalist id="suggestions">
								{#each searchInput.options as option}
								  <option value={option} />
								{/each}
							  </datalist>
						</p>

					</div>
				</form>
			</div>
			<div class="column">
				<span class="icon is-large" id="settingsIcon">
					<i class="fas fa-sliders-h"></i>
				</span>
			</div>
		</div>
	</div>
</section>
<div class="map" bind:this={mapContainer}></div>

<Navbar home={"Home"} pin={"Pin_active"} like={"Like"} />


  <style>

	.map {
	  width: 100%;
	  height: 100%;
	}
	section{
		display: flex;
		margin: auto;
		justify-content: center;
		align-items: center;
		height: 65px;
		width: 322px;
		position: fixed;
		left: 50%;
		top:2%;
		transform: translate(-50%, -50%);
		z-index: 99999;
	}
	#searchBox{
		background-color: #fff;
		border-radius: 34px;
		border-style: hidden;
		height: 50px;
	}
	#searchBox::placeholder{
		font-family: "Poppins", sans-serif;
		font-size: 16px;
	}
	#searchIconBackground{
		background-color: #FCF0E8 ;
		border-radius: 100px;
		margin-left: 10px;
		margin-top: 5px;
	}
	#settingsIcon{
		background-color: #fff ;
		border-radius: 100px;
	}
	.fa-search{
		color: #142B63;
	}
	.control.has-icons-left .input, .control.has-icons-left .select select {
		padding-left: 3.5em;
	}
  </style>