<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="home" id="top">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-title" content="Free PDF Convert">
    <meta name="application-name" content="Free PDF Convert">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="/Content/Favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <title>Resume converter</title>
    <meta name="Description" content="Easily convert PDF to Word DOC using online PDF to Word converter.">
    <link rel="stylesheet" href="./asset/css/app.css" type="text/css">
    <link rel="stylesheet" href="./asset/css/style.css" type="text/css">    
    <script src="./asset/js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    
  
</head>

<body class="converter ltr unauthenticated">
    <div class="global-progress"></div>
    <header class="layout-header">
        
        <nav class="layout-header-nav">
        <a class="logo" href="{{ route('/') }}">
                <img src="asset/image/logo.png" class="logo-image" alt="" srcset="">
                <span class="logo-text">Convert resumes to templates</span>
            </a>
            @if (Route::has('login'))
            @auth
            <div class="main-menu header-menu" style="margin-left: 19px;justify-content: end;">
                <p class="indood" style="padding-bottom: 0;
                margin-top: 17px;">5 indeed.com template conversion remaining.</p>
                <p class="indood">5 non indeed.com template conversion remaining</p>               
            </div>
            <div class="user-menu">              
                <a href="{{ route('profile.show') }}" class="menu-item show-unauth">My profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>                
            </div> 
            @else
            <div class="main-menu header-menu">               
            </div>
            <div class="user-menu">
                <a href="https://www.freepdfconvert.com/a" class="icon-right img-arrow-down-black menu-item show-auth">
                    <div class="user-initial"></div>
                    <div class="user-name"></div>
                </a>
                <a href="#ex2" class="menu-item show-unauth" rel="modal:open">Sign In</a>
                <a href="{{ route('signup') }}" class="menu-item btn show-unauth sign-up btn-rose">Sign Up</a>
            </div>
            @endauth   
            @endif     
        </nav>
     

    </header>
    <main class="layout-main main1">
        {{-- main start--}}
        <section class="content-container heading-container">
            <h1 class="main-header">Converts Resume to Templates</h1>
            <h2 class="main-subheader">Turn any indeed.com resume or non indeed.com resume into any template of your
                choice.</h2>
        </section>
        @auth
        {{-- <form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data" style="width: 60%">
            @csrf --}}
      
        <div class="content-container start-panel">
            <section class="file-input-container">
                <label class="upload-area">
                    <div class="dashes">
                        <div class="upload-btn-container">
                            <div class="btn btn-success icon-left-large img-plus-white upload-btn">Choose PDF file</div>                           
                        </div>
                        <div class="drop">drop files here</div>
                        <input class="file-upload-input"id="file" type="file" name="file" multiple="multiple" accept=".pdf">
                    </div>
                </label>
            </section>
        </div>
        <div class=" uploadfilename plan_price upload_file_name" style="display: flex;">        
        </div>
        
        <div class="content-container light start-panel step1 plan_price">
            <section class="howto-container convert_step">
                <h1 class="howto-title">Select your resume type.</h1>               
                <ol class="howto-steps">
                    <li class="resume_type">
                        <input type="radio" name="gende" value="resume" checked>
                        <label for="resume">Indeed.com resume</label>
                    </li>
                    <li class="resume_type">
                        <input type="radio" name="gende" value="non_resume">
                        <label for="non_resume">Non indeed.com resume</label>
                    </li>
                </ol>
            </section>
            <section class="howto-container convert_step">
                <h1 class="howto-title">Select your template type.</h1>
                <ol class="template_type">
                    <li class="resume_type">
                        <input type="radio" id="temp3" name="template" value="3" checked>
                        <a href="#ex1" rel="modal:open">Template 3</a>
                    </li>  
                    <li class="resume_type">
                        <input type="radio" id="temp4" name="template" value="4">
                        <a href="#ex1" rel="modal:open">Template 4</a>
                    </li>                   
                </ol>
            </section>
            <section class="howto-container convert_step">
                <button class="btn btn-large btn-success margin-1em show-unauth resume_analysis">Resume analysis</button>
            </section>
        </div>  
       
        {{-- </form> --}}
        @endauth
        <div class="content-container light start-panel step4 plan_price">           
            <section class="howto-container convert_step ">
                <a class="btn btn-large btn-success margin-1em show-unauth start_convert">Start conversion!</a>
            </section>
        </div>      
        <section class="howto-container convert_step step5 plan_price">
            <h1 class="howto-title">Successfully conversion</h1>  
            <div class="howto-title convert_file_name">
            </div>
        <a href={{route('home')}} class="btn btn-large btn-success margin-1em ">New conversion</a>
        </section>
        <form class="dialog url-input-form hidden">
            <label class="caption" for="url_input">Enter file location</label>
            <div class="fields">
                <input class="url-input flex-stretch" id="url_input" type="url"
                    placeholder="http://example.com/myfile.docx" required="" autofocus="">
                <input type="submit" class="ok btn btn-medium btn-success margin-1em" value="Enter">
            </div>
        </form>
        <div class="fullscr-dialog nag-signup hidden">
            <header class="content-container light fullscr-dialog-header">
                <nav class="fullscr-dialog-menu">
                    <a class="logo img-logo" href="https://www.freepdfconvert.com/">
                        <span class="logo-text">PDF Converter</span>
                    </a>
                    <div href="/" class="fullscr-dialog-close img-close"></div>
                </nav>
            </header>



            <div class="content-container">
                <section class="msg-container">
                    <div class="message"></div>
                    <div class="actions">
                        <a href="https://www.freepdfconvert.com/membership"
                            class="menu-item btn btn-success sign-up">Sign Up</a>
                    </div>
                </section>
            </div>

            <section class="content-container prices-container">






                <div class="prices">
                    <a class="price"
                        href="https://checkout.paddle.com/checkout/custom/eyJ0IjoiMSBtb250aCIsImkiOiJodHRwczpcL1wvd3d3LmZyZWVwZGZjb252ZXJ0LmNvbVwvY29udGVudFwvZmF2aWNvbnNcL2FuZHJvaWQtY2hyb21lLTk2eDk2LnBuZyIsInIiOiJodHRwczpcL1wvd3d3LmZyZWVwZGZjb252ZXJ0LmNvbVwvb3JkZXItY29tcGxldGVkP2NoZWNrb3V0X2hhc2g9e2NoZWNrb3V0X2hhc2h9IiwiY20iOiJUaGUgbWVtYmVyc2hpcCBmb3Igd3d3LmZyZWVwZGZjb252ZXJ0LmNvbSIsInJlIjoxLCJwIjo1Nzc0NjYsImFsIjowLCJjYyI6eyJVU0QiOiI2LjAwIiwiR0JQIjoiNC41MSIsIkVVUiI6IjUuMDUiLCJSVUIiOiI0NTcuOCIsIkFVRCI6IjguMTkiLCJCUkwiOiIzMi4yOCIsIkNBRCI6IjcuODQiLCJDSEYiOiI1LjQ2IiwiQ05ZIjoiMzkuMzgiLCJQTE4iOiIyMi41OCIsIlNFSyI6IjUxLjY0IiwiWkFSIjoiOTIuMTciLCJDWksiOiIxMzMuMSIsIkhVRiI6IjE4MTkuOCIsIkRLSyI6IjM3LjY0IiwiTlpEIjoiOC42MiIsIlNHRCI6IjguMDUiLCJIS0QiOiI0Ni41MiIsIklOUiI6IjQ0NC43MiIsIkpQWSI6IjYyMyIsIktSVyI6IjY2ODEiLCJNWE4iOiIxMjAuMzQiLCJBUlMiOiI0ODEuNDEiLCJUV0QiOiIxNzEuMjQifSwicnAiOnsiVVNEIjoiNi4wMCIsIkdCUCI6IjQuNTEiLCJFVVIiOiI1LjA1IiwiUlVCIjoiNDU3LjgiLCJBVUQiOiI4LjE5IiwiQlJMIjoiMzIuMjgiLCJDQUQiOiI3Ljg0IiwiQ0hGIjoiNS40NiIsIkNOWSI6IjM5LjM4IiwiUExOIjoiMjIuNTgiLCJTRUsiOiI1MS42NCIsIlpBUiI6IjkyLjE3IiwiQ1pLIjoiMTMzLjEiLCJIVUYiOiIxODE5LjgiLCJES0siOiIzNy42NCIsIk5aRCI6IjguNjIiLCJTR0QiOiI4LjA1IiwiSEtEIjoiNDYuNTIiLCJJTlIiOiI0NDQuNzIiLCJKUFkiOiI2MjMiLCJLUlciOiI2NjgxIiwiTVhOIjoiMTIwLjM0IiwiQVJTIjoiNDgxLjQxIiwiVFdEIjoiMTcxLjI0In0sImgiOiJBcHBWZXJzaW9uPWE7UHJvZHVjdElkPTU3NzQ2NjtVc2VySWQ9IiwieSI6IiIsInEiOjAsImQiOjEsImEiOltdLCJ2IjoiMTY1MTMiLCJkdyI6ZmFsc2UsInMiOiJmODM0N2ZmZmM5MWRkZWZkMzE3NWQ2MThlNjc2ODIxZDg0NDRmNTQxNjFlMWMyYzc0NDUyOWZlMmY5MDZjMjUzMjdmNzk3MjZjODAxZDcwMWRhZTkwMzE5ZDkxM2NlMDkzYjIzMGVmYmM2ZmQyMzA3Njg0ZTA1YTZmMTJiY2JlNyJ9?locale=eng"
                        data-product-id="577466" data-title="1 month"
                        data-passthrough="ProductId=577466;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div class="ribbon save">Save<br>20%</div>
                        <div class="ribbon best">BEST VALUE</div>
                        <div class="duration">1 month</div>
                        <div class="ammount">$6</div>
                        <div class="period">monthly</div>
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                    <a class="price save"
                        href="https://checkout.paddle.com/checkout/custom/eyJ0IjoiMTIgbW9udGhzIiwiaSI6Imh0dHBzOlwvXC93d3cuZnJlZXBkZmNvbnZlcnQuY29tXC9jb250ZW50XC9mYXZpY29uc1wvYW5kcm9pZC1jaHJvbWUtOTZ4OTYucG5nIiwiciI6Imh0dHBzOlwvXC93d3cuZnJlZXBkZmNvbnZlcnQuY29tXC9vcmRlci1jb21wbGV0ZWQ_Y2hlY2tvdXRfaGFzaD17Y2hlY2tvdXRfaGFzaH0iLCJjbSI6IlRoZSBtZW1iZXJzaGlwIGZvciB3d3cuZnJlZXBkZmNvbnZlcnQuY29tIiwicmUiOjEsInAiOjU1MjgxMSwiYWwiOjAsImNjIjp7IlVTRCI6IjUwLjAwIiwiR0JQIjoiMzcuNTYiLCJFVVIiOiI0Mi4xMSIsIlJVQiI6IjM4MTQuOTYiLCJBVUQiOiI2OC4yOCIsIkJSTCI6IjI2OS4wNCIsIkNBRCI6IjY1LjM3IiwiQ0hGIjoiNDUuNSIsIkNOWSI6IjMyOC4xNSIsIlBMTiI6IjE4OC4xNCIsIlNFSyI6IjQzMC4zMyIsIlpBUiI6Ijc2OC4wNyIsIkNaSyI6IjExMDkuMTMiLCJIVUYiOiIxNTE2NC45NyIsIkRLSyI6IjMxMy42NCIsIk5aRCI6IjcxLjg1IiwiU0dEIjoiNjcuMTIiLCJIS0QiOiIzODcuNjMiLCJJTlIiOiIzNzA2In0sInJwIjp7IlVTRCI6IjUwLjAwIiwiR0JQIjoiMzcuNTYiLCJFVVIiOiI0Mi4xMSIsIlJVQiI6IjM4MTQuOTYiLCJBVUQiOiI2OC4yOCIsIkJSTCI6IjI2OS4wNCIsIkNBRCI6IjY1LjM3IiwiQ0hGIjoiNDUuNSIsIkNOWSI6IjMyOC4xNSIsIlBMTiI6IjE4OC4xNCIsIlNFSyI6IjQzMC4zMyIsIlpBUiI6Ijc2OC4wNyIsIkNaSyI6IjExMDkuMTMiLCJIVUYiOiIxNTE2NC45NyIsIkRLSyI6IjMxMy42NCIsIk5aRCI6IjcxLjg1IiwiU0dEIjoiNjcuMTIiLCJIS0QiOiIzODcuNjMiLCJJTlIiOiIzNzA2In0sImgiOiJBcHBWZXJzaW9uPWE7UHJvZHVjdElkPTU1MjgxMTtVc2VySWQ9IiwieSI6IiIsInEiOjAsImQiOjEsImEiOltdLCJ2IjoiMTY1MTMiLCJkdyI6ZmFsc2UsInMiOiI5Yjg2ODExNDM5NGE5ZWEzMzQ1OTZhNzQzN2I2MTgzNTRmYzlkM2RkNmUwN2M3NzE0ZTFkZjc0MjQwNWQ0ZTMwZjBjMmFkOGNlN2VmYzY2NTcwNzEwNWVhYTA0OGM4M2QxZWE2YzAyYWJhNjYyN2ZmZWNmY2YzYTkyZWFkYWVjMiJ9?locale=eng"
                        data-product-id="552811" data-title="12 months"
                        data-passthrough="ProductId=552811;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div class="ribbon save">Save<br>20%</div>
                        <div class="ribbon best">BEST VALUE</div>
                        <div class="duration">12 months</div>
                        <div class="ammount">$50</div>
                        <div class="period">annually</div>
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                    <a class="price best"
                        href="https://checkout.paddle.com/checkout/custom/eyJ0IjoiTGlmZXRpbWUiLCJpIjoiaHR0cHM6XC9cL3d3dy5mcmVlcGRmY29udmVydC5jb21cL2NvbnRlbnRcL2Zhdmljb25zXC9hbmRyb2lkLWNocm9tZS05Nng5Ni5wbmciLCJyIjoiaHR0cHM6XC9cL3d3dy5mcmVlcGRmY29udmVydC5jb21cL29yZGVyLWNvbXBsZXRlZD9jaGVja291dF9oYXNoPXtjaGVja291dF9oYXNofSIsImNtIjoiVGhlIG1lbWJlcnNoaXAgZm9yIHd3dy5mcmVlcGRmY29udmVydC5jb20iLCJyZSI6MSwicCI6NTE5NzEzLCJjYyI6eyJVU0QiOiI5OS4wMCIsIkdCUCI6Ijc0LjM3IiwiRVVSIjoiODMuMzgiLCJSVUIiOiI3NTUzLjYyIiwiQVVEIjoiMTM1LjIiLCJCUkwiOiI1MzIuNjkiLCJDQUQiOiIxMjkuNDMiLCJDSEYiOiI5MC4xIiwiQ05ZIjoiNjQ5Ljc0IiwiUExOIjoiMzcyLjUzIiwiU0VLIjoiODUyLjA1IiwiWkFSIjoiMTUyMC43OCIsIkNaSyI6IjIxOTYuMDgiLCJIVUYiOiIzMDAyNi42NSIsIkRLSyI6IjYyMS4wMSIsIk5aRCI6IjE0Mi4yNyIsIlNHRCI6IjEzMi44OSIsIkhLRCI6Ijc2Ny41MSIsIklOUiI6IjczMzcuODgifSwiaCI6IkFwcFZlcnNpb249YTtQcm9kdWN0SWQ9MzExMzgxMjtVc2VySWQ9IiwieSI6IiIsInEiOjAsImQiOjEsImEiOltdLCJ2IjoiMTY1MTMiLCJkdyI6ZmFsc2UsInMiOiI3YmNhYmJmNmMxMjQ1YzljMDJhYjhlYTJhNmQ5YTIyYjg0YjI5MzgzMWM5MDIyMTJmOGEzNjQzNjhjZjEwYTdlMzcwYzZlZDlkNWQ0OTVhYTA4MjI4MmIzYTRlY2YxYjNhY2IzNTY1ZjMwYjc0YzNkOGEwYzgyOTFhOWI1MWMxYyJ9?locale=eng"
                        data-product-id="519713" data-title="Lifetime"
                        data-passthrough="ProductId=3113812;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div class="ribbon save">Save<br>20%</div>
                        <div class="ribbon best">BEST VALUE</div>
                        <div class="duration">Lifetime</div>
                        <div class="ammount">$99</div>
                        <div class="period">one-time</div>
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                </div>


            </section>

            <section class="content-container wait-panel">
                <h2 class="title">Premium users gets more</h2>
                <section class="member-feature-container">
                    <ul class="member-feature-list">
                        <li class="img-check icon-left-large member-feature"><strong>No more waiting!</strong> Instant
                            conversions</li>
                        <li class="img-check icon-left-large member-feature">Unlimited document size</li>
                        <li class="img-check icon-left-large member-feature">Convert multiple documents at once</li>
                        <li class="img-check icon-left-large member-feature">Unlimited access to all our tools</li>
                    </ul>
                    <ul class="member-feature-list">
                        <li class="img-check icon-left-large member-feature">Secure files with 256-bit SSL Encryption
                        </li>
                        <li class="img-check icon-left-large member-feature">Use on any computer anywhere</li>
                        <li class="img-check icon-left-large member-feature">Priority support</li>
                        <li class="img-check icon-left-large member-feature">20 Tools to extract, convert, compress,
                            merge and split PDFs</li>
                    </ul>
                </section>

            </section>

        </div>
        <div class="fullscr-dialog nag-wait hidden">
            <header class="content-container light fullscr-dialog-header">
                <nav class="fullscr-dialog-menu">
                    <a class="logo img-logo" href="https://www.freepdfconvert.com/">
                        <span class="logo-text">PDF Converter</span>
                    </a>
                    <div href="/" class="fullscr-dialog-close img-close"></div>
                </nav>
            </header>



            <div class="content-container">
                <section class="msg-container">
                    <div class="message"></div>
                    <div class="actions">
                        <a href="https://www.freepdfconvert.com/membership"
                            class="menu-item btn btn-success sign-up">Sign Up</a>
                    </div>
                </section>
            </div>

            <section class="content-container wait-panel">
                <section class="file-item">
                    <main class="file-item-main">
                        <div class="thumbnail img-spinner spinner"></div>
                    </main>
                    <footer class="file-item-footer">
                        <div class="file-name"></div>
                    </footer>
                </section>
            </section>

            <section class="content-container prices-container">






                <div class="prices">
                    <a class="price"
                        href="https://checkout.paddle.com/checkout/custom/eyJ0IjoiMSBtb250aCIsImkiOiJodHRwczpcL1wvd3d3LmZyZWVwZGZjb252ZXJ0LmNvbVwvY29udGVudFwvZmF2aWNvbnNcL2FuZHJvaWQtY2hyb21lLTk2eDk2LnBuZyIsInIiOiJodHRwczpcL1wvd3d3LmZyZWVwZGZjb252ZXJ0LmNvbVwvb3JkZXItY29tcGxldGVkP2NoZWNrb3V0X2hhc2g9e2NoZWNrb3V0X2hhc2h9IiwiY20iOiJUaGUgbWVtYmVyc2hpcCBmb3Igd3d3LmZyZWVwZGZjb252ZXJ0LmNvbSIsInJlIjoxLCJwIjo1Nzc0NjYsImFsIjowLCJjYyI6eyJVU0QiOiI2LjAwIiwiR0JQIjoiNC41MSIsIkVVUiI6IjUuMDUiLCJSVUIiOiI0NTcuOCIsIkFVRCI6IjguMTkiLCJCUkwiOiIzMi4yOCIsIkNBRCI6IjcuODQiLCJDSEYiOiI1LjQ2IiwiQ05ZIjoiMzkuMzgiLCJQTE4iOiIyMi41OCIsIlNFSyI6IjUxLjY0IiwiWkFSIjoiOTIuMTciLCJDWksiOiIxMzMuMSIsIkhVRiI6IjE4MTkuOCIsIkRLSyI6IjM3LjY0IiwiTlpEIjoiOC42MiIsIlNHRCI6IjguMDUiLCJIS0QiOiI0Ni41MiIsIklOUiI6IjQ0NC43MiIsIkpQWSI6IjYyMyIsIktSVyI6IjY2ODEiLCJNWE4iOiIxMjAuMzQiLCJBUlMiOiI0ODEuNDEiLCJUV0QiOiIxNzEuMjQifSwicnAiOnsiVVNEIjoiNi4wMCIsIkdCUCI6IjQuNTEiLCJFVVIiOiI1LjA1IiwiUlVCIjoiNDU3LjgiLCJBVUQiOiI4LjE5IiwiQlJMIjoiMzIuMjgiLCJDQUQiOiI3Ljg0IiwiQ0hGIjoiNS40NiIsIkNOWSI6IjM5LjM4IiwiUExOIjoiMjIuNTgiLCJTRUsiOiI1MS42NCIsIlpBUiI6IjkyLjE3IiwiQ1pLIjoiMTMzLjEiLCJIVUYiOiIxODE5LjgiLCJES0siOiIzNy42NCIsIk5aRCI6IjguNjIiLCJTR0QiOiI4LjA1IiwiSEtEIjoiNDYuNTIiLCJJTlIiOiI0NDQuNzIiLCJKUFkiOiI2MjMiLCJLUlciOiI2NjgxIiwiTVhOIjoiMTIwLjM0IiwiQVJTIjoiNDgxLjQxIiwiVFdEIjoiMTcxLjI0In0sImgiOiJBcHBWZXJzaW9uPWE7UHJvZHVjdElkPTU3NzQ2NjtVc2VySWQ9IiwieSI6IiIsInEiOjAsImQiOjEsImEiOltdLCJ2IjoiMTY1MTMiLCJkdyI6ZmFsc2UsInMiOiJmODM0N2ZmZmM5MWRkZWZkMzE3NWQ2MThlNjc2ODIxZDg0NDRmNTQxNjFlMWMyYzc0NDUyOWZlMmY5MDZjMjUzMjdmNzk3MjZjODAxZDcwMWRhZTkwMzE5ZDkxM2NlMDkzYjIzMGVmYmM2ZmQyMzA3Njg0ZTA1YTZmMTJiY2JlNyJ9?locale=eng"
                        data-product-id="577466" data-title="1 month"
                        data-passthrough="ProductId=577466;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div class="ribbon save">Save<br>20%</div>
                        <div class="ribbon best">BEST VALUE</div>
                        <div class="duration">1 month</div>
                        <div class="ammount">$6</div>
                        <div class="period">monthly</div>
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                    <a class="price save"
                        href="https://checkout.paddle.com/checkout/custom/eyJ0IjoiMTIgbW9udGhzIiwiaSI6Imh0dHBzOlwvXC93d3cuZnJlZXBkZmNvbnZlcnQuY29tXC9jb250ZW50XC9mYXZpY29uc1wvYW5kcm9pZC1jaHJvbWUtOTZ4OTYucG5nIiwiciI6Imh0dHBzOlwvXC93d3cuZnJlZXBkZmNvbnZlcnQuY29tXC9vcmRlci1jb21wbGV0ZWQ_Y2hlY2tvdXRfaGFzaD17Y2hlY2tvdXRfaGFzaH0iLCJjbSI6IlRoZSBtZW1iZXJzaGlwIGZvciB3d3cuZnJlZXBkZmNvbnZlcnQuY29tIiwicmUiOjEsInAiOjU1MjgxMSwiYWwiOjAsImNjIjp7IlVTRCI6IjUwLjAwIiwiR0JQIjoiMzcuNTYiLCJFVVIiOiI0Mi4xMSIsIlJVQiI6IjM4MTQuOTYiLCJBVUQiOiI2OC4yOCIsIkJSTCI6IjI2OS4wNCIsIkNBRCI6IjY1LjM3IiwiQ0hGIjoiNDUuNSIsIkNOWSI6IjMyOC4xNSIsIlBMTiI6IjE4OC4xNCIsIlNFSyI6IjQzMC4zMyIsIlpBUiI6Ijc2OC4wNyIsIkNaSyI6IjExMDkuMTMiLCJIVUYiOiIxNTE2NC45NyIsIkRLSyI6IjMxMy42NCIsIk5aRCI6IjcxLjg1IiwiU0dEIjoiNjcuMTIiLCJIS0QiOiIzODcuNjMiLCJJTlIiOiIzNzA2In0sInJwIjp7IlVTRCI6IjUwLjAwIiwiR0JQIjoiMzcuNTYiLCJFVVIiOiI0Mi4xMSIsIlJVQiI6IjM4MTQuOTYiLCJBVUQiOiI2OC4yOCIsIkJSTCI6IjI2OS4wNCIsIkNBRCI6IjY1LjM3IiwiQ0hGIjoiNDUuNSIsIkNOWSI6IjMyOC4xNSIsIlBMTiI6IjE4OC4xNCIsIlNFSyI6IjQzMC4zMyIsIlpBUiI6Ijc2OC4wNyIsIkNaSyI6IjExMDkuMTMiLCJIVUYiOiIxNTE2NC45NyIsIkRLSyI6IjMxMy42NCIsIk5aRCI6IjcxLjg1IiwiU0dEIjoiNjcuMTIiLCJIS0QiOiIzODcuNjMiLCJJTlIiOiIzNzA2In0sImgiOiJBcHBWZXJzaW9uPWE7UHJvZHVjdElkPTU1MjgxMTtVc2VySWQ9IiwieSI6IiIsInEiOjAsImQiOjEsImEiOltdLCJ2IjoiMTY1MTMiLCJkdyI6ZmFsc2UsInMiOiI5Yjg2ODExNDM5NGE5ZWEzMzQ1OTZhNzQzN2I2MTgzNTRmYzlkM2RkNmUwN2M3NzE0ZTFkZjc0MjQwNWQ0ZTMwZjBjMmFkOGNlN2VmYzY2NTcwNzEwNWVhYTA0OGM4M2QxZWE2YzAyYWJhNjYyN2ZmZWNmY2YzYTkyZWFkYWVjMiJ9?locale=eng"
                        data-product-id="552811" data-title="12 months"
                        data-passthrough="ProductId=552811;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div class="ribbon save">Save<br>20%</div>
                        <div class="ribbon best">BEST VALUE</div>
                        <div class="duration">12 months</div>
                        <div class="ammount">$50</div>
                        <div class="period">annually</div>
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                    <a class="price best"
                        href="https://checkout.paddle.com/checkout/custom/eyJ0IjoiTGlmZXRpbWUiLCJpIjoiaHR0cHM6XC9cL3d3dy5mcmVlcGRmY29udmVydC5jb21cL2NvbnRlbnRcL2Zhdmljb25zXC9hbmRyb2lkLWNocm9tZS05Nng5Ni5wbmciLCJyIjoiaHR0cHM6XC9cL3d3dy5mcmVlcGRmY29udmVydC5jb21cL29yZGVyLWNvbXBsZXRlZD9jaGVja291dF9oYXNoPXtjaGVja291dF9oYXNofSIsImNtIjoiVGhlIG1lbWJlcnNoaXAgZm9yIHd3dy5mcmVlcGRmY29udmVydC5jb20iLCJyZSI6MSwicCI6NTE5NzEzLCJjYyI6eyJVU0QiOiI5OS4wMCIsIkdCUCI6Ijc0LjM3IiwiRVVSIjoiODMuMzgiLCJSVUIiOiI3NTUzLjYyIiwiQVVEIjoiMTM1LjIiLCJCUkwiOiI1MzIuNjkiLCJDQUQiOiIxMjkuNDMiLCJDSEYiOiI5MC4xIiwiQ05ZIjoiNjQ5Ljc0IiwiUExOIjoiMzcyLjUzIiwiU0VLIjoiODUyLjA1IiwiWkFSIjoiMTUyMC43OCIsIkNaSyI6IjIxOTYuMDgiLCJIVUYiOiIzMDAyNi42NSIsIkRLSyI6IjYyMS4wMSIsIk5aRCI6IjE0Mi4yNyIsIlNHRCI6IjEzMi44OSIsIkhLRCI6Ijc2Ny41MSIsIklOUiI6IjczMzcuODgifSwiaCI6IkFwcFZlcnNpb249YTtQcm9kdWN0SWQ9MzExMzgxMjtVc2VySWQ9IiwieSI6IiIsInEiOjAsImQiOjEsImEiOltdLCJ2IjoiMTY1MTMiLCJkdyI6ZmFsc2UsInMiOiI3YmNhYmJmNmMxMjQ1YzljMDJhYjhlYTJhNmQ5YTIyYjg0YjI5MzgzMWM5MDIyMTJmOGEzNjQzNjhjZjEwYTdlMzcwYzZlZDlkNWQ0OTVhYTA4MjI4MmIzYTRlY2YxYjNhY2IzNTY1ZjMwYjc0YzNkOGEwYzgyOTFhOWI1MWMxYyJ9?locale=eng"
                        data-product-id="519713" data-title="Lifetime"
                        data-passthrough="ProductId=3113812;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div class="ribbon save">Save<br>20%</div>
                        <div class="ribbon best">BEST VALUE</div>
                        <div class="duration">Lifetime</div>
                        <div class="ammount">$99</div>
                        <div class="period">one-time</div>
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                </div>


            </section>

            <section class="content-container wait-panel">
                <h2 class="title">Premium users gets more</h2>
                <section class="member-feature-container">
                    <ul class="member-feature-list">
                        <li class="img-check icon-left-large member-feature"><strong>No more waiting!</strong> Instant
                            conversions</li>
                        <li class="img-check icon-left-large member-feature">Unlimited document size</li>
                        <li class="img-check icon-left-large member-feature">Convert multiple documents at once</li>
                        <li class="img-check icon-left-large member-feature">Unlimited access to all our tools</li>
                    </ul>
                    <ul class="member-feature-list">
                        <li class="img-check icon-left-large member-feature">Secure files with 256-bit SSL Encryption
                        </li>
                        <li class="img-check icon-left-large member-feature">Use on any computer anywhere</li>
                        <li class="img-check icon-left-large member-feature">Priority support</li>
                        <li class="img-check icon-left-large member-feature">20 Tools to extract, convert, compress,
                            merge and split PDFs</li>
                    </ul>
                </section>

            </section>



        </div>
        <div class="content-container light start-panel">
            <section class="howto-container">
                <h2 class="howto-title">How to Convert a PDF to Word</h2>
                <ol class="howto-steps">
                    <li class="howto-step">Choose the resume in pdf you want to convert. </li>
                    <li class="howto-step">Add the resume using “Choose resume” link</li>
                    <li class="howto-step">Pick a target template of your choice. </li>
                    <li class="howto-step">Click convert and our system will convert the resume into template of your
                        choice. </li>
                </ol>
            </section>
        </div>
        <div class="content-container start-panel">
            <section class="features-container">
                <div class="well feature img-feature-best">
                    <h3 class="feature-title">The Best PDF to Word Converter</h3>
                    <p class="feature-text">Our PDF converter is the best choice for your file conversion needs, whether
                        you need to turn a PDF into a Word doc, Excel sheet, PowerPoint, or even a PNG or JPG.</p>
                </div>
                <!-- <div class="well feature img-feature-tools">
                    <h3 class="feature-title">Access to 20 PDF conversion tools</h3>
                    <p class="feature-text">With a suite of other easy-to-use tools for merging and splitting PDFs,
                        compressing and rotating PDFs, and deleting PDF pages, our PDF converter breaks you free from
                        the typical constraints of PDF files.</p>
                </div>
                <div class="well feature img-feature-secure">
                    <h3 class="feature-title">Encrypted files for security</h3>
                    <p class="feature-text">Our PDF converter secures your files with 256-bit SSL Encryption, and the
                        data you submit won’t be shared with or accessed by any other parties.</p>
                </div> -->
                <div class="well feature img-feature-delete">
                    <h3 class="feature-title">Rapid conversion with automatic deletion</h3>
                    <p class="feature-text">When you upload a PDF to convert it to Word, your files are converted
                        immediately and deleted after conversion, with no residual copies retained.</p>
                </div>
                <div class="well feature img-feature-universal">
                    <h3 class="feature-title">Use on any computer, anywhere</h3>
                    <p class="feature-text">Our PDF converter works with Mac, Windows, and Linux machines, so you can
                        use it on any computer, anywhere.</p>
                </div>
                <div class="well feature img-feature-start">
                    <h3 class="feature-title">Convert PDF to Word free with a free trial</h3>
                    <p class="feature-text">Try our PDF to Word converter free with a free trial, or sign up for a
                        monthly, annual, or lifetime membership to get unlimited access to all our tools, including
                        unlimited document sizes and the ability to convert multiple documents at once.</p>
                </div>
            </section>
        </div>
        <div class="content-container start-panel">
            <section class="testimonial-container hidden-mobile">
                <div class="testimonial-header">
                    <div class="testimonial-title">Join Our 5000 Users</div>
                    <div id="convert-counter" data-template="{0} conversions since 2005!"><span
                            class="count">500000</span> conversions since 2005!</div>
                </div>
                <blockquote class="well testimonial-body">
                    <p class="testimonial">A very big 'thank you'. Just a few seconds, six or seven..and here it comes!!
                        You are really fast and accurate. You made a new friend in Greece. Thank you again.</p>
                    <footer class="source">Our valued user <cite title="Source Title">Kiki Kariotou, Greece</cite>
                    </footer>
                </blockquote>

                <a href="{{ route('signup') }}"
                    class="btn btn-large btn-success margin-1em show-unauth">Sign Up now!</a>
            </section>
        </div>
        {{-- main end --}}
       
    </main>


    <footer class="layout-footer">
        <nav>
            <div class="c1">
                <a href="http://www.baltsoft.com/" class="menu-item">© 2005 - 2020 Baltsoft</a>
            </div>
            <div class="c2">
                <div class="menu-item language-button icon-left-large img-globe">English</div>

                <ul class="language-dialog hidden">
                    <li><a href="https://www.freepdfconvert.com/">English</a></li>
                    <li><a href="https://www.freepdfconvert.com/ar">العربية</a></li>
                    <li><a href="https://www.freepdfconvert.com/da">Dansk</a></li>
                    <li><a href="https://www.freepdfconvert.com/de">Deutsch</a></li>
                    <li><a href="https://www.freepdfconvert.com/es">Español</a></li>
                    <li><a href="https://www.freepdfconvert.com/fr">Français</a></li>
                    <li><a href="https://www.freepdfconvert.com/he">עברית</a></li>
                    <li><a href="https://www.freepdfconvert.com/hi">हिंदी</a></li>
                    <li><a href="https://www.freepdfconvert.com/id">Bahasa Indonesia</a></li>
                    <li><a href="https://www.freepdfconvert.com/it">Italiano</a></li>
                    <li><a href="https://www.freepdfconvert.com/ja">日本語</a></li>
                    <li><a href="https://www.freepdfconvert.com/lt">Lietuvių</a></li>
                    <li><a href="https://www.freepdfconvert.com/no">Norsk</a></li>
                    <li><a href="https://www.freepdfconvert.com/pl">Polski</a></li>
                    <li><a href="https://www.freepdfconvert.com/pt">Português</a></li>
                    <li><a href="https://www.freepdfconvert.com/ru">Русский</a></li>
                    <li><a href="https://www.freepdfconvert.com/sv">Svenska</a></li>
                    <li><a href="https://www.freepdfconvert.com/tr">Türkçe</a></li>
                    <li><a href="https://www.freepdfconvert.com/uk">Українська</a></li>
                    <li><a href="https://www.freepdfconvert.com/vi">Tiếng Việt</a></li>
                    <li><a href="https://www.freepdfconvert.com/zh-hans">中文(简体)</a></li>
                    <li><a href="https://www.freepdfconvert.com/zh-hant">中文(繁體)</a></li>

                </ul>
                <a href="https://www.freepdfconvert.com/help" class="menu-item">Help</a>
                <a href="https://www.freepdfconvert.com/terms" class="menu-item">Terms and Privacy</a>
                <a href="https://www.convertapi.com/" class="menu-item">Contact us</a>
            </div>


        </nav>
    </footer>
    <div id="ex1" class="modal">
        <embed src="1.pdf" width="100%" height="650px" />
        <a href="#" rel="modal:close">Close</a>
    </div>
     {{-- sign in start--}}
     <div id="ex2" class="modal" style="max-width: 600px;">
        <section class="modal-container">
            <div class="header">
                <a class="logo" href="/">
                    <img src="asset/image/logo.png" class="logo-image" alt="" srcset="">
                    <span class="logo-text">Convert resumes to templates
                    </span>
                </a>               
            </div>
            <form method="POST" action="{{ route('login') }}" class="form-vertical signin-form " data-popup-message="">
                @csrf
                <h1>Sign In</h1>
                <div class="oauth-buttons">
                    <a class="btn btn-white icon-left-large img-google"
                    href="{{ url('/google_redirect') }}"
                        title="Sign in with Google">Google</a>
                    <a class="fb-btn btn btn-white icon-left-large img-facebook-white"
                        href="https://www.facebook.com/dialog/oauth?response_type=code&amp;client_id=206786386905861&amp;redirect_uri=https:%2F%2Fwww.freepdfconvert.com%2Fa%2Foauth2callback%2Ffacebook&amp;scope=email"
                        title="Sign in with Facebook">Facebook</a>
                </div>
                <div class="hr-text">or</div>

                <input data-val="true" data-val-email="Please enter a valid e-mail"
                    data-val-required="The E-mail field is required." id="email" name="email":value="old('email')" placeholder="E-mail"
                    required="required" type="email" value="" />
                <input data-val="true" data-val-required="The Password field is required." id="password" name="password"
                    placeholder="Password" required="required" type="password" value="" />
                <div class="actions">
                <button type="submit" class="btn btn-success">Sign In</button>
                    {{-- <button class="btn btn-success">Sign In</a> --}}
                <div class="links">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                     
                        <div><span class="text-muted">Don&apos;t have a membership?</span> 
                    <a href="{{ route('signup') }}">Sign Up</a>!</div>
                    </div>
                </div>
            </form>


        </section>
    </div>
    {{-- sign in end --}} 
    <script src="./asset/js/javascript.js"></script>  
</body>

</html>