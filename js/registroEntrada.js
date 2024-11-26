//BOTONES TIPO VEHICULO
let tipoVehiculoSeleccionado = null;

function seleccionarTipo(tipo){
    tipoVehiculoSeleccionado = tipo
    document.querySelector("#mensajeResultado").innerText = `Seleccionaste: ${tipo}`; // Muestra el tipo de vehículo seleccionado en la interfaz
}


function registrarVehiculo(event) {
    event.preventDefault(); // Evita la recarga de la página!!!!

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
        tipoVehiculo: tipoVehiculoSeleccionado, // Se incluye el tipo seleccionado
    };

    // Solicitud al servidor
    fetch("db/db.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(datos),
    })
        .then((response) => {
            // Verificar si la respuesta es exitosa (status 200)
            if (!response.ok) {
                throw new Error(`Error en la solicitud: ${response.statusText}`);
            }
            
            // Leer la respuesta como texto primero para ver qué está devolviendo el servidor
            return response.text(); 
        })
        .then((text) => {
            console.log("Respuesta del servidor (texto crudo):", text); // Verifica qué estás recibiendo

            // Intentar convertir el texto en JSON si tiene un formato válido
            try {
                const data = JSON.parse(text); // Intentamos parsear el texto a JSON
                
                // Ahora podemos manejar la respuesta JSON
                if (data.success) {
                    document.querySelector("#mensajeResultado").innerText = "¡Registro exitoso!";
                    // Limpia los campos del formulario
                    document.querySelector("#formRegistro").reset();
                    tipoVehiculoSeleccionado = null; // Reinicia la selección
                } else {
                    document.querySelector("#mensajeResultado").innerText =
                        "Error al registrar: " + data.message;
                }
            } catch (error) {
                document.querySelector("#mensajeResultado").innerText =
                    "Error de formato de respuesta: " + error.message;
            }
        })
        .catch((error) => {
            document.querySelector("#mensajeResultado").innerText =
                "Error de conexión: " + error.message;
        });
    
}

