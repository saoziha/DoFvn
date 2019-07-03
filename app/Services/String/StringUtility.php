<?php

namespace App\Services\String;


class StringUtility
{
    //空白文字除去
    /**
     * 文字列より空白を除去する。
     * @param String $sStr 空白除去する文字列
     * @return String 空白除去した文字列
     */
    public static function stripSpaces($sStr){
        $all="　";   //全角スペース
        $half=" ";  //半角スペース
        $tab="\t";  //タブ
        $no="";     //削除用変数
        $sRes = str_replace(array($all,$half,$tab),$no,$sStr);
        return $sRes;
    }
}
