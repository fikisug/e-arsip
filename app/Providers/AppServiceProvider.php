<?php

namespace App\Providers;

use App\Models\File;
use App\Models\Kategori;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('allKategori', Kategori::all()->where('hapus', 0));
        Blade::directive('active', function ($expression) {
            return "<?php echo Route::is($expression) ? 'active' : ''; ?>";
        });
    }
}
