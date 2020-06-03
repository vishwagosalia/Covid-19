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
      <title>News</title>
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
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

       <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
         integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
         crossorigin=""/>

       <!-- Make sure you put this AFTER Leaflet's CSS -->
      <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
         integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
         crossorigin=""></script>
   </head>
   <body>
      <!--header section start -->
      <div class="header_section header_bg">
         <div class="container-fluid">
               <div class="main">
                  <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
                  <div class="menu_text">
                     <ul>
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
                        <span onclick="openNav()"><img src="images/toogle-icon.png" class="toggle_menu"></span>
                        <span onclick="openNav()"><img src="images/toogle-icon1.png" class="toggle_menu_1"></span>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- banner section start -->
            <div class="container">
               <div class="about_taital_main">
                  <h2 class="about_tag">News Corona Virus</h2>
                  <div class="about_menu">
                     <ul>
                        <li><a href="{{'/'}}">Home</a></li>
                        <li>News</li>
                     </ul>
                  </div>
               </div>
            </div>
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <div class="protect_section layout_padding">
         <div class="fluid-container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="protect_taital">COVID-19 CASES ACROSS INDIA</h1>
                  <p class="protect_text">Displayed on Bar Graph</p>
               </div>
            </div>
               <div id="container">
                  <canvas id="chartContainer"></canvas>
               </div>
         </div>
      </div>

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
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="{{ asset('js/owl.carousel.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      
      <script>
         function openNav() {
         document.getElementById("myNav").style.width = "100%";
         }
         function closeNav() {
         document.getElementById("myNav").style.width = "0%";
         }
      </script>

      <script>
         var settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://corona-virus-world-and-india-data.p.rapidapi.com/api_india",
            "method": "GET",
            "headers": {
               "x-rapidapi-host": "corona-virus-world-and-india-data.p.rapidapi.com",
               "x-rapidapi-key": "17b0303beemsh45a32f7f99a6756p15638cjsn0a25f4fc90cc"
            }
         }

         $.ajax(settings).done(function (response) {
            // console.log(response);
            const states = Object.keys(response.state_wise);
            const values = Object.entries(response.state_wise);
            var activecases = [];
            console.log(values);
            for (var i in values) 
            {
               for (var j=1; i<37; i++)
               {
                  activecases.push(values[i][j].confirmed);
               }
            }
            var activecases = activecases.splice(0,states.length);
            // console.log(activecases);
            loadgraph(activecases,states);
         });
                   
         async function loadgraph(activecases,states)
         {
            let barchart = document.getElementById('chartContainer').getContext('2d');
            // Declaring global font and size
            Chart.defaults.global.defaultFontFamily = 'Lato';
            Chart.defaults.global.defaultFontSize = 14;
            Chart.defaults.global.defaultFontColor = '#777';

            let chart = new Chart(barchart, {
               type: 'horizontalBar',
               data: {
                  labels: states,
                  datasets: [{
                     label: 'Confirm cases in each state',
                     data: activecases, 
                     backgroundColor: '#187795',
                     borderWidth: 1,
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


