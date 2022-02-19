<div class="row">
    <div class="col s12 m6 xl4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Information</span>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="val1" id="information-val1" type="text" value="<?= $config->brand->information->val1 ?>" class="validate">
                        <label for="information-val1">Brand Name</label>
                    </div>
                    <div class="input-field col s12">
                        <input name="val2" id="information-val2" type="text" value="<?= $config->brand->information->val2 ?>" class="validate">
                        <label for="information-val2">Official Name</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="val3" id="information-val3" class="materialize-textarea"><?= $config->brand->information->val3 ?></textarea>
                        <label for="information-val3">Address</label>
                    </div>
                </div>
            </div>
            <div class="card-action right-align">
                <a id="save-information" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
                    Simpan
                    <i class="material-icons left">save</i>
                </a>
            </div>
        </div>
    </div>
    <div class="col s12 m6 xl4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">About</span>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="val1" id="about-val1" class="materialize-textarea"><?= $config->brand->about->val1 ?></textarea>
                        <label for="about-val1">About</label>
                    </div>
                </div>
            </div>
            <div class="card-action right-align">
                <a id="save-about" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
                    Simpan
                    <i class="material-icons left">save</i>
                </a>
            </div>
        </div>
    </div>
    <div class="col s12 m6 xl4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Slogan</span>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="val1" id="slogan-val1" class="materialize-textarea"><?= $config->brand->slogan->val1 ?></textarea>
                        <label for="slogan-val1">Slogan</label>
                    </div>
                </div>
            </div>
            <div class="card-action right-align">
                <a id="save-slogan" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
                    Simpan
                    <i class="material-icons left">save</i>
                </a>
            </div>
        </div>
    </div>
    <div class="col s12 m6 xl4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Vision</span>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea name="val1" id="vision-val1" class="materialize-textarea"><?= $config->brand->vision->val1 ?></textarea>
                        <label for="vision-val1">Visi</label>
                    </div>
                </div>
            </div>
            <div class="card-action right-align">
                <a id="save-vision" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
                    Simpan
                    <i class="material-icons left">save</i>
                </a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#save-information').click(() => {
        var data = {
            val1: $('#information-val1').val(),
            val2: $('#information-val2').val(),
            val3: $('#information-val3').val()
        };
        app.http.put("<?= root('api/config/10') ?>", data, (response, code) => {
            app.toast('Information updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update information').show();
        });
    })
    $('#save-slogan').click(() => {
        var data = {
            val1: $('#slogan-val1').val()
        };
        app.http.put("<?= root('api/config/11') ?>", data, (response, code) => {
            app.toast('Slogan updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update slogan').show();
        });
    })
    $('#save-about').click(() => {
        var data = {
            val1: $('#about-val1').val()
        };
        app.http.put("<?= root('api/config/12') ?>", data, (response, code) => {
            app.toast('About updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update about').show();
        });
    })
</script>