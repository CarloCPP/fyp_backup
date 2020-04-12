/*DONT USE getElementsByClassName, NOT WORKING!!*/
/*DONT USE getElementsByClassName, NOT WORKING!!*/
/*DONT USE getElementsByClassName, NOT WORKING!!*/


// setInterval(function(){ alert("Hello"); }, 3000);


function toggleShowHideRoom() {

  var ObjFullTable = document.querySelector(".roomTable");
  var showText = document.querySelector(".clickToggle");
  // var showText = document.getElementsByClassName("clickToggle");
  if (ObjFullTable.style.display != "none") {
    ObjFullTable.style.display = "none";
    showText.innerHTML = "Click to Show Full List of Rooms";
    // alert("Debuging:a,toggleShowHideRoom");

  } else if(ObjFullTable.style.display != "block") {
    ObjFullTable.style.display = "block";
    showText.innerHTML = "Click to Hide Full List of Rooms";
    // alert("Debuging:b,toggleShowHideRoom");

  }
  // else{
  //   ObjFullTable.style.display = "none";
  //   showText.innerHTML = "Click to Show Full List of Rooms";
  //   // alert("Debuging:c,toggleShowHideRoom");
  //
  // }
}
