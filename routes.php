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
get('/document', 'assets/pdf/document.php');


get('/pet', 'views/pet.php');

get('/pet-add', 'views/pet-add.php');
get('/pet-update', 'views/pet-update.php');

get('/tracker', 'views/tracker.php');
get('/profile', 'views/profile.php');



get('/search', 'views/search.php');

get('/favicon', 'assets/img/strapfavicon.png');

get('/gps', 'server/process-gps.php');
get('/gps-retrieve', 'server/process-gps-retrieve.php');

get('/report-retrieve', 'server/process-retrieve-reports.php');
get('/logs-retrieve', 'server/process-retrieve-logs.php');
get('/report-delete', 'server/process-report-delete.php');
get('/logs-delete', 'server/process-logs-delete.php');

get('/ack', 'server/process-acknowledge.php');
get('/logs', 'views/logs.php');

// POST
post('/process-login', 'server/process-login.php');
post('/process-admin-login', 'server/process-admin-login.php');

post('/process-registration', 'server/process-registration.php');
post('/process-user-profile.php', 'server/process-user-profile.php');

post('/pet-register', 'server/process-pet-registration.php');
post('/pet-update', 'server/process-pet-update.php');
post('/pet-delete', 'server/process-pet-delete.php');

post('/profile-update', 'server/process-profile-update.php');
post('/password-update', 'server/process-password-update.php');


post('/tracker-delete', 'server/process-tracker-delete.php');
post('/tracker-update', 'server/process-tracker-update.php');


post('/create-admin', 'server/process-create-admin.php');
post('/create-device', 'server/process-create-device.php');


post('/process-tracker-registration', 'server/process-tracker-registration.php');
post('/report', 'server/process-report.php');
get('/notify', 'server/process-report-notify.php');

get('/logout', 'server/process-logout.php');
get('/logout-admin', 'server/process-logout.php');

get('/su', 'views/admin.php');
get('/admin', 'views/admin-dashboard.php');
get('/super', 'views/super-dashboard.php');
get('/admin-add', 'views/admin-add.php');

get('/resolve', 'server/process-admin-resolve.php');

//Deprecated
// get('/logm','s.php');
// get('/logfile', 'logfile.txt');
// AUTHROUTES

get('/dashboard', 'views/dashboard.php');

post('/qr', 'views/qr.php');
get('/qr', 'views/qr.php');
get('/dogmarker', 'assets/img/dog-marker.png');
get('/catmarker', 'assets/img/cat-marker.png');
get('/othermarker', 'assets/img/other-marker.png');

// ANY
// any('/404','views/404.php');

any('/404', 'views/404.php');
