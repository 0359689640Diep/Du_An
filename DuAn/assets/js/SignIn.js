function Notification(idType, content, data){
    idType = document.getElementById(idType);
    content = document.getElementById(content).innerHTML = data;
    idType.classList.remove(idType)
}


function hiden(id){
    let hiden = document.getElementById(id);
    hiden.style.display = "none";
}
function show(id){
    let show = document.getElementById(id);
    show.style.display = "block";
}

