$(document).ready(function () {
        $('.monthly').click(function () {
                $('.monthly_plan').removeClass('plan_price');
                $('.yearly_plan').addClass('plan_price');
        });
        $('.yearly').click(function () {
                $('.monthly_plan').addClass('plan_price');
                $('.yearly_plan').removeClass('plan_price');
        });
        $('.sign-up').click(function () {
                $('.main1').addClass('plan_price');
                $('.main2').removeClass('plan_price');
        });
        $('.file-input-container').change(function (e) {
                var x = $('.file-upload-input').val().replace(/^.*\./, '');
                var fileName = e.target.files[0].name;
                if(x!='pdf'){
                        alert('Select pdf!');
                }else{
                     $('.uploadfilename').removeClass('plan_price');
                     $('.step1').removeClass('plan_price');
                //      $('.step2').removeClass('plan_price');
                //      $('.step3').removeClass('plan_price');
                     $('.file-input-container').addClass('plan_price');
                     $('.upload_file_name').html('<h2 style="margin: auto;">Resume file name: <i class="fa fa-file-word-o" aria-hidden="true" style="padding: 31px 0;"></i> '+fileName+'</h2>');
                     $('.upload_file_name').removeClass('plan_price');
                }
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $('.resume_analysis').click(function(){
                // var file=$('input[name="file"]').val();
                var resume=$('input[name="gende"]:checked').val();
                var template=$('input[name="template"]:checked').val();  
                console.log(resume);              
                var formData = new FormData();
                formData.append('file', $('#file')[0].files[0]);
                formData.append('resume', $('input[name="gende"]:checked').val());
                formData.append('template',$('input[name="template"]:checked').val());
                console.log(formData);
                $.ajax({
                        type:'POST',
                        url:"/file-upload",
                        processData: false,  // tell jQuery not to process the data
                        contentType: false, 
                        data:formData,
                        success:function(data){
                           console.log(data.data);
                           if(data.data=='true'){
                                $('.step1').addClass('plan_price');
                                // $('.step2').addClass('plan_price');
                                $('.step4').removeClass('plan_price');
                                $('.step3').html("<h1>Analysis result</h1><h2>In resume,there is all data for conversion!</h2>");
                           }else{
                                $('#ex2').modal(); 
                           }
                        }
                     });
        });
        
        $('.start_convert').click(function(){
                var resume=$('input[name="gende"]:checked').val();
                var template=$('input[name="template"]:checked').val();  
                // console.log(resume);
                // console.log(template);
                $.ajax({
                        type:'POST',
                        url:"/file-conversion",                         
                        data:{resume:resume,template:template},
                        success:function(data){
                           console.log(data.data);
                           if(data.data=='true'){
                                $('.step1').addClass('plan_price');
                                // $('.step2').addClass('plan_price');
                                // $('.step3').addClass('plan_price');  
                                $('.step4').addClass('plan_price');                
                                $('.step5').removeClass('plan_price');
                                $('.convert_file_name').html('<h2>Converted file name:<i class="fa fa-file-word-o" aria-hidden="true" style="padding: 31px 0;"></i> <a href="download/'+data.filename+'"> '+data.filename+'.docx</a></h2>');
                                }
                        }
                     });
               
        });
        $('.template_type').click(function(){
               
        });
});
