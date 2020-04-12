function consoleFn(input){

console.log(input);
}



// The download function takes a ICS string, the filename and mimeType as parameters
var download = function(content, fileName, mimeType) {
  var a = document.createElement('a');
  mimeType = mimeType || 'application/octet-stream';

  if (navigator.msSaveBlob) { // IE10
    navigator.msSaveBlob(new Blob([content], {
      type: mimeType
    }), fileName);
  } else if (URL && 'download' in a) { //html5 A[download]
    a.href = URL.createObjectURL(new Blob([content], {
      type: mimeType
    }));
    a.setAttribute('download', fileName);
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
  } else {
    location.href = 'data:application/octet-stream,' + encodeURIComponent(content); // only this mime type is supported
  }
}

function downloadICS(output){
output_replace = output.replace(/~/g, '\n');
  // console.log("break-point");
  download(output_replace, 'timeTable.ics', 'text/calendar;encoding:utf-8');

}
