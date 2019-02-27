function modified_name(){
	let flag = true;

	$("#modif_name").click( function(){
		if(flag== true){
			$(".box").append("<div class='choose_name'>Votre nouveau prenom : <form method='GET' action='Base/name.php'> <input type='text' name='name_modified'><input type='submit'></form></div>");
			flag = false;
		}
		else{
			$('.choose_name').remove();
			flag = true;
		}
	});
}

function modified_lastname(){
	let flag = true;

	$("#modif_lastname").click( function(){
		if(flag== true){
			$(".box").append("<div class='choose_lastname'>Votre nouveau nom : <form method='GET' action='Base/lastname.php'> <input type='text' name='firstname_modified'><input type='submit'> </form></div>");
			flag = false;
		}
		else{
			$('.choose_lastname').remove();
			flag = true;
		}
	});
}

function modified_pseudo(){
	let flag = true;

	$("#modif_pseudo").click( function(){
		if(flag== true){
			$(".box").append("<div class='choose_pseudo'>Votre nouveau pseudo : <form method='GET' action='Base/pseudo.php' > <input type='input' name='pseudo_modified'><input type='submit'> </form></div>");
			flag = false;
		}
		else{
			$('.choose_pseudo').remove();
			flag = true;
		}
	});
}

function modified_birth(){
	let flag = true;

	$("#modif_birth").click( function(){
		if(flag== true){
			$(".box").append("<div class='choose_birth'>Votre nouvelle date de naissance : <form method='GET' action='Base/birth.php'> <input type='date' name='birth_modified'><input type='submit'> </form></div>");
			flag = false;
		}
		else{
			$('.choose_birth').remove();
			flag = true;
		}
	});
}

function modified_email(){
	let flag = true;

	$("#modif_mail").click( function(){
		if(flag== true){
			$(".box").append("<div class='choose_email'>Votre nouveau email: <form method='GET' action='Base/mail.php'> <input id='error_mail' type='email' name='email_modified'><input type='submit'> </form></div>");
			flag = false;
		}
		else{
			$('.choose_email').remove();
			flag = true;
		}
	});
}

function modified_pass(){
	let flag = true;

	$('#modif_pass').click( function(){
		if(flag == true){
			$(".box").append("<div class='choose_pass'>Votre nouveau mot de passe: <form method='GET' action='Base/pass.php'> <input type='password' name='pass_modified'><input type='submit'> </form></div>");
			flag = false;
		}
		else{
			$('.choose_pass').remove();
			flag = true;
		}
	});
}

modified_name();
modified_lastname();
modified_pseudo();
modified_birth();
modified_email();
modified_pass();
