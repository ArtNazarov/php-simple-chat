<?php 

require_once(__DIR__ . '/model/ReaderMessages.php'); 
require_once(__DIR__ . '/views/MessagesRender.php');
require_once(__DIR__ . '/views/ChatFormRender.php'); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
   
    <meta charset="UTF-8" />
    <title>PHP Chat (Long Polling)</title>
    <style>
        #chat-box {
            width: 400px;
            height: 300px;
            border: 1px solid #ccc;
            overflow-y: scroll;
            padding: 5px;
            font-family: Arial, sans-serif;
            background: #f9f9f9;
        }
        .message {
            margin-bottom: 10px;
        }
        .timestamp {
            color: #888;
            font-size: 0.8em;
        }
        .nickname {
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
</head>
<body>
        <?php 
        // считываем все сообщения
        $messages = ReaderMessages::readAllMessages();
     
        // отображаем список сообщений 
        echo MessagesRender::render($messages);
        // отображаем форму добавления 
        echo ChatFormRender::render(); ?>

    <script src="/assets/js/update_messages.js" defer></script>
    <script src="/assets/js/longPolling.js" defer></script>
    <script src="/assets/js/sendingMessage.js"></script>
</body>
</html>
