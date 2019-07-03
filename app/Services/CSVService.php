<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class CSVService
{
    public static function download($filename, $csvData, $csvFields, $csvFieldStrs)
    {
        //SmartyのテンプレートやPHPがUTF8の場合、出力するhtmlに自動的にBOMをつけてしまうのでBOMを外す対策
        // ob_clean();
        /* HTTPヘッダの出力 */
        header("Cache-Control: public");
        header("Pragma: public");
        header("Content-disposition: attachment; filename=" . $filename);
        header("Content-type: application/octet-stream; charset=UTF-8; name=" . $filename);
        //UTF8-BOM
        echo "\xEF\xBB\xBF";
        echo implode(",", $csvFields);
        echo "\r\n";
        echo implode(",", $csvFieldStrs);
        echo "\r\n";
        echo $csvData;
        exit(0);
    }

    public static function downloadtsv($filename, $csvFields, $csvData)
    {
        header('Content-type: text/tab-separated-values; charset=UTF-8');
        header("Content-Disposition: attachment;filename=" . $filename);
        echo "\xEF\xBB\xBF";
        echo implode(",", $csvFields);
        echo "\r\n";
        echo implode(",", $csvData);
        exit(0);
    }
}
