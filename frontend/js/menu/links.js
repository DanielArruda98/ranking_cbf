const titulo_original = "Ranking CBF";

function redirect(event, page, title = titulo_original) {
    
    if(event != null) 
        event.preventDefault();

    document.title = title;
    $("#window-view").load("frontend/pages/"+page);
}

function startPagina(event = null) {
    redirect(event, "home.html");
}

////////////////////////////////////////////////////////////////////////////////////////
startPagina();

$('.link_home').click(function(event) {
    startPagina(event);
});

$('.link_equipes').click(function(event) {
    redirect(event, "equipes/read.html");
});

$('.link_equipes_create').click(function(event) {
    redirect(event, "equipes/create.html");
});

$('.link_temporadas').click(function(event) {
    redirect(event, "temporadas/read.html");
});

$('.link_temporadas_create').click(function(event) {
    redirect(event, "temporadas/create.html");
});

$('.link_ranking').click(function(event) {
    redirect(event, "ranking.html");
});