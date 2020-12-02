<!DOCTYPE html>
<html dir="ltr" lang="en" class="home" id="top">

<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{{asset("public/asset/css/app.css")}}" type="text/css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto&amp;display=swap&amp;subset=cyrillic,cyrillic-ext,devanagari,greek,greek-ext,latin-ext,vietnamese"
        type="text/css" />
    <script async defer id="jquery" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        crossorigin="anonymous"></script>
    <!-- <script src="./asset/js/javascript.js"></script> -->
    <script src="{{asset("public/asset/js/jquery.min.js")}}"></script>
    <script src="{{asset("public/asset/js/javascript.js")}}"></script>

</head>

<body class="membership ltr auth-unknown" style="    background: antiquewhite;    height: 100vh;">

    <header class="layout-header">
        <nav class="layout-header-nav">
            <a class="logo" href="/">
                <img src="{{asset("public/asset/image/logo.png")}}" class="logo-image" alt="" srcset="">
                <span class="logo-text">Convert resumes to templates
                </span>
            </a>
            <a href="{{ route('/') }}" class="semimodal-close img-close hidden"></a>
        </nav>
    </header>

    <div class="global-progress"></div>
    <main class="layout-main" style="    display: contents;">
        <section class="content-container heading-container">
            <h1 class="main-header">Select your premium membership</h1>
            <h2 class="main-subheader">Join our 5000+ user community</h2>
        </section>
        <div class="content-container start-panel">
            <section class="features-container">
                <div class="select_resume">
                    <input type="button" name="monthly" class="btn btn-rose monthly" value="Monthly subscription ">
                </div>
                <div class="select_resume">
                    <input type="button" name="yearly" class="btn btn-rose yearly" value="Yearly subscription">
                </div>
            </section>
        </div>
        <div class="content-container">
            <section class="prices-container">
                <div class="prices monthly_plan">
                    <a class="price"
                    href="{{ route('register') }}"
                        data-product-id="577466" data-title="1 month"
                        data-passthrough="ProductId=577466;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div  class="pricing">Free</div><hr>
                        <div class="duration" style="margin-top: 15px;">3 indeed.com templates conversion </div>
                        <div class="ammount">1 template to choose from Free</div><br><br><br><br>
                        <!-- <div class="period" style="    margin-bottom: 67px;">Free</div> -->
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                    <a class="price save"
                    href="{{ route('register') }}"
                        data-product-id="552811" data-title="12 months"
                        data-passthrough="ProductId=552811;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div class="pricing">Silver</div><hr>
                        <div class="duration" style="margin-top: 15px;">30 indeed.com templates conversion per month</div>
                        <div class="ammount">5 templates to choose from $9.99/month</div><br><br><br><br>
                        <!-- <div class="period" style="    margin-bottom: 20px;">$9.99/month</div><br><br> -->
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                    <a class="price best"
                    href="{{ route('register') }}"
                        data-product-id="519713" data-title="Lifetime"
                        data-passthrough="ProductId=3113812;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                       <div  class="pricing">Gold</div><hr>
                        <div class="duration"style="font-size: 16px;">80 indeed.com and 20 non indeed template conversion per month</div>
                        <div class="ammount" style="    margin-bottom: 50px; margin-top: 26px; font-size: 23px;">10 templates to choose from $19.99/month</div><br><br>
                        <!-- <div class="period" style="    margin-bottom: -8px;">$19.99/month</div><br><br> -->
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                    <a class="price best"
                    href="{{ route('register') }}"
                    data-product-id="519713" data-title="Lifetime"
                    data-passthrough="ProductId=3113812;UserId=;AppVersion=a" data-message=""
                    data-redirect="/order-completed">
                   <div  class="pricing">Platinum</div><hr>
                    <div class="duration" style="    font-size: 17px;">Unlimited indeed.com and non indeed.com Templates conversion per month generation</div>
                    <div class="ammount"style="      font-size: 20px;
                    margin-top: -12px;
                    margin-bottom: 102px;">Unlimited Templates to choose from $29.99/month</div>
                    <!-- <div class="period" style="    margin-bottom: -11px;">$29.99/month</div><br> -->
                    <div class="btn btn-success">Sign Up</div>
                </a>
                </div>
                <div class="prices yearly_plan plan_price">
                    <a class="price"
                    href="{{ route('register') }}"
                        data-product-id="577466" data-title="1 month"
                        data-passthrough="ProductId=577466;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div class="pricing">Silver</div><hr>
                        <div class="duration"  style="margin-top: 20px;">30 indeed.com templates conversion per month</div>
                        <div class="ammount" style="    margin-bottom: 89px;">5 templates to choose from $99.99/year</div>
                        <!-- <div class="period" style="    margin-bottom: 74px;">$99.99/year</div><br><br> -->
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                    <a class="price save"
                    href="{{ route('register') }}"
                        data-product-id="552811" data-title="12 months"
                        data-passthrough="ProductId=552811;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div  class="pricing">Gold</div><hr>
                        <div class="duration"  style="margin-top: 20px;    font-size: 17px;">80 indeed.com and 20 non indeed template conversion per month</div>
                        <div class="ammount"style="margin-top: 23px;
                        margin-bottom: 88px;">10 templates to choose from $199.99/year</div>
                        <!-- <div class="period">$199.99/year</div><br><br> -->
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                    <a class="price best"
                    href="{{ route('register') }}"
                        data-product-id="519713" data-title="Lifetime"
                        data-passthrough="ProductId=3113812;UserId=;AppVersion=a" data-message=""
                        data-redirect="/order-completed">
                        <div  class="pricing">Platinum</div><hr>
                        <div class="duration" style="    font-size: 17px;">Unlimited indeed.com and non indeed.com Templates conversion per month generation</div>
                        <div class="ammount"style='font-size: 21px;
                        margin-top: -8px;
                        margin-bottom: 95px;'>Unlimited Templates to choose from $299.99/year</div>
                        <!-- <div class="period"style="    margin-bottom: 45px;">$299.99/year</div><br> -->
                        <div class="btn btn-success">Sign Up</div>
                    </a>
                 
                </div>
            </section>
        </div>
    </main>
    <footer class="layout-footer">
        <nav>
            <div class="c1">
                <a href="http://www.baltsoft.com/" class="menu-item">&#169; 2005 - 2020 Baltsoft</a>
            </div>
            <div class="c2">
                <div class="menu-item language-button icon-left-large img-globe">English</div>

                <ul class="language-dialog hidden">
                    <li><a href="https://www.freepdfconvert.com/">English</a></li>
                    <li><a href="/ar">العربية</a></li>
                    <li><a href="/da">Dansk</a></li>
                    <li><a href="/de">Deutsch</a></li>
                    <li><a href="/es">Espa&#241;ol</a></li>
                    <li><a href="/fr">Fran&#231;ais</a></li>
                    <li><a href="/he">עברית</a></li>
                    <li><a href="/hi">हिंदी</a></li>
                    <li><a href="/id">Bahasa Indonesia</a></li>
                    <li><a href="/it">Italiano</a></li>
                    <li><a href="/ja">日本語</a></li>
                    <li><a href="/lt">Lietuvių</a></li>
                    <li><a href="/no">Norsk</a></li>
                    <li><a href="/pl">Polski</a></li>
                    <li><a href="/pt">Portugu&#234;s</a></li>
                    <li><a href="/ru">Русский</a></li>
                    <li><a href="/sv">Svenska</a></li>
                    <li><a href="/tr">T&#252;rk&#231;e</a></li>
                    <li><a href="/uk">Українська</a></li>
                    <li><a href="/vi">Ti&#234;́ng Việt</a></li>
                    <li><a href="/zh-hans">中文(简体)</a></li>
                    <li><a href="/zh-hant">中文(繁體)</a></li>

                </ul>
                <a href="/help" class="menu-item">Help</a>
                <a href="/terms" class="menu-item">Terms and Privacy</a>
                <a href="https://www.convertapi.com/" class="menu-item">Developers API</a>
            </div>
        </nav>
    </footer>
</body>

</html>