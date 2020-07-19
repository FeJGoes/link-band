/******************************************************************************/
/****************************** VARIABLES *************************************/
/******************************************************************************/
var formCreate =document.getElementById('form-create')
var nome       =document.getElementById('nome')
var email      =document.getElementById('email')
var password   =document.getElementById('password')
var retypePass =document.getElementById('retype-pass')
var showPass   =document.getElementById('show-pass')
var btnCreate  =document.getElementById('btn-create')

/******************************************************************************/
/******************************* EVENTOS **************************************/
/******************************************************************************/
showPass.onclick = () => showPassword(showPass, password, retypePass)
btnCreate.onclick = () => createUser(formCreate,btnCreate,nome.value,email.value,password.value,retypePass.value)

/******************************************************************************/
/******************************* FUNÇÕES **************************************/
/******************************************************************************/
function showPassword(checkbox, password, retype) 
{
    if(checkbox.checked===true)
    {
        password.type ='text'
        retype.type   ='text'
    }
    else
    {
        password.type ='password'
        retype.type   ='password'
    }
}


function createUser(form, btn, nome, email, senha, confirmacaoSenha)
{
    if (senha === confirmacaoSenha) {
        if(findEmpty(form) === false)
        {
            url  = location.origin+'/api/users'
            data = new FormData
            data.append('nome'  ,nome)
            data.append('email' ,email)
            data.append('senha' ,senha)
            data.append('tipo' ,'BANDA')
            data.append('permissao' ,'[1,2,3]')
        
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
                                showNotification(res.message,'success',5000,true)
                        
                                setTimeout(()=>{
                                    window.location.href = location.origin+'/area-restrita/login'
                        
                                },1500)
                            },1500)
                        }
                        else
                        {
                            btn.innerText = 'criar'
                            showNotification(res.message,'warning',5000)
                        }
                    })
                .catch(err => console.log(err))
        }
    }
    else
    {
        showNotification('Senhas digitadas são diferentes','warning',5000)
    }
}