// TOGGLE THE DROP DOWN MENU
const dropdown = document.getElementById("accountDropDown");
const dropdownList = document.getElementById("dropDownList");

document.addEventListener('click', (e) => {
   // if the element accountDropDown is clicked
   if (e.target.parentNode.id === "accountDropDown") {
      // if drop down is already open
      if (dropdownList.classList.contains("show")) {
         dropDown("close");
         return;
      }
      dropDown("open");
      return;
   }
   // if outside of the menu was clicked
   if (!dropdownList.classList.contains("show")) {
      return;
   }
   dropDown("close");
});

function dropDown(e) {
   switch (e) {
      case "open":
         dropdownList.classList.add("show");
         break;
      case "close":
         dropdownList.classList.remove("show");
         break;
      default:
         break;
   }
}