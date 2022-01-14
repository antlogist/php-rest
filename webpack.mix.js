const mix = require("laravel-mix");

mix.js('src/app.js', 'dist/js').vue({ version: 2 });
