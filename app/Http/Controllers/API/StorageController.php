<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Str;

class StorageController extends Controller
{
    public function put(Request $request)
    {
        $filename = Str::random(100);
        $fileExtension = $request->image->getClientOriginalExtension();
        $fullFileName = "$filename.$fileExtension";
        return \Storage::disk('users')->put("/", $request->image);
        // return \Storage::disk('users')->putFileAs('/', new File($request->image), $fullFileName);
    }

    public function get()
    {
        return \Storage::disk('users')->download('ipqc3w4hqneCEB0FRElb1SfBEZWI37LyatDUnbB6ZcwdoeLBxQyJKeWrSDLGLZRj0P8kJLcRkObLkdzXuoiMqZ7uE6ChRRne8cUe.png');
    }
}
