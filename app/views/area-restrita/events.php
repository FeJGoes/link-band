<main class="uk-flex uk-width-1-1">
    <?php require_once 'aside-menu.php'?>

    <section class="uk-uk-width-auto uk-flex uk-flex-wrap uk-flex-center uk-panel uk-panel-scrollable uk-height-viewport">

        <?php if($param['status']=='ok') {?>
            <?php foreach($param['data'] as $event) {?>
            <div class="uk-card uk-card-default lb-card-event">
                <div class="uk-card-media-top">
                    <img src="<?=HOST?><?=$event['url_img']?>">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title"><?=$event['titulo']?></h3>
                    <h5><?=$event['genero']?>
                        <br> Data: <?=(new DateTime($event['data']))->format('d/m/Y')?> 
                        <br> Hora: <?=$event['hora']?>
                    </h5>
                    <p class="descricao"><?=$event['descricao']?></p>
                    <div class="uk-margin-auto uk-flex uk-flex-center uk-width-1-1">
                        <a href="<?=HOST.'area-restrita/evento/edit?e='.$event['id']?>" class="uk-margin-left lb-button lb-button-primary uk-width-1-3 uk-flex uk-flex-center uk-flex-middle" uk-tooltip="title: editar; pos: bottom">
                            <span class="lb-color-text" uk-icon="settings"></span>
                        </a>
                        <span onclick="detroyModal(<?=$event['id']?>)" class="uk-margin-left lb-button lb-button-danger uk-width-1-3 uk-flex uk-flex-center uk-flex-middle" uk-tooltip="title: apagar; pos: bottom">
                            <span class="lb-color-text" uk-icon="trash"></span>
                        </span>
                    </div>
                </div>
            </div>
            <?php }?>
        <?php } else {?>
            <h2 class="">Nenhum evento cadastrado!</h2>
        <?php }?>



    </section>
</main>

<div id="destroy-modal" uk-modal="escClose: false; bgClose: false">
    <div class="uk-modal-dialog uk-modal-body">
        <p>Você deseja realmente apagar o evento?</p>
        <p class="uk-text-right">
            <button class="lb-button lb-button-default uk-modal-close" type="button">cancel</button>
            <button id="btn-destroy-event" onclick="destroyEvent(this)" class="lb-button lb-button-danger" type="button">confirmar</button>
        </p>
    </div>
</div>
