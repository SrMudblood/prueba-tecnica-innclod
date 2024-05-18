<?php

include 'models/db_connection.php';
include 'controllers/notFound.controller.php';

$notFound = new NotFoundController();
$url = parse_url($_SERVER['REQUEST_URI'])['path'];
$url = explode('/', $url);

session_start();

if (count($url) == 2) {
    if ($url[1] && ($_SESSION['auth'] ?? false) == true) {
        $controller = $url[1];
        $action = 'index';
    } elseif ($url[1] && ($_SESSION['auth'] ?? false) == false) {
        header('Location: /');
    } else {
        $controller = 'login';
        $action = 'index';
    }
} else {
    if ($url[2]) {

        if (($_SESSION['auth'] ?? false) == false) {
            if ($url[1] == 'login' && $url[2] == 'login') {
                $controller = 'login';
                $action = 'login';
            } else {
                header('Location: /');
            }
        } else {
            $controller = $url[1];
            $action = $url[2];
        }
    } else {
        header('Location: /' . $url[1]);
    }
}

$controller_url = 'controllers/' . strtolower($controller) . '.controller.php';

if (file_exists($controller_url)) {
    require_once $controller_url;

    $class_name = ucfirst(strtolower($controller)) . 'Controller';
    if (class_exists($class_name)) {
        $page = new $class_name();
        if (method_exists($page, $action)) {
            $page->$action();
        } else {
            $notFound->index();
        }
    } else {
        $notFound->index();
    }
} else {
    $notFound->index();
}
