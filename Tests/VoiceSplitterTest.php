<?php

use PHPUnit\Framework\TestCase;

class VoiceSplitterTest extends Testcase {

    
    public function testConstruct() {
        $vs = new VoiceSplitter("./targets/normal.mp3");
        $this->assertEquals(null !== $vs->getSrcData(), true);
        $this->assertEquals(null !== $vs->getSrcPath(), true);
        return $vs;
    }

    public function testSplit() {
        $vs = new VoiceSplitter("./targets/normal.mp3");
        $vs->split("./targets/normal/");

        $this->assertEquals(file_exists("./targets/normal/"), true);
        $this->assertEquals(file_exists("./targets/normal/1.mp3"), true);        
    }

}

?>