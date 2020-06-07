//this is the API with watson

const express = require('express');
const router = express.Router();


router.get('/', (req,res,next) => {
    res.status(200).json({
        message: "Handeling GET request to /watson"
    });
});

router.post('/', (req,res,next) => {
    res.status(200).json({
        message: "Handeling POST request to /watson"
    });
});

const AssistantV2 = require('ibm-watson/assistant/v2');
const { IamAuthenticator } = require('ibm-watson/auth');

const assistant = new AssistantV2({
    version: '2020-04-01',
    authenticator: new IamAuthenticator({
        apikey: 'w3siWNyKjV7yPNaZO4xkImR5cc-_Eg2x4W6EZbDI45DO', 
    }),
    url: 'https://api.eu-gb.assistant.watson.cloud.ibm.com',
});

router.post('/createSession', (req,res,next) => {
    //res returned to the browser
    assistant.createSession({
        assistantId: 'f0339612-38cd-41a2-a93a-f5150337b308'
      })
        .then ((response,next) => {
            res.setHeader('Access-Control-Allow-Origin', '*');
            res.status(201).json({
                message: "Session ID Created",
                session_id: response.result.session_id
            });
        })
        .catch(err => {
          console.log(err);
        });
});

router.post('/sendMessage', express.json({type: '*/*'}), (req,res,next) => {
    assistant.message({
        assistantId: 'f0339612-38cd-41a2-a93a-f5150337b308',
        sessionId: req.body.session,
        input: {
            'message_type': 'text',
            'text': req.body.message ,
            'options': {
                'return_context': true
              }
        } 
        
    
    })
    .then ((response,next) => {
        res.setHeader('Access-Control-Allow-Origin', '*');
        res.status(200).json({
            response: response.result
        });
    })
    .catch(err => {
        console.log(err);
    });
});

module.exports = router;