<div class="">
    <div class="">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12">
                <h5>Gallery</h5>
                <button data-target="add-testimony" class="waves-effect waves-light btn modal-trigger">
                    <i class="material-icons left">add</i>Tambah Gambar</button>
            </div>
            <div class="col s12">
                <ul class="row">
                    <?php foreach ($data->images as $image) : ?>
                        <div class="col s12 m6 l4 xl3">
                            <div class="card">
                                <div class="card-image">
                                    <img src="<?= $image->file ?>">
                                    <span class="card-title"><?= $image->title ?></span>
                                    <a href="<?= rootDashboard('gallery/'.$image->id)?>" class="btn-floating halfway-fab waves-effect waves-light"><i class="material-icons">edit</i></a>
                                </div>
                                <div class="card-content">
                                    <p><?= $image->credit ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="add-testimony" class="modal">
            <form action="<?= rootDashboard('gallery') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h4>Gambar Baru</h4>

                    <div class="row">
                        <div class="input-field col s12">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Pilih</span>
                                    <input type="file" name="image" accept="image/*" />
                                </div>
                                <div class="file-path-wrapper">
                                    <input name="file" class="file-path validate" type="text">
                                    <span class="helper-text">Disarankan mengupload foto yang sudah terkompres</span>
                                </div>
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <input id="title" name="title" type="text" class="validate">
                            <label for="title">Judul</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="credit" name="credit" class="materialize-textarea"></textarea>
                            <label for="credit">Credit</label>
                            <span class="helper-text">Kosongi bila properti milik <?= $config->brand->information->val2 ?></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" type="submit" name="action">
                        Unggah
                        <i class="material-icons left">upload</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>