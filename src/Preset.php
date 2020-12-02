<?php
namespace Marseniou\BulmaPreset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;

	use Illuminate\Support\Facades\File;

    use Laravel\Ui\Presets\Preset as MarseniouPreset;

    class Preset extends MarseniouPreset
    {
        public static function install()
        {
            Artisan::call('ui vue --auth -n');
        	static::makeSassDirectory();
        	static::updatePackages();
        	static::updateMix();
        	static::updateScripts();
        	static::updateStyles();
            static::updateViews();
            
        }
        public static function makeSassDirectory(){
        	File::ensureDirectoryExists(resource_path('sass'));
        }
        public static function updatePackageArray($packages){
        	return array_merge(["sass"=>"^1.20.1","sass-loader"=>"^8.0.0","vue"=> "^2.5.17","vue-template-compiler"=>"^2.6.10", "bulma"=>"^0.9.1","cross-env"=>"^7.0"],Arr::except($packages, [
        		'lodash',
                'jquery',
                'bootstrap',
                'popper.js',
        	]));
        }
        public static function updateMix(){
        	copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
        }
        public static function updateScripts(){
        	copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));	
        	copy(__DIR__.'/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
        }
        public static function updateStyles(){
        	copy(__DIR__.'/stubs/app.scss', resource_path('sass/app.scss'));
        	copy(__DIR__.'/stubs/_overrides.scss', resource_path('sass/_overrides.scss'));
        	copy(__DIR__.'/stubs/_variables.scss', resource_path('sass/_variables.scss'));
        }
        public static function updateViews(){
            copy(__DIR__.'/stubs/app.blade.php', resource_path('views/layouts/app.blade.php'));
            copy(__DIR__.'/stubs/lmenu.vue', resource_path('js/components/lmenu.vue'));
        }
    }
