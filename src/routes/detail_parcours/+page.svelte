
<script>
    import Navbar from "../../components/Navbar.svelte";
    import { onMount } from 'svelte';
    import L from 'leaflet';
    import Localisation from "../../components/Localisation.svelte";


    let name="Chloé dupont";
	let city;
	let home;
	let pin;
	let like;

    onMount(() => {
    const map = L.map('mapid').setView([48.6495187, -2.0256743], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      tileSize: 512,
      zoomOffset: -1,
    }).addTo(map);
    L.marker([48.6495187, -2.0256743]).addTo(map)
      .bindPopup("Saint-Malo, France")
      .openPopup();
  });

</script>
<div class="contentBody">
  <Localisation />

	<section class="section Parcours">
		<div class="container">
			<div class="columns is-mobile">
				<div class="column">
					<h2>
						Parcours 
                        
					</h2>
                    <h2 class="city">
                        Saint-Malo <span class="distance">30 km</span>
                    </h2>
				</div>
			</div>
		</div>
	</section>

    <section class="section Categorie">
		<div class="container">

			<div class="slider">
				<div class="slide">
						<img class="categorieImg" src="/src/img/detail_parcourrs/mer.png" alt="">
				</div>
				<div class="slide">
                    <img class="categorieImg" src="/src/img/detail_parcourrs/terre.png" alt="">
                </div>
				<div class="slide">
                    <img class="categorieImg" src="/src/img/detail_parcourrs/mer.png" alt="">
                </div>
			</div>
		</div>
	</section>
    <section class="section resume">
        <div class="container">      
          <div class="columns is-mobile">
            <div class="card profilDescription">
                <div class="card-content">
                  <div class="content has-text-centered">
                    <p>lorem ipsum leo risus, porta ac consectetur ac, vestibulum at eros. Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum.</p>
                  </div>
                </div>
            </div>       
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">      
          <div class="columns is-mobile">   
            <div class="card MapItinary">
                <div class="carte-wrapper">
                    <div id="mapid"></div>
                    <div class="itineraire-wrapper">Itinéraire</div>
                    <div class="arrow-wrapper"><img class="arrow-icon" src="/src/img/icons/right_arrow.png" alt="arrow"></div>
                </div>
            </div>       
          </div>
        </div>
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

	.contentBody{
    padding-bottom: 80px;
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
    .card{
    border-radius: 20px;
    width: 100%;

    }
    .MapItinary{
        background-color: transparent;
    }
    #mapid{
        border-radius: 20px;
        height: 150px;
    }
    .carte-wrapper {
        position: relative;
    }

  .itineraire-wrapper {
    font-family: "Poppins", sans-serif;
    font-weight:bold;
    position: absolute;
    top: 10px;
    left: 10px;
    z-index: 1000;
    background-color: white;
    color: #142B63;
    padding: 10px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    padding-bottom: 5px;
    padding-top: 5px;
    padding-left: 10px;
  }
  .arrow-icon {
    width: 20px;
    height: 20px;
    margin-left: 10px;
  }
  .arrow-icon {
    width: 20px;
    height: 20px;
    margin-left: 10px;
  }
  .arrow-wrapper {
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 1000;
    display: flex;
    align-items: center;
  }
  section{
    padding-top: 0;
  }

</style>