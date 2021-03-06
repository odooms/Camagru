window.addEventListener("load", function(){
	//get all the html elements
		var video = document.getElementById("vid-show"),
	    canvas = document.getElementById("vid-canvas"),
		  take = document.getElementById("vid-take");
	// ask for user permission to access camera
	// will fail if no camera is attached to computer
	navigator.mediaDevices.getUserMedia({ video : {width: 340, height: 280}})
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
				//image 
				var img = new Image();
        		img.src = document.querySelector('input[name="sticker"]:checked').value
				context2D.drawImage(img, -10, 10);
				// Put into canvas container
				//var anchor = document.createElement("a");
				canvas.appendChild(draw);

				var canvasData = draw.toDataURL("image/png");
				//console.log (canvasData);
				var ajax = new XMLHttpRequest();

				ajax.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					  console.log(this.responseText);
					}
				  };
				ajax.open("POST",'user/Savephoto.php', true);
				ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
				ajax.send("image=" + canvasData);
			});
		})
		.catch(function(err) {
			// document.getElementById("vid-controls").innerHTML = "Please enable access and attach a camera";
		});
});