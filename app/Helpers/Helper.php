<?php
namespace App\Helpers;

class Helper
{

    public static function roll_number_generator($model, $trow, $length, $prefix){
        $data = $model::orderBy('roll_number','desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number = '';
        }else{
            $code = substr($data->$trow, strlen($prefix)+1);
            $actial_last_number = ($code/1)*1;
            $increment_last_number = ((int)$actial_last_number)+1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for($i=0;$i<$og_length;$i++){
            $zeros.="0";
        }
        return $prefix.$zeros.$last_number;
    }
    public static function account_number_generator(/*$model, $trow, $length, $prefix*/){
        // $data = $model::orderBy('account_number','desc')->first();
        // if(!$data){
        //     $og_length = $length;
        //     $last_number = '';
        // }else{
        //     $code = substr($data->$trow, strlen($prefix)+1);
        //     $actial_last_number = ($code/1)*1;
        //     $increment_last_number = ((int)$actial_last_number)+1;
        //     $last_number_length = strlen($increment_last_number);
        //     $og_length = $length - $last_number_length;
        //     $last_number = $increment_last_number;
        // }
        // $zeros = "";
        // for($i=0;$i<$og_length;$i++){
        //     $zeros.="0";
        // // }
        // return $prefix.$zeros.$last_number. random_int(10000, 99999);
        return (100).random_int(1000000, 9999999);
    }
}
?>
