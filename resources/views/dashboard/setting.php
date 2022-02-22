<div class="section row">
    <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card grey lighten-1">
            <div class="card-image">
                <?php if ($config->web->brand_logo->val1 != null) : ?>
                    <img src="<?= asset('img/' . $config->web->brand_logo->val1) ?>">
                <?php else : ?>
                    <img src="<?= asset('img/no-image-icon.png') ?>">
                    <span class="card-title">Tidak ada logo tersimpan</span>
                <?php endif; ?>
            </div>
            <div class="card-content">
                <span class="card-title">Brand Logo</span>
                <div class="row">
                    <div class="input-field col s12">
                        Setelan logo
                        <div class="switch center">
                            <label class="black-text">
                                Teks
                                <input id="setting" <?php if ($config->web->brand_logo->val1 == null) echo 'disabled' ?> <?php if ($config->web->brand_type->val1 == 'logo') echo 'checked' ?> type="checkbox">
                                <span class="lever"></span>
                                Gambar
                            </label>
                        </div>
                    </div>
                    <div class="col s12">
                        <p>Disarankan mengunggah logo dengan dimensi 2000 x 500 berformat png yang sudah terkompres</p>
                    </div>
                    <div class="file-field input-field col s12">
                        <form action="<?= rootDashboard('logo') ?>" method="post" enctype="multipart/form-data">
                            <div class="btn">
                                <span>Ganti</span>
                                <input onchange="upload(this)" name="logo" type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                            <button id="submit" type="submit" name="action" class="hide">upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#setting').change(function() {
        var type = 'text';
        if ($(this).is(':checked')) {
            type = 'logo'
        }
        var data = {
            val1: type
        }
        app.http.put("<?= root('api/config/where/key/brand_type') ?>", data, (response, code) => {
            app.toast('Logo type set to ' + type).show()

        }, () => {
            $(this).prop('checked', !$(this).is(':checked'));
            app.toast('Failed to change logo type').show()
        });
    })

    function upload(input) {
        $('#submit').click();
    }
</script>