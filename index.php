<?php
require_once './inc/EmpezarSesion.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
include "./inc/Head.php"
?>

<body> <?php
        if (!isset($_GET['vista']) || $_GET['vista'] == "") {
            $_GET['vista'] = "login";
        }
        if (
            is_file("./views/" . $_GET['vista'] . ".php")
            && $_GET['vista'] != "login"
            && $_GET['vista'] != "registro"
            && $_GET['vista'] != "404"
        ) {
            include './inc/Navbar.php';
            include "./views/" . $_GET['vista'] . ".php";
            include './inc/Script.php';
        } else {
            if ($_GET['vista'] == "login") {
                include './views/login.php';
            }
            if ($_GET['vista'] == "registro") {
                include './views/registro.php';
                include './inc/Script.php';
            }
        }
        ?>
</body>

</html>