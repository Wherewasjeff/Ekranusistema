<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ievade | <?php bloginfo('name'); ?></title>
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
            background-color: white;
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
        .page-title{
            font-size: 30px;
            width: 20%;
            font-weight: bold;
            margin-left: 20px;
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

        .icon {
            height: 22px;
            margin-right: 10px;
            margin-left: 20px;
        }
        .iconbig{
            height: 80%;
            color: #14213D;
        }
        /* Sidebar */
        .sidebar {
            min-width: 15%;
            background-color: #ffffff;
            border-right: 2px solid #e0e0e0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            position: fixed;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            height: 100%;
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
            text-align: center;
        }

        .sidebar .logout p {
            margin-bottom: 10px;
            color: #14213D;
            font-weight: bold;
        }

        .sidebar .logout button {
            padding: 10px 80px;
            width: 100%;
            background-color: #FFD60A;
            color: #14213D;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.6s;
        }
        .sidebar .logout button:hover {
            background-color: #2c304c;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            color: white;
        }

        /* Main Wrapper */
        .main-wrapper {
            flex: 1;
            display: flex;
            padding: 2px;
            margin-left: 15%;
            min-width: 1195px;
            /*flex-wrap: wrap;*/
            flex-direction: column;
            min-height: 100vh;
            height: auto;
            max-width: 85%;
            width: 100%;
        }

        /* Header Section */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 1192px;
            height: 12%;
            padding: 20px;
            background-color: #f9f9f9;
            border-bottom: 2px solid #e0e0e0;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
        }

        .header-buttons {
            display: flex;
            width: 50%;
            margin-left: 15%;
            height: 70%;
        }

        .header-button{
            background-color: white; /* Default white background */
            color: #14213D; /* Default text color */
            font-size: 14px;
            font-weight: bold;
            border: 2px solid #d9d9d9; /* Light border */
            margin-left: 10px;
            border-radius: 4px; /* Subtle rounding */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-button .buttonicon{
            height: 30px; /* Icon size */
            width: 30px;
            margin-right: 8px;
            color: inherit; /* Matches current text color */
        }

        /* Hover styles for each button */
        .green-hover:hover {
            background-color: #e0f7e4; /* Light green */
            color: #28a745;
            border-color: #28a745;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            transition: ease-in-out 0.2s;
        }
        .green-hover:active {
            background-color: #28a745; /* Light green */
            color: #e0f7e4;
            border-color: #28a745;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            transition: linear 5ms;
        }

        .gray-hover:hover {
            background-color: #f7f7f7; /* Light gray */
            color: #6c757d;
            border-color: #6c757d;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            transition: ease-in-out 0.2s;
        }

        .blue-hover:hover {
            background-color: #e0f1ff; /* Light blue */
            color: #007bff;
            border-color: #007bff;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            transition: ease-in-out 0.2s;
        }

        .yellow-hover:hover {
            background-color: #fff3d0; /* Light yellow */
            color: #ffd40c;
            border-color: #ffd40c;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            transition: ease-in-out 0.2s;
        }
        .headerbutton:active {
            background-color: #ffd40c; /* Subtle blue to indicate active */
            color: #fff3d0;
            border-color: #fff3d0;
            transition: ease-in-out 0.1s;
        }
        /* Main Section */
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* Space between items */
            justify-content: center; /* Center forms horizontally */
            height: auto;
            padding: 2px;
            min-height: 70vh;
        }

        .numbers {
            width: 100%;
            margin-bottom: 3%;
            height: 50px;
            max-height: 50px;
            background-color: white;
            margin-left: 5px;
            margin-right: 5px;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #14213D;
            font-size: 20px;
        }

        .form-container {
            flex: 1 1 calc(33.33% - 20px); /* 33.33% width minus gap */
            min-width: 300px; /* Prevent shrinking below a certain size */
            max-width: 350px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 20px;
            display: none;
            margin: 5px;
        }

        .form-group {
            margin-bottom: 10px;
        }
        .form-group2 {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        label {
            display: block;
            font-weight: bold;
            color: #14213D;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: none;
            height: 100px;
        }
        .icons{
            width: 100%;
            height: 40px;
            display: flex;
            justify-content: space-evenly;
        }
        /* Trashcan Button Style */
        .trashcan-button {
            background-color: transparent;
            border: none;
            color: #14213D; /* Default color */
            cursor: pointer;
            transition: 0.3s ease;
            padding: 10px;
            width: auto;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        .trashcan-button:hover {
            color: #ff4d4d; /* Red on hover */
            background-color: #fbc6c6;
        }
        .fullscreen-button {
            background-color: transparent;
            border: none;
            color: #14213D; /* Default color */
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease; /* Add smooth transitions */
            padding: 10px;
            width: auto;
            border-radius: 4px;
            display: flex;
            align-items: center;
            max-width: 40px;
            max-height: 40px;
            font-size: 0;
        }

        .fullscreen-button:hover {
            color: #ffd40c;
            background-color: #fff3d0;
        }

        .fullscreen-button.fullscreen-active {
            color: #14213D;
            background-color: #ffd40c;
            width: 40%;
            font-size: 15px;
            max-width: none;
            max-height: none;
        }
        .fullscreen-button.fullscreen-active svg {
            transform: rotate(45deg); /* Example effect: rotate the icon */
            transition: 0.3s;
            max-width: 20px;
            max-height: 20px;
        }
        .hidden {
            background-color: transparent;
            border: none;
            color: #14213D; /* Default color */
            cursor: pointer;
            transition: 0.3s ease;
            padding: 10px;
            width: auto;
            border-radius: 4px;
            display: flex;
            align-items: center;
            max-width: 40px;
            max-height: 40px;
            font-size: 0;
        }
        .hidden:hover {
            background-color: #f0f0f0;
            color: gray;
        }
        .hidden.hidden-active {
            color: #f0f0f0;
            background-color: gray;
            width: 40%;
            font-size: 15px;
            max-width: none;
            max-height: none;
        }
        .hidden.hidden-active svg {
            transition: 0.3s;
            max-width: 20px;
            max-height: 20px;
        }
        .form-group3 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 15px;
        }

        /* Wrapper for Duration Input and Dropdown */
        .duration-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .duration-wrapper label {
            font-weight: bold;
            color: #14213D;
            margin-right: 10px;
        }

        /* Time Duration Input Style */
        .duration-wrapper input {
            width: 70px;
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        /* Dropdown Style */
        .duration-wrapper select {
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .initial-form {
            display: none;
        }
        .empty-message {
            font-size: 20px;
            color: gray;
            text-align: center;
            margin-top: 10%;

        }
        .notification-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .notification {
            background-color: #f44336; /* Red for error */
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            margin-top: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            opacity: 0;
            animation: fadeInOut 4s forwards;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            10% {
                opacity: 1;
                transform: translateY(0);
            }
            90% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform: translateY(20px);
            }
        }
        @media(max-width: 1023px) {
            .sidebar {
                width: 100%;
            }
            .main-wrapper {
                display: none;
            }
            .sidebar .logo {
                position: absolute;
                top: 40%;
                max-width: 100%;
                width: 90%;
            }
            .menu {
                display: none;
            }
            .sidebar .logout {
                display: none;
            }
            h2 {
                display: none;
            }
        };
        .form-container-layout {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            column-count: 3;
            display: flex;
            flex-direction: row;
            height: auto;
            flex-wrap: wrap;
            max-width: 1192px;
            margin-top: 2px;
            margin-bottom: 2px;
            padding: 20px; /* Adds some spacing around the grid */
            width: 100%;
        }
        .dropdown-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .dropdown-container label {
            margin-bottom: 5px;
            color: #14213D;
            font-weight: bold;
        }

        .dropdown-container select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 200px; /* Adjust width to match design */
        }
        .image-preview {
            margin-top: 10px;
            margin-bottom: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-height: 150px;
            overflow: hidden;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 150px;
            display: block;
        }

        .image-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .overlay-content {
            position: relative;
            z-index: 1; /* Ensure the content is above the overlay background */
        }

        .image-overlay img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 5px;
        }

        .overlay-content img {
            max-width: 50%;
            max-height: 50%;
        }
        .notification-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .notification {
            background-color: #f44336; /* Red for error */
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            margin-top: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            opacity: 0;
            animation: fadeInOut 4s forwards;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            10% {
                opacity: 1;
                transform: translateY(0);
            }
            90% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform: translateY(20px);
            }
        }
    </style>
