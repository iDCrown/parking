document.addEventListener('DOMContentLoaded', function() {
     selectTab('dueno'); 
     
     const tabs = document.querySelectorAll(".tab");
     tabs.forEach(tab =>{
         tab.addEventListener('click', function(){
             tabs.forEach(t => 
             t.classList.remove('active-tab'));
             tab.classList.add('active-tab');
            })
        })
    });
    
    function actualizasEncabezado(tipoUsuario){
        const thead = document.querySelector('#tabla-head');       
        thead.innerHTML = "";

        const filaHead = document.createElement('tr');
        const headDueno = ['Nombre', 'Apellido', 'Cédula', 'Correo', 'Rol'];
        const headUsuario = ['Nombre', 'Apellido', 'Cédula', 'Celular', 'Correo'];
        
        let encabezado;
        if(tipoUsuario === 'dueno'){
            encabezado = headDueno;
        }else {
            encabezado = headUsuario;
        }

        encabezado.forEach(text => {
            const th = document.createElement('th');
            th.textContent = text;
            filaHead.appendChild(th);  
        })
        thead.appendChild(filaHead);
    }
    

    function selectTab(tipo_usuario) {
        
    actualizasEncabezado(tipo_usuario)
    mostrarSinner(true);

    // Realiza la llamada a la API
    fetch("controllers/controller_historialUsuario.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ tipoUsuario: tipo_usuario }),
    })
        .then(response => {
            return response.text(); 
        })
        .then(text => {
            let data;
            try {
                data = JSON.parse(text);
            } catch (error) {
                console.error("Error al parsear JSON:", error, "Texto recibido:", text);
                return;
            }
            if (data && Array.isArray(data)) {
                actualizarTabla(data); // Actualiza la tabla con los datos recibidos
            } else {
                console.error("Formato de datos inesperado:", data);
            }
        })
        .catch(error => console.error("Error en la solicitud:", error))
        .finally(() => mostrarSinner(false));
}


function actualizarTabla(datos) {

    const tbody = document.querySelector("#tabla-body");
    tbody.innerHTML = ""; // Limpia el contenido existente

    if (datos.length === 0) {
        // Muestra un mensaje si no hay datos
        const row = document.createElement("tr");
        const cell = document.createElement("td");
        cell.textContent = "No hay datos disponibles";
        cell.colSpan = 5; // Ajusta al número de columnas de tu tabla
        row.appendChild(cell);
        tbody.appendChild(row);
        return;
    }

    datos.forEach(registro => {
        const row = document.createElement("tr");

        Object.keys(registro).forEach(clave => {
            const cell = document.createElement("td");
            row.classList.add('fila');
            cell.textContent = registro[clave] || "N/A"; // Usa "N/A" para valores vacíos
            row.appendChild(cell);
        });

        tbody.appendChild(row);
    });
}

function mostrarSinner(mostrar){
    const loader = document.querySelector("#loader");
    if (mostrar){
        loader.style.display = "block";
    }else {
        loader.style.display = "none";
    }
}