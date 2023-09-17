<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chat App Socket.io</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            body {
                font-family: 'figtree', sans-serif;
            }

            .chat-row {
                margin: 50px;
            }

            ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            ul li {
                padding: 10px;
                background: #1f6ea7;
                border-bottom: 1px solid #eee;
                margin-bottom: 20px;
            }

            ul li:nth-child(2n-2) {
                background: #eee;
            }

            .chat-content {
                background-color: #f8f8f8;
                border-radius: 10px;
                padding: 20px;
                height: 300px;
                overflow-y: scroll;
            }

            .chat-box {
                background-color: #f8f8f8;
                border-radius: 10px;
                padding: 20px;
            }

            .chat-input {
                border-top-right-radius: 10px;
                border-top-left-radius: 10px;
                padding: 20px;
                border: 1px solid #eee;
              
            
            }
        </style>
    </head>
<body>

    <div class="container">
        <div class="row chat-row">
           <div class="chat-content">
           <ul>
               
           </ul>
        </div>

        <div class="chat-section">
         <div class="chat-box">
            <div class="chat-input" id="chatInput" contenteditable="">

            </div>

         </div>
        </div>
        <!-- Add more messages here -->
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>

    <script>
        $(function () {
           let ip_address = '127.0.0.1';
           let socket_port = '3000';
           let socket = io(ip_address + ':' + socket_port);
              
          let chatInput = $('#chatInput');
          chatInput.keypress(function (event) {
              let message = $(this).html();
                 console.log(message);
              if (event.which === 13 && !event.shiftKey) {
                  socket.emit('chatMessageToServer', message);
                    chatInput.html('');
                    return false;
              }
          });

           socket.on('chatMessageToClient', function (message) {
               $('.chat-content ul').append('<li>' + message + '</li>');
           });
        });
        </script>
</body>
</html>
