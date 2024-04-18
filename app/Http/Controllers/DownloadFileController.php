<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DownloadFileController extends Controller
{

    public function downloadFileList($id){
       
        $data = User::find($id);
        $file_up = $data['file_up'];
        if($file_up==NULL)
        {
            return back()->with('error', "No file found");
        }
        $location = $id.'/'.$file_up;
        return Storage::disk('download')->download($location);

    }

    public function __invoke(){
        $location = auth()->user()->id.'/'.auth()->user()->file_up;
        return Storage::disk('download')->download($location);
        //return Storage->download('storage/app/'+auth()->user()->file_up);
    }
    
}
