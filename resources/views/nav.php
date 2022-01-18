<div class="navbar-fixed">
    <nav id="home" class="pink darken-3" role="navigation">
        <div class="nav-wrapper container">
            <a href="<?= url() ?>" class="logo">
                <img src="<?= url('assets/img/logo-chintia.png'); ?>" class="" alt="" />
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="<?= url('/') ?>" <?php if ($active == 'home') echo 'class="active"' ?>>Home</a></li>
                <li><a href="<?= url('/product') ?>" <?php if ($active == 'product') echo 'class="active"' ?>>Product</a></li>
                <li><a href="<?= url('/contact') ?>" <?php if ($active == 'contact') echo 'class="active"' ?>>Contact</a></li>
                <li><a href="<?= url('/about') ?>" <?php if ($active == 'about us') echo 'class="active"' ?>>About Us</a></li>
            </ul>


            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>
<ul id="nav-mobile" class="sidenav">
    <li><a href="<?= url('/') ?>" <?php if ($active == 'home') echo 'class="active"' ?>>Home</a></li>
    <li><a href="<?= url('/product') ?>" <?php if ($active == 'product') echo 'class="active"' ?>>Product</a></li>
    <li><a href="<?= url('/contact') ?>" <?php if ($active == 'contact') echo 'class="active"' ?>>Contact</a></li>
    <li><a href="<?= url('/about') ?>" <?php if ($active == 'about us') echo 'class="active"' ?>>About Us</a></li>
</ul>