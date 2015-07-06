window.onload = function() {
    $('#results').scrollTop($('#results').prop('scrollHeight'));
};
function reload()
{
    cssbackground=0;
    $.post('api.php', "contents=" + $('#contents').val(), function(data) {
        if (data === 'help')
        {
            window.location.replace("help.php");
        }
        if(data.cutscene)
        {
            $('#overlay').css('display','inline');
            interval=setInterval(function() {
            $('#overlay').css('backgroundColor','rgba(' + ['0','0','0',(cssbackground/500).toString()].join(',') + ')');
            cssbackground++;
            if(cssbackground>500)
            {
                clearInterval(interval);
            }
        },1);
            $('#flashobject').css('display','inline');
            var obj = $("object#flash");
            var orig = obj.html();
            obj.html(orig);
        }
        else
        {
            $('#flashobject').css('display','none');
            $('#overlay').css('display','none');
        }
        $('#contents').val("");
        $('#results').val(data.response);
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
$(document).click(function(){
    $('#flashobject').css('display','none');
    $('#overlay').css('display','none');
})
function iMagine(command)
{
    $('#contents').val(command);
    reload();
}
