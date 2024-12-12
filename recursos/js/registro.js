$(document).ready(function() {
    $('#formulario-registro').on('submit', function(event) {
        event.preventDefault(); // Evita el envío normal del formulario 

        // Recoge los datos del formulario
        const username = $('#username').val().trim();
        const password = $('#password').val().trim();
        const email = $('#email').val().trim();
        const name = $('#name').val().trim();
        const last_name = $('#last_name').val().trim();
        const country = $('#country').val().trim();

        // Verifica que los campos no estén vacíos
        if (!username || !password || !email || !name || !last_name || !country) {
            Swal.fire({
                title: "Error",
                text: "Por favor, completa todos los campos.",
                icon: "warning",
            });
            return; // Detiene la ejecución si hay campos vacíos
        }

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
                if (response === "Registro exitoso") {
                    Swal.fire({ 
                        text: "Su registro ha sido exitoso.", 
                        icon: "success", 
                        title: "Registro exitoso!", 
                        timer: 2000, // Añade un temporizador a SweetAlert
                        showConfirmButton: false
                    }).then(() => {

                    });
                
                } else {
                    // Maneja el error con SweetAlert

                    

                    Swal.fire({
                        icon: "info",
                        text: response,
                    });
                    window.location.href = '../index.html'; // Redirige después de mostrar el mensaje
                    
                }
               
            },
            error: function(xhr, status, error) {
                // Maneja errores con SweetAlert
                Swal.fire({
                    title: "Error en el registro",
                    text: xhr.responseText || "Ocurrió un error inesperado.",
                    icon: "error",
                });
            }
        });
    });
});
