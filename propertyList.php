<?php include_once('./include/functions.php') ?>
<?php include_once('./include/header.php') ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet">
    <title>Liste des propriétés</title>
</head>
<body>
<br/>
<section class="section-home-form">
    <div class="container section-home-content">
        <br/><br/>
        <table class="table">
            <thead class="thead-green">
                <tr>
                    <th scope="col">Property name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Create_at</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Seller</th>
                    <th scope="col">update</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach (getSellerProperties() as $propertyLists) : ?>
            <tr>
                <th scope="row"><?= $propertyLists['name']; ?></th>
                <td><?= $propertyLists['street'] . " " . $propertyLists['city'] . " " . $propertyLists['postale_code'] . " " . $propertyLists['country'] ?></td>
                <td><?= $propertyLists['create_at']; ?></td>
                <td>$<?= $propertyLists['price']; ?></td>
                <td><?= $propertyLists['status']; ?></td>
                <td><?= $propertyLists['firstname'] . " " . $propertyLists['lastname']; ?></td>
                <td class="table-success"><a href="modify.php?id=<?= $propertyLists["id_property"]; ?>" class="btn btn-warning"> Modifier la propriété </a></td>
                <?php endforeach; ?>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<?php include_once('./include/footer.php') ?>
<?php include_once('./include/nav.footer.php') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="dist/app.js"></script>


</body>

</html>

</body>
</html>