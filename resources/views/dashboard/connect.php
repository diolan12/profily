<div class="row">
    <div class="col s12 center">
        <h5>Connect</h5>
        <button class="btn waves-effect waves-light modal-trigger" data-target="add-link">Tambah
            <i class="material-icons right">add</i>
        </button>
    </div>
    <?php foreach ($config->connect as $link) : ?>
        <div class="col s12 m6 xl4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title"><?= $link->val3 ?></span>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="connect-text-<?= $link->id ?>" type="text" value="<?= $link->val3 ?>" class="validate">
                            <label for="connect-text-<?= $link->id ?>">Text</label>
                        </div>
                        <div class="input-field col s12">
                            <select id="connect-type-<?= $link->id ?>">
                                <option value="" disabled>Choose link type</option>
                                <option value="email" <?php if ($link->val1 == 'email') echo 'selected' ?>>Email</option>
                                <option value="phone" <?php if ($link->val1 == 'phone') echo 'selected' ?>>Telepon</option>
                                <option value="link" <?php if ($link->val1 == 'link') echo 'selected' ?>>Link</option>
                            </select>
                            <label>Type</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="connect-link-<?= $link->id ?>" type="<?= $link->val1 == 'email' ? 'email' : 'text' ?>" value="<?= $link->val2 ?>" class="validate">
                            <label for="connect-link-<?= $link->id ?>">Link</label>
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
        <h5>Link Baru</h5>
        <div class="row">
            <div class="input-field col s12">
                <input id="connect-text-add" type="text" class="validate">
                <label for="connect-text-add">Text</label>
            </div>
            <div class="input-field col s12">
                <select id="connect-type-add">
                    <option value="" disabled selected>Choose link type</option>
                    <option value="email">Email</option>
                    <option value="phone">Telepon</option>
                    <option value="link">Link</option>
                </select>
                <label>Type</label>
            </div>
            <div class="input-field col s12">
                <input id="connect-link-add" type="text" class="validate">
                <label for="connect-link-add">Link</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a onclick="add()" class="modal-close btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">Tambah</a>
    </div>
</div>
<script type="text/javascript">
    function save(id) {
        var text = $('#connect-text-' + id).val();
        var type = $('#connect-type-' + id).val();
        var link = $('#connect-link-' + id).val();
        var data = {
            val1: type,
            val2: link,
            val3: text
        };
        app.http.put("<?= root('api/config/') ?>" + id, data, (response, code) => {
            app.toast('Link for ' + text + ' updated').next()
            app.reload()
        }, () => {
            app.toast('Failed to update ' + text + ' link').show();
        });
    }

    function add() {
        const increment = <?= count((array) $config->connect) + 1 ?>;
        var text = $('#connect-text-add').val();
        var type = $('#connect-type-add').val();
        var link = $('#connect-link-add').val();
        var data = {
            key: 'connect_' + increment,
            type: 'connect',
            val1: type,
            val2: link,
            val3: text
        };
        app.http.post("<?= root('api/config') ?>", data, (response, code) => {
            app.toast('Link for ' + text + ' added').next()
            app.reload()
        }, () => {
            app.toast('Failed to add ' + text + ' link').show();
        });
    }

    function del(id) {
        if (confirm('Are you sure you want to delete?')) {
            app.http.delete("<?= root('api/config/') ?>" + id + '?force', (response, code) => {
                app.toast('Link deleted').next()
                app.reload()
            }, () => {
                app.toast('Failed to delete link').show();
            });
        }
    }
</script>