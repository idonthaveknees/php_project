var yes_b = 'In previous years, there have been numerous courses for people who have never before had any type of experience with C#. Some have even finished with the participants getting special document confirming having done an up-to-par ending projects.';
var yes_a = '.NET Group likes taking in consideration what students want to learn - there have been courses about Xamarin, WPF, ASP.NET, Unity, and many more. If you have something special in mind, just let the members know and they will do their best to fulfill your wishes.';
var no = 'I hope that someday you will change your mind :)';

if(sessionStorage.dot_net_text_yes == undefined)
	sessionStorage.dot_net_text_yes = "";

function show_advanced() {
	sessionStorage.dot_net_text_yes = yes_a;
	document.getElementById("dot_net_text_yes").innerHTML = sessionStorage.dot_net_text_yes;
}

if(sessionStorage.dot_net_text_yes == yes_a) {
	document.getElementById("dot_net_text_yes").innerHTML = sessionStorage.dot_net_text_yes;
}

function show_beginner() {
	sessionStorage.dot_net_text_yes = yes_b;
	document.getElementById("dot_net_text_yes").innerHTML = sessionStorage.dot_net_text_yes;
}

if(sessionStorage.dot_net_text_yes == yes_b) {
	document.getElementById("dot_net_text_yes").innerHTML = sessionStorage.dot_net_text_yes;
}
	
if(localStorage.dot_net_text_no == undefined)
	localStorage.dot_net_text_no = "";

function dont_show_anymore() {
	document.getElementById("dot_net_text_no").innerHTML = localStorage.dot_net_text_no;
	localStorage.dot_net_text_no = no;
}

if(localStorage.dot_net_text_no == no) {
	document.getElementById("dot_net_text_no").innerHTML = localStorage.dot_net_text_no;
}