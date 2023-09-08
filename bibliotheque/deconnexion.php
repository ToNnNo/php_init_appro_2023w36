<?php
session_start();

require_once '../helper/response.php';

session_destroy();

redirect("/formation_php_2023w36/bibliotheque/");
