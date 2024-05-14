var swich = localStorage.getItem('watch');
if (swich == 'watch_off') {
    window.location.href = 'watch_home.html';
}
function homeBtn() {
    window.location.href = '../../../watch/home.php';
}
var store_font_size = localStorage.getItem("font_size");
var font = document.querySelector("body");
font.style.fontSize = store_font_size + 'px';