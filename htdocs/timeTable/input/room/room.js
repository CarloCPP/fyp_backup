function deleteRoom(roomID){
  var answer = confirm("Confirm to delete this room?");
  if(answer){

    $.ajax({
      method: "GET",
      // url: "https://moodlefyp.com/timeTable/input/room/process.php",
      url: "process.php",
      data: { input:roomID},

      success: function(response) {
        var data = $.parseJSON(response);
        console.log(data.status);
        console.log(data.input);

      }

    });
    location.reload();

  }
  else{

  }
}
