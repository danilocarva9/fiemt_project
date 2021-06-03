<?php

function convertMoneyToDatabase($value){
        $value = preg_replace('/[.]/', '', $value);       
        $value = str_replace(',','.', $value);
        return $value;
}

function convertDateToDatabase($value){
        $ano = substr($value, 6);
        $mes = substr($value, 3,-5);
        $dia = substr($value, 0,-8);
        $new_date = $ano."-".$mes."-".$dia;
        return strtotime($new_date) ? $new_date : $value;
}

function returnOnlyNumbers($value){
        return preg_replace('/\D+/', '', $value);
}