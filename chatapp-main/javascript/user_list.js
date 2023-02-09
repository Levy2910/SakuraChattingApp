const friend_list = document.querySelector(".friend_list");
const searchBar = document.querySelector(".search_box input");


searchBar.onkeyup = () =>{
    let searchTerm = searchBar.value;
    if (searchTerm != ""){
        searchBar.classList.add("active");
    }else {
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/search.php", true);
    xhr.onload =() =>{
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200) {
                let data = xhr.response;
                friend_list.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("GET", "php/user_list.php", true);
    xhr.onload =() =>{
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200) {
                let data = xhr.response;
                if (!searchBar.classList.contains("active")){
                    friend_list.innerHTML = data; 
                }
               
            }
        }
    }
    xhr.send();
}, 500)