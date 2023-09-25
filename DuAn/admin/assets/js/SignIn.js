function Notification(idType, content, data){
    idType = document.getElementById(idType);
    content = document.getElementById(content).innerHTML = data;
    idType.classList.remove(idType)
}

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