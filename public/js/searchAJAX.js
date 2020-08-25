const SEARCH_FORM = getId('searchForm'),
  KEYWORD = getId('keyword');

function ajaxResult() {
  getId('articleFounds').innerHTML = this.responseText;
}

function AJAXsearch(oFormElement) {
  if (!oFormElement.action) {
    return;
  } else {
    let oReq = new XMLHttpRequest();
    oReq.onload = ajaxResult;
    if (oFormElement.method.toLowerCase() === "post") {
      oReq.open("post", oFormElement.action);
      oReq.send(new FormData(oFormElement));
    }
  }
}

KEYWORD.addEventListener('keyup', (e) => {
  let displayResults = getId('articleFounds'),
    keyboard = e.key;

  AJAXsearch(SEARCH_FORM);
});
