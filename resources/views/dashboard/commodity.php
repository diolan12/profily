<div class="">
    <div class="">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 center">
                <h4><?= $data->commodity->name ?></h4>
            </div>
            <div class="col s12 center m6 offset-m3">
                <div class="card">
                    <div class="card-img">

                        <?php if ($data->commodity->image != null) : ?>
                            <img class="materialboxed responsive-img card-img" src="<?= $data->commodity->image->file ?>" data-caption="<?= $data->commodity->name ?>" alt="<?= $data->commodity->name ?>">
                        <?php else : ?>
                            <img class="responsive-img card-img" src="<?= asset('img/no-image-icon.png') ?>" data-caption="<?= $data->commodity->name ?>" alt="<?= $data->commodity->name ?>">
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 ">
                <div class="card">
                    <form action="<?= rootDashboard('commodity/' . beauty_to_kebab($data->commodity->name)) ?>" method="post" enctype="multipart/form-data">

                        <div class="card-content row">
                            <span class="card-title"><strong>Detail Komoditas</strong></span>
                            <div class="input-field col s12">
                                <select name="image" onchange="changeImage(this)" class="icons">
                                    <?php
                                    $selected = '';
                                    if ($data->commodity->image != null) {
                                        if ($data->commodity->image->id == 1) {
                                            $selected = 'selected';
                                        }
                                    } else $selected = 'selected';
                                    ?>
                                    <option value="" disabled <?= $selected ?>>Pilih gambar</option>
                                    <?php foreach ($data->images as $image) : ?>
                                        <?php $selected = '';
                                        if ($data->commodity->image != null) {
                                            if ($data->commodity->image->id == $image->id && $data->commodity->image->id != 1) {
                                                $selected = 'selected';
                                            }
                                        }
                                        ?>
                                        <option <?= $selected ?> value="<?= $image->id ?>" data-icon="<?= $image->file ?>" class="left"><?= $image->title ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Gambar produk</label>
                            </div>
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" class="validate" value="<?= $data->commodity->name ?>" data-length="32">
                                <label for="name">Nama Komoditas</label>
                                <span class="helper-text" data-error="Text too long"></span>
                            </div>
                            <div class="input-field col s12">
                                <input id="slogan" name="slogan" type="text" class="validate" value="<?= $data->commodity->slogan ?>" data-length="64">
                                <label for="slogan">Slogan</label>
                                <span class="helper-text" data-error="Text too long"></span>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="description1" name="description1" class="materialize-textarea validate" data-length="512"><?= $data->commodity->description1 ?></textarea>
                                <label for="description1">Deskripsi 1</label>
                                <span class="helper-text" data-error="Text too long"></span>
                            </div>
                            <div class="input-field col s12">
                                <textarea id="description2" name="description2" class="materialize-textarea validate" data-length="512"><?= $data->commodity->description2 ?></textarea>
                                <label for="description2">Deskripsi 2</label>
                                <span class="helper-text" data-error="Text too long"></span>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <a id="delete" class="btn-flat waves-effect waves-light red-text <?php if ($data->commodity->id == 1) echo 'disabled'; ?>">
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
                            <input id="tname" name="tname" type="text" class="validate">
                            <label for="tname">Nama</label>
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
        function changeImage(select) {
            console.log(select.value);
            var data = {
                image: select.value
            }
            app.http.post("<?= root('api/commodity/' . $data->commodity->id) ?>", data, (response, code) => {
                app.toast('Gambar berhasil diubah').next()
                app.reload()
            }, () => {
                app.toast('Gagal mengubah gambar').show();
                this.currentSpecificationID = 0;
            });
        }
        $('#delete').click(function() {
            if (confirm('Are you sure you want to delete <?= $data->commodity->name ?>')) {
                app.http.delete("<?= root('api/commodity/' . $data->commodity->id) ?>", (response, code) => {
                    app.toast('Komoditas berhasil dihapus').next()
                    app.reload()

                }, () => {
                    app.toast('Gagal menghapus komoditas').show()
                });
            } else {
                console.log('Delete was canceled.');
            }

        })
        $('#newType').click(function() {
            var data = {
                commodity: $('#form-type').find('input[name="commodity"]').val(),
                name: $('#form-type').find('input[name="tname"]').val(),
                description: $('#form-type').find('textarea[name="description"]').val()
            }
            app.http.post("<?= root('api/type') ?>", data, (response, code) => {
                app.toast('Jenis komoditas baru berhasil dibuat').next()
                app.reload()

            }, () => {
                app.toast('Gagal membuat jenis komoditas baru').show()
            });
        })
    </script>
</div>