const userBox = document.getElementById("user_box");

let xhr = new XMLHttpRequest();
xhr.open("POST", "php/get_user.php", true);
xhr.onload = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            let data = xhr.response;
            userBox.innerHTML = data;
        }
    }
}
let formData = new FormData();
xhr.send(formData);


