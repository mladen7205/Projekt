document.getElementById("submit").onclick = function (event) {
    var form_validation = true
    var check = true
    var message

    var title = document.getElementById("title")
    var short_content = document.getElementById("short-content")
    var content = document.getElementById("content")
    var image = document.getElementById("image")
    var news_category = document.getElementById("news-category")

    //Title
    if (title.value != "") {
        if (title.value.length < 5 || title.value.length > 50) {
            message = "Naslov mora imati 5 do 30 znakova!"

            check = false
        }
    }
    else{
        message = "Naslov ne smije biti prazan!"

        check = false
    }

    if (check == false) {
        document.getElementById("title_error").innerHTML = message
        title.style.border = "1px solid red"

        form_validation = false
    }

    //Short content
    check = true
    if (short_content.value != "") {
        if (short_content.value.length < 10 || short_content.value.length > 100) {
            message = "Kratki sadržaj mora imati od 10 do 100 znakova!"

            check = false
        }
    }
    else{
        message = "Kratki sadržaj ne smije biti prazan!"

        check = false
    }

    if (check == false) {
        document.getElementById("short-content_error").innerHTML = message
        short_content.style.border = "1px solid red"

        form_validation = false
    }

    //Content
    if (content.value == "") {
        document.getElementById("content_error").innerHTML = "Sadržaj ne smije biti prazan!"
        content.style.border = "1px solid red"

        form_validation = false
    }

    //Image
    if (image.value == "") {
        document.getElementById("image_error").innerHTML = "Upload slike je potreban!"
        image.style.border = "1px solid red"

        form_validation = false
    }

    //News category
    if (news_category.value == "") {
        news_category.style.border = "1px solid red"
        document.getElementById("news-category_error").innerHTML = "Morate odabrati jednu od kategorija obavijesti!"

        form_validation = false
    }

    if (form_validation == false) {
        event.preventDefault()
    }
}