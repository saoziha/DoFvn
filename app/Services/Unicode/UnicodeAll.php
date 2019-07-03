<?php

namespace App\Services\Unicode;


class UnicodeAll
{
    public static function unicode_keitai_cnv($str){
        //サイトリプレースにより変更
            $pattern     = array('髙',      '﨑',      '德',      '彅',      '祥',      '昻',      '濱',      '栁',      '濵',
                    );
            $replacement = array('高',      '崎',      '徳',      '薙',      '祥',      '昴',      '浜',      '柳',      '浜',
                    );

            if(!isset($str) || $str == FALSE || $str == "" ) return($str);
            $counts= count($pattern);
            for($i=0; $i<$counts; $i++){
                $str= mb_ereg_replace($pattern[$i], $replacement[$i], $str);
            }
            return($str);
    }

    public static function  unicode_sjis_cnv($str){
            $pattern     = array('髙',      '﨑',      '德',      '彅',      '祥',      '昻',      '濱',      '栁',      '濵',
                    );
            $replacement = array('&#x9AD9;','&#xFA11;','&#x5FB7;','&#x5F45;','&#xFA1A;','&#x663B;','&#x6FF1;','&#x6801;','&#x6FF5;',
                    );

            if(!isset($str) || $str == FALSE || $str == "" ) return($str);
            $counts= count($pattern);
            mb_regex_encoding("SJIS");
            for($i=0; $i<$counts; $i++){
                $str= mb_ereg_replace($replacement[$i], $pattern[$i], $str);
            }
            return($str);
        }

}
