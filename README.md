# social-app
**Laravel Vue CMS** - Simple app for posting blogs, commenting, and chating with other users

## Getting Started
Make sure you have `npm` and `composer` on your local machine

1. Clone this repository by running `git clone git@github.com:jelenamalinovic/social-app.git` and cd into it
2. Run `composer install` and `npm install` to download laravel dependencies
3. Run `php artisan key:generate` to generate a key for the app
4. Set up your database in your `.env` file
5. Set the BROADCAST_DRIVER in your .env file to pusher:
    ```
    BROADCAST_DRIVER=pusher
    ```
      Then fill in your Pusher app credentials in your .env file:
    ```
    PUSHER_APP_ID=xxxxxx
    PUSHER_APP_KEY=xxxxxxxxxxxxxxxxxxxx
    PUSHER_APP_SECRET=xxxxxxxxxxxxxxxxxxxx
    PUSHER_APP_CLUSTER=
    ```
5. Run migrations and seeders with command `php artisan migrate --seed`
5. Execute `npm run dev` to build project assets
6. Execute `php artisan serve` to run the project in your browser

## Built With
1. **Laravel** - The PHP Framework For Web Artisans
2. **Vue.js** - The Progressive JavaScript Framework
3. **Pusher** - APIs to enable devs building realtime features
4. **Axios** - A Js library to handle ajax requests easily
