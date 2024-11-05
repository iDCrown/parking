<?php 

    //Conectar a Mysql
    $con = mysqli_connect("localhost", "root", "", "agencia_seguros");

    //Probar conexión
    if(mysqli_connect_errno()){
        echo "Fallo al conectarse a Mysql: "  .mysqli_connect_error();
    }/* else{
        echo "Conectado correctamente";
    } */