<!DOCTYPE HTML>
<html>
<title>test</title>
    <head>

<?php
    require_once 'SDK/API_Config.php';
    require_once 'SDK/OpenTokSDK.php';

    //API Key
    echo "apiKey: ";
    echo API_Config::API_KEY;

    //Generate session
    $apiObj = new OpenTokSDK(API_Config::API_KEY, API_Config::API_SECRET);
    $session = $apiObj->create_session();
    echo "\nsession: ";
    echo $session->getSessionId();

    //Generate token
    $sdk = new OpenTokSDK(API_Config::API_KEY,API_Config::API_SECRET);
    ?>

        <meta http-equiv="X-UA-Compatible" content="chrome=1">
        <script src="https://swww.tokbox.com/webrtc/v2.0/js/TB.min.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" charset="utf-8">

        var apiKey = <?php print API_Config::API_KEY?>;
//        var sessionId = '<?php print $session->getSessionId(); ?>';
//        var token = '<?php print $sdk->generate_token($session->getSessionId()); ?>';

          var sessionId = '2_MX40NDY1MTY2Mn5-U2F0IEZlYiAxNSAxMzo0NjoyOCBQU1QgMjAxNH4wLjE1MDYzODM0fg';
          var token = 'T1==cGFydG5lcl9pZD00NDY1MTY2MiZzaWc9MDdiOWI3MjBmNWEwNTVmZDhlMzM2MWVhODZhNDhlNDljNGY0M2I2ZjpzZXNzaW9uX2lkPTJfTVg0ME5EWTFNVFkyTW41LVUyRjBJRVpsWWlBeE5TQXhNem8wTmpveU9DQlFVMVFnTWpBeE5INHdMakUxTURZek9ETTBmZyZjcmVhdGVfdGltZT0xMzkyNTAwNzg4JnJvbGU9cHVibGlzaGVyJm5vbmNlPTEzOTI1MDA3ODguMjQ3MTk0NzA1MDQwMA==';

            TB.addEventListener("exception", exceptionHandler);
            var session = TB.initSession(sessionId); // Replace with your own session ID. 
            TB.setLogLevel(TB.DEBUG);
            session.addEventListener("sessionConnected", sessionConnectedHandler);
            session.addEventListener("streamCreated", streamCreatedHandler);
            session.connect(apiKey, token);

            function sessionConnectedHandler(event) {
                 console.log("connected");
                 subscribeToStreams(event.streams);
                 session.publish();
            }

            function streamCreatedHandler(event) {
                console.log("created");
                subscribeToStreams(event.streams);
            }

            function subscribeToStreams(streams) {
                for (var i = 0; i < streams.length; i++) {
                    var stream = streams[i];
                    if (stream.connection.connectionId != session.connection.connectionId) {
                        session.subscribe(stream);
                    }
                }
            }

            function exceptionHandler(event) {
                alert(event.message);
            }


window.onload = function() {
       //when the document is finished loading, replace everything
       //between the <a ...> </a> tags with the value of splitText
   document.getElementById('share').href= 'http://www.smuralidhar.com/pennapps2014s/webcam.php?'+sessionId;
} 

        </script>
    </head>
    <body>
<?php
  echo "<a id='share' href='http://www.smuralidhar.com/pennapps2014s/webcam.php?'>Share!</a>

   </body>
</html>


