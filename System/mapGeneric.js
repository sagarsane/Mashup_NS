var map="";
  var marker="";
  var infowindow="";


var clicked = "0";
    //$(document).ready(function(){
	
      
      //});
	  
    //})

  
  function send(){
	if(top10.checked == true && cs.checked == false){
		ytvbp.presentResults(input_f.value,1,0);
		
	}
	else if(top10.checked == false && cs.checked == true){
		ytvbp.presentResults(input_f.value,0,1);
	}
	else if(top10.checked == true && cs.checked == true){
		ytvbp.presentResults(input_f.value,1,1);
	}
	
  }
  
  function initialize_map(id,name) {
	//var name = nameid.split("|");
	
	infowindow = new google.maps.InfoWindow({
		content: name
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
	var sAdd = name;
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
