<?php include_once('./include/functions.php') ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
    <title></title>
</head>

<body>

<?php include_once('./include/header.php') ?>

<section class="section">
    <div class="container">

        <header class="section-header">
            <h2>Recent Property Listed</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi animi amet incidunt ad,
                ut et quisquam eveniet tenetur asperiores ipsum obcaecati doloremque cupiditate totam deserunt
                officia quia atque nam.
            </p>
        </header>

        <div class="property-list">
            
            <?php foreach (getSellerProperties(3) as $sellerProperty) : ?>

                <?php foreach (getPropertiesWithSeller() as $idProperties) :; ?>
                    <tr>

                    <th scope="row"><?= $idProperties['name']; ?></th>
                    <td><?= $idProperties['street']." ". $idProperties['city']." ".$idProperties['postal_code']." ".$idProperties['country']?></td>
                    <td><?= $idProperties['price']; ?></td>
                    <td><?= $idProperties['status']; ?></td>
                    <td><?= $idProperties['create_time']; ?></td>
                    <td><?= $idProperties['first_name']." ".$idProperties['last_name']; ?></td>
                <?php endforeach; ?>
                </tr>

            <?php endforeach; ?>

        </div>

    </div>
</section>

<?php include_once('./include/footer.php') ?>

<nav class="section section-bg-dark-grey footer-bottom">
    <span>© 2022 RentUP. Designd By DWWM - Barry S.</span>
</nav>

<aside class="back-to-top">
    <a class="btn back-to-top" href="#">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </a>
</aside>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="dist/app.js"></script>


</body>

</html>
