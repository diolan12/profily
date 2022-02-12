<div class="">
    <div class="">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12">
                <h5>Data testimoni</h5>
                <button data-target="add-testimony" class="waves-effect waves-light btn modal-trigger">
                    <i class="material-icons left">add</i>Tambah Testimoni</button>
            </div>
            <div class="col s12">
                <ul class="collection">
                    <?php foreach ($data->testimonies as $testimony) : ?>
                        <li class="collection-item avatar">
                            <span class="title"><strong><?= $testimony->name ?></strong>, <?= $testimony->country ?></span>
                            <blockquote><p class="truncate"><?= $testimony->quote ?></p></blockquote>
                            <a href="<?= rootDashboard('testimony/' . $testimony->id) ?>" class="secondary-content"><i class="material-icons">edit</i></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="add-testimony" class="modal">
            <form action="<?= rootDashboard('testimony') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h4>Testimoni Baru</h4>

                    <div class="row">

                        <div class="input-field col s12 m6">
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nama</label>
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