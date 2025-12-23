<?php
function verificarDatos($filtro, $cadena)
{
    //si la cadena coincide con el filtro retorna falso 
    if (preg_match("/^" . $filtro . "$/", $cadena)) {
        return false;
    } else {
        return true;
    }
}

function limpiarCadena($cadena)
{
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    $cadena = str_ireplace("<script>", "", $cadena);
    $cadena = str_ireplace("</script>", "", $cadena);
    $cadena = str_ireplace("<script src>", "", $cadena);
    $cadena = str_ireplace("<script type=>", "", $cadena);
    $cadena = str_ireplace("alert", "", $cadena);
    $cadena = str_ireplace("SELECT * FROM", "", $cadena);
    $cadena = str_ireplace("DELETE * FROM", "", $cadena);
    $cadena = str_ireplace("INSERT INTO", "", $cadena);
    $cadena = str_ireplace("DROP TABLE", "", $cadena);
    $cadena = str_ireplace("DROP DATABASE", "", $cadena);
    $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
    $cadena = str_ireplace("SHOW TABLES", "", $cadena);
    $cadena = str_ireplace("SHOW DATABASES", "", $cadena);
    $cadena = str_ireplace("<?php", "", $cadena);
    $cadena = str_ireplace("?>", "", $cadena);
    $cadena = str_ireplace("--", "", $cadena);
    $cadena = str_ireplace("^", "", $cadena);
    $cadena = str_ireplace("<", "", $cadena);
    $cadena = str_ireplace("[", "", $cadena);
    $cadena = str_ireplace("]", "", $cadena);
    $cadena = str_ireplace("==", "", $cadena);
    $cadena = str_ireplace(";", "", $cadena);
    $cadena = str_ireplace("::", "", $cadena);
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    return $cadena;
}


function renombrarFotos($nombre)
{
    $nombre = str_ireplace(" ", "-", $nombre);
    $nombre = str_ireplace("/", "-", $nombre);
    $nombre = str_ireplace("#", "-", $nombre);
    $nombre = str_ireplace("$", "-", $nombre);
    $nombre = str_ireplace("%", "-", $nombre);
    $nombre = str_ireplace("&", "-", $nombre);
    $nombre = str_ireplace("(", "-", $nombre);
    $nombre = str_ireplace(")", "-", $nombre);
    $nombre = str_ireplace("=", "-", $nombre);
    $nombre = str_ireplace("?", "-", $nombre);
    $nombre = str_ireplace("¡", "-", $nombre);
    $nombre = str_ireplace("!", "-", $nombre);
    $nombre = str_ireplace("¿", "-", $nombre);
    $nombre = str_ireplace("'", "-", $nombre);
    $nombre = str_ireplace("´", "-", $nombre);
    $nombre = str_ireplace("+", "-", $nombre);
    $nombre = str_ireplace("*", "-", $nombre);
    //añadir fecha y hora para que no se repita el nombre
    $fecha = new DateTime();
    return $fecha->getTimestamp() . "-" . strtolower($nombre);
}

function paginadorTablas($pagina, $numero_paginas, $url, $botones)
{
    $table = '<nav class="pagination is-centered" role="navigation" aria-label="pagination">';
    if ($pagina <= 1) {
        $table .= '<a class="pagination-previous  is-disabled" disabled>Anterior</a>
                       <ul class="pagination-list">';
    } else {
        $table .= '
        <a href="' . $url . ($pagina - 1) . '" class="pagination - previous">Anterior</a>
        <ul class="pagination - list">
            <li><a href="' . $url . '1" class="pagination-link" aria-label="Goto page 1">1</a></li>
            <li><span class="pagination-ellipsis">&hellip;</span></li>
        ';
    }

    $ci = 0;
    for ($i = $pagina; $i <= $numero_paginas; $i++) {
        if ($ci >= $botones) {
            break;
        }
        if ($pagina == $i) {
            $table .= '
                    <li><a href="' . $url . $i . '" class="pagination-link is-current" aria-label="Goto page 1">' . $i . '</a></li>
            ';
        } else {
            $table .= '
                    <li><a href="' . $url . $i . '" class="pagination-link" aria-label="Goto page 1">' . $i . '</a></li>
            ';
        }
        $ci++;
    }

    if ($pagina == $numero_paginas) {
        $table .= '
            </ul>
                <a  class="pagination-next is-disabled" disabled >Siguiente</a>
        ';
    } else {
        $table .=
            '
                <li><span class="pagination-ellipsis">&hellip;</span></li>
                <li><a href="' . $url . $numero_paginas . '" class="pagination-link" aria-label="Goto page 86">' . $numero_paginas . '</a></li>
            </ul>  
            <a  class="pagination-next" href="' . $url . ($pagina + 1) . '"  >Siguiente</a>
            ';
    }
    $table .= '</nav>';
    return $table;
}
