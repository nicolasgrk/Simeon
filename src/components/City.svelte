<script>
	export let city;
</script>
<a href="../detail_parcours">
  <div class="card {city}">
    <div class="card-top">
    </div>
    <div class="card-bottom">
        <div class="full-city">
            <div class="city">
                <p>{city}</p>
                <p>Parcours 18km</p>
            </div>
            <div class="heart">
                <img src="/src/img/populaire/heart.png" alt="heart">
            </div>
        </div>
    </div>
</div>
</a>


<style>
    .full-city {
  display: flex;
  align-content: space-around;
  justify-content: space-around;
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
  font-size: 12px;
  padding-bottom: 3px;
  padding-top: 5px;
}
.city > p{
  padding-left: 10px;
  color:white;

  font-size: 9px;
}

.card {
  width: 153px;
  height: 196px;
  border-radius: 10px;
  position: relative;
  background-repeat: no-repeat;  

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
.SaintMalo{
	background-image: url("/Applications/MAMP/htdocs/MyStartupProject/Simeon/SimeonTest/src/img/populaire/saintMalo.png");
}
.Quimper{
	background-image: url("/Applications/MAMP/htdocs/MyStartupProject/Simeon/SimeonTest/src/img/populaire/quimper.png");
}
.Rennes{
	background-image: url("/Applications/MAMP/htdocs/MyStartupProject/Simeon/SimeonTest/src/img/populaire/rennes.png");

}
</style>