//BOTONES TIPO VEHICULO
function selectButton(mostrar) {
    const button = document.querySelectorAll('.icon-btn');
    const icon = document.querySelectorAll('.i-btn');

    console.log(mostrar)
    if(!mostrar){
        button.forEach(button => button.classList.remove('icon-btn-active'));
        icon.forEach(icon => icon.classList.remove('i-btn-active'));
    }else{
        button.forEach((t, index) => {
            t.addEventListener('click', function() {
                // Eliminar las clases activas de todos los botones e íconos
                button.forEach(btn => btn.classList.remove('icon-btn-active'));
                icon.forEach(icn => icn.classList.remove('i-btn-active'));
        
                // Agregar la clase activa solo al botón e ícono seleccionados
                t.classList.add('icon-btn-active');
                icon[index].classList.add('i-btn-active');
            });
        });
    }
}

let tipoVehiculoSeleccionado = null;

function seleccionarTipo(tipo){
    tipoVehiculoSeleccionado = tipo;
    document.querySelector("#mensajeResultado").innerText = `Seleccionaste: ${tipo}`;
}

function seleccionarTipoS(tipo){
    tipoVehiculoSeleccionado = tipo;
    document.querySelector("#mensajeResultadoS").innerText = `Seleccionaste: ${tipo}`;
}

function actualizarTabla() {

    selectButton(true)
    fetch('controllers/controller_entradasVivo.php?action=getHistoryVivo')
    .then(response => {
        console.log('Response status:', response.status);
        console.log('Response headers:', response.headers);
        
        // Verifica el tipo de contenido
        const contentType = response.headers.get('content-type');
        console.log('Content-Type:', contentType);

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        return response.json();
    })
    .then(data => {
        console.log('Datos recibidos:', data);
        
        const tbody = document.querySelector('.table-content tbody');
        tbody.innerHTML = ''; // Limpiar tabla actual

        data.forEach(registro => {
            const tr = document.createElement('tr');
            tr.classList.add("item");
            tr.innerHTML = `
                <td>${registro.numero_espacio}</td>
                <td>${registro.tipo_espacio}</td>
                <td>${registro.nombre} ${registro.apellido}</td>
                <td>${registro.placa}</td>
                <td>${registro.horaEntrada}</td>
            `;
            tbody.appendChild(tr);
        });
    })
    .catch(error => {
        console.error('Error completo:', error);
        console.error('Tipo de error:', typeof error);
        console.error('Mensaje de error:', error.message);
    });
    
}
// Función para evitar XSS al escapar caracteres especiales
function escapeHtml(str) {
    // Verifica si str es un valor válido antes de usar replace
    if (str === null || str === undefined) {
        return '';
    }
    
    return String(str).replace(/[&<>"']/g, (match) => {
        const escapeMap = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;',
        };
        return escapeMap[match];
    });
}


function registrarVehiculo(event) {
    event.preventDefault(); 

    const placa = document.querySelector("#inputPlaca").value.trim();
    const cedula = document.querySelector("#inputCedula").value.trim();

    if (!tipoVehiculoSeleccionado) {
        document.querySelector("#mensajeResultado").innerText = "Por favor, selecciona un tipo de vehículo.";
        return;
    }

    // Datos para enviar al servidor
    const datos = {
        placa: placa,
        cedula: cedula,
        tipoVehiculo: tipoVehiculoSeleccionado,
    };

    console.log("Datos enviados:", datos); // Depuración: muestra los datos que se envían

    // Solicitud al servidor
    fetch("controllers/controller_registroES.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(datos),
    })
    .then((response) => {
        console.log("Respuesta raw:", response);
        
        // Verificar si la respuesta es exitosa
        if (!response.ok) {
            return response.text().then(text => {
                console.error("Texto de respuesta de error:", text);
                throw new Error(`Error: ${response.status} - ${text}`);
            });
        }
        
        // Intenta parsear como JSON, capturando errores
        return response.text().then(text => {
            console.log("Texto de respuesta completo:", text);
            try {
                return JSON.parse(text);
            } catch (error) {
                console.error("Error parseando JSON:", error);
                console.error("Texto recibido:", text);
                throw new Error("Respuesta no es JSON válido: " + text);
            }
        });
    })
    .then((data) => {
        console.log("Datos recibidos:", data);
        
        // Resto de tu código de manejo de respuesta
        if (data.success) {
            document.querySelector("#mensajeResultado").innerText = "¡Registro exitoso!";
            document.querySelector("#formRegistro").reset();
            tipoVehiculoSeleccionado = null;
        } else {
            document.querySelector("#mensajeResultado").innerText = 
                "Error al registrar: " + (data.message || 'Error desconocido');
        }
    })
    .catch((error) => {
        console.error("Error detallado:", error);
        document.querySelector("#mensajeResultado").innerText = 
            "Error de conexión: " + error.message;
    })
    .finally(() => selectButton(false));
}

function registrarSalida(event) {
    event.preventDefault();

    // Validar tipo de vehículo
    if (!tipoVehiculoSeleccionado) {
        mostrarMensaje('Selecciona primero el tipo de vehículo', false);
        return;
    }

    const placa = document.getElementById('inputPlacaSalida').value.trim();

    if (!placa) {
        mostrarMensaje('Ingresa la placa del vehículo', false);
        return;
    }

    const datosRegistro = {
        tipo: 'salida',
        placa: placa,
        tipoVehiculo: tipoVehiculoSeleccionado
    };

    fetch('controllers/controller_registroES.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(datosRegistro)
    })
    .then(response => {
        // Añadir depuración para ver la respuesta raw
        console.log('Response status:', response.status);
        return response.text(); // Cambiar a text() para ver el contenido completo
    })
    .then(text => {
        console.log('Raw response:', text);
        // Intentar parsear JSON
        try {
            const data = JSON.parse(text);
            mostrarMensaje(data.message, data.success);
            
            // Limpiar campos si fue exitoso
            if (data.success) {
                document.getElementById('inputPlacaSalida').value = '';
                tipoVehiculoSeleccionado = null;
                document.querySelectorAll('.icon-btn').forEach(btn => {
                    btn.classList.remove('btn-selected');
                });
            }
        } catch (error) {
            console.error('JSON Parse Error:', error);
            mostrarMensaje('Error al procesar la respuesta del servidor', false);
        }
    })
    .catch(error => {
        console.error('Fetch Error:', error);
        mostrarMensaje('Error al registrar la salida', false);
    })
}

function mostrarMensaje(mensaje, esExitoso) {
    const mensajeDiv = document.getElementById('mensajeResultado');
    mensajeDiv.innerHTML = mensaje;
    mensajeDiv.className = esExitoso 
        ? 'alert alert-success' 
        : 'alert alert-danger';
    
    // Limpiar mensaje después de 5 segundos
    setTimeout(() => {
        mensajeDiv.innerHTML = '';
        mensajeDiv.className = '';
    }, 5000);
}

document.addEventListener('DOMContentLoaded', () => {
    console.log("Iniciando actualización de tabla");
    actualizarTabla();
    // Actualizar cada 30 segundos
    setInterval(actualizarTabla, 6000);
});