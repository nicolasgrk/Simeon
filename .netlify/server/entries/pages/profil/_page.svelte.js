import { c as create_ssr_component, v as validate_component, e as escape } from "../../../chunks/index.js";
import { N as Navbar } from "../../../chunks/Navbar.js";
import { L as Localisation } from "../../../chunks/Localisation.js";
const _page_svelte_svelte_type_style_lang = "";
const css = {
  code: "h2.svelte-18h858o.svelte-18h858o{color:#142B63}.is-horizontal-center.svelte-18h858o.svelte-18h858o{justify-content:center}.profil.svelte-18h858o.svelte-18h858o{z-index:2;padding-top:15%}.card.svelte-18h858o.svelte-18h858o{border-radius:20px;width:100%}.profilDescription.svelte-18h858o.svelte-18h858o{padding-top:10%}.groupes.svelte-18h858o.svelte-18h858o{width:100%;height:50px;color:white;margin-bottom:10%;border-radius:9px}.famille.svelte-18h858o.svelte-18h858o{background-color:#0CAC5C}.amis.svelte-18h858o.svelte-18h858o{background-color:#E6B1B5}.groupes.svelte-18h858o>p.svelte-18h858o{padding-top:4%}span.svelte-18h858o.svelte-18h858o{color:#0CAC5C}.contentBody.svelte-18h858o.svelte-18h858o{padding-bottom:80px}.profil.svelte-18h858o.svelte-18h858o{margin-top:-80px}figure.svelte-18h858o.svelte-18h858o{margin-bottom:15px}.deconnexion.svelte-18h858o.svelte-18h858o{background-color:#142B63;color:white}",
  map: null
};
const Page = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  let user_firstName;
  let user_lastName;
  let user_bio;
  $$result.css.add(css);
  return `<div class="contentBody svelte-18h858o">${validate_component(Localisation, "Localisation").$$render($$result, {}, {}, {})}

  <section class="section profil svelte-18h858o"><div class="container"><div class="is-flex is-horizontal-center svelte-18h858o"><figure class="image is-128x128 profil svelte-18h858o"><img src="/img/user/john_doe.jpeg" alt="Placeholder image" style="border-radius: 50%;"></figure></div>
  
      <div class="columns is-mobile"><div class="card profilDescription svelte-18h858o"><div class="card-content"><div class="content has-text-centered"><h2 class="svelte-18h858o">${escape(user_firstName)} ${escape(user_lastName)}</h2>
                <p>${escape(user_bio)}</p></div></div></div></div></div></section>
  
  <section class="section"><div class="container"><div class="columns is-mobile"><div class="card svelte-18h858o"><div class="card-content"><div class="content"><h2 class="svelte-18h858o">Groupes</h2>
  
                <div class="groupes famille has-text-centered  svelte-18h858o"><p class="test svelte-18h858o">Famille</p></div>
                <div class="groupes amis has-text-centered svelte-18h858o"><p class="svelte-18h858o">Amis</p></div></div></div></div></div></div></section>
  <section class="section"><div class="container"><div class="columns is-mobile"><div class="card svelte-18h858o"><div class="card-content"><div class="content"><h2 class="svelte-18h858o">Statistiques</h2>
                <div class="columns is-mobile"><div class="column is-vcentered"><img src="/img/navbarIcons/routing.svg" alt="Parcours">
                    <span class="svelte-18h858o">9,1 </span> km
                  </div>
                  <div class="column is-vcentered"><img src="/img/navbarIcons/flash.svg" alt="Parcours">
                    <span class="svelte-18h858o">300</span> calories
                  </div></div></div></div></div></div></div></section>
  <a href="/"><section class="section" style="text-align:center"><div class="container"><div class="columns is-mobile"><div class="card deconnexion svelte-18h858o"><div class="card-content"><div class="content"><p>Déconnexion</p></div></div></div></div></div></section></a></div>
${validate_component(Navbar, "Navbar").$$render($$result, { home: "Home", pin: "Pin", like: "Like" }, {}, {})}`;
});
export {
  Page as default
};
