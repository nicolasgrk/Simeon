<script>
	export let city;
  export let distance;
	export let image;
  export let id; // ajout de la variable id
  export let heart; // ajout de la variable id


</script>
<a href="../detail_parcours/{id}">
  <div class="card {city}" style="background-image: url('/img/populaire/{image}');">
    <div class="card-top"></div>
    <div class="card-bottom">
      <div class="full-city">
        <div class="city">
          <p class="nameCity">{city}</p>
          <p class="cityDistance">Parcours {distance}km</p>
        </div>
        <div class="heart">
          <img src="/img/icons/{heart}.svg" alt="heart">
        </div>
      </div>
    </div>
  </div>
</a>

<style>
  .slide2 > div {
    width: 214px;
    height: 274px;
	background-repeat: no-repeat;

}
    .full-city {
  display: flex;
  align-content: space-around;
  justify-content: space-around;
  margin-left: -40px;
}

.city {
  display: flex;
  flex-direction: column;
}
.city {
  display: flex;
  flex-direction: column;
}
.heart {
  padding-top: 10px;
}
.city >p:first-child{
  color:white;
  font-size: 18px;
  padding-bottom: 3px;
  padding-top: 5px;
  font-weight: bold;

}
.city > p{
  padding-left: 15px;
  color:white;
  font-size: 9px;
  font-family: 'Poppins-light', sans-serif;

}

.card {
  width: 214px;
  height: 274px;
  border-radius: 10px;
  position: relative;
  background-repeat: no-repeat;  
  background-size: cover;
    background-position: center;
}


.card-top {
  width: 100%;
  height: 75%;
}

.card-bottom {
  width: 100%;
  height: 25%;
  background: rgba(255, 255, 255, 0.13);
  border-bottom-left-radius:10px;
  border-bottom-right-radius:10px;
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);

}
/* .SaintMalo{
	background-image: url("/img/populaire/saintMalo.png");
}
.Quimper{
	background-image: url("/img/populaire/quimper.png");
}
.Rennes{
	background-image: url("/img/populaire/rennes.png");

} */
</style>