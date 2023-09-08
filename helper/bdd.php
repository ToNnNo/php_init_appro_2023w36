<?php

const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = 'root';
const DATABASE = 'biblio_2023w36';
const PORT = 8889; // 3306

function connection() {
    $c = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE, PORT);

    if(mysqli_connect_errno()) {
        emergency(mysqli_connect_error(), ['file' => __FILE__, "line" => __LINE__]);
        trigger_error(mysqli_connect_error(), E_USER_ERROR);
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return $c;
}
