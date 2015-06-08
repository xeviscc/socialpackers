<?php

/*
 * getCountryList
 *
 * @author: xvs
 */
function countryNameByCode($list, $code)
{
    $return = '';
    if(isset($list) && isset($code)){
        foreach($list as $country){
            if($country->getCode()->getCode()==$code){
                $return = $country->getName();
                break;
            }
        }
        
        if(!isset($return)){
            $return = $code;
        }
    }
    return $return;
   
}

?>
