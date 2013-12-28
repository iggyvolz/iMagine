 window.onload=function() { document.getElementById('results').scrollTop = document.getElementById("results").scrollHeight; };
    function loadXMLDoc()
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
        //console.log(xmlhttp.responseText); //For debug purposes
        //console.log(JSON.parse(xmlhttp.responseText)); //For debug purposes
        if(xmlhttp.responseText==='help')
        {
            window.location.replace("help.php");
        }
        if(xmlhttp.responseText==='refresh')
        {
            window.location.reload();
        }
        document.getElementById('results').value=JSON.parse(xmlhttp.responseText).response;
        document.getElementById('results').scrollTop = document.getElementById("results").scrollHeight;
        document.getElementById('energy_blazer').value=JSON.parse(xmlhttp.responseText).blazer_energy;
        document.getElementById('energy_curleaf').value=JSON.parse(xmlhttp.responseText).curleaf_energy;
        document.getElementById('energy_dragiri').value=JSON.parse(xmlhttp.responseText).dragiri_energy;
        document.getElementById('energy_feniixis').value=JSON.parse(xmlhttp.responseText).feniixis_energy;
        document.getElementById('energy_fireebee').value=JSON.parse(xmlhttp.responseText).fireebee_energy;
        document.getElementById('energy_flike').value=JSON.parse(xmlhttp.responseText).flike_energy;
        document.getElementById('energy_ghostslicer').value=JSON.parse(xmlhttp.responseText).ghostslicer_energy;
        document.getElementById('energy_hartvile').value=JSON.parse(xmlhttp.responseText).hartvile_energy;
        document.getElementById('energy_krabulous').value=JSON.parse(xmlhttp.responseText).krabulous_energy;
        document.getElementById('energy_nightwing').value=JSON.parse(xmlhttp.responseText).nightwing_energy;
        document.getElementById('energy_plantsy').value=JSON.parse(xmlhttp.responseText).plantsy_energy;
        document.getElementById('energy_pluff').value=JSON.parse(xmlhttp.responseText).pluff_energy;
        document.getElementById('energy_reebee').value=JSON.parse(xmlhttp.responseText).reebee_energy;
        document.getElementById('energy_reemon').value=JSON.parse(xmlhttp.responseText).reemon_energy;
        document.getElementById('energy_skelestorm').value=JSON.parse(xmlhttp.responseText).skelestorm_energy;
        document.getElementById('energy_strab').value=JSON.parse(xmlhttp.responseText).strab_energy;
        document.getElementById('dump').innerHTML=JSON.parse(xmlhttp.responseText).dump;
        document.getElementById('errors').innerHTML=JSON.parse(xmlhttp.responseText).errors;
        if(JSON.parse(xmlhttp.responseText).dump!=='')
        {
            window.scrollTo(0,document.body.scrollHeight);
        }
    }
  }
xmlhttp.open("POST","api.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("contents="+document.getElementById('contents').value);
document.getElementById('contents').value='';
}