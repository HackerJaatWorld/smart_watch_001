document.addEventListener('change', () => {
    var selcetScreenTime = document.getElementById("set_screen_time");
    localStorage.setItem("screen_time", selcetScreenTime.value);
});


function screenTime(time) {
    setInterval(() => {
        document.getElementById("home_screen").style.display = 'none';
    }, time * 1000);
}

document.getElementById("home_screen").addEventListener("click", () => {
    localStorage.setItem("screen_click", 'click');
    // window.location.reload();
});

var clicked = localStorage.getItem("screen_click");

localStorage.setItem("screen_click", '');
if (clicked === 'click') {
    // console.log("click");
} else {
    var storeScreenTime = localStorage.getItem("screen_time");
    // screenTime(storeScreenTime);
    // console.log("not click");
}


function saveWallpaper() {
    const chooseWallpaper = document.getElementById("choose_wallpaper");
    localStorage.setItem("display_wallpaper", chooseWallpaper.value);
    console.log(chooseWallpaper.value);
    alert('Wallpaper set');
}

var current_bg = localStorage.getItem('display_wallpaper');
document.getElementById("choose_wallpaper").value = current_bg;

var brightnessBtn = document.getElementById("brightness_btn");

brightnessBtn.addEventListener("change", () => {
    console.log(brightnessBtn.value);
});

var chooseFontSize = document.getElementById("choose_size");

chooseFontSize.addEventListener("change", () => {
    var size = chooseFontSize.value;
    setFontSize(size);
})

function setFontSize(size) {
    window.location.reload();
    localStorage.setItem('font_size', size);
}

var store_font_size = localStorage.getItem("font_size");
document.getElementById("choose_size").value = store_font_size;
var font = document.querySelector("body");
font.style.fontSize = store_font_size + 'px';
const w_s = document.getElementById("choose_wallpaper");
w_s.style.fontSize = store_font_size + 'px';
const f_s = document.getElementById("choose_size");
f_s.style.fontSize = store_font_size + 'px';
const s_t = document.getElementById("set_screen_time");
s_t.style.fontSize = store_font_size + 'px';
const i_r = document.getElementById("icon_shap");
i_r.style.fontSize = store_font_size + 'px';


document.getElementById("icon_shap").addEventListener("change", function () {
    var selectIcon = document.getElementById("icon_shap");
    localStorage.setItem("icon_shap", selectIcon.value);
});

function getIconR() {
    document.getElementById("icon_shap").value = localStorage.getItem("icon_shap");
}
getIconR();

