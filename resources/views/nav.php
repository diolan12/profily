<div class="navbar-fixed">
    <nav class="<?= color($config->color->primary) ?>" role="navigation">
        <div class="nav-wrapper">

            <?php if ($config->web->brand_type->val1 == 'logo') : ?>
                <a href="<?= root() ?>" class="brand-logo img ">
                    <img src="<?= root('assets/img/'. $config->web->brand_logo->val1); ?>" class="responsive-img" alt="Logo Long" />
                </a>
            <?php else : ?>
                <a href="<?= root() ?>" class="brand-logo text"><?= $config->brand->information->val1; ?></a>
            <?php endif; ?>

            <ul class="right hide-on-med-and-down">
                <li><a scroll="home" class="activated" href="<?= root('/') ?>">Home</a></li>
                <li><a scroll="about" class="activated" href="<?= root('/#about') ?>">About Us</a></li>
                <li><a scroll="product" href="<?= root('/product') ?>" <?php if ($nav['active'] == 'product') echo 'class="active"' ?>>Product</a></li>
                <li><a scroll="shipping" class="activated" href="<?= root('/#shipping') ?>">Shipping & Payment</a></li>
                <li><a scroll="testimony" class="activated" href="<?= root('/#testimony') ?>">Testimony</a></li>
            </ul>


            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
</div>
<ul id="nav-mobile" class="sidenav">
    <li><a scroll="home" class="activated" href="<?= root('/') ?>">Home</a></li>
    <li><a scroll="about" class="activated" href="<?= root('/#about') ?>">About Us</a></li>
    <li><a scroll="product" href="<?= root('/product') ?>" <?php if ($nav['active'] == 'product') echo 'class="active"' ?>>Product</a></li>
    <li><a scroll="shipping" class="activated" href="<?= root('/#shipping') ?>">Shipping & Payment</a></li>
    <li><a scroll="testimony" class="activated" href="<?= root('/#testimony') ?>">Testimony</a></li>
</ul>