<html>
<head>
<meta charset= "utf-8">
<script src="js/webcam.js"></script>
<style>
    #vid-show, #vid-canvas, #vid-take {
    display: block;
    margin-bottom: 20px;
  }
  html, body {
    padding: 0;
    margin: 0;
  }
    </style>
</head>
<body>
    <div id= "vid-controls">

        <video id = "vid-show" autoplay></video>-----------------------
            <input id="vid-take" type="button" value="Take photo"/>------------
            <div id="vid-canvas"></div>-------------
        </div><button onclick= "img1();">draw image</button>
        <img src= "images/overlays/img.png" id= "pow" height="200" alt= "">
            <canvas id="myCanvas" width= "340" height= "280" style="border:1px solid #2a2a2a;">
        </canvas>
            
            <script src= "js/draw_to_image.js" type="text/javascript">
            </script> 
</body>
</head>
</html>