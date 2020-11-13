/**
 * Enables the form fields
 */
function enableFields() {
    var username = document.querySelector("input[name=uname]");
    var password = document.querySelector("input[name=psw]");
    var save = document.querySelector("input[name=save]");

    username.readOnly = false;
    password.readOnly = false;
    save.disabled = false;
}