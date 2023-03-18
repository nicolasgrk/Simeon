<script>

	export let categorie;
  export let id; // ajout de la variable id


</script>

<a href="../detail_categorie/{id}">
  <div class="slide">
    <div class="slide_categorie">
      <img class="categorieImg" src="/src/img/categorie/{categorie}.svg" alt="">
      <p class="categorieName">{categorie}</p>
    </div>
  </div>
</a>
<style>
    /* #categorieActive >div{
    background-color: #0CAC5C;
    border-style: none;
} */

.categorieImg {
    float:left;
}
.categorieName {
    float:right;
}
.slide > div {
    border-radius: 10px;
    border-style: solid;
    border-width: 2px;
    border-color: #fff;
    min-width: 150px;
    height: 46px;
    padding: 10px 20px 10px 20px;
    color:#142B63;
}

.slide_categorie:active, .slide_categorie:focus {
  background-color: #0CAC5C;
  color:white;
  border-color: #0CAC5C;
}
</style>