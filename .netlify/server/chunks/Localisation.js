import { c as create_ssr_component } from "./index.js";
const Localisation_svelte_svelte_type_style_lang = "";
const css = {
  code: '.container.svelte-44lnsy{position:relative;display:flex;justify-content:flex-end;align-items:center;padding:0 20px}#region-container.svelte-44lnsy{display:flex;align-items:center;overflow:hidden}.Profils.svelte-44lnsy{margin-left:auto}p.svelte-44lnsy{font-family:"Poppins", sans-serif;font-size:16px;color:#142B63;font-weight:bold}#region.svelte-44lnsy{padding-left:10px}',
  map: null
};
const Localisation = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  $$result.css.add(css);
  return `<section class="section"><div id="region-container" class="svelte-44lnsy"><img class="icons cible" src="/img/icons/cible.svg" alt="cible">
      <p id="region" class="svelte-44lnsy">Chargement de la géolocalisation...</p>
      <div class="container svelte-44lnsy"><div class="image"><a class="icons Profils svelte-44lnsy" href="/profil"><img class="icons Profils svelte-44lnsy" src="/img/user/john_doe.jpeg" alt="Placeholder image" style="border-radius: 50%;width: 20%;"></a>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div></div></div></div>
</section>`;
});
export {
  Localisation as L
};
