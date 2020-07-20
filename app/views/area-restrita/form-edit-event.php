<main class="uk-flex uk-width-1-1">
    <?php require_once 'aside-menu.php'?>

    <section  class="uk-margin-auto">
        
        <?php if($param['status']=='ok') {?>
        <div class="uk-flex uk-flex-column">
            <div class="uk-margin-top uk-text-center">
                <h4 class="uk-margin-small">EDITAR EVENTO</h4>
            </div>



            <div id="form-edit-event" class="uk-margin-auto uk-margin-top uk-flex uk-flex-around uk-flex-middle">
                <input value="<?=$param['data']['id']??''?>" id="id" type="hidden">
                <div class="uk-width-1-2 uk-margin-right">
                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="genero" class="uk-form-label">Gênero</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['genero']??''?>" id="genero" type="text">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="titulo" class="uk-form-label">Título</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['titulo']??''?>" id="titulo" type="text">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="data" class="uk-form-label">Data</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['data']??''?>" id="data" type="date" min="2020-01-01" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="hora" class="uk-form-label">Hora</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['hora']??''?>" id="hora" type="time" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="telefone" class="uk-form-label">Telefone</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['telefone']??''?>" id="telefone" type="text" placeholder="(XX) XXXX-XXXX">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="celular" class="uk-form-label">Celular</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['celular']??''?>" id="celular" type="text" placeholder="(XX) XXXXX-XXXX" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="descricao" class="uk-form-label">Descrição</label>
                            <textarea class="uk-textarea lb-color-primary"  id="descricao" cols="30" rows="3"><?=$param['data']['descricao']??''?></textarea>
                        </div>
                    </div>
                </div>

                <div class="uk-width-1-2 uk-margin-left">
                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="cep" class="uk-form-label">Cep</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['cep']??''?>" id="cep" type="text" placeholder="xxxxx-xxx" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="logradouro" class="uk-form-label">Rua/Avenida</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['logradouro']??''?>" id="logradouro" type="text" placeholder="Rua dos Bobos" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="numero" class="uk-form-label">Número</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['numero']??''?>" id="numero" type="number" placeholder="número" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="bairro" class="uk-form-label">Bairro</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['bairro']??''?>" id="bairro" type="text" placeholder="Vila do Perdidos" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="complemento" class="uk-form-label">Complemento</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['complemento']??''?>" id="complemento" type="text" placeholder="Entre Avenida Azul e Avenida Amarela">
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="cidade" class="uk-form-label">Cidade</label>
                            <input class="uk-input uk-form-small lb-color-primary" value="<?=$param['data']['cidade']??''?>" id="cidade" type="text" placeholder="Jijoca de Jericoacoara" required>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="estado" class="uk-form-label">Estado</label>
                            <select id="estado" class="uk-select uk-text-right lb-color-primary" required>
                                <option value="">UF</option>
                                <option <?=$param['data']['estado']=='AC'?'selected':''?> value="AC">AC</option>
                                <option <?=$param['data']['estado']=='AL'?'selected':''?> value="AL">AL</option>
                                <option <?=$param['data']['estado']=='AM'?'selected':''?> value="AM">AM</option>
                                <option <?=$param['data']['estado']=='AP'?'selected':''?> value="AP">AP</option>
                                <option <?=$param['data']['estado']=='BA'?'selected':''?> value="BA">BA</option>
                                <option <?=$param['data']['estado']=='CE'?'selected':''?> value="CE">CE</option>
                                <option <?=$param['data']['estado']=='DF'?'selected':''?> value="DF">DF</option>
                                <option <?=$param['data']['estado']=='ES'?'selected':''?> value="ES">ES</option>
                                <option <?=$param['data']['estado']=='GO'?'selected':''?> value="GO">GO</option>
                                <option <?=$param['data']['estado']=='MA'?'selected':''?> value="MA">MA</option>
                                <option <?=$param['data']['estado']=='MT'?'selected':''?> value="MT">MT</option>
                                <option <?=$param['data']['estado']=='MS'?'selected':''?> value="MS">MS</option>
                                <option <?=$param['data']['estado']=='MG'?'selected':''?> value="MG">MG</option>
                                <option <?=$param['data']['estado']=='PA'?'selected':''?> value="PA">PA</option>
                                <option <?=$param['data']['estado']=='PB'?'selected':''?> value="PB">PB</option>
                                <option <?=$param['data']['estado']=='PR'?'selected':''?> value="PR">PR</option>
                                <option <?=$param['data']['estado']=='PE'?'selected':''?> value="PE">PE</option>
                                <option <?=$param['data']['estado']=='PI'?'selected':''?> value="PI">PI</option>
                                <option <?=$param['data']['estado']=='RJ'?'selected':''?> value="RJ">RJ</option>
                                <option <?=$param['data']['estado']=='RN'?'selected':''?> value="RN">RN</option>
                                <option <?=$param['data']['estado']=='RO'?'selected':''?> value="RO">RO</option>
                                <option <?=$param['data']['estado']=='RS'?'selected':''?> value="RS">RS</option>
                                <option <?=$param['data']['estado']=='RR'?'selected':''?> value="RR">RR</option>
                                <option <?=$param['data']['estado']=='SC'?'selected':''?> value="SC">SC</option>
                                <option <?=$param['data']['estado']=='SE'?'selected':''?> value="SE">SE</option>
                                <option <?=$param['data']['estado']=='SP'?'selected':''?> value="SP">SP</option>
                                <option <?=$param['data']['estado']=='TO'?'selected':''?> value="TO">TO</option>
                            </select>
                        </div>
                    </div>

                    <div class="uk-width-1-1 uk-margin">
                        <div class="input-line">
                            <label for="imgs" class="uk-form-label">Imagens</label>
                            <input class="uk-input uk-form-small lb-color-primary" id="banner" name="banner" type="file">
                            <input id="old-banner" value="<?=$param['data']['url_img']?>" type="hidden">
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-margin-auto uk-flex uk-flex-center uk-width-2-3">
                <button id="btn-salvar" class="uk-margin-left lb-button lb-button-primary uk-width-1-3">salvar</button>
            </div>

        </div>
        <?php } else { ?>
            <h5>Ops! não encontramos nenhuma informação!</h5>
        <?php } ?>
        

    </section>

</main>