

var watch = localStorage.getItem("watch");

if (watch === 'watch_on') { // Compare with string 'true'
    console.log("Watch on");
    window.location.href = 'swich.html';
} else {
    console.log("Watch off");
}