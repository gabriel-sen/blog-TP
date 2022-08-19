<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <a class="navbar-brand" href="#">Gabriel SEN Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= URL; ?>home">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL; ?>articles">Articles</a>
            </li>
            <?php if(!Security::islogged()) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL; ?>login">Se Connecter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL; ?>creataccount">Créer un compte</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL; ?>compte/profil">Mon profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL; ?>compte/logout">Se déconnecter</a>
                </li>
            <?php endif ; ?>
        </ul>
        <?php if(Security::islogged() && Security::isAdmin()) : ?>
        <div class="dropdown">
            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Administration
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?= URL; ?>admin/rights">Gérer les droits</a>
                <a class="dropdown-item" href="<?= URL; ?>admin/articlesManagement">Gérer les articles</a>
                <a class="dropdown-item" href="<?= URL; ?>admin/commentsManagement">Gérer les Commentaires</a>
            </div>
        </div>
        <?php endif ; ?>
    </div>
    </nav>