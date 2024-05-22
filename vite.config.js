import { defineConfig } from 'vite';

export default defineConfig({
    root: 'assets/js',
    build: {
        outDir: 'public/dist',
        rollupOptions: {
            input: {
                main: 'public/assets/js/main.js',
            },
            output: {
                entryFileNames: '[name].js',
                assetFileNames: 'assets/[name].[ext]',
                dir: 'dist',
            },
        },
    },
});
