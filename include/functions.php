<?php

function connectDatabase()
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=rentup;charset=utf8', 'root', 'root');
        return $db;
    } catch (Exception $e) {
        die ('Erreur : ' . $e->getMessage());
    }
}

//3 - Rendre dynamique le bloc des types de propriété (Property Types)
function getPropertyTypes()
{

    $db = connectDatabase();
    $sqlQuery = 'SELECT * FROM PropertyType';
    $PropertyTypeStatement = $db->prepare($sqlQuery);
    $PropertyTypeStatement->execute();

    return $PropertyTypeStatement->fetchAll();
}

//4 – Rendre dynamique le bloc des propriétés récentes (les 3 dernières)

function getRecentProperty()
{

    $db = connectDatabase();
    $sqlQuery = 'SELECT property.*, PropertyType.name AS propertyName
    FROM property 
    INNER JOIN PropertyType ON property.property_type_id = PropertyType.id_property_type
    WHERE property.status <> \'Sold\'
    ORDER BY create_at DESC
    LIMIT 3';
    $propertyStatement = $db->prepare($sqlQuery);
    $propertyStatement->execute();

    return $propertyStatement->fetchAll();
}

function getProperty()
{
    $db = connectDatabase();
    $query = 'SELECT property.*,propertyType.name AS propertyName
    FROM property
    INNER JOIN propertyType ON property.property_type_id = Propertytype.id_property_type
    WHERE property.status <> \'Sold\'
    ORDER BY create_at DESC
    LIMIT 3';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll();
}


// 5 – Rendre l’affichage du bloc des agents dynamique (afficher le nombre de propriétés par agent)


function getSellers(): array
{

    $db = connectDatabase();
    $sqlQuery = 'SELECT * FROM seller';
    $sellerStatement = $db->prepare($sqlQuery);
    $sellerStatement->execute();

    return $sellerStatement->fetchAll();

}

function getNbrProperty($id): int
{
    $db = connectDatabase();

    $sqlQuery = 'SELECT COUNT(*) FROM property WHERE seller_id =' . $id;

    $propertyStatement = $db->prepare($sqlQuery);
    $propertyStatement->execute();

    return $propertyStatement->fetchColumn();
}


// Page avec la liste de toutes les propriétés (et le vendeur associé)

/*function getSellerProperties($id_seller): array {
    $db = connectDatabase();
    $sqlQuery = 'SELECT *
    FROM property
    WHERE seller_id ='.$id_seller;
    $sellerStatement = $db->prepare($sqlQuery);
    $sellerStatement->execute();
    $result = $sellerStatement->fetchAll();
    return $result;
}*/

function getSellerProperties(): array
{
    $db = connectDatabase();

    $sqlQuery = 'SELECT *
    FROM property, seller
    WHERE seller_id =id_seller';

    $sellerStatement = $db->prepare($sqlQuery);
    $sellerStatement->execute();
    return $sellerStatement->fetchAll();

}

// Ajouter une nouvelle propriété
function createNewProperty($name, $street, $city, $postale_code, $state, $country, $property_type_id, $status, $price, $seller_id, $image)


{
    $db = connectDatabase();
    $sqlQuery = "INSERT INTO property (name, street, city, postale_code, state, country, price, status, property_type_id, seller_id, image) 
    VALUES (:name, :street, :city, :postal_code, :state, :country, :price, :status, :property_type_id, :seller_id, :image)";

    $propertyStatement = $db->prepare($sqlQuery);

    return $propertyStatement->execute([
        'name' => $name,
        'street' => $street,
        'city' => $city,
        'postal_code' => $postale_code,
        'state' => $state,
        'country' => $country,
        'price' => $price,
        'status' => $status,
        'property_type_id' => $property_type_id,
        'seller_id' => $seller_id,
        'image' => $image,
    ]);
}

// Telecharger l'image
function fileUpload()
{
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }


    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}

// Modification des propriétés
function modifyProperty($name, $street, $city, $postale_code, $state, $country, $property_type_id, $status, $price, $seller_id, $image, $id_property)

{
    $db = connectDatabase();
    $sqlQuery = "UPDATE property SET
          name = :name,
          street = :street,
          city = :city,
          postal_code = :postale_code,
          state = :state,
          country = :country,
          price = :price,
          status = :status,
          property_type_id = property_type_id,
          seller_id = :seller_id,
          image = :image 
          WHERE id_property = :id_property";

    $propertyStatement = $db->prepare($sqlQuery);

    return $propertyStatement->execute([
        'name' => $name,
        'street' => $street,
        'city' => $city,
        'postal_code' => $postale_code,
        'state' => $state,
        'country' => $country,
        'price' => $price,
        'status' => $status,
        'property_type_id' => $property_type_id,
        'seller_id' => $seller_id,
        'image' => $image,
        'id_property' => $id_property
    ]);
}

function getPropertyById()
{
    $db = connectDatabase();
    $sqlQuery = "SELECT property.*,propertyType.name AS propertyName
    FROM property
    INNER JOIN PropertyType ON property.property_type_id = Propertytype.id_property_type
    WHERE id_property = ? ";
    $propertyStatement = $db->prepare($sqlQuery);
    $propertyStatement->execute([
        $_GET["id"]
    ]);
    return
        $propertyStatement->fetchAll();

}