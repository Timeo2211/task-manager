const mix = require('laravel-mix');          // Importe Laravel Mix (outil de compilation simplifié basé sur Webpack)
const tailwindcss = require('tailwindcss');  // Importe Tailwind CSS comme plugin PostCSS

// Compilation du JavaScript principal (ex. Alpine, Livewire, etc.)
mix.js('resources/js/app.js', 'public/js')

    // Compilation du fichier CSS avec PostCSS et Tailwind CSS
    .postCss('resources/css/app.css', 'public/css', [
        tailwindcss, // Applique Tailwind CSS à app.css
    ]);
