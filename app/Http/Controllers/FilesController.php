<?php

namespace App\Http\Controllers;

use App\Contracts\Files as FilesContract;
use App\Http\Resources\FilesListResources;
use Illuminate\Http\Request;


class FilesController extends Controller
{

    public function __construct(FilesContract $files)
    {
        $this->files = $files;
    }

    public function list(Request $request)
    {
        return new FilesListResources(
            $this->files->list()
        );
    }

    public function url(Request $request)
    {
        return $this->files->url();
    }

}
