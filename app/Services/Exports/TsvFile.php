<?php

namespace App\Services\Exports;


class TsvFile
{
    public static function download($filename, $dl_lists){
        header("Cache-Control: public");
        header("Pragma: public");
        header("Content-disposition: attachment; filename=" . $filename);
        header("Content-type: application/ms-excel ; charset=UTF-8; name=" . $filename);
        //UTF8-BOM
        echo $dl_lists;
        exit(0);
    }
}
