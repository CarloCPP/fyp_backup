
function generateTable(str){
  // var e = document.getElementById("id_classList");
  if(str=='class'){
    var e = document.getElementById("id_classList");
  }
  else if(str=='teacher'){
    var e = document.getElementById("id_teacherList");

  }
  else if(str=='room'){
    var e = document.getElementById("id_roomList");
  }
  else{
    return;
  }
  var value = e.options[e.selectedIndex].value;
  var text = e.options[e.selectedIndex].text;
  // alert(text);


  $.ajax({
    type: "GET",
    url: "process.php",
    data: { q:text,f:str},
    success: function(theResponse) {

      $('#response').html(theResponse);
    }
  });

  // if (window.XMLHttpRequest) {
  //   // code for IE7+, Firefox, Chrome, Opera, Safari
  //   xmlhttp=new XMLHttpRequest();
  // } else { // code for IE6, IE5
  //   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  // }
  // xmlhttp.onreadystatechange=function() {
  //   if (this.readyState==4 && this.status==200) {
  //     document.getElementById("response").innerHTML=this.responseText;
  //
  //
  //   }
  // }
  // xmlhttp.open("GET","process.php?q="+text+"&f=class",true); //q for data(query) and f for field
  // xmlhttp.send();


}
