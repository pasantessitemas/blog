
$(document).ready(function() {
    $('#formulario-ingreso').on('submit', function(event) {
        event.preventDefault(); // Evita el envío normal del formulario

        // Recoge los datos del formulario
        const username = $('#username').val().trim();
        const password = $('#password').val().trim();

        // Verifica que los campos no estén vacíos
        if (!username || !password) {
            Swal.fire({
                title: "Error",
                text: "Por favor, completa todos los campos.",
                icon: "warning",
            });
            return; // Detiene la ejecución si hay campos vacíos
        }

        // Envía la solicitud AJAX
        $.ajax({
            url: 'controllers/login.php', // Cambia esto por la URL de tu API
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(response) { 
                if (response === "success") {
                    // Maneja la respuesta exitosa 
                    Swal.fire({ 
<<<<<<< HEAD
                        title: "Bienvenido!", 
=======
                        title: "Bienvenido!",
>>>>>>> c79d95c4274b69315c67ccb4f2916009c12b4fd3
                        text: "Inicio de sesión exitoso.", 
                        icon: "success", 
                        timer: 2000, // Añade un temporizador a SweetAlert
                        showConfirmButton: false
                    }).then(() => { 
<<<<<<< HEAD
                
                    });
                } else {
                    Swal.fire({
                  
                    });
                      // Redirige después de 2 segundos
                      window.location.href = 'vistas/Biotecnologia.html'; // Cambia esto a la ruta deseada
=======
                        // Redirige después del temporizador
                        window.location.href = 'vistas/Biotecnologia.html'; // Cambia esto a la ruta deseada
                    });
                } else {
                    Swal.fire({
                        title: "Error",
                        text: "Usuario o contraseña incorrectos.",
                        icon: "error",
                    });
>>>>>>> c79d95c4274b69315c67ccb4f2916009c12b4fd3
                }
            },
            error: function(xhr, status, error) {
                // Maneja errores con SweetAlert
                Swal.fire({
                    title: "Error en el inicio de sesión",
                    text: xhr.responseText || "Ocurrió un error inesperado.",
                    icon: "error",
                });
            }
        });
    });
});
<<<<<<< HEAD

=======
>>>>>>> c79d95c4274b69315c67ccb4f2916009c12b4fd3
