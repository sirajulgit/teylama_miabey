<?php

namespace App\Providers;
use App\Models\Cms;
use App\Models\CmsContact;

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
       View::composer(['user.common.header', 'user.common.footer'], function ($view) {
    //$email_data = Cms::where('type', 'contact_email')->first();
    $gmail_link_data = Cms::where('type', 'gmail_link')->first();
    $twitter_link_data = Cms::where('type', 'twitter_link')->first();
    $fb_link_data = Cms::where('type', 'fb_link')->first();
    $insra_link_data = Cms::where('type', 'insra_link')->first();
    $youtube_link_data = Cms::where('type', 'youtube_link')->first();
    $contact_no_data = CmsContact::first();

    $setting_data = [
        "contact_email" => optional($contact_no_data)->email,
        "gmail_link"    => optional($gmail_link_data)->details,
        "twitter_link"  => optional($twitter_link_data)->details,
        "fb_link"       => optional($fb_link_data)->details,
        "insra_link"    => optional($insra_link_data)->details,
        "youtube_link"  => optional($youtube_link_data)->details,
        "contact_no"  => optional($contact_no_data)->phone,
         "address"  => optional($contact_no_data)->address,
    ];

    $view->with('settings', $setting_data);
});
    }
}
