
<script>
    import Navbar from "../../components/Navbar.svelte";
	import HelloUser from "../../components/HelloUser.svelte";
    import Recherche from "../../components/Recherche.svelte";
	import City from "../../components/City.svelte";
	import Localisation from "../../components/Localisation.svelte";

    let name="Chloé dupont";
	let city;
	let home;
	let pin;
	let like;

</script>
<div class="contentBody">
	<Localisation />

	<section class="section Like">
		<div class="container">
			<div class="image-text-wrapper">
				<img src="/src/img/heartFull.png" alt="heartFull" class="image icons">
				<div class="text">
					<h2 class="subtitle">
						Like
					</h2>
				</div>
				<img src="/src/img/icons/reglage.png" alt="Image 2" class="image settings">
			  </div>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="columns is-mobile">
				<div class="column">
					<City city={"Quimper"}/>
				</div>
				<div class="column">
					<City city={"SaintMalo"}/>
				</div>
			</div>
			<div class="columns is-mobile">
				<div class="column">
					<City city={"Quimper"}/>
				</div>
				<div class="column">
					<City city={"SaintMalo"}/>
				</div>
			</div>
			<div class="columns is-mobile">
				<div class="column">
					<City city={"Quimper"}/>
				</div>
				<div class="column">
					<City city={"SaintMalo"}/>
				</div>
			</div>
			<div class="columns is-mobile">
				<div class="column">
					<City city={"Quimper"}/>
				</div>
				<div class="column">
					<City city={"SaintMalo"}/>
				</div>
			</div>
			<div class="columns is-mobile">
				<div class="column">
					<City city={"Quimper"}/>
				</div>
				<div class="column">
					<City city={"SaintMalo"}/>
				</div>
			</div>
			<div class="columns is-mobile">
				<div class="column">
					<City city={"Quimper"}/>
				</div>
				<div class="column">
					<City city={"SaintMalo"}/>
				</div>
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