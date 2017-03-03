# A-router
Simple php router

Currently in Development any kind of assistance is welcome

Use below `.htaccess` for rewriting to index.php

    Options +FollowSymLinks
    RewriteEngine On
    RewriteRule ^(.*)$ index.php [QSA,L,NC]

And currently you have to create a directory name router in which both the `index.php` and `bootstrap.php` and your project file and directory will reside.
