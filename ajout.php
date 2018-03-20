<?php
include_once 'inc/menu.php';
include 'inc/connexion_bd.inc.php';

session_start();

$id         =isset($_SESSION['id']) ? $_SESSION['id'] : '';
$nom        =isset($_SESSION['nom']) ? $_SESSION['nom'] : '';
$prenom     =isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';
$datetrajet = isset($_POST['datetrajet']) ? $_POST['datetrajet'] : '';
$motif      = isset($_POST['motif']) ? $_POST['motif'] : '';
$trajet     = isset($_POST['trajet']) ? $_POST['trajet'] : '';
$km         = isset($_POST['km']) ? $_POST['km'] : '';
$ct         = isset($_POST['ct']) ? $_POST['ct'] : ''; //ct : Coût trajet
$cp         = isset($_POST['cp']) ? $_POST['cp'] : ''; //cp : Coût péage
$cr         = isset($_POST['cr']) ? $_POST['cr'] : ''; //cr : Coût repas
$ch         = isset($_POST['ch']) ? $_POST['ch'] : ''; //ch : Coût hébergement
$submit     = isset($_POST['submit']) ? $_POST['submit'] : '';

  
?>

<!DOCTYPE html>
<html>
  <header class="masthead">
    <div class="header-content">
      <div class="header-content-inner">
      <h1 id="homeHeading">Ajout Ligne de Frais </h1>
      <hr>
  
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <center>
          
              <u>Date trajet</u> <br /><input type="date" required name="datetrajet"  /> <br />
            
              <u>Motif</u>  <br /><select name="motif">
        
                <option value="1" selected>Tournoi</option>
                <option value="2" >Match</option>
                <option value="3" >Entrainement</option>
        
              </select> <br />
          
             <u>Trajet</u> <br /><input type="text" required name="trajet" placeholder="Exemple :Toulouse-Pamiers"  /><br />

             <u>Km Parcourus</u> <br /><input type="number" required name="km"/><br />

             <u>Coût trajet</u> <br /><input type="number" required name="ct"  /><br />
            
             <u>Coût péage</u> <br /><input type="number" required name="cp"/><br />
            
             <u>Coût repas</u> <br /><input type="number" required name="cr"/><br />
            
             <u>Coût hébergement</u> <br /><input type="number" required name="ch"/><br />

            <input type="submit" name="submit" value="Ajouter"><br />
           
            <input type="reset" value="Annuler"><br />
        
        </center>
        

<?php
        
  if($submit){
    
    $curYear = date('Y');  //Format de la date ( Y: Année sur 4 chiffres) 
        
    $req = $con->prepare('
      INSERT INTO lignefrais(datetrajet_lf, id_motif, trajet_lf, km_lf, couttrajet_lf, coutpeage_lf, coutrepas_lf, couthebergement_lf, id_demandeur, annees) 
      VALUE (:datetrajet, :motif, :trajet , :km, :ct, :cp, :cr, :ch, :id, :annees )');
        
    $req->execute(array(
      ':datetrajet'            => $datetrajet,
      ':motif'                 => $motif,
      ':trajet'                => $trajet,
      ':km'                    => $km,
      ':ct'                    => $ct,
      ':cp'                    => $cp,
      ':cr'                    => $cr,
      ':ch'                    => $ch,
       ':id'                   => $id,
      ':annees'                => $curYear
          
    ));
        
      header('Location: ajout.php');
  }
        
?>
        
        </form>  
      </div>
    </div>
  </header>
</html>
 