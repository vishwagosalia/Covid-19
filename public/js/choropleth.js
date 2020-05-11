var map = L.map('map').setView([19.07, 72.87], 5);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 14,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoidmlzaHdhZ29zYWxpYSIsImEiOiJjazlwamlvYW0wYXo4M2xueDJpNWdwY2k0In0.lT2KPTsuOJMbDss2mQktYQ'
}).addTo(map);

var statelines = {
    "color":"#000",
    "weight":3,
    "opacity":4,
    "fill":false
  };
var color = '#fff';
var arrcolor = ['#310101', '#460605', '#6B3431', '#A67E7A', '#DBC5C1'];
var legend = L.control ({position: 'bottomright'});
    legend.onAdd = function(map) {
        var div = L.DomUtil.create('div','legend');
        var labels = [
            "Covid confirmed cases more than 10000",
            "Covid confirmed cases more than 5000",
            "Covid confirmed cases more than 3000",
            "Covid confirmed cases more than 1000",
            "Covid confirmed cases more than 300",
            "Covid confirmed cases less than 10",
        ];

	    div.innerHTML = '<div><h2><center><b>Legend</b></center></h2></div>';
		for(var i = 0; i < labels.length; i++){
		    div.innerHTML += '<i style="background:' 
			+ arrcolor[i] + '">&nbsp;&nbsp;</i>&nbsp;&nbsp;'
			+ labels[i] + '<br />';
		}
	    return div;
	}
legend.addTo(map);

var gjLayerStates = L.geoJson(geoStates, {style: statelines}).addTo(map);

function style(geoStates) {
    for (i=0; i<data.length; i++)
    {
        // console.log(geoStates.properties.ST_NM);
        // console.log(data.data[i].state);
        if(geoStates.properties.ST_NM == data[i]["state"])
        {
            if (data[i].confirmed > 10000) {
                color = arrcolor[0];
            }
            else if (data[i].confirmed > 5000) {
                color = arrcolor[1];
            }
            else if (data[i].confirmed > 3000) {
                color = arrcolor[2];
            }
            else if (data[i].confirmed > 1000) {
                color = arrcolor[3];
            }
            else if (data[i].confirmed > 300) {
                color = arrcolor[4];
            }
            else if(data[i].confirmed < 10) {
                color = '#fff';
            }
        }
    }
    
    return {
        fillColor: color,
        weight: 1,
        opacity: 2,
        color: '#000',
        dashArray: '3',
        fillOpacity: 3
    };
}
var gjLayerDist = L.geoJson( geoStates, {style: style, onEachFeature: onEachState}).addTo(map);

function onEachState(geoStates, layer, e)
{
    //CONNECTING TOOLTIP AND POPUPS TO DISTRICTS
    layer.on({
      mouseover: highlightFeature,
      mouseout: resetHighlight,
      click: Clickable,
      //click: zoomToFeature
    });
    layer.bindTooltip( geoStates.properties.ST_NM, {
        direction : 'auto',
        className : 'statelabel',
        permanent : false,
        sticky    : true
    });
    // marker.bindPopup(popContent(geoStates), {
    //     maxWidth:600,
    //     closeButton: true,
    // }); // TODO ***
}

function highlightFeature(e) 
{
    //STATE HIGHLIGHT ON MOUSEOVER
    var layer = e.target;

    layer.setStyle( {
        weight: 3,
        color: '#000',
        opacity: 2
    });
    if (!L.Browser.ie && !L.Browser.opera ) {
        layer.bringToFront();
    }
}

function resetHighlight(e) {
      //RESET HIGHLIGHT ON MOUSEOUT
    var layer = e.target;

    layer.setStyle({
        weight: 1,
        color: '#000',
        opacity: 0.4
    });
}

function Clickable(e) {
    // var layer = e.target;
    console.log('click recd');
    
}