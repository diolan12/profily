<div class="row">
    <div class="col s12 center">
        <h5>Value</h5>
        <button class="btn waves-effect waves-light modal-trigger" data-target="add-link">Tambah
            <i class="material-icons right">add</i>
        </button>
    </div>
    <?php foreach ($config->value as $value) : ?>
        <div class="col s12 m6 xl4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><?= $value->val1 ?></span>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="value-title-<?= $value->id ?>" type="text" value="<?= $value->val1 ?>" class="validate">
                            <label for="value-title-<?= $value->id ?>">Title</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="value-text-<?= $value->id ?>" class="materialize-textarea"><?= $value->val2 ?></textarea>
                            <label for="value-text-<?= $value->id ?>">Value</label>
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
<div id="add-link" class="modal">
    <div class="modal-content">
        <h4>Tambah Value</h4>
        <div class="row">
            <div class="input-field col s12">
                <input id="value-title-0" type="text" class="validate">
                <label for="value-title-0">Title</label>
            </div>
            <div class="input-field col s12">
                <textarea id="value-text-0" class="materialize-textarea"></textarea>
                <label for="value-text-0">Value</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a onclick="add()" class="modal-close btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">Tambah</a>
    </div>
</div>
<script type="text/javascript">
    function save(id) {
        var title = $('#value-title-' + id).val();
        var text = $('#value-text-' + id).val();
        var data = {
            val1: title,
            val2: text
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
        var title = $('#value-title-0').val();
        var text = $('#value-text-0').val();
        var data = {
            key: 'value_' + increment,
            type: 'value',
            val1: title,
            val2: text
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