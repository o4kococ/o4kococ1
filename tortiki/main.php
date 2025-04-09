<?php
session_start(); 


if (!isset($_SESSION['username'])) {

    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Переход</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="iokmkmkm">
            <a href="register.html" class="big-red-button">Перейти к регистрации</a>
        </div>
    </body>
    </html>
    <?php
} else {

    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Магазин тортов</title>
        <link rel="stylesheet" href="cake_style.css">
    </head>
    <body>
        <!-- Навигационная панель -->
        <nav class="navbar">
            <div class="navbar-container">
                <a href="#top" class="nav-button">Главная</a>
                <span class="divider"></span> 
                <a href="#cakes" class="nav-button">Торты</a>
                <span class="divider"></span> 
                <a href="register.html" class="nav-button">Выйти</a>
            </div>
        </nav>


        <div class="container" id="top">
            <h1>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <h2>Магазин тортов</h2>

          
            <div class="cakes-container" id="cakes">
              
                <div class="cake-card">
                    <img src="img/classic.png" alt="Торт 'Классический'">
                    <h3>Классический торт</h3>
                    <p class="price">Цена: 500 ₽</p>
                    <p class="description">Классический торт с белой шоколадной глазурью и нежным бисквитом.</p>
                </div>

                <div class="cake-card">
                    <img src="img/yagoda.png" alt="Торт 'Фруктовый'">
                    <h3>Фруктовый торт</h3>
                    <p class="price">Цена: 650 ₽</p>
                    <p class="description">Легкий торт с фруктами и взбитыми сливками.</p>
                </div>

              
                <div class="cake-card">
                    <img src="img/pancake.png" alt="Торт 'Чизкейк'">
                    <h3>Чизкейк</h3>
                    <p class="price">Цена: 700 ₽</p>
                    <p class="description">Нежный сырный десерт с ягодным соусом.</p>
                </div>

              
                <div class="cake-card">
                    <img src="img/medovik.png" alt="Торт 'Медовик'">
                    <h3>Медовик</h3>
                    <p class="price">Цена: 550 ₽</p>
                    <p class="description">Слоеный медовый торт с кремом и орехами.</p>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
}
?>