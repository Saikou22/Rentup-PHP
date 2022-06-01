<?php include_once('./include/functions.php') ?>
<?php include_once('./include/header.php') ?>

<?php

if (!empty($_POST)) {
    if (
        isset($_POST["name"], $_POST["street"], $_POST["city"], $_POST["postale_code"], $_POST["state"], $_POST["country"], $_POST["price"], $_POST["status"], $_POST["property_type_id"], $_POST["seller_id"], $_FILES["image"])
        && !empty($_POST["name"])
        && !empty($_POST["street"])
        && !empty($_POST["city"])
        && !empty($_POST["postale_code"])
        && !empty($_POST["state"])
        && !empty($_POST["country"])
        && !empty($_POST["price"])
        && !empty($_POST["status"])
        && !empty($_POST["property_type_id"])
        && !empty($_POST["seller_id"])
        && !empty($_FILES["image"])
    ) {
        
        $name = htmlentities($_POST["name"]);
        $street = htmlentities($_POST["street"]);
        $city = htmlentities($_POST["city"]);
        $postale_code = htmlentities($_POST["postale_code"]);
        $state = htmlentities($_POST["state"]);
        $country = htmlentities($_POST["country"]);
        $price = htmlentities($_POST["price"]);
        $status = htmlentities($_POST["status"]);
        $property_type_id = htmlentities($_POST["property_type_id"]);
        $seller_id = htmlentities($_POST["seller_id"]);
        $image = htmlentities($_FILES["image"]["name"]);

        // Rappel de la function create property

        createNewProperty($name, $street, $city, $postale_code, $state, $country, $property_type_id, $status, $price, $seller_id, $image);

        // Rappel de la function upload image

        fileUpload();

        header('Location: ./index.php');

        // Si le formulaire est incomplet, afficher le message d'erreur

    } else {
        die("Le formulaire est incomplet");
    }
}


?>

<?php

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de création & modification de propriétés</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet">
</head>

<body>
<main>
    <br/><br/><br/><br/><br/><br/><br/>
    <section class="section-home">
        <div class="container section-home-content">
            <h2> Ajouter une propriété </h2>
            <form enctype="multipart/form-data" action="#" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">street</label>
                    <input type="text" class="form-control" id="street" name="street">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">city</label>
                    <input type="text" class="form-control" id="city" name="city">
                </div>

                <div class="col-md-2">
                    <label for="inputZip" class="form-label">postale_code</label>
                    <label for="postale-code"></label>
                    <input type="text" class="form-control" id="postale-code" name="postale_code">
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">state</label>
                    <input type="text" class="form-control" id="state" name="state">
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">country</label>
                    <input type="text" class="form-control" id="country" name="country">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>

                <div class="mb-3">

                    <div class="form-group">
                        <label for="seller" class="form-label">sellect status of property </label>
                        <label>
                            <select class="form-select" name="status" required>
                                <option value="For Sale">For Sale</option>
                                <option value="For Rent">For Rent</option>
                                <option value="Sold">Sold</option>
                            </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="seller" class="form-label">sellect type of property </label>
                    <label>
                        <select class="form-select" name="property_type_id" required>
                            <option selected> select type of property</option>
                            <?php foreach (getPropertyTypes() as $propertyTypes) : ?>
                                <option value="<?= $propertyTypes['id_property_type']; ?>"> <?= ($propertyTypes['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div class="mb-3">
                    <label for="seller" class="form-label">sellect Seller </label>
                    <label>
                        <select class="form-select" name="seller_id" required>
                            <option selected> select Seller</option>
                            <?php foreach (getSellers() as $sellers) : ?>
                                <option value="<?= $sellers['id_seller']; ?>"> <?= $sellers['firstname'] ?> <?= $sellers['lastname'] ?></option>
                            <?php endforeach; ?>

                        </select>
                    </label>
                </div>

                <div class="mb-3">
                    <label for="file" name="image">Enregister votre image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </section>
</main>

<?php include_once('./include/footer.php') ?>
<?php include_once('./include/nav.footer.php') ?>

<script src="dist/app.js"></script>
</body>
</html>