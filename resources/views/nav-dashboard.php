<style>
    header,
    main,
    footer {
        padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {

        header,
        main,
        footer {
            padding-left: 0;
        }
    }
</style>
<div class="navbar">
    <!-- Dropdown Structure -->
    <ul id="more" class="dropdown-content">
        <li><a href="<?= root() ?>"><i class="material-icons left">public</i>View Page</a></li>
        <li class="divider"></li>
        <li><a href="<?= rootAuth('logout') ?>"><i class="material-icons left">logout</i>Logout</a></li>
    </ul>
    <nav class="<?= color($config->color->primary) ?>" role="navigation">
        <div class="nav-wrapper">

            <a id="logo-container" href="<?= rootDashboard() ?>" class="brand-logo">Dashboard</a>

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
    <li><a href="<?= rootDashboard() ?>" class="waves-effect <?php if ($nav['active'] == 'stats') echo 'active' ?>"><i class="material-icons">dashboard</i>Statistics</a></li>
    <li><a href="<?= rootDashboard('product') ?>" class="waves-effect <?php if ($nav['active'] == 'product') echo 'active' ?>"><i class="material-icons">inventory_2</i>Products</a></li>
    <li><a href="<?= rootDashboard('user') ?>" class="waves-effect <?php if ($nav['active'] == 'user') echo 'active' ?>"><i class="material-icons">group</i>Users</a></li>
    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Brand</a></li>
    <li><a class="waves-effect <?php if ($nav['active'] == 'about') echo 'active' ?>" href="#!" <?php if ($nav['active'] == 'about') echo 'class="active"' ?>><i class="material-icons">info</i>About</a></li>
    <li><a class="waves-effect <?php if ($nav['active'] == 'setting') echo 'active' ?>" href="#!"><i class="material-icons">settings</i>Settings</a></li>
</ul>