function password() {
    var x = document.getElementById("password");
    var y = document.getElementById("eye");
    if (x.type === "password") {
      x.type = "text";
      y.style.color = '#F74473';
    } else {
      x.type = "password";
      y.style.color = 'grey';
    }
}

const inputs = document.querySelectorAll(".input");

function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

// 

var menu_btn = document.querySelector("#sideBtn");
var sidebar = document.querySelector("#sidebar");
var container = document.querySelector(".my-container");

menu_btn.addEventListener("click", () => {
  sidebar.classList.toggle("active-nav");
  container.classList.toggle("active-cont");
});
// ------------------------------

// Activating Account 
