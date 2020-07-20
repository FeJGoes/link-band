/******************************************************************************/
/****************************** VARIABLES *************************************/
/******************************************************************************/

/******************************************************************************/
/******************************* EVENTOS **************************************/
/******************************************************************************/


/******************************************************************************/
/******************************* FUNÇÕES **************************************/
/******************************************************************************/

function detroyModal(id)
{
    document.getElementById('btn-destroy-event').dataset.id = id
    UIkit.modal("#destroy-modal").show()
}

function destroyEvent(element)
{
    btn = this
    url = location.origin + '/area-restrita/eventos/destroy'
    data = new FormData
    data.append('id', element.dataset.id)

    fetch(url,
        {
            method: 'POST',
            body: data
        })
        .then(res => res.json())
        .then(res =>
        {
            btn.innerText = 'Aguarde...'
            if (res.status == 'ok')
            {
                setTimeout(() =>
                {
                    btn.innerText = 'OK'
                    showNotification(res.message, 'success', 7000)
                    UIkit.modal('#destroy-modal').hide()

                    setTimeout(() =>
                    {
                       location.reload()

                    }, 6000)
                }, 1500)
            }
            else
            {
                btn.innerText = 'apagar'
                showNotification(res.message, 'warning', 5000)
            }
        })
        .catch(err => console.log(err))
}