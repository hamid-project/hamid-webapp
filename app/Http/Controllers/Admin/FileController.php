<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\File;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    /**
     * Download the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Support\Facades\Response
     */
    public function download(File $file)
    {
        $headers = [
            'Content-Type' => 'application/oct-stream',
            'Content-Disposition' => sprintf('attachment; filename="%s"', urlencode($file->name)),
        ];
        return Response::make($file->body, 200, $headers);
    }

}
