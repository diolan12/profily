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
        <li><a href="#!"><i class="material-icons left">logout</i>Logout</a></li>
    </ul>
    <nav class="<?= color($config->color->primary) ?>" role="navigation">
        <div class="nav-wrapper">

            <a id="logo-container" href="<?= rootDashboard() ?>" class="brand-logo">Dashboard</a>

            <ul class="right hide-on-med-and-down">
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
            <a href="#user"><img class="circle" src="https://materializecss.com/images/yuna.jpg"></a>
            <a href="#name"><span class="white-text name">John Doe</span></a>
            <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Data</a></li>
    <li><a href="<?= rootDashboard() ?>"><i class="material-icons">dashboard</i>Home</a></li>
    <li><a href="<?= rootDashboard('product') ?>"><i class="material-icons">inventory_2</i>Products</a></li>
    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Brand</a></li>
    <li><a class="waves-effect" href="#!"><i class="material-icons">info</i>About</a></li>
    <li><a class="waves-effect" href="#!"><i class="material-icons">settings</i>Settings</a></li>
</ul>