<div class="">
    <div class="section">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <form action="<?= rootDashboard('image/' . $data->image->id) ?>" method="post" enctype="multipart/form-data">
                        <div class="card-image">
                            <img src="<?= $data->image->file ?>">
                            <span class="card-title"><?= $data->image->title ?></span>
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">upload</i></a>
                        </div>
                        <div class="card-content row">
                            <!-- <span class="card-title"><strong>Ubah Testimoni</strong></span> -->
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" class="validate" value="<?= $data->image->title ?>">
                                <label for="name">Judul</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="credit" name="credit" class="materialize-textarea"><?= $data->image->credit ?></textarea>
                                <label for="credit">Credit</label>
                            </div>
                        </div>
                        <div class="card-action right-align">

                            <a id="delete" class="btn-flat waves-effect waves-light red-text">
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
            if (confirm('Are you sure you want to delete <?= $data->image->title ?>')) {
                http.delete("<?= root('api/image/' . $data->image->id) ?>?force", (response, code) => {
                    toast('Gambar berhasil dihapus')
                    reload(2000)

                }, () => {
                    toast('Gagal menghapus gambar')
                });
            } else {
                console.log('Delete was canceled.');
            }

        })
    </script>
</div>