     function updateMessages(data){
                console.log('Пытаемся обновить сообщения');
                  const chatBox = document.getElementById('chat-box');
                        chatBox.innerHTML = '';
                        data.messages.forEach(msg => {
                            const div = document.createElement('div');
                            div.className = 'message';
                            div.innerHTML = `<span class="timestamp">[${new Date(msg.timestamp * 1000).toLocaleTimeString()}]</span> ` +
                                            `<span class="nickname">${msg.nickname}:</span> ` +
                                            `<span class="text">${msg.message.replace(/\n/g, '<br>')}</span>`;
                            chatBox.appendChild(div);
                            chatBox.scrollTop = chatBox.scrollHeight;
                           window.lastTimestamp = msg.timestamp;
                            
            });
             console.log(window.lastTimestamp);
        }