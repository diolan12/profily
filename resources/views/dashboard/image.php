<div class="">
    <div class="section">
        <div class="row">
            <div class="col s12 m8 offset-m2 l6 offset-l3 xl4 offset-xl4">
                <div class="card">
                    <form action="<?= rootDashboard('image/' . $data->image->id) ?>" method="post" enctype="multipart/form-data">
                        <div class="card-image">
                            <img src="<?= $data->image->file ?>">
                            <span class="card-title"><?= $data->image->title ?></span>
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">upload</i></a>
                        </div>
                        <div class="card-content row">
                            <!-- <span class="card-title"><strong>Ubah Testimoni</strong></span> -->
                            <div class="input-field col s12 center">
                                <div class="switch">
                                    <label class="tooltipped" data-position="top" data-tooltip="Tampilkan pada gallery?">
                                        Private
                                        <input id="privacy" type="checkbox" checked="<?= $data->image->privacy ?>">
                                        <span class="lever"></span>
                                        Public
                                    </label>
                                </div>
                            </div>
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
                app.http.delete("<?= root('api/image/' . $data->image->id) ?>?force", (response, code) => {
                    app.toast('Gambar berhasil dihapus').next()
                    app.reload()

                }, () => {
                    app.toast('Gagal menghapus gambar').show()
                });
            } else {
                console.log('Delete was canceled.');
            }
        })
        $('#privacy').change(function() {
            var data = {
                privacy: $(this).is(':checked')
            }
            app.http.post("<?= root('api/image/' . $data->image->id) ?>", data, (response, code) => {
                var t = ''

                if ($(this).is(':checked')) {
                    t = 'public'
                } else {
                    t = 'private'
                }
                app.toast('Image set to ' + t).show()

            }, () => {
                $(this).prop('checked', !$(this).is(':checked'));
                app.toast('Gagal menyetel privasi').show()
            });
        })
    </script>
</div>