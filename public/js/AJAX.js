const CREATE_TAB = getId('createTab'),
  CREATE_CONTAINER = getId('createContainer'),
  EDITOR_CONTAINER = getId('editorContainer'),
  ARTICLE_CONTAINER = getId('articleContainer'),
  EDITOR_TAB = getId('handler-tab'),
  INFO_TEXT = getId('ajaxResponse');

function ajaxSuccess() {
  const AJAX_RESPONSE = JSON.parse(this.responseText);
  console.log(AJAX_RESPONSE); // just for debugging
  // console.log(this.responseText); // just for debugging

  if (AJAX_RESPONSE['form'] === 'ajax-element-form') {
    if (AJAX_RESPONSE['action'] === 'edit') {
      INFO_TEXT.innerHTML = AJAX_RESPONSE['action_message'];
      getId('title-' + AJAX_RESPONSE['id']).innerHTML = AJAX_RESPONSE['title'];
      getId('image-' + AJAX_RESPONSE['id']).setAttribute('src', AJAX_RESPONSE['image']);
      getId('date-' + AJAX_RESPONSE['id']).innerHTML = AJAX_RESPONSE['date'];
      getId('text-' + AJAX_RESPONSE['id']).innerHTML = AJAX_RESPONSE['text'];
    } else if (AJAX_RESPONSE['action'] === 'delete') {
      INFO_TEXT.innerHTML = AJAX_RESPONSE['action_message'];
      getId('element-' + AJAX_RESPONSE['id']).classList.add('hidden');
    } else if (AJAX_RESPONSE['action'] === 'create') {
      INFO_TEXT.innerHTML = AJAX_RESPONSE['action_message'];

      let sec = document.createElement('SECTION'),
        btnImgTitleDiv = document.createElement('HEADER'),
        btn = document.createElement('BUTTON'),
        image = document.createElement('IMG'),
        title = document.createElement('H2'),
        dateAuthorDiv = document.createElement('DIV'),
        date = document.createElement('P'),
        author = document.createElement('P'),
        text = document.createElement('ARTICLE');

      sec.setAttribute('id', 'container-' + AJAX_RESPONSE['id']);
      btn.setAttribute('id', 'handler-tab');
      btn.innerHTML = 'edit';
      title.setAttribute('id', 'title-' + AJAX_RESPONSE['id']);
      title.innerHTML = AJAX_RESPONSE['title'];
      image.setAttribute('id', 'image-' + AJAX_RESPONSE['id']);
      image.setAttribute('src', '../img/' + AJAX_RESPONSE['image']);
      date.setAttribute('id', 'date-' + AJAX_RESPONSE['id']);
      date.innerHTML = AJAX_RESPONSE['date'];
      author.setAttribute('id', 'author-' + AJAX_RESPONSE['id']);
      author.innerHTML = AJAX_RESPONSE['author'];
      text.setAttribute('id', 'text-' + AJAX_RESPONSE['id']);
      text.innerHTML = AJAX_RESPONSE['text'];

      dateAuthorDiv.appendChild(date);
      dateAuthorDiv.appendChild(author);
      btnImgTitleDiv.appendChild(btn);
      btnImgTitleDiv.appendChild(title);
      btnImgTitleDiv.appendChild(image);
      btnImgTitleDiv.appendChild(dateAuthorDiv);
      sec.appendChild(btnImgTitleDiv);
      sec.appendChild(text);
      getId('newArticleContainer').prepend(sec);

      getId('handler-tab').addEventListener('click', displayAjaxForm);
    } else if (AJAX_RESPONSE['action'] === 'archive') {
      INFO_TEXT.innerHTML = AJAX_RESPONSE['action_message'];
    }
  }
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

function displayAjaxForm() {
  if (EDITOR_CONTAINER.classList.contains('hidden')) {
    ARTICLE_CONTAINER.classList.add('hidden');
    EDITOR_CONTAINER.classList.remove('hidden');
    EDITOR_TAB.innerHTML = 'hide';
  } else {
    EDITOR_CONTAINER.classList.add('hidden');
    ARTICLE_CONTAINER.classList.remove('hidden');
    EDITOR_TAB.innerHTML = 'edit';
  }
}

function displayEditor() {
  if (CREATE_CONTAINER.classList.contains('hidden')) {
    CREATE_CONTAINER.classList.remove('hidden');
    CREATE_TAB.innerHTML = 'hide';
  } else {
    CREATE_CONTAINER.classList.add('hidden');
    CREATE_TAB.innerHTML = 'create';
  }
}

if (CREATE_TAB !== null) CREATE_TAB.addEventListener('click', displayEditor);
if (EDITOR_TAB !== null) EDITOR_TAB.addEventListener('click', displayAjaxForm);
