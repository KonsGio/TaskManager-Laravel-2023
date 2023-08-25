# Task Manager Web Application![Task Manager Screenshot](/public/images/TaskManager.png)

This is a simple web application for managing tasks. Users can create, edit, mark as complete, restore, and delete tasks.

## Prerequisites
Make sure to have the following tools configured on your machine:

- PHP 7.3 or later
- Composer
- Laravel

## Getting Started

1. **Clone the Repository**

    ```bash
    git clone https://github.com/KonsGio/TaskManager-Laravel-2023.git
    ```

2. **Install Dependencies**

    ```bash
    composer install
    ```
3. **Create .env File**
    Laravel projects use an .env file to store environment-specific configuration. You need to create a copy of the .env.example file and name it .env.

    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key**
    The .env file contains an APP_KEY parameter that needs to be set. Generate a unique application key by running:
    
    ```bash
    php artisan key:generate
    ```
    
5. **Start the Development Server**

    Run the following command to start the built-in PHP development server:

    ```bash
    php artisan serve
    ```

    The application will be accessible at `http://localhost:8000`.

## Usage

1. **Home Page**

   Access the Task Manager at [http://localhost:8000](http://localhost:8000).

2. **Create Task**

   Click the "Add New Task" button to create a new task.

3. **Complete Task**

   Click the checkbox next to a task to mark it as complete.

4. **Restore Task**

   If a task is completed, a "Restore" button will appear. Click it to restore the task.

5. **Edit Task**

   Click the "Edit" button next to a task to edit its title.

6. **Delete Task**

   Click the "Delete" button next to a task to delete it.

