function createClass(){
  // Get value and hook responseText from field


  var e_G= document.getElementById("id_grade");
  var e_N= document.getElementById("id_nameOfClass");
  var e_M= document.getElementById("id_numOfSubj");
  var e_RG= document.getElementById("responseText_G");
  var e_RN= document.getElementById("responseText_N");
  var e_RM= document.getElementById("responseText_M");
  var value_G = parseInt(e_G.value,10);
  value_G =  value_G+1;
  var value_N = e_N.value;
  var value_M = e_M.value;
  var text_RG = e_RG.innerHTML;
  var text_RN = e_RN.innerHTML;
  var text_RM = e_RM.innerHTML;
  // var text_RG = e_RG.innerText; //innerText or textContent not working for visibility:hidden
  // var text_RG = e_RG.textContent; //innerText or textContent not working for visibility:hidden
  // var text_RN = e_RN.innerText; //innerText or textContent not working for visibility:hidden
  // var text_RN = e_RN.textContent; //innerText or textContent not working for visibility:hidden
  // alert("Grade= "+value_G+" and Name= "+value_N+"  and responseText= "+text_RN);
  var responseMsg_G="";
  var responseMsg_N="";
  var responseMsg_M="";
  //validation start
  var flag=0;

  // check value_G
  //
  if(value_G === null || String(value_G).match(/^ *$/) !== null){
    responseMsg_G="Please enter input of "+"<span style='font-weight:bold;'>Grade</span>.";
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
    responseMsg_G="Valid input of "+"<span style='font-weight:bold;'>Grade</span>.";
    e_RG.innerHTML=responseMsg_G;
    e_RG.style.color="green";
    e_RM.style.borderColor="green";

    flag=flag+1;



  }

  //  check value_N

  var regex = /^\w+( \w+)*$/ ;
  if(value_N === null || value_N.match(/^ *$/) !== null){
    responseMsg_N="Please enter input of <span style='font-weight:bold;'>Class Name</span>.";
    e_RN.innerHTML=responseMsg_N;
    e_RN.style.color="#d9534f";
    e_RN.style.borderColor="#d9534f";

  }
  else if(regex.test(value_N) == false){ //only accept a-z,A-z,0-9 and space(underline not allowed)
    responseMsg_N="Please enter only characters and numbers. <br/> One space is allow between words.";
    e_RN.innerHTML=responseMsg_N;
    e_RN.style.color="#d9534f";
    e_RN.style.borderColor="#d9534f";

  }
  else{
    // validation with DB to check uniqueness


    $.ajax({
      method: "GET",
      async: false,
      url: "process.php",
      // data: { input:value_N,action:"query",input2:"-1",input3:"-1"},
      data: { input:value_N,action:"query",input2:value_G,input3:"-1"},
      success: function(response) {
        var data = $.parseJSON(response);
        //[status]: check for error
        //[input]: resending back input for debuging;
        console.log(data.status);

        if(data.status=="ready"){
          responseMsg_N="Valid input of <span style='font-weight:bold;'>Class Name</span>.";
          e_RN.innerHTML=responseMsg_N;
          e_RN.style.color="green";
          e_RN.style.borderColor="green";

          flag=flag+1;

        }
        else{
          //data.status=="duplicate"
          responseMsg_N="Class of <span style='font-weight:bold;'>Class Name</span> = "+value_N+" already exists.";
          e_RN.innerHTML=responseMsg_N;
          e_RN.style.color="#d9534f";
          e_RN.style.borderColor="#d9534f";

        }
        // console.log(data.input);
      }

    });



  }

   // check value_M
  if(value_M === null || value_M.match(/^ *$/) !== null){
    responseMsg_M="Please enter input of <span style='font-weight:bold;'>Maxium no. of a subject per day</span>.";
    e_RM.innerHTML=responseMsg_M;
    e_RM.style.color="#d9534f";
    e_RM.style.borderColor="#d9534f";

  }
  else if(Number.isInteger(+value_M) == false){
    responseMsg_M="Please enter only an integer.";
    e_RM.innerHTML=responseMsg_M;
    e_RM.style.color="#d9534f";
    e_RM.style.borderColor="#d9534f";


  }
  else if(value_M<0||value_M>9){
    responseMsg_M="Please enter only a integer from 0 to 9.";
    e_RM.innerHTML=responseMsg_M;

    e_RM.style.color="#d9534f";
    e_RM.style.borderColor="#d9534f";

  }
  else{
    responseMsg_M="Valid input of <span style='font-weight:bold;'>Maxium no. of a subject per day</span>.";
    e_RM.innerHTML=responseMsg_M;
    e_RM.style.color="green";
    e_RM.style.borderColor="green";

    flag=flag+1;

  }



  //show responseMsg by change css back to visible

  if(flag==3){
    console.log("flag==3");
    $.ajax({
      method: "GET",
      url: "process.php",
      data: { input:value_G,input2:value_N,input3:value_M,action:"insert"},
      success: function(response) {
        var data = $.parseJSON(response);
        console.log(data.status);
      }
    });
    console.log("break1");
    responseMsg_G="Class is successfully added. <br/>Page reloads in 3 seconds.";
    console.log("break2");

    e_RG.innerHTML=responseMsg_G;
    e_RG.style.visibility="visible";
    e_RN.style.visibility="hidden";
    e_RM.style.visibility="hidden";
    setInterval(function(){
      location.reload();
    }, 3000);


  }else{


    e_RG.style.visibility="visible";
    e_RN.style.visibility="visible";
    e_RM.style.visibility="visible";
  }

}

function deleteClass(cid,cname){
  var answer = confirm("Are you sure to delete class of Class Name= "+cname+" ?");
  if(answer){
console.log("deleteClass()");
    $.ajax({
      method: "GET",
      url: "process.php",
      data: { input:cid,input2:-1,input3:-1,action:"delete"},
      success: function(response) {
        var data = $.parseJSON(response);
        console.log("Status: "+data.status+" Input: "+data.input+" Input2: "+data.input2+" Input2: "+data.input3);


      }

    });
    // location.reload();
  }
  else{

  }

}
