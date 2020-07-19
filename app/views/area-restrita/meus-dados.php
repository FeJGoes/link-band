<main class="uk-flex uk-width-1-1">
    <?php require_once 'aside-menu.php'?>

    <section class="uk-margin-auto uk-flex uk-flex-middle">
        <div id="form-edit-user" class="uk-margin-2-3 uk-flex uk-flex-column">
            <div class="uk-margin uk-text-center">
                <h4 class="uk-margin-small">EDITAR MEUS DADOS</h4>
            </div>

            <div class="uk-width-1-1 uk-margin">
                <div class="input-line">
                    <label class="uk-text-uppercase" for="nome">Nome</label>
                    <input class="uk-input" id="nome" value="<?=$_SESSION['nome']?>" type="text" maxlength="50" required>
                </div>
            </div>

            <div class="uk-width-1-1 uk-margin">
                <div class="input-line">
                    <label class="uk-text-uppercase" for="email">Email</label>
                    <input class="uk-input" id="email" value="<?=$_SESSION['email']?>" type="text" maxlength="50" required>
                </div>
            </div>


            <button id="btn-save" class="lb-button lb-button-primary uk-margin-top uk-width-1-1">salvar</button>
        </div>
    </section>
</main>
<?php require_once 'modal-create-event.php'?>