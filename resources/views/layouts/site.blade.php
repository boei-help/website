<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="./css/app.css" />
    <script src="./js/app.js"></script>

    {{--
        https://developers.facebook.com/tools/debug/?q=https%3A%2F%2Fwww.boei.help%2F
        https://cards-dev.twitter.com/validator
    --}}
    <meta property="og:title" content="Boei.help - Chat with your website visitors via their favorite channels" />
    <meta property="og:description" content="Convert visitors with one adjustable button. Simply all sales & support options in a floating button." />
    <meta property="og:image" content="https://www.boei.help/static/url_preview.png" />
    <meta property="og:url" content="https://www.boei.help" />
    <meta property="og:type" content="website" />

    <meta name="twitter:title" content="Boei.help - Chat with your website visitors via their favorite channels" />
    <meta name="twitter:description" content="Convert visitors with one adjustable button. Simply all sales & support options in a floating button." />
    <meta name="twitter:image" content="https://www.boei.help/static/url_preview.png" />
    <meta name="twitter:card" content="summary_large_image" />

    {{-- Various Favicons: https://realfavicongenerator.net/ --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/site.webmanifest">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#7847ed">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '514577038977477');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=514577038977477&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-3649759-14"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-3649759-14');
    </script>
    <script async defer data-domain="boei.help" src="https://plausible.io/js/plausible.js"></script>

</head>
<body>
		<nav class="navbar px-1 mx-auto navbar-expand-md navbar-light bg-light bg-white">
			<a class="navbar-brand" href="./"><img src="./static/logo.svg" class="mr-2" style="height: 25px;" /> Boei</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto justify-content-end w-100">
                        <li class="nav-item"><a class="btn menu" href="#features">Features</a></li>
                        <li class="nav-item"><a class="btn menu" href="#integrations">Integrations</a></li>
                        <li class="nav-item"><a class="btn menu" href="#pricing">Pricing</a></li>
                        <li class="nav-item"><a class="btn menu ext-tracked" href="http://app.boei.help">Log In</a></li>
                        <li class="nav-item"><a class="btn btn-primary ext-tracked ml-0 ml-md-4" href="https://app.boei.help/register">Get started</a></li>
                    </ul>
                </div>
        </nav>

        @yield('content')


        <div id="footer">
            <section>
                <div id="footerLinks">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 pb-5 pb-sm-0">
                            <p class="pr-5">Boei helps you to chat with your website visitors via their favorite channels. You can now keep the conversation going even after they’ve left your website.</p>
                        </div>
                        <div class="col-xs-12 col-sm-5 pl-sm-5 pb-5 pb-sm-0">
                            PRODUCT
                            <ul class="list-unstyled quick-links">
                                <li><a href="./#features">Features</a></li>
                                <li><a href="./#pricing">Pricing</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                            COMPANY
                            <ul class="list-unstyled quick-links">
                                <li><a href="./privacy">Privacy policy</a></li>
                                <li><a href="./terms">Terms</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <p class="text-center" style="margin-top:100px;">With bike energy <img src="./static/bike.svg" style="height: 16px;"> from Utrecht <img src="./static/flag_nl.svg" style="height: 12px;"></p>
            <p class="text-center text-muted small" style="margin-top:50px;">KVK: 20145923 - BTW: NL001143413B86</p>
            <div style="clear:both;"></div>
        </div>

        <img src="static/demo_here.png" id="demo_here" class="d-none" />

        <!--Emojis-->
        <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js" crossorigin="anonymous"></script>

        <script async defer src="https://cdn.boei.help/hello.js"></script>

        <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="c26477d2-8377-4277-9038-371dfb05fb3c";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

        <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
