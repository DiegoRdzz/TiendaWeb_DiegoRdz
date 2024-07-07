// alerta

function confirmDelete(event) {
    if (!confirm("¿Estás seguro de eliminar este producto?")) {
        event.preventDefault();
    }
}
