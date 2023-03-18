
<script>
		import { onMount } from 'svelte';

    import Navbar from "../../components/Navbar.svelte";
	import City from "../../components/City.svelte";
    import Header2 from "../../components/Header2.svelte";
	let likes = []; 
	async function getLike() {
		const response = await fetch(`https://yamangjulien.000webhostapp.com/controllers/Likes/Like_readByUserId.php?user_id=1`);
		const data = await response.json();
		likes = data.likes;
	}
	onMount(() => {
		getLike();
  });

</script>
<div class="contentBody">
	<Header2 />

	<section class="section Like">
		<div class="container">
			<div class="image-text-wrapper">
				<img src="/img/icons/heart_like.svg" alt="heartFull" class="image icons">
				<div class="text">
					<h2 class="subtitle">
						Like
					</h2>
				</div>
				<img src="/img/icons/reglage.svg" alt="Image 2" class="image settings">
			  </div>
		</div>
	</section>
	
	<section class="section">
		<div class="container">
		  <div class="columns is-mobile is-multiline">
			{#each likes as like}
			<div class="column">
			  <City city={like.course_name} distance={like.course_distance} image={like.course_image} id={like.course_id} heart="heart_full"/>
			</div>
			{/each}       
		  </div>
		</div>
	  </section>


	<Navbar home={"Home"} pin={"Pin"} like={"Like_active"} />
</div>
<style>
	.Like{
		padding-top: 0;
		padding-bottom: 0;
	}
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