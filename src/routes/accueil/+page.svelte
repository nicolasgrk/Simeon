
<script>
    import Navbar from "../../components/Navbar.svelte";
	import HelloUser from "../../components/HelloUser.svelte";
    import Recherche from "../../components/Recherche.svelte";
	import City from "../../components/City.svelte";
	import Localisation from "../../components/Localisation.svelte";

    let name="Chloé dupont";
	let city2;
	let home;
	let pin;
	let like;

  


</script>
<div class="contentBody">
	<Localisation />
	<HelloUser name={name} />
	<Recherche />


	<section class="section Categorie">
		<div class="container">
			<h2 class="subtitle">
				Catégorie
			</h2>
			<div class="slider">
				<a href="/detail_categorie">
					<div class="slide" id="categorieActive">
							<div>
								<img class="categorieImg" src="/src/img/categorie/Crab.png" alt="">
								<p class="categorieName">Mer</p>
							</div>
					</div>
				</a>
				<div class="slide">
					<div>
						<img class="categorieImg" src="/src/img/categorie/Camper.png" alt="">
						<p class="categorieName">Camper</p>
					</div>
				</div>
				<div class="slide">
					<div>
						<img class="categorieImg" src="/src/img/categorie/Historique.png" alt="">
						<p class="categorieName">Historique</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<h2 class="subtitle">
				Populaire
			</h2>
			<div class="slider2">
				<div class="slide2">
					<City city={"Quimper"}/>

				</div>
				<div class="slide2">
					<City city={"SaintMalo"}/>
				</div>
				<div class="slide2">
					<City city={"Rennes"}/>
				</div>
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

.slider .slide > div {
    border-radius: 10px;
    border-style: solid;
    border-width: 2px;
    border-color: #fff;
    min-width: 122px;
    height: 46px;
    padding: 10px 20px 10px 20px;
}

#categorieActive >div{
    background-color: #0CAC5C;
    border-style: none;
}

.categorieImg {
    float:left;
}
.categorieName {
    float:right;
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

.slider2 .slide2 > div {
    width: 153px;
    height: 196px;
	background-repeat: no-repeat;

}



.contentBody{
    padding-bottom: 80px;
}
</style>