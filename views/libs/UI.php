<?php
 
    class UI {
        public static function printClass($info, $className){
            return "<div class='{$className}'>{$info}</div>";
        }

        public static function printInput($id, $name, $placeholder, $maxlen){
            return "<input type='text' id='{$id}' name='$name' placeholder='{$placeholder}' required maxlength='{$maxlen}' />";
        }

        public static function printTextarea($id, $name, $placeholder, $maxlen, $rows, $cols){
            return  "<textarea name='{$name}' id='{$id}' placeholder='{$placeholder}' required maxlength={$maxlen} rows={$rows} cols={$cols}></textarea>";
        }

        public static function printButton($id, $value){
            return "<input type='button' id='{$id}' value={$value}>";
        }
    }
 