/******************************************************************************/
/****************************** VARIABLES *************************************/
/******************************************************************************/
var formLogin = document.getElementById('form-login')
var email    = document.getElementById('email')
var password = document.getElementById('password')
var btnLogin = document.getElementById('btn-login')
var formEsqueciSenha = document.getElementById('form-esqueci-senha')
var emailEsqueci = document.getElementById('email-esqueci')
var btnEsqueciSenha = document.getElementById('btn-esqueci-senha')
/******************************************************************************/
/******************************* EVENTOS **************************************/
/******************************************************************************/

btnEsqueciSenha.onclick = () => forgot(formEsqueciSenha, btnEsqueciSenha, emailEsqueci.value)
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

function forgot(form, btn, email)
{
    if(findEmpty(form) === false)
    {
        url  = location.origin+'/area-restrita/usuarios/recovery-pass?email='+email
    
        fetch(url)
            .then(res => res.json())
            .then(res => 
                {
                    btn.innerText = 'Aguarde...'
                    if (res.status == 'ok')
                    {
                        setTimeout(()=>{
                            btn.innerText = 'OK'
                            showNotification(res.message,'success',5000)
                    
                            setTimeout(()=>{
                                location.reload()
                    
                            },4000)
                        },1500)
                    }
                    else
                    {
                        btn.innerText = 'enviar'
                        showNotification(res.message,'warning',5000)
                    }
                })
            .catch(err => console.log(err))
    }
}