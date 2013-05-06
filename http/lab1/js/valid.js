
function validate(){
    console.log("Validation : ");
    var valide = true;
    var nom = document.getElementById("nom");
    var prenom = document.getElementById("prenom");
    var courriel = document.getElementById("courriel");
    var mdp = document.getElementById("mdp");
    
    var pattern = /^[a-zA-Z]{2,20}$/;
    var pattern2 = /^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,}$/;
    var pattern3 = /^[a-zA-Z]{6,}$/;
    
    if (nom.value.match(pattern) == null){
        valide=false;
        console.log("Erreur dans le nom");
    }
    else{
        console.log("Nom valide");
    }
    
    if (prenom.value.match(pattern) == null){
        valide=false;
        console.log("Erreur dans le prenom");
    }
    else{
        console.log("Prenom valide");
    }
    
    if (courriel.value.match(pattern2) == null){
        valide=false;
        console.log("Erreur dans le courriel");
    }
    else{
        console.log("Courriel valide");
    }
    
    if (mdp.value.match(pattern3) == null){
        valide=false;
        console.log("Erreur dans le courriel");
    }
    else{
        console.log("Courriel valide");
    }
    
    return valide;
}