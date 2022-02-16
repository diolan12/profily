<div class="">
    <div class="">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 center">
                <h4><?= $data->commodity->name ?></h4>
            </div>
            <div class="col s12 center">
                <img class="materialboxed responsive-img" src="<?= $data->commodity->image->file ?>" data-caption="<?= $data->commodity->name ?>" alt="<?= $data->commodity->name ?>">
            </div>

            <div class="col s12 m6">
                <div class="card">
                    <form action="<?= rootDashboard('commodity/' . beauty_to_kebab($data->commodity->name)) ?>" method="post" enctype="multipart/form-data">

                        <div class="card-content row">

                            <span class="card-title"><strong>Detail Komoditas</strong></span>
                            <div class="input-field col s12 m6">
                                <input id="name" name="name" type="text" class="validate" value="<?= $data->commodity->name ?>">
                                <label for="name">Nama Komoditas</label>
                            </div>
                            <div class="input-field col s12 m6">
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
                            <button type="submit" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" type="submit" name="action">
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
                    </li>
                    <?php foreach ($data->commodity->types as $type) : ?>
                        <li class="collection-item">
                            <div>
                                <?= $type->name ?>
                                <!-- <a href="#!" class="secondary-content">
                                    <i class="material-icons right">delete</i>
                                </a> -->
                                <a href="#!" class="secondary-content">
                                    <i class="material-icons right">edit</i>
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</div>