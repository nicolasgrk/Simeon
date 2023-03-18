
<script>
  import { onMount } from 'svelte';
  import Navbar from "../../components/Navbar.svelte";
	import Localisation from "../../components/Localisation.svelte";

  let user_firstName;
  let user_lastName;
  let user_bio;
  let user_icon;
  async function getUser() {
		const response = await fetch(`http://localhost:8888/MyStartupProject/Simeon/Simeon/backend/controllers/Users/Users_readOne.php?id=1`);
    const data = await response.json();
    user_firstName = data.user_firstName;
    user_lastName = data.user_lastName;
    user_bio = data.user_bio;
    user_icon = data.user_icon;

  }
	onMount(() => {
		getUser();
  });
</script>
<div class="contentBody">
  <Localisation />

  <section class="section profil">
    <div class="container">
          <div class="is-flex is-horizontal-center">
              <figure class="image is-128x128 profil">
                <img src="/img/user/john_doe.jpeg" alt="Placeholder image" style="border-radius: 50%;">
              </figure>
          </div>
  
      <div class="columns is-mobile">
        <div class="card profilDescription">
            <div class="card-content">
              <div class="content has-text-centered">
                <h2>{user_firstName} {user_lastName}</h2>
                <p>{user_bio}</p>
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
                    <img src="/img/navbarIcons/routing.svg" alt="Parcours">
                    <span>9,1 </span> km
                  </div>
                  <div class="column is-vcentered">
                    <img src="/img/navbarIcons/flash.svg" alt="Parcours">
                    <span>300</span> calories
                  </div>
                </div>
              </div>
            </div>
        </div>       
      </div>
    </div>
  </section>
  <a href="/">
  <section class="section" style="text-align:center">
    <div class="container">
      <div class="columns is-mobile">
        <div class="card deconnexion">
            <div class="card-content">
              <div class="content">
                <p>Déconnexion</p>
              </div>
            </div>
        </div>       
      </div>
    </div>
  </section></a>


  
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
figure{
  margin-bottom: 15px;

}
.deconnexion{
  background-color: #142B63;
  color:white;
}


</style>
