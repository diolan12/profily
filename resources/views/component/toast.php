<script>
    // Client-side toast
    if (app.href.hasParam('toast')) {
        app.toast(app.href.getParam('toast')).show();
        app.href.clearParams();
    }

    <?php if ($toast !== null) : ?>
        // Server-side toast
        app.toast('<?= $toast ?>').show();
        app.href.clearParams();
    <?php endif; ?>
</script>