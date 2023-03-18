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
      <img class="icons cible" src="/src/img/icons/cible.svg" alt="cible">
      <p id="region">Chargement de la géolocalisation...</p>
      <div class="container">
        <div class="image">
          <a class="icons Profils" href="/profil"><img class="icons Profils"  src="/src/img/user/john_doe.jpeg" alt="Placeholder image" style="border-radius: 50%;width: 20%;"></a>
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
  padding: 0 20px;
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
#region{
  padding-left:10px;
}

</style>