var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
   //  mix.less('app.less')
   // .styles([ // Site's styles
   //    "bootstrap-reset.css",
   //    "bootstrap.min.css",
   //    "font-awesome.min.css",
   //      "owl.carousel.css",
   //    "app.css"
   //  ], "public/css/site_all.css", "public/css");

    // Frontend's scripts
    //
    // mix.scripts([
    //   "jquery.js",
    //   "bootstrap.min.js",
    //   // "particles.min.js",
    //     "owl.carousel.min.js",
    //     "classie.js",
    //   // "fss.js",
    //   // "fss-settings.js",
    //   "animate_header.js",
    //   "site.js"
    // ], "public/js/site_all.js", "public/js");

    // Admin's styles
    //
    mix.styles([
      "bootstrap-reset.css",
      "bootstrap.min.css",
      "font-awesome.min.css",
      "clndr.css",
      "style.css",
      "style-responsive.css",
      "admin.css",
    ], "public/css/admin_all.css", "public/css");

    // Admin's scripts
    //
    mix.scripts([
      "jquery.js",
      "jquery-ui/jquery-ui-1.10.1.custom.min.js",
      "bootstrap.min.js",
      "jquery.dcjqaccordion.2.7.js",
      "jquery.scrollTo.min.js",
      "jQuery-slimScroll-1.3.0/jquery.slimscroll.js",
      "jquery.nicescroll.js",
      "jquery.easing.min.js",
      "calendar/clndr.js",
      "underscore-min.js",
      "calendar/moment-2.2.1.js",
      "evnt.calendar.init.js",
      "gauge/gauge.js",
      "jquery.customSelect.min.js",
      "advanced-datatable/js/jquery.dataTables.js",
      "data-tables/DT_bootstrap.js",
      // "ckeditor/ckeditor.js",
      "tinymce4x/tinymce.min.js",
      "select2/select2.js",
      "scripts.js",
      "dynamic_table_init.js",
      "admin.js",
    ], "public/js/admin_all.js", "public/js")
});
