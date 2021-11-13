const secciones = [
    {
        imagen: "mujer.jpg",
        link: "mujer/mujer.html",
        texto: "INDUMENTARIA FEMENINA",
    },
    {
        imagen: "niños.jpg",
        link: "niños/niños.html",
        texto: "INDUMENTARIA NIÑOS",
    }, 
    {
        imagen: "hombre.jpg",
        link: "hombre/hombre.html",
        texto: "INDUMENTARIA MASCULINA",
    },
]
const seccionesWeb = document.getElementById("imagenes")
for(partedelaweb of secciones){
    seccionesWeb.innerHTML += `
    <section class="mujer secciones col-sm-12 col-md-4 col-lg-4">
        <a href="${partedelaweb.link}"><img src="imagenes/${partedelaweb.imagen}" alt="seccion mujer"><p>${partedelaweb.texto}</p></a>          
    </section>
    ` 
}



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
