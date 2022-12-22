<!doctype html>

<html lang="fr">

<head>
	<meta charset="utf-8">

	<title>Hash password </title>
	<meta name="description" content="Hash password">
	<meta name="author" content="Marius KOUASSI">

</head>

<body>
	<h1>Mot de passe avec un Hash</h1>
	<form action="" method="post">
		<fieldset>
			<label id="password">Mot de passe :</label>
			<input type="text" name="password" placeholder="mot de passe à hasher">
			<input type="submit" name="valide" value="Hasher">
		</fieldset>

	</form>
	<!-- On fait le hasahge avec BCRYPT par défaut dans la fonction password_hash de php -->
	<!-- Il y' a un bug à corriger, le formulaire peut evoyer du vide lorsque utilisateur ne rentre rien ce n'est pas acceptable-->

	<?php
	if (isset($_POST['valide'])) : ?>
		<p>
			Vous avez rentré : <span id="origin_mot"><?php echo $_POST['password']; ?></span>
		</p>
		<p>
			Le mot après hasahage est :
			<span id="hash_mot"><?php echo password_hash($_POST['password'], PASSWORD_DEFAULT); ?></span> <button id="copy">Copiez !</button>

		</p>
	<?php endif; ?>

	<script>
		function copy() {
			var textToCopy = document.getElementById("hash_mot").innerHTML;
			navigator.clipboard.writeText(textToCopy)
				.then(() => {
					alert(`Texte copié !`)
				})
				.catch((error) => {
					alert(`Échec de la copie! ${error}`)
				})
		}
		document.querySelector("#copy").addEventListener("click", copy);
	</script>
</body>

</html>