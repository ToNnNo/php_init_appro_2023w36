<?php
require_once '../../helper/form_helper.php';
require_once '../../helper/request.php';
require_once '../../helper/response.php';
require_once '../../helper/session.php';
require_once '../../helper/bdd.php';

$id = query('id');

if (preg_match("/\d+/", $id) === 0) {
    http_response_code(404);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $token = request('token');
    $btn = request('btn');

    if (!$token || $token == $_SESSION[TOKEN]) {

        if ($btn == "remove") {
            $c = connection();

            $sql = "DELETE FROM livre WHERE id = " . mysqli_real_escape_string($c, $id);
            mysqli_query($c, $sql);

            create_message_flash('success', "Le livre a bien été supprimé");
        }

    } else {
        create_message_flash('error', "Le token n'est pas valide");
    }

    redirect("/formation_php_2023w36/bibliotheque/livre/");
}

require '../header.php' ?>

<h2>Supprimer un livre</h2>

<p>Etes vous sur de vouloir supprimer ce livre ?</p>

<form method="post" action="">
    <input type="hidden" name="token" value="<?php echo csrf_token() ?>"/>

    <button name="btn" class="btn btn-outline-primary" value="remove">Oui</button>
    <button name="btn" class="btn btn-outline-secondary">Non</button>
</form>


<?php require '../footer.php' ?>
