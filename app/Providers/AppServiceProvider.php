<?php

namespace App\Providers;
use App\Models\Cms;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('user.common.header', function ($view) {
            $email_data = Cms::where('type', 'contact_email')->get();
            $gmail_link_data = Cms::where('type', 'gmail_link')->get();
            $twitter_link_data = Cms::where('type', 'twitter_link')->get();
            $fb_link_data = Cms::where('type', 'fb_link')->get();
            $insra_link_data = Cms::where('type', 'insra_link')->get();
            $youtube_link_data = Cms::where('type', 'youtube_link')->get();
            $setting_data=array(
                "contact_email"=>$email_data->details,
                "gmail_link"=>$gmail_link_data->details,
                "twitter_link"=>$twitter_link_data->details,
                "fb_link"=>$fb_link_data->details,
                "insra_link"=>$insra_link_data->details,
                "youtube_link"=>$youtube_link_data->details
            )
        $view->with('settings', $setting_data);
    });
    }
}
