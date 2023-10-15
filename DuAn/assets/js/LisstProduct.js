function redirectToPage(url) {
    window.location.href = url;
  }

  function deleteProduct(value){
    if(confirm("Do you want to delete the product?")){
        alert("The product stays in the trash for 15 days");
        window.location.replace(`index.php?controller=LisstProduct&action=deleteProduct&Id=${value}`);
    }
  }
  function fixProduct(value){
    if(confirm("Do you want to fix the product? ")){ 
      var currentDate = new Date();
    // Đặt thời gian sống cho cookie là 1 phút tính từ thời gian hiện tại
    var expirationDate = new Date(currentDate.getTime() + 6000000);

    // Thiết lập cookie với tên là "my_cookie" và thời gian sống là 1 phút
    document.cookie = "IdProduct=" + value + "; expires=" + expirationDate.toUTCString();             
        window.location.replace(`index.php?controller=FixProduct`);
    }
  }