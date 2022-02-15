<div class="container">
    <div class="row">
        <div class="lastest-news pb-5">
            <h1>Últimas Notícias</h1>
            <span class="news-bar"></span>
        </div>
        <div class="container col-12 ms-lg-5 ms-auto d-flex flex-column">
            <div class="content-slides col-lg-7 col-xl-8 col-6 mx-5">
                <div class="content-wrapper ms-5">
                    <?php echo do_shortcode('[lastest-post]'); ?>
                </div>
            </div>
        </div>
        <div class="container-fluid block-slides-ui">
            <div class="navegation">
                <div class="arrow prev"></div>
                <div class="progress-bar"></div>
                <div class="arrow next"></div>
            </div>
            <div class="count-posts col-xl-6 col-5">
                <span id="actual-post" class="count actual"></span>
                <span class="count slash">/</span>
                <span id="total-post" class="count total"></span>
            </div>
        </div>
    </div>
</div>