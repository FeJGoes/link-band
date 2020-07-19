/******************************************************************************/
/****************************** VARIABLES *************************************/
/******************************************************************************/
var nome
/******************************************************************************/
/******************************* EVENTOS **************************************/
/******************************************************************************/
// document.body.onload = () => UIkit.modal('#form-cad-event').show()

/******************************************************************************/
/******************************* FUNÇÕES **************************************/
/******************************************************************************/


function login(form,email,senha)
{
    if(findEmpty(form) === false)
    {
        url  = location.origin+'/api/login'
        data = new FormData
        data.append('email' ,email)
        data.append('senha' ,senha)
    
        fetch(url,
            { method: 'POST', body  : data })
            .then(res => res.json())
            .then(res => 
                {
                    if (res.status == 'ok')
                    {
                        showNotification('Seja bem-vindo!... Estamos atualizando','success',5000,true)
                    }
                    else
                    {
                        showNotification(res.message,'warning',5000)
                    }
                })
            .catch(err => console.log(err))
    }
}

function listUsers(form)
{
    if(findEmpty(form) === false)
    {
        url  = location.origin+'/api/users'
    
        fetch(url)
            .then(res => res.json())
            .then(res => 
                {
                    if (res.status == 'ok')
                    {
                        console.log(res)
                    }
                    else
                    {
                        showNotification(res.message,'warning',5000)
                    }
                })
            .catch(err => console.log(err))
    }
}

function getUser(form,id)
{
    if(findEmpty(form) === false)
    {
        url  = location.origin+'/api/users/'+id
    
        fetch(url)
            .then(res => res.json())
            .then(res => 
                {
                    if (res.status == 'ok')
                    {
                        console.log(res)
                    }
                    else
                    {
                        showNotification(res.message,'warning',5000)
                    }
                })
            .catch(err => console.log(err))
    }
}

function deleteUser(form,id)
{
    if(findEmpty(form) === false)
    {
        url  = location.origin+'/api/users/'+id
    
        fetch(url,{method:'DELETE'})
            .then(res => res.json())
            .then(res => 
                {
                    if (res.status == 'ok')
                    {
                        showNotification('Usuário apagado com sucesso!<br>... Estamos atualizando','success',5000,true)
                    }
                    else
                    {
                        showNotification(res.message,'warning',5000)
                    }
                })
            .catch(err => console.log(err))
    }
}