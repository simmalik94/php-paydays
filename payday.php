<?php
require("details_of_month.php");

class Payday {
    private $months;
    function __construct(){
        $this->months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    }
    
    function lastWorkingDay($year, $month){
        $lastworkable=date('d-m-Y', strtotime('last weekday '.date("F Y", strtotime('next month '.$month.' '.$year))));
        return $lastworkable;
    }

    function bonusPayDay ($year,$month){
        $date_string = "$year-$month-10";
        $date = DateTime::createFromFormat('Y-M-d',$date_string);
        $timestamp = strtotime($date->format('M-d-Y'));
        $day = date('l', $timestamp);
    
        if($day == 'Saturday'){
            $date->modify('+2 days');
        }elseif($day == 'Sunday'){
            $date->modify('+1 days');  
        }
        return $date->format('d-m-Y');
    }

    function payDaysForYear($year){
        $details_of_month = [];
        foreach($this->months as $month){
            $detail_of_month = new DetailsOfMonth(
                "$month/$year", 
                $this->lastWorkingDay($year,$month),
                $this->bonusPayDay($year,$month)
            );
            array_push($details_of_month,$detail_of_month);
        }
        return $details_of_month;
    }

    function payDaysForNextYear($date){
        $date=(explode(" ",$date));
        $month=$date[0];
        $year=$date[1];
        $details_of_next_month = [];
        for ($i=0; $i <= 12 ; $i++) { 
            $next = date('F Y', strtotime($year . $month . '+' .$i. 'month'));
            $data=(explode(" ",$next));
            $current_month=$data[0];
            $current_year=$data[1];
            $detail_of_next_month = new DetailsOfMonth(
                "$current_month/$current_year", 
                $this->lastWorkingDay($current_year,$current_month),
                $this->bonusPayDay($current_year,$current_month)
            );
            array_push($details_of_next_month,$detail_of_next_month);            
        }
        return $details_of_next_month;
    }   
}

