<div class="section row">
    <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card">
            <div class="card-image">
                <?php if ($config->web->banner->val1 != null) : ?>
                    <img src="<?= asset('img/' . $config->web->banner->val1) ?>">
                <?php else : ?>
                    <img src="<?= asset('img/no-image-icon.png') ?>">
                    <span class="card-title">Tidak ada banner tersimpan</span>
                <?php endif; ?>
                <span class="<?= $config->web->style->val1 ?> <?= $config->web->style->val2 ?>" style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; font-size: 1.8rem">Text here</span>
            </div>
            <div class="card-content">
                <span class="card-title">Brand Banner Setting</span>
                <div class="row">
                    <div class="col s12 hide">
                        <p>Disarankan mengunggah banner dengan dimensi 1200 x 900 yang sudah terkompres</p>
                    </div>
                    <div class="input-field col s12 center">
                        <select onchange="textColorChanged(this)">
                            <option value="" disabled selected>Choose main accent</option>
                            <?php foreach (materialColor() as $key => $value) : ?>
                                <option value="<?= $key ?>-text" <?php if ($key . '-text' == $config->web->style->val1) echo 'selected' ?>><?= $key ?>-text</option>
                            <?php endforeach; ?>
                        </select>
                        <label>Text Color</label>
                    </div>
                    <?php if (($config->color->accent->val1 != 'white-text') || ($config->color->accent->val1 != 'black-text')) : ?>
                        <div class="input-field col s12 center">
                            <select id="background-mod" onchange="textColorModChanged(this)">
                                <option value="" disabled selected>Choose background modifier</option>
                                <?php foreach (materialColor()[$config->color->background->val1] as $mod => $hex) : ?>
                                    <option value="text-<?= $mod ?>" <?php if ('text-' . $mod == $config->web->style->val2) echo 'selected' ?>><?= $mod ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label>Text Color Modifier</label>
                        </div>
                    <?php endif; ?>
                    <div class="input-field col s12">
                        <input id="action-val1" type="text" class="validate" value="<?= $config->web->action->val1 ?>" data-length="512">
                        <label for="action-val1">Action Button Text</label>
                        <span class="helper-text" data-error="Text too long"></span>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="action-val2" class="materialize-textarea validate" data-length="512"><?= $config->web->action->val2 ?></textarea>
                        <label for="action-val2">Action Button Link</label>
                        <span class="helper-text" data-error="Text too long"></span>
                    </div>
                    <div class="file-field input-field col s12 hide">
                        <form action="<?= rootDashboard('banner') ?>" method="post" enctype="multipart/form-data">
                            <div class="btn">
                                <span>Ganti</span>
                                <input onchange="upload(this)" name="banner" type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                            <button id="submit" type="submit" name="action" class="hide">upload</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-action right-align">
                <a id="save-action" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
                    Simpan
                    <i class="material-icons left">save_as</i>
                </a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function textColorChanged(ele) {
        var data = {
            val1: ele.value,
            val2: ''
        }
        app.http.put("<?= root('api/config/where/key/style') ?>", data, (response, code) => {
            app.toast('Text color changed to ' + ele.value).next()
            app.reload()
        }, () => {
            app.toast('Failed to change text color').show();
        });
    }

    function textColorModChanged(ele) {
        var data = {
            val2: ele.value
        }
        app.http.put("<?= root('api/config/where/key/style') ?>", data, (response, code) => {
            app.toast('Text color modifier changed to ' + ele.value).next()
            app.reload()
        }, () => {
            app.toast('Failed to change text color modifier').show();
        });
    }
    $('#save-action').click(() => {
        var data = {
            val1: $('#action-val1').val(),
            val2: $('#action-val2').val()
        }
        app.http.put("<?= root('api/config/where/key/action') ?>", data, (response, code) => {
            app.toast('Action Button updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update Action Button').show();
        });
    });

    function upload(input) {
        $('#submit').click();
    }
</script>