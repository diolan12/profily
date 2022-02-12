<div class="navbar">
    <!-- Dropdown Structure -->
    <ul id="more" class="dropdown-content">
        <li><a href="<?= root() ?>"><i class="material-icons left">public</i>View Page</a></li>

        <?php if ($nav['active'] == 'stats') : ?>
            <?php if (!$server['client']['refresh']) : ?>
                <li><a href="<?= rootDashboard('?refresh=30') ?>"><i class="material-icons left">check_box_outline_blank</i>Auto Refresh</a></li>
            <?php elseif ($server['client']['refresh']) : ?>
                <li><a href="<?= rootDashboard() ?>"><i class="material-icons left">check_box</i>Auto Refresh</a></li>
            <?php endif; ?>
        <?php endif; ?>

        <li class="divider"></li>
        <li><a href="<?= rootAuth('logout') ?>"><i class="material-icons left">logout</i>Logout</a></li>
    </ul>
    <nav class="<?= color($config->color->primary) ?>" role="navigation">
        <div class="nav-wrapper">

            <a id="logo-container" href="<?= rootDashboard() ?>" class="brand-logo hide-on-small-only">Dashboard</a>
            <a id="logo-container" href="<?= rootDashboard() ?>" class="brand-logo small hide-on-med-and-up">Dashboard</a>

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
                <img src="https://materializecss.com/images/office.jpg">
            </div>
            <a><img class="circle" src="<?= root($user->picture->file) ?>" alt="<?= $user->name ?>"></a>
            <a><span class="white-text name"><?= $user->name ?></span></a>
            <a><span class="white-text email"><?= $user->email ?></span></a>
            <a><span class="white-text email"><?= $user->role->name ?></span></a>
        </div>
    </li>
    <li><a class="subheader">Data</a></li>
    <li><a href="<?= rootDashboard() ?>" class="waves-effect <?php if ($nav['active'] == 'stats') echo 'active' ?>"><i class="material-icons">dashboard</i>Statistik</a></li>
    <li><a href="<?= rootDashboard('commodity') ?>" class="waves-effect <?php if ($nav['active'] == 'commodity') echo 'active' ?>"><i class="material-icons">category</i>Komoditas</a></li>
    <li><a href="<?= rootDashboard('product') ?>" class="waves-effect <?php if ($nav['active'] == 'product') echo 'active' ?>"><i class="material-icons">inventory_2</i>Produk</a></li>
    <li><a href="<?= rootDashboard('testimony') ?>" class="waves-effect <?php if ($nav['active'] == 'testimony') echo 'active' ?>"><i class="material-icons">reviews</i>Testimoni</a></li>

    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Brand</a></li>
    <li><a class="waves-effect <?php if ($nav['active'] == 'color') echo 'active' ?>" href="#!"><i class="material-icons">palette</i>Color</a></li>
    <li><a class="waves-effect <?php if ($nav['active'] == 'about') echo 'active' ?>" href="#!"><i class="material-icons">info</i>About</a></li>

    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Web</a></li>
    <?php if ($user->role->id == 1) : ?>
        <li><a href="<?= rootDashboard('user') ?>" class="waves-effect <?php if ($nav['active'] == 'user') echo 'active' ?>"><i class="material-icons">group</i>Users</a></li>
    <?php endif; ?>
    <li><a class="waves-effect <?php if ($nav['active'] == 'setting') echo 'active' ?>" href="#!"><i class="material-icons">settings</i>Settings</a></li>
</ul>