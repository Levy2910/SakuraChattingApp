const form = document.querySelector(".signup form");
const continueBtn = form.querySelector(".submit_input input");
const errorMessage = form.querySelector(".error_message");

form.onsubmit = (e) =>{
    e.preventDefault();
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload =() =>{
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success"){
                    location.href = "user_list.php";
                }else {
                    errorMessage.textContent = data;
                    errorMessage.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData);
}