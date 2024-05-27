<?php

require_once '../models/topics.php';

if (empty($_POST['topic_id']) or !is_numeric($_POST['topic_id'])) {
    // Erreur
}

function createMessage()
{
    if (empty($_POST['message'])) {
        // Erreur
    }

    addNewMessage($_POST['topic_id'], $_POST['message']);

    return header('location: ?action=topic&id=' . $_POST['topic_id']);
}
