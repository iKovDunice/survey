<?php

require_once 'SurveyController.php';

$controller = new \Survey\SurveyController();

/**
 * Code below controls the routing depending on method
 */
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    $controller->renderPage();
} elseif ($method == 'POST') {
    $controller->saveData();
} else {
    http_response_code(405);
}