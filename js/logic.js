rol = document.getElementById("rol");
area = document.getElementById("sec-area");
rol.addEventListener("click", (e) => {
    let selected = rol.options[rol.selectedIndex].value;
    if(selected === "1"){
        area.style.display = 'block';
        return;
    }else {
        area.style.display = 'none';
    }
});
document.addEventListener("DOMContentLoaded",(e) => {
    let selected = rol.options[rol.selectedIndex].value;
    if(selected == 3 || selected == 2){
        area.style.display = "none";
    }
});