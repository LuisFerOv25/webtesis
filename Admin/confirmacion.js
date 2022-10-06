function confirmacion(evento) {
    if (confirm("¿ Está seguro que desea eliminar este registro ?")) {
        return true;
    } else {
        evento.preventDefault();
    }
}
let linkdelete = document.querySelectorAll(".eliminar");

for (var i = 0; i < linkdelete.length; i++) {
    linkdelete[i].addEventListener("click", confirmacion);
}