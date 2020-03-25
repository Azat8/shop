const { mix } = require("laravel-mix");
require("laravel-mix-merge-manifest");

var publicPath;
if (mix.inProduction()) {
    publicPath = "publishable/assets";
} else {
    publicPath = "../../../public/vendor/HG/crud/assets";
}

mix.setPublicPath(publicPath).mergeManifest();

mix.disableNotifications();

mix
    .sass(__dirname + "/src/Resources/assets/sass/app.scss", "css/crud.css")
    .options({
        processCssUrls: false
    });

if (mix.inProduction()) {
    mix.version();
}