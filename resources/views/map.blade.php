<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Covid-19</title>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      
      <script src="{{asset('js/Indian_States.js')}}" ></script>
      <!--  LEAFLET CSS -->
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
         integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
         crossorigin=""/>
      
         <!-- LEAFLET JS -->
      <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
         integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
         crossorigin=""></script>

      <style>
         #map {
            height: 950px;
         }
         .legend { background : white; line-height : 1.5em}
			.legend i { width : 5em; float : left }
         #details {
            background-image: linear-gradient(to right,#310101, #6B3431, #A67E7A, #DBC5C1);
            color: white;
            margin: auto;
         }
      </style>
   </head>
   <body>
      <div id="map"></div>
      <div id="details">
         <h2><p id="displaystatename"></p></h2>
         <h4><p id="active"></p></h4>
         <h4><p id="confirmed"></p></h4>
         <h4><p id="deaths"></p></h4>
         <h4><p id="recovered"></p></h4>
      </div>
      <script>
         var data = [];
         $.ajax({
            'async': false,
            'global': false,
            'method': "GET",
            'url': "/api/update-state-data",
            'dataType': "json",
            'success': function (result) {
                data = result;
               //  console.log(result);
            }
        });
      </script>

    <script src="{{asset('js/choropleth.js')}}"></script>
   </body>
</html>