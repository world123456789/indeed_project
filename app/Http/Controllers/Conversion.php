<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class Conversion extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indeed_conversion(Request $request){
        $resume=$request->resume;
        $template=$request->template;
      
        $fileName = Auth::user()->name.Auth::user()->email.'.pdf';     
        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile(public_path('uploads').'/'.$fileName);         
        $text = $pdf->getText();
        $your_array = explode("\n", $text);       
        $fullname_array=explode(" ", $your_array[0]);
        $short_name=substr($fullname_array[0],0,1).substr($fullname_array[1],0,1);
        $full_name=$your_array[0];
        $paragraph_keys=[
            'basic_info',
            'Personal Details',   
            'Education',
            'Work Experience',
            'Nursing Licenses',
            'Skills',
            'Links',
            'Military Service',
            'Awards',
            'Certifications and Licenses',
            'Groups',
            'Patents',
            'Publications',
            'Assessments',      
            'Additional Information', 
        ];
        $paragraph_val_keys=array();
        $data=array();
        foreach($paragraph_keys as $key){   
            if(array_search($key, $your_array)){
                $paragraph_val_keys[$key]=array_search($key, $your_array);        
            }    
        }
        asort($paragraph_val_keys);
        $keys=array_keys($paragraph_val_keys);
        // var_dump($keys);
        $data['basic_info']=$this->string_between_two_string($text, $your_array[0], $keys[0]);
        $text=str_replace($data['basic_info'],"",$text);
        for($i=0;$i<count($keys);$i++){    
            $j=count($keys)-1;
            $k=$i+1;
            if($i==$j){       
                $data[$keys[$i]]=$this->string_to_end($text, $keys[$i]); 
            }else{
                $data[$keys[$i]]=$this->string_between_two_string($text, $keys[$i], $keys[$k]);
            }    
            $text=str_replace($data[$keys[$i]],"",$text);
        } 
        $basic_info=$this->basic_info($data['basic_info'],$your_array);
        $work_experience=$this->work_experience($data['Work Experience']);
        // var_dump($work_experience);
        // $education=education($data['Education']);
      
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(public_path('template').'/'.$template.'.docx');
        /////====basic======/////
        $templateProcessor->setValue('A', $short_name);
        $templateProcessor->setValue('FN', $full_name);
        $templateProcessor->setValue('em', $basic_info['mail'][0]);
        if(!empty($basic_info['generic_writting'])){
            $templateProcessor->setValue('GW', $basic_info['generic_writting']);
        }else{
            $templateProcessor->setValue('GW', '');
        }
        if(!empty($basic_info['address'])){
            $templateProcessor->setValue('AD', $basic_info['address']);
        }else{
            $templateProcessor->setValue('AD', '');
        }
        if(!empty($basic_info['object'])){
            $templateProcessor->setValue('OBJ', $basic_info['object']);
        }else{
            $templateProcessor->setValue('OBJ', '');
        }
        if(!empty($basic_info['phone'])){
            $templateProcessor->setValue('ph', $basic_info['phone'][0]);
        }else{
            $templateProcessor->setValue('ph', '');
        }

        // ///////=====experience======////////
        for($o=0;$o<5;$o++){
            if($o<count($work_experience)){
                $templateProcessor->setValue('jt'.$o, $work_experience[$o]['jobtile']);
                $templateProcessor->setValue('cp'.$o, '-'.$work_experience[$o]['company']);
                $templateProcessor->setValue('pr'.$o, '-'.$work_experience[$o]['period']);
                $templateProcessor->setValue('exp'.$o, $work_experience[$o]['explain']);
            }else{
                $templateProcessor->setValue('jt'.$o, '');
                $templateProcessor->setValue('cp'.$o, '');
                $templateProcessor->setValue('pr'.$o, '');
                $templateProcessor->setValue('exp'.$o, '');
            }    
        }
        // //////////========education======////////

        $education = explode("\n", trim($data['Education']));
        for($o=0;$o<9;$o++){
            if($o<count($education)){
                $templateProcessor->setValue('ed'.$o, $education[$o]);        
            }else{
                $templateProcessor->setValue('ed'.$o, '');       
            }
        }
        ///////////////==Certifications and Licenses ==////////////////
        if(array_search('Certifications and Licenses',$keys)){
            $cer_and_lic = explode("\n", trim($data['Certifications and Licenses']));
            // var_dump($cer_and_lic);
            for($o=0;$o<6;$o++){
                if($o<count($cer_and_lic)){
                    $templateProcessor->setValue('CAL'.$o, $cer_and_lic[$o]);        
                }else{
                    $templateProcessor->setValue('CAL'.$o, '');       
                }
            }
        }else{
            for($o=0;$o<6;$o++){
            $templateProcessor->setValue('CAL'.$o, '');       
            }
        }
        /////////////////=====skills=======/////////////
        $data['Skills']=str_replace("&"," ",$data['Skills']);
        $skills = explode("•", trim($data['Skills']));
        for($o=1;$o<34;$o++){
            if($o<count($skills)){
                $templateProcessor->setValue('ski'.$o, '•'.$skills[$o]);        
            }else{
                $templateProcessor->setValue('ski'.$o, '');       
            }
        }
        ///////////////=======Assessments========///////////////
        if(array_search('Assessments',$keys)){
            $data['Assessments']=str_replace("&"," ",$data['Assessments']);
            $Assessments = explode("\n", trim($data['Assessments']));
            // var_dump($data);
            for($o=0;$o<12;$o++){
                if($o<count($Assessments)){
                    $templateProcessor->setValue('ASS'.$o, $Assessments[$o]);        
                }else{
                    $templateProcessor->setValue('ASS'.$o, '');       
                }
            }
        }else{
            for($o=0;$o<12;$o++){        
                $templateProcessor->setValue('ASS'.$o, '');   
            }
        }
        $templateProcessor->saveAs(public_path('conversion').'/'.$full_name.'.docx');
        $data='true';
        return response()->json(['data' => $data,'filename'=>$full_name], 200);
        // return 'testwst';
        
    } 
    public function string_between_two_string($str, $starting_word, $ending_word) 
    { 
        $subtring_start = strpos($str, $starting_word); 
        //Adding the strating index of the strating word to  
        //its length would give its ending index 
        $subtring_start += strlen($starting_word);   
        //Length of our required sub string 
        $size = strpos($str, $ending_word, $subtring_start) - $subtring_start;   
        // Return the substring from the index substring_start of length size  
        return substr($str, $subtring_start, $size);   
    } 
    public function basic_info($subdata,$your_array){
        $match = array();
        $basic_info=array();
        $empty_values=array();  
        $test_pat = '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/';    
        preg_match_all($test_pat, $subdata, $match);    
        $basic_info['mail']=$match[0];   
        
        preg_match_all('/[(]*\d{3}[)]*\s*[.\-\s]*\d{3}[.\-\s]*\d{4}/',$subdata,$match);    
        $basic_info['phone'] = $match[0];
    
        if(!empty($basic_info['phone'])){
            $objective=$this->string_to_end($subdata, $basic_info['phone'][0]);    
        }else{
            $objective=$this->string_to_end($subdata, $basic_info['mail'][0]);    
        }
        $basic_info['object'] = $objective;
        $key_mail = array_search($basic_info['mail'][0], $your_array); 
        $address_verify=$your_array[$key_mail-1];  
        $address_verify=trim($address_verify);  
        $address_verify = substr($address_verify, -1);
        $address_verify = ctype_digit($address_verify);
        if($address_verify==false){
            array_push( $empty_values,"address");          
            $generic_writting=$this->string_to_start($subdata, $basic_info['mail'][0]);    
            $address='';        
        }else{
            $address=$your_array[$key_mail-1];             
            $generic_writting=$this->string_to_start($subdata,$address); 
        }
        $basic_info['address']=$address;  
        $basic_info['generic_writting']=$generic_writting;
        return $basic_info;
    }
    public function work_experience($subdata){
        // var_dump(nl2br($subdata));
        $match = array();
        $basic_info=array(); 
        $experience_list_keys=array();
        $experience_list=array();   
        $test_pat = '/[A-Za-z]+\s+[0-9]{4}+\s+[a-z]{2}/';    
        preg_match_all($test_pat, $subdata, $match);    
        $experience_keys=$match[0];
        $work_experience_array = explode("\n", $subdata); 
        // var_dump($work_experience_array) ;
        foreach($work_experience_array as $k){
            foreach($experience_keys as $j){            
                if(str_contains($k,$j)){
                    array_push($experience_list_keys,$k);               
                }
            }
        }
        foreach($experience_list_keys as $c=>$d){
          
            $key_period = array_search($d, $work_experience_array); 
            $experience_list[$c]['jobtile']=$work_experience_array[$key_period-2];
            $experience_list[$c]['company']=$work_experience_array[$key_period-1];
            $experience_list[$c]['period']=$d;
            if($c==count($experience_list_keys)-1){
                $experience_list[$c]['explain']=$this->string_to_end($subdata, $d);
            }else{
                $key_period1 = array_search($experience_list_keys[$c+1], $work_experience_array);
                $next_job_title=$work_experience_array[$key_period1-2];  
             
                if(!empty($next_job_title)){
                    $experience_list[$c]['explain']=$this->string_between_two_string($subdata, $d, $next_job_title);           
                } else{
                    $next_job_title=$work_experience_array[$key_period1-3];
                    $experience_list[$c]['explain']=$this->string_between_two_string($subdata, $d, $next_job_title);   
                }      
            }        
        }  
       return $experience_list;
    }
     
    public function string_to_end($str, $starting_word) 
        { 
            $subtring_start = strpos($str, $starting_word); 
            //Adding the strating index of the strating word to  
            //its length would give its ending index 
            $subtring_start += strlen($starting_word);   
            //Length of our required sub string 
            $size = strlen($str);
            // Return the substring from the index substring_start of length size  
            return substr($str, $subtring_start, $size);   
        } 
    public function string_to_start($str, $ending_word) 
        { 
            $subtring_end = strpos($str, $ending_word); 
            return substr($str,0, $subtring_end);   
        } 
     
}
