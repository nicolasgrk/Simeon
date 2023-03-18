import { c as create_ssr_component } from "../../../chunks/index.js";
import "leaflet";
import "leaflet-routing-machine";
import "leaflet-control-geocoder";
const _page_svelte_svelte_type_style_lang = "";
const css = {
  code: "#map.svelte-19zmyzd{height:500px}",
  map: null
};
const Page = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  $$result.css.add(css);
  return `<div id="map" class="svelte-19zmyzd"></div>`;
});
export {
  Page as default
};
