/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function creationXHR() {
    let resultat = null;
    try{ //test pour les navigateurs : Mozilla, Opéra, ...
        resultat = new XMLHttpRequest();
    }
    catch (Erreur){
        try{ //test pour les navigateurs Internet Explorer > 5.0
            resultat = new ActiveXObject("Msxm12.XMLHTTP");
        }
        catch (Erreur){
            try{
                resultat = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (Erreur){
                resultat = null;
            }
        }
    }
    return resultat;
}
