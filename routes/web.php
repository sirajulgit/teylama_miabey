<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AuthController as AdminAuthController;
use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\CmsHomePageController;
use App\Http\Controllers\admin\CmsAboutPageController;
use App\Http\Controllers\admin\CmsBannerController;
use App\Http\Controllers\admin\CmsController;
use App\Http\Controllers\admin\CmsBookController;
use App\Http\Controllers\admin\CmsBibliographyController;
use App\Http\Controllers\admin\CmsAwardHonorsController;
use App\Http\Controllers\admin\CmsNewsEventsController;
use App\Http\Controllers\admin\CmsBlogPageController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\AwardController;
use App\Http\Controllers\admin\BibliographyController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\CmsContactController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ContactQueryController;

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CurrencyRateController;
use App\Http\Controllers\admin\CryptoAppController;
use App\Http\Controllers\admin\PurchaseRequestController;
use App\Http\Controllers\admin\WithdrawlRequestController;

use App\Http\Controllers\user\AuthController;
use App\Http\Controllers\user\DashboardController as UserDashboardController;
use App\Http\Controllers\user\AccountManagementController;
use App\Http\Controllers\user\LiveSupportController;
use App\Http\Controllers\user\UserProfileController;
use App\Http\Controllers\user\BuyProductController;
use App\Http\Controllers\user\WithdrawlController;
use App\Http\Controllers\user\PurchaseHistoryController;
use App\Http\Controllers\user\TransactionHistoryController;
use App\Http\Controllers\user\ChangePasswordController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\AboutUsController;
use App\Http\Controllers\user\BlogsController as UserBlogsController;
use App\Http\Controllers\user\ContactUsController;
use App\Http\Controllers\user\EventsController as UserEventsController;
use App\Http\Controllers\user\GalleryController as UserGalleryController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// +++++++++++++++++++++++ |  User Routes  |  ++++++++++++++++++++++++++++++++++++
Route::middleware('isGuest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about-me', [AboutUsController::class, 'index'])->name('about_us');
    Route::get('/blogs', [UserBlogsController::class, 'index'])->name('blogs');
    Route::get('/blogs/{slug}', [UserBlogsController::class, 'blog_details'])->name('blog_details');
    Route::get('/events', [UserEventsController::class, 'index'])->name('events');
    Route::get('/events/{slug}', [UserEventsController::class, 'event_details'])->name('event_details');
    Route::get('/gallery', [UserGalleryController::class, 'index'])->name('gallery');
    Route::get('/contact-me', [ContactUsController::class, 'index'])->name('contact_us');
    Route::post('/contact-me', [ContactUsController::class, 'post_contact_us'])->name('post_contact_us');
    // Route::post('/login', [AuthController::class, 'post_login'])->name('post_user_login');
    // Route::get('/register', [AuthController::class, 'register'])->name('user_register');
    // Route::post('/register', [AuthController::class, 'post_register'])->name('post_user_register');

});

// Route::middleware('auth')->group(function () {
//     Route::post('/logout', [AuthController::class, 'logout'])->name('user_logout');

//     // +++++++++++++++ | dashboard | +++++++++++++++
//     Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user_dashboard');


//     // ################ | Start account management | ################

//     Route::get('/account-management', [AccountManagementController::class, 'index'])->name('user_account.index');
//     Route::post('/account-management', [AccountManagementController::class, 'post_create'])->name('user_account.post_create');
//     Route::post('/upi-management', [AccountManagementController::class, 'post_upi_create'])->name('user_account.post_upi_create');

//     Route::post('/account-delete', [AccountManagementController::class, 'delete'])->name('user_account.delete');

//     // ################ | withdrawl | ################

//     Route::get('/withdrawl', [WithdrawlController::class, 'index'])->name('user_account.withdrawl');
//     Route::post('/withdrawl-request', [WithdrawlController::class, 'post_withdrawl_create'])->name('user_account.post_withdrawl_create');

//     // ################ | Purchase History | ################

//     Route::get('/purchase-history', [PurchaseHistoryController::class, 'index'])->name('user_account.purchase_history');

//     // ################ | Transaction History | ################

