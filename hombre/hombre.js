//              MODAL USUARIO
const abrir = document.querySelector("#contacto")

function abreModal(){
    abrir.style.display = "flex"
}
function cierraModal(){
    abrir.style.display = "none"
}
//            CARRITO DE COMPRAS
const abrirCarrito = document.querySelector("#carrito")

function abreModalCarrito(){
    abrirCarrito.style.display = "flex"
}
function cierraModalCarrito(){
    abrirCarrito.style.display = "none"
}
                 //FILTROS
let arriba1 = document.querySelectorAll(".arriba");
let conjunto1 = document.querySelectorAll(".conjuntos");
let abajo1 = document.querySelectorAll(".abajo");

function abajo(){
    for(var i = 0; i< arriba1.length; i++)
    arriba1[i].classList.toggle("chau");
    for(var i = 0; i< conjunto1.length; i++)
    conjunto1[i].classList.toggle("chau")
}
function arriba(){
    for(var i = 0; i< abajo1.length; i++)
    abajo1[i].classList.toggle("chau");
    for(var i = 0; i< conjunto1.length; i++)
    conjunto1[i].classList.toggle("chau")
}
function conjunto(){
    for(var i = 0; i< abajo1.length; i++)
    abajo1[i].classList.toggle("chau");
    for(var i = 0; i< arriba1.length; i++)
    arriba1[i].classList.toggle("chau")
}
            //BOTON DE FILTRO
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