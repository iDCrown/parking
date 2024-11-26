let tipo_de_usuario = null;

function selectTab(tipo_usuario) {
    tipo_de_usuario = tipo_usuario;
    document.querySelector("#mensajeResultado").innerText = `Seleccionaste: ${tipo_de_usuario}`; // Muestra el tipo de usuario seleccionado en la interfaz

    // Realiza la llamada a la API
    fetch("controller/controller_historialUsuario.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ tipoUsuario: tipo_usuario }),
    })

    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error("Error en la respuesta:", data.error);
            alert(data.error);
            return;
        }
        actualizarTabla(data);
    })
    .catch(error => console.error("Error en la solicitud:", error));
}

function actualizarTabla(datos) {
    const tbody = document.querySelector("#tabla-body"); // Asegúrate de que este ID corresponda a tu tabla
    tbody.innerHTML = ""; // Limpia la tabla antes de actualizarla
    
    datos.forEach(registro => {
        const row = document.createElement("tr");
        
        Object.values(registro).forEach(valor => {
            const cell = document.createElement("td");
            cell.textContent = valor ? valor : "N/A"; // Evita celdas vacías
            row.appendChild(cell);
        });
        
        tbody.appendChild(row);
    });
}
