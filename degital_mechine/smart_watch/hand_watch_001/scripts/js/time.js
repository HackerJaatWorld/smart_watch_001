
setInterval(()=>{
    var date = new Date();
    document.getElementById("status_bar_time").innerHTML = date.toLocaleTimeString();
},1000);
