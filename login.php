<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "restaurant_db";
$conn = new mysqli($server,$user,$password,$dbname);
if(!$conn) {
    echo "Error! : {$conn->connect_error()}";
}
else{
    echo "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Bites Kitchen - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Georgia, serif;
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 50%, #8B0000 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .login-container {
            background: linear-gradient(145deg, #f5f5dc 0%, #faebd7 100%);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.4),
                inset 0 2px 10px rgba(218, 165, 32, 0.3);
            border: 3px solid #DAA520;
            max-width: 450px;
            width: 120%;
            position: relative;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #DAA520, #FFD700, #DAA520);
            border-radius: 18px;
            z-index: -1;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #8B0000;
            font-size: 2.2em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            font-weight: bold;
        }

        .header p {
            color: #8B4513;
            font-size: 1.1em;
            font-style: italic;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #8B0000;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 1.1em;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #A0522D;
            border-radius: 8px;
            font-family: Georgia, serif;
            font-size: 0.7em;
            background: linear-gradient(to bottom, #fff 0%, #fafafa 100%);
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-group input:focus {
            outline: none;
            border-color: #DAA520;
            box-shadow: 
                inset 0 2px 5px rgba(0, 0, 0, 0.1),
                0 0 10px rgba(218, 165, 32, 0.3);
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(145deg, #8B0000 0%, #A52A2A 50%, #8B0000 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-family: Georgia, serif;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 
                0 5px 15px rgba(0, 0, 0, 0.3),
                inset 0 1px 3px rgba(255, 255, 255, 0.2);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .login-btn:hover {
            background: linear-gradient(145deg, #A52A2A 0%, #8B0000 50%, #A52A2A 100%);
            transform: translateY(-2px);
            box-shadow: 
                0 8px 20px rgba(0, 0, 0, 0.4),
                inset 0 1px 3px rgba(255, 255, 255, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .links {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 2px solid #DAA520;
        }

        .links a {
            color: #8B0000;
            text-decoration: none;
            font-weight: bold;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: #DAA520;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me input[type="checkbox"] {
            margin-right: 8px;
            transform: scale(1.2);
        }

        .remember-me label {
            color: #8B4513;
            font-size: 0.9em;
            margin-bottom: 0;
        }

        .modal {
            display: none;
            position: static;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background: linear-gradient(145deg, #f5f5dc 0%, #faebd7 100%);
            margin: 5% auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.4),
                inset 0 2px 10px rgba(218, 165, 32, 0.3);
            border: 3px solid #DAA520;
            max-width: 450px;
            width: 100%;
            position: relative;
            bottom: 20%;
        }

        .modal-content::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            background: linear-gradient(45deg, #DAA520, #FFD700, #DAA520);
            border-radius: 18px;
            z-index: -1;
        }

        .close {
            color: #8B0000;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #DAA520;
        }

        .register-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(145deg, #8B4513 0%, #A0522D 50%, #8B4513 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-family: Georgia, serif;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 
                0 5px 15px rgba(0, 0, 0, 0.3),
                inset 0 1px 3px rgba(255, 255, 255, 0.2);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .register-btn:hover {
            background: linear-gradient(145deg, #A0522D 0%, #8B4513 50%, #A0522D 100%);
            transform: translateY(-2px);
            box-shadow: 
                0 8px 20px rgba(0, 0, 0, 0.4),
                inset 0 1px 3px rgba(255, 255, 255, 0.3);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }
            
            .header h1 {
                font-size: 1.8em;
            }
            
            .modal-content {
                margin: 10% auto;
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="header">
            <h1>Fresh Bites Kitchen</h1>
            <p>Welcome to our culinary heritage</p>
        </div>
        
        <form id="loginForm" onsubmit="handleLogin(event)">
            <div class="form-group">
                <label for="username">Username or Email</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me on this device</label>
            </div>
            
            <button type="submit" class="login-btn">Sign In</button>
        </form>
        
        <div class="links">
            <a href="#" onclick="openRegisterModal()">Create New Account</a>
            <span style="color: #8B4513;">|</span>
            <a href="#">Forgot Password?</a>
        </div>
    </div>

    <!-- Registration Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeRegisterModal()">&times;</span>
            <div class="header">
                <p>Create your culinary account</p>
            </div>
            
            <form id="registerForm" onsubmit="handleRegister(event)">
                <div class="form-group">
                    <label for="regFirstName">First Name</label>
                    <input type="text" id="regFirstName" name="firstName" required>
                </div>
                
                <div class="form-group">
                    <label for="regLastName">Last Name</label>
                    <input type="text" id="regLastName" name="lastName" required>
                </div>
                
                <div class="form-group">
                    <label for="regEmail">Email Address</label>
                    <input type="email" id="regEmail" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="regUsername">Username</label>
                    <input type="text" id="regUsername" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="regPassword">Password</label>
                    <input type="password" id="regPassword" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="regConfirmPassword">Confirm Password</label>
                    <input type="password" id="regConfirmPassword" name="confirmPassword" required>
                </div>
                
                <button type="submit" class="register-btn">Create Account</button>
            </form>
            
            <div class="links">
                <a href="#" onclick="closeRegisterModal()">Already have an account? Sign In</a>
            </div>
        </div>
    </div>

    <script>
        function handleLogin(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            fetch('login.php', {
                method: 'POST',
                headers: {
                    'Content-Type':'application/json'
                },
                body: JSON.stringfy({username: username, password: password})
                })
                .then(response=>response.json())
                .then(data=> {
                    if (data.success) {

                    window.location.href='dash.html';
                } else {
                    alert('Invalid username or password');
                }
                })
                .catch (error => {
                    console.error('Error:', error);
                });
            });
            
            if (username && password) {
                alert(`Welcome to Fresh Bites Kitchen, ${username}!`);
                // Here you would typically send the data to your server
            }
        }
        
        function handleRegister(event) {
            event.preventDefault();
            const firstName = document.getElementById('regFirstName').value;
            const lastName = document.getElementById('regLastName').value;
            const email = document.getElementById('regEmail').value;
            const username = document.getElementById('regUsername').value;
            const password = document.getElementById('regPassword').value;
            const confirmPassword = document.getElementById('regConfirmPassword').value;
            
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }
            
            if (firstName && lastName && email && username && password) {
                alert(`Account created successfully for ${firstName} ${lastName}!`);
                closeRegisterModal();
                // Here you would typically send the data to your server
            }
        }
        
        function openRegisterModal() {
            document.getElementById('registerModal').style.display = 'block';
        }
        
        function closeRegisterModal() {
            document.getElementById('registerModal').style.display = 'none';
        }
        
        // Close modal when clicking outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('registerModal');
            if (event.target === modal) {
                closeRegisterModal();
            }
        }
    </script>
</body>
</html>