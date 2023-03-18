import { c as create_ssr_component } from "../../../chunks/index.js";
const _page_svelte_svelte_type_style_lang = "";
const css = {
  code: 'h1.svelte-zwgnhj.svelte-zwgnhj{font-family:"Poppins", sans-serif;font-size:20px;color:#142B63;font-weight:bold}.header.svelte-zwgnhj.svelte-zwgnhj{display:flex;justify-content:center;align-items:center;margin-top:48px}.content.svelte-zwgnhj.svelte-zwgnhj{display:flex;flex-direction:column;justify-content:center;align-items:center;border-radius:10px}.image-container.svelte-zwgnhj.svelte-zwgnhj{position:relative}.logo_img.svelte-zwgnhj.svelte-zwgnhj{width:200px;height:auto;margin:20px}.title.svelte-zwgnhj.svelte-zwgnhj{position:absolute;bottom:0;margin-bottom:32px;text-align:center;width:100%}.input-container.svelte-zwgnhj.svelte-zwgnhj{position:relative;display:flex;align-items:center;width:100%;margin-bottom:20px;text-align:right}.input-container.svelte-zwgnhj img.svelte-zwgnhj{position:absolute;left:15px;width:20px;height:auto}input.svelte-zwgnhj.svelte-zwgnhj{padding-left:50px;padding-right:10px;border-radius:34px;border:none;width:100%;box-sizing:border-box;background-color:white;outline:none;height:51px;font-family:"Poppins";font-size:17px}input.svelte-zwgnhj.svelte-zwgnhj::placeholder{color:#b3b3b3}.section.svelte-zwgnhj.svelte-zwgnhj{width:90%}.erreur.svelte-zwgnhj.svelte-zwgnhj{color:red;margin-left:1em}',
  map: null
};
const Page = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  $$result.css.add(css);
  return `<div class="contentBody"><div class="header svelte-zwgnhj"><div class="logo"><img src="/src/img/login/logo.png"></div></div>
	<div class="content svelte-zwgnhj"><div class="image-container svelte-zwgnhj"><h1 class="title svelte-zwgnhj">Créer un compte</h1>
		<img class="logo_img svelte-zwgnhj" src="/src/img/login/Hey.png" alt="Image de fond"></div>
	  <section class="section svelte-zwgnhj"><div class="container"><form><div class="input-container svelte-zwgnhj"><img src="/src/img/login/user.png" alt="" class="svelte-zwgnhj">
					<input type="text" id="nom" name="nom" required class="svelte-zwgnhj">
					<span id="nom-erreur" class="erreur svelte-zwgnhj"></span></div>
				<div class="input-container svelte-zwgnhj"><img src="/src/img/login/user-edit.png" alt="" class="svelte-zwgnhj">
					<input type="text" id="prenom" name="prenom" required class="svelte-zwgnhj">
					<span id="prenom-erreur" class="erreur svelte-zwgnhj"></span></div>
				<div class="input-container svelte-zwgnhj"><img src="/src/img/login/mail.png" alt="" class="svelte-zwgnhj">
					<input type="email" id="email" name="email" required class="svelte-zwgnhj">
					<span id="email-erreur" class="erreur svelte-zwgnhj"></span></div>
				<div class="input-container svelte-zwgnhj"><img src="/src/img/login/lock.png" alt="" class="svelte-zwgnhj">
					<input type="password" id="pswd" name="pswd" required class="svelte-zwgnhj">
    				<span id="pswd-erreur" class="erreur svelte-zwgnhj"></span></div>
				<button type="button" id="submit">Submit</button></form>
			</div></section>
	  <div id="resultat"></div></div>
  </div>`;
});
export {
  Page as default
};
