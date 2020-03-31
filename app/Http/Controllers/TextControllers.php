<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
class TextControllers extends Controller
{
    public function create(Request $req)
    {
        $fileName= 'text.txt';
        $myfile = fopen($fileName, "w") or die("Unable to open file!");
        $txt = $req->input('text');
        fwrite($myfile, $txt);
        fclose($myfile);
        #Run Scirpt Python
        system("testScript.py");
        #Run Script Sh
        system("testScript.sh");
        $data = ['pathVoice'=>'http://103.16.63.233:8027/medias/vivok.mp3'];
        return response()->json($data);
    }
    // public function read()
    // {
    //     $data = ['pathVoice'=>'http://127.0.0.1:8000/medias/vivok.mp3'];
    //     return response()->json($data);
    // }
}
