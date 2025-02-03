<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            margin: 0 !important;
        }

        /* General Styles */
        body {
            width: 100%;
            height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #14213D;
            display: flex;
        }

        h1 {
            color: #14213D;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            color: #14213D;
            text-align: center;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .heading {
            font-weight: bolder;
            font-size: 50px;
            margin-bottom: 20px;
        }

        .subheading {
            font-weight: lighter;
            font-size: 24px;
            color: darkgray;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #14213D;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1c2b4a;
        }

        .container {
            flex: 1;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: auto;
        }

        .logo {
            width: 450px;
            max-width: 100%;
            margin-bottom: 20px;
        }

        .login-form {
            background: #ffffff;
            border: #FFD60A 3px solid;
            padding: 60px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #14213D;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        @media(max-width: 1023px) {
        h1{
            display: none;
        }
        .login-form{
            display: none;
        }
        };
    </style>
</head>
<body>
<div class="container">
    <img src="<?php echo get_template_directory_uri(); ?>/ridzelogo.png" alt="Pamatskola Rīdze" class="logo">
    <h1>EKRĀNU PĀRVALDES SISTĒMA</h1>
    <div class="login-form">
        <form>
            <div class="form-group">
                <label for="password">Parole</label>
                <input type="password" id="password" placeholder="Ievadiet paroli" required>
            </div>
            <button type="submit">Pieslēgties →</button>
        </form>
    </div>
</div>
</body>
</html>
