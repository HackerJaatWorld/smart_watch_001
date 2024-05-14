<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" cont ent="width=device-width, initial-scale=1.0">
    <title>camera</title>
    <link rel="stylesheet" href="../../../../scripts/css/style.css">
</head>

<body>

    <div class="watch_feeta">
        <div class="watch_body">
            <div class="camera">
                <div class="camera_lence"></div>
            </div>
            <div class="screen">
                <div class="home_screen">
                    <div class="status_bar">
                        <div class="status_time" id="status_bar_time"></div>
                        <div class="status_battery">
                            <div class="battery_box">
                                <div class="batterylevel" id="batteryLevel"></div>
                            </div>
                            <div class="status_battery_per" id="status_battery_per">10%</div>
                        </div>
                    </div>
                    <div class="main_screen">

                        <div class="app_box">
                            <div class="web_cam">
                                <video id="video" width="100%" height="100%" autoplay></video>
                                <div class="camera_btn">
                                    <canvas id="canvas" width="25px" height="25px" style="display: none;"></canvas>
                                    <button id="captureButton"></button>
                                    <button style="border-radius:100%; width:25px;height:25px; background:orange;border:none;" id="captureButton"></button>
                                </div>
                            </div>
                            <div class="btns"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="home_btn" id="home_btn">
                <div onclick="homeBtn()" class="home_btn_gol"></div>
            </div>
        </div>
    </div>

    <script src="../../../../scripts/js/time.js"></script>
    <script src="../../../../scripts/js/battery.js"></script>
    <script>
        var swich = localStorage.getItem('watch');
        if (swich == 'watch_off') {
            window.location.href = 'watch_home.html';
        }
        function homeBtn() {
            window.location.href = '../../../watch/home.html';
        }
        var store_font_size = localStorage.getItem("font_size");
        var font = document.querySelector("body");
        font.style.fontSize = store_font_size + 'px';
    </script>
    <script>
        window.onload = function () {
            var video = document.getElementById('video');
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');
            var captureButton = document.getElementById('captureButton');

            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function (stream) {
                    video.srcObject = stream;
                })
                .catch(function (error) {
                    console.log("Error accessing webcam: " + error);
                });

            captureButton.onclick = function () {
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                var photoData = canvas.toDataURL('image/jpeg');

                // Send photoData to the server using AJAX
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "click.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        console.log("Photo uploaded successfully!");
                        alert('Photo uploaded successfully');
                    }
                };
                xhr.send("photoData=" + encodeURIComponent(photoData));
            };
        };
    </script>
</body>

</html>