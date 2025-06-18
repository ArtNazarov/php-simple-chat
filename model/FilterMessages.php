<?php  
require_once(__DIR__ . '/../config.php');
// Класс для фильтрации сообщений
class FilterMessages {
    // Оставляем только последние MAX_MESSAGES_COUNT сообщений
    public static function cutLast($messages){
    if (count($messages) > MAX_MESSAGES_COUNT) {
        $messages = array_slice($messages, -MAX_MESSAGES_COUNT);
    }

    return $messages;

    }
}
