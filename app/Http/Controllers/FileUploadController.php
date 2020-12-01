<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class FileUploadController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function fileUpload()
    // {
    //     return view('fileUpload');
    // }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileAnalysis(Request $request)
    {
        // echo 'ok';
        $resume=$request->resume;
        $template=$request->template;
        // $key=['A','FN','GW','PH','AD'];
        
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);  
        $fileName = Auth::user()->name.Auth::user()->email.'.'.$request->file->extension();     
        $request->file->move(public_path('uploads'), $fileName);
        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile(public_path('uploads').'/'.$fileName);         
        $text = $pdf->getText();
        $your_array = explode("\n", $text);  
        if($resume=='resume'){ 
            $match = array();
            $empty_values=array();
            //String that recognize a e-mail
            $test_pat = '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/';
            //check testpattern in given string
            preg_match_all($test_pat, $text, $match);
            //store above in array for upcoming bit.
            $newArr = array_values(array_unique($match[0]));
            $mail=$newArr[0];
            $key_mail = array_search($mail, $your_array);

            $address_verify=$your_array[$key_mail-1];
            // str_replace(" ","",$address_verify);
            $address_verify=trim($address_verify);
            // var_dump($address_verify);
            $address_verify = substr($address_verify, -1);
            $address_verify = ctype_digit($address_verify);
            if($address_verify==false){
                array_push( $empty_values,"address");
            }
            $phone_verify=$your_array[$key_mail+1];
            $phone_verify=trim($phone_verify);
            $phone_verify = substr($phone_verify, strlen($phone_verify)-4,strlen($phone_verify));
            $phone_verify = ctype_digit($phone_verify);
            if($phone_verify==false){
                array_push( $empty_values,"phone");
            }
            if($key_mail<3&&$address_verify==true){
                array_push( $empty_values,"generic");
            }
            // var_dump($empty_values); 
            $data='true';  
            // if(empty($empty_values)){
                return response()->json(['data' => $data], 200);
            // }
        }else{
            $data=$resume;  
            if(empty($empty_values)){
                return response()->json(['data' => $data], 200);
            }
        }
    }
    public function getDownload(Request $request)
    {

    //PDF file is stored under project/public/download/info.pdf
    $filename=$request->filename;
    $file= public_path('conversion'). "/".$filename.".docx";
    $headers = array(
              'Content-Type: application/docx',
            );
            return response()->download($file, $filename.'.docx', $headers);
    // return Response::download($file, 'James Washington.docx', $headers);
    }
}
