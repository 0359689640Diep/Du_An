// function display(id){
//     let display = document.getElementById(id);
//     display.style.display = "none";
//     $ConfirmationEmail = isset($_POST['ConfirmationEmail']) ? $_POST['ConfirmationEmail'] : "";
//     onclick="display(ConfirmationEmail)"
//     <input type="text" placeholder="Enter the confirmation code from your gmail" name="ConfirmationEmail" id="ConfirmationEmail">

// }

function Notification(idType, content, data){
    idType = document.getElementById(idType);
    content = document.getElementById(content).innerHTML = data;
    idType.classList.remove(idType)
}