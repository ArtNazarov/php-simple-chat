<?php  
require_once (__DIR__ . "/libs/UI.php");
    // Виджет добавления нового сообщения
    // Должен содержать многострочное поле для ввода текста и однострочное для псевдонима
    class ChatFormRender {
        // Функция для виджета отправки сообщения
        public static function render(){
            $inputNickname = UI::printInput('nickname', 'nickname', 'Ваш ник', 30);
            $inputMessage = UI::printTextarea('message', 'message', 'Введите сообщение', 500, 3, 50);
            $form = $inputMessage . '<br/>' . $inputNickname . "<br/>" . UI::printButton("btnSendMessage", "Отправить");    
            $widget = UI::printClass( $form,  "myChatForm");
            return $widget;
        }
    }

