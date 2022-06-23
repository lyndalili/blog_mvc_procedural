let eye = document.getElementById("eye");
eye.addEventListener("click", function() {
    if (user_pass.type == "password") {
        user_pass.type = "text";
    } else {
        user_pass.type = "password";
    }

})