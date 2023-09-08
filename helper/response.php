<?php

function redirect($url)
{
    // Http 302 (FOUND) - redirection temporaire
    header('Location: '.$url, true, 302);
    exit();
}
