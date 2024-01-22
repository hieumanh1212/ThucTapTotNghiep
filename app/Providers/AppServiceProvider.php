<?php

namespace App\Providers;

use App\Models\SanPham;
use App\Models\MauSac;
use App\Models\ChiTietSanPham;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\TheLoai;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginator;
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

        $categories = TheLoai::all();
        View::share('categories', $categories);

        $colors = MauSac::all();
        View::share('colors', $colors);

        // count the quantity of products each category in SanPham table
        $countProductEachCategory = [];
        foreach ($categories as $category) {
            $countProductEachCategory[] = [
                'ma_the_loai' => $category->ma_the_loai,
                'ten_the_loai' => $category->ten_the_loai,
                'count' => SanPham::where('ma_the_loai', $category->ma_the_loai)->count(),
            ];
        }
        View::share('countProductEachCategory', $countProductEachCategory);
        
        Blade::directive('formatCurrency', function ($money) {
            return "<?php echo number_format($money, 0) . ' đ'; ?>";
        });

        Paginator::useBootstrap();
        

    }
}
