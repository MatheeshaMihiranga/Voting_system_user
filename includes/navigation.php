<nav>
    <div class="topImageView">
        <img src="Images/logo-no-background.png" class="logo"/>
    </div>
    <ul class="topTabView">
        <li><a href="index.php">Home</a></li>
        <li><a href="Galleryuserview.php">Gallery</a></li>
        <li>
            <a href="#">Voting</a>
            <div class="dropdown">
                <div style="display: flex;flex-direction: column;">
                    <div style="display: flex;flex: 1;margin-top: 5px;" class=hoverd>
                        <a <?php

                            if (isset($_SESSION['email'])) {

                                echo "href='http://localhost/votingsystem/votepage.php?eventID='>";
                            } else {

                                echo "href='http://localhost/votingsystem/login.php?eventID='>";
                            }
                            ?> Vote </a>
                    </div>

                    <div style="display: flex;flex: 1;margin-top: 5px;">
                        <a href="Eventschedule.php">Event schedule</a>
                    </div>
                    <div style="display: flex;flex: 1;margin-top: 5px;">
                        <a href="Resultable.php?eventID=">Result</a>
                    </div>
                </div>
            </div>
        </li>
        <li><a href="FaQs.php">FAQ</a></li>
        <li><a href="about.php">About Us</a></li>
    </ul>
    <div class="topRightButton">

        <?php

        if (isset($_SESSION['email'])) {

            echo "<a style='text-decoration: none; color:black;' href='http://localhost/votingsystem/accountinformation.php'><button class='signup'>Account Info</button></a>";
            echo "<a  href='http://localhost/votingsystem/includes/logout.inc.php'><button class='signup' style='border: none;
                    padding: 12px 20px;
                    border-radius: 30px;
                    color: rgb(0, 0, 0);
                    font-weight: bold;
                    font-size: 15px;
                    margin-left: 14px;
                    transition: .4s;'>Log Out</button></a>";
        } else {

            echo "<a style='text-decoration: none; color:black;' href='http://localhost/votingsystem/signup.php'><button class='signup'>Sign Up</button></a>";
            echo "<a style='text-decoration: none; color:black;' href='http://localhost/votingsystem/login.php'><button class='signup' style='border: none;
                    padding: 12px 20px;
                    border-radius: 30px;
                    color: rgb(0, 0, 0);
                    font-weight: bold;
                    font-size: 15px;
                    margin-left: 14px;
                    transition: .4s;'>Log In</a>";
        }

        ?>
    </div>
</nav>