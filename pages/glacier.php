        <div class="">

            <div class="">
                <h1>Le glacier</h1>
                <div class="col-md-12" id="main-section">
                    <section class="col-md-6 text-align-left" id="main-section1">
                        <?= buildIceForm($parfums, $contenants, $supps) ?>
                    </section>
                    <section class="col-md-6" id="main-section2">
                        <h4>Composition de votre glace</h4>
                        <?= composeGlace($parfums, $contenants, $supps); ?>
                    </section>
                </div>
            </div>

        </div>