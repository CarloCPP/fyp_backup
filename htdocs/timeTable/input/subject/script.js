function createSubject(){
  var e_G= document.getElementById("id_grade");
  var e_N= document.getElementById("id_name");
  var e_Q= document.getElementById("id_quantity");
  var e_R= document.getElementById("id_require");
  var e_RG= document.getElementById("responseText_G");
  var e_RN= document.getElementById("responseText_N");
  var e_RQ= document.getElementById("responseText_Q");
  var e_RR= document.getElementById("responseText_R");
  var value_G = parseInt(e_G.value,10);
  value_G =  value_G+1;
  // console.log(value_G);
  // console.log(typeof value_G);
  var value_N = e_N.value;
  var value_Q = e_Q.value;
  var value_R = parseInt(e_R.value,10);
  // value_R =  value_R+1;
  // var text_RG = e_RG.innerHTML;
  // var text_RN = e_RN.innerHTML;
  // var text_RQ = e_RQ.innerHTML;
  // var text_RR = e_RR.innerHTML;
  var responseMsg_G="";
  var responseMsg_N="";
  var responseMsg_Q="";
  var responseMsg_R="";

  //validation start
  var flag=0;

  //check value_G, same as class.php
  if(value_G === null || String(value_G).match(/^ *$/) !== null){
    responseMsg_G="Please enter input of <span style='font-weight:bold;'>Grade</span>.";
    e_RG.innerHTML=responseMsg_G;
    e_RG.style.color="#d9534f";
    e_RG.style.borderColor="#d9534f";
  }
  else if(Number.isInteger(+value_G) == false){
    responseMsg_G="Please enter only an integer.";
    e_RG.innerHTML=responseMsg_G;
    e_RG.style.color="#d9534f";
    e_RG.style.borderColor="#d9534f";
  }
  else if((+value_G)<1 || (+value_G)>12){
    responseMsg_G="Please enter only an integer within 1 to 12.";
    e_RG.innerHTML=responseMsg_G;
    e_RG.style.color="#d9534f";
    e_RG.style.borderColor="#d9534f";
  }
  else{
    responseMsg_G="Valid input of <span style='font-weight:bold;'>Grade</span>.";
    e_RG.innerHTML=responseMsg_G;
    e_RG.style.color="green";
    e_RG.style.borderColor="green";
    flag=flag+1;
  }

  //check value_N
  var regex = /^\w+( \w+)*$/ ;
  if(value_N === null || value_N.match(/^ *$/) !== null){
    responseMsg_N="Please enter input of <span style='font-weight:bold;'>Subject Name</span>.";
    e_RN.innerHTML=responseMsg_N;
    e_RN.style.color="#d9534f";
    e_RN.style.borderColor="#d9534f";
  }
  else if(regex.test(value_N) == false){ //only accept a-z,A-z,0-9 and space(underline not allowed)
    responseMsg_N="Please enter only characters and numbers."+"<br/>"+"Single space is allowed allow between words.";
    e_RN.innerHTML=responseMsg_N;
    e_RN.style.color="#d9534f";
    e_RN.style.borderColor="#d9534f";

  }
  else{
    // validation with DB to check uniqueness "combination" of value_G and value_N
    $.ajax({
      method: "GET",
      async: false,
      url: "process.php",
      data: { action:"query",input:value_G,input2:value_N,input3:"-1",input4:"-1"},
      success: function(response) {
        var data = $.parseJSON(response);
        //[status]: check for error
        //[input] and [input2]: resending back input for debuging;
        console.log(data.status);
        if(data.status=="ready"){
          responseMsg_N="Valid input of <span style='font-weight:bold;'>Subject Name</span>";
          e_RN.innerHTML=responseMsg_N;
          e_RN.style.color="green";
          e_RN.style.borderColor="green";
          flag=flag+1;
        }
        else{
          //data.status=="duplicate"
          responseMsg_N="<span style='font-weight:bold;'>Subject Name</span> = "+value_N+" for <span style='font-weight:bold;'>Grade</span> = "+value_G+"  already exists."+ "<br />"+"Make sure you choose the correct grade.";
          e_RN.innerHTML=responseMsg_N;
          e_RN.style.color="#d9534f";
          e_RN.style.borderColor="#d9534f";
        }
      }
    });
  }

  //check value_Q
  if(value_Q === null || String(value_Q).match(/^ *$/) !== null){
    responseMsg_Q="Please enter input of <span style='font-weight:bold;'>Quantity</span>.";
    e_RQ.innerHTML=responseMsg_Q;
    e_RQ.style.color="#d9534f";
    e_RQ.style.borderColor="#d9534f";
  }
  else if(Number.isInteger(+value_Q) == false){
    responseMsg_Q="Please enter only an integer.";
    e_RQ.innerHTML=responseMsg_Q;
    e_RQ.style.color="#d9534f";
    e_RQ.style.borderColor="#d9534f";
  }
  else if((+value_Q)<1 || (+value_Q)>99){
    responseMsg_Q="Please enter only an integer within 1 to 99.";
    e_RQ.innerHTML=responseMsg_Q;
    e_RQ.style.color="#d9534f";
    e_RQ.style.borderColor="#d9534f";
  }
  else{
    responseMsg_Q="Valid input of <span style='font-weight:bold;'>Quantity</span>.";
    e_RQ.innerHTML=responseMsg_Q;
    e_RQ.style.color="green";
    e_RQ.style.borderColor="green";
    flag=flag+1;
  }

  //check value_R, nothing to check
  if(value_R!=0 &&value_R!=1){
    responseMsg_R="Please choose 'No' or 'Yes'.";
    e_RR.innerHTML=responseMsg_R;
    e_RR.style.color="#d9534f";
    e_RR.style.borderColor="#d9534f";

  }
  else{
    responseMsg_R="Valid input of <span style='font-weight:bold;'>Need Special Room</span>.";
    e_RR.innerHTML=responseMsg_R;
    e_RR.style.color="green";
    e_RR.style.borderColor="green";
    flag=flag+1;
  }



  if(flag==4){


    console.log("flag=4"); //<<<<<<<<<<<<<<<<<<<<delete this lata

    $.ajax({
      method: "GET",
      async: false,
      url: "process.php",
      data: { action:"insert",input:value_G,input2:value_N,input3:value_Q,input4:value_R},
      success: function(response) {
        var data = $.parseJSON(response);
        console.log("status="+data.status);
        console.log("input="+data.input+"input2="+data.input2+"input3="+data.input3+"input4="+data.input4);


      }
    });
    responseMsg_G="Subject is successfully added. <br/>Page reloads in 3 seconds.";
    e_RG.innerHTML=responseMsg_G;
    e_RG.style.visibility="visible";
    e_RN.style.visibility="hidden";
    e_RQ.style.visibility="hidden";
    e_RR.style.visibility="hidden";
    setInterval(function(){
      location.reload();
    }, 3000);



  }
  else{

    e_RG.style.visibility="visible";
    e_RN.style.visibility="visible";
    e_RQ.style.visibility="visible";
    e_RR.style.visibility="visible";

  }
}

function deleteSubject(sid,sgrade,sname){

  var answer = confirm("Are you sure to delete subject of {Subject Grade = "+sgrade+" and Subject Name = "+sname+" }?");
  if(answer){

    $.ajax({
      method: "GET",
      url: "process.php",
      data: { action:"delete",input:sid,input2:-1,input3:-1,input4:-1},
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
