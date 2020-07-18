<main class="uk-flex">
    <aside id="side-menu" class="lb-bg-primary uk-padding-small">

        <div id="nav-logo" class="uk-flex uk-flex-column uk-margin-top">
            <a href="<?=HOST?>">
                <img id="logo" src="<?=HOST.IMGS_DIR?>logo/logo-linkeband-palheta.png" width="80">
            </a>

            <div>
                <h5 class="white-text lb-font uk-margin-top">Link&Band</h5>
            </div>
        </div>

        <ul class="uk-nav-default uk-nav-parent-icon uk-margin-top" uk-nav>
            <li>
                <a href="#">
                    <span class="uk-margin-small-right" uk-icon="icon: user"></span>
                    Meus dados
                </a>
            </li>
            <li>
                <a href="#form-cad-event" uk-toggle>
                    <span class="uk-margin-small-right" uk-icon="icon: plus-circle"></span>
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
    <?='<pre>'?>
    <?=print_r($_SESSION)?>
    <?='</pre>'?>

    <section class="uk-flex uk-flex-wrap uk-flex-center uk-panel uk-panel-scrollable uk-height-viewport">

        <div class="uk-card uk-card-default lb-card-event">
            <div class="uk-card-media-top">
                <img src="<?=HOST.IMGS_DIR?>img1.jpg" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Media Top</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="uk-margin-auto uk-flex uk-flex-center uk-width-1-1">
                    <button class="uk-margin-left lb-button lb-button-primary uk-width-1-3" uk-tooltip="title: editar; pos: bottom">
                        <span class="white-text" uk-icon="settings"></span>
                    </button>
                    <button class="lb-button lb-button-danger uk-width-1-3" uk-tooltip="title: apagar; pos: bottom">
                        <span class="white-text" uk-icon="trash"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default lb-card-event">
            <div class="uk-card-media-top">
                <img src="<?=HOST.IMGS_DIR?>img1.jpg" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Media Top</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="uk-margin-auto uk-flex uk-flex-center uk-width-1-1">
                    <button class="uk-margin-left lb-button lb-button-primary uk-width-1-2">editar</button>
                    <button class="lb-button lb-button-danger uk-width-1-2">
                        <span class="white-text" uk-icon="trash"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default lb-card-event">
            <div class="uk-card-media-top">
                <img src="<?=HOST.IMGS_DIR?>img1.jpg" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Media Top</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="uk-margin-auto uk-flex uk-flex-center uk-width-1-1">
                    <button class="uk-margin-left lb-button lb-button-primary uk-width-1-2">editar</button>
                    <button class="lb-button lb-button-danger uk-width-1-2">
                        <span class="white-text" uk-icon="trash"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default lb-card-event">
            <div class="uk-card-media-top">
                <img src="<?=HOST.IMGS_DIR?>img4.jpg" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Media Top</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="uk-margin-auto uk-flex uk-flex-center uk-width-1-1">
                    <button class="uk-margin-left lb-button lb-button-primary uk-width-1-2">editar</button>
                    <button class="uk-button uk-button-danger uk-width-1-2">
                        <span uk-icon="trash"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default lb-card-event">
            <div class="uk-card-media-top">
                <img src="<?=HOST.IMGS_DIR?>img2.jpg" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Media Top</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="uk-margin-auto uk-flex uk-flex-center uk-width-1-1">
                    <button class="uk-margin-left lb-button lb-button-primary uk-width-1-2">editar</button>
                    <button class="uk-button uk-button-danger uk-width-1-2">
                        <span uk-icon="trash"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default lb-card-event">
            <div class="uk-card-media-top">
                <img src="<?=HOST.IMGS_DIR?>img5.jpg" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Media Top</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="uk-margin-auto uk-flex uk-flex-center uk-width-1-1">
                    <button class="uk-margin-left lb-button lb-button-primary uk-width-1-2">editar</button>
                    <button class="uk-button uk-button-danger uk-width-1-2">
                        <span uk-icon="trash"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default lb-card-event">
            <div class="uk-card-media-top">
                <img src="<?=HOST.IMGS_DIR?>img1.jpg" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Media Top</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="uk-margin-auto uk-flex uk-flex-center uk-width-1-1">
                    <button class="uk-margin-left lb-button lb-button-primary uk-width-1-2">editar</button>
                    <button class="uk-button uk-button-danger uk-width-1-2">
                        <span uk-icon="trash"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-default lb-card-event">
            <div class="uk-card-media-top">
                <img src="<?=HOST.IMGS_DIR?>img1.jpg" alt="">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Media Top</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                <div class="uk-margin-auto uk-flex uk-flex-center uk-width-1-1">
                    <button class="uk-margin-left lb-button lb-button-primary uk-width-1-2">editar</button>
                    <button class="uk-button uk-button-danger uk-width-1-2">
                        <span uk-icon="trash"></span>
                    </button>
                </div>
            </div>
        </div>

    </section>

