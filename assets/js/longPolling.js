// Функция для опроса сервера
function longPoll() {
        const xhr = new XMLHttpRequest();
         console.log('Отметка на опросе ' + window.lastTimestamp);
        xhr.open('GET', `/controllers/api.php?action=get_messages&timestamp=${window.lastTimestamp}`, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                    try {
                    const data = JSON.parse(xhr.responseText);
                    console.log(data);
                    if (data.status === 'ok' && data.messages.length > 0) {
                           
                            window.lastTimestamp = data.messages[data.messages.length-1]['timestamp'];
                            updateMessages(data);
                        };
                    } catch (err) {
                        console.log(err.message);
                    }
                    
                             
            }
        };
        xhr.send();
    }

    window.lastTimestamp = 0;
    // Запускаем Long Polling после загрузки страницы
    window.onload = function () {
        longPoll();
        // Запускаем следующий запрос
                setInterval( 
                    function(){
                    console.log('Опрос по интервалу');
                    //const chatBox = document.getElementById('chat-box');
                    //chatBox.innerHTML = "";
                    longPoll();
                }, 6000);
    };