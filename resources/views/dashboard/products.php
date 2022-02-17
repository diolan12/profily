<div class="">
    <div class="">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12">
                <h5>Data Produk</h5>
                <button data-target="add-product" class="waves-effect waves-light btn modal-trigger">
                    <i class="material-icons left">add</i>Tambah Produk</button>
            </div>
            <div class="col s12">
                <ul class="collection">
                    <?php foreach ($data->products as $product) : ?>
                        <li class="collection-item avatar">
                            <?php if ($product->image != null) : ?>
                                <img src="<?= $product->image->file ?>" alt="<?= $product->name ?>" class="circle">
                            <?php else : ?>
                                <img src="<?= asset('img/no-image-icon.png') ?>" alt="<?= $product->name ?>" class="circle">
                            <?php endif; ?>
                            <span class="title">
                                <?php if ($product->commodity == null || $product->type == null || $product->image == null) : ?>
                                    <i class="tooltipped material-icons red-text left" data-position="bottom" data-tooltip="Data produk yang bermasalah tidak akan muncul pada katalog produk">error</i>
                                <?php endif; ?>
                                <strong><?= $product->name ?></strong>
                            </span>
                            <?php
                            $c = '<span class="red-text">Komoditas tidak ada</span>';
                            $t = '<span class="red-text">Jenis komoditas tidak ada</span>';
                            if ($product->commodity != null) $c = $product->commodity->name;
                            if ($product->type != null) $t = $product->type->name;
                            ?>
                            <p>Jenis komoditas: <?= $t ?></p>
                            <p>Komoditas: <?= $c ?></p>
                            <a href="<?= rootDashboard('product/' . beauty_to_kebab($product->name)) ?>" class="secondary-content"><i class="material-icons">edit</i></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="add-product" class="modal">
            <form action="<?= rootDashboard('product') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h4>Produk Baru</h4>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nama Produk</label>
                        </div>
                        <div class="input-field col s12">
                            <select id="commodity" onchange="changed('commodity')" name="commodity">
                                <option value="" disabled selected>Pilih komoditas</option>
                                <?php foreach ($data->commodities as $commodity) : ?>
                                    <?php if (count($commodity->types) != 0) : ?>
                                        <option value="<?= $commodity->id ?>"><?= $commodity->name ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <label>Komoditas</label>
                        </div>
                        <div class="input-field col s12">
                            <select id="type" onchange="changedType('type')" name="type">
                                <option value="" disabled selected>Pilih jenis komoditas</option>
                            </select>
                            <label>Jenis</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="description" name="description" class="materialize-textarea"></textarea>
                            <label for="description">Deskripsi</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" type="submit" name="action">
                        Tambah
                        <i class="material-icons left">add</i>
                    </button>
                </div>
            </form>
        </div>

    </div>
    <script type="text/javascript">
        data = <?= json_encode($data->commodities) ?>;

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