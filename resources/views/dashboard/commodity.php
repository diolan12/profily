<div class="">
    <div class="">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 center">
                <h4><?= $data->commodity->name ?></h4>
            </div>
            <div class="col s12 center">
                <div class="card">
                    <div class="card-img">
                        <img class="materialboxed responsive-img card-img" src="<?= $data->commodity->image->file ?>" data-caption="<?= $data->commodity->name ?>" alt="<?= $data->commodity->name ?>">
                        <a class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="left" data-tooltip="Pilih Gambar"><i class="material-icons">upload</i></a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6">
                <div class="card">
                    <form action="<?= rootDashboard('commodity/' . beauty_to_kebab($data->commodity->name)) ?>" method="post" enctype="multipart/form-data">

                        <div class="card-content row">

                            <span class="card-title"><strong>Detail Komoditas</strong></span>
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" class="validate" value="<?= $data->commodity->name ?>">
                                <label for="name">Nama Komoditas</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="slogan" name="slogan" type="text" class="validate" value="<?= $data->commodity->slogan ?>">
                                <label for="slogan">Slogan</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="description1" name="description1" class="materialize-textarea"><?= $data->commodity->description1 ?></textarea>
                                <label for="description1">Deskripsi 1</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="description2" name="description2" class="materialize-textarea"><?= $data->commodity->description2 ?></textarea>
                                <label for="description2">Deskripsi 2</label>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <a id="delete" class="btn-flat waves-effect waves-light red-text <?php if ($data->commodity->id == 1) echo 'disabled';?>">
                                Hapus
                                <i class="material-icons left">delete</i>
                            </a>
                            <button class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" type="submit" name="action">
                                Simpan
                                <i class="material-icons left">save_as</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col s12 m6">
                <ul class="collection with-header">
                    <li class="collection-header">
                        <h5>Jenis Komoditas</h5>

                        <button data-target="add-type" class="waves-effect waves-light btn modal-trigger">
                            <i class="material-icons left">add</i>Tambah</button>
                    </li>
                    <?php if (count($data->commodity->types) == 0) : ?>
                        <li class="collection-item grey-text"><i>Tidak ada data</i></li>
                    <?php endif; ?>
                    <?php foreach ($data->commodity->types as $type) : ?>
                        <li class="collection-item">
                            <div>
                                <?= $type->name ?>
                                <!-- <a id="delete-type" class="secondary-content red-text">
                                    <i class="material-icons right">delete</i>
                                </a> -->
                                <a href="<?= rootDashboard('commodity/' . beauty_to_kebab($data->commodity->name) . '/' . $type->id) ?>" class="secondary-content">
                                    <i class="material-icons right">edit</i>
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="add-type" class="modal">
            <form id="form-type" action="<?= rootDashboard('api/') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h4>Jenis Baru</h4>
                    <input type="hidden" name="commodity" value="<?= $data->commodity->id ?>">

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nama</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="description" name="description" class="materialize-textarea"></textarea>
                            <label for="description">Deskripsi</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="newType" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
                        Tambah
                        <i class="material-icons left">add</i>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $('#delete').click(function() {
            if (confirm('Are you sure you want to delete <?= $data->commodity->name?>')) {
                http.delete("<?= root('api/commodity/' . $data->commodity->id) ?>", (response, code) => {
                    toast('Komoditas berhasil dihapus')
                    reload(2000)

                }, () => {
                    toast('Gagal menghapus komoditas')
                });
            } else {
                console.log('Delete was canceled.');
            }

        })
        $('#newType').click(function() {
            var data = {
                commodity: $('#form-type').find('input[name="commodity"]').val(),
                name: $('#form-type').find('input[name="name"]').val(),
                description: $('#form-type').find('textarea[name="description"]').val()
            }
            http.post("<?= root('api/type') ?>", data, (response, code) => {
                toast('Jenis komoditas baru berhasil dibuat')
                reload(2000)

            }, () => {
                toast('Gagal membuat jenis komoditas baru')
            });
        })
    </script>
</div>