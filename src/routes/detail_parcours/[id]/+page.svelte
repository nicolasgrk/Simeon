<script>
  import { onMount } from 'svelte';
  import Navbar from "../../../components/Navbar.svelte";
  import mapboxgl from 'mapbox-gl';
  import Header2 from '../../../components/Header2.svelte';
  export let steps = [];

  let map;
  let id;
  let Coursename;
  let description;
  let distance;
  let note;
  let pictures = [];

  async function getCourse() {
    const response = await fetch(`https://yamangjulien.000webhostapp.com/controllers/Courses/Courses_readOne.php?id=${id}`);
    const data = await response.json();
    Coursename = data.Course_name;
    description = data.Course_description;
    distance = data.Course_distance;
    note = data.Course_note;
  }

  async function getSteps() {
    const response = await fetch(`https://yamangjulien.000webhostapp.com/controllers/Steps/Steps_readByCourseId.php?course_id=${id}`);
    const data = await response.json();
    steps = data.data.map(step => ({
      latitude: step.latitude,
      longitude: step.longitude,
      name: step.name
    }));
    return steps;
  }

  async function getPictures() {
    const response = await fetch(`https://yamangjulien.000webhostapp.com/controllers/Pictures/Pictures_read.php?course_id=${id}`);
    const data = await response.json();
    pictures = data.photos.map(picture => ({
      id: picture.id,
      name: picture.name,
      description: picture.description,
      courseId: picture.course_id
    }));
  }

  onMount(async () => {
    const path = window.location.pathname; // récupère le chemin d'accès de l'URL
    const parts = path.split('/'); // sépare le chemin d'accès en parties
    id = parts[parts.length - 1]; // récupère la dernière partie, qui est l'id
    await getCourse();
    await getSteps();
    await getPictures();
  
    mapboxgl.accessToken = 'pk.eyJ1Ijoibmljb2xhc2dyayIsImEiOiJjbGZkdDduNjUxZXpiM3dtdThud3lrMzNpIn0.RLIfsotUuehM4zmivT2Oxw';
    map = new mapboxgl.Map({
      container: 'map',
      style: 'mapbox://styles/mapbox/streets-v11',
      center: [steps[0].longitude,steps[0].latitude],
      zoom: 13
    });
    map.on('load', async () => {
    steps.forEach(step => {
      const popup = new mapboxgl.Popup().setHTML(`<h3>${step.name}</h3>`);
      new mapboxgl.Marker()
        .setLngLat([step.longitude, step.latitude])
        .setPopup(popup)
        .addTo(map);
    });
      // Centrer la carte sur le parcours
      const bounds = new mapboxgl.LngLatBounds();
    steps.forEach(step => bounds.extend([step.longitude, step.latitude]));
    map.fitBounds(bounds, { padding: 50 });
    
    map.addLayer({
      id: 'route',
      type: 'line',
      source: {
        type: 'geojson',
        data: {
          type: 'Feature',
          properties: {},
          geometry: {
            type: 'LineString',
            coordinates: steps.map(step => [step.longitude, step.latitude])
          }
        }
      },
      layout: {
        'line-join': 'round',
        'line-cap': 'round'
      },
      paint: {
        'line-color': '#0CAC5C',
        'line-width': 4
      }
    });
  });
  });

</script>

<div class="contentBody">
  <Header2 />

	<section class="section Parcours">
		<div class="container">
			<div class="columns is-mobile">
				<div class="column">
          <h2>Parcours 
            {#each Array(5) as _, i}
              {#if i < note}
                <img class="note" src="/img/icons/star.svg" alt="note">
              {:else}
                <img class="note" src="/img/icons/star_light.svg" alt="note">
              {/if}
            {/each}
          </h2>
          <h2 class="city">
            {Coursename} <span class="distance">{distance} km</span>
          </h2>
				</div>
			</div>
		</div>
	</section>

  <section class="section Pictures">
    <div class="container">
      <div class="slider">
        {#if pictures.length === 0}
          <div class="slide">No pictures available.</div>
        {:else}
          {#each pictures as picture}
            <div class="slide">
              <img  src={`/img/detail_parcours/${picture.name}`} alt={picture.description}>
            </div>
          {/each}
        {/if}
      </div>
    </div>
  </section>
  
    <section class="section resume">
        <div class="container">      
          <div class="columns is-mobile">
            <div class="card profilDescription">
                <div class="card-content">
                  <div class="content has-text-centered">
                    <p>{description}</p>
                  </div>
                </div>
            </div>       
          </div>
        </div>
      </section>
      <section class="section map">
        <div id="map" style="height: 300px;border-radius: 20px"></div>

      </section>


	

	<Navbar home={"Home"} pin={"Pin"} like={"Like"} />
</div>
<style>
    h2{
        font-family: "Poppins", sans-serif;
        font-size: 30px;
        color: #142B63;
    }
    .city{
        font-weight: bold;
    }
    .distance{        
        font-size: 17px;
        font-weight:lighter;


    }
    .section{

    padding-top: 2em;
    padding-left: 1.5em;
    padding-right: 1.5em;
    padding-bottom: 0;

    }

	.contentBody{
    padding-bottom: 80px;
    }

.Pictures{
  padding-right: 0px;
}
    .slider {
    -ms-overflow-style: none;
    scrollbar-width: none;
    width: auto;
    overflow-y: hidden;
    overflow-x: scroll;
    display: flex;
    align-items: stretch;
    scroll-snap-type: x mandatory;  
  }

  .slider::-webkit-scrollbar {
      display: none;
  }

  .slider .slide {
      flex-shrink: 0;
      padding: 20px 0 20px 20px;
      scroll-snap-align: center;
  }

  .slider .slide:last-child {
      padding-right: 20px;
  }
  .slide > img{
    width: 300px;
    height:300px;
    border-radius: 10px;
  }

    .card{
    border-radius: 20px;
    width: 100%;

    }
    #map {
    position: relative;
}

</style>