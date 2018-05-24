<html> 
<head> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    

    <script> 
 // prepare the form when the DOM is ready 
    $(document).ready(function() { 
        // bind form using ajaxForm 
        $('#htmlForm').ajaxForm({ 
            // target identifies the element(s) to update with the server response 
            target: '#htmlExampleTarget', 

            // success identifies the function to invoke when the server response 
            // has been received; here we apply a fade-in effect to the new content 
            success: function() { 
                $('#htmlExampleTarget').fadeIn('slow'); 
            } 
        }); 
    });
    </script> 
</head> 
<body>
<form id="htmlForm" action="post.php" method="post"> 
    Message: <input type="text" name="message" value="Hello HTML" /> 
    <input type="submit" value="Echo as HTML" /> 
</form>
<div id="htmlExampleTarget"></div>
<script>
    $("#htmlForm").submit(function(){

        var serializedData= $("#htmlForm").serialize();
        $.post("post.php", { dat: serializedData},      function(data) {
        //do whatever with the response here
        });

    });

</script>
</body>
</html>
