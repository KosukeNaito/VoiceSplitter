<?php

class VoiceSplitter {

    private $srcPath;
    private $srcData;

    function __construct($srcPath) {
        if ($this->setSrcPath($srcPath)) {
            $this->readSrcData();
        }
    }

    public function getSrcPath() {
        return $this->srcPath;
    }

    public function getSrcData() {
        return $this->srcData;
    }

    private function setSrcPath($srcPath) {
        if (file_exists($srcPath)) {
            $this->srcPath = $srcPath;
            return true;
        } else {
            return false;
        }
    }

    function getHexData() {
        try {
            $srcFile = fopen($this->srcPath, "r+b");
            $srcFileSize = filesize($this->srcPath);
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
    private function readSrcData() {
        if (!$this->srcPath) {
            echo "パスが定義されていません";
            $this->srcData = "";
            return;
        }
        try {
            $srcFile = fopen($this->srcPath, "r+b");
            $this->srcData = fread($srcFile, $this->getSrcFileSize());
            fclose($srcFile);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    /**
     * 変換元ファイルのファイルサイズを返す
     */
    private function getSrcFileSize() {
        try {
            return filesize($this->srcPath);
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

        $this->getHexData();
    }

    function __destruct() {

    }

}

?>+