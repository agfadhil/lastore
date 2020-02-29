<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class SpatieMediaController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        if (! $request->has('model_name') && ! $request->has('file_key') && ! $request->has('bucket')) {
            return abort(500);
        }

        $model = 'App\\' . $request->input('model_name');
        try {
            $model = new $model();
        } catch (ModelNotFoundException $e) {
            abort(500, 'Model not found');
        }

        $files      = $request->file($request->input('file_key'));
        $addedFiles = [];
        
        // FUCK! ENCRYPT FILE
        foreach ($files as $file) {
            try {
                $filename = $file->getClientOriginalName();
                $model->exists     = true;
                $content = base64_encode(Crypt::encrypt(file_get_contents($file)));
                //var_dump($fileContent);
                $media             = $model->addMediaFromBase64($content)->usingName($filename)->toMediaCollection($request->input('bucket'));
                //$media             = $model->addMedia(Crypt::encrypt(file_get_contents($file)))->toMediaCollection();
                $addedFiles[]      = $media;
            } catch (\Exception $e) {
                abort(500, 'Could not upload your file'. $e);
            }
        }

        return response()->json(['files' => $addedFiles]);
    }
}
