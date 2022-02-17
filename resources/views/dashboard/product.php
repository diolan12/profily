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
                        <img class="materialboxed responsive-img card-img" src="<?= $data->product->image->file ?>" data-caption="<?= $data->product->name ?>" alt="<?= $data->product->name ?>">
                        <a class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-position="left" data-tooltip="Pilih Gambar"><i class="material-icons">upload</i></a>
                    </div>
                    <div class="card-content row">
                        <div class="input-field col s12">
                            <select onchange="changeImage(this)" class="icons">
                                <option value="" disabled selected>pilih gambar</option>
                                <?php foreach ($data->images as $image) : ?>
                                    <option value="<?= $image->id ?>" data-icon="<?= $image->file ?>" class="left"><?= $image->title ?></option>
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
                                    <input id="name" name="name" type="text" value="<?= $data->product->name ?>" class="validate">
                                    <label for="name">Nama Produk</label>
                                </div>
                                <div class="input-field col s12">
                                    <select id="commodity" onchange="changed('commodity')" name="commodity">
                                        <option value="" disabled selected>Pilih komoditas</option>
                                        <?php foreach ($data->commodities as $commodity) : ?>
                                            <?php if (count($commodity->types) != 0) : ?>
                                                <option <?php if ($data->product->commodity->id == $commodity->id) echo 'selected' ?> value="<?= $commodity->id ?>"><?= $commodity->name ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Komoditas</label>
                                </div>
                                <div class="input-field col s12">
                                    <select id="type" onchange="changedType('type')" name="type">
                                        <option value="" disabled selected>Pilih jenis komoditas</option>
                                        <?php foreach ($data->commodities as $commodity) : ?>
                                            <?php if ($data->product->commodity->id == $commodity->id) : ?>
                                                <?php foreach ($commodity->types as $type) : ?>
                                                    <option value="<?= $type->id ?>" <?php if ($data->product->type->id == $type->id) echo 'selected' ?>><?= $type->name ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Jenis</label>
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="description" name="description" class="materialize-textarea"><?= $data->product->description ?></textarea>
                                    <label for="description">Deskripsi</label>
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
        var modalElem = document.getElementById("add-subspecification");;
        var modalSubspec = M.Modal.init(modalElem, {
            dismissible: true
        });
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
                http.delete("<?= root('api/product/' . $data->product->id) ?>", (response, code) => {
                    toast('Produk berhasil dihapus')
                    reload(500)

                }, () => {
                    toast('Gagal menghapus produk')
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
            http.post("<?= root('api/specification') ?>", data, (response, code) => {
                toast('Spesifikasi berhasil dibuat')
                reload(500)

            }, () => {
                toast('Gagal membuat spesifikasi')
            });
        })
        $('#action-add-subspecification').click(() => {
            var data = {
                specification: this.currentSpecificationID,
                value: $('#subvalue').val()
            }
            http.post("<?= root('api/subspecification') ?>", data, (response, code) => {
                toast('Sub spesifikasi berhasil dibuat')
                reload(500)
            }, () => {
                toast('Gagal membuat sub spesifikasi');
                this.currentSpecificationID = 0;
            });
        })

        function delSpec(id) {
            if (confirm('Are you sure you want to delete this specification?')) {
                http.delete("<?= root('api/specification/') ?>" + id, (response, code) => {
                    toast('Spesifikasi berhasil dihapus')
                    reload(500)

                }, () => {
                    toast('Gagal menghapus spesifikasi')
                });
            } else {
                console.log('canceled');
            }
        }

        function delSubSpec(id) {
            if (confirm('Are you sure you want to delete this sub specification?')) {
                http.delete("<?= root('api/subspecification/') ?>" + id, (response, code) => {
                    toast('Sub spesifikasi berhasil dihapus')
                    reload(500)

                }, () => {
                    toast('Gagal menghapus sub spesifikasi')
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
            http.post("<?= root('api/product/' . $data->product->id) ?>", data, (response, code) => {
                toast('Gambar berhasil diubah')
                reload(500)
            }, () => {
                toast('Gagal mengubah gambar');
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