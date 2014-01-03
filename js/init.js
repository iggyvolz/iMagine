window.onload = function() {
    $('#results').scrollTop($('#results').prop('scrollHeight'));
};
var cssbackground=0;
function reload()
{
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
        $('#blazer_energy').val(data.blazer_energy);
        $('#curleaf_energy').val(data.curleaf_energy);
        $('#dragiri_energy').val(data.dragiri_energy);
        $('#feniixis_energy').val(data.feniixis_energy);
        $('#fireebee_energy').val(data.fireebee_energy);
        $('#flike_energy').val(data.flike_energy);
        $('#ghostslicer_energy').val(data.ghostslicer_energy);
        $('#hartvile_energy').val(data.hartvile_energy);
        $('#krabulous_energy').val(data.krabulous_energy);
        $('#nightwing_energy').val(data.nightwing_energy);
        $('#plantsy_energy').val(data.plantsy_energy);
        $('#pluff_energy').val(data.pluff_energy);
        $('#reebee_energy').val(data.reebee_energy);
        $('#reemon_energy').val(data.reemon_energy);
        $('#skelestorm_energy').val(data.skelestorm_energy);
        $('#strab_energy').val(data.strab_energy);
        $('#dump').html(data.dump);
        $('#errors').html(data.errors);
        if (data.dump !== "")
        {
            window.scrollTo(0, document.body.scrollHeight);
        }
    }, "json").fail(function(data) {
        $('#errors').html(data.responseText);
        $('#contents').val("");
    });
}
$(document).click(function(){
    $('#flashobject').css('display','none');
    $('#overlay').css('display','none');
})