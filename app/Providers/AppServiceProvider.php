<?php

namespace App\Providers;

use App\Contact;
use App\Education;
use App\Level;
use App\Material;
use App\Other;
use App\SellerMessage;
use App\Semester;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        $setting = Setting::where('status', 1)->first();
        $education = Education::where('status', 1)->get();


        \view()->composer('dashboard.master', function ($view) use ($setting, $education) {
            $view->with('setting', $setting)->with('education', $education);
        });

       
        \view()->composer('dashboard.readmaster', function ($view) use ($setting, $education) {
            $contacts = Contact::where('status', 0)->get();
            $view->with('setting', $setting)->with('education', $education)->with('contacts', $contacts);
        });

        \view()->composer('client.master', function ($view) use ($setting) {
            $view->with('setting', $setting);
        });

        \view()->composer('client.master', function ($view) {
            $id = Auth::guard('client')->user()->id;
            $mesgs = SellerMessage::where('client_id', $id)->where('status', 1)->get();
            $view->with('mesgs', $mesgs);
        });

        \view()->composer('dashboard.master', function ($view) {
            $contacts = Contact::where('status', 0)->take(5)->latest()->get();
            $view->with('contacts', $contacts);
        });
        
        
        \view()->composer('dashboard.master', function ($view) {
            $adminmessages = SellerMessage::where('status', 0)->where('seller_id', auth()->id())->take(5)->latest()->get();
            $view->with('adminmessages', $adminmessages);
        });
        
          \view()->composer('dashboard.readmaster', function ($view) {
            $contacts = Contact::where('status', 0)->get();
            $view->with('contacts', $contacts);
        });

        \view()->composer('frontend.master', function ($view) use ($setting, $education) {
            $materials = Material::where('status', 1)->get();
            $levels = Level::where('status', 1)->get();
            $semesters = Semester::where('status', 1)->get();
            $others = Other::where('status', 1)->get();

            $view->with('setting', $setting)
                ->with('education', $education)
                ->with('materials', $materials)
                ->with('levels', $levels)
                ->with('semesters', $semesters)
                ->with('others', $others);
        });
    }
}
