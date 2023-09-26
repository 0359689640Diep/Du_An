let hideTimeout;

function showMenu(elementId) {
  let menuElement = document.getElementById(elementId);
  menuElement.style.display = "flex";
}

function hideMenu(elementId) {
  let menuElement = document.getElementById(elementId);
  menuElement.style.display = "none";
}

function setHideTimeout(elementId) {
  hideTimeout = setTimeout(function() {
    hideMenu(elementId);
  }, 5000); // thời gian trễ ẩn menu (đơn vị: millisecond)
}

function clearTimeout() {
  clearTimeout(hideTimeout);
}
