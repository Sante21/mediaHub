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

## 📅 Plan de Desarrollo
1️⃣ **Semana 1**: Diseño de la base de datos y configuración inicial de Laravel.  
2️⃣ **Semana 2**: Implementación de autenticación y CRUD de contenido.  
3️⃣ **Semana 3**: Desarrollo de colecciones y listas de seguimiento.  
4️⃣ **Semana 4**: Mejoras en la UI/UX, validaciones y optimización.  

---
📌 **MediaHub** busca ofrecer una experiencia personalizada y amigable para organizar el entretenimiento de los usuarios. ¡Vamos a construirlo juntos! 🚀
