<script type="text/javascript">
	$(".pass").blur(function() {
		var pass1 = $(".pass1").val();
		var pass2 = $(".pass2").val();
		if (pass1 !== pass2) {
			$("#pass_note").html('' + '  <span class="require_alert" >' + '      Password Mismatched' + '  </span>');
			$(".pass_chng").attr("disabled", "disabled");
			$(".pass_chng").addClass("disabled");
		} else if (pass1 == pass2) {
			$("#pass_note").html('');
			$(".pass_chng").removeAttr("disabled");
			$(".pass_chng").removeClass("disabled");
		}
	});
	
	$('.pass_chng').on('click', function() {
	
		//alert('vdv');
		var here = $(this); // alert div for show alert message
		var form = here.closest('form');
		var can = '';
		var ing = here.data('ing');
		var msg = here.data('msg');
		var prv = here.html();
	
		//var form = $(this);
		var formdata = false;
		if (window.FormData) {
			formdata = new FormData(form[0]);
		}
	
		var a = 0;
		var take = '';
		form.find(".required").each(function() {
			var txt = '*Required';
			a++;
			if (a == 1) {
				take = 'scroll';
			}
			var here = $(this);
			if (here.val() == '') {
				if (!here.is('select')) {
					here.css({
						borderColor: 'red'
					});
	
					if (here.closest('div').find('.require_alert').length) {
	
					} else {
						sound('form_submit_problem');
						here.closest('div').append('' + '  <span id="' + take + '" class="label label-danger require_alert" >' + '      ' + txt + '  </span>');
					}
				}
				var topp = 100;
	
				$('html, body').animate({
					scrollTop: $("#scroll").offset().top - topp
				}, 500);
				can = 'no';
			}
	
			take = '';
		});
	
		if (can !== 'no') {
			$.ajax({
				url: form.attr('action'), // form action url
				type: 'POST', // form submit method get/post
				dataType: 'html', // request type html/json/xml
				data: formdata ? formdata : form.serialize(), // serialize form data 
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					here.html(ing); // change submit button text
				},
				success: function(data) {
					here.fadeIn();
					here.html(prv);
					if (data == 'updated') {
						$.activeitNoty({
							type: 'success',
							icon: 'fa fa-check',
							message: msg,
							container: 'floating',
							timer: 3000
						});
					} else if (data == 'pass_prb') {
						$.activeitNoty({
							type: 'danger',
							icon: 'fa fa-check',
							message: 'Incorrect Password!',
							container: 'floating',
							timer: 3000
						});
					}
				},
				error: function(e) {
					console.log(e)
				}
			});
		} else {
			sound('form_submit_problem');
			return false;
		}
	});

	var base_url = 'https://ryants.com/demo/store/';
	var user_type = 'vendor';
	var module = 'manage_admin';
	var list_cont_func = '';
	var dlt_cont_func = '';

</script>
            <script>
    
    $(document).ready(function(){
        set_cart_map();
    });

    function set_cart_map(tty){
        //$('#maps').animate({ height: '400px' }, 'easeInOutCubic', function(){});
        initialize();
        var address = [];
        //$('#pos').show('fast');
        //$('#lnlat').show('fast');
        $('.address').each(function(index, value){
            if(this.value !== ''){
                address.push(this.value);
            }
        });
        address = address.toString();
        deleteMarkers();
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if($('#langlat').val().indexOf(',')  == -1 || $('#first').val() == 'no' || tty == 'iio'){
                    deleteMarkers();
                    var location = results[0].geometry.location; 
                    var marker = addMarker(location);
                    map.setCenter(location);
                    $('#langlat').val(location);
                } else if($('#langlat').val().indexOf(',')  >= 0){
                    deleteMarkers();
                    var loca = $('#langlat').val();
                    loca = loca.split(',');
                    var lat = loca[0].replace('(','');
                    var lon = loca[1].replace(')','');
                    var marker = addMarker(new google.maps.LatLng(lat, lon));
                    map.setCenter(new google.maps.LatLng(lat, lon));
                }
                if($('#first').val() == 'yes'){
                    $('#first').val('no');
                }
                // Add dragging event listeners.
                google.maps.event.addListener(marker, 'drag', function() {
                    $('#langlat').val(marker.getPosition());
                });
            }
        }); 
    }

        var geocoder;
        var map;
        var markers = [];
        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var mapOptions = {
                zoom: 14,
                center: latlng
            }
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            google.maps.event.addListener(map, 'click', function(event) {
                deleteMarkers();
                var marker = addMarker(event.latLng);
                $('#langlat').val(event.latLng);    
                // Add dragging event listeners.
                google.maps.event.addListener(marker, 'drag', function() {
                    $('#langlat').val(marker.getPosition());
                });
                
            });     
        }
        

    /*
        var address = [];
        $('#maps').show('fast');
        $('#pos').show('fast');
        $('#lnlat').show('fast');
        $(".address").each(
        address.push(this.value);
        );
    */

        $('.address').on('blur', function(){
			$('#langlat').val('');
            set_cart_map();
        });

        // Add a marker to the map and push to the array.
        function addMarker(location) {
            var image = {
                url: base_url+'uploads/others/marker.png',
                size: new google.maps.Size(40, 60),
                origin: new google.maps.Point(0,0),
                anchor: new google.maps.Point(20, 62)
            };

            var shape = {
                coords: [1, 5, 15, 62, 62, 62, 15 , 5, 1],
                type: 'poly'
            };

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable:true,
                icon: image,
                shape: shape,
                animation: google.maps.Animation.DROP
            });
            markers.push(marker);
            return marker;
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

        // Sets the map on all markers in the array.
        function setAllMap(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setAllMap(null);
        }
        //google.maps.event.addDomListener(window, 'load', initialize);
</script>