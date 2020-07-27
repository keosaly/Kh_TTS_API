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
        $myfile = fopen($_SERVER['DOCUMENT_ROOT']."/TTS_DEMO/kh_new_seg/HTS_Demo/".$fileName, "w") or die("Unable to open file!");
        $txt = $req->input('text');
        fwrite($myfile, $txt);
	fclose($myfile);
	chdir('/home/saly/TTS_API/BackendTTSProject/public/TTS_DEMO/kh_new_seg/HTS_Demo');
	shell_exec('./runDemo.sh');
        $data = ['pathVoice'=>'http://103.16.63.233:8027/TTS_DEMO/kh_new_seg/HTS_Demo/KH_WAV_RESULT.wav'];
        return response()->json($data);
    }
}
?>
