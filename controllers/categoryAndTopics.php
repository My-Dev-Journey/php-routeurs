<?php
session_start();
$nb_users = 1000;
$nb_topics = 500;
$nb_messages = 4242;

require_once '../models/categories.php';
require '../models/topics.php';

$logged_in = $_SESSION['auth'] ?? false;

function showCategory()
{
    $category = $_GET['name']; // Ici je n'ai plus besoin de ?? null, car le routeur va faire la vérification en amont
    $topics = getTopicsByCategory($category);

    require '../views/category.php';
}

function showTopic()
{
    $topic = getTopic($_GET['id']);
    require '../views/topic.php';
}


function createMessage()
{
    if (empty($_POST['message'])) {
        // Erreur
    }

    addNewMessage($_POST['topic_id'], $_POST['message']);

    return header('location: ?action=topic&id=' . $_POST['topic_id']);
}
