import { c as create_ssr_component, e as escape, v as validate_component, d as each } from "../../../chunks/index.js";
import { N as Navbar } from "../../../chunks/Navbar.js";
import { C as City } from "../../../chunks/City.js";
import { L as Localisation } from "../../../chunks/Localisation.js";
const HelloUser_svelte_svelte_type_style_lang = "";
const css$3 = {
  code: '.hello_user.svelte-vc3tq0{font-family:"Poppins", sans-serif;font-size:30px;color:#142B63}strong.svelte-vc3tq0{color:#142B63}section.svelte-vc3tq0{padding-top:0}',
  map: null
};
const HelloUser = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  let { name } = $$props;
  if ($$props.name === void 0 && $$bindings.name && name !== void 0)
    $$bindings.name(name);
  $$result.css.add(css$3);
  return `<section class="section svelte-vc3tq0"><div class="container"><h1 class="hello_user svelte-vc3tq0">Bonjour,<br><strong class="svelte-vc3tq0">${escape(name)}</strong></h1></div>
</section>`;
});
const Recherche_svelte_svelte_type_style_lang = "";
const css$2 = {
  code: '#searchBox.svelte-1ugf0to.svelte-1ugf0to{background-color:#fff;border-radius:34px;border-style:hidden;height:50px}#searchBox.svelte-1ugf0to.svelte-1ugf0to::placeholder{font-family:"Poppins", sans-serif;font-size:16px}#searchIconBackground.svelte-1ugf0to.svelte-1ugf0to{background-color:#FCF0E8 ;border-radius:100px;margin-left:10px;margin-top:5px}#settingsIcon.svelte-1ugf0to.svelte-1ugf0to{background-color:#fff ;border-radius:100px}.fa-search.svelte-1ugf0to.svelte-1ugf0to,.fa-sliders-h.svelte-1ugf0to.svelte-1ugf0to{color:#0CAC5C}.control.has-icons-left.svelte-1ugf0to .input.svelte-1ugf0to{padding-left:3.5em}section.svelte-1ugf0to.svelte-1ugf0to{padding-top:0;padding-bottom:0}',
  map: null
};
const Recherche = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  $$result.css.add(css$2);
  return `<section class="section svelte-1ugf0to"><div class="container"><div class="columns is-mobile"><div class="column is-four-fifths"><div class="field"><p class="control has-icons-left svelte-1ugf0to"><input class="input svelte-1ugf0to" id="searchBox" type="text" placeholder="Recherche...">
						<span class="icon is-small is-left svelte-1ugf0to" id="searchIconBackground"><i class="fas fa-search svelte-1ugf0to"></i></span></p></div></div>
			<div class="column"><span class="icon is-large svelte-1ugf0to" id="settingsIcon"><i class="fas fa-sliders-h svelte-1ugf0to"></i></span></div></div></div>
</section>`;
});
const Categories_svelte_svelte_type_style_lang = "";
const css$1 = {
  code: ".categorieImg.svelte-1wcxtou.svelte-1wcxtou{float:left}.categorieName.svelte-1wcxtou.svelte-1wcxtou{float:right}.slide.svelte-1wcxtou>div.svelte-1wcxtou{border-radius:10px;border-style:solid;border-width:2px;border-color:#fff;min-width:150px;height:46px;padding:10px 20px 10px 20px;color:#142B63}.slide_categorie.svelte-1wcxtou.svelte-1wcxtou:active,.slide_categorie.svelte-1wcxtou.svelte-1wcxtou:focus{background-color:#0CAC5C;color:white;border-color:#0CAC5C}",
  map: null
};
const Categories = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  let { categorie } = $$props;
  let { id } = $$props;
  if ($$props.categorie === void 0 && $$bindings.categorie && categorie !== void 0)
    $$bindings.categorie(categorie);
  if ($$props.id === void 0 && $$bindings.id && id !== void 0)
    $$bindings.id(id);
  $$result.css.add(css$1);
  return `<a href="${"../detail_categorie/" + escape(id, true)}"><div class="slide svelte-1wcxtou"><div class="slide_categorie svelte-1wcxtou"><img class="categorieImg svelte-1wcxtou" src="${"/src/img/categorie/" + escape(categorie, true) + ".svg"}" alt="">
      <p class="categorieName svelte-1wcxtou">${escape(categorie)}</p></div></div>
</a>`;
});
const _page_svelte_svelte_type_style_lang = "";
const css = {
  code: '.subtitle.svelte-de6wr3.svelte-de6wr3{font-family:"Poppins", sans-serif;font-size:20px;color:#142B63;font-weight:bold}.slider.svelte-de6wr3.svelte-de6wr3{-ms-overflow-style:none;scrollbar-width:none;width:auto;overflow-y:hidden;overflow-x:scroll;display:flex;align-items:stretch;scroll-snap-type:x mandatory}.slider.svelte-de6wr3.svelte-de6wr3::-webkit-scrollbar{display:none}.slider.svelte-de6wr3 .slide.svelte-de6wr3{flex-shrink:0;padding:20px 0 20px 20px;scroll-snap-align:center}.slider.svelte-de6wr3 .slide.svelte-de6wr3:last-child{padding-right:20px}.slider2.svelte-de6wr3.svelte-de6wr3{-ms-overflow-style:none;scrollbar-width:none;width:auto;overflow-y:hidden;overflow-x:scroll;display:flex;align-items:stretch;scroll-snap-type:x mandatory}.section.svelte-de6wr3.svelte-de6wr3{padding-bottom:0px}.slider2.svelte-de6wr3.svelte-de6wr3::-webkit-scrollbar{display:none}.slider2.svelte-de6wr3 .slide2.svelte-de6wr3{flex-shrink:0;padding:20px 0 20px 20px;scroll-snap-align:center}.slider2.svelte-de6wr3 .slide2.svelte-de6wr3:last-child{padding-right:20px}.contentBody.svelte-de6wr3.svelte-de6wr3{padding-bottom:80px}',
  map: null
};
const Page = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  let name = "Chloé dupont";
  let courses = [];
  let categories = [];
  $$result.css.add(css);
  return `<div class="contentBody svelte-de6wr3">${validate_component(Localisation, "Localisation").$$render($$result, {}, {}, {})}
	${`${validate_component(HelloUser, "HelloUser").$$render($$result, { name }, {}, {})}`}
	${validate_component(Recherche, "Recherche").$$render($$result, {}, {}, {})}


	<section class="section Categorie svelte-de6wr3"><div class="container"><h2 class="subtitle svelte-de6wr3">Catégorie
			</h2>
			<div class="slider svelte-de6wr3">${each(categories, (category) => {
    return `<div class="slide svelte-de6wr3">${validate_component(Categories, "Categories").$$render(
      $$result,
      {
        id: category.category_id,
        categorie: category.category_name
      },
      {},
      {}
    )}
				</div>`;
  })}</div></div></section>

	<section class="section svelte-de6wr3"><div class="container"><h2 class="subtitle svelte-de6wr3">Populaire
		  </h2>
		  <div class="slider2 svelte-de6wr3">${each(courses, (course) => {
    return `<div class="slide2 svelte-de6wr3">${validate_component(City, "City").$$render(
      $$result,
      {
        city: course.Course_name,
        distance: course.Course_distance,
        image: course.Course_image,
        id: course.Course_id,
        heart: "heart"
      },
      {},
      {}
    )}
			</div>`;
  })}</div></div></section>

	${validate_component(Navbar, "Navbar").$$render(
    $$result,
    {
      home: "Home_active",
      pin: "Pin",
      like: "Like"
    },
    {},
    {}
  )}
</div>`;
});
export {
  Page as default
};
