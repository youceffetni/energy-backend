<?php

namespace App\Traits;


trait MakeNumero{


    public function makeId($date){
        $month_year=get_month_year($date);

        $last_vente=self::where("month_year",$month_year)->orderBy("numero","desc")->first();

        if($last_vente){
            $index=explode("-",$last_vente->numero)[0]+1;
            return $index."-".$month_year;
        }
       

          return  "1-".$month_year;
    }


    public function setNumeroAttribute($date){
        $this->attributes["numero"]= $this->makeId($date);
    }

    public function setMonthYearAttribute($value){
        $this->attributes['month_year']=get_month_year($value);

    }
}