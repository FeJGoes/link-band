/******************************************************************************/
/****************************** VARIABLES *************************************/
/******************************************************************************/
var formEdit = document.getElementById('form-edit')
var nome = document.getElementById('nome')
var email = document.getElementById('email')
var password = document.getElementById('password')
var showPass = document.getElementById('show-pass')
var btnEdit = document.getElementById('btn-edit')
var btnDelete = document.getElementById('btn-delete-account')

/******************************************************************************/
/******************************* EVENTOS **************************************/
/******************************************************************************/
showPass.onclick = () => showPassword(showPass, password)
btnDelete.onclick = () => deleteUser(btnDelete, btnDelete.dataset.id)
btnEdit.onclick = () => editUser(formEdit,btnEdit,btnEdit.dataset.id, nome.value,email.value,password.value)

/******************************************************************************/
/******************************* FUNÇÕES **************************************/
/******************************************************************************/
function showPassword(checkbox, password)
{
    if (checkbox.checked === true)
    {
        password.type = 'text'
    }
    else
    {
        password.type = 'password'
    }
}


function editUser(form, btn, id, nome, email, senha='')
{
    if (findEmpty(form) === false)
    {
        url = location.origin + '/area-restrita/usuarios/update'
        data = new FormData
        data.append('id', id)
        data.append('nome', nome)
        data.append('email', email)
        data.append('senha', senha)

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
                        console.log(res)
                        showNotification(res.message, 'success', 1000, true)

                        // setTimeout(() =>
                        // {
                        //     location.reload()

                        // }, 3000)
                    }, 1500)
                }
                else
                {
                    btn.innerText = 'criar'
                    showNotification(res.message, 'warning', 5000)
                }
            })
            .catch(err => console.log(err))
    }
}

function deleteUser(btn, id)
{
    url = location.origin + '/area-restrita/usuarios/destroy'
    data = new FormData
    data.append('id', id)

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
                    showNotification(res.message, 'success', 5000, true)
                    UIkit.modal('#modal-delete-accont').hide()

                    setTimeout(() =>
                    {
                        window.location.href = location.origin + '/area-restrita/login'

                    }, 1500)
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