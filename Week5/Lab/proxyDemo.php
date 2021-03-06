<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <style type="text/css">
            textarea {
                width: 500px;
                height: 100px;
            }
            
            textarea[name="results"] {
                 height: 300px;
            }
        </style>
        
        <h1>Rest API Demo</h1>
        
        Verb/HTTP Method:<br />
        <select name="verb">
            <option value="GET">GET</option>
            <option value="POST">POST</option>
            <option value="PUT">PUT</option>
            <option value="DELETE">DELETE</option>
        </select>
        <br />
        <br />
        Resource for endpoint:<br />
        <input name="resource" value="corps" />
        <br />
        <br />
        Data(optional):<br />   
        Corp: <input type="text" name="corp" value="" />
        <br />
        Incorp Date: <input type="text" name="incorp_dt" value="" />
        <br />
        <br />
        email <input type="email" name="email" value="" />
        <br />
        Owner: <input type="text" name="owner" value="" />
        <br />
        Phone <input type="text" name="phone" value="" />
        <br />
        Location <input type="text" name="location" />
        <br />
        <button>Make Call</button>
        <h3>Results</h3>
        
        <textarea name="results"></textarea>
        
        <script type="text/javascript">
        
            var callBtn = document.querySelector('button');
            
            callBtn.addEventListener('click', makeCall);
        
            function makeCall() {
                var verbfield = document.querySelector('select[name="verb"]');
                var verb = verbfield.options[verbfield.selectedIndex].value;
                var resource = document.querySelector('input[name="resource"]').value;
                var data = {
                    'corp' : document.querySelector('input[name="corp"]').value,
                    'incorp_dt' : document.querySelector('input[name="incorp_dt"]').value,
                    'email' : document.querySelector('input[name="email"]').value,
                    'owner' : document.querySelector('input[name="owner"').value,
                    'phone' : document.querySelector('input[name="phone"').value,
                    'location' : document.querySelector('input[name="location"').value
                    
                };            
                var results = document.querySelector('textarea[name="results"]');

                var xmlhttp = new XMLHttpRequest();

                var url = './api/v1/' + resource;

                xmlhttp.open(verb, url, true);

                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState === 4 ) {

                        console.log(xmlhttp.responseText);
                        results.value = xmlhttp.responseText;
                    } else {
                        // waiting for the call to complete
                    }
                };
                //var username = 'test';
               // xmlhttp.setRequestHeader("Authorization", "Basic " + btoa(username + "
               // "));

                 if ( verb === 'GET' ) {
                      xmlhttp.send(null);
                 } else {
                    xmlhttp.setRequestHeader('Content-type','application/json;charset=UTF-8');
                    xmlhttp.send(JSON.stringify(data));
                }
            }
        </script>
        
        
        

    
        
    </body>
</html>
