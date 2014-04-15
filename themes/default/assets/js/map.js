function initialize() {
	 
	 var styles = [
    {
       "stylers": [
		  { "hue": "#00ffff" },
		  { "gamma": 0.87 },
		  { "lightness": 11 },
		  { "saturation": -66 }
		]

    }
  ];

 var styledMap = new google.maps.StyledMapType(styles,
    {name: "Styled Map"});

 var latlng = new google.maps.LatLng(57.134215,65.493554);
 var settings = {
 zoom: 15,
 center: latlng,
 mapTypeControl: true,
 mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
 disableDefaultUI: true,

  scrollwheel: false,
  
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
   
	
 navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
 mapTypeId: google.maps.MapTypeId.ROADMAP
 };
var map = new google.maps.Map(document.getElementById("map"), 
settings);

var companyLogo = new google.maps.MarkerImage('/googleMap/ball.png',
new google.maps.Size(97,88),
new google.maps.Point(0,0),
new google.maps.Point(31,79)
);

var companyPos = new google.maps.LatLng(57.134215,65.493554);
var companyMarker = new google.maps.Marker({
position: companyPos,
icon: companyLogo,
map: map,
title:"Some title"
});


map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');
  
}
initialize();