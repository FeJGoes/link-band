<aside id="side-menu" class="lb-bg-primary uk-padding-small">

    <div class="uk-flex uk-flex-column uk-margin-auto uk-margin-top">
        <a class="uk-margin-auto" href="<?=HOST?>area-restrita/home">
            <img id="logo" src="<?=HOST.IMGS_DIR?>logo/logo-linkeband-palheta.png" width="80">
        </a>

        <div>
            <h5 class="lb-color-text lb-font uk-text-center uk-margin-top">Link&Band</h5>
        </div>
    </div>

    <div class="uk-margin-top">
        <h6 class="lb-color-text uk-text-center">Olá <br>
            <strong><?=$_SESSION['nome'];?></strong>
        </h6>
    </div>

    <ul class="uk-nav-default uk-nav-parent-icon uk-margin-top" uk-nav>
        <li>
            <a href="<?=HOST?>area-restrita/home">
                <span class="uk-margin-small-right" uk-icon="icon: home"></span>
                Início
            </a>
        </li>
        <li>
            <a href="<?=HOST?>area-restrita/meus-dados">
                <span class="uk-margin-small-right" uk-icon="icon: user"></span>
                Meus dados
            </a>
        </li>
        <li>
            <a href="<?=HOST?>area-restrita/eventos">
                <span class="uk-margin-small-right" uk-icon="icon: bolt"></span>
                Meus eventos
            </a>
        </li>
        <li>
            <a href="#form-cad-event" uk-toggle>
                <span class="uk-margin-small-right" uk-icon="icon: star"></span>
                Criar Evento
            </a>
        </li>
        <li>
            <a href="<?=HOST?>area-restrita/logout">
                <span class="uk-margin-small-right" uk-icon="icon: sign-out"></span>
                Sair
            </a>
        </li>
    </ul>

</aside>

    