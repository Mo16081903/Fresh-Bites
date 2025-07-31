<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial scale=1">
        <title>Fresh Bites</title>
        <style type="text/css">

            .form{
                position: fixed;
                top: 15%;
                left: 50%;
                padding: 30px;
                background-color: rgba(143, 89, 45, 0.69);
                width: 20%;
                place-items: left;
            }

            .container {
                padding: 16px;
                border: 2px solid #ccc;
            }

            .form input{
                display: block;
                padding: 10px;
                margin: 5px;
            }

            .loginbutton{
                background-color: lavender;
                width: 40%;
                padding: 5px;
            }

            .textarea {
                width: 20%;
                height: 100%;
                padding: 5px;
            }

            body{
                background-image: url('image_1.jpeg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }

        </style>
    </head>

    <body>
        <form class="form" action="register.php" method="post">
            Enter Your Email:<input  type="text" name="name" required>
            Enter Your Email:<input  type="email" name="email" required>
            Enter Your Password:<input type="password" name="password" required>
            Enter Your Address: <input type="textarea" name="address" required>
            Enter Your Phone Number:<input  type="text" name="Phone" required>
            <input class="loginbutton" type="submit" name="submit" value="Sign Up">
            <p>Have an account? <a href= "login.php">Login</a>
        </p>
        </form>
        

    </body>
</html>

