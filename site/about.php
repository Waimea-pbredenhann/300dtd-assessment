
<?php require_once '_config.php'; ?>

<?php require 'partials/top.php'; ?>

    <?php require 'partials/header.php'; ?>

    <main>

        <section>

            <article>

                <h1><?= SITE_NAME ?></h1>

                <p>Find this project on <a href="https://github.com/waimea-dt/php-app">GitHub</a><p>

            </article>
            
            <article>

                <p>This is a simple web app using PHP as the back-end. It provides the following features:

                <ul>
                    <li><strong>CRUD</strong> operations via HTTP request methods: POST, GET, PUT, DELETE</li>
                    <li><strong>Basic Templating</strong> with partials, etc.</li>
                    <li><a href="https://htmx.org/"><strong>HTMX</strong></a> component support</li>
                </ul>

            </article>

        </section>
    
    </main>

    <?php require 'partials/footer.php'; ?>

<?php require 'partials/bottom.php'; ?>
