<h1>Laravel Task Manager</h1>

<p>A simple <strong>Task Management</strong> web application built with <strong>Laravel 12</strong> and <strong>Blade templates</strong>.<br>
Supports full <strong>CRUD operations</strong> for tasks with basic validation.</p>

<hr>

<h2>Features</h2>
<ul>
    <li>Create, read, update, and delete tasks.</li>
    <li>Task fields:
        <ul>
            <li><strong>Title</strong> – required</li>
            <li><strong>Description</strong> – minimum 10 characters</li>
            <li><strong>Status</strong> – <code>todo</code>, <code>doing</code>, <code>done</code></li>
            <li><strong>Deadline</strong> – optional</li>
        </ul>
    </li>
    <li>Each task belongs to a user (hardcoded via seeder).</li>
    <li>Simple and clean Blade templates for UI.</li>
    <li>Fully tested with <strong>PHPUnit</strong> feature tests.</li>
</ul>

<hr>

<h2>Tech Stack</h2>
<ul>
    <li><strong>Backend:</strong> Laravel 12, PHP 8.2+</li>
    <li><strong>Database:</strong> SQLite (default for testing)</li>
    <li><strong>Frontend:</strong> Blade templates, Bootstrap 5</li>
    <li><strong>Testing:</strong> PHPUnit 11</li>
</ul>

<hr>

<h2>Installation</h2>
<ol>
    <li>Clone the repository:
        <pre><code>git clone https://github.com/rickjurrasic/laravel-task-manager.git
cd laravel-task-manager</code></pre>
    </li>
    <li>Install dependencies:
        <pre><code>composer install</code></pre>
    </li>
    <li>Copy <code>.env</code> file:
        <pre><code>cp .env.example .env</code></pre>
    </li>
    <li>Generate application key:
        <pre><code>php artisan key:generate</code></pre>
    </li>
    <li>Run migrations and seed the database:
        <pre><code>php artisan migrate --seed</code></pre>
    </li>
    <li>Start the local development server:
        <pre><code>php artisan serve</code></pre>
    </li>
</ol>
<p>Visit <code>http://localhost:8000</code> to view the app.</p>

<hr>

<h2>Running Tests</h2>
<p>The project includes <strong>feature tests</strong> for all CRUD operations:</p>
<pre><code>php artisan test</code></pre>
<p>All tests should pass.</p>

<hr>

<h2>Screenshots</h2>
<p>Below is an example screenshot of the application interface:</p>
<p><img src="https://raw.githubusercontent.com/RickJurrasic/laravel-task-manager/refs/heads/main/public/screenshots/tasks.png" alt="Task Manager Screenshot" width="800"></p>

<hr>

<h2>Notes</h2>
<ul>
    <li>User authentication is <strong>not implemented</strong>; tasks are assigned to the first seeded user.</li>
    <li>Designed as a <strong>small developer test project</strong>, showcasing Laravel best practices, including migrations, factories, seeders, controllers, and feature tests.</li>
</ul>

<hr>

<h2>License</h2>
<p>MIT</p>
