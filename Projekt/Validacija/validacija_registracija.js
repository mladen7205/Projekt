document.getElementById("register").onclick = function (event) {
    var form_validation = true

    var name = document.getElementById("name")
    var surname = document.getElementById("surname")
    var username = document.getElementById("username")
    var password = document.getElementById("password")
    var password_verify = document.getElementById("password_verify")

    var border = "1px solid red"
    var message = "Polje ne smije bit prazno!"

    //Ime
    if (name.value == "") {
        name.style.border = border
        document.getElementById("name_error").innerHTML = message
        
        form_validation = false
    }

    //Prezime
    if (surname.value == "") {
        surname.style.border = border
        document.getElementById("surname_error").innerHTML = message

        form_validation = false
    }

    //Korsničko ime
    if (username.value == "") {
        username.style.border = border
        document.getElementById("username_error").innerHTML = message

        form_validation = false
    }

    //Lozinka
    if (password.value == "") {
        password.style.border = border
        document.getElementById("password_error").innerHTML = message

        form_validation = false
    }

    //Provjera lozinke
    if (password_verify.value != password.value) {
        password_verify.style.border = border
        document.getElementById("password_verify_error").innerHTML = "Lozinke se moraju podudarati!"

        form_validation = false
    }

    if (form_validation == false) {
        event.preventDefault();
    }
}

