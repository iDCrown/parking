//BOTONES TIPO VEHICULO
let tipoVehiculoSeleccionado = null;

function seleccionarTipo(tipo){
    tipoVehiculoSeleccionado = tipo;
    document.querySelector("#mensajeResultado").innerText = `Seleccionaste: ${tipo}`;
}

function seleccionarTipoS(tipo){
    tipoVehiculoSeleccionado = tipo;
    document.querySelector("#mensajeResultadoS").innerText = `Seleccionaste: ${tipo}`;
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
    });
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
    });
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