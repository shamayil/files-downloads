<?php

namespace App\Repositories;

use App\Constants\Messages;
use App\Contracts\Files as FilesContract;
use Illuminate\Support\Facades\Storage;


class FilesRepository extends Repository implements FilesContract
{

    public function list()
    {
        $source = request()->input("item") ?? "";
        return Storage::disk('s3')->allFiles("/" . $source);
    }

    public function url()
    {
        $file = request()->input("file");
        if (!$file) {
            return response()->json([
                'data' => [],
                'status' => 'Not Found',
                'message' => Messages::FILES_NOT_FOUND,
                'errors' => null,
            ], 422);
        }
        $exists = Storage::disk('s3')->exists($file);

        if ($exists) {
            return response()->json([
                'data' => ['http://iposg-storage.iposg.net/' . $file],
                'status' => 'OK',
                'message' => 'Download file link generate successfully.',
                'errors' => null,
            ]);
        } else {
            return response()->json([
                'data' => [],
                'status' => 'Not Found',
                'message' => Messages::FILES_NOT_FOUND,
                'errors' => null,
            ], 422);
        }
    }
}
