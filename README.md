# Client Manager Service

## Introduction
Client Manager Service is a Laravel + Inertia.js + Vue.js-based CMS designed for internal admin use. This service allows administrators to efficiently manage client data, stock-related blog posts, and other content-driven assets within the Tabtab ecosystem.

## ⚙️ Tech Stack

- Laravel 11
- Inertia.js
- Vue 3
- Laravel Breeze
- Docker

## 🐳 Getting Started (with Docker)

1. Clone the repository:
    ```bash
   git clone https://github.com/phongtrantabtab/client-manager-service.git
   cd client-manager-service
   ```
2. Build project:
   - Copy env file:
       ```bash
       cp .env.example .env
       ```
   - Build docker:
       ```bash
       docker compose up --build
       ```
3. Build Laravel:
    ```bash
   docker exec -it cms_worker bash
    ```
    ```bash
   composer install
    ```
4. Migrate database:
    ```bash
   php artisan migrate
    ```
5. Rewrite domain (optional):
- 🛠️ Host Rewrite Setup Guide:
     This guide explains how to set up a custom host (e.g., `cms.tabtab.docker`) to point to your local development environment.

  - 🧩 Step 1: Add Host Entry

      To access the project via a custom domain (like `cms.tabtab.docker`), add an entry to your system's hosts file:

    - For macOS / Linux

        ```bash
        sudo nano /etc/hosts
        ```
      Add the following line at the bottom:
        ```bash
        127.0.0.1 cms.tabtab.docker
        ```
    - For Window
        1. Open Notepad as Administrator
        2. Open the file: C:\Windows\System32\drivers\etc\hosts
        3. Add:
            ```bash
           127.0.0.1 cms.tabtab.docker
            ```
         
  - 🌐 Step 2: Access the App

      After the setup, you can visit:
      ```bash
      http://cms.tabtab.docker:8080
      ```
- ✅ Notes

  Make sure the container or dev server is running and listening on 127.0.0.1:80

    You may need to clear DNS cache:

    - macOS: ```sudo dscacheutil -flushcache; sudo killall -HUP mDNSResponder```

    - Windows: ```ipconfig /flushdns```

## 📚 Database Connection Guide

This service is configured to work with **multiple database connections**. This guide outlines how to define and use custom database connections in your codebase.

1. 🔧 Configuration

    All database connections are defined in .env:
    
    ```env
    DB_CONNECTION=mysql
    DB_HOST=cms_mysql
    DB_PORT=3306
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    
    DB_AUTH_CONNECTION=mysql
    DB_AUTH_HOST=authuserservice-mysql-1
    DB_AUTH_PORT=3306
    DB_AUTH_DATABASE=
    DB_AUTH_USERNAME=
    DB_AUTH_PASSWORD=
    
    DB_POST_CONNECTION=mysql
    DB_POST_HOST=postuserservice-mysql-1
    DB_POST_PORT=3306
    DB_POST_DATABASE=
    DB_POST_USERNAME=
    DB_POST_PASSWORD=
    
    DB_PAYMENT_CONNECTION=mysql
    DB_PAYMENT_HOST=paymentuserservice-mysql-1
    DB_PAYMENT_PORT=3306
    DB_PAYMENT_DATABASE=
    DB_PAYMENT_USERNAME=
    DB_PAYMENT_PASSWORD=
    
    ```
    ``authuserservice-mysql-1``, ``postuserservice-mysql-1``, ``paymentuserservice-mysql-1`` is container name of docker images

2. 🔧 Create network:
   
    CMS worker needs to be connected to MySQL services from other Docker containers to be able to connect to the database.

   - Check your network list:
   ```bash
   docker network ls
   ```
   - Connect network:
   ```bash
   docker network connect auth_network cms_worker
   ```
   ``auth_network``: network of the service you want to connect.

   ``cms_worker``: container process source laravel of the cms.

## Author
#### Phong Tran
Email: [phong.tran@tabtab.me](https://github.com/phongtrantabtab)

GitHub: [github/phongtrantabtab](https://github.com/phongtrantabtab)
