@extends('layouts.site')

@section('title', 'Boei - ' . strip_tags($page_title))

@section('content')
    <div class="jumbotron text-center">
        <h1 class="mx-auto" style="max-width: 700px;">{!!$page_title!!}</h1>
        <p class="lead mt-3 mx-auto my-5" style="max-width: 600px;">Communicate with {{$visitors}} via <a href="#integrations" style="text-decoration: underline;">the channels</a> they already use, build a <span class="penmarked">relationship</span> instead of being a live chat robot.</p>

        <div class="justify-content-center">
            <a href="https://app.boei.help/register" class="btn btn-lg btn-primary mb-2 ext-tracked my-4">Get started - it's free</a>
            <p class="text-muted small mt-2">Free plan for lifetime.</p>
        </div>
    </div>

    <section style="font-size: 1.4em;">
        <div class="row">
            <div class="col-4 text-right pr-4">
                <span class="badge badge-danger">Problem</span>
            </div>
            <div class="col-8">
                <p>{{ucfirst($visitors)}} refrain to contact you because they cannot find the communication channel they like</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-right pr-4">
                <span class="badge badge-success">Solution</span>
            </div>
            <div class="col-8">
                <p>Chat with your {{$website_visitors}} via their <span class="penmarked">favorite channels</span>.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-4 text-right pr-4">
                <span class="badge badge-danger">Problem</span>
            </div>
            <div class="col-8">
                <p>{{ucfirst($visitors)}} leave your site without {{$converting}}.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-right pr-4">
                <span class="badge badge-success">Solution</span>
            </div>
            <div class="col-8">
                <p>Keep the conversation going even after they’ve <span class="penmarked">left your {{$website}}</span>.</p>
            </div>
        </div>
    </section>

    <section id="integrations">
        <?php /* https://worldvectorlogo.com/downloaded/crisp-logo-1 */ ?>
        <h2 class="text-primary">Boei plays well with...</h2>
        <div class="card-deck mb-5">
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/whatsapp.svg" />
                    <p>WhatsApp</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/facebook-messenger.svg" />
                    <p>Facebook messenger</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/telegram.svg" />
                    <p>Telegram</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/google_maps.svg" />
                    <p>Google Maps</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/waze.svg" />
                    <p>Waze</p>
                </div>
            </div>
        </div>
        <div class="card-deck mb-5">
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/mail.svg" />
                    <p>Email</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/skype.svg" />
                    <p>Skype</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/phone.svg" />
                    <p>Direct Call</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/instagram.svg" />
                    <p>Instagram</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/line.svg" />
                    <p>Line</p>
                </div>
            </div>
        </div>
        <div class="card-deck mb-5">
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/intercom.svg" />
                    <p>Intercom chat</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/crisp.svg" />
                    <p>Crisp chat</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/twitter.svg" />
                    <p>Twitter DMs & pages</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/snapchat.svg" />
                    <p>Snapchat</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/integrations/calendly.png" />
                    <p>Calendly</p>
                </div>
            </div>
        </div>
        <p class="text-center">Also page links are supported ... and more will come</p>
    </section>

    <section id="privacy">
        <h2 class="text-primary text-center">Cookie-free and privacy compliant</h2>
        <div class="mx-auto card-deck mb-5" style="max-width: 700px;">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="text-primary text-center my-1"><ion-icon name="finger-print-outline"></ion-icon></h2>
                    <p>We don't use cookies. No cookie banners needed.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="text-primary text-center my-1"><ion-icon name="cloud-offline-outline"></ion-icon></h2>
                    <p>We don't collect any personal data. No GDPR, CCPA, or PECR to worry about.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="mx-auto text-center pb-5">
        <a href="https://app.boei.help/register" class="btn btn-lg btn-primary mb-2 ext-tracked my-4">Get started - it's free</a>
        <p class="text-muted small mt-2">Free plan for lifetime.</p>
    </div>

    <section>
        <h2 class="text-primary text-center">No developer needed</h2>
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <p>Boei can be installed on WordPress, Shopify, Ghost, and many other platforms. You won't even need a developer. It is super simple!</p>
                <p class="text-center"><a class="ext-tracked btn-outline-primary btn" href="https://app.boei.help/docs/1.0/installation" target="_blank">See install guides</a></p>
            </div>
        </div>

        <p class="small text-muted text-center my-5">or</p>

        <div class="text-center">
            <p>Add one line of code to your html:</p>
            <code>&lt;script async defer src="https://cdn.boei.help/hello.js"&gt;&lt;/script&gt;</code>
        </div>
    </section>

    <section class="mt-0">
        <div class="card-deck mb-5" id="installation">
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/wordpress.svg" />
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/shopify.svg" />
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <img src="static/ghost.svg" />
                </div>
            </div>
        </div>
    </section>

    <section id="features">
        <h2 class="text-primary">Features</h2>
        <div class="card-deck mb-5">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="text-primary text-center my-1"><ion-icon name="albums-outline"></ion-icon></h2>
                    <h4>Multiple {{$websites}} & buttons</h4>
                    <p>Create as many buttons as you want. You can adjust the Boei button at any time without changing your {{$website}}.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="text-primary text-center my-1"><ion-icon name="layers-outline"></ion-icon></h2>
                    <h4>Show all the helpers you want</h4>
                    <p>Add as many sales & support options as you want.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="text-primary text-center my-1"><ion-icon name="brush-outline"></ion-icon></h2>
                    <h4>Customize colors & position</h4>
                    <p>Match the styling with your color scheme. Select which window corner Boei should call home.</p>
                </div>
            </div>
        </div>
        <div class="card-deck mb-5">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="text-primary text-center my-1"><ion-icon name="magnet-outline"></ion-icon></h2>
                    <h4>Triggers</h4>
                    <p>Ability to trigger a call to action next to Boei after an amount of time.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="text-primary text-center my-1"><ion-icon name="mail-outline"></ion-icon></h2>
                    <h4>Contact form <small><span class="badge badge-light">future</span></small></h4>
                    <p>Build-in contact form so {{$visitors}} can ask questions without leaving the page.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="text-primary text-center my-1"><ion-icon name="thumbs-up-outline"></ion-icon></h2>
                    <h4>Feedback form <small><span class="badge badge-light">future</span></small></h4>
                    <p>Build-in form to capture user feedback without leaving the page.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing">
        <h2 class="text-primary text-center">Boei is free. Pay only for additional features</h2>
        <div class="row flex-column flex-lg-row justify-content-center">
            <div class="col-lg-4 d-flex align-items-stretch mb-3">
                <div class="card w-100 mx-auto">
                    <div class="card-body text-center">
                        <h3 class="text-secondary">Free</h3>
                        <h5 class="mt-4 h1"><small>&dollar;</small> 0</h5>
                        <p class="small text-secondary">lifetime</p>
                        <p>Unlimited {{$websites}} and buttons</p>
                    </div>
                    <div class="card-footer border-top-0 bg-transparent pb-5 text-center">
                        <a href="https://app.boei.help/register" class="btn btn-primary ext-tracked"><i class="fas fa-chevron-right"></i> Start now</a>
                        <p class="text-muted small mt-3">free for lifetime</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-items-stretch mb-3">
                <div class="card w-100 mx-auto">
                    <div class="card-body text-center">
                        <h3 class="text-muted">Premium</h3>
                        <h5 class="text-muted mt-4 h1"><small>&dollar;</small> 5</h5>
                        <p class="small text-muted">per month</p>
                        <p class="text-muted">Additional premium features are in development.</p>

                    </div>

                    <div class="card-footer border-top-0 bg-transparent pb-5 text-center">
                        <a href="https://app.boei.help/register" class="btn btn-secondary disabled ext-tracked"><i class="fas fa-chevron-right"></i> Coming soon</a>
                        <p class="text-muted small mt-3">in development</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-sm-5 text-right">
                <img src="./static/logo.svg" class="mr-5 mt-sm-5" style="height: 60px;" />
            </div>
            <div class="col-sm-7">
                <p>Boei</p>
                <h2 class="my-2">[buj]</h2>
                <em>noun</em>
                <p class="pl-3">an anchored float serving as a navigation mark</p>
                In dutch <img src="./static/flag_nl.svg" style="height: 12px;">
            </div>
        </div>
    </section>

@endsection
