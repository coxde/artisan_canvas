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

        <link rel="manifest" href="../manifest.json" />
        <link rel="icon" href="../img/icon/favicon.ico" sizes="any" />
        <link rel="apple-touch-icon" href="../img/icon/apple-touch-icon.png" />

        <link rel="stylesheet" href="../css/general.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/queries.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
            rel="stylesheet"
        />

        <title>Blog - Artisan Canvas</title>
    </head>
    <body>
        <header class="header">
            <div class="header--blank"></div>
            <div class="header--container">
                <div class="logo">
                    <picture>
                        <!-- Credit: https://www.flaticon.com/free-icon/canvas_3419350 -->
                        <source srcset="../img/logo.webp" type="image/webp" />
                        <img
                            class="logo__img"
                            src="../img/logo.png"
                            width="48px"
                            height="48px"
                            alt="The logo of Artisan Canvas."
                            loading="lazy"
                        />
                    </picture>
                    <a class="logo__text" href="../index.php"
                        >Artisan Canvas</a
                    >
                </div>

                <nav class="navigation">
                    <ul class="nav-list">
                        <li>
                            <a class="nav-list__item" href="../index.php"
                                >Home</a
                            >
                        </li>
                        <li>
                            <a class="nav-list__item" href="#">Blog</a>
                        </li>
                        <li>
                            <?php if (isset($_SESSION["logged_in"])): ?>
                            <a class="nav-list__item" href="../pages/account.php"
                                >Account</a
                            >
                            <?php else: ?>
                            <a class="nav-list__item" href="../pages/login.php"
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
                                href="../pages/cart.html"
                                >Your Cart</a
                            >
                            <?php elseif (isset($_SESSION["logged_in"])): ?>
                            <a
                                class="nav-list__item btn--small text--center"
                                href="../pages/under_construction.html"
                                >Manage</a
                            >
                            <?php else: ?>
                            <a
                                class="nav-list__item btn--small text--center"
                                href="../pages/login.php"
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
            <section class="section-blog-title">
                <div class="container grid">
                    <span class="subheading">Blog</span>
                    <h2 class="heading--secondary blog__heading">
                        Our Latest News
                    </h2>
                    <aside class="blog__description">
                        Explore the art world with us. Our blog features artist
                        spotlights and behind-the-scenes stories of art. Stay
                        updated on the latest trends and innovations in the art
                        world.
                    </aside>
                </div>
            </section>

            <section class="section-blog-grid">
                <div
                    class="container grid blog__grid grid--3-cols grid--center-v"
                >
                    <a class="link--box" href="#">
                        <div class="blog__box">
                            <picture>
                                <!-- Credit: https://unsplash.com/photos/low-angle-photography-of-drop-lights-NDLLFxTELrU -->
                                <source
                                    srcset="
                                        ../img/blog/skye-studios-NDLLFxTELrU-unsplash.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="blog__img"
                                    src="../img/blog/skye-studios-NDLLFxTELrU-unsplash.jpg"
                                    alt="A photo of light bulbs"
                                    loading="lazy"
                                />
                            </picture>

                            <div class="blog__info-box text--center">
                                <div class="blog__meta">
                                    <div class="blog__meta-author">
                                        <ion-icon
                                            class="blog__icon"
                                            name="person-circle-outline"
                                        ></ion-icon
                                        >Emily Chen
                                    </div>
                                    <div class="blog__meta-date">
                                        <ion-icon
                                            name="calendar-clear-outline"
                                        ></ion-icon
                                        >10 Feb, 2024
                                    </div>
                                </div>
                                <h3 class="blog__title heading--tertiary">
                                    The Art of Personalisation: How Custom
                                    Artwork Can Elevate Your Space
                                </h3>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="#">
                        <div class="blog__box">
                            <picture>
                                <!-- Credit: https://unsplash.com/photos/grayscale-photo-of-a-woman-drawing-a-flowers-Rb_wkrNoMnA -->
                                <source
                                    srcset="
                                        ../img/blog/goashape-studio-Rb_wkrNoMnA-unsplash.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="blog__img"
                                    src="../img/blog/goashape-studio-Rb_wkrNoMnA-unsplash.jpg"
                                    alt="A photo of Maria Rodriguez"
                                    loading="lazy"
                                />
                            </picture>

                            <div class="blog__info-box text--center">
                                <div class="blog__meta">
                                    <div class="blog__meta-author">
                                        <ion-icon
                                            class="blog__icon"
                                            name="person-circle-outline"
                                        ></ion-icon
                                        >David Lee
                                    </div>
                                    <div class="blog__meta-date">
                                        <ion-icon
                                            name="calendar-clear-outline"
                                        ></ion-icon
                                        >3 Jan, 2024
                                    </div>
                                </div>
                                <h3 class="blog__title heading--tertiary">
                                    Behind the Brush: An Exclusive Interview
                                    with Artist Maria Rodriguez
                                </h3>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="#"
                        ><div class="blog__box">
                            <picture>
                                <!-- Credit: https://unsplash.com/photos/brown-paint-brushes-on-assorted-color-paint-palette-A2OL6S9zB7o -->
                                <source
                                    srcset="
                                        ../img/blog/steve-johnson-A2OL6S9zB7o-unsplash.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="blog__img"
                                    src="../img/blog/steve-johnson-A2OL6S9zB7o-unsplash.jpg"
                                    alt="A photo of a colorful palette"
                                    loading="lazy"
                                />
                            </picture>

                            <div class="blog__info-box text--center">
                                <div class="blog__meta">
                                    <div class="blog__meta-author">
                                        <ion-icon
                                            class="blog__icon"
                                            name="person-circle-outline"
                                        ></ion-icon
                                        >Sophia Patel
                                    </div>
                                    <div class="blog__meta-date">
                                        <ion-icon
                                            name="calendar-clear-outline"
                                        ></ion-icon
                                        >15 Nov, 2023
                                    </div>
                                </div>
                                <h3 class="blog__title heading--tertiary">
                                    Color Psychology: How Artworks Can Influence
                                    Your Mood
                                </h3>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="#">
                        <div class="blog__box">
                            <picture>
                                <!-- Credit: https://unsplash.com/photos/a-multicolored-abstract-background-with-wavy-shapes-KamUyOCH3iE -->
                                <source
                                    srcset="
                                        ../img/blog/vackground-com-KamUyOCH3iE-unsplash.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="blog__img"
                                    src="../img/blog/vackground-com-KamUyOCH3iE-unsplash.jpg"
                                    alt="A illustration of abstract fluid"
                                    loading="lazy"
                                />
                            </picture>

                            <div class="blog__info-box text--center">
                                <div class="blog__meta">
                                    <div class="blog__meta-author">
                                        <ion-icon
                                            class="blog__icon"
                                            name="person-circle-outline"
                                        ></ion-icon
                                        >James Kim
                                    </div>
                                    <div class="blog__meta-date">
                                        <ion-icon
                                            name="calendar-clear-outline"
                                        ></ion-icon
                                        >10 Nov, 2023
                                    </div>
                                </div>
                                <h3 class="blog__title heading--tertiary">
                                    The Evolution of Art: How Technology is
                                    Changing the Game
                                </h3>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="#">
                        <div class="blog__box">
                            <picture>
                                <!-- Credit: https://unsplash.com/photos/empty-closed-room-Tac8FvqAnEw -->
                                <source
                                    srcset="
                                        ../img/blog/joseph-morris-Tac8FvqAnEw-unsplash.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="blog__img"
                                    src="../img/blog/joseph-morris-Tac8FvqAnEw-unsplash.jpg"
                                    alt="A photo of a empty art studio"
                                    loading="lazy"
                                />
                            </picture>

                            <div class="blog__info-box text--center">
                                <div class="blog__meta">
                                    <div class="blog__meta-author">
                                        <ion-icon
                                            class="blog__icon"
                                            name="person-circle-outline"
                                        ></ion-icon
                                        >Rachel Hall
                                    </div>
                                    <div class="blog__meta-date">
                                        <ion-icon
                                            name="calendar-clear-outline"
                                        ></ion-icon
                                        >4 Oct, 2023
                                    </div>
                                </div>
                                <h3 class="blog__title heading--tertiary">
                                    Collaboration: How Customers and Artists Can
                                    Work Together
                                </h3>
                            </div>
                        </div></a
                    >

                    <a class="link--box" href="#">
                        <div class="blog__box">
                            <picture>
                                <!-- Credit: https://unsplash.com/photos/brown-wooden-framed-white-padded-chairs-KSfe2Z4REEM -->
                                <source
                                    srcset="
                                        ../img/blog/spacejoy-KSfe2Z4REEM-unsplash.jpg
                                    "
                                    type="image/webp"
                                />
                                <img
                                    class="blog__img"
                                    src="../img/blog/spacejoy-KSfe2Z4REEM-unsplash.jpg"
                                    alt="A photo of a group of wooden framed prints in a living room"
                                    loading="lazy"
                                />
                            </picture>

                            <div class="blog__info-box text--center">
                                <div class="blog__meta">
                                    <div class="blog__meta-author">
                                        <ion-icon
                                            class="blog__icon"
                                            name="person-circle-outline"
                                        ></ion-icon
                                        >Olivia Brown
                                    </div>
                                    <div class="blog__meta-date">
                                        <ion-icon
                                            name="calendar-clear-outline"
                                        ></ion-icon
                                        >26 Sept, 2023
                                    </div>
                                </div>
                                <h3 class="blog__title heading--tertiary">
                                    Decorating with Artwork: Tips and Tricks for
                                    a Stylish Home
                                </h3>
                            </div>
                        </div></a
                    >
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
                            <source
                                srcset="../img/logo.webp"
                                type="image/webp"
                            />
                            <img
                                class="logo__img"
                                src="../img/logo.png"
                                width="48px"
                                height="48px"
                                alt="The logo of Artisan Canvas."
                                loading="lazy"
                            />
                        </picture>
                        <a class="logo__text" href="../index.php"
                            >Artisan Canvas</a
                        >
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
                            <a class="footer__link" href="../pages/blog.php"
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

        <script defer src="../js/script.js"></script>
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
