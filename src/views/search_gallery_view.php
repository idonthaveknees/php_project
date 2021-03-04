<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<script>
	function findImages(name){
		if (name.length == 0) {
			document.getElementById("gallery").innerHTML = "Wpisz nazwę obrazu w powyższe pole";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("gallery").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "ajax?name=" + name, true);
			xmlhttp.send();
		}
	}
		</script>

<head>
    <meta charset="UTF-8" />
    <title>Search Gallery</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
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
                Search Gallery
                <svg width="30" height="30">
                    <circle cx="15" cy="20" r="10" fill="#657a97" transform="skewX(-10)">
                        <animate attributeName="opacity"
                                 from="1" to="0" dur="5s" repeatCount="indefinite" />
                    </circle>
                </svg>
            </h1>
        </header>
        <div id="content">
			<form>
				Nazwa: <input type="text" onkeyup="findImages(this.value)">
			</form>
			</br>
			<div>
				<span id="gallery">
					Wpisz nazwę obrazu w powyższe pole
				</span>
				
			</div>
		</div>
		<footer> Copyright 2020, Rozalia Karolczak</footer>
    </div>
</body>
</html>
?>