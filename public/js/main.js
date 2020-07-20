/******************************************************************************/
/****************************** VARIABLES *************************************/
/******************************************************************************/
var formContato = document.getElementById('form-contato')
var btnContato = document.getElementById('btn-contato')

/******************************************************************************/
/******************************* EVENTOS **************************************/
/******************************************************************************/

btnContato.onclick = () => makeContact(formContato,btnContato)

/******************************************************************************/
/******************************* FUNÇÕES **************************************/
/******************************************************************************/

function makeContact(form, btn)
{
    if (findEmpty(form) === false)
    {
        btn.innerText = 'Aguarde...'
        setTimeout(() =>
        {
            btn.innerText = 'OK'
            showNotification('Fique tranquilo que recebemos o seu contato e logo vamos te responder! ;D', 'success', 7000)
            setTimeout(()=>{location.reload()},6500)
        }, 1000)
    }
}