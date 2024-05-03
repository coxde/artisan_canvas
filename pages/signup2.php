<?php include "../php/server.php"; ?>

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

        <title>Sign up - Artisan Canvas</title>
    </head>
    <body>
        <main>
            <section class="section-login-grid">
                <div class="container login__grid">
                    <div class="container login__logo">
                        <a href="../index.php">
                            <picture>
                                <!-- Credit: https://www.flaticon.com/free-icon/canvas_3419350 -->
                                <source
                                    srcset="../img/logo.webp"
                                    type="image/webp"
                                />
                                <img
                                    class="logo__img"
                                    src="img/logo.png"
                                    width="48px"
                                    height="48px"
                                    alt="The logo of Artisan Canvas."
                                    loading="lazy"
                                />
                            </picture>
                        </a>
                    </div>

                    <div class="container login__box">
                        <form action="signup2.php" method="POST">
                            <div>
                                <label for="name">Your Full Name</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    required
                                />
                            </div>

                            <?php $role = $_SESSION["role"]; ?>
                            <?php if ($role == "Customer"): ?>
                                <div>
                                    <label for="address">Your Address</label>
                                    <input
                                        type="text"
                                        id="address"
                                        name="address"
                                        required
                                    />
                                </div>

                            <?php elseif ($role == "Artist"): ?>
                                <div>
                                    <label for="portfolio">Your Portfolio URL</label>
                                    <input
                                        type="text"
                                        id="portfolio"
                                        name="portfolio"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="bio">Your Bio</label>
                                    <textarea
                                        id="bio"
                                        name="bio"
                                        required
                                    ></textarea>
                                </div>

                            <?php elseif ($role == "Supplier"): ?>
                                <div>
                                    <label for="address">Your Address</label>
                                    <input
                                        type="text"
                                        id="address"
                                        name="address"
                                        required
                                    />
                                </div>

                                <div>
                                    <label for="website">Your Website URL</label>
                                    <input
                                        type="text"
                                        id="website"
                                        name="website"
                                        required
                                    />
                                </div>
                            <?php endif; ?>

                            <div class="login__submit">
                                <?php include "../php/error.php"; ?>
                                
                                <input
                                    class="btn btn--light"
                                    name="reg_user_2"
                                    type="submit"
                                    value="Complete Signup"
                                />
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>
