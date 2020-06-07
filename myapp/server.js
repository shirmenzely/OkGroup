//here I managed the server
const http = require('http');  //this is our http server

const app = require('./app');  //this is our API

const port = process.env.port || 3000;
const server = http.createServer(app);

server.listen(port, function() {
    console.log(`Application Running on http://localhost:${port}`);
});