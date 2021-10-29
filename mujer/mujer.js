function abajo(){
    let malla = document.querySelectorAll(".malla");
    for(var i = 0; i< malla.length; i++)
    malla[i].classList.toggle("chau")
    let arriba = document.querySelectorAll(".arriba");
    for(var i = 0; i< arriba.length; i++)
    arriba[i].classList.toggle("chau")
    let conjunto = document.querySelectorAll(".conjuntos");
    for(var i = 0; i< conjunto.length; i++)
    conjunto[i].classList.toggle("chau")
}
function arriba(){
    let abajo = document.querySelectorAll(".abajo");
    for(var i = 0; i< abajo.length; i++)
    abajo[i].classList.toggle("chau")
    let malla = document.querySelectorAll(".malla");
    for(var i = 0; i< malla.length; i++)
    malla[i].classList.toggle("chau")
    let conjunto = document.querySelectorAll(".conjuntos");
    for(var i = 0; i< conjunto.length; i++)
    conjunto[i].classList.toggle("chau")
}
function mallas(){
    let abajo = document.querySelectorAll(".abajo");
    for(var i = 0; i< abajo.length; i++)
    abajo[i].classList.toggle("chau")
    let arriba = document.querySelectorAll(".arriba");
    for(var i = 0; i< arriba.length; i++)
    arriba[i].classList.toggle("chau")
    let conjunto = document.querySelectorAll(".conjuntos");
    for(var i = 0; i< arriba.length; i++)
    conjunto[i].classList.toggle("chau")
}
function conjunto(){
    let abajo = document.querySelectorAll(".abajo");
    for(var i = 0; i< abajo.length; i++)
    abajo[i].classList.toggle("chau")
    let arriba = document.querySelectorAll(".arriba");
    for(var i = 0; i< arriba.length; i++)
    arriba[i].classList.toggle("chau")
    let malla = document.querySelectorAll(".malla");
    for(var i = 0; i< malla.length; i++)
    malla[i].classList.toggle("chau")
}
function filtros(){
    document.querySelector(".losFiltros").style.display = "flex"
}


