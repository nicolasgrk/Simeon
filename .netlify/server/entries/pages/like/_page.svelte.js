import { c as create_ssr_component, v as validate_component, d as each } from "../../../chunks/index.js";
import { N as Navbar } from "../../../chunks/Navbar.js";
import { C as City } from "../../../chunks/City.js";
import { H as Header2 } from "../../../chunks/Header2.js";
const _page_svelte_svelte_type_style_lang = "";
const css = {
  code: '.Like.svelte-1beqkpd{padding-top:0;padding-bottom:0}h2.svelte-1beqkpd{font-family:"Poppins", sans-serif;font-size:30px;color:#142B63;font-weight:bold}.contentBody.svelte-1beqkpd{padding-bottom:80px}.image-text-wrapper.svelte-1beqkpd{display:flex;align-items:center}.image.svelte-1beqkpd{margin-right:10px}.text.svelte-1beqkpd{font-size:18px;font-weight:bold;margin-left:10px;margin-right:10px}',
  map: null
};
const Page = create_ssr_component(($$result, $$props, $$bindings, slots) => {
  let likes = [];
  $$result.css.add(css);
  return `<div class="contentBody svelte-1beqkpd">${validate_component(Header2, "Header2").$$render($$result, {}, {}, {})}

	<section class="section Like svelte-1beqkpd"><div class="container"><div class="image-text-wrapper svelte-1beqkpd"><img src="/img/icons/heart_like.svg" alt="heartFull" class="image icons svelte-1beqkpd">
				<div class="text svelte-1beqkpd"><h2 class="subtitle svelte-1beqkpd">Like
					</h2></div>
				<img src="/img/icons/reglage.svg" alt="Image 2" class="image settings svelte-1beqkpd"></div></div></section>
	
	<section class="section"><div class="container"><div class="columns is-mobile is-multiline">${each(likes, (like) => {
    return `<div class="column">${validate_component(City, "City").$$render(
      $$result,
      {
        city: like.course_name,
        distance: like.course_distance,
        image: like.course_image,
        id: like.course_id,
        heart: "heart_full"
      },
      {},
      {}
    )}
			</div>`;
  })}</div></div></section>


	${validate_component(Navbar, "Navbar").$$render(
    $$result,
    {
      home: "Home",
      pin: "Pin",
      like: "Like_active"
    },
    {},
    {}
  )}
</div>`;
});
export {
  Page as default
};
