<style>
    .cookie-banner {
        position: fixed;
        margin: 0 auto;
        bottom: 40px;
        left: 10%;
        right: 10%;
        width: 80%;
        padding: 5px 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 2px 0 rgb(0 0 0 / 14%), 0 3px 1px -2px rgb(0 0 0 / 12%), 0 1px 5px 0 rgb(0 0 0 / 20%);
    }

    .cookie-banner-close {
        top: 0;
        cursor: pointer;
    }
</style>
<div class="container cookie-banner grey lighten-2" style="display: none">
    <p>We use cookies to collect anonymous data. By using our website, you agree to our <a class="modal-trigger" href="#cookies-policy">cookie policy</a></p>
    <i class="material-icons cookie-banner-close">close</i>
</div>

<!-- Modal Structure -->
<div id="cookies-policy" class="modal bottom-sheet modal-fixed-footer">
    <div class="modal-content">
        <?php $extra['modal'] = true ?>
        <?= view('content.cookies-policy', $extra); ?>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green <?= color($config->color->accent, true) ?> btn-flat">Close</a>
    </div>
</div>
<!--  Scripts-->
<script type="text/javascript">
    if (localStorage.getItem('cookieSeen') != 'shown') {
        $(".cookie-banner").delay(3000).fadeIn();
        localStorage.setItem('cookieSeen', 'shown')
    }

    $('.cookie-banner-close').click(function(e) {
        $('.cookie-banner').fadeOut();
    });
</script>