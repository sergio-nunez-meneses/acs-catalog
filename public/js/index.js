function fillProgressBar() {
  let windowScrolling = document.body.scrollTop || document.documentElement.scrollTop,
    windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight,
    currentScrolling = (windowScrolling / windowHeight) * 100;

  getId('progressBar').style.width = currentScrolling + '%';
}

window.addEventListener('scroll', fillProgressBar);
