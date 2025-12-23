<?php
function mensajePlantilla(string $titulo, string $parrafo)
{
    echo "
<div style='
        border: 1px solid #e5e7eb;
        padding: 15px;
        border-radius: 8px;
        background-color: #f9fafb;
        margin-bottom: 15px;
    '>
    <h3 style='color:#2563eb; margin-top:0;'>{$titulo}</h3>
    <p style='color:#374151; margin:0;'>{$parrafo}</p>
</div>
";
}
