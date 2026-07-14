# DevJobs

Aplicación web de listado de ofertas de empleo: publicá vacantes, gestioná candidaturas y administrá el ciclo completo de una oferta laboral.

Proyecto académico de desarrollo web con Laravel y Livewire.

## Stack

- Backend: Laravel 12 (PHP 8.2+)
- Frontend: Livewire 4.3, Tailwind CSS 3, Alpine.js 3
- Base de datos: MySQL
- Autenticación: Laravel Breeze
- Confirmaciones y alertas: SweetAlert2
- Testing: Pest 4
- Build de assets: Vite 6

## Requisitos previos

- PHP >= 8.2
- Composer
- Node.js y npm
- MySQL/MariaDB

## Instalación

1. Cloná el repositorio

```
git clone https://github.com/lucas99morel/devjobs.git
cd devjobs
```

2. Instalá dependencias de PHP

```
composer install
```

3. Instalá dependencias de Node

```
npm install
```

4. Configurá el entorno

Copiá el archivo de ejemplo y generá la key de la aplicación:

```
copy .env.example .env
php artisan key:generate
```

Editá las variables `DB_*` en `.env` con tus credenciales de MySQL y creá la base de datos manualmente antes de migrar.

5. Corré las migraciones

```
php artisan migrate --seed
```

6. Compilá los assets (CSS/JS)

```
npm run build
```

7. Levantá la aplicación

En dos terminales separadas:

```
php artisan serve
```

```
npm run dev
```

8. Abrí el navegador en `http://localhost:8000`

Nota: los comandos de este README están pensados para Windows CMD. Si usás PowerShell o una terminal Unix (Mac/Linux), algunos comandos (como copiar archivos) pueden variar.

## Funcionalidades

- Registro e inicio de sesión (Laravel Breeze)
- Publicación y gestión de ofertas de empleo (CRUD)
- Autorización por rol mediante Laravel Policies
- Manejo global de excepciones de autorización
- Confirmaciones de acciones destructivas con SweetAlert2
- Envío de notificaciones por correo (Gmail SMTP)
- Interfaz reactiva con Livewire (sin recargar la página)
- Modo oscuro (dark mode)
