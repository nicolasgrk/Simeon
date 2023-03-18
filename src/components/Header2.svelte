<script>



</script>
<section class="section">
  <div id="retour-container">
      <img class="icons left_arrow" src="/src/img/icons/left_arrow.svg" alt="left_arrow" onclick="history.back()">
      <p id="retour" onclick="history.back()">Retour</p>
      <div class="container">
        <div class="image">
          <a class="icons Profils" href="/profil"><img class="icons Profils"  src="/src/img/user/john_doe.jpeg" alt="Placeholder image" style="border-radius: 50%;width: 20%;"></a>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
        </div>
      </div>
  </div>
</section>

<style>
 .container {
  position: relative;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  padding: 0 20px;
}

#retour-container {
  display: flex;
  align-items: center;
  overflow: hidden;
}

.Profils {
  margin-left: auto;
}

p{
    font-family: "Poppins", sans-serif;
    font-size: 16px;
    color: #142B63;
    font-weight: bold;
}
#retour{
  padding-left:10px;
}
</style>