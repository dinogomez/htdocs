<?php

session_start();

$protected_endpoints = array(
  '/dashboard', '/user-profile',
  '/pet', '/pet-add', '/pet-update',
  '/tracker', '/pet-register', '/pet-update',
  '/pet-delete', '/tracker-delete', '/tracker-update',
  '/process-tracker-registration', '/logout',
  '/dogmarker', '/catmarker', '/othermarker', '/acknowledge', '/edit', '/profile-update', '/password-update'
);

$admin_endpoints = array('/admin', '/logout-admin', '/resolve', '/report-delete', '/notify', '/super', '/logs');

function get($route, $path_to_include)
{
  global $protected_endpoints;
  global $admin_endpoints;
  $adminResult = in_array($route, $admin_endpoints);
  $result = in_array($route, $protected_endpoints);

  if ($adminResult) {
    if (!isset($_SESSION['isLoggedInAdmin'])) {
      $route = '/';
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        route($route, $path_to_include);
      }
    } else {
      if ($_SESSION['isLoggedInAdmin'] && isset($_SESSION['role'])) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          route($route, $path_to_include);
        }
      } else {
        $route = '/';
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          route($route, $path_to_include);
        }
      }
    }
  } elseif ($result) {
    if (!isset($_SESSION['isLoggedIn'])) {
      $route = '/';
      if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        route($route, $path_to_include);
      }
    } else {
      if ($_SESSION['isLoggedIn']) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          route($route, $path_to_include);
        }
      } else {
        $route = '/';
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          route($route, $path_to_include);
        }
      }
    }
  } else {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      route($route, $path_to_include);
    }
  }
}
function post($route, $path_to_include)
{
  global $protected_endpoints;
  $result = in_array($route, $protected_endpoints);

  if ($result) {
    if (!isset($_SESSION['isLoggedIn'])) {
      $route = '/';
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        route($route, $path_to_include);
      }
    } else {
      if ($_SESSION['isLoggedIn']) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          route($route, $path_to_include);
        }
      } else {
        $route = '/';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          route($route, $path_to_include);
        }
      }
    }
  } else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      route($route, $path_to_include);
    }
  }
}
function put($route, $path_to_include)
{
  if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    route($route, $path_to_include);
  }
}
function patch($route, $path_to_include)
{
  if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    route($route, $path_to_include);
  }
}
function delete($route, $path_to_include)
{
  if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    route($route, $path_to_include);
  }
}
function any($route, $path_to_include)
{
  route($route, $path_to_include);
}
function route($route, $path_to_include)
{
  $ROOT = $_SERVER['DOCUMENT_ROOT'];
  if ($route == "/404") {
    include_once("$ROOT/$path_to_include");
    exit();
  }
  $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
  $request_url = rtrim($request_url, '/');
  $request_url = strtok($request_url, '?');
  $route_parts = explode('/', $route);
  $request_url_parts = explode('/', $request_url);
  array_shift($route_parts);
  array_shift($request_url_parts);
  if ($route_parts[0] == '' && count($request_url_parts) == 0) {
    include_once("$ROOT/$path_to_include");
    exit();
  }
  if (count($route_parts) != count($request_url_parts)) {
    return;
  }
  $parameters = [];
  for ($__i__ = 0; $__i__ < count($route_parts); $__i__++) {
    $route_part = $route_parts[$__i__];
    if (preg_match("/^[$]/", $route_part)) {
      $route_part = ltrim($route_part, '$');
      array_push($parameters, $request_url_parts[$__i__]);
      $$route_part = $request_url_parts[$__i__];
    } else if ($route_parts[$__i__] != $request_url_parts[$__i__]) {
      return;
    }
  }
  include_once("$ROOT/$path_to_include");
  exit();
}
function out($text)
{
  echo htmlspecialchars($text);
}
function set_csrf()
{
  if (!isset($_SESSION["csrf"])) {
    $_SESSION["csrf"] = bin2hex(random_bytes(50));
  }
  echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
}
function is_csrf_valid()
{
  if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {
    return false;
  }
  if ($_SESSION['csrf'] != $_POST['csrf']) {
    return false;
  }
  return true;
}
