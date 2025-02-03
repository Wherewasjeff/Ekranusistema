<?php
/* Template Name: Izmaiņu Pārvaldība */
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izmaiņu pārvaldība | <?php bloginfo('name'); ?></title>
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
        body {
            width: 100%;
            height: 100vh;
            font-family: Arial, sans-serif;
            display: flex;
            margin: 0;
            background-color: #ffffff;
            color: #14213D;
        }
        .sidebar {
            min-width: 15%;
            background-color: #ffffff;
            border-right: 2px solid #e0e0e0;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            display: flex;
            flex-direction: column;
            z-index: 200;
            align-items: center;
            height: 100%;
        }
        .sidebar .logo {
            width: 100%;
            max-width: 200px;
            margin: 20px 0;
        }
        .sidebar h2 {
            font-size: 16px;
            margin-bottom: 30px;
            font-weight: bold;
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
            height: 45px;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .sidebar .menu li:hover {
            background-color: #EFEFEF;
        }
        .sidebar .menu li img.icon {
            height: 22px;
            margin: 0 10px 0 20px;
        }
        .sicon{
            height: 25px;
            margin-right: 20px;
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
        }
        #paste-button {
            padding: 5px 20px;
            background-color: #FFD60A;
            margin-top: 7px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        #paste-button:hover {
            background-color: #FFCE00;
        }
        main {
            flex-grow: 1;
            background-color: #fbfbfb;
            padding: 20px;
        }
        .calendar {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .calendar-header h2 {
            font-size: 28px;
            font-weight: bold;
            color: #14213D;
        }
        .calendar-header button {
            font-size: 18px;
            padding: 8px 12px;
            background-color: #FFD60A;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .calendar-header button:hover {
            background-color: #e0b500;
        }
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 15px;
        }
        .calendar-day {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            color: #14213D;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
        }
        .calendar-day:hover {
            background-color: #FFD60A;
            color: #14213D;
            transform: scale(1.05);
        }
        .calendar-day.today {
            background-color: #14213D;
            color: #ffffff;
            font-weight: bold;
        }
        .weekday-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .weekday-cell {
            font-size: 14px;
            font-weight: 500;
            color: #14213D;
            width: 100%;
            text-align: center;
        }
        #calendar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .overlay-content {
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            max-height: 800px;
        }

        .overlay-content h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .overlay-content .inputs {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .overlay-content .inputs input {
            padding: 10px;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        .overlay-content .overlay-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
            align-items: center;
        }

        .overlay-content .overlay-buttons button {
            padding: 10px 20px;
            background-color: #FFD60A;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .overlay-content .overlay-buttons button:hover {
            background-color: #e0b500;
        }
        #image-preview-container {
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 5px;
            display: inline-block;
            text-align: center;
        }

        #image-preview {
            max-width: 700px;
            max-height: 500px;
            border-radius: 4px;
            display: none; /* Hidden by default */
        }
        .inputs{
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .calendar-day.highlighted {
            background-color: white;
            color: #14213D;
            border: #FFD60A 2px solid;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1px;
        }
        .highlighted-text {
            font-size: 12px;
            color: #14213D;
            text-align: center;
            margin-top: 5px;
        }
        .notification-container {
            position: absolute;
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
        <li data-href="/ekranusistema/ievade/">
            <img class="icon" src="https://img.icons8.com/?size=100&id=4pyL65nYepD6&format=png&color=000000"> Ierakstu pārvaldība
        </li>
        <li data-href="/ekranusistema/ekranu-parvaldiba/">
            <img class="icon" src="https://img.icons8.com/?size=100&id=7gXZp7fqAo1J&format=png&color=000000"> Ekrānu pārvaldība
        </li>
        <li data-href="/ekranusistema/izmainas/">
            <img class="icon" src="https://img.icons8.com/?size=100&id=sKp0dy2A108d&format=png&color=000000"> Izmaiņu pārvaldība
        </li>
        <li data-href="/ekranusistema/palidziba/">
            <img class="icon" src="https://img.icons8.com/?size=100&id=646&format=png&color=000000"> Palīdzība
        </li>
    </ul>
    <div class="logout">
        <button id="logout-button"> ➜ Izrakstīties</button>
    </div>
</div>
<main>
    <div class="calendar">
        <div class="calendar-header">
            <button id="prev-month">❮</button>
            <h2 id="calendar-title">Kalendārs</h2>
            <button id="next-month">❯</button>
        </div>
        <div class="weekday-row" id="weekday-row">
            <!-- Weekdays will be populated here -->
        </div>
        <div class="calendar-grid" id="calendar-grid">
            <!-- Days of the month will be populated here -->
        </div>
    </div>
</main>
<div id="calendar-overlay" style="display:none;">
    <div class="overlay-content">
        <h2 id="overlay-date">Izvēlētā diena</h2>
        <div class="inputs">
            <input type="file" id="image-upload" accept=".png,.jpg,.jpeg,.pdf">
            <button id="paste-button"> <img class="sicon" src="https://img.icons8.com/?size=100&id=5416&format=png&color=000000"> Ielīmēt no starpliktuves</button>
        </div>
        <div id="image-preview-container">
            <img id="image-preview" src="" alt="Preview" style="display:none;">
        </div>
        <div class="overlay-buttons">
            <button id="save-image">Saglabāt</button>
            <button id="delete-image" style="display:none;">Dzēst</button>
            <button id="close-overlay">Aizvērt</button>
        </div>
    </div>
    <div id="notification-container" class="notification-container"></div>
</div>
<script>
    const monthNames = [
        "Janvāris", "Februāris", "Marts", "Aprīlis", "Maijs", "Jūnijs",
        "Jūlijs", "Augusts", "Septembris", "Oktobris", "Novembris", "Decembris"
    ];

    document.addEventListener('DOMContentLoaded', function () {
        const daysOfWeek = ["P", "O", "T", "C", "P", "S", "Sv"];
        const weekdayRow = document.getElementById('weekday-row');
        const calendarGrid = document.getElementById('calendar-grid');
        const calendarTitle = document.getElementById('calendar-title');
        const highlightedDates = [];
        const menuItems = document.querySelectorAll('.menu li');
        menuItems.forEach(item => {
            item.style.cursor = 'pointer';
            item.addEventListener('click', () => {
                const href = item.getAttribute('data-href');
                if (href) {
                    window.location.href = href;
                }
            });
        });

        document.getElementById('logout-button').addEventListener('click', () => {
            window.location.href = '/ekranusistema/';
        });

        fetchHighlightedDates()
            .then(dates => {
                highlightedDates.push(...dates);
                generateCalendar(currentMonth, currentYear);
            })
            .then(() => {
                if (highlightedDates.length > 0) {
                    processInactiveDates();
                } else {
                    console.warn("No highlighted dates available to process.");
                }
            })
            .catch(error => {
                console.error('Error fetching highlighted dates:', error);
            });
        async function fetchHighlightedDates() {
            try {
                const response = await fetch('/ekranusistema/wp-content/themes/ekranu-theme/get-highlited-dates.php');
                if (!response.ok) throw new Error('Failed to fetch highlighted dates');
                const data = await response.json();
                console.log('Fetched Dates:', data.dates);
                return data.dates || [];
            } catch (error) {
                console.error('Error fetching highlighted dates:', error);
                return [];
            }
        }

        function populateWeekdays() {
            daysOfWeek.forEach(day => {
                const cell = document.createElement('div');
                cell.classList.add('weekday-cell');
                cell.textContent = day;
                weekdayRow.appendChild(cell);
            });
        }

        function generateCalendar(month, year) {
            console.log('Generating calendar for:', month, year);
            calendarGrid.innerHTML = '';

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const numDays = lastDay.getDate();

            calendarTitle.textContent = `${monthNames[month]} ${year}`;

            const firstDayOfWeek = getCorrectDayIndex(firstDay.getDay());

            for (let i = 0; i < firstDayOfWeek; i++) {
                const blankCell = document.createElement('div');
                blankCell.classList.add('calendar-day');
                calendarGrid.appendChild(blankCell);
            }

            const today = new Date();

            for (let day = 1; day <= numDays; day++) {
                const dayCell = document.createElement('div');
                dayCell.classList.add('calendar-day');
                dayCell.textContent = day;
                dayCell.style.userSelect = 'none';

                const currentDate = new Date(year, month, day);

                if (today.getDate() === day && today.getMonth() === month && today.getFullYear() === year) {
                    dayCell.classList.add('today');
                    dayCell.style.backgroundColor = '#ffffff';
                    dayCell.style.color = '#FFD60A';
                    dayCell.style.borderColor = '#14213D';
                }

                const formattedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                if (highlightedDates.includes(formattedDate)) {
                    dayCell.classList.add('highlighted');
                    const label = document.createElement('div');
                    label.classList.add('highlighted-text');
                    label.textContent = "Izmaiņas augšupielādētas";
                    dayCell.appendChild(label);
                }

                const fourDaysAgo = new Date(today);
                fourDaysAgo.setDate(today.getDate() - 4);

                if (currentDate < fourDaysAgo) {
                    dayCell.style.opacity = '0.3';

                    dayCell.style.pointerEvents = 'none';
                    dayCell.title = 'Datums neaktīvs';
                } else {
                    dayCell.addEventListener('click', () => {
                        openOverlay(year, month, day);
                    });
                }

                calendarGrid.appendChild(dayCell);
            }
        }
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();

        populateWeekdays();

        document.getElementById('prev-month').addEventListener('click', function () {
            if (currentMonth === 0) {
                currentMonth = 11;
                currentYear--;
            } else {
                currentMonth--;
            }
            generateCalendar(currentMonth, currentYear);
        });

        document.getElementById('next-month').addEventListener('click', function () {
            if (currentMonth === 11) {
                currentMonth = 0;
                currentYear++;
            } else {
                currentMonth++;
            }
            generateCalendar(currentMonth, currentYear);
        });

        const overlay = document.getElementById('calendar-overlay');
        const overlayDate = document.getElementById('overlay-date');
        const closeOverlayButton = document.getElementById('close-overlay');

        async function openOverlay(year, month, day) {
            const formattedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const isHighlighted = highlightedDates.includes(formattedDate);

            overlayDate.textContent = `${day} ${monthNames[month]} ${year}`;
            overlayDate.setAttribute('data-date', formattedDate);

            document.querySelector('.inputs').style.display = 'none';
            if (isHighlighted) {
                try {
                    const response = await fetch(`/ekranusistema/wp-content/themes/ekranu-theme/get-image.php?date=${formattedDate}`);
                    if (!response.ok) throw new Error('Failed to fetch image.');

                    const blob = await response.blob();
                    if (!blob.type.startsWith('image/')) throw new Error('Invalid image format.');

                    const imgUrl = URL.createObjectURL(blob);
                    const imgElement = document.getElementById('image-preview');
                    imgElement.src = imgUrl;
                    imgElement.style.display = 'block';
                    document.getElementById('image-preview-container').style.display = 'block';

                    document.getElementById('save-image').style.display = 'none';
                    document.getElementById('delete-image').style.display = 'block';
                } catch (error) {
                    console.error('Error loading image:', error.message);
                    document.getElementById('image-preview').src = '';
                    alert('Neizdevās ielādēt attēlu. Lūdzu, mēģiniet vēlreiz.');
                }
            } else {
                document.querySelector('.inputs').style.display = 'flex';
                document.getElementById('image-preview-container').style.display = 'none';

                document.getElementById('save-image').style.display = 'block';
                document.getElementById('delete-image').style.display = 'none';
            }

            overlay.style.display = 'flex';
            overlay.focus();

        }
        overlay.addEventListener('paste', (event) => {
            const clipboardItems = event.clipboardData.items;

            for (const item of clipboardItems) {
                if (item.type.startsWith('image/')) {
                    const file = item.getAsFile();
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const preview = document.getElementById('image-preview');
                            const previewContainer = document.getElementById('image-preview-container');

                            preview.src = e.target.result;
                            preview.style.display = 'block';
                            previewContainer.style.display = 'block';
                        };
                        reader.readAsDataURL(file);

                        const imageInput = document.getElementById('image-upload');
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        imageInput.files = dataTransfer.files;
                    }
                }
            }
        });
        document.addEventListener('paste', (event) => {
            if (overlay.style.display === 'flex' && event.target !== overlay) {
                event.stopPropagation();
                overlay.dispatchEvent(new ClipboardEvent('paste', event));
            }
        });
        const pasteButton = document.getElementById('paste-button');

        pasteButton.addEventListener('click', async () => {
            try {
                const clipboardItems = await navigator.clipboard.read();
                for (const item of clipboardItems) {
                    if (item.types.includes('image/png') || item.types.includes('image/jpeg')) {
                        const blob = await item.getType(item.types[0]);
                        const file = new File([blob], 'pasted-image.png', { type: blob.type });

                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const preview = document.getElementById('image-preview');
                            const previewContainer = document.getElementById('image-preview-container');

                            preview.src = e.target.result;
                            preview.style.display = 'block';
                            previewContainer.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                        const imageInput = document.getElementById('image-upload');
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        imageInput.files = dataTransfer.files;

                        console.log('Image pasted successfully using the button.');
                        return;
                    }
                }
                showNotification('Nekas nav saglabāts starpliktuvē', 'error');
            } catch (error) {
                console.error('Failed to paste from clipboard:', error);
                alert('Neizdevās ielīmēt no starpliktuves.');
            }
        });
        closeOverlayButton.addEventListener('click', () => {
            overlay.style.display = 'none';
        });
        document.getElementById('image-upload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.getElementById('image-preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });



        document.getElementById('image-upload').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');
            const previewContainer = document.getElementById('image-preview-container');

            if (!file) {
                preview.src = '';
                preview.style.display = 'none';
                previewContainer.style.display = 'none';
                return;
            }

            const fileExtension = file.name.split('.').pop().toLowerCase();

            if (fileExtension === 'pdf') {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const pdfData = new Uint8Array(e.target.result);

                    pdfjsLib.getDocument(pdfData).promise.then(function (pdf) {
                        pdf.getPage(1).then(function (page) {
                            const scale = 1.5;
                            const viewport = page.getViewport({ scale: scale });
                            const canvas = document.createElement('canvas');
                            const context = canvas.getContext('2d');

                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            page.render({
                                canvasContext: context,
                                viewport: viewport
                            }).promise.then(function () {
                                preview.src = canvas.toDataURL();
                                preview.style.display = 'block';
                                previewContainer.style.display = 'block';
                            }).catch(function (err) {
                                console.error('Error rendering PDF page:', err);
                                alert('Neizdevās renderēt PDF lapu.');
                            });
                        }).catch(function (err) {
                            console.error('Error getting PDF page:', err);
                            alert('Neizdevās iegūt PDF lapu.');
                        });
                    }).catch(function (err) {
                        console.error('Error loading PDF document:', err);
                        alert('Neizdevās ielādēt PDF dokumentu.');
                    });
                };
                reader.readAsArrayBuffer(file);
            } else {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    previewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('save-image').addEventListener('click', async () => {
            const imageInput = document.getElementById('image-upload');
            const file = imageInput?.files[0];

            if (!file) {
                alert('Lūdzu izvēlieties attēlu, lai turpinātu.');
                return;
            }

            const selectedDate = document.getElementById('overlay-date')?.getAttribute('data-date');
            if (!selectedDate) {
                alert('Datums nav izvēlēts vai ir nederīgs.');
                return;
            }

            const formData = new FormData();
            formData.append('image', file);
            formData.append('chosen_date', selectedDate);

            try {
                const response = await fetch('/ekranusistema/wp-content/themes/ekranu-theme/upload-image.php', {
                    method: 'POST',
                    body: formData,
                });

                if (!response.ok) throw new Error(`Servera kļūda: ${response.status} ${response.statusText}`);

                const data = await response.json();
                if (data.success) {
                    showNotification('Attēls veiksmīgi saglabāts!.', 'success');
                    setTimeout(() => {
                        location.reload(); // Refresh after 2 seconds
                    }, 2000);
                } else {
                    alert(`Error: ${data.message || 'Unknown error'}`);
                }
            } catch (error) {
                console.error('Kļūda:', error);
                alert(`Radās kļūda, augšupielādējot attēlu: ${error.message}`);
            }
        });
    });
    document.getElementById('delete-image').addEventListener('click', async () => {
        const selectedDate = document.getElementById('overlay-date')?.getAttribute('data-date');
        if (!selectedDate) {
            alert('Datums nav norādīts.');
            return;
        }

        try {
            const response = await fetch('/ekranusistema/wp-content/themes/ekranu-theme/delete-image.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ date: selectedDate }),
            });

            if (response.ok) {
                showNotification('Attēls veiksmīgi dzēsts!', 'success');
                setTimeout(() => {
                    location.reload(); // Refresh after 2 seconds
                }, 2000);
            } else {
                throw new Error('Dzēšana neizdevās.');
            }
        } catch (error) {
            console.error('Dzēšana neizdevās:', error);
            showNotification('Dzēšana neizdevās. Lūdzu mēģiniet vēlreiz.', 'error');
        }
    });
    function getCorrectDayIndex(dayIndex) {
        return (dayIndex + 6) % 7;
    }
    async function processInactiveDates() {
        if (!highlightedDates || highlightedDates.length === 0) {
            console.warn('No highlighted dates to process.');
            return;
        }

        const today = new Date();
        const threeDaysAgo = new Date(today);
        threeDaysAgo.setDate(today.getDate() - 3);

        const inactiveDates = highlightedDates.filter(dateStr => {
            const date = new Date(dateStr);
            return date < threeDaysAgo;
        });

        for (const date of inactiveDates) {
            await deletePictureForDate(date);
            await deleteDateFromDatabase(date);
        }
    }
    async function deletePictureForDate(date) {
        try {
            const response = await fetch('/ekranusistema/wp-content/themes/ekranu-theme/delete-image.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ date }),
            });

            const data = await response.json();
            if (data.success) {
                console.log(`Image deleted successfully for date: ${date}`);
            } else {
                console.warn(`Could not delete image for date: ${date}. Message: ${data.message}`);
            }
        } catch (error) {
            console.error(`Error deleting image for date: ${date}`, error);
        }
    }
    async function deleteDateFromDatabase(date) {
        try {
            const response = await fetch('/ekranusistema/wp-content/themes/ekranu-theme/delete-date.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ date })
            });

            if (!response.ok) throw new Error(`Failed to delete database row for date: ${date}`);

            const data = await response.json();
            if (data.success) {
                console.log(`Database row deleted successfully for date: ${date}`);
            } else {
                console.warn(`Could not delete database row for date: ${date}. Message: ${data.message}`);
            }
        } catch (error) {
            console.error(`Error deleting database row for date: ${date}`, error);
        }
    }
    function showNotification(message, type = 'error') {
        const container = document.getElementById('notification-container');
        const notification = document.createElement('div');
        notification.classList.add('notification');

        if (type === 'success') {
            notification.style.backgroundColor = '#4CAF50';
        } else {
            notification.style.backgroundColor = '#f44336';
        }

        notification.textContent = message;
        container.appendChild(notification);

        setTimeout(() => {
            notification.remove();
        }, 4000);
    }
</script>
</body>
</html>
