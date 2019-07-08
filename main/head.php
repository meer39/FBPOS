<head>
    <title>FB - POS</title>
    <link href="../style.css" media="screen" rel="stylesheet" type="text/css" />    
    <link href="bs/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/application.js" type="text/javascript" charset="utf-8"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
        })
    })
    </script>
    <style>
        body{}
    </style>
    <link rel="stylesheet" type="text/css" href="tcal.css" />
    <script type="text/javascript" src="tcal.js"></script>
    <script language="javascript">
        function Clickheretoprint()
        { 
        var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
            disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
        var content_vlue = document.getElementById("content").innerHTML; 
        
        var docprint=window.open("","",disp_setting); 
        docprint.document.open(); 
        docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
        docprint.document.write(content_vlue); 
        docprint.document.close(); 
        docprint.focus(); 
        }
    </script>
</head>