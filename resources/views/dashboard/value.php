<div class="row">
    <div class="col s12 center">
        <h5>Value</h5>
        <a class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" href="https://fonts.google.com/icons?selected=Material+Icons" target="_blank">See Icons Reference</a>
        <button class="btn waves-effect waves-light modal-trigger" data-target="add-value">Tambah
            <i class="material-icons right">add</i>
        </button>
    </div>
    <?php foreach ($config->value as $value) : ?>
        <div class="col s12 m6 xl4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><i id="value-preview-<?= $value->id ?>" class="material-icons <?= color($config->color->accent, true) ?>"><?= $value->val1 ?></i></span>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="value-icon-<?= $value->id ?>" onkeyup="iconChanged(<?= $value->id ?>)" type="text" value="<?= $value->val1 ?>" class="validate" data-length="512">
                            <label for="value-icon-<?= $value->id ?>">Icon</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="value-title-<?= $value->id ?>" type="text" value="<?= $value->val2 ?>" class="validate" data-length="512">
                            <label for="value-title-<?= $value->id ?>">Title</label>
                            <span class="helper-text" data-error="Text too long"></span>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="value-text-<?= $value->id ?>" class="materialize-textarea validate" data-length="512"><?= $value->val3 ?></textarea>
                            <label for="value-text-<?= $value->id ?>">Text</label>
                            <span class="helper-text" data-error="Text too long"></span>
                        </div>
                    </div>
                </div>
                <div class="card-action right-align">
                    <a onclick="del(<?= $value->id ?>)" class="btn-flat waves-effect waves-light red-text">
                        Hapus
                        <i class="material-icons left">delete</i>
                    </a>
                    <a onclick="save(<?= $value->id ?>)" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
                        Simpan
                        <i class="material-icons left">save</i>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- Modal Structure -->
<div id="add-value" class="modal">
    <div class="modal-content">
        <a class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" href="https://fonts.google.com/icons?selected=Material+Icons" target="_blank">See Icons Reference</a>
        <h4 class="center"><i id="value-preview-0" class="material-icons <?= color($config->color->accent, true) ?>">favorite</i></h4>
        <div class="row">
            <div class="input-field col s12">
                <input id="value-icon-0" onkeyup="iconChanged(0)" type="text" class="validate">
                <label for="value-icon-0">Icon</label>
                <span class="helper-text">Example: android</span>
            </div>
            <div class="input-field col s12">
                <input id="value-title-0" type="text" class="validate" data-length="512">
                <label for="value-title-0">Title</label>
                <span class="helper-text" data-error="Text too long"></span>
            </div>
            <div class="input-field col s12">
                <textarea id="value-text-0" class="materialize-textarea validate" data-length="512"></textarea>
                <label for="value-text-0">Text</label>
                <span class="helper-text" data-error="Text too long"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a onclick="add()" class="modal-close btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">Tambah</a>
    </div>
</div>
<script type="text/javascript">
    function iconChanged(id) {
        var icon = $('#value-icon-' + id).val()
        console.log(icon)
        $('#value-preview-' + id).html(icon);
    }

    function save(id) {
        var icon = $('#value-icon-' + id).val();
        var title = $('#value-title-' + id).val();
        var text = $('#value-text-' + id).val();
        var data = {
            val1: icon,
            val2: title,
            val3: text
        };
        app.http.put("<?= root('api/config/') ?>" + id, data, (response, code) => {
            app.toast('Value updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update value').show();
        });
    }

    function add() {
        const increment = <?= count((array) $config->value) + 1 ?>;
        var icon = $('#value-icon-0').val();
        var title = $('#value-title-0').val();
        var text = $('#value-text-0').val();
        var data = {
            key: 'value_' + increment,
            type: 'value',
            val1: icon,
            val2: title,
            val3: text
        };
        app.http.post("<?= root('api/config') ?>", data, (response, code) => {
            app.toast('Value added').next()
            app.reload()
        }, () => {
            app.toast('Failed to add value').show();
        });
    }

    function del(id) {
        if (confirm('Are you sure you want to delete?')) {
            app.http.delete("<?= root('api/config/') ?>" + id + '?force', (response, code) => {
                app.toast('Value deleted').next()
                app.reload()
            }, () => {
                app.toast('Failed to delete value').show();
            });
        }
    }
</script>