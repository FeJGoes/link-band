/******************************************************************************/
/****************************** VARIABLES *************************************/
/******************************************************************************/
var formLogin = document.getElementById('form-login')
var email    = document.getElementById('email')
var password = document.getElementById('password')
var btnLogin = document.getElementById('btn-login')
/******************************************************************************/
/******************************* EVENTOS **************************************/
/******************************************************************************/

btnLogin.onclick = () => login(formLogin, btnLogin, email.value, password.value)

/******************************************************************************/
/******************************* FUNÇÕES **************************************/
/******************************************************************************/

function login(form, btn, email, senha)
{
    if(findEmpty(form) === false)
    {
        url  = location.origin+'/area-restrita/handshake'
        data = new FormData
        data.append('email' ,email)
        data.append('senha' ,senha)
    
        fetch(url,
            { method: 'POST', body  : data })
            .then(res => res.json())
            .then(res => 
                {
                    btn.innerText = 'Aguarde...'
                    if (res.status == 'ok')
                    {
                        setTimeout(()=>{
                            btn.innerText = 'OK'
                            showNotification('Seja bem-vindo!... Estamos atualizando','success',5000)
                    
                            setTimeout(()=>{
                                window.location.href = location.origin+'/area-restrita/home'
                    
                            },1000)
                        },1500)
                    }
                    else
                    {
                        btn.innerText = 'entrar'
                        showNotification(res.message,'warning',5000)
                    }
                })
            .catch(err => console.log(err))
    }
}