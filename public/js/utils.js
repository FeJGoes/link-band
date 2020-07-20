/** ****************************************************************************
 * 
 * 
 * 
 * @description executa a busca de dados via GET e Fetch API na url informada
 * @tutorial https://github.github.io/fetch/  https://developer.mozilla.org/pt-BR/docs/Web/API/Fetch_API
 * @param {String} urlToFetch 
 * @param {Object} urlParams 
 * @param {Function} actionOnSuccess 
 * @param {Function} actionOnFailure 
 */
function fetchMethodGET(urlToFetch, urlParams, actionOnSuccess, actionOnFailure)
{
    let queryParams = builURLQuery(urlParams)

    // console.log(urlToFetch + queryParams)

    fetch(urlToFetch + queryParams)
        .then(res => res.json())
        .then(jsonRes =>
        {
            actionOnSuccess(jsonRes)
        })
        .catch(error =>
        {
            actionOnFailure(error)
        })

    /**
     * @description monta a query string da opção consulta GET 
     * @param {Object} object 
     */
    function builURLQuery(object)
    {
        return '?' + Object.entries(object)
            .map(pair => pair.map(encodeURIComponent).join('='))
            .join('&')
    }
}

/** ****************************************************************************
 * 
 * 
 * @description executa a busca de dados via POST e Fetch API na url informada
 * @tutorial https://github.github.io/fetch/  https://developer.mozilla.org/pt-BR/docs/Web/API/Fetch_API
 * @param {String} urlToFetch 
 * @param {FormData} formData 
 * @param {Function} actionOnSuccess 
 * @param {Function} actionOnFailure 
 */
function fetchMethodPOST(urlToFetch, formData, actionOnSuccess, actionOnFailure)
{
    fetch(urlToFetch,
        {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(jsonRes =>
        {
            actionOnSuccess(jsonRes)
        })
        .catch(error =>
        {
            actionOnFailure(error)
        })
}

/******************************************************************************/

/**
 * 
 * Função para verificar inputs, selects e textareas vazias
 * 
 * @param {HTMLElement} parent 
 * @returns {String} 
 */
function findEmpty(parent)
{
    let inputs     = parent.getElementsByTagName('input')    
    let selects    = parent.getElementsByTagName('select')   
    let textareas  = parent.getElementsByTagName('textarea')
    let isEmpty    = [] 
    
    if (inputs.length !== 0)
    {
        for (input of inputs)
        {
            if(input.value == '' && input.required == true)
            {
                input.classList.add('uk-form-danger')
                isEmpty.push(input) 
            }
            else
            {
                input.classList.remove('uk-form-danger')
            }
        }
    }
    
    if (selects.length !== 0)
    {
        for (select of selects)
        {
            if(select.value == '' && select.required == true)
            {
                select.classList.add('uk-form-danger')
                isEmpty.push(select) 
            }
            else
            {
                select.classList.remove('uk-form-danger')
            }
        }
    }
   
    if (textareas.length !== 0)
    {
        for (textarea of textareas)
        {
            if(textarea.value == '' && textarea.required == true)
            {
                textarea.classList.add('uk-form-danger')
                isEmpty.push(textarea) 
            }
            else
            {
                textarea.classList.remove('uk-form-danger')
            }
        }
    }

    if(isEmpty.length !== 0)
    {
        UIkit.notification("Existem campos obrigatórios não preenchidos", 
                    {
                        status: 'danger', 
                        pos: 'top-center',
                        timeout: 5000
                    });
    }

    return isEmpty.length !== 0 ? true : false
}

/**
 * 
 * @param {String} type primary | success | warning | danger
 * @param {String} message 
 * @param {Number} time
 * @param {Boolean} reload 
 */
function showNotification(message, type='primary', time=5000)
{
    UIkit.notification({
        message: message,
        status: type,
        pos: 'top-center',
        timeout: time
    });
}

/**
 * 
 * Função para aplicar mascara de número de telefone
 * 
 * @param {String} fone 
 * @returns {String} 
 */
function phoneMask(fone) 
{
    if (fone.length <= 15)
    {
        fone = fone.replace(/\D/g, ""); //Remove tudo o que não é dígito
        fone = fone.replace(/^(\d{2})(\d)/g, "($1) $2") //Coloca parênteses em volta dos dois primeiros dígitos
        fone = fone.replace(/(\d)(\d{4})$/, "$1-$2") //Coloca hífen entre o quarto e o quinto dígitos
        return fone
    }
    else
    {
        fone = fone.slice(0,15) //Coloca hífen entre o quarto e o quinto dígitos
        return fone
    }
}