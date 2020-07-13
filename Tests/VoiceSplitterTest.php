<?php

use PHPUnit\Framework\TestCase;

class VoiceSplitterTest extends Testcase {

    var $vs;
    
    public function testInstantiate() {
        $vs = new VoiceSplitter("D:\\MyMovie\\Material\\TachibanaArisu\\voice\\normal.mp3");
    }

    public function testSplit() {
        $vs.split("D:\\MyMovie\\Material\\TachibanaArisu\\voice\\normal\\");
        $this->assertEquals(file_exists("D:\\MyMovie\\Material\\TachibanaArisu\\voice\\normal\\1.mp3"), true);
    }

}

?>