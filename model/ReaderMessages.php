<?php
 
require_once (__DIR__ . '/../config.php');
// Класс для считывания данных из файла
class ReaderMessages {
    public static function thereIsNewMessages($timestamp) : bool {
        $messages = self::read_messages(0);
        foreach ($messages as $msg){
            if ($msg['timestamp'] > $timestamp) return true;
        };
        return false;
    }
    // Считывание списка сообщений
    public static function read_messages($lastTimeStamp): array {
    if (!file_exists(CHAT_FILE)) {
        return [];
    }
    $lines = file(CHAT_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $messages = [];
    foreach ($lines as $line) {
        // Формат: timestamp|nickname|message
        [$timestamp, $nickname, $message] = explode('|', $line, 3);
        $timestamp = (int)$timestamp;
        if ($timestamp > $lastTimeStamp){
            $messages[] = [
                'timestamp' => $timestamp,
                'nickname' => htmlspecialchars($nickname, ENT_QUOTES | ENT_SUBSTITUTE),
                'message' => htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE),
            ];
        };
    }
    // Сортируем по дате (timestamp) по возрастанию
    usort($messages, fn($a, $b) => $a['timestamp'] <=> $b['timestamp']);
    // Возвращаем не более MAX_MESSAGES_COUNT сообщений
    return array_slice($messages, 0, MAX_MESSAGES_COUNT);
}
    public static function readAllMessages(){
        return self::read_messages(0);
    }
}