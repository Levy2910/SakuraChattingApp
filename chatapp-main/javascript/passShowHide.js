const password = document.querySelector(".form input[type='password']");
const btneye = document.querySelector(".form .field i");

btneye.onclick = () =>{
    if (password.type == "password"){
        password.type = "text";
        btneye.classList.add("active");
    }else {
        password.type="password";
        btneye.classList.remove("active");
    }
};

