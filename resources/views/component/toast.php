<?php if ($toast !== null) : ?>
    <script>
        setTimeout(function() {
            M.toast({
                html: '<?= $toast?>'
            })
        }, 1000)
    </script>
<?php endif; ?>