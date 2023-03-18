import { c as create_ssr_component, e as escape, f as add_attribute } from "./index.js";
const Navbar = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  let { home } = $$props;
  let { pin } = $$props;
  let { like } = $$props;
  if ($$props.home === void 0 && $$bindings.home && home !== void 0)
    $$bindings.home(home);
  if ($$props.pin === void 0 && $$bindings.pin && pin !== void 0)
    $$bindings.pin(pin);
  if ($$props.like === void 0 && $$bindings.like && like !== void 0)
    $$bindings.like(like);
  return `<section class="navigationBar"><div class="columns is-mobile is-centered"><div class="column is-6"><a href="/accueil"><img class="categorieImg" src="${"/img/navbarIcons/" + escape(home, true) + ".svg"}"${add_attribute("alt", home, 0)}></a></div>
        <div class="column is-6"><a href="/map"><img class="categorieImg" src="${"/img/navbarIcons/" + escape(pin, true) + ".svg"}"${add_attribute("alt", pin, 0)}></a></div>
        <div class="column is-6"><a href="/like"><img class="categorieImg" src="${"/img/navbarIcons/" + escape(like, true) + ".svg"}"${add_attribute("alt", like, 0)}></a></div></div></section>`;
});
export {
  Navbar as N
};
