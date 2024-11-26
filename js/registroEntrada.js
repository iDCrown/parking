//BOTONES TIPO VEHICULO
let tipoVehiculoSeleccionado = null;

function seleccionarTipo(tipo){
    tipoVehiculoSeleccionado = tipo;
    document.querySelector("#mensajeResultado").innerText = `Seleccionaste: ${tipo}`; 
}

function registrarVehiculo(event) {
    event.preventDefault(); 

    const placa = document.querySelector("#inputPlaca").value.trim();
    const nombre = document.querySelector("#inputNombre").value.trim();

    if (!tipoVehiculoSeleccionado) {
        document.querySelector("#mensajeResultado").innerText = "Por favor, selecciona un tipo de vehículo.";
        return;
    }

    // Datos para enviar al servidor
    const datos = {
        placa: placa,
        nombre: nombre,
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