    // Create an app
    var server = require('diet')
    var app = server()
    app.listen('166.62.28.88:80')
    
  
    app.get('/', function($){
        $.end('Hello World!')
    })
