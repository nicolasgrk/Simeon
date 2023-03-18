import { c as create_ssr_component, v as validate_component, d as each, e as escape, f as add_attribute } from "../../../../chunks/index.js";
import { N as Navbar } from "../../../../chunks/Navbar.js";
import "mapbox-gl";
import { H as Header2 } from "../../../../chunks/Header2.js";
const _page_svelte_svelte_type_style_lang = "";
const css = {
  code: 'h2.svelte-1kvpj2p.svelte-1kvpj2p{font-family:"Poppins", sans-serif;font-size:30px;color:#142B63}.city.svelte-1kvpj2p.svelte-1kvpj2p{font-weight:bold}.distance.svelte-1kvpj2p.svelte-1kvpj2p{font-size:17px;font-weight:lighter}.section.svelte-1kvpj2p.svelte-1kvpj2p{padding-top:2em;padding-left:1.5em;padding-right:1.5em;padding-bottom:0}.contentBody.svelte-1kvpj2p.svelte-1kvpj2p{padding-bottom:80px}.Pictures.svelte-1kvpj2p.svelte-1kvpj2p{padding-right:0px}.slider.svelte-1kvpj2p.svelte-1kvpj2p{-ms-overflow-style:none;scrollbar-width:none;width:auto;overflow-y:hidden;overflow-x:scroll;display:flex;align-items:stretch;scroll-snap-type:x mandatory}.slider.svelte-1kvpj2p.svelte-1kvpj2p::-webkit-scrollbar{display:none}.slider.svelte-1kvpj2p .slide.svelte-1kvpj2p{flex-shrink:0;padding:20px 0 20px 20px;scroll-snap-align:center}.slider.svelte-1kvpj2p .slide.svelte-1kvpj2p:last-child{padding-right:20px}.slide.svelte-1kvpj2p>img.svelte-1kvpj2p{width:300px;height:300px;border-radius:10px}.card.svelte-1kvpj2p.svelte-1kvpj2p{border-radius:20px;width:100%}#map.svelte-1kvpj2p.svelte-1kvpj2p{position:relative}',
  map: null
};
const Page = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  let { steps = [] } = $$props;
  let Coursename;
  let description;
  let distance;
  let note;
  let pictures = [];
  if ($$props.steps === void 0 && $$bindings.steps && steps !== void 0)
    $$bindings.steps(steps);
  $$result.css.add(css);
  return `<div class="contentBody svelte-1kvpj2p">${validate_component(Header2, "Header2").$$render($$result, {}, {}, {})}

	<section class="section Parcours svelte-1kvpj2p"><div class="container"><div class="columns is-mobile"><div class="column"><h2 class="svelte-1kvpj2p">Parcours 
            ${each(Array(5), (_, i) => {
    return `${i < note ? `<img class="note" src="/src/img/icons/star.svg" alt="note">` : `<img class="note" src="/src/img/icons/star_light.svg" alt="note">`}`;
  })}</h2>
          <h2 class="city svelte-1kvpj2p">${escape(Coursename)} <span class="distance svelte-1kvpj2p">${escape(distance)} km</span></h2></div></div></div></section>

  <section class="section Pictures svelte-1kvpj2p"><div class="container"><div class="slider svelte-1kvpj2p">${pictures.length === 0 ? `<div class="slide svelte-1kvpj2p">No pictures available.</div>` : `${each(pictures, (picture) => {
    return `<div class="slide svelte-1kvpj2p"><img${add_attribute("src", `/src/img/detail_parcours/${picture.name}`, 0)}${add_attribute("alt", picture.description, 0)} class="svelte-1kvpj2p">
            </div>`;
  })}`}</div></div></section>
  
    <section class="section resume svelte-1kvpj2p"><div class="container"><div class="columns is-mobile"><div class="card profilDescription svelte-1kvpj2p"><div class="card-content"><div class="content has-text-centered"><p>${escape(description)}</p></div></div></div></div></div></section>
      <section class="section map svelte-1kvpj2p"><div id="map" style="height: 300px;border-radius: 20px" class="svelte-1kvpj2p"></div></section>


	

	${validate_component(Navbar, "Navbar").$$render($$result, { home: "Home", pin: "Pin", like: "Like" }, {}, {})}
</div>`;
});
export {
  Page as default
};
