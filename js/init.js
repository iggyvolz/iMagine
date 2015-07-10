window.onload = function() {
    $('#results').scrollTop($('#results').prop('scrollHeight'));
    uid = Math.floor(Math.random() * 100000);
};

function reload() {
    if ($('#contents').val() === "help") {
        window.location.replace("help.html");
    }
    $('#results').val($('#results').val()+"\n>"+$('#contents').val());
    $('#contents').val("");
    $.get('http://i.magine.tk/head.php', "command=" + $('#contents').val() + "&uid=" + uid, function(data) {
        $('#results').val($('#results').val()+"\n"+data.response);
        $('#results').scrollTop($('#results').prop("scrollHeight"));
        $('#tony_energy').val(data.tony_energy);
        $('#edyn_energy').val(data.edyn_energy);
        $('#strag_energy').val(data.strag_energy);
        $('#tony_energy_disp').html(data.tony_energy);
        $('#edyn_energy_disp').html(data.edyn_energy);
        $('#strag_energy_disp').html(data.strag_energy);
        console.log(data.dump);
        $('#errors').html(data.errors);
    }, "json").fail(function(data) {
        console.log(data);
        $('#errors').html(data.responseText);
        $('#contents').val("");
    });
}
