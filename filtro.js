function filtrado()
{
    let Filtro = document.getElementById("Filtro").value;
    if(Filtro=='1')
    {
        document.getElementById('forma-modal').style.display='block';
    }
    if(Filtro=='2')
    {
        document.getElementById('modal-años').style.display='block';
    }
    if(Filtro=='3')
    {
        document.getElementById('modal-paga').style.display='block';
    }
}