</head>
<body>
<div class="sidebar">
    <img src="<?php echo get_template_directory_uri(); ?>/ridzelogo.png" alt="Pamatskola Rīdze" class="logo">
    <h2>EKRĀNU PĀRVALDES SISTĒMA</h2>
    <ul class="menu">
        <li data-href="/ekranusistema/landing-page/">
            <img class="icon" src="https://img.icons8.com/?size=100&id=14096&format=png&color=000000"> Galvenā
        </li>
        <li data-href="/ekranusistema/ievade">
            <img class="icon" src="https://img.icons8.com/?size=100&id=4pyL65nYepD6&format=png&color=000000"> Ierakstu pārvaldība
        </li>
        <li data-href="#">
            <img class="icon" src="https://img.icons8.com/?size=100&id=7gXZp7fqAo1J&format=png&color=000000"> Ekrānu pārvaldība
        </li>
        <li data-href="/ekranusistema/izmainas/">
            <img class="icon" src="https://img.icons8.com/?size=100&id=oR5tfd18Ei7C&format=png&color=000000"> Izmaiņu pārvaldība
        </li>
        <li data-href="#">
            <img class="icon" src="https://img.icons8.com/?size=100&id=646&format=png&color=000000"> Palīdzība
        </li>
    </ul>
    <div class="logout">
        <button data-href="/ekranusistema/">Izrakstīties →</button>
    </div>
