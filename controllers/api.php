<?php
 
require_once (__DIR__ . '/../config.php');
require_once( __DIR__ . '/../model/ReaderMessages.php');

if (isset($_GET['action']) && isset($_GET['timestamp']) ) {
    if ($_GET['action']=='get_messages'){
        header('Content-Type: application/json');     
        $timestamp = $_GET['timestamp'];   
        if (ReaderMessages::thereIsNewMessages($timestamp)){
            echo json_encode(['status'=>'ok', 'messages' => ReaderMessages::readAllMessages()]);
        } else {
            echo json_encode(['status'=>'heartbeat', 'reason' => 'No messages']);
        }

    }
} else {
        header('Content-Type: application/json');        
        echo json_encode(['status'=>'fail', 'error' => 'Use ?action=get_messages instead']);
}

?>