//     Route::get('/transaction-history', [TransactionHistoryController::class, 'index'])->name('user_account.transaction_history');

//  // ################ | Change Password | ################

//     Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('user_account.change_password');

//     // +++++++++++++++ | Buy product | +++++++++++++++
//     Route::get('/buy-product/{id}', [BuyProductController::class, 'index'])->name('user_account.buy_product');

//     Route::post('/make-payment', [BuyProductController::class, 'makePayment'])->name('user_account.make_payment');

//     Route::get('/payment-qr/{purchase_request_id}', [BuyProductController::class, 'paymentQRGenerate'])->name('user_account.payment_qr_generate');

//     // ################ | End account management | ################


//     // +++++++++++++++ | live support | +++++++++++++++
//     Route::get('/live-support', [LiveSupportController::class, 'index'])->name('user_live_support');

//     // +++++++++++++++ | user profile | +++++++++++++++
//     Route::get('/edit-profile', [UserProfileController::class, 'index'])->name('user_profile.index');
// });



// +++++++++++++++++++++++ |  Admin Routes  |  ++++++++++++++++++++++++++++++++++++
Route::prefix('admin')->middleware('isGuest')->group(function () {

    Route::get('/', function () {
        return redirect('login');
    });

    Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'post_login'])->name('post_login');


    Route::get('/forget-password', [AdminAuthController::class, 'forget_password_page'])->name('forget_password_page');
    Route::post('/forget-password', [AdminAuthController::class, 'post_forget_password_page'])->name('post_forget_password_page');


    Route::get('/otp', [AdminAuthController::class, 'otp_page'])->name('otp');
    Route::post('/otp-send', [AdminAuthController::class, 'otp_send'])->name('otp_send');
    Route::post('/otp-verify', [AdminAuthController::class, 'otp_verify'])->name('otp_verify');


    Route::get('/confirm-password', [AdminAuthController::class, 'confirmPassword_page'])->name('confirmPassword_page');
    Route::post('/confirm-password', [AdminAuthController::class, 'post_confirmPassword_page'])->name('post_confirmPassword_page');
});



