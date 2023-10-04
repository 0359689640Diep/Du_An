function deleteCart(id){
    if(confirm('Do you want to remove the product from your shopping cart?')){
        window.location.replace(`http://localhost:3000/DuAn/user/index.php?controller=Cart&action=delete&id=${id}`);
        // alert("Delete Successfully");
    }

}