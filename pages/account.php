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

        <title>Account - Artisan Canvas</title>
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
                            <a class="nav-list__item" href="blog.php">Blog</a>
                        </li>
                        <li>
                            <a class="nav-list__item" href="#">Account</a>
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
            <section class="section-account-title">
                <div class="container grid">
                    <span class="subheading">Account</span>
                    <h2 class="heading--secondary account__heading">
                        <?php if (isset($_SESSION["logged_in"])) {
                            // Get Name
                            $user_id = $_SESSION["user_id"];
                            $role = $_SESSION["role"];
                            if ($role == "Customer") {
                                $query = "SELECT Name FROM Customer WHERE UserID = '$user_id'";
                            } elseif ($role == "Artist") {
                                $query = "SELECT Name FROM Artist WHERE UserID = '$user_id'";
                            } elseif ($role == "Supplier") {
                                $query = "SELECT Name FROM Supplier WHERE UserID = '$user_id'";
                            }
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                            $name = $row["Name"];
                            $name_arr = explode(" ", $name);
                            echo "Welcome, {$name_arr[0]}!";
                        } else {
                            echo "Welcome";
                        } ?>
                    </h2>
                </div>
            </section>

            <section class="section-account-grid">
                <div class="container grid account__grid grid--center-v">
                    <div class="account__details">
                        <h2 class="account__title">Account Details</h2>
                        <div class="account__username">
                            <h3>Username:</h3>
                            <?php if (isset($_SESSION["logged_in"])) {
                                echo "<p>{$_SESSION["username"]}</p>";
                            } ?>
                        </div>
                        <div class="account__name">
                            <h3>Full Name:</h3>
                            <?php if (isset($_SESSION["logged_in"])) {
                                echo "<p>{$name}</p>";
                            } ?>
                        </div>
                        <div class="account__type">
                            <h3>Account Type:</h3>
                            <?php if (isset($_SESSION["logged_in"])) {
                                echo "<p>{$_SESSION["role"]}</p>";
                            } ?>
                        </div>
                    </div>

                    <div class="account__address-info">
                        <?php if ($role == "Customer"): ?>
                            <h2 class="account__title">Address Information</h2>
                            <?php if (isset($_SESSION["logged_in"])) {
                                // Get Address
                                $user_id = $_SESSION["user_id"];
                                $query = "SELECT Address FROM Customer WHERE UserID = '$user_id'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                $address = $row["Address"];
                                $address_arr = explode(",", $address);
                            } ?>
                            <div class="account__address-street">
                                <h3>Street Address:</h3>
                                <?php echo "<p>{$address_arr[0]}</p>"; ?>
                            </div>
                            <div class="account__address-city">
                                <h3>City:</h3>
                                <?php echo "<p>{$address_arr[1]}</p>"; ?>
                            </div>
                            <div class="account__address-state">
                                <h3>State:</h3>
                                <?php echo "<p>{$address_arr[2]}</p>"; ?>
                            </div>
                            <div class="account__address-code">
                                <h3>Postal Code:</h3>
                                <?php echo "<p>{$address_arr[3]}</p>"; ?>
                            </div>

                        <?php elseif ($role == "Artist"): ?>
                            <h2 class="account__title">Artist Information</h2>
                            <div class="account__address-street">
                                <h3>Portfolio:</h3>
                                <?php if (isset($_SESSION["logged_in"])) {
                                    $user_id = $_SESSION["user_id"];
                                    $query = "SELECT PortfolioURL FROM Artist WHERE UserID = '$user_id'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $portfolio = $row["PortfolioURL"];
                                    echo "<a href='{$portfolio}'>{$portfolio}</a>";
                                } ?>
                            </div>
                            <div class="account__address-street">
                                <h3>Bio:</h3>
                                <?php if (isset($_SESSION["logged_in"])) {
                                    $user_id = $_SESSION["user_id"];
                                    $query = "SELECT Bio FROM Artist WHERE UserID = '$user_id'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $bio = $row["Bio"];
                                    echo "<p>{$bio}</p>";
                                } ?>
                            </div>

                        <?php elseif ($role == "Supplier"): ?>
                            <h2 class="account__title">Supplier Information</h2>
                            <div class="account__address-street">
                                <h3>Address:</h3>
                                <?php if (isset($_SESSION["logged_in"])) {
                                    $user_id = $_SESSION["user_id"];
                                    $query = "SELECT Address FROM Supplier WHERE UserID = '$user_id'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $address = $row["Address"];
                                    echo "<p>{$address}</p>";
                                } ?>
                            </div>
                            <div class="account__address-street">
                                <h3>Website:</h3>
                                <?php if (isset($_SESSION["logged_in"])) {
                                    $user_id = $_SESSION["user_id"];
                                    $query = "SELECT WebsiteURL FROM Supplier WHERE UserID = '$user_id'";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $website = $row["WebsiteURL"];
                                    echo "<a href='{$website}'>{$website}</a>";
                                } ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ($role == "Customer"): ?>
                    <div class="account__payment-info">
                        <h2 class="account__title">
                            Payment Information (Processed by Stripe)
                        </h2>
                        <div class="account__payment-id">
                            <h3>Payment ID:</h3>
                            <?php if (isset($_SESSION["logged_in"])) {
                                // Get Payment
                                $user_id = $_SESSION["user_id"];
                                $query = "SELECT Payment FROM Customer WHERE UserID = '$user_id'";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                $payment = $row["Payment"];
                                echo "<p>{$payment}</p>";
                            } ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="account__btn">
                        <form action="account.php" method="POST">
                            <input 
                                class="btn btn--outline btn--logout text--center"
                                name="logout"
                                type="submit"
                                value="Log out"
                            />
                        </form>
                        <!-- <button class="btn btn--light text--center">
                            Edit Info
                        </button> -->
                        <a
                            class="btn btn--light text--center"
                            href="../pages/under_construction.html"
                            >Edit Info</a
                        >
                    </div>

                    <?php if ($role == "Customer"): ?>
                    <div class="account__order-history">
                        <h2 class="account__title">Order History</h2>
                        <table class="account__order-history-table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php
                            $user_id = $_SESSION["user_id"];
                            $result = mysqli_query(
                                $conn,
                                "SELECT CustomerID FROM Customer WHERE UserID = '$user_id'"
                            );
                            $row = mysqli_fetch_assoc($result);
                            $customer_id = $row["CustomerID"];
                            $result2 = mysqli_query(
                                $conn,
                                "SELECT * FROM `Order` WHERE CustomerID = '$customer_id'"
                            );

                            echo "<tbody>";
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                echo "<tr>";
                                echo "<td>" . $row2["OrderID"] . "</td>";
                                echo "<td>" . $row2["OrderDate"] . "</td>";
                                echo "<td>" . "NULL" . "</td>";
                                echo "<td>" . $row2["Status"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            ?>
                        </table>
                    </div>
                    <?php endif; ?>
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
