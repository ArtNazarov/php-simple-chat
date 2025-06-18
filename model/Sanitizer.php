<?php
 
class Sanitizer {
    // очистка сообщений
    public static function sanitize_message(string $msg): string {
        return str_replace("|", "", strip_tags($msg));

    }
}
