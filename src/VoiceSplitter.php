<?php

class VoiceSplitter {

    private $srcPath;

    function __construct($srcPath) {
        if (file_exists($srcPath)) {
            $this->srcPath = $srcPath;
        }
    }

    function split($dirPath) {

        //指定ディレクトリがない場合　ディレクトリの作成
        if (!file_exists($dirPath)) {
            mkdir($dirPath, 0777, true);
            echo 'フォルダが作成されました';
        }

        if (file_exists($dirPath)) {
            $destPath = $dirPath . "1.mp3";
            if (touch($destPath)) {
                echo 'ファイルの作成に成功しました';
            } else {
                echo 'ファイルの作成に失敗しました';
            }
        }
    }

    function __destruct() {

    }

}

?>+