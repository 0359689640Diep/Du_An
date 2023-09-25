function redirectToPage(url) {
    window.location.href = url;
  }

  function deleteAccount(value){
    if(confirm("Do you want to delete the account?")){
        alert("The product stays in the trash for 15 days");
        window.location.replace(`index.php?controller=LisstAccount&action=deleteAccount&Id=${value}`);
    }
  }
  function fixAccount(value){
    if(confirm("Do you want to fix the account? ")){ 
      var currentDate = new Date();
    // Đặt thời gian sống cho cookie là 1 phút tính từ thời gian hiện tại
    var expirationDate = new Date(currentDate.getTime() + 100000);

    // Thiết lập cookie với tên là "my_cookie" và thời gian sống là 1 phút
    document.cookie = "IdAccount=" + value + "; expires=" + expirationDate.toUTCString();             
        window.location.replace(`index.php?controller=FixAccount`);
    }
  }