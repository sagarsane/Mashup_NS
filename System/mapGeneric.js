var map="";
  var marker="";
  var infowindow="";
  function initialize(id) {
	
	infowindow = new google.maps.InfoWindow({
		content: "NCSU"
	});
	
	var latlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
      zoom: 10,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	var divid = "mapdiv" + id;
    map = new google.maps.Map(document.getElementById(divid),
        myOptions);
		

	var geocoder;
	var sAdd = "North Carolina State University";
	geocoder = new google.maps.Geocoder();
	geocoder.geocode( { "address": sAdd}, function(results, status) { 
		if (status == google.maps.GeocoderStatus.OK) {
				//alert("Here");
				map.setCenter(results[0].geometry.location);
				marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
				google.maps.event.addListener(marker, "click", function() {
					infowindow.open(map,marker);
				});

				
		}
		else{
		}
	
	});
	
    
  }
