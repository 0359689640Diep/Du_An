function redirectToPage(url) {
    window.location.href = url;
  }

  function deleteCategory(value){
    if(confirm("Do you want to delete the Category?")){
        alert("The Category stays in the trash for 15 days");
        window.location.replace(`index.php?controller=LisstCategory&action=deleteCategory&Id=${value}`);
    }
  }
  function fixCategory(value){
    if(confirm("Do you want to fix the Category? ")){ 
      var currentDate = new Date();
    // Đặt thời gian sống cho cookie là 1 phút tính từ thời gian hiện tại
    var expirationDate = new Date(currentDate.getTime() + 60000);

    // Thiết lập cookie với tên là "my_cookie" và thời gian sống là 1 phút
    document.cookie = "IdCategory=" + value + "; expires=" + expirationDate.toUTCString();             
        window.location.replace(`index.php?controller=FixCategory`);
    }
  }