function deleteCart(id){
    if(confirm('Do you want to remove the product from your shopping cart?')){
        window.location.replace(`index.php?controller=Cart&action=delete&id=${id}`);
    
    }
}
function PayBank(type,id){
    var d = new Date();
    d.setTime(d.getTime() + (0.1 * 60 * 1000)); // 2 phút
    var expires = "expires="+ d.toUTCString();
    if(type === 'CashPayment'){ 
        document.cookie = `CashPayMentAccout=${id}; ` + expires + "; path=/";
    }else{
        document.cookie = `BankCardPayMentAccout=${id}; ` + expires + "; path=/";
    }      
}


