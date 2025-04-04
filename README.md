# 📌 MediaHub - Gestión de Colecciones de Entretenimiento

## 📖 Descripción
**MediaHub** es una aplicación desarrollada en Laravel que permite a los usuarios gestionar sus colecciones personales de películas, series y videojuegos. Los usuarios pueden crear listas personalizadas, valorar contenido y organizar su entretenimiento de manera eficiente.

## 🎯 Objetivos del Proyecto
- Desarrollar una aplicación con **Laravel, Breeze y Blade**.
- Implementar **autenticación de usuarios** y control de acceso.
- Aplicar **roles** a los usuarios para bloquear rutas y acciones.
- Permitir a los usuarios **crear, modificar y gestionar colecciones**.
- Agregar funcionalidades de **reseñas y valoraciones**.
- Integrar un **sistema de categorías y filtrado** para mejorar la navegación.
- Aplicar **migraciones, seeders y factories** para la base de datos.
- Diseñar una **interfaz atractiva** con Tailwind CSS.

## 🏗️ Estructura de la Base de Datos
| Tabla | Descripción |
|-------|------------|
| **users** | Almacena la información de los usuarios registrados. |
| **media** | Contiene películas, series y videojuegos con sus respectivos datos. |
| **categories** | Clasificación de los diferentes tipos de contenido. |
| **collections** | Listas personalizadas creadas por los usuarios. |
| **reviews** | Reseñas y valoraciones de los usuarios sobre el contenido. |
| **watchlist** | Contenido guardado para ver más tarde. |
| **platforms** | Plataformas donde está disponible el contenido (Netflix, PS5, Steam, etc.). |
| **media_platform** | Relación muchos a muchos entre medios y plataformas. |

## ⚙️ Tecnologías Utilizadas
- **Laravel 12** (Framework Backend)
- **Laravel Breeze** (Autenticación)
- **Blade + Tailwind CSS** (Frontend)
- **MySQL** (Base de datos)
- **Eloquent ORM** (Gestión de modelos)
- **Factories & Seeders** (Generación de datos de prueba)
- **Middleware** (Control de acceso y permisos)

## 🚀 Funcionalidades Principales
- 🔐 **Autenticación y gestión de usuarios** con Laravel Breeze.
- 📂 **Creación y gestión de colecciones personalizadas**.
- ⭐ **Valoración y reseñas** sobre cada contenido.
- 📜 **Listas de reproducción y favoritos**.
- 🔎 **Búsqueda y filtrado por categorías y plataformas**.
- 📊 **Visualización de estadísticas de usuario**.

## 🔄 Rutas Principales
```plaintext
GET    /               # Página de inicio
GET    /login          # Iniciar sesión
GET    /register       # Registro de usuario
GET    /dashboard      # Panel de usuario
GET    /media          # Listado de contenido
GET    /media/{id}     # Detalle de un contenido
POST   /collections    # Crear colección
GET    /watchlist      # Listado de pendientes
POST   /reviews        # Agregar reseña
```

## 🧮 Diseño UML Base de Datos
![Diseño UML Base de Datos](public/images/uml/mediHub.png)

# Instalación del Proyecto Laravel

Este es un proyecto basado en Laravel que utiliza varias herramientas como `npm`, `Vite` y `PHP`. Para instalar y configurar el proyecto, sigue los siguientes pasos.

## Requisitos previos

Antes de comenzar, asegúrate de tener las siguientes herramientas instaladas en tu máquina:

- [PHP](https://www.php.net/) (se recomienda versión 8.0 o superior)
- [Composer](https://getcomposer.org/) (para gestionar dependencias de PHP)
- [Node.js](https://nodejs.org/) (se recomienda versión LTS)
- [npm](https://www.npmjs.com/) (gestor de paquetes de Node.js)

## Pasos para la instalación

### 1. Clonar el repositorio

Primero, clona el repositorio a tu máquina local usando Git:

```bash
git clone https://github.com/Sante21/mediaHub.git
cd mediaHub
```

### 2. Instalar las dependencias de PHP

Instala las dependencias de PHP utilizando Composer. Esto descargará las bibliotecas necesarias para ejecutar Laravel.

```bash
composer install
```

### 3. Instalar las dependencias de Node.js

Instala las dependencias de JavaScript y herramientas como Vite utilizando npm. Esto descargará las dependencias necesarias para el frontend.

```bash
npm install
```

### 4. Configurar la base de datos

Configura la conexión a la base de datos en el archivo .env. Asegúrate de definir las variables correspondientes, como:

```javascript
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### 5. Iniciar el servidor de desarrollo

Ahora que todas las dependencias están instaladas y configuradas, puedes iniciar el servidor de desarrollo de Laravel con el siguiente comando:

```bash
composer run dev
```
