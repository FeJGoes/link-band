/******************************************************************************/
/****************************** VARIABLES *************************************/
/******************************************************************************/
var formCadEvent =document.getElementById('form-cad-event')
var genero =document.getElementById('genero')
var titulo =document.getElementById('titulo')
var data =document.getElementById('data')
var hora =document.getElementById('hora')
var telefone =document.getElementById('telefone')
var celular =document.getElementById('celular')
var descricao =document.getElementById('descricao')
var cep =document.getElementById('cep')
var logradouro =document.getElementById('logradouro')
var bairro =document.getElementById('bairro')
var cidade =document.getElementById('cidade')
var estado =document.getElementById('estado')
var btnSalvar =document.getElementById('btn-salvar')
/******************************************************************************/
/******************************* EVENTOS **************************************/
/******************************************************************************/
cep.onblur = () => findAddress(cep,logradouro,bairro,cidade,estado)
cep.oninput= () => cep.value = cep.value.replace(/^(\d{5})(\d)/g,"$1-$2").slice(0,9)
telefone.oninput= () => telefone.value = phoneMask(telefone.value)
celular.oninput= () => celular.value = phoneMask(celular.value)

/******************************************************************************/
/******************************* FUNÇÕES **************************************/
/******************************************************************************/
function findAddress(cep,logradouro,bairro,cidade,estado) 
{
    fetch('https://viacep.com.br/ws/'+cep.value+'/json/')
    .then(res => res.json())
    .then(res => 
        {
            if(res.erro!==true && res!==null)
            {
                logradouro.value =res.logradouro
                bairro.value =res.bairro
                cidade.value =res.localidade
                estado.value =res.uf
            }

        })
}