const COPY_BTN = getSel('#copyLink')[0];

function copyToClipboard(text) {
  window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
}

COPY_BTN.addEventListener('click', () => {
  copyToClipboard(getSel('#articleLink')[0].value);
});
