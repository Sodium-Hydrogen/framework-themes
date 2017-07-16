
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
  var myDropdown = document.getElementById("dropDownContainer");
  if(myDropdown.classList.contains("show")){
    myDropdown.classList.remove('show');
  }else{
    myDropdown.classList.add('show');
  }
}

window.onclick = function(e) {
  if (!e.target.matches('.dropDownBtn')) {
    var myDropdown = document.getElementById("dropDownContainer");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
