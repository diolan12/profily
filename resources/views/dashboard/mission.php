<div class="row">
    <div class="col s12 center">
        <h5>Mission</h5>
        <a class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" href="https://fonts.google.com/icons?selected=Material+Icons" target="_blank">See Icons Reference</a>
        <button class="btn waves-effect waves-light modal-trigger" data-target="add-link">Tambah
            <i class="material-icons right">add</i>
        </button>
    </div>
    <?php foreach ($config->mission as $link) : ?>
        <div class="col s12 m6 xl4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><i id="mission-preview-<?= $link->id ?>" class="material-icons <?= color($config->color->accent, true) ?>"><?= $link->val1 ?></i></span>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="mission-icon-<?= $link->id ?>" onkeyup="iconChanged(<?= $link->id ?>)" type="text" value="<?= $link->val1 ?>" class="validate">
                            <label for="mission-icon-<?= $link->id ?>">Icon</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="mission-text-<?= $link->id ?>" class="materialize-textarea"><?= $link->val2 ?></textarea>
                            <label for="mission-text-<?= $link->id ?>">Mission</label>
                        </div>
                    </div>
                </div>
                <div class="card-action right-align">
                    <a onclick="del(<?= $link->id ?>)" class="btn-flat waves-effect waves-light red-text">
                        Hapus
                        <i class="material-icons left">delete</i>
                    </a>
                    <a onclick="save(<?= $link->id ?>)" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
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
        <a class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" href="https://fonts.google.com/icons?selected=Material+Icons" target="_blank">See Icons Reference</a>
        <h4 class="center"><i id="mission-preview-0" class="material-icons <?= color($config->color->accent, true) ?>">favorite</i></h4>
        <div class="row">
            <div class="input-field col s12">
                <input id="mission-icon-0" onkeyup="iconChanged(0)" type="text" class="validate">
                <label for="mission-icon-0">Icon</label>
                <span class="helper-text" data-error="wrong" data-success="right">Example: android</span>
            </div>
            <div class="input-field col s12">
                <textarea id="mission-text-0" class="materialize-textarea"></textarea>
                <label for="mission-text-0">Mission</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a onclick="add()" class="modal-close btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">Tambah</a>
    </div>
</div>
<script type="text/javascript">
    function iconChanged(id) {
        var icon = $('#mission-icon-' + id).val()
        console.log(icon)
        $('#mission-preview-' + id).html(icon);
    }

    function save(id) {
        var icon = $('#mission-icon-' + id).val();
        var text = $('#mission-text-' + id).val();
        var data = {
            val1: icon,
            val2: text
        };
        app.http.put("<?= root('api/config/') ?>" + id, data, (response, code) => {
            app.toast('Mission updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update mission').show();
        });
    }

    function add() {
        const increment = <?= count((array) $config->mission) + 1 ?>;
        var icon = $('#mission-icon-0').val();
        var text = $('#mission-text-0').val();
        var data = {
            key: 'mission_' + increment,
            type: 'mission',
            val1: icon,
            val2: text
        };
        app.http.post("<?= root('api/config') ?>", data, (response, code) => {
            app.toast('Mission added').next()
            app.reload()
        }, () => {
            app.toast('Failed to add mission').show();
        });
    }

    function del(id) {
        if (confirm('Are you sure you want to delete?')) {
            app.http.delete("<?= root('api/config/') ?>" + id + '?force', (response, code) => {
                app.toast('Mission deleted').next()
                app.reload()
            }, () => {
                app.toast('Failed to delete mission').show();
            });
        }
    }
</script>