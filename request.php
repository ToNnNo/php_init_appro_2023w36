<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"/>
    <title>Paramètre de requête</title>
</head>
<body>
<div class="container-fluid">
    <header>
        <h1>Paramètre de requête ($_GET)</h1>
    </header>
    <main>
        <p>Dans une url les paramètres de requête s'utilise après le symbole "?"</p>
        <p>Ex: http://www.monsite.fr/index.php?page=1</p>

        <p>Si on souhaite utiliser plusieurs paramètres dans l'url, on les sépare avec le symbole "&"</p>
        <p>Ex: http://www.monsite.fr/index.php?page=1&sort=asc</p>

        <p>
            <a href="request.php?name=john">Saluer John</a>
        </p>

        <?php
        if (isset($_GET['name'])) {
            $html = "<p>Bonjour ".htmlentities($_GET['name']);
            if(isset($_GET['lastname'])) {
                $html .= " ".htmlentities($_GET['lastname']);
            }
            $html .= "</p>";

            echo $html;
        }
        ?>

    </main>
    <footer class="mt-3">
        <hr/>
        <p class="small text-center">Formation PHP init + appro - Dawan FOAD - Septembre 2023</p>
    </footer>
</div>
</body>
</html>
