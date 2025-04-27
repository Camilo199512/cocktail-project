# 🍹 Cócteles App - Proyecto Laravel

Aplicación web desarrollada en Laravel que permite:

- Autenticación de usuarios (login manual sin Breeze)
- Consumo de la API pública [TheCocktailDB](https://www.thecocktaildb.com/)
- Guardar, editar y eliminar cócteles en base de datos
- Diseño de lujo usando Bootstrap 5, Material Design 3 y jQuery
- Protección de todas las vistas mediante login obligatorio

---

## 🚀 Tecnologías Utilizadas

- Laravel 11
- PHP 8.x
- MySQL / MariaDB
- Bootstrap 5.3
- Material Design for Bootstrap (MDB 7.1)
- jQuery 3.7
- TheCocktailDB API

---

## ⚙️ Paso a Paso para Instalar y Ejecutar

### 📥 1. Clonar el repositorio

Abre tu terminal y ejecuta:

```bash
git clone https://github.com/tu_usuario/cocktails-app.git
cd cocktails-app
```

### 📦 2. Instalar dependencias de PHP y Node.js
Copia el archivo .env.example a .env:

```bash
composer install
npm install && npm run dev
```

### ⚙️ 3. Configurar archivo .env
Copia el archivo .env.example a .env:

```bash
cp .env.example .env
```

### 🛠️ 4. Configurar la base de datos
En el archivo .env, configura los datos de tu base MySQL:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=TheCocktailDB
DB_USERNAME=root
DB_PASSWORD=tu_contraseña
```
Importante: Crea la base de datos en tu MySQL:
```bash
CREATE DATABASE cocktails_db;
```

### 🗄️ 5. Ejecutar migraciones
Crea las tablas necesarias en la base de datos:

```bash
php artisan migrate
```

### 👤 6. Crear un usuario administrador
Utilizaremos Tinker para crear el primer usuario:

```bash
php artisan tinker
```
Dentro de la consola Tinker:
```bash
\App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
]);
```
Luego escribe:
```bash
exit
```

### 🧪 7. Iniciar el servidor local
Ejecuta el servidor de desarrollo de Laravel:

```bash
php artisan serve
```
Accede en tu navegador a:
```bash
http://127.0.0.1:8000
```

### 🔐 Credenciales de Acceso Predeterminadas
- Email: admin@example.com
- Contraseña: password

### 🛠️ Funcionalidades del Sistema
- Pantalla de login personalizada.
- Listado de cócteles obtenidos desde API externa.
- Guardado de cócteles en la base de datos local.
- Edición y eliminación de cócteles almacenados.
- Diseño moderno, adaptativo y atractivo.
- Sistema de autenticación manual usando Auth::attempt.
- Middleware de protección en todas las rutas.

### 📚 Créditos
- [Laravel Framework](https://laravel.com/)
- [Bootstrap 5](https://getbootstrap.com/)
- [Material Design for Bootstrap](https://mdbootstrap.com/)
- [TheCocktailDB API](https://www.thecocktaildb.com/)

### ✨ Autor
- Desarrollado por Camilo Andres Bogota Castro 🚀
- GitHub: [https://github.com/Camilo199512](https://github.com/Camilo199512)
