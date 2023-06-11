/* Hacemos validación mediante JS. El alert lo dejamos en la parte de PHP. */

document.querySelector('form').addEventListener('submit', function(event) {

    let nombre = document.querySelector('input[name="NOMBRE"]').value;
    let apellido = document.querySelector('input[name="APELLIDO"]').value;
    let email = document.querySelector('input[name="EMAIL"]').value;
    
    
    if(nombre.trim() === '' || apellido.trim() === '' || email.trim() === '') {
        alert('Por favor, rellena todos los campos para continuar');
        event.preventDefault();
    } else {
        alert('¡Formulario enviado!');
    }
});