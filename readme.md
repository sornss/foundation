# Inferno
This is a Laravel admin package built using AdminLTE theme and VueJs components.
The basic idea for this package is to get going with a ready made admin theme and
concentrate of the idea on which you want to work on and leave all the boilerplate
code to this package.

## Features
1. User login
2. Forgot password (uses Laravel mail to sendout emails)
3. Watchdog

## Requirements
1. Laravel Passport
2. Spatie Laravel Permission

The application uses Vue components for many of the widgets in the app. And many of
them needs the Laravel passport package installed and setup so that the package
can consume apis. For more details on how to install Laravel Passport, you can
refer to the docs: https://laravel.com/docs/5.4/passport

## Installation
The first step is to install this package using composer require and you need to
run the below command:

    composer require amitavdevzone/foundation

Once done, you will need to add the ServiceProvider to the app.php file inside
your config folder

    Inferno\Foundation\FoundationServiceProvider::class

Once, done you will need to run the publish command. Inferno has a lot of things
to publish like the migrations, seeders, assets for themes, views etc. Plus we
would also need to get some of the migrations from Spatie Laravel Permission.

    php artisan vendor:publish --provider="Inferno\Foundation\FoundationServiceProvider" --force
    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"

Once this is done, you will need to make a few additions to your user model like

## Additions to User model
1. You need to add the Presentable trait to the User model. We will be using the Presenter package from Laracasts and so this setting is important.
2. You need to add the HasRoles trait which comes with Spatie Permission package
3. You need to add the HasApiTokens trait from Laravel Passport for ApiTokens
3. You will need to add the profile relation with the user

Add the following code to your User model inside your app directory

    use Notifiable, PresentableTrait, HasRoles, HasApiTokens;

    protected $presenter = UserPresenter::class;

    protected $fillable = [
        'name', 'email', 'password', 'active'
    ];

    public function profile()
    {
        return $this->hasOne('Inferno\Foundation\Models\Profile');
    }

And make sure you have an additional $fillable property 'active' which we are
using to deletect whether the user is active or not.

You need to also add:

	Passport::routes();

to the AuthServiceProvider as per the Passport installation process and you need
to add the middleware to web section of the middleware groups so that the
ApiToken is created for each request to any api route as per Passport installation.

    \Laravel\Passport\Http\Middleware\CreateFreshApiToken::class,

And then, we need to run two commands:

	php artisan migrate
	php artisan passport:install
	php artisan inferno:install

Once these steps are done, you can run the migrations and run the seeders to get
started with your Inferno app and start coding for your next big idea.
