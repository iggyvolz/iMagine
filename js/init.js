window.onload = function() {
    $('#results').scrollTop($('#results').prop('scrollHeight'));
    if (localStorage&&localStorage.iMagineUID)
    {
      uid = Number(localStorage.iMagineUID);
    }
    else
    {
      uid = Math.floor(Math.random() * 100000);
      localStorage.iMagineUID=uid;
    }
    if (localStorage&&localStorage.iMagineResults)
    {
      $('#results').val(localStorage.iMagineResults);
    }
};

function reload() {
    $('#results').val($('#results').val()+"\n>"+$('#contents').val());
    var conts=$('#contents').val();
    $('#contents').val("");
    if (conts === "help") {
        window.location.replace("help.html");
    }
    if (localStorage)
    {
      localStorage.iMagineResults=$('#results').val();
    }
    $.get('http://i.magine.tk/head.php', "command=" + conts + "&uid=" + uid, function(data) {
        $('#results').val($('#results').val()+"\n"+data.response);
        $('#results').scrollTop($('#results').prop("scrollHeight"));
        $('#tony_energy').val(data.tony_energy);
        $('#edyn_energy').val(data.edyn_energy);
        $('#strag_energy').val(data.strag_energy);
        $('#tony_energy_disp').html(data.tony_energy);
        $('#edyn_energy_disp').html(data.edyn_energy);
        $('#strag_energy_disp').html(data.strag_energy);
        console.log(data);
        $('#errors').html(data.errors);
    }, "json").fail(function(data) {
        console.log(data);
        $('#errors').html(data.responseText);
        $('#contents').val("");
    });
    if (localStorage)
    {
      localStorage.iMagineResults=$('#results').val();
    }
}
