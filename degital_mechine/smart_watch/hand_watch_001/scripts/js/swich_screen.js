
function loadingShowSwich(){
    document.getElementById("swich_on_loading").textContent = 'loading...';
}

setInterval(function (){
    loadingShowSwich();
},2000);

setInterval(function(){
    var swich = localStorage.getItem('watch');
    if(swich == 'watch_on'){
        window.location.href = 'home.php';
    }else if(swich == 'watch_off'){
        window.location.href = 'watch_home.html';
    }
},3000);