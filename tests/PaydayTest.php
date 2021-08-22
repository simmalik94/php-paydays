<?php

require("./payday.php");

class PaydayTest extends \PHPUnit\Framework\TestCase{
    public function testLastWorkingDay(){
        $payday = new Payday;
        $result = $payday->lastWorkingDay("2021","August");
        $this->assertEquals("31-08-2021", $result);
    }
};

