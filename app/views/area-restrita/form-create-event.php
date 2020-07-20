<main class="uk-flex uk-width-1-1">
    <?php require_once 'aside-menu.php'?>

    <section id="form-cad-event" class="uk-margin-auto">

        <div class="uk-flex uk-flex-column">
            <div class="uk-margin-top uk-text-center">
                <h4 class="uk-margin-small">CRIANDO EVENTO</h4>
            </div>

            <div id="form-login" class="uk-margin-auto uk-margin-top uk-flex uk-flex-around uk-flex-middle">
                <div class="uk-width-1-2 uk-margin-right">
                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="genero" class="uk-form-label">Gênero</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="genero" type="text">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="titulo" class="uk-form-label">Título</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="titulo" type="text">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="data" class="uk-form-label">Data</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="data" type="date" min="2020-01-01" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="hora" class="uk-form-label">Hora</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="hora" type="time" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="telefone" class="uk-form-label">Telefone</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="telefone" type="text" placeholder="(XX) XXXX-XXXX">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="celular" class="uk-form-label">Celular</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="celular" type="text" placeholder="(XX) XXXXX-XXXX" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="descricao" class="uk-form-label">Descrição</label>
                            <textarea class="uk-textarea lb-color-primary" id="descricao" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="uk-width-1-2 uk-margin-left">
                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="cep" class="uk-form-label">Cep</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="cep" type="text" placeholder="xxxxx-xxx" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="logradouro" class="uk-form-label">Rua/Avenida</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="logradouro" type="text" placeholder="Rua dos Bobos" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="numero" class="uk-form-label">Número</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="numero" type="number" placeholder="número" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="bairro" class="uk-form-label">Bairro</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="bairro" type="text" placeholder="Vila do Perdidos" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="complemento" class="uk-form-label">Complemento</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="complemento" type="text" placeholder="Entre Avenida Azul e Avenida Amarela">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="cidade" class="uk-form-label">Cidade</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="cidade" type="text" placeholder="Jijoca de Jericoacoara">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="estado" class="uk-form-label">Estado</label>
                            <select id="estado" class="uk-select uk-text-right lb-color-primary">
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
                            <input class="uk-input uk-form-small lb-color-primary" id="banner" name="banner" type="file">
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-margin-auto uk-flex uk-flex-center uk-width-2-3">
                <button class="lb-button lb-button-default uk-modal-close uk-width-1-3" type="button">cancelar</button>
                <button id="btn-salvar" class="uk-margin-left lb-button lb-button-primary uk-width-1-3">salvar</button>
            </div>

        </div>
    </section>

</main>