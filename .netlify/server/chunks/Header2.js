import { c as create_ssr_component } from "./index.js";
const Header2_svelte_svelte_type_style_lang = "";
const css = {
  code: '.container.svelte-zjcty0{position:relative;display:flex;justify-content:flex-end;align-items:center;padding:0 20px}#retour-container.svelte-zjcty0{display:flex;align-items:center;overflow:hidden}.Profils.svelte-zjcty0{margin-left:auto}p.svelte-zjcty0{font-family:"Poppins", sans-serif;font-size:16px;color:#142B63;font-weight:bold}#retour.svelte-zjcty0{padding-left:10px}',
  map: null
};
const Header2 = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  $$result.css.add(css);
  return `<section class="section"><div id="retour-container" class="svelte-zjcty0"><img class="icons left_arrow" src="/src/img/icons/left_arrow.svg" alt="left_arrow" onclick="history.back()">
      <p id="retour" onclick="history.back()" class="svelte-zjcty0">Retour</p>
      <div class="container svelte-zjcty0"><div class="image"><a class="icons Profils svelte-zjcty0" href="/profil"><img class="icons Profils svelte-zjcty0" src="/src/img/user/john_doe.jpeg" alt="Placeholder image" style="border-radius: 50%;width: 20%;"></a>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div>
          <div class="circle"></div></div></div></div>
</section>`;
});
export {
  Header2 as H
};
