<?php include_once('./include/functions.php') ?>
<?php include_once('./index.php') ?>


<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentUp - Home</title>
</head>

<body>
<!-- https://themezhub.net/rentup-live/rentup/home-3.html -->

<?php include_once('./include/header.php') ?>

<main>

    <section class="section-home">
        <div class="container section-home-content">
            <h1>Search Your Next Home</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis porro doloremque consequuntur,
                error incidunt, sed natus qui temporibus eius alias nemo beatae explicabo sint ratione consequatur.
                Deleniti minus vero quas.</p>
        </div>
    </section>

    <section class="section section-bg-grey">
        <div class="container">

            <header class="section-header">
                <h2>Featured Property Types</h2>
                <p>Find All Type of Property.</p>
            </header>

            <div class="property-type-list">
                <?php foreach (getPropertyTypes() as $propertyTypes) : ?>
                    <article class="card">
                        <div class="icon">
                            <i class="<?= $propertyTypes['picto'] ?>"></i>
                        </div>
                        <h3><?= $propertyTypes['name'] ?></h3>
                        <p> <?= $propertyTypes['value'] ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

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
                <?php foreach (getRecentProperty() as $recentProperties) : ?>
                    <article class="card">
                        <div class="card-img-container">
                            <img src="images/<?= $recentProperties['image'] ?>" alt="<?= $recentProperties['name'] ?>">

                        </div>
                        <div class="card-content">
                            <header class="card-content-header">

                                <?php if ($recentProperties["status"] === "for Rent") : ?>
                                    <div class='badge badge-warning'> <?= htmlentities($recentProperties['status']) ?> </div>
                                <?php elseif ($recentProperties["status"] === "For Sale") : ?>
                                    <div class='badge badge-primary'> <?= htmlentities($recentProperties['status']) ?> </div>
                                <?php else: ?>
                                    <div class="badge badge-success"> <?= htmlentities($recentProperties['status']) ?></div>
                                <?php endif ?>

                            </header>
                            <h3><?= htmlentities($recentProperties['name']) ?></h3>
                            <p>
                                <i class="fa fa-map-marker"></i>
                                <?= htmlentities($recentProperties['street']) ?>
                                <?= htmlentities($recentProperties['city']) ?>
                                <?= htmlentities($recentProperties['postale_code']) ?>
                                <?= htmlentities($recentProperties['state']) ?>,
                                <?= htmlentities($recentProperties['country']) ?>
                            </p>
                        </div>
                        <footer class="card-footer">
                            <div>
                                <div class="btn btn-primary">
                                    $<?= htmlentities($recentProperties['price']) ?>
                                </div>
                                <span>/sqft</span>
                            </div>
                            <div><?= htmlentities($recentProperties['propertyName']) ?></div>
                        </footer>
                    </article>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <section class="section">
        <div class="container">
            <header class="section-header">
                <h2>Explore By Location</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi animi amet incidunt ad,
                    ut et quisquam eveniet tenetur asperiores ipsum obcaecati doloremque cupiditate totam deserunt
                    officia quia atque nam.</p>
            </header>
            <div class="city-list">
                <div class="city-list-item">
                    <div class="city-bg-grey"></div>
                    <h3 class="city-list-title">New Orleans, Louisiana</h3>
                    <div class="city-list-infos">
                        <span>12 Villas</span>
                        <span>10 Apartments</span>
                        <span>07 Offices</span>
                    </div>
                </div>
                <div class="city-list-item">
                    <div class="city-bg-grey"></div>
                    <h3 class="city-list-title">Jerrsy, United State</h3>
                    <div class="city-list-infos">
                        <span>12 Villas</span>
                        <span>10 Apartments</span>
                        <span>07 Offices</span>
                    </div>
                </div>
                <div class="city-list-item">
                    <div class="city-bg-grey"></div>
                    <h3 class="city-list-title">Liverpool, London</h3>
                    <div class="city-list-infos">
                        <span>12 Villas</span>
                        <span>10 Apartments</span>
                        <span>07 Offices</span>
                    </div>
                </div>
                <div class="city-list-item">
                    <div class="city-bg-grey"></div>
                    <h3 class="city-list-title">New York, United States</h3>
                    <div class="city-list-infos">
                        <span>12 Villas</span>
                        <span>10 Apartments</span>
                        <span>07 Offices</span>
                    </div>
                </div>
                <div class="city-list-item">
                    <div class="city-bg-grey"></div>
                    <h3 class="city-list-title">Montreal, Canada</h3>
                    <div class="city-list-infos">
                        <span>12 Villas</span>
                        <span>10 Apartments</span>
                        <span>07 Offices</span>
                    </div>
                </div>
                <div class="city-list-item">
                    <div class="city-bg-grey"></div>
                    <h3 class="city-list-title">California, USA</h3>
                    <div class="city-list-infos">
                        <span>12 Villas</span>
                        <span>10 Apartments</span>
                        <span>07 Offices</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <header class="section-header">
                <h2>Our Featured Agents</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi animi amet incidunt ad,
                    ut et quisquam eveniet tenetur asperiores ipsum obcaecati doloremque cupiditate totam deserunt
                    officia quia atque nam.</p>
            </header>
            <div class="agents-list">
                <?php foreach (getSellers() as $sellers) : ?>
                    <article class="card">
                        <div class="card-img-container">
                            <div class="badge">
                                <?php echo(getNbrProperty($sellers['id_seller'])) ?>
                            </div>
                            <div class="agent-img">
                                <span>
                                    <img class="check" src="./images/verified.svg" alt="">
                                </span>
                                <img class="agent-photo" src="<?= $sellers['profil_picture'] ?>" alt="portrait-agent-2">
                            </div>
                            <div class="agent-localisation">
                                <i class="fa fa-map-marker"></i> <?= $sellers['location'] ?>
                            </div>
                            <div class="agent-name">
                                <h3><?= $sellers['firstname'] ?> <?= $sellers['lastname'] ?></h3>
                            </div>
                            <div class="agent-contact">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i id="facebook" class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i id="linkedin" class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i id="instagram" class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i id="twitter" class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <footer class="card-footer">
                                <div class="btn btn-primary">
                                    <i class="fa fa-envelope-o"></i>
                                    Message
                                </div>
                                <div class="btn btn-secondary">
                                    <i class="fa fa-phone"></i>
                                </div>
                            </footer>
                        </div>
                    </article>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <section class="section section-pre-footer section-bg-green">
        <div class="container">
            <article class="pre-footer-text">
                <h2>Do You Have Questions ?</h2>
                <p>We help you to grow your career and growth.</p>
            </article>
            <div class="btn btn-pre-footer">
                <a href="contact.html">
                    Contact Us Today
                </a>
            </div>
        </div>
    </section>

</main>

<?php include_once('./include/footer.php') ?>
<?php include_once('./include/nav.footer.php') ?>
<script src="dist/app.js"></script>
</body>

</html>