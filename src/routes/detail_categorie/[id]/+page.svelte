
<script>
	import { onMount } from 'svelte';
    import Navbar from "../../../components/Navbar.svelte";
	import City from "../../../components/City.svelte";
	import Localisation from "../../../components/Localisation.svelte";
    let name="Chloé dupont";
	let id;
	let category_name;

	let courses = []; 
	async function getCourses() {
		const response = await fetch(`http://localhost:8888/MyStartupProject/Simeon/Simeon/backend/controllers/CoursesCategories/CoursesCategories_read.php?category_id=${id}`);
		const data = await response.json();
		courses = data.courses;
	}
	async function getCategories() {
		const response = await fetch(`http://localhost:8888/MyStartupProject/Simeon/Simeon/backend/controllers/Categories/Categories_readOne.php?category_id=${id}`);
		const data = await response.json();
		category_name = data.category_name;
  	}
	onMount(async () => {
		const path = window.location.pathname; // récupère le chemin d'accès de l'URL
		const parts = path.split('/'); // sépare le chemin d'accès en parties
		id = parts[parts.length - 1]; // récupère la dernière partie, qui est l'id
		getCourses();
		getCategories();
	});
</script>
<div class="contentBody">
	<Localisation />

	<section class="section Like">
		<div class="container">
			<div class="image-text-wrapper">
				<img src="/src/img/categorie/{category_name}.svg" alt="{category_name}" class="image icons">
				<div class="text">
					<h2 class="subtitle">
						{category_name}
					</h2>
				</div>
				<img src="/src/img/icons/reglage.svg" alt="Image 2" class="image settings">
			  </div>
		</div>
	</section>
	<section class="section">
		<div class="container">
		  <div class="columns is-mobile is-multiline">
			{#each courses as course}
			<div class="column">
			  <City city={course.course_name} distance={course.course_distance} image={course.course_image} id={course.course_id} heart="heart_full"/>
			</div>
			{/each}       
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
		font-weight: bold;
    }
	.contentBody{
    	padding-bottom: 80px;
	}
	.image-text-wrapper {
    	display: flex;
    	align-items: center;
  	}
	.image {
		margin-right: 10px;
	}
	.text {
		font-size: 18px;
		font-weight: bold;
		margin-left: 10px;
		margin-right: 10px;
	}


</style>