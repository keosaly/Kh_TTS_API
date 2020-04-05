<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
class TextControllers extends Controller
{
    public function create(Request $req)
    {
        $fileName= 'input.txt';
        $myfile = fopen($_SERVER['DOCUMENT_ROOT']."/TTS_DEMO/HTS_Demo/".$fileName, "w") or die("Unable to open file!");
        $txt = $req->input('text');
        fwrite($myfile, $txt);
        fclose($myfile);
        #Run Scirpt Python
        // system("testScript.py");
        #Run Script Sh
        system("/TTS_DEMO/HTS_Demo/runDemo.sh");
        $data = ['pathVoice'=>'http://103.16.63.233:8027/TTS_DEMO/HTS_Demo/KH_WAV_RESULT.wav'];
        return response()->json($data);
    }
    // public function read()
    // {
    //     $data = ['pathVoice'=>'http://127.0.0.1:8000/medias/vivok.mp3'];
    //     return response()->json($data);
    // }
}
