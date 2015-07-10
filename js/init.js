window.onload = function() {
    $('#results').scrollTop($('#results').prop('scrollHeight'));
    if (localStorage&&localStorage.getItem("iMagineUID"))
    {
      uid = Number(localStorage.getItem("iMagineUID"));
    }
    else
    {
      uid = Math.floor(Math.random() * 100000);
      localStorage.setItem("iMagineUID",uid);
    }
    if (localStorage&&localStorage.getItem("iMagineResults"))
    {
      $('#results').val(localStorage.getItem("iMagineResults"));
    }
};

function reload() {
    $('#results').val($('#results').val()+"\n>"+$('#contents').val());
    var conts=$('#contents').val();
    $('#contents').val("");
    var handled=false;
    if (conts === "help") {
        window.location.replace("help.html");
        handled=true;
    }
    if (conts === "reset") {
        localStorage.removeItem("iMagineUID");
        localStorage.removeItem("iMagineResults");
        window.location.reload();
        handled=true;
    }
    if (localStorage)
    {
      localStorage.setItem("iMagineResults",$('#results').val());
    }
    if(!handled)
    {
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
          if (localStorage)
          {
            localStorage.setItem("iMagineResults",$('#results').val());
          }
      }, "json").fail(function(data) {
          console.log(data);
          $('#errors').html(data.responseText);
          $('#contents').val("");
      });
    }
}
