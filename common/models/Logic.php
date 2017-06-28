<?php
/**
 * Created by PhpStorm.
 * User: caoxiang
 * Date: 15/11/17
 * Time: 下午3:28
 */

namespace common\models;

class Logic
{
    static function getDictValue($dict, $key){
        if (isset($dict[$key])) {
            return $dict[$key];
        }else{
            return $key;
        }
    }
}