
    // Отправка формы без перезагрузки страницы (AJAX)


    function sendMessageToChat(nickname, timestamp, message){

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/controllers/add_message.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');

        xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
            console.log('Ответ сервера:', xhr.responseText);
            } else {
            console.error('Ошибка запроса:', xhr.status);
            }
        }
        };

        // Формируем данные в формате URL-кодирования
        const data = 'nickname=' + encodeURIComponent(nickname) + '&timestamp=' + encodeURIComponent(timestamp)+'&message='+
        encodeURIComponent(message);

        xhr.send(data);
    }


    document.getElementById('btnSendMessage').addEventListener('click', function (e) {
        console.log("Clicked!");
        let nickname = document.getElementById('nickname').value;
        let message = document.getElementById('message').value;
        let timestamp =  Date.now();
        sendMessageToChat(nickname, timestamp, message);
       
        
    });
 