</main>


<div id="form-cad-event" class="uk-modal-full lb-bg-primary" uk-modal>
    <div class="uk-modal-dialog lb-bg-primary">
        <button class="uk-modal-close-default uk-close-large lb-color-tertiary" type="button" uk-close></button>

        <div class="uk-flex uk-flex-column">
            <div class="uk-margin-top uk-text-center">
                <img src="<?=HOST.IMGS_DIR?>logo/logo-linkeband-palheta.png" width="45">
                <h5 class="white-text uk-margin-small">Criando meu evento</h5>
            </div>

            <div id="form-login" class="uk-margin-auto uk-margin-top uk-flex uk-flex-around uk-flex-middle">
                <div class="uk-width-1-2 uk-margin-right">
                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="genero" class="uk-form-label">Gênero</label>
                            <input class="uk-input uk-form-small" id="genero" type="text">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="titulo" class="uk-form-label">Título</label>
                            <input class="uk-input uk-form-small" id="titulo" type="text">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="data" class="uk-form-label">Data</label>
                            <input class="uk-input uk-form-small" id="data" type="date" min="2020-01-01" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="hora" class="uk-form-label">Hora</label>
                            <input class="uk-input uk-form-small" id="hora" type="time" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="telefone" class="uk-form-label">Telefone</label>
                            <input class="uk-input uk-form-small" id="telefone" type="text" placeholder="(XX) XXXX-XXXX">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="celular" class="uk-form-label">Celular</label>
                            <input class="uk-input uk-form-small" id="celular" type="text" placeholder="(XX) XXXXX-XXXX" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="descricao" class="uk-form-label">Descrição</label>
                            <textarea class="uk-textarea" id="descricao" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="uk-width-1-2 uk-margin-left">
                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="cep" class="uk-form-label">Cep</label>
                            <input class="uk-input uk-form-small" id="cep" type="text" placeholder="XX.XXX-XXX" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="logradouro" class="uk-form-label">Rua/Avenida</label>
                            <input class="uk-input uk-form-small" id="logradouro" type="text" placeholder="Rua dos Bobos" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="numero" class="uk-form-label">Número</label>
                            <input class="uk-input uk-form-small" id="numero" type="number" placeholder="número" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="bairro" class="uk-form-label">Bairro</label>
                            <input class="uk-input uk-form-small" id="bairro" type="text" placeholder="Vila do Perdidos" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="complemento" class="uk-form-label">Complemento</label>
                            <input class="uk-input uk-form-small" id="complemento" type="text" placeholder="Entre Avenida Azul e Avenida Amarela">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="cidade" class="uk-form-label">Cidade</label>
                            <input class="uk-input uk-form-small" id="cidade" type="text" placeholder="Jijoca de Jericoacoara">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="estado" class="uk-form-label">Estado</label>
                            <select id="estado" class="uk-select">
                                <option value="">UF</option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AM">AM</option>
                                <option value="AP">AP</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RO">RO</option>
                                <option value="RS">RS</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SE">SE</option>
                                <option value="SP">SP</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="imgs" class="uk-form-label">Imagens</label>
                            <input class="uk-input uk-form-small" id="imgs" name="imgs[]" type="file">
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-margin-auto uk-flex uk-flex-center uk-width-2-3">
                <button class="lb-button lb-button-default uk-modal-close uk-width-1-3" type="button">cancelar</button>
                <button id="btn-salvar" class="uk-margin-left lb-button lb-button-primary uk-width-1-3">salvar</button>
            </div>
        </div>
    </div>
</div>