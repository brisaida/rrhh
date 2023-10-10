<?php
if (extension_loaded('gd') && function_exists('gd_info')) {
    echo "GD está habilitado en tu servidor.";
} else {
    echo "GD no está habilitado en tu servidor.";
}
?>