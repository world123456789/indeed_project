<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="home" id="top">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title>Resume converter</title>
    <link rel="stylesheet" href="{{ asset('public/asset/css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/asset/css/style.css') }}" type="text/css">
    <script src="{{ asset('public/asset/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>
<body class="converter ltr unauthenticated">
    <div class="global-progress"></div>
    <header class="layout-header">
        <nav class="layout-header-nav">
            <a class="logo" href="{{ route('/') }}">
                <img src="{{ asset('public/asset/image/logo.png') }}" class="logo-image" alt="" srcset="">
            <div style="width:100%;text-align:right;@guest padding-top: 10px @endguest">
                @auth   
                <div class=""style="display:flex;width:100%;">                      
                    <p class="indood" style="padding-bottom: 0;">5 indeed.com template conversion remaining.</p>
                    <p class="indood ">5 non indeed.com template conversion remaining</p>
                </div>  
                @endauth
                <span class="logo-text">Converts Resume to Different Template with Little or no Edits
                </span>
                </div>              
            </a>
            @if (Route::has('login'))
                @auth
                    {{-- <div class="main-menu header-menu" style="margin-left: 19px;justify-content: end;">
                        <p class="indood" style="padding-bottom: 0;
                    margin-top: 17px;">5 indeed.com template conversion remaining.</p>
                        <p class="indood">5 non indeed.com template conversion remaining</p>
                    </div> --}}
                    <div class="user-menu">
                        <a href="#" class="menu-item show-unauth">Uugrade</a>
                        <a href="{{ route('profile.show') }}" class="menu-item show-unauth">My profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-responsive-nav-link>
                        </form>
                    </div>
                @else
                    <div class="main-menu header-menu">
                    </div>
                    <div class="user-menu">
                        <a href="https://www.freepdfconvert.com/a"
                            class="icon-right img-arrow-down-black menu-item show-auth">
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
        {{-- <form action="{{ route('file.upload.post') }}" method="POST"
            enctype="multipart/form-data" style="width: 60%">
            @csrf --}}
            <div class="content-container start-panel">
                <section class="file-input-container">
                    <label class="upload-area">
                        <div class="dashes">
                            <div class="upload-btn-container">
                                <div class="btn btn-success icon-left-large img-plus-white upload-btn">Choose resume
                                </div>
                            </div>
                            <div class="drop">drop files here</div>
                            <input class="file-upload-input" id="file" type="file" name="file" multiple="multiple"
                                accept=".pdf">

                        </div>
                    </label>
                </section>

                {{-- </a> --}}


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
                    <button class="btn btn-large btn-success margin-1em show-unauth resume_analysis">Resume
                        analysis</button>
                </section>
            </div>

            {{--
        </form> --}}
        <div class="content-container light start-panel step4 plan_price">
            <section class="howto-container convert_step ">
                <a class="btn btn-large btn-success margin-1em show-unauth start_convert">Start conversion!</a>
            </section>
        </div>
        <section class="howto-container convert_step step5 plan_price">
            <h1 class="howto-title">Successfully conversion</h1>
            <div class="howto-title convert_file_name">
            </div>
            <a href={{ route('home') }} class="btn btn-large btn-success margin-1em ">New conversion</a>
        </section>
        <div class="content-container light start-panel">
            <section class="howto-container">
                <h2 class="howto-title">How to Convert indeed.com or non indeed.com Resume to Templates</h2>
                <ol class="howto-steps">
                    <li class="howto-step">Choose resume.</li>
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
                    <div class="testimonial-title">Over 5000 happy customers</div>
                    <div id="convert-counter" data-template="{0} conversions since 2005!"><span
                            class="count">500000 </span>conversions since 2020!</div>
                </div>
                <blockquote class="well testimonial-body">
                    <p class="testimonial">What a life saver! I have been searching for an app that will convert resumes
                        to template without much work needed afterwards and this app delivered!</p>
                    <footer class="source">Our valued customer, <cite title="Source Title">San Francisco
                            California</cite>
                    </footer>
                </blockquote>

                <a href="{{ route('signup') }}" class="btn btn-large btn-success margin-1em show-unauth">Sign Up
                    now!</a>
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
        <embed src="{{ asset('tem_view/1.pdf') }}" width="100%" height="650px" />
        <a href="#" rel="modal:close">Close</a>
    </div>
    {{-- sign in start--}}
    <div id="ex2" class="modal" style="max-width: 600px;">
        <section class="modal-container">
            <div class="header">
                <a class="logo" href="/">
                    <img src="{{ asset('public/asset/image/logo.png') }}" class="logo-image" alt="" srcset="">
                    <span class="logo-text">Convert resumes to templates
                    </span>
                </a>
            </div>
            <form method="POST" action="{{ route('login') }}" class="form-vertical signin-form " data-popup-message="">
                @csrf
                <h1>Sign In</h1>
                <div class="oauth-buttons">
                    <a class="btn btn-white icon-left-large img-google" href="{{ url('/google_redirect') }}"
                        title="Sign in with Google">Google</a>
                    <a class="fb-btn btn btn-white icon-left-large img-facebook-white"
                        href="https://www.facebook.com/dialog/oauth?response_type=code&amp;client_id=206786386905861&amp;redirect_uri=https:%2F%2Fwww.freepdfconvert.com%2Fa%2Foauth2callback%2Ffacebook&amp;scope=email"
                        title="Sign in with Facebook">Facebook</a>
                </div>
                <div class="hr-text">or</div>

                <input data-val="true" data-val-email="Please enter a valid e-mail"
                    data-val-required="The E-mail field is required." id="email" name="email" :value="old('email')"
                    placeholder="E-mail" required="required" type="email" value="" />
                <input data-val="true" data-val-required="The Password field is required." id="password" name="password"
                    placeholder="Password" required="required" type="password" value="" />
                <div class="actions">
                    <button type="submit" class="btn btn-success">Sign In</button>
                    {{-- <button class="btn btn-success">Sign In</a>
                        --}}
                        <div class="links">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif

                            <div><span class="text-muted">Don&apos;t have a membership?</span>
                                <a href="{{ route('signup') }}">Sign Up</a>!
                            </div>
                        </div>
                </div>
            </form>


        </section>
    </div>
    {{-- sign in end --}}
    <script src="{{ asset('public/asset/js/javascript.js') }}"></script>
</body>
</html>
