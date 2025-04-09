<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ООО "Тепловик-СВ" - Аренда строительной техники</title>
    <link rel="stylesheet" href="style.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap");
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<!-- Блок уведомлений -->
<div class="notification-container">
    <?php
    if (isset($_GET['rent_status'])) {
        if ($_GET['rent_status'] == 'success') {
            $equipment = htmlspecialchars($_GET['equipment'] ?? 'техники');
            $days = htmlspecialchars($_GET['days'] ?? '');
            $total = htmlspecialchars($_GET['total'] ?? '');
            
            echo '<div class="alert success">';
            echo '<h3>Аренда оформлена!</h3>';
            echo '<p>Техника: <strong>'.$equipment.'</strong></p>';
            echo '<p>Срок аренды: <strong>'.$days.' дн.</strong></p>';
            echo '<p>Итого: <strong>'.$total.' ₽</strong></p>';
            echo '<p>Мы свяжемся с вами для подтверждения.</p>';
            echo '</div>';
            
        } elseif ($_GET['rent_status'] == 'error') {
            $message = htmlspecialchars($_GET['message'] ?? 'Неизвестная ошибка');
            echo '<div class="alert error">';
            echo '<h3>Ошибка оформления</h3>';
            echo '<p>'.$message.'</p>';
            echo '<p>Пожалуйста, попробуйте еще раз.</p>';
            echo '</div>';
        }
    }
    ?>
</div>

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
          <li><a href="#content-block">Техника</a></li>
          <li><a href="contacts.php">Контакты</a></li>
        </ul>
      
      </nav>      
    </header>

    <!-- Контейнер для видео -->
    <div class="video-container">
      <video autoplay loop muted>
        <source
          src="vecteezy_a-yellow-excavator-works-in-the-mountains-construction-of_31377026.mov"
          type="video/mp4"
        />
      </video>
      <div class="video-logo">
        <ul class="buttom-click">
        <div class="slogan">
          <span class="special-word"> Сделай этот мир лучше </span>
        </div>
        <a href="#content-block" class="button">Подобрать технику</a>
      </div>
    </div>

    <!-- Текстовый слайдер -->
    <div class="text-slide" id="text-slide">
        <div class="slide-track">
            <span>СКИДКА НА ВСЮ ТЕХНИКУ ВЛАДЕЛЬЦАМ КАРТЫ ЛОЯЛЬНОСТИ</span>
            <span>СКИДКА НА ВСЮ ТЕХНИКУ ВЛАДЕЛЬЦАМ КАРТЫ ЛОЯЛЬНОСТИ</span>
            <span>СКИДКА НА ВСЮ ТЕХНИКУ ВЛАДЕЛЬЦАМ КАРТЫ ЛОЯЛЬНОСТИ</span>
            <!-- Дублируем для бесшовной анимации -->
            <span>СКИДКА НА ВСЮ ТЕХНИКУ ВЛАДЕЛЬЦАМ КАРТЫ ЛОЯЛЬНОСТИ</span>
            <span>СКИДКА НА ВСЮ ТЕХНИКУ ВЛАДЕЛЬЦАМ КАРТЫ ЛОЯЛЬНОСТИ</span>
            <span>СКИДКА НА ВСЮ ТЕХНИКУ ВЛАДЕЛЬЦАМ КАРТЫ ЛОЯЛЬНОСТИ</span>
        </div>
    </div>


        <div class="filter-container-wrapper">
            <div class="filter-container">
        <!-- Блок с фильтрами -->
        <div class="content-block" id="content-block">
            <div class="rent-header">
                <h2>Аренда строительной техники в Хабаровске</h2>
                <div class="filter-container"> <!-- Новая обертка для фильтров -->
                    <div class="filter-tabs">
                    <a href="#all" class="filter-tab active">Все</a>
                    <a href="#excavators" class="filter-tab">Экскаваторы</a>
                    <a href="#bulldozers" class="filter-tab">Бульдозеры</a>
                    <a href="#cranes" class="filter-tab">Краны</a>
                    <a href="#mini-equipment" class="filter-tab">Мини-техника</a>
                        </div>
                        </div>
            </div>
        </div>
            </div>
        </div>

