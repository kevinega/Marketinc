# Marketinc
## Tech
Marketinc uses a number of open source projects and packages to work properly: 
* [Laravel 5.3] - PHP Framework For Web Artisans
* [jQuery] - JavaScript but better
* [Sass] - Extended CSS
* [Bootstrap 4] - The most popular HTML, CSS, and JS framework in the world
* [Gulp] - Toolkit for automating painful or time-consuming tasks in development
* [Embed] - Get info from any web service or page!
* [Intervention Image] - PHP image handling and manipulation

## Getting Started
1. Clone the repository
2. Install PHP dependencies
   ```
   $ composer install
   ```
3. Install NPM, gulp, and Bootstrap 4
   ```
   $ npm install
   $ npm install -g gulp-cli
   $ npm install bootstrap@4.0.0-alpha.6
   ```
4. Migrate the database
   ```
   $ php artisan migrate
   ```
5. Create a folder `storage` inside `public` directory and create a symbolic link (assets folder for user)
   ```
   php artisan storage:link
   ```
6. You're good to go!

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [jQuery]: <http://jquery.com>
   [Gulp]: <http://gulpjs.com>
   [Laravel 5.3]: <http://laravel.com/>
   [Sass]: <http://sass-lang.com/>
   [Bootstrap 4]: <https://v4-alpha.getbootstrap.com/>
   [Embed]: <http://github.com/oscarotero/Embed>
   [Intervention Image]: <http://image.intervention.io/>
