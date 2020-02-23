<?php
<html>
<head>
<script src="jquery-2.1.4.js"></script>
<script src="popper.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="navbar"><span>Red Stapler - Popper.js </span></div>
<div id="wrapper">
        <div class="blocker"></div>
        <div id="popup">
    Popper.js Tutorial!
        </div>
        <button id="button-a">button</button>
        <div class="blocker"></div>

</div>
<script>
        var ref = $('#button-a');
        var popup = $('#popup');
        popup.hide();

        ref.click(function(){
            popup.show();
            var popper = new Popper(ref,popup,{
                placement: 'top',
                        onCreate: function(data){
                    console.log(data);
                },
                        modifiers: {
                    flip: {
                        behavior: ['left', 'right', 'top','bottom']
                                },
                    offset: {
                        enabled: true,
                                        offset: '0,10'
                                }
                }
                });
        });
</script>
</body>
</html>
WRITTEN BY