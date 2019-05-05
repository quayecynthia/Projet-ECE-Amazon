<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
 
<script language="JavaScript">
 
function affiche_entreprise() {
if (document.votre_activite.activite.selectedIndex == 2)
document.getElementById('form_entreprise').style.visibility = 'visible';
else
document.getElementById('form_entreprise').style.visibility = 'hidden';
}
</script>
 
</head>
 
<body>
 
<form name="votre_activite" action="" method="post">
 
<label><strong>Votre activité :</strong></label> <select name="activite" OnChange="affiche_entreprise();">
 
  <option value="particulier">Particulier</option>
  <option value="association">Association</option>
  <option value="entreprise">Entreprise</option>
                                                 </select>
    <br/>
</form>   
 
<span id="form_entreprise" style="visibility:hidden">
 
     <form method="post" action="">
 
      <label><strong>Nom :</strong></label> <input type="text" name="nom_entreprise"/><br/>
 
      <label><strong>Adresse :</strong></label> <input type="text" name="adresse_entreprise"/><br/>
 
     <label><strong>Code Postal :</strong></label> <input type="text" name="code_entreprise"/><br/>
 
     <label><strong>Ville :</strong></label> <input type="text" name="ville_entreprise"/><br/>
 
     <label><strong>Secteur d'activité :</strong></label> <input type="text" name="activite_entreprise"/><br/>
 
     <label><strong>Type de société :</strong></label> <select name="type_entreprise">
 
        <option value="pme">P.M.E</option>
        <option value="sa">S.A</option>
        <option name="sarl">S.A.R.L</option>
     </select>
 
</form></span>
 
</select>
</form>
</body>
</html>