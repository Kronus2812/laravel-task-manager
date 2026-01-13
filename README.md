# Laravel Task Manager ✅

Gestor de tareas construido con **Laravel 11** como parte de mi plan profesional 2026. Permite a cada usuario gestionar sus tareas con autenticación, dashboard y filtros por estado.

## 🚀 Características principales

- Autenticación completa con **Laravel Breeze** (registro, login, logout).
- CRUD de tareas:
  - Crear, listar, editar y eliminar tareas.
  - Cada usuario solo ve sus propias tareas.
- Dashboard con estadísticas:
  - Total de tareas.
  - Tareas pendientes.
  - Tareas completadas.
- Filtros por estado:
  - Ver todas, solo **Pending** o solo **Completed**.
- Validaciones:
  - La fecha límite (`due_date`) debe ser hoy o una fecha futura.
- Orden de tareas:
  - Las tareas se ordenan por fecha más cercana primero.
- Pruebas automatizadas con **PHPUnit** para autenticación y módulo de tareas.

## 🧰 Tecnologías utilizadas

- PHP 8.x
- Laravel 11
- MySQL
- Blade + Tailwind CSS
- PHPUnit

## ⚙️ Instalación

```bash
# Clonar el repositorio
git clone https://github.com/Kronus2812/laravel-task-manager.git
cd laravel-task-manager

# Instalar dependencias PHP
composer install

# Instalar dependencias de Node
npm install
npm run build  # o npm run dev en desarrollo
