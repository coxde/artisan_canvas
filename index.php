<?php session_start(); ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
            name="description"
            content="At Artisan Canvas, you can explore unique and personalized artwork created by talented artists, tailored to your individual style and preferences. Discover handcrafted masterpieces and bespoke art pieces that reflect your personality."
        />

        <link rel="manifest" href="manifest.json" />
        <link rel="icon" href="img/icon/favicon.ico" sizes="any" />
        <link rel="apple-touch-icon" href="img/icon/apple-touch-icon.png" />

        <link rel="stylesheet" href="css/general.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/queries.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
            rel="stylesheet"
        />

        <title>Artisan Canvas: Your Custom Artwork Shop</title>
    </head>
    <body>
        <header class="header">
            <div class="header--blank"></div>
            <div class="header--container">
                <div class="logo">
                    <picture>
                        <!-- Credit: https://www.flaticon.com/free-icon/canvas_3419350 -->
                        <source srcset="img/logo.webp" type="image/webp" />
                        <img
                            class="logo__img"
                            src="img/logo.png"
                            width="48px"
                            height="48px"
                            alt="The logo of Artisan Canvas."
                            loading="lazy"
                        />
                    </picture>
                    <a class="logo__text" href="#">Artisan Canvas</a>
                </div>

                <nav class="navigation">
                    <ul class="nav-list">
                        <li><a class="nav-list__item" href="#">Home</a></li>
                        <li>
                            <a class="nav-list__item" href="pages/blog.php"
                                >Blog</a
                            >
                        </li>
                        <li>
                            <?php if (isset($_SESSION["logged_in"])): ?>
                            <a class="nav-list__item" href="pages/account.php"
                                >Account</a
                            >
                            <?php else: ?>
                            <a class="nav-list__item" href="pages/login.php"
                                >Account</a
                            >
                            <?php endif; ?>
                        </li>
                        <li>
                            <?php
                            $role = $_SESSION["role"];
                            if (
                                isset($_SESSION["logged_in"]) &&
                                $role == "Customer"
                            ): ?>
                            <a
                                class="nav-list__item btn--small text--center"
                                href="pages/cart.html"
                                >Your Cart</a
                            >
                            <?php elseif (isset($_SESSION["logged_in"])): ?>
                            <a
                                class="nav-list__item btn--small text--center"
                                href="pages/under_construction.html"
                                >Manage</a
                            >
                            <?php else: ?>
                            <a
                                class="nav-list__item btn--small text--center"
                                href="pages/login.php"
                                >Log in</a
                            >
                            <?php endif;
                            ?>
                        </li>
                    </ul>
                </nav>

                <button class="btn-mobile-nav">
                    <ion-icon
                        class="icon-mobile-nav"
                        name="menu-outline"
                    ></ion-icon>
                    <ion-icon
                        class="icon-mobile-nav"
                        name="close-outline"
                    ></ion-icon>
                </button>
            </div>
            <div class="header--blank"></div>
        </header>

        <main>
            <section class="section-hero">
                <div class="hero">
                    <div class="hero__text-box">
                        <h1
                            class="heading--primary text--primary-darker text--center"
                        >
                            Discover Your Unique
                            <span class="text--primary">Artistic</span>
                            Expression
                        </h1>

                        <p
                            class="hero__description text--primary-darker text--center"
                        >
                            Explore our exclusive collection of custom artwork
                            by talented artists, and discover a piece that tells
                            your story.
                        </p>

                        <div class="hero__btn">
                        <?php if (
                            isset($_SESSION["logged_in"]) &&
                            $role == "Customer"
                        ): ?>
                            <a
                                class="btn btn--outline text--center"
                                href="pages/cart.html"
                                >Your Cart</a
                            >
                            <?php elseif (isset($_SESSION["logged_in"])): ?>
                            <a
                                class="btn btn--outline text--center"
                                href="pages/under_construction.html"
                                >Manage</a
                            >
                            <?php else: ?>
                            <a
                                class="btn btn--outline text--center"
                                href="pages/login.php"
                                >Login</a
                            >
                            <?php endif; ?>

                            <a
                                class="btn btn--full text--center"
                                href="#products"
                                >Find more &darr;</a
                            >
                        </div>
                    </div>

                    <div class="hero__img-box">
                        <picture>
                            <!-- Credit: https://unsplash.com/photos/assorted-color-framed-paintings-on-the-wall-KuudDjBHIlA -->
                            <source srcset="img/hero.webp" type="image/webp" />
                            <img
                                class="hero__img"
                                src="img/hero.jpg"
                                alt="A wall display of framed artwork and decorative plants, 
                                serving as the main image of the hero section."
                            />
                        </picture>
                    </div>
                </div>
            </section>

            <!-- Credit: https://fineartamerica.com/ -->
            <section class="section-products" id="products">
                <div class="container">
                    <span class="subheading">Products</span>
                    <h2 class="heading--secondary text--primary-darker">
                        Check Our Latest Artwork
                    </h2>
                </div>

                <div
                    class="container grid products__grid grid--3-cols grid--center-v"
                >
                    <a class="link--box" href="pages/product.html">
                        <div class="products__box">
                            <picture>
                                <!-- TODO -->
                                <source
                                    srcset="
                                        img/product/afternoon-aspen-grove-gary-kim.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="products__img"
                                    src="img/product/afternoon-aspen-grove-gary-kim.jpg"
                                    alt="A framed prints. A scenic landscape with a forest of tall white aspen trees."
                                    loading="lazy"
                                />
                            </picture>

                            <div class="products__info-box text--center">
                                <h3 class="products__title heading--tertiary">
                                    Afternoon Aspen Grove <br />
                                    Framed Print
                                </h3>
                                <div class="products__meta">
                                    <div class="products__meta-author">
                                        Gary Kim
                                    </div>
                                    <div class="products__meta-price">98 €</div>
                                </div>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="pages/product.html">
                        <div class="products__box">
                            <picture>
                                <!-- TODO -->
                                <source
                                    srcset="
                                        img/product/sunrise-in-lake-placid-magda-bognar.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="products__img"
                                    src="img/product/sunrise-in-lake-placid-magda-bognar.jpg"
                                    alt="A framed prints. A serene landscape scene featuring a misty lake surrounded by autumnal trees."
                                    loading="lazy"
                                />
                            </picture>

                            <div class="products__info-box text--center">
                                <h3 class="products__title heading--tertiary">
                                    Sunrise Boat <br />
                                    Framed Print
                                </h3>
                                <div class="products__meta">
                                    <div class="products__meta-author">
                                        Magda Bognar
                                    </div>
                                    <div class="products__meta-price">
                                        104 €
                                    </div>
                                </div>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="pages/product.html">
                        <div class="products__box">
                            <picture>
                                <!-- TODO -->
                                <source
                                    srcset="
                                        img/product/within-jennifer-lommers.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="products__img"
                                    src="img/product/within-jennifer-lommers.jpg"
                                    alt="A framed prints. A colorful, abstract painting depicting a whimsical field of vibrant flowers and foliage."
                                    loading="lazy"
                                />
                            </picture>

                            <div class="products__info-box text--center">
                                <h3 class="products__title heading--tertiary">
                                    Within <br />
                                    Framed Print
                                </h3>
                                <div class="products__meta">
                                    <div class="products__meta-author">
                                        Jennifer Lommers
                                    </div>
                                    <div class="products__meta-price">82 €</div>
                                </div>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="pages/product.html">
                        <div class="products__box">
                            <picture>
                                <!-- TODO -->
                                <source
                                    srcset="
                                        img/product/la-porta-rossa-sulla-salita-guido-borelli.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="products__img"
                                    src="img/product/la-porta-rossa-sulla-salita-guido-borelli.jpg"
                                    alt="A puzzle. A colorful and charming alleyway, filled with vibrant flowers, potted plants, and traditional architecture."
                                    loading="lazy"
                                />
                            </picture>

                            <div class="products__info-box text--center">
                                <h3 class="products__title heading--tertiary">
                                    La Porta Rossa Sulla Salita <br />
                                    Puzzle
                                </h3>
                                <div class="products__meta">
                                    <div class="products__meta-author">
                                        Guido Borelli
                                    </div>
                                    <div class="products__meta-price">55 €</div>
                                </div>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="pages/product.html">
                        <div class="products__box">
                            <picture>
                                <!-- TODO -->
                                <source
                                    srcset="
                                        img/product/limitless-scott-norris.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="products__img"
                                    src="img/product/limitless-scott-norris.jpg"
                                    alt="A puzzle. A serene image of a tranquil, rippling water surface against a gray, cloudy sky."
                                    loading="lazy"
                                />
                            </picture>

                            <div class="products__info-box text--center">
                                <h3 class="products__title heading--tertiary">
                                    Limitless <br />
                                    Puzzle
                                </h3>
                                <div class="products__meta">
                                    <div class="products__meta-author">
                                        Scott Norris
                                    </div>
                                    <div class="products__meta-price">40 €</div>
                                </div>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="pages/product.html">
                        <div class="products__box">
                            <picture>
                                <!-- TODO -->
                                <source
                                    srcset="
                                        img/product/la-collina-dei-papaveri-guido-borelli.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="products__img"
                                    src="img/product/la-collina-dei-papaveri-guido-borelli.jpg"
                                    alt="A puzzle. A colorful landscape painting depicting a field of vibrant orange flowers and trees."
                                    loading="lazy"
                                />
                            </picture>

                            <div class="products__info-box text--center">
                                <h3 class="products__title heading--tertiary">
                                    La Collina Dei Papaveri <br />
                                    Puzzle
                                </h3>
                                <div class="products__meta">
                                    <div class="products__meta-author">
                                        Guido Borelli
                                    </div>
                                    <div class="products__meta-price">55 €</div>
                                </div>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="pages/product.html">
                        <div class="products__box">
                            <picture>
                                <!-- TODO -->
                                <source
                                    srcset="
                                        img/product/mission-beach-san-diego-mary-helmreich.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="products__img"
                                    src="img/product/mission-beach-san-diego-mary-helmreich.jpg"
                                    alt="A poster. A scenic coastal landscape with a sandy beach and palm trees."
                                    loading="lazy"
                                />
                            </picture>

                            <div class="products__info-box text--center">
                                <h3 class="products__title heading--tertiary">
                                    Mission Beach San Diego <br />
                                    Puzzle
                                </h3>
                                <div class="products__meta">
                                    <div class="products__meta-author">
                                        Mary Helmreich
                                    </div>
                                    <div class="products__meta-price">28 €</div>
                                </div>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="pages/product.html">
                        <div class="products__box">
                            <picture>
                                <!-- TODO -->
                                <source
                                    srcset="
                                        img/product/musical-instruments-map-of-the-world-map-michael-tompsett.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="products__img"
                                    src="img/product/musical-instruments-map-of-the-world-map-michael-tompsett.jpg"
                                    alt="A poster. A world map composed of various musical instruments."
                                    loading="lazy"
                                />
                            </picture>

                            <div class="products__info-box text--center">
                                <h3 class="products__title heading--tertiary">
                                    Musical Instruments Map <br />
                                    Poster
                                </h3>
                                <div class="products__meta">
                                    <div class="products__meta-author">
                                        Michael Tompsett
                                    </div>
                                    <div class="products__meta-price">23 €</div>
                                </div>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="pages/product.html">
                        <div class="products__box">
                            <picture>
                                <!-- TODO -->
                                <source
                                    srcset="img/product/design-your-own-you.jpg"
                                    type="image/webp"
                                />
                                <img
                                    class="products__img"
                                    src="img/product/design-your-own-you.jpg"
                                    alt="Design Your Own."
                                    loading="lazy"
                                />
                            </picture>

                            <div class="products__info-box text--center">
                                <h3 class="products__title heading--tertiary">
                                    Design Your Own <br />
                                    Artwork
                                </h3>
                                <div class="products__meta">
                                    <div class="products__meta-author">You</div>
                                    <div class="products__meta-price">
                                        From 15 €
                                    </div>
                                </div>
                            </div>
                        </div></a
                    >
                </div>
            </section>

            <section class="section-features" id="features">
                <div class="container grid grid--center-h text--center">
                    <span class="subheading">Features</span>
                    <h2 class="heading--secondary feature__heading">
                        We Offer the Best to You
                    </h2>
                </div>

                <div class="container grid grid--4-cols">
                    <div class="feature">
                        <ion-icon
                            class="feature__icon"
                            name="options-outline"
                        ></ion-icon>
                        <p class="feature__title">Customised Artwork</p>
                        <p class="feature__text">
                            Our interactive tools allows you to upload images to
                            create a unique piece of art that reflects yourself.
                        </p>
                    </div>
                    <div class="feature">
                        <ion-icon
                            class="feature__icon"
                            name="color-palette-outline"
                        ></ion-icon>
                        <p class="feature__title">Talented Artists</p>
                        <p class="feature__text">
                            Discover the talent of our carefully curated
                            artists, each with their own unique style and
                            expertise.
                        </p>
                    </div>
                    <div class="feature">
                        <ion-icon
                            class="feature__icon"
                            name="card-outline"
                        ></ion-icon>
                        <p class="feature__title">Affordable Service</p>
                        <p class="feature__text">
                            With a range of options and free delivery, you can
                            buy artworks without breaking the bank.
                        </p>
                    </div>
                    <div class="feature">
                        <ion-icon
                            class="feature__icon"
                            name="people-outline"
                        ></ion-icon>
                        <p class="feature__title">Unparalleled Support</p>
                        <p class="feature__text">
                            Professional customer support with our dedicated
                            team, available to assist you with any questions.
                        </p>
                    </div>
                </div>
            </section>

            <section class="section-cta" id="cta">
                <div class="container">
                    <div class="cta">
                        <div class="cta__text-box text--primary-darker">
                            <h2 class="heading--secondary">
                                Stay Inspired with Newsletter!
                            </h2>
                            <p class="cta__text">
                                Subscribe to our newsletter and get exclusive
                                access to our latest custom artwork, artist
                                features, and blog updates. Stay ahead of the
                                artistic curve and be the first to know.
                            </p>

                            <form class="cta__form" action="#">
                                <div>
                                    <label for="full-name">Full Name</label>
                                    <input
                                        id="full-name"
                                        type="text"
                                        placeholder="John Smith"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="email">Email address</label>
                                    <input
                                        id="email"
                                        type="email"
                                        placeholder="me@example.com"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="select-where"
                                        >What do you want to hear?</label
                                    >
                                    <select id="select-where" required>
                                        <option value="">
                                            Please choose one option
                                        </option>
                                        <option value="all">All of them</option>
                                        <option value="artwork">
                                            Latest artwork
                                        </option>
                                        <option value="artist">
                                            Artist features
                                        </option>
                                        <option value="blog">
                                            Blog updates
                                        </option>
                                    </select>
                                </div>

                                <button class="btn btn--dark">Subscribe</button>
                            </form>
                        </div>

                        <div
                            class="cta__img-box"
                            role="img"
                            aria-label="A table topped with different color samples and a Mac"
                        ></div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="container grid grid--footer">
                <div class="logo-col">
                    <div class="logo">
                        <picture>
                            <!-- Credit: https://www.flaticon.com/free-icon/canvas_3419350 -->
                            <source srcset="img/logo.webp" type="image/webp" />
                            <img
                                class="logo__img"
                                src="img/logo.png"
                                width="48px"
                                height="48px"
                                alt="The logo of Artisan Canvas."
                                loading="lazy"
                            />
                        </picture>
                        <a class="logo__text" href="#">Artisan Canvas</a>
                    </div>

                    <ul class="social-links">
                        <li>
                            <a
                                class="footer__link"
                                href="#"
                                aria-label="A Instagram logo"
                                ><ion-icon
                                    class="social-icon"
                                    name="logo-instagram"
                                ></ion-icon
                            ></a>
                        </li>
                        <li>
                            <a
                                class="footer__link"
                                href="#"
                                aria-label="A TikTok logo"
                                ><ion-icon
                                    class="social-icon"
                                    name="logo-tiktok"
                                ></ion-icon
                            ></a>
                        </li>
                        <li>
                            <a
                                class="footer__link"
                                href="#"
                                aria-label="A Facebook logo"
                                ><ion-icon
                                    class="social-icon"
                                    name="logo-facebook"
                                ></ion-icon
                            ></a>
                        </li>
                        <li>
                            <a
                                class="footer__link"
                                href="#"
                                aria-label="A linkedin logo"
                                ><ion-icon
                                    class="social-icon"
                                    name="logo-linkedin"
                                ></ion-icon
                            ></a>
                        </li>
                    </ul>

                    <p class="copyright">
                        Copyright &copy; <span class="year">2027</span> by
                        Artisan Canvas. All rights reserved.
                    </p>
                </div>

                <div class="address-col">
                    <p class="footer__heading">Contact Us</p>
                    <address class="contacts">
                        <p class="address">
                            42 College St, Cork City, Cork, T04 WT51
                        </p>
                        <p>
                            <a class="footer__link" href="tel:019-728-323"
                                >019-728-323</a
                            ><br />
                            <a
                                class="footer__link"
                                href="mailto:hello@artisancanvas.com"
                                >hello@artisancanvas.com
                            </a>
                        </p>
                    </address>
                </div>

                <nav class="nav-col">
                    <p class="footer__heading">Customer</p>
                    <ul class="footer__nav">
                        <li>
                            <a class="footer__link" href="#">Account</a>
                        </li>
                        <li>
                            <a class="footer__link" href="#">Cart</a>
                        </li>
                        <li>
                            <a class="footer__link" href="#"
                                >Customer Support</a
                            >
                        </li>
                    </ul>
                </nav>

                <nav class="nav-col">
                    <p class="footer__heading">Company</p>
                    <ul class="footer__nav">
                        <li>
                            <a class="footer__link" href="#">About Us</a>
                        </li>
                        <li>
                            <a class="footer__link" href="pages/blog.php"
                                >Blog</a
                            >
                        </li>
                        <li><a class="footer__link" href="#">Careers</a></li>
                    </ul>
                </nav>

                <nav class="nav-col">
                    <p class="footer__heading">Resources</p>
                    <ul class="footer__nav">
                        <li>
                            <a class="footer__link" href="#">Newsletter</a>
                        </li>
                        <li>
                            <a class="footer__link" href="#">Help Center</a>
                        </li>
                        <li>
                            <a class="footer__link" href="#">Privacy & Terms</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </footer>

        <script defer src="js/script.js"></script>
        <script
            type="module"
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
        ></script>
        <script
            nomodule
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
        ></script>
    </body>
</html>
