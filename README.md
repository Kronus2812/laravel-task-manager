# ✅ Laravel Task Manager

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel_11-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=flat&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)

Gestor de tareas construido con **Laravel 11** como parte de mi plan profesional 2026. Permite a cada usuario gestionar sus tareas personales con autenticación completa, dashboard con estadísticas y filtros inteligentes por estado.

---

## 🚀 Características principales

### Autenticación
- Sistema completo con **Laravel Breeze**
- Registro de nuevos usuarios
- Login/Logout seguro
- Protección de rutas con middleware

### Gestión de Tareas (CRUD)
- **Crear**: Formulario para nuevas tareas con título, descripción y fecha límite
- **Listar**: Vista de todas las tareas del usuario autenticado
- **Editar**: Modificar tareas existentes
- **Eliminar**: Eliminación con confirmación
- **Privacidad**: Cada usuario solo ve sus propias tareas

### Dashboard Interactivo
- **Total de tareas** creadas por el usuario
- **Tareas pendientes** (status: Pending)
- **Tareas completadas** (status: Completed)
- Estadísticas en tiempo real

### Filtros y Ordenamiento
- Filtrar por estado:
  - Todas las tareas
  - Solo **Pending**
  - Solo **Completed**
- Orden automático por fecha límite (más cercana primero)

### Validaciones
- Fecha límite (`due_date`) debe ser hoy o futura
- Campos obligatorios con validación server-side
- Mensajes de error claros

### Testing
- Pruebas automatizadas con **PHPUnit**
- Tests de autenticación
- Tests del módulo de tareas

---

## 🛠️ Tecnologías utilizadas

- **PHP 8.2+**
- **Laravel 11** (Framework)
- **MySQL** (Base de datos)
- **Blade** (Motor de plantillas)
- **Tailwind CSS** (Estilos)
- **Laravel Breeze** (Autenticación)
- **PHPUnit** (Testing)
- **Vite** (Build tool)

---

## ⚙️ Instalación

### Requisitos previos
- PHP 8.2 o superior
- Composer
- Node.js y npm
- MySQL o MariaDB

### Pasos de instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/Kronus2812/laravel-task-manager.git
   cd laravel-task-manager
   ```

2. **Instalar dependencias PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node**
   ```bash
   npm install
   ```

4. **Configurar el archivo .env**
   ```bash
   cp .env.example .env
   ```
   
   Editar `.env` con tus credenciales de base de datos:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_manager
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```

5. **Generar la clave de la aplicación**
   ```bash
   php artisan key:generate
   ```

6. **Crear la base de datos**
   Crear la base de datos en MySQL:
   ```sql
   CREATE DATABASE task_manager CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

7. **Ejecutar las migraciones**
   ```bash
   php artisan migrate
   ```

8. **Compilar assets**
   
   **Para desarrollo:**
   ```bash
   npm run dev
   ```
   
   **Para producción:**
   ```bash
   npm run build
   ```

9. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```
   
   La aplicación estará disponible en: `http://localhost:8000`

---

## 📊 Estructura de la Base de Datos

### Tabla: `users`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | BIGINT (PK, AI) | Identificador único |
| `name` | VARCHAR(255) | Nombre del usuario |
| `email` | VARCHAR(255) UNIQUE | Correo electrónico |
| `password` | VARCHAR(255) | Contraseña (hash bcrypt) |
| `created_at` | TIMESTAMP | Fecha de registro |
| `updated_at` | TIMESTAMP | Última actualización |

### Tabla: `tasks`
| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | BIGINT (PK, AI) | Identificador único |
| `user_id` | BIGINT (FK) | ID del usuario propietario |
| `title` | VARCHAR(255) | Título de la tarea |
| `description` | TEXT | Descripción detallada |
| `due_date` | DATE | Fecha límite |
| `status` | ENUM('Pending','Completed') | Estado de la tarea |
| `created_at` | TIMESTAMP | Fecha de creación |
| `updated_at` | TIMESTAMP | Última actualización |

---

## 🧪 Testing

### Ejecutar todas las pruebas
```bash
php artisan test
```

### Ejecutar pruebas con cobertura
```bash
php artisan test --coverage
```

### Pruebas incluidas
- **AuthenticationTest**: Registro, login, logout
- **TaskTest**: CRUD de tareas
- **DashboardTest**: Estadísticas y filtros

---

## 📁 Estructura del Proyecto

```
laravel-task-manager/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── TaskController.php
│   │       └── DashboardController.php
│   ├── Models/
│   │   ├── User.php
│   │   └── Task.php
│   └── Providers/
├── database/
│   ├── migrations/
│   │   └── create_tasks_table.php
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── dashboard.blade.php
│   │   ├── tasks/
│   │   │   ├── index.blade.php
│   │   │   ├── create.blade.php
│   │   │   └── edit.blade.php
│   │   └── layouts/
│   └── js/
├── routes/
│   ├── web.php
│   └── auth.php
├── tests/
│   └── Feature/
│       ├── AuthenticationTest.php
│       └── TaskTest.php
└── README.md
```

---

## 🎯 Uso de la Aplicación

### 1. Registro e Inicio de Sesión
1. Accede a `/register` para crear una cuenta
2. Completa el formulario con nombre, email y contraseña
3. Inicia sesión en `/login`

### 2. Dashboard
- Al iniciar sesión, verás el dashboard con estadísticas:
  - Total de tareas
  - Tareas pendientes
  - Tareas completadas

### 3. Crear una Tarea
1. Click en "Nueva Tarea"
2. Completa:
   - **Título**: Nombre de la tarea
   - **Descripción**: Detalles (opcional)
   - **Fecha límite**: Debe ser hoy o futura
3. Click en "Guardar"

### 4. Gestionar Tareas
- **Ver todas**: Lista completa de tus tareas
- **Editar**: Click en el botón de edición
- **Eliminar**: Click en eliminar (con confirmación)
- **Filtrar**:
  - Todas
  - Solo Pendientes
  - Solo Completadas

### 5. Marcar como Completada
1. Edita la tarea
2. Cambia el estado a "Completed"
3. Guarda los cambios

---

## 🔐 Seguridad

- **Autenticación**: Laravel Breeze con bcrypt para contraseñas
- **Autorización**: Middleware para proteger rutas
- **Políticas**: Cada usuario solo puede ver/editar sus tareas
- **CSRF Protection**: Tokens en todos los formularios
- **Validación**: Server-side validation en todas las entradas
- **SQL Injection**: Protección con Eloquent ORM

---

## 🐛 Troubleshooting

### Error: "SQLSTATE[HY000] [1045] Access denied"
**Solución**: Verifica las credenciales de MySQL en `.env`

### Error: "Vite manifest not found"
**Solución**: Ejecuta `npm install` y luego `npm run build`

### Error: "Class 'PDO' not found"
**Solución**: Habilita la extensión `pdo_mysql` en `php.ini`

### Las migraciones no se ejecutan
**Solución**: 
```bash
php artisan config:clear
php artisan cache:clear
php artisan migrate:fresh
```

---

## Desarrollador

**Kronus2812**

Stack: Frontend, Backend, Python, JavaScript, SQL, PHP, React, CSS, HTML

Repositorio: [github.com/Kronus2812/Laravel-Task-Manager](https://github.com/Kronus2812/laravel-task-manager.git)

---

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

---

## 🙏 Agradecimientos

- [Laravel](https://laravel.com/) por el excelente framework
- [Tailwind CSS](https://tailwindcss.com/) por los estilos
- [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze) por la autenticación
- Comunidad de Laravel en español

---

⭐ **Si este proyecto te fue útil, no olvides darle una estrella en GitHub**
