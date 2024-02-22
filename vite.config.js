import { dirname } from "path";
import { fileURLToPath } from "url";

import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ["resources/js/app.js"],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": dirname(fileURLToPath(import.meta.url)) + "/resources",
            "@src": dirname(fileURLToPath(import.meta.url)) + "/resources/js",
            "@assets": dirname(fileURLToPath(import.meta.url)) + "/resources/assets",
            "@styles": dirname(fileURLToPath(import.meta.url)) + "/resources/styles",
        },
    },
});
