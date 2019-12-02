window.addEventListener("load", function(){
	//get all the html elements
		var video = document.getElementById("vid-show"),
	    canvas = document.getElementById("vid-canvas"),
		  take = document.getElementById("vid-take");
		  var img = document.getElementById("pow");

	// ask for user permission to access camera
	// will fail if no camera is attached to computer
	navigator.mediaDevices.getUserMedia({ video : {
		width: 340, 
		height: 280
	}})
		.then(function(stream) {

			// show video stream on video tag
			video.srcObject = stream;
			video.play();

			// when we click on take photo buttom
			take.addEventListener("click", function(){
				
				// Create snapshot from video
				var draw = document.createElement("canvas")
				draw.width = video.videoWidth;
				draw.height = video.videoHeight;
				var context2D = draw.getContext("2d");
				context2D.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
				//context2D.drawImage(img, -10, 10);
				// Put into canvas container
				
    			//document.getElementById('canvas').innerHTML = '<img src="' + img.src + '" />';
				canvas.innerHTML = "";
				canvas.appendChild(draw);
			});
		})
		.catch(function(err) {
			document.getElementById("vid-controls").innerHTML = "Please enable access and attach a camera";
		});
});





// window.addEventListener("load", function(){
// 	//get all the html elements
// 		var video = document.getElementById("vid-show"),
// 	    canvas = document.getElementById("vid-canvas"),
// 		  take = document.getElementById("vid-take");
// 		 draw = document.createElement("canvas");
// 		var camera = document.getElementById('camera');

// 	// ask for user permission to access camera
// 	// will fail if no camera is attached to computer
// 	navigator.mediaDevices.getUserMedia({ video : {
// 		width: 340, 
// 		height: 280
// 	}})
// 		.then(function(stream) {

// 			// show video stream on video tag
// 			video.srcObject = stream;
// 			video.play();

// 			// when we click on take photo buttom
// 			take.addEventListener("click", function(){
// 				console.log("CLICKED");
// 				// Create snapshot from video
// 				draw.width = video.videoWidth;
// 				draw.height = video.videoHeight;
// 				var context2D = draw.getContext("2d");
// 				context2D.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
// 				// Put into canvas container
// 				//canvas.innerHTML = "";
// 				camera.appendChild(draw);
// 			});
// 		})
// 		.catch(function(err) {
// 			document.getElementById("vid-controls").innerHTML = "Please enable access and attach a camera";
// 		});
// });
