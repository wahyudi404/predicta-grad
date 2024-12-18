# Laravel Project Setup

Welcome to the Laravel project! This guide will help you set up the project on your local machine for development and testing.

## Prerequisites

Before getting started, make sure you have the following installed:

- [PHP](https://www.php.net/downloads) >= 8.0
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) & [npm](https://www.npmjs.com/) or [Yarn](https://yarnpkg.com/)
- [Git](https://git-scm.com/)
- A web server like [Apache](https://httpd.apache.org/) or [Nginx](https://nginx.org/)

---

## Installation

Follow these steps to set up the project:

1. **Clone the repository**
   ```bash
   git clone https://github.com/wahyudi404/predicta-grad.git
   cd <repository>
2. **Install dependencies Use Composer to install PHP dependencies:**
    ```bash
    composer install
    **Use npm or Yarn to install JavaScript dependencies:**
    ```bash
    npm install
3. **Set up the environment file Copy the .env.example file to .env:**
    ```bash
    cp .env.example .env
    **Update the .env file with your database credentials and other configuration details:**
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=<your_database_name>
    DB_USERNAME=<your_database_user>
    DB_PASSWORD=<your_database_password>
4. **Generate application key Run the following command to generate the application key:**
    ```bash
    php artisan key:generate
5. **Run database migrations Execute migrations to set up the database schema:**
    ```bash
    php artisan migrate
6. **Compile assets Compile CSS and JavaScript assets:**
    ```bash
    npm run dev

## Development Server

Start the development server with:
```bash
php artisan server
```
Visit http://127.0.0.1:8000 in your browser to see the application.

