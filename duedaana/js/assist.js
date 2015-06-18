
			angular.module('myApp', [])
			.controller('galleryController', function($scope) {
                /*$scope.years = [
                    {batch:"1996"},
                    {batch:"2005"}
                    ];
                */
			    $scope.images = [
			        {	
			        	batch:"1996",
			        	href:'http://farm8.staticflickr.com/7308/15783866983_27160395b9_b.jpg',
			        	src:'http://farm8.staticflickr.com/7308/15783866983_27160395b9_m.jpg',
			        	title:'Rodeo Dusk (_JonathanMitchellPhotography_)'
			        },
			        {
			        	batch:"1996",
			        	href:'http://farm3.staticflickr.com/2880/10346743894_0cfda8ff7a_b.jpg',
			        	src:'http://farm3.staticflickr.com/2880/10346743894_0cfda8ff7a_m.jpg',
			        	title:'Les papillons ont du chagrin (JMS\')'
			        },
			        {
			        	batch:"2005",
			        	href:'http://farm4.staticflickr.com/3857/14395875498_c43e5c4415_b.jpg',
			        	src:'http://farm4.staticflickr.com/3857/14395875498_c43e5c4415_m.jpg',
			        	title:'Chedder Gorge with goats looking (Si Photography)'
			        },
			        {
			        	batch:"2005",
			        	href:'http://farm8.staticflickr.com/7475/15723733583_b4a7b52459_b.jpg',
			        	src:'http://farm8.staticflickr.com/7475/15723733583_b4a7b52459_m.jpg',
			        	title:'Pudacuo (OsvinC)'
			        }
			    ];
			})
            .controller('googleController', function($scope){
                $scope.batchEvents=[
	                {
	                	id: 0,
	                	batch:"1996",
	                	lat : 34.0500,
        				long : -118.2500,
	                	content:"eqeqe"
	                },
	                {
	                	id: 1,
	                	batch:"2005",
	                	lat : 41.8819,
       					long : -87.6278,
	                	content:"adadadsa"
	                }
                ];
                var i = 0;

                $scope.content = $scope.batchEvents[i].content;
                var lat = $scope.batchEvents[i].lat;
                var long = $scope.batchEvents[i].long;
                var mapOptions = {
			        zoom: 15,
			        center: new google.maps.LatLng(lat,long),
			        mapTypeId: google.maps.MapTypeId.TERRAIN
			    }

                $scope.map = new google.maps.Map(document.getElementById('map'), mapOptions);
               
            })
