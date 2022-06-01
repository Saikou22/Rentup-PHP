<?php include_once('./include/functions.php') ?>

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
        $id_property= htmlentities($_POST["id_property"]);
        $image = htmlentities($_FILES["image"]["name"]);

        modifyProperty($name, $street, $city, $postale_code, $state, $country, $property_type_id, $status, $price, $seller_id, $image, $id_property);

        fileUpload();

        getProperty();
        
        header('Location: ./index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet">
    <title>Modification des propriétés</title>
</head>
<body>
<section class="section-home-form">

    <br/><br/><br/><br/><br/><br/><br/>
    <div class="container section-home-content">
        <header class="section-header">
            <h2>Property Listed & Seller </h2>
        </header>

        <br/><br/>
        <form enctype="multipart/form-data" action="modify.php?" method="POST">
            <table class="table table-striped table-white">

                <tbody>
                    <tr>
                        <td>
                            <?php foreach (getPropertyById() as $Propertybyid) : ?>
                                <input type="hidden" name="id_property" value="<?php echo $Propertybyid['id_property']; ?>">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $Propertybyid["name"]; ?>" placeholder="Entrez le nom">
                            <input type="text" class="form-control" id="street" name="street" value="<?php echo $Propertybyid["street"]; ?>">
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $Propertybyid["city"]; ?>">
                            <input type="text" class="form-control" id="postale_code" name="postale_code" value="<?php echo $Propertybyid["postale_code"]; ?>">
                            <input type="text" class="form-control" id="state" name="state"value="<?php echo $Propertybyid["state"]; ?>">
                            <input type="text" class="form-control" id="country" name="country" value="<?php echo $Propertybyid["country"]; ?>">
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $Propertybyid["price"]; ?>">
                            <input type="text" class="form-control" id="status" name="status" value="<?php echo $Propertybyid["status"]; ?>">
                            <input type="text" class="form-control" id="property_type_id" name="property_type_id"value="<?php echo $Propertybyid["property_type_id"] ?>">
                            <input type="text" class="form-control" id="seller_id" name="seller_id" value="<?php echo $Propertybyid["seller_id"]; ?>">
                            <input type="text" class="form-control" id="image" name="image" value="<?php echo  $Propertybyid["image"]; ?>">
                                <div class="col-md-3 mb-3">
                                    <label for="formFile" class="form-label">Veuillez insérer une photo de la propriété</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
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