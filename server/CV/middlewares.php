<?php
include 'services.php';
function showCvMiddleware($cvs)
{
    foreach ($cvs as $cv) {
        showCV($cv);
    }
}
