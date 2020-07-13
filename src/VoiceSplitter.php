<?php

class VoiceSplitter {

    function __construct($filePath) {
        
    }

    function split($dirPath) {

        //指定ディレクトリがない場合　ディレクトリの作成
        if (!file_exists($dirPath)) {
            mkdir($dirPath, 0777, true);
        }

        if (file_exists($dirPath)) {
            
        }

        return true;

    }

    function __destruct() {

    }

}

?>