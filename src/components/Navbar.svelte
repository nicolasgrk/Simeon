<script>
    export let home;
	export let pin;
	export let like;
</script>
<section  class="navigationBar">
    <div class="columns is-mobile is-centered">
        <div class="column is-6">
			<a href="/accueil"><img class="categorieImg" src="/src/img/navbarIcons/{home}.png" alt="{home}"></a>
        </div>
        <div class="column is-6">
			<a href="/like"><img class="categorieImg" src="/src/img/navbarIcons/{like}.png" alt="{like}"></a>
        </div>
        <div class="column is-6">
			<a href="/map"><img class="categorieImg" src="/src/img/navbarIcons/{pin}.png" alt="{pin}"></a>
        </div>
    </div>
</section>