<!DOCTYPE html>
<html>
<head>
    <!-- Login User Authentication -->
    <meta charset="utf-8"/>
    <title>Login System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/w3.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="<?php echo base_url('asset/css/open-iconic.min.css') ?>">
    <script src="<?php echo base_url('asset/js/jquery.min.js') ?>"></script>
</head>
<body style="width:320px;margin:50px auto 20px auto;background-color:#eee;">

    <p class="w3-center"><img width="80" src="<?php echo base_url('asset/images/ci-logo-big.png') ?>"/></p>
    <div class="w3-panel w3-leftbar w3-border-grey w3-white"><?php echo $pesan ?></div>
    <div class="w3-card w3-white w3-text-grey">
        <div class="w3-container" style="padding: 25px;">
            <form method="post">
                <p>
                    <label>Username</label>
                    <input type="text" name="username" class="w3-input w3-border" required/>
                </p>
                <p>
                    <label>Password</label>
                    <input type="password" name="password" class="w3-input w3-border" required/>
                </p>
                <p>
                    <button type="submit" formaction="<?php echo site_url('auth/signin') ?>" class="w3-button w3-block w3-blue">Login</button>
                </p>
            </form>
        </div>
    </div>
    <div class="w3-row-padding w3-text-grey" style="margin-top:20px;">
        <div class="w3-col m5 l5 s12">
            <a href="<?php echo site_url('auth/register') ?>" style="text-decoration:none;">Register</a>
        </div>
        <div class="w3-col m7 l7 s12 w3-right">
            <a href="<?php echo site_url('auth/lostpassword') ?>" style="text-decoration:none;">Lost your password?</a>
        </div>
    </div>

</body>
</html>