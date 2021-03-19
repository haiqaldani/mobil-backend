<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function uploadbanner(Request $request)
    {
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.jpg';
                $time = Carbon::now()->toDateTimeString();
                $path = 'storage/assets/gallery/' . $fileName;

                Image::make($file)->save($path);
                $name = 'assets/banner/' . $fileName;
                // $file->move(public_path().'/storage/assets/gallery', $name);
               

                return $fileName
            }

            return '';
        }
    }
}
