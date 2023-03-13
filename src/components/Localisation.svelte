<script>
    	import { onMount } from 'svelte';

    	onMount(() => {
		if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition((position) => {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        const url = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=jsonv2`;
        fetch(url)
          .then(response => response.json())
          .then(data => {
            const region = data.address.town;
            if (region) {
              document.getElementById("region").textContent =  region;
            } else {
              document.getElementById("region").textContent = "Impossible de récupérer la région.";
            }
          })
          .catch(error => {
            console.error("Erreur lors de la récupération des données d'emplacement : ", error);
            document.getElementById("region").textContent = "Impossible de récupérer la localisation.";
          });
      });
    } else {
      console.error("La géolocalisation n'est pas prise en charge par ce navigateur.");
      document.getElementById("region").textContent = "La géolocalisation n'est pas prise en charge par ce navigateur.";
    }
    });

</script>
<section class="section">
  <div id="region-container">
      <img class="icons cible" src="/src/img/icons/cible.png" alt="cible">
      <p id="region">Chargement de la géolocalisation...</p>
      <div class="container">
        <div class="image">
          <a class="icons Profils" href="/profil"><img class="icons Profils" src="/src/img/profil.png" alt="Profils"></a>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
        </div>
      </div>
  </div>
</section>

<style>
 .container {
  position: relative;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  height: 100vh;
  padding: 0 20px;
}

.image {
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.image a {
  position: relative;
  z-index: 1;
  width: 100px;
  height: 100px;
  object-fit: cover;
  border-radius: 50%;
}

.circle {
  position: absolute;
  width: 200px;
  height: 200px;
  border: 2px SOLID #fff;
  border-radius: 50%;
}

.circle:nth-child(1) {
  top: -50%;
  left: 50%;
  transform: translate(-50%, -50%);
  position: absolute;
  width: 200px;
  height: 200px;
  border: 2px SOLID #fff;
  border-radius: 50%;
}

.circle:nth-child(2) {
  top: -100%;
  left: 50%;
  transform: translate(-50%, -50%) scale(1.5);
  position: absolute;
  width: 200px;
  height: 200px;
  border: 2px SOLID #fff;
  border-radius: 50%;
}

.circle:nth-child(3) {
  bottom: -100%;
  left: 50%;
  transform: translate(-50%, -50%) scale(2);
  position: absolute;
  width: 200px;
  height: 200px;
  border: 2px SOLID #fff;
  border-radius: 50%;
}

.circle:nth-child(4) {
  bottom: -50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(2.5);
  position: absolute;
  width: 200px;
  height: 200px;
  border: 2px SOLID #fff;
  border-radius: 50%;
}

.icons {
  display: inline-block;
  vertical-align: middle;
}

.cible {
  margin-right: 10px;
}

#region {
  display: inline-block;
  vertical-align: middle;
  margin: 0;
}

#region-container {
  display: flex;
  align-items: center;
  overflow: hidden;
}

.Profils {
  margin-left: auto;
}

p{
    font-family: "Poppins", sans-serif;
    font-size: 16px;
    color: #142B63;
    font-weight: bold;
}

</style>