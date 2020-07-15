<?php

class VoiceSplitter {

    private $srcData;

    function __construct($srcPath) {
        if (file_exists($srcPath)) {
            $this->readSrcData($srcPath);
        }
    }

    public function getSrcData() {
        return $this->srcData;
    }

    function getHexData($srcPath) {
        try {
            $srcFile = fopen($srcPath, "r+b");
            $srcFileSize = filesize($srcPath);
            $srcData = fread($srcFile, $srcFileSize);
            fclose($srcFile);
            return bin2hex($srcData);
            $srcArray = str_split(bin2hex($srcData), 2);

            for ($i = 0; $i < count($srcArray); $i++) {
                echo $srcArray[$i];
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * 変換元ファイルのデータを読みこむ
     */
    private function readSrcData($srcPath) {
        if (!$srcPath) {
            echo "パスが定義されていません";
            $this->srcData = "";
            return;
        }
        try {
            $srcFile = fopen($srcPath, "r+b");
            $this->srcData = fread($srcFile, $this->getSrcFileSize($srcPath));
            fclose($srcFile);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    /**
     * 変換元ファイルのファイルサイズを返す
     */
    private function getSrcFileSize($srcPath) {
        try {
            return filesize($srcPath);
        } catch (Exception $e) {
            echo $e->getMessage();
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