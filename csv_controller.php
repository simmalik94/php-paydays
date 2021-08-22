<?php

class CsvController {
    static function write_csv($file_pointer, $data){
        $csv=fopen($file_pointer,'w');  
        $headers = ["Period", "Basic Payment", "Bonus Payment"];  
        fputcsv($csv, $headers);
        foreach($data as $details){
            fputcsv($csv,$details->toCsv());
        }
        fclose($csv);
    }
}

