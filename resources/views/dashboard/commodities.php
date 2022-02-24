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
                            <?php if ($commodity->image != null) : ?>
                                <img src="<?= $commodity->image->file ?>" alt="<?= $commodity->name ?>" class="circle">
                            <?php else : ?>
                                <img src="<?= asset('img/no-image-icon.png') ?>" alt="No image" class="circle">
                                <i class="tooltipped material-icons red-text left" data-position="bottom" data-tooltip="Data komoditas yang bermasalah tidak akan muncul pada web utama">error</i>
                            <?php endif; ?>
                            <span class="title <?php if ($commodity->image == null) echo 'red-text' ?>"><strong><?= $commodity->name ?></strong></span>
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
                            <input id="name" name="name" type="text" class="validate" data-length="32">
                            <label for="name">Nama Komoditas</label>
                            <span class="helper-text" data-error="Text too long"></span>
                        </div>
                        <div class="input-field col s12 m6">
                            <input id="slogan" name="slogan" type="text" class="validate" data-length="64">
                            <label for="slogan">Slogan</label>
                            <span class="helper-text" data-error="Text too long"></span>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="description1" name="description1" class="materialize-textarea validate" data-length="512"></textarea>
                            <label for="description1">Deskripsi 1</label>
                            <span class="helper-text" data-error="Text too long"></span>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="description2" name="description2" class="materialize-textarea validate" data-length="512"></textarea>
                            <label for="description2">Deskripsi 2</label>
                            <span class="helper-text" data-error="Text too long"></span>
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