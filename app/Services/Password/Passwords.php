<?php

namespace App\Services\Password;


class Passwords
{
    public static function generate(){
        $pass = "";
        $salt = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        srand((double)microtime()*1000000);
        $i = 0;
        while ($i < 8) { // パスワードの長さを指定できます。
        $num = rand() % strlen($salt);
        $tmp = substr($salt, $num, 1);
        if($i==0 && $tmp=='j') continue;
        $pass = $pass . $tmp;
        $i++;
        }
        return $pass;
    }

    //パスワード生成
    /**
     * ランダムな文字列を生成する。
     * @param int $nLengthRequired 必要な文字列長。省略すると 8 文字
     * @return String ランダムな文字列
     */
    public static function getRandomString($nLengthRequired = 8){
        $sCharList = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
        mt_srand();
        $sRes = "";
        for($i = 0; $i < $nLengthRequired; $i++)
            $sRes .= $sCharList{mt_rand(0, strlen($sCharList) - 1)};
        return $sRes;
    }
}
