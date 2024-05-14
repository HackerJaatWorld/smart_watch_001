function callNum(num) {
    var numInput = document.getElementById("num_input");

    // Handling special cases
    if (num === 'backspace') {
        // Remove the last character from the input
        numInput.value = numInput.value.slice(0, -1);
    } else {
        // Append the pressed key to the input
        numInput.value += num;
    }

}


function callbtn() {
    var numInput = document.getElementById("num_input");
    var num = numInput.value;

    if (num != '') {
        if (num == '*#*06*#*') {
            console.log("src");
        }
    } else {
        console.log("no number");
    }
}