<script>
   import { onMount } from 'svelte';
   let deferredPrompt;
  let installable = false;

onMount(() => {
  
	// Écouter l'événement "beforeinstallprompt"
	window.addEventListener('beforeinstallprompt', (e) => {
	  // Empêcher l'affichage de la bannière d'installation automatique
	  e.preventDefault();
  
	  // Stocker l'événement pour l'utiliser plus tard
	  deferredPrompt = e;
  
	  // Mettre à jour la variable "installable" pour afficher le bouton d'installation
	  installable = true;
	});
})
	// Variable pour afficher/masquer le bouton d'installation
  
	function install() {
	  // Cacher le bouton d'installation
	  installable = false;
  
	  // Afficher la bannière d'installation
	  deferredPrompt.prompt();
  
	  // Attendre que l'utilisateur installe l'application
	  deferredPrompt.userChoice.then((choiceResult) => {
		if (choiceResult.outcome === 'accepted') {
		  console.log('L\'utilisateur a installé l\'application');
		  // Rediriger l'utilisateur vers la première page de l'application
		  window.location.href = '/signin';
		} else {
		  console.log('L\'utilisateur a refusé l\'installation de l\'application');
		}
		// Nettoyer l'événement stocké
		deferredPrompt = null;
	  });
	}

  </script>
  
  {#if installable}
	<button on:click={install}>Installer l'application</button>
  {/if}
  
  <h1>Bienvenue sur ma PWA</h1>
  <p>Installez notre application pour profiter de toutes ses fonctionnalités.</p>
  