<!-- Раздел "Все" -->
<section id="all" class="equipment-section">
    <h3 class="section-title">Вся техника</h3>
    <div class="equipment-cards">
        <!-- Экскаватор -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Экскаваторы</div>
            <img src="images/excavator1.jpg" alt="Экскаватор Hyundai">
            <h3>Hyundai R210LC-9</h3>
            <div class="card-specs">
                <span>2018г. | 21 тонна | Гидравлика</span>
                <ul>
                    <li>Ковш 1.2 м³</li>
                    <li>Гусеничный ход</li>
                    <li>Японский двигатель</li>
                </ul>
            </div>
            <div class="card-price">От 15 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Бульдозер -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Бульдозеры</div>
            <img src="images/bulldozer1.jpg" alt="Бульдозер Caterpillar">
            <h3>Caterpillar D6N</h3>
            <div class="card-specs">
                <span>2019г. | 375 л.с. | Гидромеханика</span>
                <ul>
                    <li>Ширина отвала 3.2 м</li>
                    <li>Полноповоротный отвал</li>
                    <li>Экологичный двигатель</li>
                </ul>
            </div>
            <div class="card-price">От 18 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Мини-экскаватор -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Мини-техника</div>
            <img src="images/mini-excavator1.jpg" alt="Мини-экскаватор Hitachi">
            <h3>Hitachi ZX55U-5</h3>
            <div class="card-specs">
                <span>2020г. | 5.5 тонн | Гидравлика</span>
                <ul>
                    <li>Компактные размеры</li>
                    <li>Поворотная кабина</li>
                    <li>Экономичный расход</li>
                </ul>
            </div>
            <div class="card-price">От 8 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Кран -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Краны</div>
            <img src="images/crane1.jpg" alt="Кран Liebherr">
            <h3>Liebherr LTM 1050-3.1</h3>
            <div class="card-specs">
                <span>2017г. | 50 тонн | Дизель</span>
                <ul>
                    <li>Вылет стрелы 36 м</li>
                    <li>Телескопическая стрела</li>
                    <li>4-секционная</li>
                </ul>
            </div>
            <div class="card-price">От 25 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>
    </div>
</section>

<!-- Раздел "Экскаваторы" -->
<section id="excavators" class="equipment-section">
    <h3 class="section-title">Экскаваторы</h3>
    <div class="equipment-cards">
        <!-- Экскаватор 1 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Экскаваторы</div>
            <img src="images/excavator1.jpg" alt="Экскаватор Hyundai">
            <h3>Hyundai R210LC-9</h3>
            <div class="card-specs">
                <span>2018г. | 21 тонна | Гидравлика</span>
                <ul>
                    <li>Ковш 1.2 м³</li>
                    <li>Гусеничный ход</li>
                    <li>Японский двигатель</li>
                </ul>
            </div>
            <div class="card-price">От 15 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Экскаватор 2 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Экскаваторы</div>
            <img src="images/excavator2.jpg" alt="Экскаватор Hitachi">
            <h3>Hitachi ZX350LC-6</h3>
            <div class="card-specs">
                <span>2019г. | 35 тонн | Гидравлика</span>
                <ul>
                    <li>Ковш 1.6 м³</li>
                    <li>Усиленная стрела</li>
                    <li>Экономичный двигатель</li>
                </ul>
            </div>
            <div class="card-price">От 22 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Экскаватор 3 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Экскаваторы</div>
            <img src="images/excavator3.jpg" alt="Экскаватор Volvo">
            <h3>Volvo EC210D</h3>
            <div class="card-specs">
                <span>2020г. | 22 тонны | Гидравлика</span>
                <ul>
                    <li>Ковш 1.3 м³</li>
                    <li>Тихий двигатель</li>
                    <li>Эргономичная кабина</li>
                </ul>
            </div>
            <div class="card-price">От 17 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>
    


<!-- Экскаватор 4 -->
<div class="equipment-card" data-id="1">
    <div class="card-category">Экскаваторы</div>
    <img src="images/excavator4.jpg" alt="Экскаватор Doosan">
    <h3>Doosan DX300LC-5</h3>
    <div class="card-specs">
        <span>2021г. | 30 тонн | Гидравлика</span>
        <ul>
            <li>Ковш 1.5 м³</li>
            <li>Экономичный двигатель</li>
            <li>Усиленная рама</li>
        </ul>
    </div>
    <div class="card-price">От 20 000 ₽/сутки</div>
    <div class="card-buttons">
        <button class="details-btn">Подробнее</button>
        <button class="book-btn">Выбрать</button>
    </div>
</div>
</div>
</section>

