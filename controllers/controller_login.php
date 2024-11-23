<?php
session_start();
if (!empty($_POST["btnIngreso"])){
    if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {
        $usuario = mysqli_real_escape_string($db, $_POST['usuario']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $sql = "SELECT * FROM usuario WHERE user = ? AND password = ?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param('ss',$usuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($data = $result->fetch_assoc()) {
            $_SESSION["id_usuario"]=$data["id_usuario"];
            $_SESSION["user"]=$data["user"];
            $_SESSION["correo"]=$data["correo"];
            $_SESSION["password"]=$data["password"];
            $_SESSION["rol"]=$data["rol"];
            header("location: dashboard");
        } else {
            echo "<div class='alert alert-danger d-flex align-items-center' style='height:50px; padding:15px; border-radius: 6px;' role='alert'>
                    <div>
                    CONTRASEÑA O USUARIO INCORRECTO
                    </div>
                    <button type='button' class='btn-close' style='margin-left: 10px;' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }
        
        
    } else {
        echo "Campos vacios";
    }
    
}
