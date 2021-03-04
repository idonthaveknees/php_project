<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" />
    <title>My hobby</title>
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
                My hobby
                <svg width="30" height="30">
                    <circle cx="15" cy="20" r="10" fill="#657a97" transform="skewX(-10)">
                        <animate attributeName="opacity"
                                 from="1" to="0" dur="5s" repeatCount="indefinite" />
                    </circle>
                </svg>
            </h1>
        </header>
        <div id="content">
            <section>
                <h2 id="start">How it all started</h2>
                <p>I was in 11th grade when, during our physics class, two guys from Gdansk University of Technology came to present their programming study group (more about it in the ".NET group" sub-page). Lively people who most definitely had the kind of personalities that just make you want to do whatever they talked about. They went on and on about all the skills they gained because they joined the club - both programming abilities and soft skills. It was like something out of a book for YA, so how could I just miss what sounded like such a great opportunity?</p>
                <p>So I went to see for myself what exactly was up. And let me tell you - I haven't regretted it even for a second. I had to start learing c# from the beginning, because my programming knowledge contained of playing around with html and css in middle school and the basics of c++. But boy oh boy, the guys and gals at the club were not only really knowledgable, but also helpful in every way possible. That's why I hope anyone who wants to learn a new skill finds a group that will help them just the same. If you're afraid you're not suited for something - for example, like in my case, you're scared that programming would be too difficult for you and you only try hiding the problem under a rug and procratinating your way through, find yourself a study buddy and just start learing. You waste so much time not doing the thing, that you can only gain going out there and standing up to your fear.</p>
            </section>
            <section>   
                <h3 id="basics">Basics of C#</h3>
                <p>On my first visit in .NET Group, I didn't even have a clue how to write out the typical "Hello World", so before I could go through to learning about inheritance, exception handling or multithreading, I had to learn the simplest "Console.WriteLine()". And I did. A few first months consisted of me learning how to declare arrays, collections and so on. Later on, I was ready to teach others on laboratiories exactly the same things.</p>
            </section>
            <section>
                <h3>Unity</h3>
                <p>I think everyone who's ever started learning programming "seriously" had their game-making phase. And I was no different. Because I enjoy games like Detroid: Become Human, Pokemon, or Dark Souls, I thought to myself that I also wanted to make an impact on the game-developing part of society and make my own pearl that will be played by millions. I wished to be like Toby Fox - make something incredibly creative, quirky and uncomparable to any other production, and be praised for it on every step. Of course, back then I never once thought about how much said Toby worked on the game - how much time, effort, sweat and tears went into Undertale. So I took advantage of my motivation and started playing around in Unity. I. Was. Astonished. It was a ready-made game engine, yet it had so many options. Needed so many scripts. Had so much logic laying underneath the surface, so much to understand, so much to learn. I was a bit disheartened, but it did not crush me. And soon after learning the basics, I took part in my first game jam. <a href="hackathons.html">One Hour Game Jam.</a></p>
            </section>
            <section>
                <h3 id="wpf">WPF</h3>
                <p>On "C# Academy", in order to get a Microsoft's certificate of completion, every person had to create a project. Because back then I was preparing to the matura exams, I chose to make to in WPF, as compared to other ideas that was the least time-consuming. Windows Presentation Foundation used for making window applications for desktop seemed fairly friendly and easy to learn. I must say, I was not disappointed. Not only have I learned the basics of creating simple desktop apps, but also I've done it easily and in not much time.</p>
            </section>
            <section id="xamarin">
                <h3>Xamarin and ASP.NET</h3>
				<script>
					var paragraph = document.createElement("p");
					var node = document.createTextNode("I have over a hundred pages of a book on Xamarin - it's a real beast, that one - but not even a minute of free time or an ounce of energy to keep reading it. However, one of my goals for the next year is to not only have read the book, but also to create at least a prototype of my own mobile app. For now though, I find myself two hours once a week to study ASP.NET with .NET group. Considering how about 80% of the C# job descriptions I've seen mention just that, I think for now it's a good direction to go in. So again I'm finding myself in the group, listening and not understanding nearly anything. It fills me with determination. I hope learning ASP will all go well.");
					paragraph.appendChild(node);
					var element = document.getElementById("xamarin");
					element.appendChild(paragraph);
				</script>
            </section>
			<section>
				<form action="upload" method="post" enctype="multipart/form-data">
					Title:
					<input type="text" name="title"/><br />
					Author: 
					<input type="text" name="author"><br />
					Select image to upload:
					<input type="file" name="image"/><br />
					Write your cool watermark text to have over it:
					<input type="text" name="watermark" required/><br />
					<input type="submit" value="Send"/><br /><br />
				</form>
				<form action="saved_gallery" method="post" enctype="multipart/form-data">
					<?php 
					
					foreach($images as $index=>$image) : ?>
						<a href="static/watermarked_images/<?=$image['src']?>">
							<img src="static/thumbnails/<?=$image['src']?>"/>
						</a>
						<input type="checkbox" name="checkbox_<?=$image['_id']?>"/>
						<?php
							endforeach; 
								if($page > 1){
									echo '<a href="?page=' . ($page-1) . '">Previous</a>';
								} 
								if($page * $limit < $total) {
									echo ' <a href="?page=' . ($page+1) . '">Next</a>';
}
							//foreach($saved_images as $saved_image): 
						?>
						<!--<img src="<?=$saved_image->s_src?>"/>-->
	
						<?php
						//endforeach; 
					?>
					<input type="submit" value="Save selected photos."/> 
				</form>
			</section>
            <a href="#">To the top</a>
        </div>
        <footer> Copyright 2018, Rozalia Karolczak</footer>
    </div>
</body>
</html>