<?php
namespace LaravelFrontendPresets\W3cssPreset;

use Artisan;
use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;

class W3cssPreset extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install($withAuth = false)
    {
        static::updatePackages();
        static::updateSass();
        static::updateBootstrapping();

        if ($withAuth) {
            static::addAuthTemplates();
        } else {
            static::updateWelcomePage();
        }

        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
            'w3-css' => '^4.0.4',
        ] + Arr::except($packages, ['bootstrap-sass', 'foundation-sites', 'uikit']);
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        // clean up orphan files
        $orphan_sass_files = glob(resource_path('/assets/sass/*.*'));

        foreach ($orphan_sass_files as $sass_file) {
            (new Filesystem)->delete($sass_file);
        }

        copy(__DIR__.'/w3css-stubs/_variables.scss', resource_path('assets/sass/_variables.scss'));
        copy(__DIR__.'/w3css-stubs/app.scss', resource_path('assets/sass/app.scss'));
    }


    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        (new Filesystem)->delete(
            resource_path('assets/js/bootstrap.js')
        );

        copy(__DIR__.'/w3css-stubs/bootstrap.js', resource_path('assets/js/bootstrap.js'));
    }


    /**
     * Update the default welcome page file with W3css buttons.
     *
     * @return void
     */
    protected static function updateWelcomePage()
    {
        // remove default welcome page
        (new Filesystem)->delete(
            resource_path('views/welcome.blade.php')
        );

        // copy new one with W3css buttons
        copy(__DIR__.'/w3css-stubs/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }

    /**
     * Copy W3css Auth view templates.
     *
     * @return void
     */
    protected static function addAuthTemplates()
    {
        // Add Home controller
        copy(__DIR__.'/w3css-stubs/Controllers/HomeController.php', app_path('Http/Controllers/HomeController.php'));

        // Add Auth route in 'routes/web.php'
        $auth_route_entry = "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n";
        file_put_contents('./routes/web.php', $auth_route_entry, FILE_APPEND);

        // Copy W3css Auth view templates
        (new Filesystem)->copyDirectory(__DIR__.'/w3css-stubs/views', resource_path('views'));
    }
}
