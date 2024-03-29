<div class="navbar">
    <!-- Dropdown Structure -->
    <ul id="more" class="dropdown-content">
        <li><a href="<?= root() ?>"><i class="material-icons left">public</i>Lihat halaman</a></li>

        <?php if ($nav['active'] == 'stats') : ?>
            <?php if (!$server['client']['refresh']) : ?>
                <li><a href="<?= rootDashboard('?refresh=30') ?>"><i class="material-icons left">check_box_outline_blank</i>Auto Refresh</a></li>
            <?php elseif ($server['client']['refresh']) : ?>
                <li class='active'><a href="<?= rootDashboard() ?>"><i class="material-icons left">check_box</i>Auto refresh</a></li>
            <?php endif; ?>
        <?php endif; ?>
        <li <?php if ($nav['active'] == 'profile') echo 'class="active"' ?>><a href="<?= rootAuth('profile') ?>"><i class="material-icons left">account_circle</i>Profil</a></li>

        <li class="divider"></li>
        <li><a href="<?= rootAuth('logout') ?>"><i class="material-icons left">logout</i>Logout</a></li>
    </ul>
    <nav class="<?= color($config->color->primary) ?>" role="navigation">
        <div class="nav-wrapper">

            <a href="<?= rootDashboard() ?>" class="brand-logo text">Dashboard</a>

            <ul class="right">
                <li><a class="dropdown-trigger" data-target="more"><i class="material-icons">more_vert</i></a></li>
            </ul>

            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>
<ul id="nav-mobile" class="sidenav sidenav-fixed">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="<?= asset('img/parallax-shipping.jpg') ?>">
            </div>
            <a><img class="circle" src="<?= root($user->avatar) ?>" alt="<?= $user->name ?>"></a>
            <a><span class="white-text name"><?= $user->name ?></span></a>
            <a><span class="white-text email"><?= $user->email ?></span></a>
            <a><span class="white-text email"><?= $user->position ?></span></a>
        </div>
    </li>
    <li><a class="subheader">Data</a></li>
    <li><a href="<?= rootDashboard() ?>" class="waves-effect <?php if ($nav['active'] == 'stats') echo 'active' ?>"><i class="material-icons">data_exploration</i>Statistik</a></li>
    <li><a href="<?= rootDashboard('commodity') ?>" class="waves-effect <?php if ($nav['active'] == 'commodity') echo 'active' ?>"><i class="material-icons">category</i>Komoditas</a></li>
    <li><a href="<?= rootDashboard('product') ?>" class="waves-effect <?php if ($nav['active'] == 'product') echo 'active' ?>"><i class="material-icons">inventory_2</i>Produk</a></li>
    <li><a href="<?= rootDashboard('testimony') ?>" class="waves-effect <?php if ($nav['active'] == 'testimony') echo 'active' ?>"><i class="material-icons">reviews</i>Testimoni</a></li>
    <li><a href="<?= rootDashboard('gallery') ?>" class="waves-effect <?php if ($nav['active'] == 'gallery') echo 'active' ?>"><i class="material-icons">collections</i>Gallery</a></li>

    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Brand</a></li>
    <li><a class="waves-effect <?php if ($nav['active'] == 'color') echo 'active' ?>" href="<?= rootDashboard('color') ?>"><i class="material-icons">palette</i>Color</a></li>
    <li><a class="waves-effect <?php if ($nav['active'] == 'general') echo 'active' ?>" href="<?= rootDashboard('general') ?>"><i class="material-icons">info</i>General</a></li>
    <li><a class="waves-effect <?php if ($nav['active'] == 'value') echo 'active' ?>" href="<?= rootDashboard('value') ?>"><i class="material-icons">photo_filter</i>Value</a></li>
    <li><a class="waves-effect <?php if ($nav['active'] == 'connect') echo 'active' ?>" href="<?= rootDashboard('connect') ?>"><i class="material-icons">link</i>Connect</a></li>

    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Web</a></li>
    <?php if ($user->role->id == 1) : ?>
        <li><a href="<?= rootDashboard('user') ?>" class="waves-effect <?php if ($nav['active'] == 'user') echo 'active' ?>"><i class="material-icons">manage_accounts</i>Users</a></li>
    <?php endif; ?>
    <li><a class="waves-effect <?php if ($nav['active'] == 'banner') echo 'active' ?>" href="<?= rootDashboard('banner') ?>"><i class="material-icons">web</i>Banner</a></li>
    <li><a class="waves-effect <?php if ($nav['active'] == 'setting') echo 'active' ?>" href="<?= rootDashboard('setting') ?>"><i class="material-icons">admin_panel_settings</i>Settings</a></li>
</ul>