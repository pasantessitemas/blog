$(document).ready(function() {
    $('#formulario-ingreso').on('submit', function(event) {
        event.preventDefault(); // Evita el envío normal del formulario

        // Recoge los datos del formulario
        const username = $('#username').val();
        const password = $('#password').val();

        // Envía la solicitud AJAX
        $.ajax({
            url: 'controllers/login.php', // Cambia esto por la URL de tu API
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(response) { 
                // Maneja la respuesta exitosa 
                Swal.fire({ 
                    title: "Bienvenido!", 
                    text: "Inicio de sesión exitoso.", 
                    icon: "success", 
                    timer: 1000, // Añade un temporizador a SweetAlert
                    showConfirmButton: false
                }).then(() => { 
                    // Redirige después de 2 segundos
                    setTimeout(function() {
                        window.location.href = 'vistas/Biotecnologia.html'; // Cambia esto a la ruta deseada
                    }, 1000);
                });
                    },
            error: function(xhr, status, error) {
                // Maneja errores con SweetAlert
                Swal.fire({
                    title: "Error en el inicio de sesión",
                    text: xhr.responseText,
                    icon: "error",
                });
            }
        });
    });
});