<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->image;
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('upload/images');
            $image->move($path, $fileName);

            return response()->json([
                'message' => 'Image uploaded successfully',
                'image' => 'upload/images/' . $fileName,
                'base_url' => url('/'),
            ]);
        }
    }

    public function uploadMultipleImage(Request $request)
    {
        if ($request->has('images')) {
            $images = $request->images;
            $uploadedImages = [];

            foreach ($images as $key => $image) {
                $fileName = time() . $key . '.' . $image->getClientOriginalExtension();
                $path = public_path('upload/images');
                $image->move($path, $fileName);
                $uploadedImages[] = $fileName; // Menambahkan nama file ke dalam array
            }

            return response()->json([
                'message' => 'Image uploaded successfully',
                'images' => $uploadedImages, // Mengirimkan array nama file
                'base_url' => url('/'),
            ]);
        } else {
            return response()->json([
                'message' => 'No images uploaded',
            ]);
        }
    }
}
