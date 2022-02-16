<div class="">
    <div class="section">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <form action="<?= rootDashboard('testimony/' . $data->testimony->id) ?>" method="post" enctype="multipart/form-data">

                        <div class="card-content row">

                            <span class="card-title"><strong>Ubah Testimoni</strong></span>
                            <div class="input-field col s12 m6">
                                <input id="name" name="name" type="text" class="validate" value="<?= $data->testimony->name ?>">
                                <label for="name">Nama</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="country" name="country" type="text" class="validate" value="<?= $data->testimony->country ?>">
                                <label for="country">Negara</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="quote" name="quote" class="materialize-textarea"><?= $data->testimony->quote ?></textarea>
                                <label for="quote">Quote</label>
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
            http.delete("<?= root('api/testimony/' . $data->testimony->id) ?>?force", (response, code) => {
                // this.data.testimony = <?= json_encode($data->testimony) ?>;
                console.log(code);
                console.log(response);
                toast('Testimoni berhasil dihapus')
                reload(2000)

            }, ()=> {
                toast('Gagal menghapus testimoni')
            });
        })
    </script>
</div>