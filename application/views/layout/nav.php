<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url();?>users"><?= $permisos ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $username ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <button class="btn_logout dropdown-item">
                            Logout
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="jumbotron text-center">
    <div class="container">
        <h3 class="jumbotron-heading">DESAROLLO DE APLICACIONES WEB</h3>
    </div>
</section>