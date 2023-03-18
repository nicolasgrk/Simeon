import { c as create_ssr_component } from "../../chunks/index.js";
const _page_svelte_svelte_type_style_lang = "";
const css = {
  code: `h1.svelte-1cjtugv.svelte-1cjtugv{font-family:"Poppins", sans-serif;font-size:20px;color:#142B63;font-weight:bold}.header.svelte-1cjtugv.svelte-1cjtugv{display:flex;justify-content:center;align-items:center;margin-top:48px}.content.svelte-1cjtugv.svelte-1cjtugv{display:flex;flex-direction:column;justify-content:center;align-items:center;border-radius:10px}.image-container.svelte-1cjtugv.svelte-1cjtugv{position:relative}.logo_img.svelte-1cjtugv.svelte-1cjtugv{width:200px;height:auto}.title.svelte-1cjtugv.svelte-1cjtugv{position:absolute;bottom:0;margin-bottom:50px;text-align:center;width:100%}form.svelte-1cjtugv.svelte-1cjtugv{display:flex;flex-direction:column;align-items:center;margin-top:20px}.input-container.svelte-1cjtugv.svelte-1cjtugv{position:relative;display:flex;align-items:center;width:100%;margin-bottom:20px;text-align:right}.input-container.svelte-1cjtugv img.svelte-1cjtugv{position:absolute;left:15px;width:20px;height:auto}input.svelte-1cjtugv.svelte-1cjtugv{padding-left:50px;padding-right:10px;border-radius:34px;border:none;width:100%;box-sizing:border-box;background-color:white;outline:none;height:51px;font-family:"Poppins";font-size:17px}input.svelte-1cjtugv.svelte-1cjtugv::placeholder{color:#b3b3b3}.section.svelte-1cjtugv.svelte-1cjtugv{width:90%}.erreur.svelte-1cjtugv.svelte-1cjtugv{color:red;margin-left:1em}button#submit.svelte-1cjtugv.svelte-1cjtugv{font-family:'Poppins-Medium';font-size:15px;background-color:#0CAC5C;border-radius:34px;border:none;width:100%;height:50px;color:white;text-align:center}`,
  map: null
};
const Page = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  $$result.css.add(css);
  return `<div class="contentBody"><div class="header svelte-1cjtugv"><div class="logo"><img src="/img/login/logo.svg"></div></div>
	<div class="content svelte-1cjtugv"><div class="image-container svelte-1cjtugv"><h1 class="title svelte-1cjtugv">Créer un compte</h1>
		<img class="logo_img svelte-1cjtugv" src="/img/login/Hey.svg" alt="Image de fond"></div>
	  <section class="section svelte-1cjtugv"><div class="container"><form class="svelte-1cjtugv"><div class="input-container svelte-1cjtugv"><img src="/img/login/mail.svg" alt="" class="svelte-1cjtugv">
					<input type="email" id="email" name="email" placeholder="E-mail" required class="svelte-1cjtugv">
					<span id="email-erreur" class="erreur svelte-1cjtugv"></span></div>
				<div class="input-container svelte-1cjtugv"><img src="/img/login/lock.svg" alt="" class="svelte-1cjtugv">
					<input type="password" id="pswd" name="pswd" placeholder="Mot de passe" required class="svelte-1cjtugv">
    				<span id="pswd-erreur" class="erreur svelte-1cjtugv"></span></div>
				<button type="button" id="submit" class="svelte-1cjtugv">Valider</button></form>
			</div></section>
	  <div id="resultat"></div></div>
  </div>`;
});
export {
  Page as default
};
