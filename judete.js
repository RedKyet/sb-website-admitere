var dictcodes = {
  "Galati": "ROU315",
  "Bacau": "ROU312"
};
function showdiv(jud){
var myicon = document.getElementById(dictcodes[jud]);
var mypopup = document.getElementById(jud+"-div");
document.write("<style>#"+jud+"-div{width: 400px;padding: 20px;font-family: Arial, sans-serif;font-size: 10pt;background-color: var(--lightBrown);border-radius: 6px;position: absolute;display: none;}#"+jud+"-div::before {width: 12px;height: 12px;transform: rotate(45deg);background-color: var(--lightBrown);position: absolute;left: -6px;top: 68px;transition: opacity 1s linear;}</style>");
myicon.addEventListener("mouseover", showPopup);
myicon.addEventListener("mouseout", hidePopup);

function showPopup(evt) {
  var iconPos = myicon.getBoundingClientRect();
  mypopup.style.left = (iconPos.right + 20) + "px";
  mypopup.style.top = (window.scrollY + iconPos.top - 60) + "px";
  mypopup.style.display = "block";
}
function hidePopup(evt) {
  mypopup.style.display = "none";
}
}
Object.keys(dictcodes).forEach(key => {showdiv(key)});