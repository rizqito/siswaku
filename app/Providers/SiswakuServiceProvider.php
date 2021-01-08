<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class SiswakuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';
        if(Request::Segment(1)=='siswa'){
            $halaman = 'siswa';
        }
        if(Request::Segment(1)=='about'){
            $halaman = 'about';
        }
        if(Request::Segment(1)=='kelas'){
            $halaman = 'kelas';
        }
        if(Request::Segment(1)=='hobi'){
            $halaman = 'hobi';
        }
        if(Request::Segment(1)=='user'){
            $halaman = 'user';
        }
        view()->share('halaman',$halaman);
    }
}
