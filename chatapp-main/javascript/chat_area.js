const form = document.querySelector(".typing form");
const inputField = form.querySelector(".input_field");;
const sendBtn = form.querySelector("button");
const chatArea = document.querySelector(".chat_area");

form.onsubmit = (e) =>{
    e.preventDefault();
}

sendBtn.onclick = () =>{
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload =() =>{
        if (xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";
                scrollToBottom;
            }
        }
    }
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData);
}

chatArea.onmouseenter = () =>{
    chatArea.classList.add("active");
}
chatArea.onmouseleave = () => {
    chatArea.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload =() =>{
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200) {
                let data = xhr.response;
                chatArea.innerHTML = data;
                if (!chatArea.classList.contains("active")){
                    scrollToBottom();
                }
               
            }
        }
    }
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData);
}, 500)

function scrollToBottom() {
    chatArea.scrollTop = chatArea.scrollHeight;
}