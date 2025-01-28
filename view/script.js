document.addEventListener('DOMContentLoaded', function() {
    var cantidadCeldas = document.querySelectorAll('tbody .cantidad');
    
    cantidadCeldas.forEach(function(celda) {
        var cantidadTexto = celda.textContent.trim();
        var cantidad = parseInt(cantidadTexto);

        // Comprobar si la cantidad es baja 
        if (!isNaN(cantidad) && cantidad < 70) {  
            celda.style.backgroundColor = 'red';  // 
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var input = document.getElementById('busca'); // Selecciona el input de búsqueda
    var table = document.getElementById('productos-table'); 
    var rows = table.getElementsByTagName('tr');
    input.addEventListener('keyup', function() {
        var filter = input.value.toLowerCase(); // Obtiene el valor del input y lo convierte a minúsculas

        for (var i = 1; i < rows.length; i++) { 
            var cells = rows[i].getElementsByTagName('td'); // Obtiene las celdas de la fila actual
            var match = false;

            for (var j = 0; j < cells.length; j++) {
                if (cells[j].textContent.toLowerCase().includes(filter)) {
                    match = true; // Si alguna celda contiene el texto de búsqueda, marca como coincidencia
                    break;
                }
            }

            if (match) {
                rows[i].style.display = ''; // Muestra la fila si coincide
            } else {
                rows[i].style.display = 'none'; // Oculta la fila si no coincide
            }
        }
    });
});