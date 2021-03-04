<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Contact</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css" />
	<script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
			$( "#datepicker" ).datepicker();
		} );
	</script>
</head>
<body>
    <div id="wrapper">
        <nav>
            <ul>
                <li class="linkmenu"><a href="/">Main Page</a></li>
				<li class="linkmenu"><a href="saved_gallery">Saved Gallery</a></li>
				<li class="linkmenu"><a href="search_gallery">Search Gallery</a></li>
                <li class="linkmenu dropdownMenu">
                    <a href="hackathons.php">Hackathons</a>
                    <ul class="dropdownMenuContent">
                        <li><a href="hackathons.php#onehour">One Hour Game Jam</a></li>
                        <li><a href="hackathons.php#stupidhacktahon">Stupid Hacktahon</a></li>
                        <li><a href="hackathons.php#global">GlobalGameJam 2018</a></li>
                    </ul>
                </li>
                <li class="linkmenu"><a href="studentgroup">.NET Group</a></li>
                <li class="linkmenu"><a href="contact">Contact</a></li>
            </ul>
        </nav>
        <header>
            <h1>
                <svg width="30" height="30">
                    <circle cx="15" cy="20" r="10" fill="#657a97" transform="skewX(10)">
                        <animate attributeName="opacity"
                                 from="1" to="0" dur="5s" repeatCount="indefinite" />
                    </circle>
                </svg>
                Contact
                <svg width="30" height="30">
                    <circle cx="15" cy="20" r="10" fill="#657a97" transform="skewX(-10)">
                        <animate attributeName="opacity"
                                 from="1" to="0" dur="5s" repeatCount="indefinite" />
                    </circle>
                </svg>
            </h1>
        </header>
        <div id="content">
			<?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false): ?>
				<div>
					<h2>Register</h2>
					<form action="register" method="post">
						E-mail address: <br />
						<input type="text" name="address" required/><br />
						Login:<br />
						<input type="text" name="login" required/><br />
						Password:<br />
						<input type="password" name="password1" required/><br />
						Repeat password:<br />
						<input type="password" name="password2" required/><br /><br />
						<input type="submit" name="register" value="Register" />
					</form>
					<h2>Log in</h2>
					<form action="login" method="post">
						Login:<br />
						<input type="text" name="login" required/><br />
						Password:<br />
						<input type="password" name="password" required/><br />
						<input type="submit" name="log_in" value="Log in" />
					</form>
				</div>
			<?php else: ?>
				<div>
					<h2>Log out</h2>
					<form action="logout" method="post">
						<input type="submit" name="log_out" value="Log out" />
					</form>
				</div>
			<?php endif; ?>
			<br /><br /><br /><br />
            <div id="contact">
                Rozalia Karolczak<br />
                I term, Biomedical engineering, ETI faculty, GUT<br />
                E-mail address: <a href="mailto:rozalia.karolczak@gmail.com">rozalia.karolczak@gmail.com</a>
            </div>
            <section>
                <h3>Or fill out the form below.</h3>
                <form action="mailto:rozalia.karolczak@gmail.com">
                    First name:
                    <input type="text" name="firstname" class="form" /><br />
                    Last name:
                    <input type="text" name="lastname" class="form" /><br />
                    <input type="radio" name="gender" value="male" checked class="form" />Male
                    <input type="radio" name="gender" value="female" class="form" />Female
                    <input type="radio" name="gender" value="other" class="form" />Other/Prefer not to tell<br />
					Select your birth day:
					<input type="text" id="datepicker"><br>
                    How would you rate my page?
                    <input type="radio" name="rating" value="1" />1
                    <input type="radio" name="rating" value="2" />2
                    <input type="radio" name="rating" value="3" />3
                    <input type="radio" name="rating" value="4" />4
                    <input type="radio" name="rating" value="5" class="form" />5<br/>
                    Which page did you like most? (choose up to 2)
                    <input type="checkbox" name="page" value="main" />1
                    <input type="checkbox" name="page" value="hackathons" />2
                    <input type="checkbox" name="page" value="group" />3
                    <input type="checkbox" name="page" value="contact" class="form" />4<br/>
					How much would you like me to make another one?<br/>
					<input type="range" name="another" value="100" max="100" min="0"><br/>
                    <br />Leave your e-mail if you'd like to be notified of any major changes!<br />
                    <input type="email" name="email" class="form" />
                    <br /><input type="submit" name="send" value="Send the form" />
                    <input type="reset" value="Reset" />
                </form>
            </section>
        </div>
    </div>
</body>
</html>