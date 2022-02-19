<div class="">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 center">
                <h5>Profil anda</h5>
            </div>
            <div class="col s12 m6">
                <form action="<?= rootAuth('profile') ?>" method="post" enctype="multipart/form-data">

                    <div class="card">
                        <div class="card-image">
                            <img src="<?= $data->user->avatar ?>" alt="<?= $data->user->name ?>">
                            <a href="#upload-avatar" class="modal-trigger btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">upload</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title">Detail Pengguna</span>
                            <div class="row">

                                <div class="input-field col s12">
                                    <input id="name" name="name" type="text" class="validate" value="<?= $data->user->name ?>">
                                    <label for="name">Nama</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="email" name="email" type="email" class="validate" value="<?= $data->user->email ?>">
                                    <label for="email">Email</label>
                                </div>

                            </div>
                        </div>
                        <div class="card-action right-align">
                            <?php if ($data->user->deleted_at != null) : ?>
                                <a onclick="activate()" class="btn-flat waves-effect waves-light blue-text">
                                    Aktifkan
                                    <i class="material-icons left">person</i>
                                </a>
                            <?php else : ?>
                                <a onclick="deactivate()" class="btn-flat waves-effect waves-light red-text">
                                    Nonaktifkan
                                    <i class="material-icons left">person_off</i>
                                </a>
                            <?php endif; ?>
                            <button type="submit" class="<?php if ($data->user->deleted_at != null) echo 'disabled'; ?> btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" type="submit" name="action">
                                Simpan
                                <i class="material-icons left">save_as</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col s12 m6">
                <div class="card">

                    <div class="card-content row">

                        <span class="card-title">Ganti Password</span>
                        <div class="input-field col s12">
                            <input id="password1" name="password" 1 type="password" class="validate" value="<?= $data->user->email ?>">
                            <label for="password1">Password</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix hide">password</i>
                            <input id="password" name="password" style="margin-left: 0" type="password" class="validate">
                            <i onclick="togglePassword()" style="cursor: pointer" class="material-icons prefix right">visibility_off</i>
                            <label for="password" style="margin-left: 0">Password</label>
                        </div>
                    </div>
                    <div class="card-action right-align">
                        <button onclick="changePassword()" class="<?php if ($data->user->deleted_at != null) echo 'disabled'; ?> btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" type="submit" name="action">
                            Ganti Password
                            <i class="material-icons left">save_as</i>
                        </button>
                    </div>
                </div>
            </div>


        </div>
        <!-- Modal Structure -->
        <div id="upload-avatar" class="modal">
            <form action="<?= rootAuth('avatar') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content row">
                    <h5>Upload gambar</h5>
                    <div class="input-field col s12">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Pilih avatar</span>
                                <input type="file" name="avatar" accept="image/*" />
                            </div>
                            <div class="file-path-wrapper">
                                <input name="file" class="file-path validate" type="text">
                                <span class="helper-text">Disarankan mengupload foto yang sudah terkompres</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" name="action">
                        Unggah
                        <i class="material-icons left">upload</i>
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

        function activate() {
            http.delete("<?= root('api/user/' . $data->user->id) ?>/restore", (response, code) => {
                console.log(code);
                console.log(response);
                toast('Pengguna berhasil diaktifkan')
                reload(500)

            }, () => {
                toast('Gagal mengaktifkan pengguna')
            });
        }

        function deactivate() {
            if (confirm('Are you sure you want to deactivate <?= $data->user->name ?>')) {
                http.delete("<?= root('api/user/' . $data->user->id) ?>", (response, code) => {
                    console.log(code);
                    console.log(response);
                    toast('Pengguna berhasil dinonaktifkan')
                    reload(500)

                }, () => {
                    toast('Gagal menonaktifkan pengguna')
                });
            } else {
                console.log('Delete was canceled.');
            }

        }

        function changePassword() {
            pw1 = $('#password1').val()
            pw = $('#password').val()
            if (pw != pw1) {
                app.toast('Password tidak sama').show()
                return;
            } else {
                data = {
                    password: pw
                }
                app.http.post("<?= root('api/user/' . $data->user->id) ?>", data, (response, code) => {
                    app.toast('Password berhasil diubah').next()
                    app.reload()

                }, () => {
                    app.toast('Gagal mengubah password').show()
                });
            }
        }
    </script>
</div>