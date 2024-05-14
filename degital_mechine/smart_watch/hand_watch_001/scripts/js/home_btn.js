document.addEventListener("DOMContentLoaded", function() {

    var checkScreen = localStorage.getItem('watch');

    var homeBtn = document.getElementById("home_btn");
    var pressStartTime;
    var pressTimeout;

    homeBtn.addEventListener("mousedown", function(event) {
        // Record the time when the button is pressed
        pressStartTime = new Date().getTime();

        // Set a timeout to check if the button is pressed for 2 seconds
        pressTimeout = setTimeout(function() {
            if(checkScreen == 'watch_on'){
                console.log('watch_off');
                localStorage.setItem('watch', 'watch_off'); // Store as a string
                window.location.href = '../../src/watch/swich.html';
            }else if(checkScreen == 'watch_off'){
                console.log("Watch On");
                localStorage.setItem('watch', 'watch_on'); // Store as a string
                window.location.href = '../../src/watch/swich.html';
            }
        }, 2000);
    });

    homeBtn.addEventListener("mouseup", function(event) {
        // Calculate the duration the button was pressed
        var pressDuration = new Date().getTime() - pressStartTime;

        // If the button is released before 2 seconds, clear the timeout
        if (pressDuration < 2000) {
            clearTimeout(pressTimeout);
        }
    });
});


