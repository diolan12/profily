<div class="">
    <div class="">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12">
                <h5>Data Komoditas</h5>
                <button data-target="add-commodity" class="waves-effect waves-light btn modal-trigger">
                    <i class="material-icons left">add</i>Tambah Komoditas</button>
            </div>
            <div class="col s12">
                <ul class="collection">
                    <?php foreach ($data->commodities as $commodity) : ?>
                        <li class="collection-item avatar">
                            <img src="<?= $commodity->image->file ?>" alt="<?= $commodity->name ?>" class="circle">
                            <span class="title"><strong><?= $commodity->name ?></strong></span>
                            <p class="truncate"><?= $commodity->description1 ?></p>
                            <a href="<?= rootDashboard('commodity/' . beauty_to_kebab($commodity->name)) ?>" class="secondary-content"><i class="material-icons">edit</i></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="add-commodity" class="modal">
            <form action="<?= rootDashboard('commodity') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h4>Komoditas Baru</h4>

                    <div class="row">

                        <div class="input-field col s12 m6">
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nama Komoditas</label>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="slogan" name="slogan" type="text" class="validate">
                            <label for="slogan">Slogan</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="description1" name="description1" class="materialize-textarea"></textarea>
                            <label for="description1">Deskripsi 1</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="description2" name="description2" class="materialize-textarea"></textarea>
                            <label for="description2">Deskripsi 2</label>
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