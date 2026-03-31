# ✅ TODO-LIST

> Приложение для управления задачами на Laravel 12 + Inertia + Vue 3

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-3-4FC08D?style=for-the-badge&logo=vue.js&logoColor=white)
![Inertia](https://img.shields.io/badge/Inertia-1.x-9553E9?style=for-the-badge&logo=inertia&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)

[![Demo](https://img.shields.io/badge/🚀_Demo-009D91?style=for-the-badge)](https://todo.tatymusya.ru)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

</div>

---

## 📖 Описание

Полнофункциональное приложение для управления задачами (To-Do List) с современным стеком технологий. 
Демонстрирует навыки fullstack-разработки с использованием Laravel Inertia для бесшовной интеграции frontend и backend.

### Возможности:
- ✅ Создание, редактирование, удаление задач (CRUD)
- 📝 Отметка о выполнении
- 🏷️ Категории и теги
- 🔍 Поиск и фильтрация
- 📊 Статистика выполнения
- 🌙 Тёмная тема

---

## 🖼️ Превью

![Dashboard](./assets/dashboard.png)
![Dark Mode](./assets/dark-mode.png)

---

## 🚀 Установка

### Требования

- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL / PostgreSQL / SQLite

### Шаги установки

```bash
# Клонирование репозитория
git clone https://github.com/Tatymusya/TODO-LIST.git
cd TODO-LIST

# Установка PHP зависимостей
composer install

# Копирование .env
cp .env.example .env

# Генерация ключа приложения
php artisan key:generate

# Настройка базы данных в .env
# DB_DATABASE=todo_list
# DB_USERNAME=root
# DB_PASSWORD=secret

# Миграция БД
php artisan migrate --seed

# Установка Node зависимостей
npm install

# Сборка ассетов
npm run build

# Запуск локального сервера
php artisan serve

# Откройте http://localhost:8000
```

---

## 📦 Структура проекта

```
TODO-LIST/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Requests/
│   ├── Models/
│   │   ├── Task.php
│   │   ├── Category.php
│   │   └── User.php
│   └── Providers/
├── resources/
│   ├── js/
│   │   ├── Components/      # Vue компоненты
│   │   ├── Pages/           # Inertia страницы
│   │   ├── Composables/     # Composition API
│   │   └── app.ts
│   ├── css/
│   │   └── app.css
│   └── views/
│       └── app.blade.php
├── routes/
│   └── web.php
├── database/
│   ├── migrations/
│   └── seeders/
├── tests/
│   ├── Feature/
│   └── Unit/
├── package.json
├── composer.json
└── vite.config.js
```

---

## 🛠 Технологический стек

### Backend
| Технология | Версия | Назначение |
|------------|--------|------------|
| Laravel | 12.x | MVC фреймворк |
| PHP | 8.2+ | Язык программирования |
| MySQL | 8.0+ | База данных |
| Inertia.js | 1.x | Мост между Laravel и Vue |

### Frontend
| Технология | Версия | Назначение |
|------------|--------|------------|
| Vue.js | 3.x | UI фреймворк |
| TailwindCSS | 3.x | Стилизация |
| Vite | 5.x | Сборка |

---

## 🎯 API Endpoints

### Tasks

| Метод | URL | Описание |
|-------|-----|----------|
| `GET` | `/tasks` | Список задач |
| `POST` | `/tasks` | Создать задачу |
| `GET` | `/tasks/{id}` | Получить задачу |
| `PUT` | `/tasks/{id}` | Обновить задачу |
| `DELETE` | `/tasks/{id}` | Удалить задачу |
| `PATCH` | `/tasks/{id}/toggle` | Переключить статус |

### Пример запроса

```typescript
// Создание задачи
import { router } from '@inertiajs/vue3';

router.post('/tasks', {
  title: 'Новая задача',
  description: 'Описание задачи',
  due_date: '2026-04-01',
  priority: 'high',
});
```

---

## 🧪 Тесты

```bash
# Запуск всех тестов
php artisan test

# Запуск с покрытием
php artisan test --coverage

# Frontend тесты
npm run test
```

### Пример теста

```php
// tests/Feature/TaskTest.php
public function test_can_create_task(): void
{
    $response = $this->post('/tasks', [
        'title' => 'Test Task',
        'description' => 'Test Description',
    ]);

    $response->assertRedirect('/tasks');
    $this->assertDatabaseHas('tasks', [
        'title' => 'Test Task',
    ]);
}
```

---

## 🎨 Стилизация

### Цветовая схема

```css
/* resources/css/app.css */
:root {
  --primary: #009D91;
  --accent: #FFA700;
  --danger: #FB000D;
  --success: #10B981;
  --dark: #1a1a2e;
  --light: #f5f5f5;
}
```

### Компоненты

```vue
<!-- Components/TaskCard.vue -->
<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps<{
  task: {
    id: number;
    title: string;
    completed: boolean;
    priority: 'low' | 'medium' | 'high';
  };
}>();

const priorityColors = {
  low: 'bg-green-100 text-green-800',
  medium: 'bg-yellow-100 text-yellow-800',
  high: 'bg-red-100 text-red-800',
};
</script>

<template>
  <div :class="['p-4 rounded-lg shadow', task.completed ? 'bg-gray-100' : 'bg-white']">
    <h3 :class="{ 'line-through': task.completed }">{{ task.title }}</h3>
    <span :class="priorityColors[task.priority]">{{ task.priority }}</span>
  </div>
</template>
```

---

## 📱 Скриншоты

### Светлая тема
![Light Theme](./assets/light.png)

### Тёмная тема
![Dark Theme](./assets/dark.png)

### Мобильная версия
![Mobile](./assets/mobile.png)

---

## 🔧 Конфигурация

### .env.example

```env
APP_NAME="TODO List"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_list
DB_USERNAME=root
DB_PASSWORD=secret

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
```

---

## 🚀 Деплой

### Docker

```bash
# Сборка контейнеров
docker-compose build

# Запуск
docker-compose up -d

# Миграция в контейнере
docker-compose exec app php artisan migrate --seed
```

### VPS (Ubuntu)

```bash
# Установка зависимостей
sudo apt update
sudo apt install php8.2 php8.2-cli php8.2-mbstring php8.2-xml php8.2-curl php8.2-mysql
curl -sS https://getcomposer.org/installer | php
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install -y nodejs

# Клонирование и настройка
git clone https://github.com/Tatymusya/TODO-LIST.git /var/www/todo
cd /var/www/todo
composer install --optimize-autoloader --no-dev
npm install && npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📄 Лицензия

MIT License - см. файл [LICENSE](LICENSE)

---

## 👤 Автор

**Татьяна Мусаева**

[![GitHub](https://img.shields.io/badge/GitHub-Tatymusya-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/Tatymusya)
[![Telegram](https://img.shields.io/badge/Telegram-@tatyamusya-2CA5E0?style=for-the-badge&logo=telegram&logoColor=white)](https://t.me/tatyamusya)
[![Email](https://img.shields.io/badge/Email-tatykolcova1234@yandex.ru-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:tatykolcova1234@yandex.ru)

---

## 🤝 Вклад

Pull Request приветствуются!

---

## 📬 Контакты

- **Email:** tatykolcova1234@yandex.ru
- **Telegram:** [@tatyamusya](https://t.me/tatyamusya)

---

<div align="center">

**Made with ❤️ using Laravel + Vue 3**

[⬆ Вернуться к началу](#-todo-list)

</div>
