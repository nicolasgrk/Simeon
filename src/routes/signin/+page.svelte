<script>
	import { onMount } from 'svelte';
  
	function handleSubmit() {
	  const formData = new FormData();
	  formData.append('nom', document.querySelector('#nom').value);
	  formData.append('prenom', document.querySelector('#prenom').value);
	  formData.append('email', document.querySelector('#email').value);
	  formData.append('pswd', document.querySelector('#pswd').value);
  
	  fetch('http://localhost:8888/MyStartupProject/Simeon/SimeonTest/backend/login.php', {
		method: 'POST',
		body: formData
	  }).then(response => {
		return response.text();
	  }).then(data => {
		if (data === 'Success') {
		  // Le membre est connecté. Ajoutons lui un message dans la page HTML.
		  document.querySelector('#resultat').innerHTML = '<p>Vous avez été connecté avec succès !</p>';
		  window.location.href="/accueil";

		} else {
		  // Le membre n'a pas été connecté. (data vaut ici "failed")
		  document.querySelector('#resultat').innerHTML = '<p>Problème de co</p>';
		}
	  }).catch(error => {
		console.error(error);
	  });
	}
  
	onMount(() => {
	  document.querySelector('#submit').addEventListener('click', handleSubmit);
	});
  </script>
<div class="contentBody">
	<div class="header">
	  <div class="logo">
		<img src="/src/img/login/logo.png">
	  </div>
	</div>
	<div class="content">
	  <div class="image-container">
		<h1 class="title">Créer un compte</h1>
		<img class="logo_img" src="/src/img/login/Hey.png" alt="Image de fond">
	  </div>
	  <section class="section">
		<div class="container">
			<form>
				<div class="input-container">
					<img src="/src/img/login/user.png" alt="">
					<input type="text" id="nom" name="nom" required>
					<span id="nom-erreur" class="erreur"></span>				
				</div>
				<div class="input-container">
					<img src="/src/img/login/user-edit.png" alt="">
					<input type="text" id="prenom" name="prenom" required>
					<span id="prenom-erreur" class="erreur"></span>
				</div>
				<div class="input-container">
					<img src="/src/img/login/mail.png" alt="">
					<input type="email" id="email" name="email" required>
					<span id="email-erreur" class="erreur"></span>
				</div>
				<div class="input-container">
					<img src="/src/img/login/lock.png" alt="">
					<input type="password" id="pswd" name="pswd" required>
    				<span id="pswd-erreur" class="erreur"></span>
				</div>
				<button type="button" id="submit">Submit</button>

			</form>
			<!-- <div class="submit-container">
				<a href="#" onclick="document.getElementById('myForm').submit();" class="login-link">
				<span class="log">Log</span>
				<span class="in">in</span>
				<i class="fas fa-arrow-right"></i>
				</a>
			</div> -->
		</div>
	  </section>
	  <div id="resultat"></div>
	</div>
  </div>
  
  <style>
	h1{
	  font-family: "Poppins", sans-serif;
	  font-size: 20px;
	  color: #142B63;
	  font-weight: bold;
	}
  
	.header {
	  display: flex;
	  justify-content: center;
	  align-items: center;
    margin-top: 48px;
	}
  
	.content {
	  display: flex;
	  flex-direction: column;
	  justify-content: center;
	  align-items: center;
	  border-radius: 10px;
	}
  
	.image-container {
	  position: relative;
	}
  
	.logo_img {
	  width: 200px;
	  height: auto;
	  margin: 20px;
	}
  
	.title {
	  position: absolute;
	  bottom: 0;
	  margin-bottom: 32px;
	  text-align: center;
	  width: 100%;
	}
  
	.form {
	  display: flex;
	  flex-direction: column;
	  align-items: center;
	  margin-top: 20px;
	}
  
	.input-container {
	  position: relative;
	  display: flex;
	  align-items: center;
	  width: 100%;
	  margin-bottom: 20px;
	  text-align: right; /* Aligner le lien à droite */

	}
  
	.input-container img {
	  position: absolute;
	  left: 15px;
	  width: 20px;
	  height: auto;
	}
  
	input {
	  padding-left: 50px;
	  padding-right: 10px;
	  border-radius: 34px;
	  border: none;
	  width: 100%;
	  box-sizing: border-box;
	  background-color: white;
	  outline: none;
	  height: 51px;
	  font-family: "Poppins";
	  font-size: 17px;
	}
  
	input::placeholder {
	  color: #b3b3b3;
	}
  
	.submit-container {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top: 20px;
  }
  
  .submit-container a {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #142B63;
    font-family: "Poppins", sans-serif;
    font-size: 20px;
  }
  
  .submit-container a:hover {
    text-decoration: underline;
  }
  
  .log {
    font-weight: 300;
    margin-right: 5px;
  }
  
  .in {
    font-weight: 600;
  }
  .login-link {
  font-family: "Poppins", sans-serif;
  font-size: 17px;
  font-weight: 600;
  color: #142B63;
  text-decoration: none;
  display: inline-block;
  margin-top: 20px;
  text-align: right;
}

.login-link .extralight {
  font-weight: 200;
}
.section{
	width:90%;
}
.erreur {
  color: red;
  margin-left: 1em;
}
  </style>
  