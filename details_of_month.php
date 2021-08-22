<?php
class DetailsOfMonth{
    private $period,$basic_payment,$bonus_payment;
    function __construct($period,$basic_payment,$bonus_payment){
        $this->period = $period;
        $this->basic_payment = $basic_payment;
        $this->bonus_payment = $bonus_payment;
    }

    function get_period(){
        return $this->period;
    }

    function get_basic_payment(){
        return $this->basic_payment;
    }

    function get_bonus_payment(){
        return $this->bonus_payment;
    } 

    function to_string(){
        echo "Period: " .$this->get_period()."\n";
        echo "Basic Payment: ".$this->get_basic_payment()."\n";
        echo "Bonus Payment: ".$this->get_bonus_payment()."\n\n";
    }
    
    function toCsv(){
        return array(
            $this->get_period(),
            $this->get_basic_payment(),
            $this->get_bonus_payment()
        );
    }
}

