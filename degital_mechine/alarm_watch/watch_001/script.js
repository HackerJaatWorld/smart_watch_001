var lastHour = [-1, -1]; // Initialize lastHour as an array of two elements
var lastMinute = [-1, -1]; // Initialize lastMinute as an array of two elements
var latSecond = [-1, -1]; // Initialize lastMinute as an array of two elements

setInterval(function () {
    var date = new Date();
    var hour = date.getHours().toString().padStart(2, '0');
    var minute = date.getMinutes().toString().padStart(2, '0');
    var second = date.getSeconds().toString().padStart(2, '0');

    var hour_top = document.getElementById("hour_num_top");
    var hour_bottom = document.getElementById("hour_num_2_top");
    var minute_top = document.getElementById("minut_num_top");
    var minute_bottom = document.getElementById("minut_num_2_top");
    var second_top = document.getElementById("second_num_top");
    var second_bottom = document.getElementById("second_num_2_top");

    if (hour[0] !== lastHour[0]) {
        lastHour[0] = hour[0]; // Update the first digit of lastHour
        animateDigit(hour_top, hour[0]);
    }

    if (hour[1] !== lastHour[1]) {
        lastHour[1] = hour[1]; // Update the second digit of lastHour
        animateDigit(hour_bottom, hour[1]);
    }

    if (minute[0] !== lastMinute[0]) {
        lastMinute[0] = minute[0]; // Update the first digit of lastMinute
        animateDigit(minute_top, minute[0]);
    }

    if (minute[1] !== lastMinute[1]) {
        lastMinute[1] = minute[1]; // Update the second digit of lastMinute
        animateDigit(minute_bottom, minute[1]);
    }

    if (second[0] !== latSecond[0]) {
        latSecond[0] = second[0]; // Update the first digit of lastMinute
        animateDigit(second_top, second[0]);
    }

    if (second[1] !== latSecond[1]) {
        latSecond[1] = second[1]; // Update the second digit of lastMinute
        animateDigit(second_bottom, second[1]);
    }

}, 1000);

function animateDigit(element, newValue) {
    element.style.transform = 'translateY(-70px)';
    document.getElementById("second_dots").style.color = '#fff';
    setTimeout(function () {
        element.innerHTML = newValue;
        element.style.transform = 'translateY(0px)';
        document.getElementById("second_dots").style.color = 'black';
    }, 500);
}



function setAlarm() {
    // Get the time set by the user
    var setTime = document.getElementById("set_time").value;

    if (setTime) {
        // Store the alarm time in sessionStorage
        sessionStorage.setItem('alarmTime', setTime);
        // Display a confirmation message
        alert('Alarm set for ' + setTime);
    } else {
        alert("Please select time");
    }

}

function offAlarm() {
    alert('Alarm off');
    sessionStorage.setItem('alarmTime', '');
    window.location.reload();
}

// Check for alarm match every second

if (sessionStorage.getItem('alaramTime') == '') {
    console.log("alaram not set");
    document.getElementById("set_time_display").textContent = 'Not Set';
} else {
    setInterval(function () {
        var currentDate = new Date();
        var currentHour = currentDate.getHours();
        var currentMinute = currentDate.getMinutes();

        // Retrieve the set alarm time from sessionStorage
        var alarmTime = sessionStorage.getItem('alarmTime');
        var alarmHour = parseInt(alarmTime.split(':')[0]);
        var alarmMinute = parseInt(alarmTime.split(':')[1]);

        // Check if alarm time matches the current time
        if (alarmHour === currentHour && alarmMinute === currentMinute) {
            document.getElementById("tune").play();
            var confirmation = confirm('Alarm!');
            if (confirmation) {
                // If OK is clicked, clear the alarm
                sessionStorage.setItem('alarmTime', '');
                document.getElementById("tune").pause();
            } else {
                // If Cancel is clicked, add one minute to the alarm time
                var newAlarmTime = new Date(currentDate.getTime() + 60000);
                var newAlarmHour = newAlarmTime.getHours();
                var newAlarmMinute = newAlarmTime.getMinutes();
                sessionStorage.setItem('alarmTime', newAlarmHour + ':' + (newAlarmMinute < 10 ? '0' : '') + newAlarmMinute);
                document.getElementById("tune").pause();
            }
        }

        document.getElementById("set_time_display").textContent = alarmTime;

        if (alarmTime) {
            document.getElementById('on_btn').classList.add("bg");
            document.getElementById('off_btn').classList.remove("bg");
        } else {
            document.getElementById('off_btn').classList.add("bg");
            document.getElementById('on_btn').classList.remove("bg");
        }

    }, 1000);
}
