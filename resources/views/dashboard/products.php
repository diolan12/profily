<div class="">
    <div class="">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12">
                <h5>Data Produk</h5>
                <a class="waves-effect waves-light btn"><i class="material-icons left">add</i>tambah produk</a>
            </div>
            <div class="col s12">
                <ul class="collection">
                    <?php foreach ($data->products as $product) : ?>
                        <li class="collection-item avatar">
                            <img src="<?= $product->image->file ?>" alt="<?= $product->name ?>" class="circle">
                            <span class="title"><strong><?= $product->name ?></strong></span>
                            <p>Type: <?= $product->type->name ?></p>
                            <p>Commodity: <?= $product->commodity->name ?></p>
                            <a href="<?= rootDashboard('product/' . beauty_to_kebab($product->name)) ?>" class="secondary-content"><i class="material-icons">edit</i></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</div>