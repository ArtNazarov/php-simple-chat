<?php 
 
class WriterMessages {
   public static function write_messages(array $messages): void {
        $lines = [];
        foreach ($messages as $msg) {
            // Формат: timestamp|nickname|message
            $lines[] = $msg['timestamp'] . '|' . $msg['nickname'] . '|' . $msg['message'];
        }
        // Записываем в файл с блокировкой
        $fp = fopen(CHAT_FILE, 'c+');
        if ($fp === false) {
            http_response_code(500);
            exit('Ошибка записи в файл');
        }
        flock($fp, LOCK_EX);
        ftruncate($fp, 0);
        rewind($fp);
        fwrite($fp, implode("\n", $lines) . "\n");
        fflush($fp);
        flock($fp, LOCK_UN);
        fclose($fp);
    }
}
