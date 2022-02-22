<div class="">
    <div class="section">
        <div class="row">
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Color Primary
                            <i class="material-icons right grey-text tooltipped" data-position="bottom" data-tooltip="Primary color usualy lighten. This color used in navigation bar on top.">question_mark</i>
                        </span>
                        <div class="row">
                            <div id="primary" class="col s12 center <?= $config->color->primary->val1 ?> <?= $config->color->primary->val2 ?>">
                                Sample color <?= $config->color->primary->val3 ?>
                            </div>
                            <div class="input-field col s12 center">
                                <select onchange="primaryChanged(this)">
                                    <option value="" disabled selected>Choose main primary</option>
                                    <?php foreach (materialColor() as $key => $value) : ?>
                                        <option value="<?= $key ?>" <?php if ($key == $config->color->primary->val1) echo 'selected' ?>><?= $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Primary Color</label>
                            </div>
                            <div class="input-field col s12 center">
                                <select id="primary-mod" onchange="primaryModChanged(this)">
                                    <option value="" disabled selected>Choose modifier primary</option>
                                    <?php foreach (materialColor()[$config->color->primary->val1] as $mod => $hex) : ?>
                                        <option value="<?= $mod ?>;<?= $hex ?>" <?php if ($mod == $config->color->primary->val2) echo 'selected' ?>><?= $mod ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Primary Color Modifier</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Color Secondary
                            <i class="material-icons right grey-text tooltipped" data-position="bottom" data-tooltip="Secondary color usualy darken. This color used in bottom footer and browser theme color.">question_mark</i>
                        </span>
                        <div class="row">
                            <div id="secondary" class="col s12 center <?= $config->color->secondary->val1 ?> <?= $config->color->secondary->val2 ?>">
                                Sample color <?= $config->color->secondary->val3 ?>
                            </div>
                            <div class="input-field col s12 center">
                                <select onchange="secondaryChanged(this)">
                                    <option value="" disabled selected>Choose main secondary</option>
                                    <?php foreach (materialColor() as $key => $value) : ?>
                                        <option value="<?= $key ?>" <?php if ($key == $config->color->secondary->val1) echo 'selected' ?>><?= $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Secondary Color</label>
                            </div>
                            <div class="input-field col s12 center">
                                <select id="secondary-mod" onchange="secondaryModChanged(this)">
                                    <option value="" disabled selected>Choose modifier secondary</option>
                                    <?php foreach (materialColor()[$config->color->secondary->val1] as $mod => $hex) : ?>
                                        <option value="<?= $mod ?>;<?= $hex ?>" <?php if ($mod == $config->color->secondary->val2) echo 'selected' ?>><?= $mod ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Secondary Color Modifier</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Color Accent
                            <i class="material-icons right grey-text tooltipped" data-position="bottom" data-tooltip="Accent color usualy contrast color from primary color, or whatever color you can imagine. This color used in buttons and more">question_mark</i>
                        </span>
                        <div class="row">
                            <div id="accent" class="col s12 center <?= $config->color->accent->val1 ?> <?= $config->color->accent->val2 ?>">
                                Sample color <?= $config->color->accent->val3 ?>
                            </div>
                            <div class="input-field col s12 center">
                                <select onchange="accentChanged(this)">
                                    <option value="" disabled selected>Choose main accent</option>
                                    <?php foreach (materialColor() as $key => $value) : ?>
                                        <option value="<?= $key ?>" <?php if ($key == $config->color->accent->val1) echo 'selected' ?>><?= $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Accent Color</label>
                            </div>
                            <div class="input-field col s12 center">
                                <select id="accent-mod" onchange="accentModChanged(this)">
                                    <option value="" disabled selected>Choose accent modifier</option>
                                    <?php foreach (materialColor()[$config->color->accent->val1] as $mod => $hex) : ?>
                                        <option value="<?= $mod ?>;<?= $hex ?>" <?php if ($mod == $config->color->accent->val2) echo 'selected' ?>><?= $mod ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Accent Color Modifier</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Color Background
                            <i class="material-icons right grey-text tooltipped" data-position="bottom" data-tooltip="Background color usualy more lighten color from primary color. This color used in background home pages.">question_mark</i>
                        </span>
                        <div class="row">
                            <div id="background" class="col s12 center <?= $config->color->background->val1 ?> <?= $config->color->background->val2 ?>">
                                Sample color <?= $config->color->background->val3 ?>
                            </div>
                            <div class="input-field col s12 center">
                                <select onchange="backgroundChanged(this)">
                                    <option value="" disabled selected>Choose main accent</option>
                                    <?php foreach (materialColor() as $key => $value) : ?>
                                        <option value="<?= $key ?>" <?php if ($key == $config->color->background->val1) echo 'selected' ?>><?= $key ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Background Color</label>
                            </div>
                            <div class="input-field col s12 center">
                                <select id="background-mod" onchange="backgroundModChanged(this)">
                                    <option value="" disabled selected>Choose background modifier</option>
                                    <?php foreach (materialColor()[$config->color->background->val1] as $mod => $hex) : ?>
                                        <option value="<?= $mod ?>;<?= $hex ?>" <?php if ($mod == $config->color->background->val2) echo 'selected' ?>><?= $mod ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Background Color Modifier</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function primaryChanged(ele) {
            var data = {
                val1: ele.value,
                val2: ''
            }
            app.http.put("<?= root('api/config/where/key/primary') ?>", data, (response, code) => {
                app.toast('Primary color changed to ' + ele.value).next()
                app.reload()
            }, () => {
                app.toast('Failed to change primary color').show();
            });
        }

        function primaryModChanged(ele) {
            var v = ele.value.split(';');
            var data = {
                val2: v[0],
                val3: v[1]
            }
            console.log(ele.value)
            app.http.put("<?= root('api/config/where/key/primary') ?>", data, (response, code) => {
                app.toast('Primary color modifier changed to ' + v[0]).next()
                app.reload()
            }, () => {
                app.toast('Failed to change primary color modifier').show();
            });
        }

        function secondaryChanged(ele) {
            var data = {
                val1: ele.value,
                val2: ''
            }
            app.http.put("<?= root('api/config/where/key/secondary') ?>", data, (response, code) => {
                app.toast('Secondary color changed to ' + ele.value).next()
                app.reload()
            }, () => {
                app.toast('Failed to change secondary color').show();
            });
        }

        function secondaryModChanged(ele) {
            var v = ele.value.split(';');
            var data = {
                val2: v[0],
                val3: v[1]
            }
            console.log(ele.value)
            app.http.put("<?= root('api/config/where/key/secondary') ?>", data, (response, code) => {
                app.toast('Secondary color modifier changed to ' + v[0]).next()
                app.reload()
            }, () => {
                app.toast('Failed to change secondary color modifier').show();
            });
        }

        function accentChanged(ele) {
            var data = {
                val1: ele.value,
                val2: ''
            }
            app.http.put("<?= root('api/config/where/key/accent') ?>", data, (response, code) => {
                app.toast('Accent color changed to ' + ele.value).next()
                app.reload()
            }, () => {
                app.toast('Failed to change accent color').show();
            });
        }

        function accentModChanged(ele) {
            var v = ele.value.split(';');
            var data = {
                val2: v[0],
                val3: v[1]
            }
            console.log(ele.value)
            app.http.put("<?= root('api/config/where/key/accent') ?>", data, (response, code) => {
                app.toast('Accent color modifier changed to ' + v[0]).next()
                app.reload()
            }, () => {
                app.toast('Failed to change accent color modifier').show();
            });
        }

        function backgroundChanged(ele) {
            var data = {
                val1: ele.value,
                val2: ''
            }
            app.http.put("<?= root('api/config/where/key/background') ?>", data, (response, code) => {
                app.toast('Background color changed to ' + ele.value).next()
                app.reload()
            }, () => {
                app.toast('Failed to change background color').show();
            });
        }

        function backgroundModChanged(ele) {
            var v = ele.value.split(';');
            var data = {
                val2: v[0],
                val3: v[1]
            }
            console.log(ele.value)
            app.http.put("<?= root('api/config/where/key/background') ?>", data, (response, code) => {
                app.toast('Background color modifier changed to ' + v[0]).next()
                app.reload()
            }, () => {
                app.toast('Failed to change background color modifier').show();
            });
        }
    </script>
</div>