/******************************************************************************/
/****************************** VARIABLES *************************************/
/******************************************************************************/
var formEditEvent =document.getElementById('form-edit-event')
var id =document.getElementById('id')
var genero =document.getElementById('genero')
var titulo =document.getElementById('titulo')
var data =document.getElementById('data')
var hora =document.getElementById('hora')
var telefone =document.getElementById('telefone')
var celular =document.getElementById('celular')
var descricao =document.getElementById('descricao')
var cep =document.getElementById('cep')
var logradouro =document.getElementById('logradouro')
var numero =document.getElementById('numero')
var complemento =document.getElementById('complemento')
var bairro =document.getElementById('bairro')
var cidade =document.getElementById('cidade')
var estado =document.getElementById('estado')
var banner =document.getElementById('banner')
var oldBanner =document.getElementById('old-banner')
var btnSalvar =document.getElementById('btn-salvar')
/******************************************************************************/
/******************************* EVENTOS **************************************/
/******************************************************************************/
cep.onblur = () => findAddress(cep,logradouro,bairro,cidade,estado)
cep.oninput= () => cep.value = cep.value.replace(/^(\d{5})(\d)/g,"$1-$2").slice(0,9)
telefone.oninput= () => telefone.value = phoneMask(telefone.value)
celular.oninput= () => celular.value = phoneMask(celular.value)
btnSalvar.onclick = () => editEvent(
    formEditEvent,
    btnSalvar,
    id.value,
    genero.value,
    titulo.value,
    data.value,
    hora.value,
    telefone.value,
    celular.value,
    descricao.value,
    cep.value,
    logradouro.value,
    numero.value,
    complemento.value,
    bairro.value,
    cidade.value,
    estado.value,
    banner,
    oldBanner.value
    )

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

function editEvent(form, btn, id, genero, titulo, data, hora, telefone, celular, descricao, cep, logradouro, numero, complemento, bairro, cidade, estado, banner, oldBanner)
{
    if(findEmpty(form) === false)
    {
        url  = location.origin+'/area-restrita/eventos/update'
        dataF = new FormData
        dataF.append('id'  ,id)
        dataF.append('genero'  ,genero)
        dataF.append('titulo'  ,titulo)
        dataF.append('data'  ,data)
        dataF.append('hora'  ,hora)
        dataF.append('telefone'  ,telefone)
        dataF.append('celular'  ,celular)
        dataF.append('descricao'  ,descricao)
        dataF.append('cep'  ,cep)
        dataF.append('logradouro'  ,logradouro)
        dataF.append('numero'  ,numero)
        dataF.append('complemento'  ,complemento)
        dataF.append('bairro'  ,bairro)
        dataF.append('cidade'  ,cidade)
        dataF.append('estado'  ,estado)
        dataF.append(banner.name  ,banner.files[0])
        dataF.append('old_banner'  ,oldBanner)
    
        fetch(url,
            { method: 'POST', body  : dataF })
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
                                window.location.href = location.origin+'/area-restrita/eventos'
                    
                            },1500)
                        },1500)
                    }
                    else
                    {
                        btn.innerText = 'salvar'
                        showNotification(res.message,'warning',5000)
                    }
                })
            .catch(err => console.log(err))
    }
}