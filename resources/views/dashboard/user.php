<div class="">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m6">
                <form action="<?= rootDashboard('user/' . beauty_to_kebab($data->user->name)) ?>" method="post" enctype="multipart/form-data">

                    <div class="card">
                        <div class="card-image">
                            <img src="<?= $data->user->picture->file ?>" alt="<?= $data->user->name ?>">
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">upload</i></a>
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
                toast('Password tidak sama')
                return;
            } else {
                data = {
                    password: pw
                }
                http.post("<?= root('api/user/' . $data->user->id) ?>", data, (response, code) => {
                    toast('Password berhasil diubah')
                    reload(2000)

                }, () => {
                    toast('Gagal mengubah password')
                });
            }
        }
    </script>
</div>