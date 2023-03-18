import { c as create_ssr_component, v as validate_component, e as escape, f as add_attribute, d as each } from "../../../../chunks/index.js";
import { N as Navbar } from "../../../../chunks/Navbar.js";
import { C as City } from "../../../../chunks/City.js";
import { L as Localisation } from "../../../../chunks/Localisation.js";
const _page_svelte_svelte_type_style_lang = "";
const css = {
  code: 'h2.svelte-f40jd8{font-family:"Poppins", sans-serif;font-size:30px;color:#142B63;font-weight:bold}.contentBody.svelte-f40jd8{padding-bottom:80px}.image-text-wrapper.svelte-f40jd8{display:flex;align-items:center}.image.svelte-f40jd8{margin-right:10px}.text.svelte-f40jd8{font-size:18px;font-weight:bold;margin-left:10px;margin-right:10px}',
  map: null
};
const Page = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  let category_name;
  let courses = [];
  $$result.css.add(css);
  return `<div class="contentBody svelte-f40jd8">${validate_component(Localisation, "Localisation").$$render($$result, {}, {}, {})}

	<section class="section Like"><div class="container"><div class="image-text-wrapper svelte-f40jd8"><img src="${"/src/img/categorie/" + escape(category_name, true) + ".svg"}"${add_attribute("alt", category_name, 0)} class="image icons svelte-f40jd8">
				<div class="text svelte-f40jd8"><h2 class="subtitle svelte-f40jd8">${escape(category_name)}</h2></div>
				<img src="/src/img/icons/reglage.svg" alt="Image 2" class="image settings svelte-f40jd8"></div></div></section>
	<section class="section"><div class="container"><div class="columns is-mobile is-multiline">${each(courses, (course) => {
    return `<div class="column">${validate_component(City, "City").$$render(
      $$result,
      {
        city: course.course_name,
        distance: course.course_distance,
        image: course.course_image,
        id: course.course_id,
        heart: "heart_full"
      },
      {},
      {}
    )}
			</div>`;
  })}</div></div></section>
	


	${validate_component(Navbar, "Navbar").$$render($$result, { home: "Home", pin: "Pin", like: "Like" }, {}, {})}
</div>`;
});
export {
  Page as default
};
