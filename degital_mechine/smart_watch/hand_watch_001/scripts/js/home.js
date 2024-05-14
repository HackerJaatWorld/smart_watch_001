document.addEventListener("DOMContentLoaded", () => {

    var screenBg = document.getElementById("main_screen");
    var storeBg = localStorage.getItem("display_wallpaper");
    screenBg.style.backgroundImage = "url('../../src/watch/img/screen_bg/" + storeBg + ".jpg')";

    var storeIconShap = localStorage.getItem("icon_shap");
    var icon = document.querySelectorAll(".icon");

    if(storeIconShap == 35){
        icon[0].style.borderTopLeftRadius = storeIconShap + '%';
        icon[0].style.borderTopRightRadius = storeIconShap + '%';
        icon[0].style.borderBottomLeftRadius = storeIconShap + '%';
        icon[1].style.borderTopLeftRadius = storeIconShap + '%';
        icon[1].style.borderTopRightRadius = storeIconShap + '%';
        icon[1].style.borderBottomLeftRadius = storeIconShap + '%';
        icon[2].style.borderTopLeftRadius = storeIconShap + '%';
        icon[2].style.borderTopRightRadius = storeIconShap + '%';
        icon[2].style.borderBottomLeftRadius = storeIconShap + '%';
        icon[3].style.borderTopLeftRadius = storeIconShap + '%';
        icon[3].style.borderTopRightRadius = storeIconShap + '%';
        icon[3].style.borderBottomLeftRadius = storeIconShap + '%';
        icon[4].style.borderTopLeftRadius = storeIconShap + '%';
        icon[4].style.borderTopRightRadius = storeIconShap + '%';
        icon[4].style.borderBottomLeftRadius = storeIconShap + '%';
        icon[5].style.borderTopLeftRadius = storeIconShap + '%';
        icon[5].style.borderTopRightRadius = storeIconShap + '%';
        icon[5].style.borderBottomLeftRadius = storeIconShap + '%';
        icon[6].style.borderTopLeftRadius = storeIconShap + '%';
        icon[6].style.borderTopRightRadius = storeIconShap + '%';
        icon[6].style.borderBottomLeftRadius = storeIconShap + '%';
        icon[7].style.borderTopLeftRadius = storeIconShap + '%';
        icon[7].style.borderTopRightRadius = storeIconShap + '%';
        icon[7].style.borderBottomLeftRadius = storeIconShap + '%';
        icon[8].style.borderTopLeftRadius = storeIconShap + '%';
        icon[8].style.borderTopRightRadius = storeIconShap + '%';
        icon[8].style.borderBottomLeftRadius = storeIconShap + '%';
    }else{
        icon[0].style.borderRadius = storeIconShap + '%';
        icon[1].style.borderRadius = storeIconShap + '%';
        icon[2].style.borderRadius = storeIconShap + '%';
        icon[3].style.borderRadius = storeIconShap + '%';
        icon[4].style.borderRadius = storeIconShap + '%';
        icon[5].style.borderRadius = storeIconShap + '%';
        icon[6].style.borderRadius = storeIconShap + '%';
        icon[7].style.borderRadius = storeIconShap + '%';
        icon[8].style.borderRadius = storeIconShap + '%';
    }
});