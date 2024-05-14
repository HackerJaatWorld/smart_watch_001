var search_contact_form = document.getElementById("search_contact_form");
var search_contact_input = document.getElementById("search_contact_input");

search_contact_input.addEventListener("input", function () {
    console.log(search_contact_input.value);
    var formData = new FormData(search_contact_form);
    var queryString = new URLSearchParams(formData).toString();
    window.location.href = "action_page.php?" + queryString; // Replace "action_page.php" with your actual action page
});
