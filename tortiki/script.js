document.addEventListener('DOMContentLoaded', function() {
    // Элементы
    const filterTabs = document.querySelectorAll('.filter-tab');
    const sections = document.querySelectorAll('.equipment-section');
    const filterContainer = document.querySelector('.filter-container');
    const filterContainerWrapper = document.createElement('div');
    
    // Создаем обертку для фильтров
    filterContainerWrapper.className = 'filter-container-wrapper';
    filterContainer.parentNode.insertBefore(filterContainerWrapper, filterContainer);
    filterContainerWrapper.appendChild(filterContainer);
    
    // Переменные для отслеживания скролла
    let lastScrollY = window.scrollY;
    let ticking = false;
    const scrollThreshold = 100;

    // Плавная прокрутка к разделам
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            e.preventDefault();
            
            filterTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Обработчик скролла
    window.addEventListener('scroll', function() {
        lastScrollY = window.scrollY;
        
        if (!ticking) {
            window.requestAnimationFrame(function() {
                updateActiveSection();
                updateFilterPosition();
                ticking = false;
            });
            ticking = true;
        }
    });

    // Обновление активного раздела
    function updateActiveSection() {
        let currentSection = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            
            if (window.pageYOffset >= (sectionTop - 200) && 
                window.pageYOffset < (sectionTop + sectionHeight - 200)) {
                currentSection = '#' + section.getAttribute('id');
            }
        });
        
        filterTabs.forEach(tab => {
            tab.classList.remove('active');
            if (tab.getAttribute('href') === currentSection) {
                tab.classList.add('active');
            }
        });
    }

    // Обновление позиции фильтров
    function updateFilterPosition() {
        const filterOffsetTop = filterContainerWrapper.offsetTop;
        
        if (lastScrollY > filterOffsetTop + scrollThreshold) {
            filterContainer.classList.add('sticky');
        } else {
            filterContainer.classList.remove('sticky');
        }
    }

    // Инициализация Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    });

    observer.observe(filterContainer);
});

document.addEventListener('DOMContentLoaded', function() {
    // Обработчики кнопок "Выбрать"
    document.querySelectorAll('.book-btn').forEach(button => {
      button.addEventListener('click', function() {
        const card = this.closest('.equipment-card');
        const equipmentId = card.dataset.id || '1'; // Добавьте data-id в карточки
        const equipmentName = card.querySelector('h3').textContent;
        const dailyPrice = parseInt(card.querySelector('.card-price').textContent.match(/\d+/)[0]);
        const specs = card.querySelector('.card-specs').innerHTML;
        
        // Заполняем модальное окно
        document.getElementById('modalEquipmentId').value = equipmentId;
        document.getElementById('modalEquipmentName').value = equipmentName;
        document.getElementById('modalDailyPrice').value = dailyPrice;
        document.getElementById('modalEquipmentTitle').textContent = equipmentName;
        document.getElementById('modalEquipmentSpecs').innerHTML = specs;
        document.getElementById('modalPriceDisplay').textContent = dailyPrice;
        
        // Показываем модальное окно
        document.getElementById('rentModal').style.display = 'flex';
      });
    });
    
    // Закрытие модального окна
    document.querySelector('.close-modal').addEventListener('click', function() {
      document.getElementById('rentModal').style.display = 'none';
    });
    
    // Расчет стоимости при изменении дат
    const startDate = document.getElementById('startDate');
    const endDate = document.getElementById('endDate');
    
    [startDate, endDate].forEach(input => {
      input.addEventListener('change', calculateTotal);
    });
    
    function calculateTotal() {
      if (startDate.value && endDate.value) {
        const dailyPrice = parseInt(document.getElementById('modalDailyPrice').value);
        const start = new Date(startDate.value);
        const end = new Date(endDate.value);
        
        if (end < start) {
          document.getElementById('totalPrice').textContent = 'Неверные даты';
          return;
        }
        
        const diffTime = Math.abs(end - start);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
        const total = diffDays * dailyPrice;
        
        document.getElementById('totalPrice').textContent = total;
      }
    }
  });
  
  


  // Автоматическое скрытие уведомлений
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('hide');
            setTimeout(() => alert.remove(), 500);
        }, 8000); // Скрыть через 8 секунд
        
        // Закрытие по клику
        alert.addEventListener('click', function() {
            this.classList.add('hide');
            setTimeout(() => this.remove(), 500);
        });
    });
});

// В script.js добавьте проверку дат
document.getElementById('rentForm').addEventListener('submit', function(e) {
    const startDate = new Date(document.getElementById('startDate').value);
    const endDate = new Date(document.getElementById('endDate').value);
    
    if (endDate < startDate) {
        e.preventDefault();
        alert('Дата окончания не может быть раньше даты начала!');
        return false;
    }
    
    // Показываем индикатор загрузки
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Оформление...';
    return true;
});