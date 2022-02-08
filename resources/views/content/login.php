<div class="container">
    <div class="section">
        <br />
        <br />
        <br />
        <div class="row">
            <div class="col s10 offset-s1 m6 offset-m3 l5 offset-l4">
                <div class="card">
                    <form action="<?= rootAuth() ?>" method="post" enctype="multipart/form-data">
                        <div class="card-content">
                            <span class="card-title">Login to Dashboard</span>
                            <p>Please Login to continue</p>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" name="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="password" name="password" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <button type="submit" class="btn-flat waves-effect waves-light <?= color($config->color->accent, true) ?>" type="submit" name="action">Login
                                <i class="material-icons">login</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br />
        <br />
        <br />
    </div>
</div>