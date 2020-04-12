function deleteRoom(roomID){
  var answer = confirm("Confirm to delete this room?");
  if(answer){

    $.ajax({
      method: "GET",
      url: "deleteRoom.php",
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