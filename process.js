const MsgSucsess = (msg) =>
{
    return `<div class="alert alert-success">${msg}</div>`;
}
const formFiles = document.getElementById("formFiles");
const xfiles = document.getElementById('files');
const MsgAjax = document.getElementById('MsgAjax');
let Pendientes;
formFiles.addEventListener("submit",(event)=>{
    event.preventDefault();
    MsgAjax.innerHTML=MsgSucsess('Cargando archivos, por favor espere..');
    let data = new FormData(formFiles);
    let xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function() {
      if(this.readyState === 4) 
      {
        //console.log(this.responseText);
        //var Result=JSON.parse(this.responseText);
        xfiles.innerHTML=this.responseText;
        MsgAjax.innerHTML="";
        Pendientes = document.querySelectorAll(".Pendientes");
        procesarCorreos(Pendientes,0)
      }
    });
    xhr.open("POST", "uploadfiles.php");
    xhr.send(data);    
})
const procesarCorreos=(Pendientes,index)=>
{ 
    //console.log(Pendientes[index].id);
    let xId = Pendientes[index].id;
    let xIdEstatus = Pendientes[index].id+"_estatus";
    //console.log(xId);
    MsgAjax.innerHTML=MsgSucsess(`Procesando ${xId}, por favor espere..`);
    
    let xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.addEventListener("readystatechange", function() {
      if(this.readyState === 4) 
      {
        document.getElementById(xIdEstatus).value=this.responseText;
        if(this.responseText=='PROCESADO')
        {
            document.getElementById(xId).classList.add("text-success");
            document.getElementById(xIdEstatus).classList.add("text-success");
        }
        //console.log("Pendientes.length",Pendientes.length);
        //console.log("index+1",index+1);
        if(Pendientes.length-1>index)
        {
            procesarCorreos(Pendientes,index+1);
        }
        else
        {
            MsgAjax.innerHTML=MsgSucsess(`PROCESO COMPLETADO`);
        }
        
      }
    });
    xhr.open("GET", "procesar.php?file="+Pendientes[index].id);
    xhr.send();        
}

