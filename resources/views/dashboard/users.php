<div class="">
    <div class="">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12">
                <h5>Data Pengguna</h5>
                <button data-target="add-user" class="waves-effect waves-light btn modal-trigger">
                    <i class="material-icons left">person_add_alt_1</i>Tambah Pengguna</button>
            </div>
            <div class="col s12">
                <ul class="collection">
                    <?php foreach ($data->users as $product) : ?>
                        <li class="collection-item avatar">
                            <img src="<?= $product->picture->file ?>" alt="<?= $product->name ?>" class="circle">
                            <span class="title red-text">
                                <strong class ="black-text"><?= $product->name ?></strong>
                                <?php if($product->deleted_at != null) echo '(deactivated)'?>
                            </span>
                            <p><?= $product->email ?></p>
                            <p><?= $product->role->name ?></p>
                            <a href="<?= rootDashboard('user/' . beauty_to_kebab($product->name)) ?>" class="secondary-content hide"><i class="material-icons">person_off</i></a>
                            <a href="<?= rootDashboard('user/' . beauty_to_kebab($product->name)) ?>" class="secondary-content hide"><i class="material-icons">person_remove_alt_1</i></a>
                            <a href="<?= rootDashboard('user/' . beauty_to_kebab($product->name)) ?>" class="secondary-content"><i class="material-icons">edit</i></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Modal Structure -->
        <div id="add-user" class="modal">
            <form action="<?= rootDashboard('user') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <h4>Daftarkan Pengguna</h4>

                    <div class="row">

                        <div class="input-field col s12">
                            <input id="name" name="name" type="text" class="validate">
                            <label for="name">Nama</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix hide">password</i>
                            <input id="password" name="password" style="margin-left: 0" type="password" class="validate">
                            <i onclick="togglePassword()" style="cursor: pointer" class="material-icons prefix right">visibility_off</i>
                            <label for="password" style="margin-left: 0">Password</label>
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
        shown = false;
        function togglePassword() {
            if (shown) {
                $('#password').attr('type', 'password');
                $('#password').next().html('visibility_off');
                shown = false;
            } else {
                $('#password').attr('type', 'text');
                $('#password').next().html('visibility');
                shown = true;

            }
        }
    </script>
</div>