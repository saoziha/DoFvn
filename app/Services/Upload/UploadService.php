<?php

namespace App\Services\Upload;

use Illuminate\Support\Facades\Storage;

class UploadService
{
    public static function upload($folder, $file)
    {
        $file_extension = $file->getClientOriginalExtension();
        $file_name = date('Y_m_d_H_i_s_') . rand(10, 100000000) . '.' . $file_extension;
        return Storage::disk('public-app')->putFileAs($folder, $file, $file_name);
    }

    public static function deleteFile($file_name)
    {
        return Storage::disk('public-app')->delete($file_name);
    }
}
