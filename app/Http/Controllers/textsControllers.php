<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\text;
use Storage;

class textsControllers extends Controller
{
    public function create(Request $req)
    {
        $stu = new text();
        $fileName= 'text.txt';
        // $k = 0;
        // while(!$fileName){
        //     if(!file_exists("text$k.txt"))
        //         $fileName = "text$k.txt";
        //     $k++;
        // }
        $locationsVoice= 'http://127.0.0.1:8000/medias/vivok.mp3';
        $myfile = fopen($fileName, "w") or die("Unable to open file!");
        $txt = $req->input('text');
        fwrite($myfile, $txt);
        fclose($myfile);

        #Run Scirpt Python
        system("testScript.py");

        #Run Script Sh
        system("testScript.sh");

        $stu->pathVoice=$locationsVoice;
        $stu->save();
        return response()->json($stu);
    }
    public function read()
    {
        $stu = text::all();
        $data = array('status'=>'success','data'=>$stu);
       return response()->json($data);
    }
}
