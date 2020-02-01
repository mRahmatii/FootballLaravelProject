<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
class PublicFunctionController extends Controller
{
    public function convertToEnglishNumber($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
        return $englishNumbersOnly;
    }

    public function getGeorgianDate(string $date=null){
        if(empty($date)){
            return;
        }
        $date=$this->convertToEnglishNumber($date);
        $date=explode('/',$date);
        $year=(int)$date[0];
        $month=(int)$date[1];
        $day=(int)$date[2];
        $date= Verta::getGregorian($year,$month,$day);
        $date=implode('-',$date);
        return $date;
    }

    public function getDataWithDElimiter(array $datas,string $model,string $field){
        $allDatas=array();
        $model = '\\App\\' . $model;
        foreach ($datas as $data){
            $query=$model::where('id',$data)->where('parent_id','!=','0')->get()->first();
            if(!empty($query)){
                array_push($allDatas, $query->$field);
            }
        }
        return implode(', ',$allDatas);
    }
}
