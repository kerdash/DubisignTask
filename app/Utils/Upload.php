<?php

namespace App\Utils;

class Upload
{
    public function storage($input, $path)
    {
        // Get file from request
        $file = request()->file($input);

        // Name of file
        $file_title = time();
        $file_name = $file_title.'.'.$file->extension();

        // Path to upload
        $upload_path = public_path($path);

        // Upload file
        $file_data = (object) [
            "title" => $file_title,
            "file" => url('/')."/{$path}/{$file_name}",
            "type" => $file->extension(),
            "size" => $file->getSize(),
        ];

        $file->move($upload_path, $file_name);

        return $file_data;
    }
}
