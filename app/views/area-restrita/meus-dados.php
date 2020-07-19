<main class="uk-flex uk-width-1-1">
    <?php require_once 'aside-menu.php'?>

    <section class="uk-margin-auto uk-flex uk-flex-middle">
        <div id="form-edit" class="uk-margin-2-3 uk-flex uk-flex-column">
            <div class="uk-margin uk-text-center">
                <h4 class="uk-margin-small">EDITAR MEUS DADOS</h4>
            </div>

            <div class="uk-width-1-1 uk-margin">
                <div class="input-line">
                    <label class="uk-text-uppercase" for="nome">Nome</label>
                    <input class="uk-input lb-color-primary" id="nome" value="<?=$_SESSION['nome']?>" type="text" maxlength="50" required>
                </div>
            </div>

            <div class="uk-width-1-1 uk-margin">
                <div class="input-line">
                    <label class="uk-text-uppercase" for="email">Email</label>
                    <input class="uk-input lb-color-primary" id="email" value="<?=$_SESSION['email']?>" type="text" maxlength="50" required>
                </div>
            </div>

            <div class="uk-width-1-1 uk-margin">
                <div class="input-line">
                    <label class="uk-text-uppercase" for="senha">Senha</label>
                    <input class="uk-input lb-color-primary" id="password" type="password" maxlength="50">
                </div>

                <div>
                    <input type="checkbox" id="show-pass">
                    <small>mostrar senha</small>
                </div>
            </div>


            <button id="btn-edit" data-id="<?=$_SESSION['id']?>" class="lb-button lb-button-primary uk-margin-top uk-width-1-1">salvar</button>
            <button uk-toggle="target: #modal-delete-accont" class="lb-button lb-button-danger uk-margin-top uk-width-1-1">encerrar minha conta</button>
        </div>
    </section>
</main>

<?php require_once 'modal-create-event.php'?>

<div id="modal-delete-accont" uk-modal="escClose:false; bgClose:false">
    <div class="uk-modal-dialog">
        <!-- <button class="uk-modal-close-default" type="button" uk-close></button> -->
        <div class="uk-modal-body">
            <h5>Você realmente deseja encerrar sua conta ?</h5>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="lb-button lb-button-default uk-modal-close" type="button">Cancelar</button>
            <button class="lb-button lb-button-danger" data-id="<?=$_SESSION['id']?>" id="btn-delete-account" type="button">Sim</button>
        </div>
    </div>
</div>