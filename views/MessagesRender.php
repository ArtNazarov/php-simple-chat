<?php
// Разметка списка сообщений 
class MessagesRender {
    // рендер списка сообщений
    public static function render($messages){
       
        foreach ($messages as $msg){
            $f  = '<div class="message">';
            $f .=  '<span class="timestamp">[' . date('H:i:s', $msg['timestamp']) . ']</span>';
            $f .=  '<span class="nickname">' . $msg['nickname']  . ':</span>';
            $f .=  '<span class="text">' . nl2br($msg['message']) . '</span>';
            $f .= '</div>';
        }

    return '<h1>Чат на PHP (Long Polling)</h1>' .
    '<div id="chat-box">' . $f . '</div>';

}
}
