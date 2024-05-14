const form = document.getElementById("send_sms");
const sendBtn = document.getElementById("send_btn");

form.onsubmit = function (e) {
    e.preventDefault();
}

sendBtn.onclick = function () {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/send.php", true);
    xhr.onload = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if(data == 'done'){
                    window.location.reload();
                    console.log("done");
                }else{
                    console.log(data);
                }
            } else {
                console.log("error");
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);

    xhr.onerror = function () {
        // Handle network error
        console.error('Request failed');
    };
}


