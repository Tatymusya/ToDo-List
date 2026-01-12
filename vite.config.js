import { defineConfig } from 'vite';
import path from 'path';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import postcssNesting from 'postcss-nesting';
import createSvgSpritePlugin from 'vite-plugin-svg-sprite';
import svgLoader from 'vite-svg-loader';

export default defineConfig({
    css: {
        postcss: {
            plugins: [
                postcssNesting
            ],
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue(),
        createSvgSpritePlugin({
            exportType: 'vue',
            include: 'resources/images/icons/**.svg'
        }),
        svgLoader(),
    ],
    server: {
        proxy: {
            "/api": {
                ws: true,
                changeOrigin: true,
                target: "http://localhost:8000"
            }
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
    resolve: {
        alias: {
        '@': path.resolve(__dirname, './resources'),
        '@js': path.resolve(__dirname, './resources/js'),
        '@css': path.resolve(__dirname, './resources/css'),
        }
    }
});
