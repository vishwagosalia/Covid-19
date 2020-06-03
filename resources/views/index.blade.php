<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Covid-19</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!-- leaflet cdn links --> 
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
      integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
      crossorigin=""/>

      <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
      integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
      crossorigin=""></script>
      </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="container-fluid">
               <div class="main">
                  <div class="logo"><a href="{{'dashboard'}}"><img src="{{asset('images/logo.png')}}"></a></div>
                  <div class="menu_text">
                     <ul>
                        <div class="togle_">
                           <div class="menu_main">
                              <ul>
                                 <li><a href="https://github.com/vishwagosalia">Vishwa Gosalia</a></li>
                              </ul>
                           </div>
                        </div>
                        <div id="myNav" class="overlay">
                           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                           <div class="overlay-content">
                              <a href="{{'/'}}">Home</a>
                              <a href="{{'/map'}}">Map</a>
                              <a href="{{'/graph'}}">Bar Graph</a>
                              <a href="{{'/protect'}}">Protect</a>
                              <a href="{{'/about'}}">About</a>
                           </div>
                        </div>
                        <span class="navbar-toggler-icon"></span>
                        <span onclick="openNav()"><img src="{{asset('images/toogle-icon.png')}}" class="toggle_menu"></span>
                        <span onclick="openNav()"><img src="{{asset('images/toogle-icon1.png')}}" class="toggle_menu_1"></span>
                     </ul>
                  </div>
               </div>
            </div>
      <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="container">
                                 <h1 class="banner_taital">Covid-19 Curse VS boon</h1>
                                 <p class="banner_text">Its the humans who led the raise of COVID-19 from epidemic to pandemic which led to global crisis, it can be the revenge of nature through the years which we have been devastating.</p>
                                 <div class="more_bt"><a href="https://www.unenvironment.org/news-and-stories/story/covid-19-and-nature-trade-paradigm" target="_blank">Read more</a></div>
                                 
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="banner_img"><img src="{{asset('images/banner-img.png')}}"></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="container">
                                 <h1 class="banner_taital">Read latest news</h1>
                                 <p class="banner_text">Get latest and verified news of india from several sources by clicking on the button below.</p>
                                 <div class="more_bt"><a href="https://timesofindia.indiatimes.com/india/coronavirus-india-updates-live-news-covid-19-cases-count-and-vaccine-update/liveblog/75638171.cms" target="_blank">Latest News</a></div>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="banner_img"><img src="{{asset('images/banner-img.png')}}"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>            
         </div>
      <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- protect section start -->
      <div class="protect_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="protect_taital">COVID-19 CASES ACROSS INDIA</h1> 
                  {{-- <button type="button" class="btn btn-primary btn-lg text-center" data-toggle="modal">Open Map</button> --}}
                  <p class="protect_text">PIE-CHART</p>
               </div>
            </div>
            {{-- displaying a pie chart --}}
            <div id="fluid-container" style="margin-bottom: 60px" >
               <canvas id="piechart"></canvas>
            </div>
         </div>
      </div>
      <!-- protect section end -->

      <!-- doctor section start -->
      <div class="doctors_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="taital_main">
                     <div class="taital_left">
                        <div class="play_icon"><img src="{{asset('images/play-icon.png')}}"></div>
                     </div>
                     <div class="taital_right">
                        <h1 class="doctor_taital text-dark">What doctors say..</h1>
                        <p class="doctor_text text-dark"><b>STAY home, KEEP a safe distance, WASH hands often, COVER your cough, SICK? Call your Doctor.</b></p>
                        <div class="readmore_bt"><a href="https://www.bbc.com/news/world-asia-india-52377965" target="_blank">Read More</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- doctor section end -->
      <!-- About section starts -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_section_2">
               <div class="row">
                  <div class="col-lg-2 col-lg-8">
                     <h2 class="useful_text">About the developer</h2>
                     <p class="footer_text">Aspiring Software Engineer.</p>
                     <p class="footer_text">Interested in Web development.</p>
                     <p class="footer_text">Suggestions are always welcome in "Issues" section on <ins><a class="text-light" href="https://github.com/vishwagosalia/Covid-19/issues">Github.</a></ins></p>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                     <h2 class="useful_text">Contact Us</h2>
                     <div class="location_text">
                        <ul>
                           <li>
                              <i class="fa fa-map-marker" aria-hidden="true"></i>
                              <span class="padding_15">Location</span>
                           </li>
                           <li>
                              <i class="fa fa-phone" aria-hidden="true"></i>
                              <span class="padding_15">Call +01 1234567890</span>
                           </li>
                           <li>
                              <i class="fa fa-envelope" aria-hidden="true"></i>
                              <span class="padding_15">demo@gmail.com</span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- About section ends -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <p class="copyright_text">©Made by VISHWA GOSALIA.</p>
               </div>
            </div>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
      <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('js/custom.js')}}"></script>

      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
              
         $(".zoom").hover(function(){
              
         $(this).addClass('transition');
         }, function(){
              
         $(this).removeClass('transition');
         });
         });
      </script> 
      <script>
         function openNav() {
         document.getElementById("myNav").style.width = "100%";
         }
         function closeNav() {
         document.getElementById("myNav").style.width = "0%";
         }
      </script>

      <script>
         var data = [];
         $.ajax({
            'async': false,
            'method': "GET",
            'global': false,
            'url': "/api/update-india-data",
            'dataType': "json",
            'success': function (result) {
               // console.log(result)
               data = result;
               var attributes = Object.keys(data);
               var stats = Object.values(data);
               loadPie(attributes,stats);
            }
        });

         function loadPie(attributes,stats)
         {
            let dough = document.getElementById('piechart').getContext('2d');
            // Declaring global font and size
            Chart.defaults.global.defaultFontFamily = 'Lato';
            Chart.defaults.global.defaultFontSize = 14;
            Chart.defaults.global.defaultFontColor = '#777';

            let chart = new Chart(dough, {
               type: 'pie',
               data: {
                  labels: attributes,
                  datasets: [{
                     label: 'Total Cases in India',
                     data: stats,
                     backgroundColor: ['blue','yellow','red','green'],
                     borderWidth: 2,
                     borderColor: '#777',
                     hoverBorderWidth: 3,
                     hoverBorderColor: '#000',
                  }]
               },
               options: {
                  responsive: true
               }
            })
         }
      </script>

   </body>
</html>