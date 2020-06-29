<main id="login-bkg">
    <div id="form-login" class="uk-width-1-4@m uk-margin-auto uk-flex uk-flex-column">

        <div class="uk-margin uk-text-center">
            <a href="<?=HOST?>" class="uk-margin-remove">
                <img src="<?=HOST.IMGS_DIR?>logo/logo-linkeband-branco.png" width="150">
            </a>
        </div>

        <div class="uk-width-1-1 uk-margin">
            <div class="input-line">
                <span uk-icon="icon: user" style="color: var(--color-text)"></span>
                <input class="uk-input" id="email" type="text" placeholder="email" required>
            </div>
        </div>

        <div class="uk-width-1-1 uk-margin">
            <div class="input-line">
                <span uk-icon="icon: lock" style="color: var(--color-text)"></span>
                <input class="uk-input" id="password" type="password" placeholder="senha" required>
            </div>
        </div>

        <div class="uk-flex uk-flex-center">
            <button id="btn-login" class="lb-button lb-button-primary uk-width-1-2">entrar</button>
        </div>

        <div class="uk-flex uk-flex-around uk-margin">
            <a href="#modal-esqueci-senha" uk-toggle>
                <small class="white-text">Esqueci a Senha</small>
            </a>

            <a href="<?=HOST?>new">
                <small class="white-text a-text-decoration">Criar minha conta</small>
            </a>
        </div>
    </div>
</main>

<div id="modal-esqueci-senha" uk-modal="escClose:false; bgClose:false">
    <div class="uk-modal-dialog">
        <!-- <button class="uk-modal-close-default" type="button" uk-close></button> -->
        <div class="uk-modal-body" id="form-esqueci-senha">
            <div>
                <label class="uk-form-label">E-mail
                    <input type="text" id="email-esqueci" class="uk-input" placeholder="Insira o seu e-mail" required>
                </label>
            </div>
            <p>Vamos enviar no seu email os processos para recuperação da sua senha</p>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="lb-button lb-button-default uk-modal-close" type="button">Cancelar</button>
            <button class="lb-button lb-button-primary" id="btn-esqueci-senha" type="button">Enviar</button>
        </div>
    </div>
</div>