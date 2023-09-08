<?php
require_once '../../helper/request.php';
require_once '../../helper/bdd.php';

$id = query('id');

if (preg_match("/\d+/", $id) === 0) {
    http_response_code(404);
    exit;
}

$c = connection();

$sql = "SELECT titre, resume, date_parution FROM livre WHERE id = " . mysqli_real_escape_string($c, $id);
$livre = mysqli_fetch_assoc(mysqli_query($c, $sql));

$fmt = datefmt_create('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);

if (!$livre) {
    http_response_code(404);
    exit;
}

require '../header.php' ?>

<h2><?php echo htmlentities($livre['titre']) ?></h2>

<?php if ($livre['date_parution'] != null): ?>
    <p class="small">
        <b>Date de parution:</b> <?php echo datefmt_format($fmt, date_create($livre['date_parution'])); ?>
    </p>
<?php endif; ?>

<div>
    <?php echo htmlentities($livre['resume']) ?>
</div>


<?php require '../footer.php' ?>
