<div class="">
    <div class="">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 center">
                <h4><?= $data->product->name ?></h4>
            </div>
            <div class="col s12 m5">
                <div class="card">
                    <div class="card-img">
                        <?php if ($data->product->image != null) : ?>
                            <img src="<?= $data->product->image->file ?>" alt="<?= $data->product->name ?>" class="materialboxed responsive-img card-img" data-caption="<?= $data->product->name ?>">
                        <?php else : ?>
                            <img src="<?= asset('img/no-image-icon.png') ?>" alt="<?= $data->product->name ?>" class="responsive-img card-img">
                        <?php endif; ?>
                    </div>
                    <div class="card-content row">
                        <div class="input-field col s12">
                            <select id="imgpick" onchange="changeImage(this)" class="icons">
                                <?php
                                $selected = '';
                                if ($data->product->image != null) {
                                    if ($data->product->image->id == 1) {
                                        $selected = 'selected';
                                    }
                                } else $selected = 'selected';
                                ?>
                                <option value="" disabled <?= $selected ?>>Pilih gambar</option>
                                <?php foreach ($data->images as $image) : ?>
                                    <?php $selected = '';
                                    if ($data->product->image != null) {
                                        if ($data->product->image->id == $image->id && $data->product->image->id != 1) {
                                            $selected = 'selected';
                                        }
                                    }
                                    ?>
                                    <option value="<?= $image->id ?>" <?= $selected ?> data-icon="<?= $image->file ?>" class="left"><?= $image->title ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label>Gambar produk</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m7">
                <div class="card">
                    <form action="<?= rootDashboard('product/' . beauty_to_kebab($data->product->name)) ?>" method="post" enctype="multipart/form-data">
                        <div class="card-content">
                            <span class="card-title">Detail Produk</span>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" name="name" type="text" value="<?= $data->product->name ?>" class="validate" data-length="32">
                                    <label for="name">Nama Produk</label>
                                    <span class="helper-text" data-error="Text too long"></span>
                                </div>
                                <div class="input-field col s12">
                                    <select id="commodity" onchange="changed('commodity')" name="commodity">
                                        <?php $selected = '';
                                        $default = '';
                                        if ($data->product->commodity == null) {
                                            $default = 'selected';
                                        }
                                        ?>
                                        <option value="" disabled <?= $default ?>>Pilih komoditas</option>
                                        <?php foreach ($data->commodities as $commodity) : ?>
                                            <?php if (count($commodity->types) != 0) : ?>
                                                <option <?php if ($commodity->id == $data->product->commodity->id) echo 'selected' ?> value="<?= $commodity->id ?>"><?= $commodity->name ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Komoditas</label>
                                </div>
                                <div class="input-field col s12">
                                    <?php $selected = '';
                                    $default = '';
                                    if ($data->product->type == null) {
                                        $default = 'selected';
                                    }
                                    ?>
                                    <select id="type" onchange="changedType('type')" name="type">
                                        <option value="" disabled <?= $default ?>>Pilih jenis komoditas</option>
                                        <?php foreach ($data->commodities as $commodity) : ?>
                                            <?php if ($data->product->commodity != null) : ?>
                                                <?php if ($data->product->commodity->id == $commodity->id) : ?>
                                                    <?php foreach ($commodity->types as $type) : ?>
                                                        <option <?php if ($type->id == $data->product->type->id) echo 'selected' ?> value="<?= $type->id ?>"><?= $type->name ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Jenis</label>
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="description" name="description" class="materialize-textarea validate" data-length="512"><?= $data->product->description ?></textarea>
                                    <label for="description">Deskripsi</label>
                                    <span class="helper-text" data-error="Text too long"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <a id="delete" class="btn-flat waves-effect waves-light red-text">
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

            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Spesifikasi</span>
                        <button data-target="add-specification" class="waves-effect waves-light btn modal-trigger">
                            <i class="material-icons left">add</i>Tambah Spesifikasi</button>
                        <ul class="collapsible expandable">
                            <?php foreach ($data->product->specification as $spec) : ?>
                                <li <?php if (count($spec->subspecification) != 0) echo 'class="active"' ?>>
                                    <div class="collapsible-header justify">
                                        <strong>
                                            <?= $spec->value ?>
                                        </strong>
                                        <div>
                                            <a onclick="openModal(<?= $spec->id ?>)" class="secondary-content"><i class="material-icons">add</i></a>
                                            <?php if (count($spec->subspecification) == 0) : ?>
                                                <a onclick="delSpec(<?= $spec->id ?>)" class="secondary-content"><i class="material-icons red-text">delete</i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="collapsible-body">
                                        <ul class="collection">
                                            <?php if (count($spec->subspecification) == 0) : ?>
                                                <!-- <li class="collection-item"><i>No more specifications<i></li> -->
                                            <?php endif; ?>
                                            <?php foreach ($spec->subspecification as $subspec) : ?>
                                                <li class="collection-item">
                                                    <div>
                                                        <?= $subspec->value ?>
                                                        <a onclick="delSubSpec(<?= $subspec->id ?>)" class="pointer secondary-content flat-btn"><i class="material-icons red-text">delete</i></a>
                                                    </div>

                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal Structure -->
        <div id="add-specification" class="modal">
            <form action="<?= rootDashboard('product') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h4>Tambah Spesifikasi</h4>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="value" name="value" type="text" class="validate">
                            <label for="value">Spesifikasi</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="action-add-specification" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
                        Tambah
                        <i class="material-icons left">add</i>
                    </a>
                </div>
            </form>
        </div>

        <!-- Modal Structure -->
        <div id="add-subspecification" class="modal">
            <form action="<?= rootDashboard('product') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h4>Tambah Sub Spesifikasi</h4>
                    <input id="" type="hidden" name="specification" value="0">

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="subvalue" name="subvalue" type="text" class="validate">
                            <label for="subvalue">Spesifikasi</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a onclick="closeModal()" class="modal-close waves-effect waves-green btn-flat">Batal</a>
                    <a id="action-add-subspecification" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>">
                        Tambah
                        <i class="material-icons left">add</i>
                    </a>
                </div>
            </form>
        </div>

    </div>
    <script type="text/javascript">
        const modalSubspec = mat.modal("add-subspecification");
        // var modalSubspec = M.Modal.init(app.elem.byID("add-subspecification"), {
        //     dismissible: true
        // });
        var currentSpecificationID = 0

        function openModal(specID) {
            this.currentSpecificationID = specID
            modalSubspec.open();
        }

        function closeModal() {
            modalSubspec.close();
        }
        $('#delete').click(() => {
            if (confirm('Are you sure you want to delete <?= $data->product->name ?>')) {
                app.http.delete("<?= root('api/product/' . $data->product->id) ?>", (response, code) => {
                    app.toast('Produk berhasil dihapus').next()
                    app.reload()

                }, () => {
                    app.toast('Gagal menghapus produk').show()
                });
            } else {
                console.log('canceled');
            }
        })
        $('#action-add-specification').click(() => {
            var data = {
                product: <?= $data->product->id ?>,
                value: $('#value').val()
            }
            app.http.post("<?= root('api/specification') ?>", data, (response, code) => {
                app.toast('Spesifikasi berhasil dibuat').next()
                app.reload()

            }, () => {
                app.toast('Gagal membuat spesifikasi').show()
            });
        })
        $('#action-add-subspecification').click(() => {
            var data = {
                specification: this.currentSpecificationID,
                value: $('#subvalue').val()
            }
            app.http.post("<?= root('api/sub-specification') ?>", data, (response, code) => {
                app.toast('Sub spesifikasi berhasil dibuat').next()
                app.reload()
            }, () => {
                app.toast('Gagal membuat sub spesifikasi').show();
                this.currentSpecificationID = 0;
            });
        })

        function delSpec(id) {
            if (confirm('Are you sure you want to delete this specification?')) {
                app.http.delete("<?= root('api/specification/') ?>" + id, (response, code) => {
                    app.toast('Spesifikasi berhasil dihapus').next()
                    app.reload()

                }, () => {
                    app.toast('Gagal menghapus spesifikasi').show()
                });
            } else {
                console.log('canceled');
            }
        }

        function delSubSpec(id) {
            if (confirm('Are you sure you want to delete this sub specification?')) {
                app.http.delete("<?= root('api/sub-specification/') ?>" + id, (response, code) => {
                    app.toast('Sub spesifikasi berhasil dihapus').next()
                    app.reload()

                }, () => {
                    app.toast('Gagal menghapus sub spesifikasi').show()
                });
            } else {
                console.log('canceled');
            }
        }
        var elem = document.querySelector('.collapsible.expandable');
        var instance = M.Collapsible.init(elem, {
            accordion: false
        });

        data = <?= json_encode($data->commodities) ?>;

        function changeImage(select) {
            console.log(select.value);
            var data = {
                image: select.value
            }
            app.http.post("<?= root('api/product/' . $data->product->id) ?>", data, (response, code) => {
                app.toast('Gambar berhasil diubah').next()
                app.reload()
            }, () => {
                app.toast('Gagal mengubah gambar').show();
                this.currentSpecificationID = 0;
            });
        }

        function changed(id) {
            selectedCommodityID = $(`#${id}`).val();
            for (var i = 0; i < data.length; i++) {
                if (data[i].id == selectedCommodityID) {
                    $('#type').html('');
                    $('#type').append(`<option value="" disabled selected>Pilih jenis komoditas</option>`);
                    for (var j = 0; j < data[i].types.length; j++) {
                        $('#type').append(`<option value="${data[i].types[j].id}">${data[i].types[j].name}</option>`);
                    }
                    var elems = document.querySelectorAll('select');
                    var instances = M.FormSelect.init(elems);
                    break;
                }
            }
            console.log(selectedCommodityID);
        }

        function changedType(id) {
            selectedTypeID = $(`#${id}`).val();
            console.log(selectedTypeID);
        }
    </script>
</div>