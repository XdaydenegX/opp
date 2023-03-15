function ChangeCreditStatus(id) {    
    var a = document.querySelector("#ChangeCreditBtn");
    a.style.background = 'black';
    a.style.color = 'white';
    $.ajax({
        type: "post",
        url: `changecreditstatus.php?id=${id}`,
        data: {
            id: id,
        },
        success: function (response) {
            console.log(response);
            response.forEach(element => {
                console.log(element.sratus);
                element.sratus = 1;
                if (element.sratus == 1) {
                    a.innerHTML = 'Кредит одобрен';
                    a.setAttribute('disabled', 'true');
                }
            });
            setTimeout(window.location.reload(), 1000);
        },
        error: function(response) {
            console.log(response);
        }
    });
}