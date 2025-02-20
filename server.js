const WebSocket = require('ws');
const http = require('http');

const server = http.createServer();
const wss = new WebSocket.Server({ server });

wss.on('connection', ws => {
    console.log('Client connected');
    ws.on('message', message => console.log(`Received: ${message}`));
});

server.listen(8080, () => console.log('WebSocket server berjalan di port 8080'));
