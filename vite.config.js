import { sveltekit } from '@sveltejs/kit/vite';

const config = {
  plugins: [sveltekit()],
  server: {
    fs: {
      allow: ['/backend', '/src']
    }
  }
};

export default config;