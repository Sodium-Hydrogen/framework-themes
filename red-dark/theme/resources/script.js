
window.onscroll = function(e) {
  var menu = document.getElementById("menu");
  var scrollTop = window.pageYOffset;
  if(scrollTop > 50){
    menu.classList.add("scrolled");
  }else{
    menu.classList.remove("scrolled");
  }
}

function dropdown(){
  document.getElementById("dropDownContainer").classList.toggle("show");
}

window.onclick = function(e) {
  if (!e.target.matches('.dropDownBtn')) {
    var myDropdown = document.getElementById("dropDownContainer");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
