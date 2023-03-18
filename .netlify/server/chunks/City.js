import { c as create_ssr_component, e as escape } from "./index.js";
const City_svelte_svelte_type_style_lang = "";
const css = {
  code: ".slide2.svelte-1ogfdqj>div.svelte-1ogfdqj{width:214px;height:274px;background-repeat:no-repeat}.full-city.svelte-1ogfdqj.svelte-1ogfdqj{display:flex;align-content:space-around;justify-content:space-around;margin-left:-40px}.city.svelte-1ogfdqj.svelte-1ogfdqj{display:flex;flex-direction:column}.city.svelte-1ogfdqj.svelte-1ogfdqj{display:flex;flex-direction:column}.heart.svelte-1ogfdqj.svelte-1ogfdqj{padding-top:10px}.city.svelte-1ogfdqj>p.svelte-1ogfdqj:first-child{color:white;font-size:18px;padding-bottom:3px;padding-top:5px;font-weight:bold}.city.svelte-1ogfdqj>p.svelte-1ogfdqj{padding-left:15px;color:white;font-size:9px;font-family:'Poppins-light', sans-serif}.card.svelte-1ogfdqj.svelte-1ogfdqj{width:214px;height:274px;border-radius:10px;position:relative;background-repeat:no-repeat;background-size:cover;background-position:center}.card-top.svelte-1ogfdqj.svelte-1ogfdqj{width:100%;height:75%}.card-bottom.svelte-1ogfdqj.svelte-1ogfdqj{width:100%;height:25%;background:rgba(255, 255, 255, 0.13);border-bottom-left-radius:10px;border-bottom-right-radius:10px;backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px)}",
  map: null
};
const City = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  let { city } = $$props;
  let { distance } = $$props;
  let { image } = $$props;
  let { id } = $$props;
  let { heart } = $$props;
  if ($$props.city === void 0 && $$bindings.city && city !== void 0)
    $$bindings.city(city);
  if ($$props.distance === void 0 && $$bindings.distance && distance !== void 0)
    $$bindings.distance(distance);
  if ($$props.image === void 0 && $$bindings.image && image !== void 0)
    $$bindings.image(image);
  if ($$props.id === void 0 && $$bindings.id && id !== void 0)
    $$bindings.id(id);
  if ($$props.heart === void 0 && $$bindings.heart && heart !== void 0)
    $$bindings.heart(heart);
  $$result.css.add(css);
  return `<a href="${"../detail_parcours/" + escape(id, true)}"><div class="${"card " + escape(city, true) + " svelte-1ogfdqj"}" style="${"background-image: url('/img/populaire/" + escape(image, true) + "');"}"><div class="card-top svelte-1ogfdqj"></div>
    <div class="card-bottom svelte-1ogfdqj"><div class="full-city svelte-1ogfdqj"><div class="city svelte-1ogfdqj"><p class="nameCity svelte-1ogfdqj">${escape(city)}</p>
          <p class="cityDistance svelte-1ogfdqj">Parcours ${escape(distance)}km</p></div>
        <div class="heart svelte-1ogfdqj"><img src="${"/img/icons/" + escape(heart, true) + ".svg"}" alt="heart"></div></div></div></div>
</a>`;
});
export {
  City as C
};
