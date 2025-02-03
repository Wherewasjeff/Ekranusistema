<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galvenā | <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <style>
        /* Inline CSS */
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            margin: 0 !important;
        }
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
        .screen-overview{
            width: 30%;
            margin-top: 5%;
        }
        button {
            width: 45%;
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
            background-color: #2c304c;
        }
        .buttons{
            display: flex;
            width: 100%;
            justify-content: space-between;
        }
        .icon {
            height: 22px;
            margin-right: 10px;
            margin-left: 20px;
        }
        .sidebar {
            min-width: 15%;
            background-color: #ffffff;
            border-right: 2px solid #e0e0e0;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            height: 100%;
            position: relative;
        }
        .logobig{
            height: 15%;
            margin-bottom: 2%;
        }
        .sidebar .logo {
            width: 100%;
            max-width: 200px;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .sidebar h2 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #14213D;
        }
        .sidebar .menu {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }
        .sidebar .menu li {
            display: flex;
            align-items: center;
            justify-content: start;
            font-weight: lighter;
            height: 45px;
            width: 100%;
            transition: background-color 0.2s;
        }
        .sidebar .menu li:hover {
            background-color: #EFEFEF;
        }
        .sidebar .logout {
            margin-top: auto;
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .sidebar .logout button {
            padding: 10px 80px;
            width: 90%;
            background-color: #FFD60A;
            color: #14213D;
            border: none;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: 0.6s;
        }
        .sidebar .logout button:hover {
            background-color: #2c304c;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            color: white;
            width: 95%;
        }
        main {
            display: flex;
            background-color: #fbfbfb;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            padding: 20px;
        }
        @media(max-width: 1023px) {
            .sidebar{
                width: 100%;
            }
            .main-wrapper{
                display: none;
            }
            .sidebar .logo{
                position: absolute;
                top: 40%;
                max-width: 100%;
                width: 90%;
            }
            .menu{
                display: none;
            }
            .sidebar .logout{
                display: none;
            }
            h2{
                display: none;
            }
            main{
                display: none;
            }
        };
    </style>
</head>
<body>
<div class="sidebar">
    <img src="<?php echo get_template_directory_uri(); ?>/ridzelogo.png" alt="Pamatskola Rīdze" class="logo">
    <h2>EKRĀNU PĀRVALDES SISTĒMA</h2>
    <ul class="menu">
        <li data-href="ekranusistema/landing-page">
            <img class="icon" src="https://img.icons8.com/?size=100&id=14096&format=png&color=000000"> Galvenā
        </li>
        <li data-href="ekranusistema/ievade">
            <img class="icon" src="https://img.icons8.com/?size=100&id=4pyL65nYepD6&format=png&color=000000"> Ierakstu pārvaldība
        </li>
        <li data-href="#">
            <img class="icon" src="https://img.icons8.com/?size=100&id=7gXZp7fqAo1J&format=png&color=000000"> Ekrānu pārvaldība
        </li>
        <li data-href="/ekranusistema/izmainas/">
            <img class="icon" src="https://img.icons8.com/?size=100&id=sKp0dy2A108d&format=png&color=000000"> Izmaiņu pārvaldība
        </li>
        <li data-href="#">
            <img class="icon" src="https://img.icons8.com/?size=100&id=646&format=png&color=000000"> Palīdzība
        </li>
    </ul>
    <div class="logout">
        <button id="logout-button">Izrakstīties →</button>
    </div>
</div>
<main>
    <img src="<?php echo get_template_directory_uri(); ?>/ridzelogo.png" alt="Pamatskola Rīdze" class="logobig">
    <h1 class="heading">EKRĀNU PĀRVALDES SISTĒMA</h1>
    <h1 class="subheading">Izvēlieties darbību kreisā sāna panelī</h1>
    <section class="screen-overview">
        <h3>Ekrānu pārskats</h3>
        <div class="buttons">
            <button>Ekrāns 1</button>
            <button>Ekrāns 2</button>
        </div>
    </section>
</main>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuItems = document.querySelectorAll('.menu li');
        menuItems.forEach(item => {
            item.style.cursor = 'pointer'; // Optional: visually indicate it's clickable
            item.addEventListener('click', () => {
                const href = item.getAttribute('data-href');
                if (href) {
                    window.location.href = href;
                }
            });
        });
    });
        document.getElementById('logout-button').addEventListener('click', () => {
        window.location.href = '/ekranusistema/';
    });
</script>
</body>
</html>
