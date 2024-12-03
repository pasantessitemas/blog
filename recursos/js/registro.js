$(document).ready(function() {
    $('#formulario-registro').on('submit', function(event) {
        event.preventDefault(); // Evita el envío normal del formulario 

        // Recoge los datos del formulario
        const username = $('#username').val();
        const password = $('#password').val();
        const email = $('#email').val();
        const name = $('#name').val();
        const last_name = $('#last_name').val();
        const country = $('#country').val();

        // Envía la solicitud AJAX

        $.ajax({
            url: '../controllers/registro.php', // Cambia esto por la URL de tu API
            type: 'POST',
            data: {
                username: username,
                password: password,
                email: email,
                name: name,
                last_name: last_name,
                country: country
            },
            success: function(response) {
                // Maneja la respuesta del servidor
                Swal.fire({ 
                    title: "Registro exitoso!", 
                    text: "Su registro ha sido exitoso.", 
                    icon: "success", 
                    timer: 1000, // Añade un temporizador a SweetAlert
                    showConfirmButton: false
                }).then(() => { 
                    // Redirige después de 2 segundos
                    setTimeout(function() {
                        window.location.href = '../index.html'; // Cambia esto a la ruta deseada
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