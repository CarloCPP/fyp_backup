function deleteTimeslot(timeslotID){
  var answer = confirm("Confirm to delete this timeslot?");
  if(answer){

    $.ajax({
      method: "GET",
      url: "delete.php",
      data: { input:timeslotID},
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