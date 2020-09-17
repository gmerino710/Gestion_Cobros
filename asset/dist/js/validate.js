


const $passw =document.querySelector('#Contraseña');

const $rpassw = document.querySelector('#Contraseña1');

const $msg = document.querySelector('#msg');


const $msgrr = document.querySelector('#msg_err');

const correcto = 'La contraseña debe tener almenos 8 caracteres'

const desigual = 'Los cambos  no son iguales'
var textContent = '';

const $buscar = document.querySelector('#buscar');

const $tabla = document.querySelector('#tb_clientes');

const $input_busqueda_select = document.querySelector('#busqueda');

const $input_busqueda = document.querySelector('#input_busqueda');

//onkeyup="charcountupdate(this.value)s

function charcountupdate(str) {
    var lng = str.length;

        if (lng <8 || lng>0 ) {

            $passw.style.setProperty('border-color', 'red');
            $msg.style.setProperty('color', 'red');
            $msg.textContent = correcto;
        }
       
       if(lng >=8) {
            $passw.style.setProperty('border-color', 'green');
            $msg.textContent = '';
        }
    
        if(lng ==0) {
            $passw.style.setProperty('border-color', '#4F4F4F');
            $msg.textContent = '';
        }
        
}
// funcion para los parametros de bus queda
/*
var url2 =`http://localhost/app/criterios/cliente/`
/*
$input_busqueda_select.addEventListener("change",(e)=>{

    let $criterios = $input_busqueda_select.options[$input_busqueda_select.selectedIndex].value;

    
   // var objeto ={'data':url2 +=`${$criterios}`};    
    
        console.log($criterios);

        console.log(url2+$criterios);
        
});
*/

//console.log('afuer '+url2+$criterios);

$buscar.addEventListener('click',(e)=>{
//$tabla.innerHTML = '';
//criterio
const spinner = document.getElementById("spinner");
let html = '';
let criterio = $input_busqueda_select.value;
let busqueda = $input_busqueda.value;
let url2 =`http://localhost/app/criterios/cliente/${criterio}/${busqueda}`
console.log(url2);
alert(url2);
const $hilera = document.createElement("tr");
spinner.removeAttribute('hidden');
fetch(url2)
        .then(response=>{
           // console.log(response.url)
            return response.json();
        }).then(data =>{
            var html = "";
                console.log(typeof(data));

        
            if (data.status) {
                alertify
                .alert("Error",data.status, function(){
                    alertify.error('OK');
                });
                busqueda = $input_busqueda.value ='';
                $tabla.innerHTML = "";

                spinner.setAttribute('hidden', '');
            }
            else{
                // console.log(data)
                spinner.setAttribute('hidden', '');
                $tabla.innerHTML = "";
                data.forEach(element => {
                    html = `<tr>
                    <td>${element.Cod_cliente}</td>
                    <td>${element.Dui}</td>
                    <td>${element.Nombre_cliente}</td>
                    <td>${element.Cartera}</td>
                    </tr>`
                    $tabla.innerHTML +=html;
                }
               
            )
            busqueda = $input_busqueda.value ='';
            }
               
               
            
            
        }).catch(err=>{

            console.log(err)
        })

        })

