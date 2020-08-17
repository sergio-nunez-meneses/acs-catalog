function ajaxSuccess() {
  // console.log(this.responseText);
  const RESPONSE = JSON.parse(this.responseText);
}

function AJAXSubmit(oFormElement) {
  if (!oFormElement.action) {
    return;
  } else {
    let oReq = new XMLHttpRequest();
    oReq.onload = ajaxSuccess;
    if (oFormElement.method.toLowerCase() === "post") {
      oReq.open("post", oFormElement.action);
      oReq.send(new FormData(oFormElement));
    }
  }
}
