<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

// require() ou include() permet d'importer un fichier dans un autre
require './validator/validators.php';
require './helper/form_helper.php';

/*echo "<pre>";
print_r($_SERVER);*/

/**
 * $errors = ['firstname' => ['le champs est obligatoire', 'le champs ne doit pas contenir de valeur numérique'] ]
 */
$errors = [];
$success_message = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // condition ternaire => (conditions) ? si vrai : si faux
    /**
     * $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : null;
     *
     * if(isset($_POST['firstname'])) {
     *     $firstname = trim($_POST['firstname']);
     * } else {
     *     $firstname = null;
     * }
     */

    // isset() permet de savoir si une variable existe
    // trim() retire les espaces inutiles au debut et à la fin de la chaine de caractère
    $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : null;
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;

    $file = $_FILES['file'] ?? null; //isset($_FILES['file']) ? $_FILES['file'] : null;

    // champs obligatoire, vérifier que le nom + prenom soit des lettres uniquement, verifier adresse email
    if (!notBlank($firstname)) {
        $errors['firstname'][] = "Le prénom est obligatoire";
    }

    if (!validName($firstname)) {
        $errors['firstname'][] = "Le prénom ne peut contenir les valeurs de 0 à 9";
    }

    if (!notBlank($lastname)) {
        $errors['lastname'][] = "Le nom est obligatoire";
    }

    if (!validName($lastname)) {
        $errors['lastname'][] = "Le nom ne peut contenir les valeurs de 0 à 9";
    }

    if (!notBlank($email)) {
        $errors['email'][] = "L'adresse email est obligatoire";
    }

    if (!validEmail($email)) {
        $errors['email'][] = "L'adresse email n'est pas valide";
    }

    // valider fichier par le type + taille + error
    if (!fileNotBlank($file)) {
        $errors['file'][] = "Le fichier est obligatoire";
    }

    if(!validFileSize($file)) {
        $errors['file'][] = "La taille du fichier dépasse la taille autorisée";
    }

    $mimes = ['application/pdf', 'image/jpeg', 'image/png'];

    if(!validFileType($file, $mimes)) {
        $errors['file'][] = "Ce type de fichier n'est pas autorisé";
    }

    // afficher les valeurs
    if (count($errors) == 0) {
        $success_message = sprintf(
            "<p class='text-success'>L'utilisateur %s %s (email: %s) a bien été enregistré</p>",
            $firstname, $lastname, $email
        );

        // renommer le fichier
        $original_filename = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        $new_filename = $original_filename.uniqid().".".$extension;

        // déplacer dans un répertoire
        $path = __DIR__.DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."download".DIRECTORY_SEPARATOR.$new_filename;

        move_uploaded_file($file['tmp_name'], $path);
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"/>
    <title>Formulaire</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <h1>Formulaire</h1>
    </header>
    <main>

        <?php echo $success_message; ?>

        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" /> <!-- en octet -->
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom: </label>
                <input type="text" class="form-control" id="firstname" name="firstname"
                       placeholder="Saisissez un prénom" value="<?php echo $firstname ?? null ?>"/>
                <?php echo form_errors('firstname', $errors); ?>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom: </label>
                <input type="text" class="form-control" id="lastname" name="lastname"
                       placeholder="Saisissez un nom" value="<?php echo $lastname ?? null ?>"/>
                <?php echo form_errors('lastname', $errors); ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email: </label>
                <input type="text" class="form-control" id="email" name="email"
                       placeholder="Saisissez un email" value="<?php echo $email ?? null ?>"/>
                <?php echo form_errors('email', $errors); ?>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Fichier: </label>
                <input type="file" class="form-control" id="file" name="file"/>
                <?php echo form_errors('file', $errors); ?>
            </div>

            <button class="btn btn-outline-primary">Enregistrer</button>
        </form>
    </main>
    <footer class="mt-3">
        <hr />
        <p class="small text-center">Formation PHP init + appro - Dawan FOAD - Septembre 2023</p>
    </footer>
</div>
</body>
</html>
