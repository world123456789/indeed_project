<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversionController extends Controller
{
    public function indeedconversion(Request $request){
        // $resume=$request->resume;
        // $template=$request->template;
        // $fileName = Auth::user()->name.Auth::user()->email.'.'.$request->file->extension();     
        // $parser = new \Smalot\PdfParser\Parser();
        // $pdf    = $parser->parseFile(public_path('uploads').'/'.$fileName);         
        // $text = $pdf->getText();
        // $your_array = explode("\n", $text);  
        // $key=['A','FN','GW','PH','AD'];
        //     $match = array();
        //     $empty_values=array();
        //     //String that recognize a e-mail
        //     $test_pat = '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/';
        //     //check testpattern in given string
        //     preg_match_all($test_pat, $text, $match);
        //     //store above in array for upcoming bit.
        //     $newArr = array_values(array_unique($match[0]));
        //     $mail=$newArr[0];
        //     $key_mail = array_search($mail, $your_array);

        //     $address_verify=$your_array[$key_mail-1];
        //     // str_replace(" ","",$address_verify);
        //     $address_verify=trim($address_verify);
        //     // var_dump($address_verify);
        //     $address_verify = substr($address_verify, -1);
        //     $address_verify = ctype_digit($address_verify);
        //     if($address_verify==false){
        //         array_push( $empty_values,"address");
               
        //     }else{
        //         $address=$your_array[$key_mail-1];
        //         $generic_writting='';
        //         $key_address = array_search($address, $your_array);
        //         $generic_writting=string_between_two_string($str, $your_array[0], $your_array[$key_address]); 
        //     }
        //     $phone_verify=$your_array[$key_mail+1];
        //     $phone_verify=trim($phone_verify);
        //     $phone_verify = substr($phone_verify, strlen($phone_verify)-4,strlen($phone_verify));
        //     $phone_verify = ctype_digit($phone_verify);
        //     if($phone_verify==false){
        //         array_push( $empty_values,"phone");
        //     }else{
        //         $phone=$your_array[$key_mail+1];
        //     }
        //     if($key_mail<3&&$address_verify==true){
        //         array_push( $empty_values,"generic");
        //     }
        //     // var_dump($empty_values); 
        // $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(public_path('template').'/'.$template.'.docx');
        // $templateProcessor->setValue($key[0], 'JW');
        // $templateProcessor->setValue('ph', $phone);
        // $templateProcessor->setValue('GWPH', $generic_writting);
        // $templateProcessor->setValue($key[1], $full_name);       
        // $templateProcessor->setValue('AD', $address);
        // $templateProcessor->setValue('OBJ', $phone);   
        // $templateProcessor->setValue('EXP', $phone); 
        // $templateProcessor->setValue('EDU', $phone);
        // $templateProcessor->setValue('SKI', $phone); 
        // $templateProcessor->setValue('ASS', $phone);  
        // $templateProcessor->setValue('em', $email);        
        // $templateProcessor->saveAs(public_path('conversion').'/'.$full_name.'.docx');
        // $data='true';
        // return response()->json(['data' => $data], 200);
        return 'testwst';
        
    } 
}