Route::prefix('admin')->middleware(['admin.auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/book', [BookController::class, 'index'])->name('book_list');
    Route::get('/book-create', [BookController::class, 'create'])->name('book_create');
    Route::post('/book-create', [BookController::class, 'post_create'])->name('post_book_create');
    Route::get('/book-edit/{id}', [BookController::class, 'update'])->name('book_edit');
    Route::post('/book-edit/{id}', [BookController::class, 'post_update'])->name('post_book_edit');
    Route::post('/book-delete', [BookController::class, 'delete'])->name('book_delete');

    Route::get('/user', [UserController::class, 'index'])->name('user_list');
    Route::get('/user-create', [UserController::class, 'create'])->name('user_create');
    Route::post('/user-create', [UserController::class, 'post_create'])->name('post_user_create');
    Route::get('/user-edit/{id}', [UserController::class, 'update'])->name('user_edit');
    Route::post('/user-edit/{id}', [UserController::class, 'post_update'])->name('post_user_edit');
    Route::post('/user-delete', [UserController::class, 'delete'])->name('user_delete');

    Route::get('/product', [ProductController::class, 'index'])->name('product_list');
    Route::get('/product-create', [ProductController::class, 'create'])->name('product_create');
    Route::post('/product-create', [ProductController::class, 'post_create'])->name('post_product_create');
    Route::get('/product-edit/{id}', [ProductController::class, 'update'])->name('product_edit');
    Route::post('/product-edit/{id}', [ProductController::class, 'post_update'])->name('post_product_edit');
    Route::post('/product-delete', [ProductController::class, 'delete'])->name('product_delete');

    Route::get('/currency-rate', [CurrencyRateController::class, 'index'])->name('currency_rate_list');
    Route::get('/currency-rate-create', [CurrencyRateController::class, 'create'])->name('currency_rate_create');
    Route::post('/currency-rate-create', [CurrencyRateController::class, 'post_create'])->name('post_currency_rate_create');
    Route::get('/currency-rate-edit/{id}', [CurrencyRateController::class, 'update'])->name('currency_rate_edit');
    Route::post('/currency-rate-edit/{id}', [CurrencyRateController::class, 'post_update'])->name('post_currency_rate_edit');
    Route::post('/currency-rate-delete', [CurrencyRateController::class, 'delete'])->name('currency_rate_delete');

    Route::get('/crypto-app', [CryptoAppController::class, 'index'])->name('crypto_app_list');
    Route::get('/crypto-app-create', [CryptoAppController::class, 'create'])->name('crypto_app_create');
    Route::post('/crypto-app-create', [CryptoAppController::class, 'post_create'])->name('post_crypto_app_create');
    Route::get('/crypto-app-edit/{id}', [CryptoAppController::class, 'update'])->name('crypto_app_edit');
    Route::post('/crypto-app-edit/{id}', [CryptoAppController::class, 'post_update'])->name('post_crypto_app_edit');
    Route::post('/crypto-app-delete', [CryptoAppController::class, 'delete'])->name('crypto_app_delete');

    Route::get('/purchase-request', [PurchaseRequestController::class, 'index'])->name('purchase_request_list');

    Route::get('/purchase-request-edit/{id}', [PurchaseRequestController::class, 'update'])->name('purchase_request_edit');
    Route::post('/purchase-request-edit/{id}', [PurchaseRequestController::class, 'post_update'])->name('post_purchase_request_edit');
    Route::post('/purchase-request-delete', [PurchaseRequestController::class, 'delete'])->name('purchase_request_delete');

    Route::get('/withdrawl-request', [WithdrawlRequestController::class, 'index'])->name('withdrawl_request_list');
    Route::get('/withdrawl-request-edit/{id}', [WithdrawlRequestController::class, 'update'])->name('withdrawl_request_edit');
    Route::post('/withdrawl-request-edit/{id}', [WithdrawlRequestController::class, 'post_update'])->name('post_withdrawl_request_edit');



    // +++++++++++++++++++++++ |  cms |  ++++++++++++++++++++++++++++++++++++
    // ############ | cms home page | ################
    Route::get('/cms-home', [CmsHomePageController::class, 'home_page'])->name('cms_home');
    Route::post('/cms-home', [CmsHomePageController::class, 'post_update'])->name('post_cms_home');
    Route::post('/cms-badge-delete', [CmsHomePageController::class, 'post_badge_delete'])->name('post_badge_delete');
    Route::post('/cms-badge-update', [CmsHomePageController::class, 'post_badge_update'])->name('post_badge_update');
    Route::post('/about-right-img-delete', [CmsHomePageController::class, 'post_about_right_img_delete'])->name('post_about_right_img_delete');
    Route::post('/del-badge-img', [CmsHomePageController::class, 'post_del_badge_img'])->name('post_del_badge_img');


    // ############ | cms about page | ################
    Route::get('/cms-about', [CmsAboutPageController::class, 'about_page'])->name('cms_about');
    Route::post('/cms-about', [CmsAboutPageController::class, 'post_update'])->name('post_cms_about');
    Route::post('/cms-about-badge-update', [CmsAboutPageController::class, 'post_badge_update'])->name('post_cms_about_badge_update');
    Route::post('/cms-about-badge-delete', [CmsAboutPageController::class, 'post_badge_delete'])->name('post_cms_about_badge_delete');


    Route::get('/cms-banner', [CmsBannerController::class, 'index'])->name('cms_banner_list');
    Route::get('/cms-banner-create', [CmsBannerController::class, 'create'])->name('cms_banner_create');
    Route::post('/cms-banner-create', [CmsBannerController::class, 'post_create'])->name('post_cms_banner_create');
    Route::get('/cms-banner-edit/{id}', [CmsBannerController::class, 'update'])->name('cms_banner_edit');
    Route::post('/cms-banner-edit/{id}', [CmsBannerController::class, 'post_update'])->name('post_cms_banner_edit');
    Route::post('/cms-banner-delete', [CmsBannerController::class, 'delete'])->name('cms_banner_delete');


    Route::get('/cms', [CmsController::class, 'socialLinksContractEmail_List'])->name('cms_list');
    Route::post('/cms', [CmsController::class, 'socialLinksContractEmail_update'])->name('post_cms');


    Route::get('/cms-book-banner', [CmsBookController::class, 'index'])->name('cms_book_banner_list');
    Route::get('/cms-book-banner-create', [CmsBookController::class, 'create'])->name('cms_book_banner_create');
    Route::post('/cms-book-banner-create', [CmsBookController::class, 'post_create'])->name('post_cms_book_banner_create');
    Route::get('/cms-book-banner-edit/{id}', [CmsBookController::class, 'update'])->name('cms_book_banner_edit');
    Route::post('/cms-book-banner-edit/{id}', [CmsBookController::class, 'post_update'])->name('post_cms_book_banner_edit');
    Route::post('/cms-book-banner-delete', [CmsBookController::class, 'delete'])->name('cms_book_banner_delete');


    Route::get('/cms-bibliography-banner', [CmsBibliographyController::class, 'index'])->name('cms_bibliography_banner_list');
    Route::get('/cms-bibliography-banner-create', [CmsBibliographyController::class, 'create'])->name('cms_bibliography_banner_create');
    Route::post('/cms-bibliography-banner-create', [CmsBibliographyController::class, 'post_create'])->name('post_cms_bibliography_banner_create');
    Route::get('/cms-bibliography-banner-edit/{id}', [CmsBibliographyController::class, 'update'])->name('cms_bibliography_banner_edit');
    Route::post('/cms-bibliography-banner-edit/{id}', [CmsBibliographyController::class, 'post_update'])->name('post_cms_bibliography_banner_edit');
    Route::post('/cms-bibliography-banner-delete', [CmsBibliographyController::class, 'delete'])->name('cms_bibliography_banner_delete');


    Route::get('/cms-award-honors-banner', [CmsAwardHonorsController::class, 'index'])->name('cms_awardHonors_banner_list');
    Route::get('/cms-award-honors-banner-create', [CmsAwardHonorsController::class, 'create'])->name('cms_awardHonors_banner_create');
    Route::post('/cms-award-honors-banner-create', [CmsAwardHonorsController::class, 'post_create'])->name('post_cms_awardHonors_banner_create');
    Route::get('/cms-award-honors-banner-edit/{id}', [CmsAwardHonorsController::class, 'update'])->name('cms_awardHonors_banner_edit');
    Route::post('/cms-award-honors-banner-edit/{id}', [CmsAwardHonorsController::class, 'post_update'])->name('post_cms_awardHonors_banner_edit');
    Route::post('/cms-award-honors-banner-delete', [CmsAwardHonorsController::class, 'delete'])->name('cms_awardHonors_banner_delete');


    Route::get('/cms-news-events-banner', [CmsNewsEventsController::class, 'index'])->name('cms_newsEvents_banner_list');
    Route::get('/cms-news-events-banner-create', [CmsNewsEventsController::class, 'create'])->name('cms_newsEvents_banner_create');
    Route::post('/cms-news-events-banner-create', [CmsNewsEventsController::class, 'post_create'])->name('post_cms_newsEvents_banner_create');
    Route::get('/cms-news-events-banner-edit/{id}', [CmsNewsEventsController::class, 'update'])->name('cms_newsEvents_banner_edit');
    Route::post('/cms-news-events-banner-edit/{id}', [CmsNewsEventsController::class, 'post_update'])->name('post_cms_newsEvents_banner_edit');
    Route::post('/cms-news-events-banner-delete', [CmsNewsEventsController::class, 'delete'])->name('cms_newsEvents_banner_delete');


    Route::get('/cms-blogs-banner', [CmsBlogPageController::class, 'index'])->name('cms_blogs_banner_list');
    Route::get('/cms-blogs-banner-create', [CmsBlogPageController::class, 'create'])->name('cms_blogs_banner_create');
    Route::post('/cms-blogs-banner-create', [CmsBlogPageController::class, 'post_create'])->name('post_cms_blogs_banner_create');
    Route::get('/cms-blogs-banner-edit/{id}', [CmsBlogPageController::class, 'update'])->name('cms_blogs_banner_edit');
    Route::post('/cms-blogs-banner-edit/{id}', [CmsBlogPageController::class, 'post_update'])->name('post_cms_blogs_banner_edit');
    Route::post('/cms-blogs-banner-delete', [CmsBlogPageController::class, 'delete'])->name('cms_blogs_banner_delete');


    // ############ | event | ################
    Route::get('/event', [EventController::class, 'index'])->name('event_list');
    Route::get('/event-create', [EventController::class, 'create'])->name('event_create');
    Route::post('/event-create', [EventController::class, 'post_create'])->name('post_event_create');
    Route::get('/event-edit/{id}', [EventController::class, 'update'])->name('event_edit');
    Route::post('/event-edit/{id}', [EventController::class, 'post_update'])->name('post_event_edit');
    Route::post('/event-delete', [EventController::class, 'delete'])->name('event_delete');


    // ############ | blog | ################
    Route::get('/blog', [BlogController::class, 'index'])->name('blog_list');
    Route::get('/blog-create', [BlogController::class, 'create'])->name('blog_create');
    Route::post('/blog-create', [BlogController::class, 'post_create'])->name('post_blog_create');
    Route::get('/blog-edit/{id}', [BlogController::class, 'update'])->name('blog_edit');
    Route::post('/blog-edit/{id}', [BlogController::class, 'post_update'])->name('post_blog_edit');
    Route::post('/blog-delete', [BlogController::class, 'delete'])->name('blog_delete');


    // ############ | gallery | ################
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery_list');
    Route::get('/gallery-create', [GalleryController::class, 'create'])->name('gallery_create');
    Route::post('/gallery-create', [GalleryController::class, 'post_create'])->name('post_gallery_create');
    Route::get('/gallery-edit/{id}', [GalleryController::class, 'update'])->name('gallery_edit');
    Route::post('/gallery-edit/{id}', [GalleryController::class, 'post_update'])->name('post_gallery_edit');
    Route::post('/gallery-delete', [GalleryController::class, 'delete'])->name('gallery_delete');

    // ############ | contact query | ################
    Route::get('/contact-query', [ContactQueryController::class, 'index'])->name('contact_query_list');


    Route::get('/award', [AwardController::class, 'index'])->name('award_list');
    Route::get('/award-create', [AwardController::class, 'create'])->name('award_create');
    Route::post('/award-create', [AwardController::class, 'post_create'])->name('post_award_create');
    Route::get('/award-edit/{id}', [AwardController::class, 'update'])->name('award_edit');
    Route::post('/award-edit/{id}', [AwardController::class, 'post_update'])->name('post_award_edit');
    Route::post('/award-delete', [AwardController::class, 'delete'])->name('award_delete');


    Route::get('/bibliography', [BibliographyController::class, 'index'])->name('bibliography_list');
    Route::get('/bibliography-create', [BibliographyController::class, 'create'])->name('bibliography_create');
    Route::post('/bibliography-create', [BibliographyController::class, 'post_create'])->name('post_bibliography_create');
    Route::get('/bibliography-edit/{id}', [BibliographyController::class, 'update'])->name('bibliography_edit');
    Route::post('/bibliography-edit/{id}', [BibliographyController::class, 'post_update'])->name('post_bibliography_edit');
    Route::post('/bibliography-delete', [BibliographyController::class, 'delete'])->name('bibliography_delete');


    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting-admin-email', [SettingController::class, 'updateAdminEmail'])->name('updateAdminEmail');
    Route::post('/setting-header-logo', [SettingController::class, 'updateHeaderLogo'])->name('updateHeaderLogo');
    Route::post('/setting-footer-logo', [SettingController::class, 'updateFooterLogo'])->name('updateFooterLogo');


    Route::get('/cms-contact', [CmsContactController::class, 'index'])->name('cms_contact');
    Route::post('/cms-contact', [CmsContactController::class, 'post_update'])->name('post_cms_contact');


    Route::post('/admin-log-out', [AdminAuthController::class, 'logout'])->name('admin_logout');
});
