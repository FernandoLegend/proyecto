
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
    letra: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	cedula: /^\d{1,8}$/, // 1 a 8 numeros. Borroso
	sueldo: /^\d{1,20}$/, //1 a 20 numeros. Borroso
	cuota: /^\d{1,20}$/, //1 a 20 numeros. Borroso
	descuento: /^\d{1,2}$/ // 1 a 2 numeros. Borroso
}

const campos = {
    txtNombre: false,
    txtApe: false,
    txtCI: false,
    txtSueldo: false,
    txtTrabajo: false,
    txtCuota: false,
    txtDescuento: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "txtNombre":
            if(expresiones.letra.test(e.target.value)){
                document.getElementById('grupo__nombre').classList.remove('formulario__grupo-incorrecto');
                document.getElementById('grupo__nombre').classList.add('formulario__grupo-correcto');
                document.querySelector('#grupo__nombre i').classList.add('fa-check-circle');
                document.querySelector('#grupo__nombre i').classList.remove('fa-times-circle');
                document.querySelector('#grupo__nombre .formulario__input-error').classList.remove('formulario__input-error-activo');
                campos['txtNombre'] = true;

            } else {
                document.getElementById('grupo__nombre').classList.add('formulario__grupo-incorrecto');
                document.getElementById('grupo__nombre').classList.remove('formulario__grupo-correcto');
                document.querySelector('#grupo__nombre i').classList.add('fa-times-circle');
                document.querySelector('#grupo__nombre i').classList.remove('fa-check-circle');
                document.querySelector('#grupo__nombre .formulario__input-error').classList.add('formulario__input-error-activo');
                campos['txtNombre'] = false;
            }
        break;
        case "txtApe":
            if(expresiones.letra.test(e.target.value)){
                document.getElementById('grupo__apellido').classList.remove('formulario__grupo-incorrecto');
                document.getElementById('grupo__apellido').classList.add('formulario__grupo-correcto');
                document.querySelector('#grupo__apellido i').classList.add('fa-check-circle');
                document.querySelector('#grupo__apellido i').classList.remove('fa-times-circle');
                document.querySelector('#grupo__apellido .formulario__input-error').classList.remove('formulario__input-error-activo');
                campos['txtApe'] = true;

            } else {
                document.getElementById('grupo__apellido').classList.add('formulario__grupo-incorrecto');
                document.getElementById('grupo__apellido').classList.remove('formulario__grupo-correcto');
                document.querySelector('#grupo__apellido i').classList.add('fa-times-circle');
                document.querySelector('#grupo__apellido i').classList.remove('fa-check-circle');
                document.querySelector('#grupo__apellido .formulario__input-error').classList.add('formulario__input-error-activo');
                campos['txtApe'] = false;
            }
            
        break;
        case "txtCI":
            if(expresiones.cedula.test(e.target.value)){
                document.getElementById('grupo__cedula').classList.remove('formulario__grupo-incorrecto');
                document.getElementById('grupo__cedula').classList.add('formulario__grupo-correcto');
                document.querySelector('#grupo__cedula i').classList.add('fa-check-circle');
                document.querySelector('#grupo__cedula i').classList.remove('fa-times-circle');
                document.querySelector('#grupo__cedula .formulario__input-error').classList.remove('formulario__input-error-activo');
                campos['txtCI'] = true;

            } else {
                document.getElementById('grupo__cedula').classList.add('formulario__grupo-incorrecto');
                document.getElementById('grupo__cedula').classList.remove('formulario__grupo-correcto');
                document.querySelector('#grupo__cedula i').classList.add('fa-times-circle');
                document.querySelector('#grupo__cedula i').classList.remove('fa-check-circle');
                document.querySelector('#grupo__cedula .formulario__input-error').classList.add('formulario__input-error-activo');
                campos['txtNombre'] = false;
            }
            
        break;
        case "txtSueldo":
            if(expresiones.sueldo.test(e.target.value)){
                document.getElementById('grupo__sueldo').classList.remove('formulario__grupo-incorrecto');
                document.getElementById('grupo__sueldo').classList.add('formulario__grupo-correcto');
                document.querySelector('#grupo__sueldo i').classList.add('fa-check-circle');
                document.querySelector('#grupo__sueldo i').classList.remove('fa-times-circle');
                document.querySelector('#grupo__sueldo .formulario__input-error').classList.remove('formulario__input-error-activo');
                campos['txtSueldo'] = true;

            } else {
                document.getElementById('grupo__sueldo').classList.add('formulario__grupo-incorrecto');
                document.getElementById('grupo__sueldo').classList.remove('formulario__grupo-correcto');
                document.querySelector('#grupo__sueldo i').classList.add('fa-times-circle');
                document.querySelector('#grupo__sueldo i').classList.remove('fa-check-circle');
                document.querySelector('#grupo__sueldo .formulario__input-error').classList.add('formulario__input-error-activo');
                campos['txtSueldo'] = false;
            }
            
        break;
        case "txtTrabajo":
            if(expresiones.letra.test(e.target.value)){
                document.getElementById('grupo__area').classList.remove('formulario__grupo-incorrecto');
                document.getElementById('grupo__area').classList.add('formulario__grupo-correcto');
                document.querySelector('#grupo__area i').classList.add('fa-check-circle');
                document.querySelector('#grupo__area i').classList.remove('fa-times-circle');
                document.querySelector('#grupo__area .formulario__input-error').classList.remove('formulario__input-error-activo');
                campos['txtTrabajo'] = true;

            } else {
                document.getElementById('grupo__area').classList.add('formulario__grupo-incorrecto');
                document.getElementById('grupo__area').classList.remove('formulario__grupo-correcto');
                document.querySelector('#grupo__area i').classList.add('fa-times-circle');
                document.querySelector('#grupo__area i').classList.remove('fa-check-circle');
                document.querySelector('#grupo__area .formulario__input-error').classList.add('formulario__input-error-activo');
                campos['txtTrabajo'] = false;
            }
            
            
        break;
        case "txtCuota":
            if(expresiones.cuota.test(e.target.value)){
                document.getElementById('grupo__cuota').classList.remove('formulario__grupo-incorrecto');
                document.getElementById('grupo__cuota').classList.add('formulario__grupo-correcto');
                document.querySelector('#grupo__cuota i').classList.add('fa-check-circle');
                document.querySelector('#grupo__cuota i').classList.remove('fa-times-circle');
                document.querySelector('#grupo__cuota .formulario__input-error').classList.remove('formulario__input-error-activo');
                campos['txtCuota'] = true;

            } else {
                document.getElementById('grupo__cuota').classList.add('formulario__grupo-incorrecto');
                document.getElementById('grupo__cuota').classList.remove('formulario__grupo-correcto');
                document.querySelector('#grupo__cuota i').classList.add('fa-times-circle');
                document.querySelector('#grupo__cuota i').classList.remove('fa-check-circle');
                document.querySelector('#grupo__cuota .formulario__input-error').classList.add('formulario__input-error-activo');
                campos['txtCuota'] = false;
            }
        break;
        case "txtDescuento":
            if(expresiones.descuento.test(e.target.value)){
                document.getElementById('grupo__descuento').classList.remove('formulario__grupo-incorrecto');
                document.getElementById('grupo__descuento').classList.add('formulario__grupo-correcto');
                document.querySelector('#grupo__descuento i').classList.add('fa-check-circle');
                document.querySelector('#grupo__descuento i').classList.remove('fa-times-circle');
                document.querySelector('#grupo__descuento .formulario__input-error').classList.remove('formulario__input-error-activo');
                campos['txtDescuento'] = true;

            } else {
                document.getElementById('grupo__descuento').classList.add('formulario__grupo-incorrecto');
                document.getElementById('grupo__descuento').classList.remove('formulario__grupo-correcto');
                document.querySelector('#grupo__descuento i').classList.add('fa-times-circle');
                document.querySelector('#grupo__descuento i').classList.remove('fa-check-circle');
                document.querySelector('#grupo__descuento .formulario__input-error').classList.add('formulario__input-error-activo');
                campos['txtDescuento'] = false;
            }
            
        break;
    }

}

inputs.forEach((input) => {
    input.addEventListener('keyup',validarFormulario);
    input.addEventListener('blur',validarFormulario);

});

formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    if(campos.txtNombre && campos.txtApe && campos.txtCI && campos.txtSueldo && campos.txtTrabajo && campos.txtCuota && campos.txtDescuento) {
        formulario.reset();

        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');            
            
        }, 5000);

        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');            
            // form.submit();
            //const formulario = document.getElementById('formulario');
            //var aasdad1 = 
        });
        alert('Enviado Correactamente1');
        nombre = document.getElementById('txtNombre');
        const btncompra = document.getElementById('submitButton');
        btncompra.disabled = false;

    } else {
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        const btncompra = document.getElementById('submitButton');
        //btncompra.hidden = false;
        alert('el else');
    }
    
});
