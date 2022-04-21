        </main>

        <footer class="bg-dark text-white">

                <div class="">
                    <div class="">
                        <?= afficherHoraires()?>
                    </div>
                    <div class="">
                        &copy; moi
                    </div>
                    <div class="">
                        <?= buildMenu('list-group footer-nav', 'nav-item', 'list-group-item')?>
                    </div>
                </div>

        </footer>
        </div>
        <!-- wrapper end -->

        <!-- JQuery (must be placed before bootstrap) -->
        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <!-- Custom JS -->
        <script src="./assets/js/myjs.js"></script>
        <?php echo '<pre style="text-align:left;">';
        print_r($GLOBALS);
        print_r($_SERVER);
        echo '</pre>'; ?>
        </body>

        </html>