<?php

require_once("{$_SERVER['DOCUMENT_ROOT']}/router.php");

// GET
get('/', 'views/index.php');
get('/627', 'views/s.php');
get('/login', 'views/login.php');
get('/register', 'views/register.php');
get('/about', 'views/about.php');
get('/landing', 'views/landing.php');
get('/user-profile', 'views/user-profile.php');

get('/sample', 'views/sample.php');
get('/signin', 'views/signin.php');
get('/signup', 'views/signup.php');

get('/pet', 'views/pet.php');
get('/pet-add', 'views/pet-add.php');
get('/pet-update', 'views/pet-update.php');

get('/tracker', 'views/tracker.php');



get('/search', 'views/search.php');

get('/favicon', 'assets/img/strapfavicon.png');

get('/gps','server/gps/gps-app.php');

// POST
post('/process-login','server/process-login.php');
post('/process-registration', 'server/process-registration.php');
post('/process-user-profile.php' , 'server/process-user-profile.php');

post('/pet-register','server/process-pet-registration.php');
post('/pet-update','server/process-pet-update.php');
post('/pet-delete','server/process-pet-delete.php');
post('/process-tracker-registration', 'server/process-tracker-registration.php');
get('/logout' , 'server/process-logout.php');
get('/logm','s.php');
// AUTHROUTES

get('/dashboard', 'views/dashboard.php');
get('/logfile', 'logfile.txt');
post('/qr','views/qr.php');
get('/qr','views/qr.php');

// ANY
// any('/404','views/404.php');

