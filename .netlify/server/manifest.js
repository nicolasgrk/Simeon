export const manifest = {
	appDir: "_app",
	appPath: "_app",
	assets: new Set(["assets/fonts/poppins/OFL.txt","assets/fonts/poppins/Poppins-Black.ttf","assets/fonts/poppins/Poppins-BlackItalic.ttf","assets/fonts/poppins/Poppins-Bold.ttf","assets/fonts/poppins/Poppins-BoldItalic.ttf","assets/fonts/poppins/Poppins-ExtraBold.ttf","assets/fonts/poppins/Poppins-ExtraBoldItalic.ttf","assets/fonts/poppins/Poppins-ExtraLight.ttf","assets/fonts/poppins/Poppins-ExtraLightItalic.ttf","assets/fonts/poppins/Poppins-Italic.ttf","assets/fonts/poppins/Poppins-Light.ttf","assets/fonts/poppins/Poppins-LightItalic.ttf","assets/fonts/poppins/Poppins-Medium.ttf","assets/fonts/poppins/Poppins-MediumItalic.ttf","assets/fonts/poppins/Poppins-Regular.ttf","assets/fonts/poppins/Poppins-SemiBold.ttf","assets/fonts/poppins/Poppins-SemiBoldItalic.ttf","assets/fonts/poppins/Poppins-Thin.ttf","assets/fonts/poppins/Poppins-ThinItalic.ttf","assets/manifest.json","assets/sw.js","favicon.png","img/.DS_Store","img/categorie/Camper.svg","img/categorie/Historique.svg","img/categorie/Mer.svg","img/detail_parcours/basilic_saint_sauveur_dinan.jpeg","img/detail_parcours/cathedrale_quimper.jpeg","img/detail_parcours/centre_historique_rennes.jpeg","img/detail_parcours/champs_libre_rennes.jpeg","img/detail_parcours/chateau_dinan.jpeg","img/detail_parcours/jardin_quimper.jpeg","img/detail_parcours/jardin_thabor_rennes.jpeg","img/detail_parcours/maison_gouverneur_dinan.jpeg","img/detail_parcours/musee_beaux_art_rennes.jpeg","img/detail_parcours/musee_beaux_arts_quimper.jpeg","img/detail_parcours/musee_breton_quimper.jpeg","img/detail_parcours/parlement_rennes.jpeg","img/detail_parcours/rempart_dinan.jpeg","img/detail_parcours/terre.png","img/detail_parcours/tour_horloge_dinan.jpeg","img/icons/.DS_Store","img/icons/192.png","img/icons/512.png","img/icons/cible.svg","img/icons/heart.svg","img/icons/heart_full.svg","img/icons/heart_like.svg","img/icons/left_arrow.svg","img/icons/login_arrow.svg","img/icons/reglage.svg","img/icons/right_arrow.svg","img/icons/settings.svg","img/icons/star.svg","img/icons/star_light.svg","img/login/Hey.png","img/login/Hey.svg","img/login/lock.png","img/login/lock.svg","img/login/logo.png","img/login/logo.svg","img/login/mail.png","img/login/mail.svg","img/login/user-edit.png","img/login/user-edit.svg","img/login/user.png","img/login/user.svg","img/navbarIcons/.DS_Store","img/navbarIcons/Home.svg","img/navbarIcons/Home_active.svg","img/navbarIcons/Like.svg","img/navbarIcons/Like_active.svg","img/navbarIcons/Pin.svg","img/navbarIcons/Pin_active.svg","img/navbarIcons/flash.svg","img/navbarIcons/routing.svg","img/navbarIcons/search.svg","img/populaire/dinan.png","img/populaire/quimper.png","img/populaire/rennes.png","img/user/john_doe.jpeg","style/global.css"]),
	mimeTypes: {".txt":"text/plain",".ttf":"font/ttf",".json":"application/json",".js":"application/javascript",".png":"image/png",".svg":"image/svg+xml",".jpeg":"image/jpeg",".css":"text/css"},
	_: {
		client: {"start":{"file":"_app/immutable/entry/start.3e24caeb.js","imports":["_app/immutable/entry/start.3e24caeb.js","_app/immutable/chunks/index.f99c9f29.js","_app/immutable/chunks/singletons.a3cf65e2.js"],"stylesheets":[],"fonts":[]},"app":{"file":"_app/immutable/entry/app.6d57733e.js","imports":["_app/immutable/entry/app.6d57733e.js","_app/immutable/chunks/index.f99c9f29.js"],"stylesheets":[],"fonts":[]}},
		nodes: [
			() => import('./nodes/0.js'),
			() => import('./nodes/1.js'),
			() => import('./nodes/2.js'),
			() => import('./nodes/3.js'),
			() => import('./nodes/4.js'),
			() => import('./nodes/5.js'),
			() => import('./nodes/6.js'),
			() => import('./nodes/7.js'),
			() => import('./nodes/8.js'),
			() => import('./nodes/9.js')
		],
		routes: [
			{
				id: "/",
				pattern: /^\/$/,
				params: [],
				page: { layouts: [0], errors: [1], leaf: 2 },
				endpoint: null
			},
			{
				id: "/accueil",
				pattern: /^\/accueil\/?$/,
				params: [],
				page: { layouts: [0], errors: [1], leaf: 3 },
				endpoint: null
			},
			{
				id: "/detail_categorie/[id]",
				pattern: /^\/detail_categorie\/([^/]+?)\/?$/,
				params: [{"name":"id","optional":false,"rest":false,"chained":false}],
				page: { layouts: [0], errors: [1], leaf: 4 },
				endpoint: null
			},
			{
				id: "/detail_parcours/[id]",
				pattern: /^\/detail_parcours\/([^/]+?)\/?$/,
				params: [{"name":"id","optional":false,"rest":false,"chained":false}],
				page: { layouts: [0], errors: [1], leaf: 5 },
				endpoint: null
			},
			{
				id: "/like",
				pattern: /^\/like\/?$/,
				params: [],
				page: { layouts: [0], errors: [1], leaf: 6 },
				endpoint: null
			},
			{
				id: "/map",
				pattern: /^\/map\/?$/,
				params: [],
				page: { layouts: [0], errors: [1], leaf: 7 },
				endpoint: null
			},
			{
				id: "/profil",
				pattern: /^\/profil\/?$/,
				params: [],
				page: { layouts: [0], errors: [1], leaf: 8 },
				endpoint: null
			},
			{
				id: "/test",
				pattern: /^\/test\/?$/,
				params: [],
				page: { layouts: [0], errors: [1], leaf: 9 },
				endpoint: null
			}
		],
		matchers: async () => {
			
			return {  };
		}
	}
};
