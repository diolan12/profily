<div class="row">
    <div class="col s12 m6 xl4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Information</span>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="val1" id="information-val1" type="text" value="<?= $config->brand->information->val1 ?>" class="validate" data-length="512">
                        <label for="information-val1">Brand Name</label>
                        <span class="helper-text" data-error="Text too long"></span>
                    </div>
                    <div class="input-field col s12">
                        <input name="val3" id="information-val3" type="text" value="<?= $config->brand->information->val3 ?>" class="validate" data-length="512">
                        <label for="information-val3">Official Name</label>
                        <span class="helper-text" data-error="Text too long"></span>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="val2" id="information-val2" class="materialize-textarea validate" data-length="512"><?= $config->brand->information->val2 ?></textarea>
                        <label for="information-val2">Brand Slogan</label>
                        <span class="helper-text" data-error="Text too long"></span>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="val4" id="information-val4" class="materialize-textarea validate" data-length="512"><?= $config->brand->information->val4 ?></textarea>
                        <label for="information-val4">Address</label>
                        <span class="helper-text" data-error="Text too long"></span>
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
                        <input name="val1" id="about-val1" type="text" value="<?= $config->brand->about->val1 ?>" class="validate" data-length="512">
                        <label for="about-val1">Title</label>
                        <span class="helper-text" data-error="Text too long"></span>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="val2" id="about-val2" class="materialize-textarea validate" data-length="512"><?= $config->brand->about->val2 ?></textarea>
                        <label for="about-val2">Content</label>
                        <span class="helper-text" data-error="Text too long"></span>
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
                <span class="card-title">Vision</span>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="val1" id="vision-val1" type="text" value="<?= $config->brand->vision->val1 ?>" class="validate" data-length="512">
                        <label for="vision-val1">Title</label>
                        <span class="helper-text" data-error="Text too long"></span>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="val2" id="vision-val2" class="materialize-textarea validate" data-length="512"><?= $config->brand->vision->val2 ?></textarea>
                        <label for="vision-val2">Text</label>
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
    <div class="col s12 m6 xl4">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Mission</span>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="val1" id="mission-val1" type="text" value="<?= $config->brand->mission->val1 ?>" class="validate" data-length="512">
                        <label for="mission-val1">Title</label>
                        <span class="helper-text" data-error="Text too long"></span>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="val2" id="mission-val2" class="materialize-textarea validate" data-length="512"><?= $config->brand->mission->val2 ?></textarea>
                        <label for="mission-val2">Text</label>
                    </div>
                </div>
            </div>
            <div class="card-action right-align">
                <a id="save-mission" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
                    Simpan
                    <i class="material-icons left">save</i>
                </a>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        // $('input#input_text, textarea#textarea2').characterCounter();
    });
    $('#save-information').click(() => {
        var data = {
            val1: $('#information-val1').val(),
            val2: $('#information-val2').val(),
            val3: $('#information-val3').val(),
            val4: $('#information-val4').val()
        };
        app.http.put("<?= root('api/config/where/key/information') ?>", data, (response, code) => {
            app.toast('Information updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update information').show();
        });
    })
    $('#save-about').click(() => {
        var data = {
            val1: $('#about-val1').val(),
            val2: $('#about-val2').val()
        };
        app.http.put("<?= root('api/config/where/key/about') ?>", data, (response, code) => {
            app.toast('About updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update about').show();
        });
    })
    $('#save-vision').click(() => {
        var data = {
            val1: $('#vision-val1').val(),
            val2: $('#vision-val2').val()
        };
        app.http.put("<?= root('api/config/where/key/vision') ?>", data, (response, code) => {
            app.toast('Vision updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update vision').show();
        });
    })
    $('#save-mission').click(() => {
        var data = {
            val1: $('#mission-val1').val(),
            val2: $('#mission-val2').val()
        };
        app.http.put("<?= root('api/config/where/key/mission') ?>", data, (response, code) => {
            app.toast('Mission updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update mission').show();
        });
    })
</script>