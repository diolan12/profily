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
                            <img src="<?= $product->image->file ?>" alt="<?= $product->name ?>" class="circle">
                            <span class="title">
                                <?php if ($product->commodity == null || $product->type == null) : ?>
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

                        <div class="input-field col s12 m6">
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nama Produk</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="country" name="country" type="text" class="validate">
                            <label for="country">Negara</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="quote" name="quote" class="materialize-textarea"></textarea>
                            <label for="quote">Quote</label>
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
</div>