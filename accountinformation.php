<?php
// session_start();
include 'includes/accountinformation.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="accountinformation.css" />
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="votepage.css" />

</head>

<body>
    <img src="Images/background.png" class="backgroundimg" />
    <div class="hero">


        <?php
        include "includes/navigation.php";
        ?>
        <div class="page_content">
            <div class="acc_image">
                <p>hello</p>
            </div>

            <div class="acc_info">
                <form action="" method="POST">
                    <div class="info_box_details">
                        <!-- <?php if (isset($_GET['update'])) {
                                    echo '<div class="modal" id="modal" style="display:block">
                   <div class="modal-content" id="alertBox" >
                       <span class ="close" id="close" onclick="closeConfirm()" >&times;</span>
                       <h3>Voting limit reached</h3>
                   </div>
                    </div>';
                                } ?> -->
                        <h1 style="color: aliceblue">Details</h1>
                        <div style="display: flex; flex-direction: row; margin-top: 20px">
                            <div class="input_box">
                                <div style="flex: 0.2; display: flex">
                                    <label>First Name</label>
                                </div>
                                <div style="flex: 0.8; display: flex">
                                    <input type="text" style="width: 50%" name="firstName" value="<?php echo $uFirstname ?>" required />
                                </div>
                            </div>
                            <div class="input_box">
                                <div style="flex: 0.2; display: flex">
                                    <label>Last Name</label>
                                </div>
                                <div style="flex: 0.8; display: flex">
                                    <input type="text" style="width: 50%" name="lastName" value="<?php echo $uLastname ?>" required />
                                </div>
                            </div>
                        </div>

                        <div style="display: flex; flex-direction: row; margin-top: 20px">
                            <div class="input_box">
                                <div style="flex: 0.2; display: flex">
                                    <label>Date of Birth</label>
                                </div>
                                <div style="flex: 0.8; display: flex">
                                    <input type="text" style="width: 50%" name="doB" value="<?php echo $dob ?>" required />
                                </div>
                            </div>
                            <div class="input_box">
                                <div style="flex: 0.2; display: flex">
                                    <label>Country</label>
                                </div>
                                <div style="flex: 0.8; display: flex">
                                    <input type="text" style="width: 50%" name="Country" value="<?php echo $country ?>" required />
                                </div>
                            </div>
                        </div>

                        <div style="display: flex; flex-direction: row; margin-top: 20px">
                            <div class="input_box">
                                <div style="flex: 0.2; display: flex">
                                    <label>Email</label>
                                </div>
                                <div style="flex: 0.8; display: flex">
                                    <input type="email" style="width: 90%" name="eMail" value="<?php echo $uEmail ?>" required />
                                </div>
                            </div>
                            <div class="input_box"></div>
                        </div>
                        <div style="display: flex; margin-top: 30px; justify-content: end">
                            <button type="submit" class="save_button" name="saveChanges">Save Changes</button>
                        </div>
                    </div>
                </form>
                <form action="" method="POST">
                    <div class="info_box_pass">
                        <h1 style="color: aliceblue">Change password</h1>
                        <div style="display: flex; flex-direction: column; margin-top: 20px">
                            <div class="input_box input_box_password">
                                <div style="flex: 0.2; display: flex">
                                    <label>Current Password</label>
                                </div>
                                <div style="flex: 0.8; display: flex">
                                    <input type="password" name="currentPassword" style="width: 50%" required />
                                </div>
                            </div>
                            <div class="input_box input_box_password">
                                <div style="flex: 0.2; display: flex">
                                    <label>New Password</label>
                                </div>
                                <div style="flex: 0.8; display: flex">
                                    <input type="password" name="newPassword" style="width: 50%" required />
                                </div>
                            </div>
                            <div class="input_box input_box_password">
                                <div style="flex: 0.2; display: flex">
                                    <label>Confirm New Password</label>
                                </div>
                                <div style="flex: 0.8; display: flex">
                                    <input type="password" name="confirmPassword" style="width: 50%" required />
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; margin-top: 30px; justify-content: end">
                            <button type="submit" class="save_button" name="changePassword">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src="votepage.js"></script>
</body>

</html>