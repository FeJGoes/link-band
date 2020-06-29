<main class="bg-create-user uk-flex uk-flex-middle">
    <figure id="img-create" class="uk-width-1-2">
        <img src="<?=HOST.IMGS_DIR?>palco.jpg">
    </figure>

    <div id="form-create" class="uk-width-1-2 ">
        <div class="uk-width-1-2 uk-margin-auto uk-flex uk-flex-column">
            <div class="uk-margin uk-text-center">
                <img src="<?=HOST.IMGS_DIR?>logo/logo-linkeband-palheta.png" width="45">
                <h5 class="white-text uk-margin-small">Criando minha conta</h5>
                <p class="white-text uk-margin-small">Let's do it! É bem rápido</p>
            </div>
    
            <div class="uk-width-1-1 uk-margin">
                <div class="input-line">
                    <label class="uk-text-uppercase" for="nome">Nome</label>
                    <input class="uk-input" id="nome" type="text" maxlength="50" required>
                </div>
            </div>
    
            <div class="uk-width-1-1 uk-margin">
                <div class="input-line">
                    <label class="uk-text-uppercase" for="email">Email</label>
                    <input class="uk-input" id="email" type="text" maxlength="50" required>
                </div>
            </div>
    
            <div class="uk-width-1-1 uk-margin">
                <div class="input-line">
                    <label class="uk-text-uppercase" for="senha">Senha</label>
                    <input class="uk-input" id="password" type="password" maxlength="50" required>
                </div>

                <div>
                    <input type="checkbox" id="show-pass">
                    <small>mostrar senha</small>
                </div>
            </div>

            <div class="uk-width-1-1">
                <div class="input-line">
                    <label class="uk-text-uppercase" for="csenha">Confirme a senha</label>
                    <input class="uk-input" id="cpassword" type="password" maxlength="50" required>
                </div>
            </div>
    
            <div class="uk-margin-medium-top uk-flex uk-flex-around">
                <a href="<?=HOST?>" class="white-text uk-button uk-width-1-3">voltar</a>
                <button id="btn-login" class="lb-button lb-button-primary uk-width-1-3">criar</button>
            </div>
        </div>
    </div>
</main>