
<script>
    import Navbar from "../../components/Navbar.svelte";
	import HelloUser from "../../components/HelloUser.svelte";
    import Recherche from "../../components/Recherche.svelte";
	import City from "../../components/City.svelte";
	import Categories from "../../components/Categories.svelte";

	import Localisation from "../../components/Localisation.svelte";
	import { onMount } from 'svelte';
    let name="Chloé dupont";
	let courses = []; 
	let categories = []; 
    let user_id = null;
    let user_icon = null;
  	// Fonction pour récupérer le nom de l'utilisateur depuis le serveur
  	async function getUserName() {
        const response = await fetch("https://yamangjulien.000webhostapp.com/controllers/Users/Users_readOne.php?id=1"); // Utilisez l'URL de votre contrôleur avec l'ID de l'utilisateur à récupérer
        const data = await response.json();
		const firstName = data.user_firstName; // Récupérez le prénom de l'utilisateur à partir de la réponse JSON
		const lastName = data.user_lastName; // Récupérez le nom de l'utilisateur à partir de la réponse JSON
		const fullName = `${firstName} ${lastName}`; // Concaténez le prénom et le nom en une seule chaîne
		name = fullName; // Affectez la chaîne concaténée à la variable name
    }
	async function getCourses() {
		const response = await fetch('https://yamangjulien.000webhostapp.com/controllers/Courses/Courses_read.php');
		const data = await response.json();
		courses = data.courses;
  	}
	async function getCategories() {
		const response = await fetch('https://yamangjulien.000webhostapp.com/controllers/Categories/Categories_read.php');
		const data = await response.json();
		categories = data.categories;
	}
	
    // Appel de la fonction pour récupérer le nom de l'utilisateur au chargement de la page
    onMount(getUserName); // Appel de la fonction pour récupérer le nom de l'utilisateur une fois le composant monté dans le DOM
	onMount(() => {
    getCourses();
	getCategories();
	
  });

	let city2;
	let home;
	let pin;
	let like;

  


</script>
<div class="contentBody">
	<Localisation />
	{#if name}
    <HelloUser name={name} />
	{/if}
	<Recherche />


	<section class="section Categorie">
		<div class="container">
			<h2 class="subtitle">
				Catégorie
			</h2>
			<div class="slider">
				{#each categories as category}
				  <div class="slide">
					<Categories id={category.category_id} categorie={category.category_name}/>
				</div>
				{/each}
			  </div>		  
		</div>
	</section>

	<section class="section">
		<div class="container">
		  <h2 class="subtitle">
			Populaire
		  </h2>
		  <div class="slider2">
			{#each courses as course}
			  <div class="slide2">
				<City city={course.Course_name} distance={course.Course_distance} image={course.Course_image} id={course.Course_id} heart="heart"/>
			</div>
			{/each}
		  </div>
		</div>
	  </section>

	<Navbar home={"Home_active"} pin={"Pin"} like={"Like"} />
</div>
<style>

.subtitle{
    font-family: "Poppins", sans-serif;
    font-size: 20px;
    color: #142B63;
    font-weight: bold;
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




.slider2 {
    -ms-overflow-style: none;
    scrollbar-width: none;
    width: auto;
    overflow-y: hidden;
    overflow-x: scroll;
    display: flex;
    align-items: stretch;
    scroll-snap-type: x mandatory;
    
}
.section{
    padding-bottom:0px;
}
.slider2::-webkit-scrollbar {
    display: none;
}

.slider2 .slide2 {
    flex-shrink: 0;
    padding: 20px 0 20px 20px;
    scroll-snap-align: center;
}

.slider2 .slide2:last-child {
    padding-right: 20px;
}




.contentBody{
    padding-bottom: 80px;
}
</style>