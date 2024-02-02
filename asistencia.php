<?php
include_once('auth.php');
include_once('config/conexion.php');
include_once('src/components/parte_superior.php');

?>
<link rel="stylesheet" href="src/assets/css/asistencia/asistencia.css">
<link rel="icon" href="src/assets/images/logo-zeus.png">


<div class="container-page">

    <div>
        <p>Zeus<span> / Asistencia</span></p>
        <h3>Asistencia</h3>
    </div>

    <div class="container-asitencia" style="background-color: #fff;">
        <div class="asistencia-input-info">
            <div class="asis-img">
                <img src="src/assets/images/logo-zeus.png" alt="">
            </div>
            <div class="asis-input">
                <input class="form-control" type="text" placeholder="Escanear codigo de barras">
            </div>
            <div class="asis-button-ver">
                <a class="btn btn-primary" href="registro_asistencia.php" style="text-decoration: none;">Ver Registros</a>
            </div>
        </div>
    </div>
    <div class="container-card-asistencia" style="background-color: #fff;">
        <div class="card-principal-info">
            <div class="card-asistencia-info">
                <h1>La Cruz Salvador,Elder Stefano</h1>
                <span>INGENIERIA</span>
            </div>
            <div class="card-asistencia-info-image">
                <img src="src/assets/images/alumno/75441125.jpg" alt="">
            </div>
        </div>
        <div class="card-second-info">
            <span>21 AÑOS</span>
        </div>
        <div class="card-asistencia-footer">
            <div class="asis-footer-info">
                <span>CICLO: </span> VERANO 2024  III
            </div>
            <div class="asis-footer-info">
                <span>DEUDA: </span> S/110.0
            </div>
            <div class="asis-footer-info">
                <span>TURNO: </span> MAÑANA
            </div>
        </div>
    </div>
</div>






<?php
include_once('src/components/parte_inferior.php');
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script  type="text/javascript">
    
    let dni=45645600;
    $.ajax({
    url: './app/controllers/asistencia/controlasistencia.php',
    type: 'POST',
    data: {
        dni: dni
    },
    dataType: 'json',  // Indica que esperas datos en formato JSON
    success: function(data) {
        // escenario---Numero de evento,
        console.log(data); 
        switch (data[0].escenario){
        case 1:{
            Swal.fire({
            title: data[0].mensaje,
            text: "Agregue al alumno o considere actualizar el DNI",
            icon: "warning"
        });};
        break;
        case 2:{
            Swal.fire({
            title: data[0].mensaje,
            text: "Registre una matrícula o revise su horario",
            icon: "warning"
        });};
        break;
        case 3:{
            Swal.fire({
            title: data[0].mensaje,
            text: "Genere su boleta",
            icon: "warning"
        });};
        break;
        case 4:{
            Swal.fire({
            title: "Asistencia exitosa",
            text: "Se registró exitosamente",
            icon: "success"
        });};

        }
    },

    error: function(xhr, status, error) {
        console.error("Error en la solicitud AJAX:", status, error);
        // Puedes agregar aquí código adicional para manejar el error, como
    }
});
</script>