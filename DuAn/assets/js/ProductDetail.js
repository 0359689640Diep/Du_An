let hideTimeout;

function showMenu(elementId, type) {
  if(type === "flex"){
    let menuElement = document.getElementById(elementId);
    menuElement.style.display = type;
  }
  let menuElement = document.getElementById(elementId);
  menuElement.style.display = type;
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

function showHideMenu(menu, showHide) {
  // Đầu tiên, chúng ta cần tạo biến để lưu trạng thái hiện tại của menu
  let isOpen = false;
  // Lấy các phần tử menu và showHide theo ID
  let menuElement = document.getElementById(menu);
  let showHideElement = document.getElementById(showHide);
  
  // Lắng nghe sự kiện click trên phần tử muốn áp dụng
  showHideElement.addEventListener("click", function() {
    if (isOpen) {
      // Nếu menu đang hiển thị, ẩn nó
      menuElement.style.display = "none";
      isOpen = false;
    } else {
      // Nếu menu đang ẩn, hiển thị nó
      menuElement.style.display = "block";
      isOpen = true;
    }
  });
}
showHideMenu( 'contentNavMobile','ti-menu')
showHideMenu( 'sheachMobile','ti-search');

function detailProduct(id){
  window.location.replace(`index.php?controller=ProductDetail&id=${id}`)
}
