/*Creamos el js para que coja los datos del formulario y los valide.*/

document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();

    let nombre = document.querySelector('input[name="NOMBRE"]').value;
    let apellido = document.querySelector('input[name="APELLIDO"]').value;
    let email = document.querySelector('input[name="EMAIL"]').value;
    
    
    if(nombre.trim() === '' || apellido.trim() === '' || email.trim() === '') {
        alert('¡Por favor, rellene todos los campos para completar el registro!');
    } else {
        alert('¡Registro enviado! :)');
        document.querySelector('form').reset();
    }
});
document.querySelector('form').addEventListener('submit', validateForm);