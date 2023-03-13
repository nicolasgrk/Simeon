
<script>
  import Navbar from "../../components/Navbar.svelte";
	import HelloUser from "../../components/HelloUser.svelte";
	import Localisation from "../../components/Localisation.svelte";

  let name="Chloé dupont";
  let home;
	let pin;
	let like;

</script>
<div class="contentBody">
  <Localisation />

  <section class="section profil">
    <div class="container">
          <div class="is-flex is-horizontal-center">
              <figure class="image is-128x128 profil">
                  <img src="/src/img/testImage.png" alt="Placeholder image">
                </figure>
          </div>
  
      <div class="columns is-mobile">
        <div class="card profilDescription">
            <div class="card-content">
              <div class="content has-text-centered">
                <h2>{name}</h2>
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
        <div class="card">
            <div class="card-content">
              <div class="content">
                <h2>Groupes</h2>
  
                <div class="groupes famille has-text-centered ">
                  <p class="test">Famille</p>
                </div>
                <div class="groupes amis has-text-centered">
                  <p>Amis</p>
                </div>
              </div>
            </div>
        </div>       
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="columns is-mobile">
        <div class="card">
            <div class="card-content">
              <div class="content">
                <h2>Statistiques</h2>
                <div class="columns is-mobile">
                  <div class="column is-vcentered">
                    <img src="/src/img/navbarIcons/routing.png" alt="Parcours">
                    <span>9,1 </span> km
                  </div>
                  <div class="column is-vcentered">
                    <img src="/src/img/navbarIcons/flash.png" alt="Parcours">
                    <span>300</span> calories
                  </div>
                </div>
              </div>
            </div>
        </div>       
      </div>
    </div>
  </section>
  
  
</div>
<Navbar home={"Home"} pin={"Pin"} like={"Like"} />

<style>
  h2{
		color: #142B63;
  }
  .is-horizontal-center {
  justify-content: center;
}
.profil{
  z-index: 2;
  padding-top:15%;
}
.card{
  border-radius: 20px;
  width: 100%;

}

.profilDescription{
  padding-top: 10%;

}
.groupes{
  width: 100%;
  height: 50px;
  color:white;
  margin-bottom: 10%;
  border-radius: 9px;
}
.famille{
  background-color: #0CAC5C;
}
.amis{
  background-color: #E6B1B5;
}
.groupes > p{
  padding-top: 4%;
}
span{
  color:#0CAC5C;
}
.contentBody{
    padding-bottom: 80px;
}
.profil{
  margin-top: -80px;
}

</style>
