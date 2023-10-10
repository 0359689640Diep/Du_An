<style>
    :root{
        --background-color-Message: #00CC99;
        --background-color-Message22: #EB5757;
        --background-color-Message33: #F2C94C;
        --background-color-Message1: #E6FAF5;
        --background-color-Message2: #FDEFEF;
        --background-color-Message3: #FDF8E8;
    }
        /* toast */
    .Notification{
        width: 450px;
        height: 100px;  
        position: absolute;
        z-index: 99999;
        right: 1%;
        top: 12%

    }
    .Message{
        width: 100%;
        height: 100%;
        display: flex;
        padding: 0, 2%;
        background-color: var(--background-color-Message1);
        /* align-items: center; */
        justify-content: space-between;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        position: relative;
        min-width: 80%;
        max-width: 100%;
        transition: all linear 0.3s;
    }
    .Message + .Message{
        margin-top: 24px;
    }
    .Message>p{
        width: 3%;
        height: 100%;
        background-color: var(--background-color-Message);
        border-radius: 10px;
    }
    .iconMessage {
        width: 23%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center; 
    }
    
    .iconMessage > svg {
        width: 70%;
        height: 100%;
        margin-top:26% ;
    }
    
     .ti-check, .iconMessage> .ti-info, .Message> .ti-close {
        font-size: 30px;
        color: #FFFFFF;
        position: absolute;
    }
     .ti-check, .iconMessage> .ti-info{
        top: 33%;
        left: 11%;
        }
    .Message> .ti-close{
        top: 35%;
        right: 7%;
        width: 2%;
    }
    .Message> .ti-close:hover{
        color: var(--text-color)
    }
    
    .Message> .contentMessage{
        width: 50%;
        height: 97%;
        margin-top:3% ;
        text-align: left;
        flex-grow: 1;
    }
    .contentMessage>h1{
        margin:1%;
        font-weight: 300;
        font-size: 20px;
    }
    .contentMessage>p{
        line-height: 1;
        width: 80%;
    }

    @keyframes slideInleft {
        from{
            opacity: 0;
            transform: translateX(calc(100%+2%));
        }
        to{
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeOut {
        to{
            opacity: 0;
        }
    }

    .toast--error> .Message{
        background-color: var(--background-color-Message2);
    }
    .toast--error> .Message>p{
        background-color: var(--background-color-Message22);
    }
    .toast--warning> .Message{
        background-color: var(--background-color-Message3);
    }
    .toast--warning> .Message>p{
        background-color: var(--background-color-Message33);
    }
</style>
<section class="Notification" id="Notification"> </section>
<script>
    function toast(title = "", message = "", type = "", duration = 0, quantity = 0){
    const main  = document.getElementById("Notification");
    if(main){
        const toast = document.createElement('div');


        // sau mot khoang thoi gian delay thi xoa khoi dom
        const autoRemoveId = setTimeout(function(){
            main.removeChild(toast)
        }, duration+1000);

        // khi click vao nut X thi bi xoa
        toast.onclick = function(e){
            if(e.target.closest('.ti-close')){
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        }

        // lưu các icont để gán vào html
        const icont = {
            success: "ti-check",
            error: "ti-info",
            warning: "ti-info",
        };
        const colorr ={
            success: "#00CC99",
            error: "#EB5757",
            warning: "#F2C94C",

        }
        const icon = icont[type];
        const color = colorr[type];
        // tính độ delay và chỉ cho lấy 2 số ở phần thập phân
        const delay = (duration / 1000).toFixed(2);
        toast.classList.add("Notification", `toast--${type}`);
        toast.style.animation = `slideInLeft ease 1.3s, fadeOut linear 1s ${delay}s forwards`;
        toast.innerHTML = `
            <section class="Message" id="Success">
                <p></p>
                <article class="iconMessage">
                    <svg >
                        <circle cx="35" cy="35" r="35" fill = "${color}"></circle>
                        <i class="${icon}"></i>
                    </svg>
                </article>
                <section class="contentMessage">
                    <h1>${title}</h1>
                    <p>${message}: The number of errors is: ${quantity} </p>
                </section>
                <i class="ti-close"></i>
            </section>        
        `;

        // đưa các phần tử html vào trong id Notification
        main.appendChild(toast);

    }
}

</script>