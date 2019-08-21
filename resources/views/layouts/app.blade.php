<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha256-CjSoeELFOcH0/uxWu6mC/Vlrc1AARqbm/jiiImDGV3s=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato|Merriweather&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.png" alt="alternative"></a> 
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">Add Now<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#features">Monitors</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div id="app" class="container">
                @yield('content')
            </div>
        </div>
    </header>

    <!-- Features -->
    <div id="features" class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Datadog Monitors and Alerts</h2>
                    <div class="p-heading p-large">Setting up alerts in Datadog can be very time consuming. Now you can add groups of monitors in one click. New Datadog customers or long time users, we have you covered in a click!</div>
                </div>
            </div>
            <div class="row">

                <!-- Tabs Links -->
                <ul class="nav nav-tabs" id="lenoTabs" role="tablist">
                    <li class="nav-item">
                        <p class="nav-link" id="nav-tab-1"><i class="fas fa-cog"></i>Threshold Monitors</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link disabled" id="nav-tab-2"><i class="fas fa-search"></i>Anomaly Monitors</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link disabled" id="nav-tab-3"><i class="fas fa-binoculars"></i>Forecast Monitors</p>
                    </li>
                </ul>

                <!-- Tabs Content-->
                <div class="tab-content" id="lenoTabsContent">

                    <!-- Tab -->
                    <div class="tab-pane fade show active" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                        <div class="container">
                            <div class="row">

                                <!-- Text And Icon Cards Area -->
                                <div class="col-md-8">
                                    <div class="icon-cards-area">
                                        <div class="card">
                                            <div class="card-icon">
                                                <i class="fas fa-server"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">System - 3 monitors</h4>
                                                <ul>
                                                    <li>Host online</li>
                                                    <li>High inbound network traffic</li>
                                                    <li>High outbound network traffic</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-icon">
                                                <i class="far fa-hdd"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">Disk - 3 monitors</h4>
                                                <ul>
                                                    <li>Low available disk space</li>
                                                    <li>High disk reads</li>
                                                    <li>High disk writes</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-icon">
                                                <i class="fas fa-microchip"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">CPU - 3 monitors</h4>
                                                <ul>
                                                    <li>High CPU utilization</li>
                                                    <li>High CPU load</li>
                                                    <li>High CPU iowait</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-icon">
                                                <i class="fas fa-database"></i>
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title">MYSQL - 8 monitors</h4>
                                                <ul>
                                                    <li>Query throughput change</li>
                                                    <li>Select query throughput change</li>
                                                    <li>Insert query throughput change</li>
                                                    <li>Update query throughput change</li>
                                                    <li>Delete query throughput change</li>
                                                    <li>High slow queries</li>
                                                    <li>High aborted connections</li>
                                                    <li>Slave seconds behind master</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Pane -->
                                <div class="col-md-4">
                                    <img class="img-fluid" src="images/features-iphone-3.png" alt="alternative">
                                </div>
                                <!-- end of image pane -->

                            </div> <!-- end of row -->
                        </div> <!-- end of container -->
                    </div><!-- end of tab-pane -->
                    <!-- end of tab -->


                </div> <!-- end of tab-content -->
                <!-- end of tabs content -->

            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of tabs -->
    <!-- end of features -->


    <!-- Statistics -->
    <div class="counter">
        <div class="text-area">
            <h3>Helping Datadog users get the most out of monitoring</h3>
        </div> <!-- end of text-area -->
        <br/>
        <br/>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Counter -->
                    <div id="counter">
                        <div class="cell">
                            <div class="counter-value number-count" data-count="2">1</div>
                            <p class="counter-info">Happy Users</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="55">1</div>
                            <p class="counter-info">Monitors Added</p>
                        </div>
                    </div>
                    <!-- end of counter -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of counter -->
    <!-- end of statistics -->


    <!-- Contact -->
    <div id="contact" class="form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>CONTACT</h2>
                    <ul class="list-unstyled li-space-lg">
                        <li class="address">Don't hesitate to chat with us, or email us below.</li>
                        <li><a href="javascript:void(Tawk_API.toggle())"><i class="fas fa-comments"></i>Live Chat</li></a>
                        <li><i class="fas fa-envelope"></i><a class="blue" href="mailto:help@dogalert.app">help@dogalert.app</a></li>
                    </ul>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-6 offset-lg-3">

                    <!-- Contact Form -->
                    <form id="contactForm" data-toggle="validator" data-focus="false" action="/">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cname" required>
                            <label class="label-control" for="cname">Name</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="cemail" required>
                            <label class="label-control" for="cemail">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" id="cmessage" required></textarea>
                            <label class="label-control" for="cmessage">Your message</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">SEND MESSAGE</button>
                        </div>
                        <div class="form-message">
                            <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form -->
    <!-- end of contact -->


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col">
                        <h4>About DogAlert</h4>
                        <p>We are just a couple of Datadog users, looking to make Datadog life easier because we love it.</p>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col middle">
                        <h4>Important Links</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Also visit <a class="turquoise" href="https://dnsape.com">DNSApe | Fast Network Tools</a></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Read our <a class="turquoise" href="terms-conditions.html">Terms & Conditions</a>, <a class="turquoise" href="privacy-policy.html">Privacy Policy</a></div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col last">
                        <h4>Be kind</h4>
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->
    <!-- end of footer -->


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->

<!-- livechat -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d4a68b57d27204601c9add3/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


</body>
</html>
