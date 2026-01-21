

<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once __DIR__ . '/../app/Core/Router.php';

$router = new Router();

/* ================= DASHBOARD ================= */
$router->get('/', 'DashboardController@index');
$router->get('/dashboard', 'DashboardController@index');

/* ================= AUTH ================= */
$router->get('auth/signin',  'AuthController@signin');
$router->post('auth/signin', 'AuthController@signin');

$router->get('auth/signup',  'AuthController@signup');
$router->post('auth/signup', 'AuthController@signup');

$router->get('auth/forgot',  'AuthController@forgot');
$router->post('auth/forgot', 'AuthController@forgot');

$router->get('auth/generate', 'AuthController@generate');
$router->post('auth/generate', 'AuthController@generate');

$router->get('auth/logout', 'AuthController@logout');

/* ================= ADMIN ================= */
$router->get('admin', 'AdminController@index');
$router->get('admin/users', 'AdminController@users');
$router->get('admin/settings', 'AdminController@settings');
$router->get('admin/user/view', 'AdminController@viewUser');
$router->get('admin/user/edit', 'AdminController@editUser');

/* ================= AGENT ================= */
$router->get('/agent', 'AgentController@index');
$router->get('/agent/view', 'AgentController@viewUser');
$router->post('/agent/verify', 'AgentController@verify');


/* ================= BORROWER ================= */
$router->get('borrower', 'BorrowerController@dashboard');
$router->get('/borrower/my-application/delete', 'BorrowerController@deleteApplication');
$router->get('borrower/apply-loan', 'BorrowerController@applyLoan');
$router->post('borrower/apply-loan', 'BorrowerController@applyLoan');

$router->get('borrower/my-applications', 'BorrowerController@applications');
$router->get('borrower/my-application/delete', 'BorrowerController@deleteApplication');

$router->get('borrower/loans', 'BorrowerController@loans');

/* PROFILE (THIS FIXES EVERYTHING) */
$router->get('borrower/profile', 'BorrowerController@profile');
$router->post('borrower/profile', 'BorrowerController@profile');

/* DOCUMENT UPLOAD */
$router->post('borrower/upload-document', 'BorrowerController@uploadDocument');


/* ================= FINANCIER ================= */
$router->get('financier', 'FinancierController@index');
$router->get('financier/dashboard', 'FinancierController@dashboard');

$router->get('financier/applications', 'FinancierController@applications');
$router->get('financier/wishlist', 'FinancierController@wishlist');
$router->get('financier/investments', 'FinancierController@investments');

/* PROFILE */
$router->get('financier/profile', 'FinancierController@profile');
$router->post('financier/profile', 'FinancierController@profile');

/* DOCUMENTS */
$router->post('financier/upload-document', 'FinancierController@uploadDocument');

/* ACTIONS */
$router->post('financier/wishlist/add', 'FinancierController@addWishlist');
$router->post('financier/wishlist/remove', 'FinancierController@removeWishlist');
$router->post('financier/invest', 'FinancierController@invest');


/* ================= COMMON ================= */
$router->get('about', 'CommonController@about');
$router->get('contact', 'CommonController@contact');
$router->get('faq', 'CommonController@faq');
$router->get('privacy', 'CommonController@privacy');
$router->get('terms', 'CommonController@terms');

/* ================= URL NORMALIZATION ================= */

// Full URI without query string
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Project base folder
$basePath = '/finance-marketing/public';

// Remove base path from URI
if (strpos($uri, $basePath) === 0) {
  $uri = substr($uri, strlen($basePath));
}

// Normalize
$uri = trim($uri, '/');

/* ================= DISPATCH ================= */
$router->dispatch($uri, $_SERVER['REQUEST_METHOD']);
