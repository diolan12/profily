<div class="">
    <div class="section">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <form action="<?= rootDashboard('commodity/' . beauty_to_kebab($data->type->commodity->name) . '/' . $data->type->id) ?>" method="post" enctype="multipart/form-data">

                        <div class="card-content row">

                            <span class="card-title"><strong>Jenis Komoditas <?= $data->type->commodity->name ?></strong></span>
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" class="validate" value="<?= $data->type->name ?>">
                                <label for="name">Nama</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="description" name="description" class="materialize-textarea"><?= $data->type->description ?></textarea>
                                <label for="description">Quote</label>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <?php
                            $c = '';
                            if ($data->type->id == 1 || $data->type->id == 2) $c = 'disabled';
                            ?>
                            <a id="delete" class="btn-flat waves-effect waves-light red-text <?= $c ?>">
                                Hapus
                                <i class="material-icons left">delete</i>
                            </a>
                            <button type="submit" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" name="action">
                                Simpan
                                <i class="material-icons left">save_as</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#delete').click(function() {

            if (confirm('Are you sure you want to delete <?= $data->type->name ?>')) {
                http.delete("<?= root('api/type/' . $data->type->id) ?>?force", (response, code) => {
                    toast('Jenis komoditas berhasil dihapus')
                    reload(500)

                }, () => {
                    toast('Gagal menghapus jenis komoditas')
                });
            } else {
                console.log('Delete was canceled.');
            }

        })
    </script>
</div>