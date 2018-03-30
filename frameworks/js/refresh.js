var timer;

function timeouttimer() {
    timer = setTimeout(function(){
        if(window.location.hash == "#adupdate" || window.location.hash == "#home" || window.location.hash == "")
            {
                location.reload(true);
            }
        else
            {
                if(confirm("Session expired. Click Cancel to continue session"))
                    {
                        location.reload(true);
                    }
                else
                    {
                        resettimeoutimer();
                    }
            }
    }, 600000);
}

function resettimeoutimer() {
    clearTimeout(timer);
    
    timeouttimer();
}