</div>

<div class="main-wrapper">
    <header class="header">
        <svg class="iconbig" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 4C16.93 4 17.395 4 17.7765 4.10222C18.8117 4.37962 19.6204 5.18827 19.8978 6.22354C20 6.60504 20 7.07003 20 8V17.2C20 18.8802 20 19.7202 19.673 20.362C19.3854 20.9265 18.9265 21.3854 18.362 21.673C17.7202 22 16.8802 22 15.2 22H8.8C7.11984 22 6.27976 22 5.63803 21.673C5.07354 21.3854 4.6146 20.9265 4.32698 20.362C4 19.7202 4 18.8802 4 17.2V8C4 7.07003 4 6.60504 4.10222 6.22354C4.37962 5.18827 5.18827 4.37962 6.22354 4.10222C6.60504 4 7.07003 4 8 4M9.6 6H14.4C14.9601 6 15.2401 6 15.454 5.89101C15.6422 5.79513 15.7951 5.64215 15.891 5.45399C16 5.24008 16 4.96005 16 4.4V3.6C16 3.03995 16 2.75992 15.891 2.54601C15.7951 2.35785 15.6422 2.20487 15.454 2.10899C15.2401 2 14.9601 2 14.4 2H9.6C9.03995 2 8.75992 2 8.54601 2.10899C8.35785 2.20487 8.20487 2.35785 8.10899 2.54601C8 2.75992 8 3.03995 8 3.6V4.4C8 4.96005 8 5.24008 8.10899 5.45399C8.20487 5.64215 8.35785 5.79513 8.54601 5.89101C8.75992 6 9.03995 6 9.6 6Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <p class="page-title">JAUNS IERAKSTS</p>
        <div class="dropdown-container">
            <label for="screen">Izvēlieties ekrānu</label>
            <select id="screen" name="screen" required>
                <option value="" disabled selected>Izvēlieties ekrānu</option>
                <option value="screen1">Ekrāns 1</option>
                <option value="screen2">Ekrāns 2</option>
                <option value="all">Visi ekrāni</option>
            </select>
        </div>
        <div class="header-buttons">
            <button type="button" class="header-button green-hover">
                <svg viewBox="0 0 24 24" fill="none" class="buttonicon" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 8V16M8 12H16M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Pievienot ierakstu</span>
            </button>

            <button type="button" class="header-button gray-hover toggle-button" id="hidden-button">
                <svg class="buttonicon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7429 5.09232C11.1494 5.03223 11.5686 5 12.0004 5C17.1054 5 20.4553 9.50484 21.5807 11.2868C21.7169 11.5025 21.785 11.6103 21.8231 11.7767C21.8518 11.9016 21.8517 12.0987 21.8231 12.2236C21.7849 12.3899 21.7164 12.4985 21.5792 12.7156C21.2793 13.1901 20.8222 13.8571 20.2165 14.5805M6.72432 6.71504C4.56225 8.1817 3.09445 10.2194 2.42111 11.2853C2.28428 11.5019 2.21587 11.6102 2.17774 11.7765C2.1491 11.9014 2.14909 12.0984 2.17771 12.2234C2.21583 12.3897 2.28393 12.4975 2.42013 12.7132C3.54554 14.4952 6.89541 19 12.0004 19C14.0588 19 15.8319 18.2676 17.2888 17.2766M3.00042 3L21.0004 21M9.8791 9.87868C9.3362 10.4216 9.00042 11.1716 9.00042 12C9.00042 13.6569 10.3436 15 12.0004 15C12.8288 15 13.5788 14.6642 14.1217 14.1213"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Paslēpt visus ierakstus</span>
            </button>

            <button type="button" class="header-button yellow-hover toggle-button" id="header-fullscreen-button">
                <svg class="buttonicon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14 10L21 3M21 3H15M21 3V9M10 14L3 21M3 21H9M3 21L3 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Tikai pilnekrāna režīms</span>
            </button>

            <button type="submit" form="entry-form" class="header-button blue-hover">
                <svg class="buttonicon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 8H8.6C8.03995 8 7.75992 8 7.54601 7.89101C7.35785 7.79513 7.20487 7.64215 7.10899 7.45399C7 7.24008 7 6.96005 7 6.4V3M17 21V14.6C17 14.0399 17 13.7599 16.891 13.546C16.7951 13.3578 16.6422 13.2049 16.454 13.109C16.2401 13 15.9601 13 15.4 13H8.6C8.03995 13 7.75992 13 7.54601 13.109C7.35785 13.2049 7.20487 13.3578 7.10899 13.546C7 13.7599 7 14.0399 7 14.6V21M21 9.32548V16.2C21 17.8802 21 18.7202 20.673 19.362C20.3854 19.9265 19.9265 20.3854 19.362 20.673C18.7202 21 17.8802 21 16.2 21H7.8C6.11984 21 5.27976 21 4.63803 20.673C4.07354 20.3854 3.6146 19.9265 3.32698 19.362C3 18.7202 3 17.8802 3 16.2V7.8C3 6.11984 3 5.27976 3.32698 4.63803C3.6146 4.07354 4.07354 3.6146 4.63803 3.32698C5.27976 3 6.11984 3 7.8 3H14.6745C15.1637 3 15.4083 3 15.6385 3.05526C15.8425 3.10425 16.0376 3.18506 16.2166 3.29472C16.4184 3.4184 16.5914 3.59135 16.9373 3.93726L20.0627 7.06274C20.4086 7.40865 20.5816 7.5816 20.7053 7.78343C20.8149 7.96237 20.8957 8.15746 20.9447 8.36154C21 8.59171 21 8.8363 21 9.32548Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Saglabāt un aizsūtīt</span>
            </button>
        </div>
    </header>
    <main class="container">
        <div class="numbers"></div>
        <p id="emptyMessage" class="empty-message">PAGAIDĀM NAV NEVIENA IERAKSTA<br>pievienojiet to augšējā panelī</p>
        <div class="form-container-layout">
        <div class="form-container">
            <form id="entry-form" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="image">Augšupielādēt attēlu</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                    <div class="image-preview" id="imagePreview">
                        <img src="" alt="Preview" id="previewImage" style="display: none; cursor: pointer;" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">Ieraksta virsraksts</label>
                    <input type="text" id="title" name="title" placeholder="Ievadiet virsrakstu">
                </div>

                <div class="form-group">
                    <label for="description">Ieraksta apraksts</label>
                    <textarea id="description" name="description" placeholder="Ievadiet aprakstu"></textarea>
                </div>
                <div class="form-group3">
                    <div class="duration-wrapper">
                        <label for="duration">Rādīšanas laiks:</label>
                        <input type="number" id="duration" name="duration" placeholder="Ievadiet laiku" style="width: 45%">
                        <select id="time-unit" name="time-unit" style="width: 25%">
                            <option value="S">S</option>
                            <option value="Min">Min</option>
                        </select>
                    </div>
                </div>
                <div class="icons">
                <button type="button" id="fullscreen-entry" class="fullscreen-button" title="Pilnekrāna režīms">
                    <svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 10L21 3M21 3H15M21 3V9M10 14L3 21M3 21H9M3 21L3 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p>Pilnekrāna režīms</p>
                </button>
                    <button type="button" class="hidden" id="hidden-entry" title="Paslēpt ierakstu">
                        <svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.7429 5.09232C11.1494 5.03223 11.5686 5 12.0004 5C17.1054 5 20.4553 9.50484 21.5807 11.2868C21.7169 11.5025 21.785 11.6103 21.8231 11.7767C21.8518 11.9016 21.8517 12.0987 21.8231 12.2236C21.7849 12.3899 21.7164 12.4985 21.5792 12.7156C21.2793 13.1901 20.8222 13.8571 20.2165 14.5805M6.72432 6.71504C4.56225 8.1817 3.09445 10.2194 2.42111 11.2853C2.28428 11.5019 2.21587 11.6102 2.17774 11.7765C2.1491 11.9014 2.14909 12.0984 2.17771 12.2234C2.21583 12.3897 2.28393 12.4975 2.42013 12.7132C3.54554 14.4952 6.89541 19 12.0004 19C14.0588 19 15.8319 18.2676 17.2888 17.2766M3.00042 3L21.0004 21M9.8791 9.87868C9.3362 10.4216 9.00042 11.1716 9.00042 12C9.00042 13.6569 10.3436 15 12.0004 15C12.8288 15 13.5788 14.6642 14.1217 14.1213" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p>Ieraksts paslēpts</p>
                    </button>
                    <button type="button" id="delete-entry" class="trashcan-button" title="Dzēst ierakstu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        </div>
        <div id="notificationContainer" class="notification-container"></div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let formCount = 0;

            const addButton = document.querySelector('.header-buttons button');
            const container = document.querySelector('.container');
            const numbersDisplay = document.querySelector('.numbers');
            const initialForm = document.querySelector('.form-container');
            const screenDropdown = document.getElementById('screen');
            const overlayImage = document.getElementById('overlayImage');
            const imageOverlay = document.getElementById('imageOverlay');
            const closeOverlay = document.getElementById('closeOverlay');
            const headerFullscreenButton = document.getElementById('header-fullscreen-button');

            if (!addButton || !container || !numbersDisplay || !initialForm) {
                console.error('Critical elements are missing in the DOM.');
                return;
            }

            // Fullscreen toggle for individual forms
            container.addEventListener('click', (event) => {
                const fullscreenButton = event.target.closest('#fullscreen-entry');
                if (fullscreenButton) {
                    fullscreenButton.classList.toggle('fullscreen-active');

                    const formContainer = fullscreenButton.closest('.form-container');
                    const formId = formContainer ? formContainer.dataset.formId : 'Unknown';
                    console.log(`Fullscreen toggled on form container id: ${formId}`);
                }
            });

            // Fullscreen toggle for all forms using the header button
            if (headerFullscreenButton) {
                headerFullscreenButton.addEventListener('click', () => {
                    const formContainers = container.querySelectorAll('.form-container');
                    const isFullscreenActive = headerFullscreenButton.classList.toggle('fullscreen-active');

                    formContainers.forEach((formContainer) => {
                        const fullscreenButton = formContainer.querySelector('#fullscreen-entry');
                        if (fullscreenButton) {
                            if (isFullscreenActive) {
                                fullscreenButton.classList.add('fullscreen-active');
                            } else {
                                fullscreenButton.classList.remove('fullscreen-active');
                            }
                        }
                    });

                    console.log(`Header fullscreen button toggled. State: ${isFullscreenActive ? 'Active' : 'Inactive'}`);
                });
            }

            // Hidden button functionality
            const hiddenButton = document.getElementById('hidden-entry');
            const formContainer = document.querySelector('.form-container');

            if (!hiddenButton) {
                console.error('Hidden button not found in the DOM.');
            } else {
                hiddenButton.addEventListener('click', () => {
                    hiddenButton.classList.toggle('hidden-active');

                    if (hiddenButton.classList.contains('hidden-active')) {
                        formContainer.style.opacity = '0.3';
                        formContainer.style.pointerEvents = 'none';
                    } else {
                        formContainer.style.opacity = '1';
                        formContainer.style.pointerEvents = 'auto';
                    }

                    console.log('Hidden button clicked. Current classes:', hiddenButton.className);
                });

                document.addEventListener('click', (event) => {
                    const target = event.target.closest('#hidden-entry');
                    if (target) {
                        target.classList.toggle('hidden-active');

                        if (target.classList.contains('hidden-active')) {
                            formContainer.style.opacity = '0.3';
                            formContainer.style.pointerEvents = 'none';
                        } else {
                            formContainer.style.opacity = '1';
                            formContainer.style.pointerEvents = 'auto';
                        }

                        console.log('Toggled Hidden-active via delegation. Current classes:', target.className);
                    }
                });
            }

            let notificationContainer = document.getElementById('notificationContainer');
            if (!notificationContainer) {
                notificationContainer = document.createElement('div');
                notificationContainer.id = 'notificationContainer';
                notificationContainer.className = 'notification-container';
                document.body.appendChild(notificationContainer);
            }

            function showNotification(message) {
                const notification = document.createElement('div');
                notification.className = 'notification';
                notification.textContent = message;
                notificationContainer.appendChild(notification);
                notification.addEventListener('animationend', () => notification.remove());
            }

            function createForm() {
                formCount++;
                const uniqueId = formCount;
                const newForm = initialForm.cloneNode(true);
                newForm.style.display = 'flex';
                newForm.dataset.formId = uniqueId;

                const imageInput = newForm.querySelector('#image');
                const previewImage = newForm.querySelector('#previewImage');
                const imagePreviewContainer = newForm.querySelector('#imagePreview');
                const toggleSwitch = newForm.querySelector('.switch input');
                const label = newForm.querySelector('.switch label');

                if (imageInput) imageInput.id = `image-${uniqueId}`;
                if (previewImage) previewImage.id = `previewImage-${uniqueId}`;
                if (imagePreviewContainer) imagePreviewContainer.id = `imagePreview-${uniqueId}`;
                if (toggleSwitch) {
                    toggleSwitch.id = `status-${uniqueId}`;
                    toggleSwitch.name = `status-${uniqueId}`;
                    toggleSwitch.checked = false;
                }
                if (label) label.setAttribute('for', `status-${uniqueId}`);

                if (imageInput) {
                    imageInput.addEventListener('change', (event) => {
                        const file = event.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                if (previewImage) {
                                    previewImage.src = e.target.result;
                                    previewImage.style.display = 'block';
                                }
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                }

                if (previewImage) {
                    previewImage.addEventListener('click', () => {
                        if (overlayImage) overlayImage.src = previewImage.src;
                        if (imageOverlay) imageOverlay.style.display = 'flex';
                    });
                }

                return newForm;
            }

            function updateFormCount() {
                const formCount = container.querySelectorAll('.form-container').length - 1;
                let word = 'ieraksti';
                if ((formCount % 10 === 1) && !(formCount % 100 >= 11 && formCount % 100 <= 19)) {
                    word = 'ieraksts';
                }
                numbersDisplay.textContent = `${formCount} ${word}`;

                const emptyMessage = document.getElementById('emptyMessage');
                if (emptyMessage) emptyMessage.style.display = formCount === 0 ? 'block' : 'none';
            }

            function adjustLayout() {
                const formContainers = container.querySelectorAll('.form-container');
                formContainers.forEach((form) => {
                    form.style.flexBasis = 'calc(33.33% - 20px)';
                });
            }

            if (initialForm) initialForm.style.display = 'none';
            updateFormCount();

            addButton.addEventListener('click', () => {
                const selectedScreen = screenDropdown ? screenDropdown.value : null;

                if (!selectedScreen) {
                    showNotification('Izvēlieties ekrānu, lai pievienot ierakstu!');
                    return;
                }

                const newForm = createForm();
                container.appendChild(newForm);
                adjustLayout();
                updateFormCount();
            });

            container.addEventListener('click', (event) => {
                if (event.target.closest('.trashcan-button')) {
                    const formToRemove = event.target.closest('.form-container');
                    if (formToRemove) {
                        formToRemove.remove();
                        adjustLayout();
                        updateFormCount();
                    }
                }
            });

            container.addEventListener('change', (event) => {
                if (event.target.matches('.switch input')) {
                    const toggleSwitch = event.target;
                    const formId = toggleSwitch.closest('.form-container')?.dataset.formId;
                    const isChecked = toggleSwitch.checked;
                    console.log(`Form ID: ${formId}, Switch toggled: ${isChecked}`);
                }
            });

            if (imageOverlay) {
                imageOverlay.addEventListener('click', (event) => {
                    if (event.target === imageOverlay) {
                        imageOverlay.style.display = 'none';
                    }
                });
            }

            if (closeOverlay) {
                closeOverlay.addEventListener('click', () => {
                    if (imageOverlay) imageOverlay.style.display = 'none';
                });
            }

            const sidebarItems = document.querySelectorAll('.sidebar .menu li');

            sidebarItems.forEach((item) => {
                item.addEventListener('click', () => {
                    const href = item.getAttribute('data-href');
                    if (href) {
                        window.location.href = href;
                    }
                });
            });
        });
    </script>
    <div id="imageOverlay" class="image-overlay" style="display: none;">
            <img src="" alt="Full View" id="overlayImage" />
        </div>
    </div>
</div>
</body>
</html>
