<!DOCTYPE html>
<HTML>
<HEAD>
<TITLE>SITE DU DEMINEUR</TITLE>
</HEAD>
<BODY style="color:white; font-family: 'Segoe UI'; font-size: 150%; text-align: center; padding: 50px, 50px, 50px, 50px;background-color: grey">
 <br>
 <h1>Projet PSR 2021 | Kevin Doolaeghe</h1>
 <br>
 <h3>Jeu du nombre aleatoire :</h3>
 <form>
 <p>Normal<input type='radio' name='radio1' checked><br></p>
 <p>Cookie<input type='radio' name='radio1'><br></p>
<p>Session<input type='radio' name='radio1'><br></p>
 <input onclick="start(radio1)" style='border: hidden; font-size:120%;' type=submit value=Jouer>
 </form>
 <script type="text/javascript">
 	
function start(choix)
{
	if(choix[0].checked) window.open('./default/index.php');
	if(choix[1].checked) window.open('./cookie/index.php');
	if(choix[2].checked) window.open('./session/index.php');
}
</script>
<br>
<br>
<a href="https://github.com/kevin-doolaeghe/se2a5_tp_reseau">Repository Github du projet PSR</a>
<br>
<br>
<img src="nyan-cat.gif" width="10%" height="10%" />
</BODY>
</HTML>	
