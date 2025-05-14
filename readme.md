# TaskManager - Mini Proyecto en Laravel

Este es un mini proyecto desarrollado en Laravel llamado **TaskManager**, que utiliza SQLite como base de datos para pruebas locales.

## Requisitos

Antes de comenzar, asegúrate de tener instalados los siguientes requisitos en tu máquina:

- [PHP](https://www.php.net/) >= 8.1
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) y [npm](https://www.npmjs.com/)
- [SQLite](https://www.sqlite.org/)

## Instalación

Sigue estos pasos para configurar el proyecto en tu entorno local:

1. **Clona el repositorio**:

   ```bash
   git clone <URL_DEL_REPOSITORIO>
   cd taskmanager
   ```

2. **Instala las dependencias de PHP**:

   ```bash
   composer install
   ```

3. **Instala las dependencias de JavaScript**:

   ```bash
   npm install
   ```

4. **Configura el archivo `.env`**:

   Copia el archivo de ejemplo `.env.example` y renómbralo como `.env`:

   ```bash
   cp .env.example .env
   ```

   Luego, edita el archivo `.env` para configurar SQLite como base de datos:

   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=/ruta/completa/a/database.sqlite
   ```

   Crea el archivo `database.sqlite` en la carpeta `database`:

   ```bash
   touch database/database.sqlite
   ```

5. **Genera la clave de la aplicación**:

   ```bash
   php artisan key:generate
   ```

6. **Ejecuta las migraciones**:

   ```bash
   php artisan migrate
   ```

7. **Compila los assets**:

   ```bash
   npm run dev
   ```

## Uso

Para iniciar el servidor de desarrollo, ejecuta:

```bash
php artisan serve
```

El proyecto estará disponible en [http://localhost:8000](http://localhost:8000).

## Pruebas

Para ejecutar las pruebas, utiliza el siguiente comando:

```bash
php artisan test
```

## Notas

- Este proyecto utiliza SQLite como base de datos para pruebas locales. Si deseas usar otra base de datos, actualiza la configuración en el archivo `.env`.
- Asegúrate de que los permisos de la carpeta `storage` y `bootstrap/cache` sean correctos:

  ```bash
  chmod -R 775 storage bootstrap/cache
  ```

## Contribuciones

Si deseas contribuir a este proyecto, por favor abre un issue o envía un pull request.

## Licencia

Este proyecto está bajo la licencia [MIT](https://opensource.org/licenses/MIT).