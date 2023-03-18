import { c as create_ssr_component, v as validate_component } from "../../../chunks/index.js";
import "mapbox-gl/dist/mapbox-gl.js";
import "@mapbox/mapbox-gl-geocoder";
import { N as Navbar } from "../../../chunks/Navbar.js";
const _page_svelte_svelte_type_style_lang = "";
const css = {
  code: "#geocoder.svelte-113dprk{position:absolute;top:10px;left:10px;z-index:1}",
  map: null
};
const Page = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  $$result.css.add(css);
  return `<div id="map" class="map"></div>
  <div id="geocoder" class="svelte-113dprk"></div>
  ${validate_component(Navbar, "Navbar").$$render(
    $$result,
    {
      home: "Home",
      pin: "Pin_active",
      like: "Like"
    },
    {},
    {}
  )}`;
});
export {
  Page as default
};
