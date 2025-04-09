<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Контакты - ООО "Тепловик-СВ"</title>
    <link rel="stylesheet" href="style.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap");
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Навигационное меню -->
    <header>
      <nav>
        <div class="logo">
          <a href="knopka.php">
            <img src="images/logo.png" alt="Логотип ООО 'Тепловик-СВ'" />
          </a>
        </div>
        <ul class="nav-links">
          <li><a href="about.html">О компании</a></li>
          <li><a href="knopka.php#content-block">Техника</a></li>
          <li><a href="contacts.php" class="active">Контакты</a></li>
        </ul>
      </nav>      
    </header>

    <!-- Основной контент страницы "Контакты" -->
    <main class="contacts-container">
        <section class="contacts-section">
            <h1>Наши контакты</h1>
            
            <div class="contacts-content">
                <div class="contacts-info">
                    <h2>Контактная информация</h2>
                    
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h3>Адрес</h3>
                            <p>680000, г. Хабаровск, ул. Нагорная, д. 5 А., офис 204</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h3>Телефон</h3>
                            <p><a href="tel:+79241021177">+7 (924) 102-11-77</a></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3>Email</h3>
                            <p><a href="mailto:info@teplovik-sv.ru">info@teplovik-sv.ru</a></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h3>Режим работы</h3>
                            <p>Пн-Пт: 09:00 - 18:00</p>
                            <p>Сб-Вс: выходной</p>
                        </div>
                    </div>
                    
                    <div class="social-contacts">
                        <h3>Мы в соцсетях:</h3>
                        <div class="social-icons">
                            <a href="https://wa.me/79241021177" target="_blank" class="social-icon whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://t.me/eeeeezi" target="_blank" class="social-icon telegram">
                                <i class="fab fa-telegram"></i>
                            </a>
                            <a href="viber://chat?number=79241021177" class="social-icon viber">
                                <i class="fab fa-viber"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="contacts-map">
                    <h2>Мы на карте</h2>
                    <div class="map-container">
                        <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/76/khabarovsk/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Хабаровск</a><a href="https://yandex.ru/maps/76/khabarovsk/house/nagornaya_ulitsa_5a/ZUoDaAZgQUcPXUJua2JydnliYQ0=/?from=mapframe&ll=135.108280%2C48.375155&source=mapframe&um=constructor%3A1a2b3c4d5e6f7g8h9i0j1k2l3m4n5o6p&utm_medium=mapframe&utm_source=maps&z=16.7" style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация, поиск мест</a><iframe src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=135.108280%2C48.375155&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgg1NjEyNzEzNBJC0KDQvtGB0YHQuNGPLCDQpdCw0LHQsNGA0L7QstGB0LosINCd0LDQs9C-0YDQvdCw0Y8g0YPQu9C40YbQsCwgNdCQIgoNuBsHQxUpgEFC&source=mapframe&um=constructor%3A1a2b3c4d5e6f7g8h9i0j1k2l3m4n5o6p&utm_source=mapframe&z=16.7" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
                        
                    </div>
                    <div class="map-note">
                        <p>Наш офис находится в промышленной зоне города. Для посещения офиса необходимо заранее согласовать время визита.</p>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">

        <h2>Обратная связь</h2>
        <?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<div class="alert success">Спасибо! Ваше сообщение отправлено.</div>';
    } elseif ($_GET['status'] == 'error') {
        $error = $_GET['message'] ?? 'Неизвестная ошибка';
        echo '<div class="alert error">Ошибка: '.htmlspecialchars($error).'</div>';
    }
}
?>
        <form action="send_feedback.php" method="POST">
            <div class="form-group">
                <input type="text" name="name" placeholder="Ваше имя" required>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" placeholder="Ваш телефон" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Ваш email">
            </div>
            <div class="form-group">
                <textarea name="message" placeholder="Ваше сообщение" rows="4"></textarea>
            </div>
            <button type="submit" class="submit-btn">Отправить сообщение</button>
        </form>
    </div>
        </section>
    </main>

    <!-- Подвал -->
    <footer>
      <p>&copy; 2025 ООО "Тепловик-СВ". Все права защищены.</p>
    </footer>

    <!-- Фиксированные иконки контактов -->
    <div class="fixed-contact-icons">
        <a href="https://wa.me/79241021177" target="_blank" class="icon whatsapp">
          <i class="fab fa-whatsapp"></i>
        </a>
        <a href="https://t.me/eeeeezi" target="_blank" class="icon telegram">
          <i class="fab fa-telegram"></i>
        </a>
        <a href="tel:+79241021177" class="icon phone">
          <i class="fas fa-phone"></i>
        </a>
    </div>
</body>
</html>