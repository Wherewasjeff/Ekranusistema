<?php
/* Template Name: Ekrāns 1 */
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skolas Ekrāns</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #14213D;
            color: white;
            width: 1920px;
            height: 1080px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            display: flex;
            width: 99.5%;
            height: 99%;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .main-content {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: center;
        }

        .header-image-container {
            width: 100%;
            height: 60%;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 15px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }

        .header-image {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        h1 {
            color: #002366;
            font-size: 48px;
            margin-bottom: 30px;
            font-weight: bold;
            line-height: 1.2;
        }

        p {
            font-size: 24px;
            line-height: 1.6;
            color: #333;
            margin-bottom: 20px;
        }

        .sidebar {
            width: 750px;
            background: rgba(255, 255, 255, 0.95);
            padding-top: 20px;
            padding-right: 10px;
            padding-left: 10px;
            padding-bottom: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            border-left: 8px solid #14213D;
            position: relative; /* For logo positioning */
        }

        .header {
            margin-top: 30px;
            width: 90%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .logo {
            width: 50%;
            height: auto;
            transition: opacity 0.3s ease;
        }

        .datetime {
            text-align: end;
            flex: 1;
            display: flex;
            justify-content: flex-end;
            flex-direction: column;
        }

        .time {
            font-weight: bold;
            font-size: 60px;
            color: #002366;
        }

        .date {
            font-size: 30px;
            color: #333;
        }

        .changes-container {
            width: 100%;
            background: white;
            border: 2px solid #002366;
            border-radius: 15px;
            padding: 3px;
            display: flex;
            flex-direction: column;
        }

        .changes-container h2 {
            color: #002366;
            font-size: 24px;
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: center;
        }

        .changes-section {
            width: 100%;
            min-height: 200px;
            max-height: 700px;
            border-radius: 10px;
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
            color: #002366;
            font-size: 64px;
            overflow: hidden;
        }

        .changes-section img {
            height: 100%;
            max-width: 100%;
            object-fit: contain;
        }

        .nameday-section {
            width: 100%;
            background: white;
            border: 2px solid #002366;
            border-radius: 15px;
            padding: 8px;
        }

        .nameday-section h2 {
            color: #002366;
            font-size: 32px;
            margin-bottom: 10px;
            text-align: center;
        }

        .nameday-container {
            display: grid;
            gap: 10px;
            justify-content: center;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }

        .nameday-box {
            min-height: 60px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 28px;
            color: #002366;
            background: rgba(0, 0, 0, 0.05);
        }

        /* Logo at the bottom */
        .logo-bottom {
            display: flex;
            width: 450px;
            height: auto;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .logo-bottom.visible {
            margin-bottom: 5%;
            margin-top: -5%;
            position: relative;
            opacity: 1;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="main-content">
        <div class="header-image-container">
            <img src="https://www.ridze.lv/wp-content/uploads/2016/10/bg-min-1024x320.jpg" alt="Skolas ēka" class="header-image">
        </div>
        <h1>Skolai ir jauna ekrānu pārvaldības sistēma</h1>
        <p>
            Šodien mūsu skolā ir liela diena – mēs ar prieku paziņojam par jaunas, mūsdienīgas monitoru pārvaldības sistēmas ieviešanu! Šis ir nozīmīgs solis uz priekšu tehnoloģiju un inovāciju pielietošanā mūsu izglītības iestādē, kas ļaus mums vēl labāk nodrošināt aktuālu un interaktīvu informāciju skolēniem, vecākiem un skolotājiem.
        </p>
    </div>
    <div class="sidebar">
        <div class="header">
            <img src="<?php echo get_template_directory_uri(); ?>/ridzelogo.png" alt="Pamatskola Rīdze" class="logo">
            <div class="datetime">
                <div class="time" id="time"></div>
                <div class="date" id="date"></div>
            </div>
        </div>
        <div class="changes-container">
            <h2>Šodienas izmaiņas</h2>
            <div class="changes-section" id="changes-section">
                <!-- Image or "Nav datu" will be dynamically inserted here -->
            </div>
        </div>
        <div class="nameday-section">
            <h2>Vārda dienu svin</h2>
            <div class="nameday-container" id="nameday-container"></div>
        </div>
        <!-- Logo at the bottom -->
        <img src="<?php echo get_template_directory_uri(); ?>/ridzelogo.png" alt="Pamatskola Rīdze" class="logo-bottom">
    </div>
</div>
<script>
    function updateTimeAndDate() {
        const now = new Date();
        document.getElementById('time').textContent = now.toLocaleTimeString('lv-LV');
        document.getElementById('date').textContent = now.toLocaleDateString('lv-LV', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }
    setInterval(updateTimeAndDate, 1000);
    updateTimeAndDate();

    function fetchNamedays() {
        const now = new Date();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const todayKey = `${month}-${day}`;
        const namedayContainer = document.getElementById('nameday-container');

        fetch("<?php echo get_template_directory_uri(); ?>/namedays.json")
            .then(response => response.json())
            .then(data => {
                namedayContainer.innerHTML = '';
                if (data[todayKey]) {
                    data[todayKey].forEach(name => {
                        const nameBox = document.createElement('div');
                        nameBox.classList.add('nameday-box');
                        nameBox.textContent = name;
                        namedayContainer.appendChild(nameBox);
                    });
                }
            })
            .catch(error => console.error('Error fetching namedays:', error));
    }
    fetchNamedays();

    function fetchImageForToday() {
        const today = new Date().toISOString().split('T')[0]; // Get today's date in 'YYYY-MM-DD' format
        const changesSection = document.getElementById('changes-section');

        console.log(`Fetching image for date: ${today}`); // Debugging

        fetch(`http://localhost/ekranusistema/wp-content/themes/ekranu-theme/get-image.php?date=${today}`)
            .then(response => {
                console.log(`Response status: ${response.status}`); // Debugging
                console.log(`Content-Type: ${response.headers.get('Content-Type')}`); // Debugging

                if (response.ok && response.headers.get('Content-Type').startsWith('image')) {
                    return response.blob(); // Get the image as a blob
                } else {
                    throw new Error('No image found for this date.');
                }
            })
            .then(blob => {
                // Check if the blob is empty or invalid
                if (blob.size === 0) {
                    console.log('No image found: Blob is empty.'); // Debugging
                    throw new Error('No image found for this date.');
                }

                console.log('Image found for today.'); // Debugging
                const imageUrl = URL.createObjectURL(blob);
                const img = new Image();
                img.src = imageUrl;
                img.onload = () => {
                    console.log('Image loaded successfully.'); // Debugging
                    changesSection.innerHTML = `<img src="${imageUrl}" alt="Today's Changes" style="max-width: 100%; max-height: 100%; object-fit: contain;">`;
                    adjustLogoPosition(changesSection.clientHeight);
                };
            })
            .catch(error => {
                console.error('Error fetching image:', error); // Debugging
                changesSection.textContent = 'Nav Izmaiņu';
                adjustLogoPosition(changesSection.clientHeight);
                showLogoBottom(); // Ensure logo-bottom is visible when no image is found
            });
    }
    fetchImageForToday();

    // Adjust logo position based on changes-section height
    function adjustLogoPosition(changesSectionHeight) {
        const logo = document.querySelector('.logo');
        const logoBottom = document.querySelector('.logo-bottom');
        const datetime = document.querySelector('.datetime');
        const date = document.querySelector('.date');
        const time = document.querySelector('.time');
        const names = document.querySelector('.nameday-section');
        console.log(`Changes section height: ${changesSectionHeight}px`); // Debugging

        if (changesSectionHeight < 500) {
            console.log('Changes section height is less than 500px. Adjusting layout...'); // Debugging
            logo.style.display = 'none';
            showLogoBottom();
            datetime.style.justifyContent = 'center';
            datetime.style.scale = '1.1';
            time.style.display = 'flex';
            time.style.justifyContent = 'center';
            date.style.textAlign = 'center';
            names.style.position = 'relative';
            names.style.bottom = '4%'; // Add this line to set the bottom attribute
        } else {
            console.log('Changes section height is 500px or more. Resetting layout...'); // Debugging
            logo.style.display = 'block';
            logoBottom.classList.remove('visible');
            logoBottom.style.scale = '0';
            datetime.style.justifyContent = 'flex-end';
            date.style.textAlign = 'right';
            datetime.style.scale = '0.9';
            names.style.position = 'relative'; // Reset the position
            names.style.bottom = '-0.7%'; // Reset the bottom attribute
        }
    }

    function showLogoBottom() {
        const logoBottom = document.querySelector('.logo-bottom');
        console.log('Showing logo at the bottom.'); // Debugging
        logoBottom.classList.add('visible');
    }
</script>
</body>
</html>