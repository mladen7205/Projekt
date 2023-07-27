document.getElementById("login").onclick = function (event) {
    var form_validation = true
    
    var username = document.getElementById("username")
    var password = document.getElementById("password")

    var message = "Polje ne smije biti prazno!"
    var border = "1px solid red"

    if (username.value == "") {
        document.getElementById("username_error").innerHTML = message
        username.style.border = border

        form_validation = false
    }

    if (password.value == "") {
        document.getElementById("password_error").innerHTML = message
        password.style.border = border

        form_validation = false
    }

    if (form_validation == false) {
        event.preventDefault()  
    }
}