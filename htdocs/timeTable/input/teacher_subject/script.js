function unassignSubject(sid){
  console.log("unassignSubject "+sid);
  var answer = confirm("Are you sure for this unassignment? This action cannot be undone.");
  if(answer){
    console.log("unassignSubject,Answer:Yes");
    $.ajax({
      method: "GET",
      // method: "POST",
      url: "process.php",
      data: { action:"delete",input:sid,input2:-1},
      success: function(response) {
        var data = $.parseJSON(response);
        console.log("Status: "+data.status+" Input: "+data.input+" Input2: "+data.input2);

      }

    });
    location.reload();
  }
  else{
    console.log("unassignSubject,Answer:No");

  }


}

function assignSubject(sid,tid){
  console.log("consoleFn: sid= "+sid+" tid= "+tid);
  var answer = confirm("Are you sure for this assignment? You have to press the button to unassign after reloading.");
  if(answer){
    console.log("assignSubject,Answer:Yes");

    $.ajax({
      method: "GET",
      // method: "POST",
      url: "process.php",
      data: { action:"insert",input:sid,input2:tid},
      success: function(response) {
        var data = $.parseJSON(response);
        console.log("Status: "+data.status+" Input: "+data.input+" Input2: "+data.input2);

      }

    });
    location.reload();

  }
  else{
    console.log("assignSubject,Answer:No");

  }

}

function consoleFn(input){
  console.log("consoleFn: "+input);
}