<!-- Раздел "Бульдозеры" -->
<section id="bulldozers" class="equipment-section">
    <h3 class="section-title">Бульдозеры</h3>
    <div class="equipment-cards">
        <!-- Бульдозер 1 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Бульдозеры</div>
            <img src="images/bulldozer1.jpg" alt="Бульдозер Caterpillar">
            <h3>Caterpillar D6N</h3>
            <div class="card-specs">
                <span>2019г. | 375 л.с. | Гидромеханика</span>
                <ul>
                    <li>Ширина отвала 3.2 м</li>
                    <li>Полноповоротный отвал</li>
                    <li>Экологичный двигатель</li>
                </ul>
            </div>
            <div class="card-price">От 18 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Бульдозер 2 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Бульдозеры</div>
            <img src="images/bulldozer2.jpg" alt="Бульдозер Komatsu">
            <h3>Komatsu D65PX-18</h3>
            <div class="card-specs">
                <span>2018г. | 354 л.с. | Гидромеханика</span>
                <ul>
                    <li>Ширина отвала 3.5 м</li>
                    <li>Система GPS</li>
                    <li>Усиленная рама</li>
                </ul>
            </div>
            <div class="card-price">От 20 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Бульдозер 3 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Бульдозеры</div>
            <img src="images/bulldozer3.jpg" alt="Бульдозер Shantui">
            <h3>Shantui SD16</h3>
            <div class="card-specs">
                <span>2020г. | 160 л.с. | Механика</span>
                <ul>
                    <li>Ширина отвала 3.1 м</li>
                    <li>Простая конструкция</li>
                    <li>Надежный двигатель</li>
                </ul>
            </div>
            <div class="card-price">От 12 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Бульдозер 4 -->
        <div class="equipment-card" data-id="1">
    <div class="card-category">Бульдозеры</div>
    <img src="images/bulldozer4.jpg" alt="Бульдозер John Deere">
    <h3>John Deere 700K</h3>
    <div class="card-specs">
        <span>2020г. | 200 л.с. | Гидромеханика</span>
        <ul>
            <li>Ширина отвала 3.0 м</li>
            <li>Комфортная кабина</li>
            <li>Низкий расход топлива</li>
        </ul>
    </div>
    <div class="card-price">От 15 000 ₽/сутки</div>
    <div class="card-buttons">
        <button class="details-btn">Подробнее</button>
        <button class="book-btn">Выбрать</button>
    </div>
</div>
    </div>
</section>


<!-- Раздел "Краны" -->
<section id="cranes" class="equipment-section">
    <h3 class="section-title">Краны</h3>
    <div class="equipment-cards">
        <!-- Кран 1 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Краны</div>
            <img src="images/crane1.jpg" alt="Кран Liebherr">
            <h3>Liebherr LTM 1050-3.1</h3>
            <div class="card-specs">
                <span>2017г. | 50 тонн | Дизель</span>
                <ul>
                    <li>Вылет стрелы 36 м</li>
                    <li>Телескопическая стрела</li>
                    <li>4-секционная</li>
                </ul>
            </div>
            <div class="card-price">От 25 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Кран 2 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Краны</div>
            <img src="images/crane2.jpg" alt="Кран XCMG">
            <h3>XCMG QY25K5-I</h3>
            <div class="card-specs">
                <span>2019г. | 25 тонн | Дизель</span>
                <ul>
                    <li>Вылет стрелы 31 м</li>
                    <li>5-секционная стрела</li>
                    <li>Экономичный расход</li>
                </ul>
            </div>
            <div class="card-price">От 18 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Кран 3 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Краны</div>
            <img src="images/crane3.jpg" alt="Кран Zoomlion">
            <h3>Zoomlion ZTC250V</h3>
            <div class="card-specs">
                <span>2020г. | 25 тонн | Дизель</span>
                <ul>
                    <li>Вылет стрелы 32 м</li>
                    <li>Гидравлическое управление</li>
                    <li>Комфортная кабина</li>
                </ul>
            </div>
            <div class="card-price">От 17 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Кран 4 -->
        <div class="equipment-card" data-id="1">
    <div class="card-category">Краны</div>
    <img src="images/crane4.jpg" alt="Кран Sany">
    <h3>Sany SAC3000</h3>
    <div class="card-specs">
        <span>2021г. | 30 тонн | Дизель</span>
        <ul>
            <li>Вылет стрелы 34 м</li>
            <li>5-секционная стрела</li>
            <li>Эргономичная кабина</li>
        </ul>
    </div>
    <div class="card-price">От 19 000 ₽/сутки</div>
    <div class="card-buttons">
        <button class="details-btn">Подробнее</button>
        <button class="book-btn">Выбрать</button>
    </div>
</div>
    </div>
</section>


