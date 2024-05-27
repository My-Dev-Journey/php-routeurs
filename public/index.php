<?php
session_start();

$action = $_GET['action'] ?? '';
require '../controllers/index.php';
require '../controllers/login.php';
require '../controllers/categoryAndTopics.php';

require '../middlewares/authentication.php';

switch ($action) {
    case '':
        index();
        break;
    case 'login':
        login();
        break;
    case 'topic':
        showTopic();
        break;
    case 'category':
        showCategory();
        break;
    case 'create-message':
        checkAuth();
        createMessage();
        break;
    case '403':
        echo 'Erreur 403';
        break;
}
