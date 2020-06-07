//this is the logic (roles) of the API the controler
const express = require('express');
const morgan = require('morgan');
const app = express(); 

const watsonRoutes = require('./api/routes/watson'); 

app.use(morgan('dev'));
app.use('/watson', watsonRoutes);  // define the route of watson API

module.exports = app;