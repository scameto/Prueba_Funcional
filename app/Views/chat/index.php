<?php echo $this->extend('layouts/layout') ?>

<?php echo $this->section('slot') ?>


<div class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4 flex-col">
    <div id="messages" class="space-y-4 w-full"></div>
    <form id="message-form" class="flex flex-row space-x-2 mt-4">
        <input type="text" id="message-input" class="flex-1 p-2 border rounded">
        <button type="submit" class="p-2 bg-blue-500 text-white rounded">Enviar</button>
    </form>
</div>

<script>
    var conn = new WebSocket('ws://localhost:8082');
    var messages = document.getElementById('messages');
    var messageInput = document.getElementById('message-input');

    conn.onopen = function(e) {
        console.log("Conexión establecida!");
    };

    conn.onmessage = function(e) {
        addMessage(e.data, 'left');
    };

    document.getElementById('message-form').onsubmit = function(e) {
        e.preventDefault();
        var message = messageInput.value;
        conn.send(message);
        addMessage(message, 'right');
        messageInput.value = "";
    };

    function addMessage(message, side) {
        var msgBubble = document.createElement('div');
        msgBubble.className = side === 'right' ? 'flex justify-end' : 'flex justify-start';
        msgBubble.innerHTML = `
            <div class="flex items-start gap-2.5">
                <div class="flex flex-col ${side === 'right' ? 'items-end' : 'items-start'} w-full max-w-[320px] leading-1.5 p-4 border-gray-200 ${side === 'right' ? 'bg-blue-100' : 'bg-gray-100'} rounded-e-xl rounded-es-xl">
                    <div class="flex items-center space-x-2 ${side === 'right' ? 'flex-row-reverse' : 'flex-row'}">
                        <span class="text-sm font-semibold text-gray-900">${side === 'right' ? 'You' : 'Someone'}</span>
                        <span class="text-sm font-normal text-gray-500">Now</span>
                    </div>
                    <p class="text-sm font-normal py-2.5 text-gray-900">${message}</p>
                </div>
            </div>
        `;
        messages.appendChild(msgBubble);
    }
</script>




<?php echo $this->endSection() ?>