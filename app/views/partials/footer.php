</div>
<footer class="bg-dark text-white text-center text-lg-start">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Về <strong><?= setting('title') ?></strong></h5>
                <p><?= html_entity_decode(setting('footer_content')) ?></p>
            </div>
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <div class="fb-page" data-href="<?= setting('facebook_fanpage_id') ?>" data-tabs="timeline" data-width="500" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="<?= setting('facebook_fanpage_id') ?>" class="fb-xfbml-parse-ignore"><a href="<?= setting('facebook_fanpage_id') ?>">Ngo Quoc Dat</a></blockquote>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Được phiển triển bởi
        <a class="text-light" href="https://ngoquocdat.com/"><strong>Ngô Quốc Đạt</strong></a>
    </div>
</footer>

<script src="/assets/frontend/plugins/fancyapps/fancybox.js"></script>
<script src="/assets/frontend/js/mdb.min.js"></script>
<script src="/assets/frontend/js/app.js"></script>
</body>

</html>