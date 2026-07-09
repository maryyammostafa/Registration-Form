function togglePassword(that) {
    if (that.previousElementSibling.type == "password") {
        that.previousElementSibling.type = "text";
        that.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        that.previousElementSibling.type = "password";
        that.classList.replace("fa-eye-slash", "fa-eye");
    }
}
function toggleEye(that) {
    if (that.value === "") {
        that.nextElementSibling.style.display = "none";
    } else {
        that.nextElementSibling.style.display = "inline-block";
    }
}

document.querySelectorAll(".form-control").forEach((input) => {
    input.addEventListener("input", () => {
        input.classList.remove("is-invalid");
        let error;
        if (input.parentElement.classList.contains("password")) {
            error = input.parentElement.nextElementSibling;
        } else {
            error = input.nextElementSibling;
        }
        if (error) {
            error.textContent = "";
        }
    });
});