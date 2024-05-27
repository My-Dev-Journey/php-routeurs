<?php
session_start();

$action = $_GET['action'] ?? '';
require '../controllers/index.php';
require '../controllers/login.php';
require '../controllers/categoryAndTopics.php';

require '../middlewares/authentication.php';
require '../middlewares/stats.php';

switch ($action) {
    case '':
        getStats();
        index();
        break;
    case 'login':
        login();
        break;
    case 'topic':
        if (empty($_GET['id']) or !is_numeric($_GET['id'])) {
            return header('location:index.php');
        }
        getStats();
        showTopic();
        break;
    case 'category':
        if (empty($_GET['name'])) {
            return header('location: index.php?action=404');
        }
        getStats();
        showCategory();
        break;
    case 'create-message':
        checkAuth();
        createMessage();
        break;
    case '403':
        echo 'Erreur 403';
        break;
    case '404':
        echo 'Erreur 404';
        break;
}
