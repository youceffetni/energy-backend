<?php


/*
    $date must be with this format =>  22/05/2024  such as 05 is month



*/
function get_month_year($date){

    $date_array=explode("/",$date);

    $format_date=$date_array[1]."/".$date_array[0]."/".$date_array[2];

    return date("m-y",strtotime($format_date));   //  Format this 05/04/2024 to 04-24

}


function format_numero_id($numero){
    $exploded_numero=explode("-",$numero);

    return $exploded_numero[0]."/".$exploded_numero[1]."/".$exploded_numero[2];
}