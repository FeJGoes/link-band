/******************************************************************************/
/****************************** VARIABLES *************************************/
/******************************************************************************/
var password   =document.getElementById('password')
var retypePass =document.getElementById('retype-pass')
var showPass   =document.getElementById('show-pass')

/******************************************************************************/
/******************************* EVENTOS **************************************/
/******************************************************************************/
showPass.onclick = () => showPassword(showPass, password, retypePass)

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