<!-- Раздел "Мини-техника" -->
<section id="mini-equipment" class="equipment-section">
    <h3 class="section-title">Мини-техника</h3>
    <div class="equipment-cards">
        <!-- Мини-техника 1 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Мини-техника</div>
            <img src="images/mini-excavator1.jpg" alt="Мини-экскаватор Hitachi">
            <h3>Hitachi ZX55U-5</h3>
            <div class="card-specs">
                <span>2020г. | 5.5 тонн | Гидравлика</span>
                <ul>
                    <li>Компактные размеры</li>
                    <li>Поворотная кабина</li>
                    <li>Экономичный расход</li>
                </ul>
            </div>
            <div class="card-price">От 8 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Мини-техника 2 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Мини-техника</div>
            <img src="images/mini-loader.jpg" alt="Мини-погрузчик JCB">
            <h3>JCB 3CX</h3>
            <div class="card-specs">
                <span>2019г. | 4.5 тонны | Дизель</span>
                <ul>
                    <li>Ковш 1 м³</li>
                    <li>4-колесный привод</li>
                    <li>Гидравлическое управление</li>
                </ul>
            </div>
            <div class="card-price">От 7 000 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Мини-техника 3 -->
        <div class="equipment-card" data-id="1">
            <div class="card-category">Мини-техника</div>
            <img src="images/mini-bulldozer.jpg" alt="Мини-бульдозер Shantui">
            <h3>Shantui SD16S</h3>
            <div class="card-specs">
                <span>2021г. | 6 тонн | Дизель</span>
                <ul>
                    <li>Ширина отвала 2.2 м</li>
                    <li>Компактные размеры</li>
                    <li>Маневренность</li>
                </ul>
            </div>
            <div class="card-price">От 6 500 ₽/сутки</div>
            <div class="card-buttons">
                <button class="details-btn">Подробнее</button>
                <button class="book-btn">Выбрать</button>
            </div>
        </div>

        <!-- Мини-техника 4 -->
<div class="equipment-card" data-id="1">
    <div class="card-category">Мини-техника</div>
    <img src="images/mini-excavator2.jpg" alt="Мини-экскаватор Kubota">
    <h3>Kubota U55-4</h3>
    <div class="card-specs">
        <span>2022г. | 5.8 тонн | Гидравлика</span>
        <ul>
            <li>Компактные размеры</li>
            <li>Низкий уровень шума</li>
            <li>Экономичный двигатель</li>
        </ul>
    </div>
    <div class="card-price">От 9 000 ₽/сутки</div>
    <div class="card-buttons">
        <button class="details-btn">Подробнее</button>
        <button class="book-btn">Выбрать</button>
    </div>
</div>
    </div>
</section>


    <!-- Подвал -->
    <footer>
      <p>&copy; 2025 ООО "Тепловик-СВ". Все права защищены.</p>
    </footer>

    <!-- Строка для подключения JavaScript -->
    <script src="script.js"></script>


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

      <!-- Модальное окно аренды -->
<div class="modal-overlay" id="rentModal" style="display: none;">
    <div class="modal-content">
      <button class="close-modal">&times;</button>
      <h2>Оформление аренды</h2>
      <form id="rentForm" method="POST" action="process_rent.php">
        <input type="hidden" name="equipment_id" id="modalEquipmentId">
        <input type="hidden" name="equipment_name" id="modalEquipmentName">
        <input type="hidden" name="daily_price" id="modalDailyPrice">
        
        <div class="modal-section">
          <h3 id="modalEquipmentTitle"></h3>
          <div id="modalEquipmentSpecs"></div>
          <p>Цена за сутки: <span id="modalPriceDisplay"></span> ₽</p>
        </div>
        
        <div class="modal-section">
          <h3>Период аренды</h3>
          <div class="form-group">
            <label for="startDate">Дата начала:</label>
            <input type="date" id="startDate" name="start_date" required min="<?= date('Y-m-d') ?>">
          </div>
          <div class="form-group">
            <label for="endDate">Дата окончания:</label>
            <input type="date" id="endDate" name="end_date" required>
          </div>
        </div>
        
        <div class="modal-section">
          <h3>Контактные данные</h3>
          <div class="form-group">
            <input type="text" name="client_name" placeholder="Ваше имя" required>
          </div>
          <div class="form-group">
            <input type="tel" name="client_phone" placeholder="Телефон" required>
          </div>
          <div class="form-group">
            <input type="email" name="client_email" placeholder="Email (необязательно)">
          </div>
        </div>
        
        <div class="modal-total">
          <p>Итого к оплате: <span id="totalPrice">0</span> ₽</p>
          <button type="submit" class="submit-btn">Оформить аренду</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>