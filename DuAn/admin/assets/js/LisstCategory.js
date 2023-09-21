function redirectToPage(url) {
    window.location.href = url;
  }

  function deleteProduct(value){
    if(confirm("Do you want to delete the product?")){
        alert("The product stays in the trash for 15 days");
        window.location.replace(`index.php?controller=LisstCategory&action=deleteCategory&Id=${value}`);
    }
  }