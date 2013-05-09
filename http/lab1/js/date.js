function jour(){
    for (var i = 1; i <= 30; i++) {
            document.write("<option value='"+i+"'>"+i+"</option>");
            // document.write ne se fait qu'à l'initialisation de la page
    }
}

function mois(){
    for (var i = 1; i <= 12; i++) {
            document.write("<option value='"+i+"'>"+i+"</option>");
            // document.write ne se fait qu'à l'initialisation de la page
    }
}

function annees(){
    for (var i = 1901; i < 2013; i++) {
            document.write("<option value='"+i+"'>"+i+"</option>");
            // document.write ne se fait qu'à l'initialisation de la page
    }
}