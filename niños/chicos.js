function abajo(){
    let arriba = document.querySelectorAll(".arriba");
    for(var i = 0; i< arriba.length; i++)
    arriba[i].classList.toggle("chau")
    let conjunto = document.querySelectorAll(".conjunto");
    for(var i = 0; i< conjunto.length; i++)
    conjunto[i].classList.toggle("chau")
    let vestido = document.querySelectorAll(".vestido");
    for(var i = 0; i< vestido.length; i++)
    vestido[i].classList.toggle("chau")
}
function arriba(){
    let abajo = document.querySelectorAll(".abajo");
    for(var i = 0; i< abajo.length; i++)
    abajo[i].classList.toggle("chau")
    let conjunto = document.querySelectorAll(".conjunto");
    for(var i = 0; i< conjunto.length; i++)
    conjunto[i].classList.toggle("chau")
    let vestido = document.querySelectorAll(".vestido");
    for(var i = 0; i< vestido.length; i++)
    vestido[i].classList.toggle("chau")
}
function conjunto(){
    let abajo = document.querySelectorAll(".abajo");
    for(var i = 0; i< abajo.length; i++)
    abajo[i].classList.toggle("chau")
    let arriba = document.querySelectorAll(".arriba");
    for(var i = 0; i< arriba.length; i++)
    arriba[i].classList.toggle("chau")
    let vestido = document.querySelectorAll(".vestido");
    for(var i = 0; i< vestido.length; i++)
    vestido[i].classList.toggle("chau")
}
function vestido(){
    let abajo = document.querySelectorAll(".abajo");
    for(var i = 0; i< abajo.length; i++)
    abajo[i].classList.toggle("chau")
    let arriba = document.querySelectorAll(".arriba");
    for(var i = 0; i< arriba.length; i++)
    arriba[i].classList.toggle("chau")
    let conjunto = document.querySelectorAll(".conjunto");
    for(var i = 0; i< conjunto.length; i++)
    conjunto[i].classList.toggle("chau")
}
function filtros(){
    document.querySelector(".losFiltros").style.display = "flex"
}