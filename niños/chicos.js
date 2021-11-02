//              MODAL USUARIO
const abrir = document.querySelector("#contacto")

function abreModal(){
    abrir.style.display = "flex"
}
function cierraModal(){
    abrir.style.display = "none"
}
//            CARRITO DE COMPRAS

//                   CHAT

//                 FILTROS
let arriba = document.querySelectorAll(".arriba");
let conjunto = document.querySelectorAll(".conjunto");
let vestido = document.querySelectorAll(".vestido");
let abajo = document.querySelectorAll(".abajo");

function abajo(){
    for(var i = 0; i< arriba.length; i++)
    arriba[i].classList.toggle("chau");
    for(var i = 0; i< conjunto.length; i++)
    conjunto[i].classList.toggle("chau");
    for(var i = 0; i< vestido.length; i++)
    vestido[i].classList.toggle("chau");
}
function arriba(){
    for(var i = 0; i< abajo.length; i++)
    abajo[i].classList.toggle("chau")
    for(var i = 0; i< conjunto.length; i++)
    conjunto[i].classList.toggle("chau")
    for(var i = 0; i< vestido.length; i++)
    vestido[i].classList.toggle("chau")
}
function conjunto(){
    for(var i = 0; i< abajo.length; i++)
    abajo[i].classList.toggle("chau");
    for(var i = 0; i< arriba.length; i++)
    arriba[i].classList.toggle("chau");
    for(var i = 0; i< vestido.length; i++)
    vestido[i].classList.toggle("chau");
}
function vestido(){
    for(var i = 0; i< abajo.length; i++)
    abajo[i].classList.toggle("chau");
    for(var i = 0; i< arriba.length; i++)
    arriba[i].classList.toggle("chau");
    for(var i = 0; i< conjunto.length; i++)
    conjunto[i].classList.toggle("chau");
}
                //BOTON FILTRO
let botonFiltro = document.querySelector(".botonFiltro");
let filtros = document.querySelector(".losFiltros");
botonFiltro.addEventListener("click", function(){
   if(filtros.classList.contains("losFiltros")){
       filtros.classList.remove("losFiltros")
       filtros.classList.add("seVe")
   }else{
        filtros.classList.add("losFiltros")
   }
})
