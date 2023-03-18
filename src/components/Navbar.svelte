<script>
    export let home;
	export let pin;
	export let like;
</script>
<section  class="navigationBar">
    <div class="columns is-mobile is-centered">
        <div class="column is-6">
			<a href="/accueil"><img class="categorieImg" src="/src/img/navbarIcons/{home}.svg" alt="{home}"></a>
        </div>
        <div class="column is-6">
			<a href="/map"><img class="categorieImg" src="/src/img/navbarIcons/{pin}.svg" alt="{pin}"></a>
        </div>
        <div class="column is-6">
			<a href="/like"><img class="categorieImg" src="/src/img/navbarIcons/{like}.svg" alt="{like}"></a>
        </div>
    </div>
</section>