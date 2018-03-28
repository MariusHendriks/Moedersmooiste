<div id="loader-all">
    <style>
        #loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #F7F7F7;
            z-index: 2147483647;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        #loader {
            border: 2px solid #C7C7C7;
            border-radius: 50%;
            border-top: 2px solid #353531;
            width: 175px;
            height: 175px;
            -webkit-animation: spin 1.5s linear infinite;
            animation: spin 1.5s linear infinite;
        }
        
        @-webkit-keyframes spin {
            0% { 
                -webkit-transform: rotate(0deg); 
            }
            100% { 
                -webkit-transform: rotate(360deg); 
            }
        }
        
        @keyframes spin {
            0% { 
                transform: rotate(0deg);
            }
            100% { 
                transform: rotate(360deg); 
            }
        }
        
        .loaded #loader-wrapper #loader {
            opacity: 0;
            transition: all 0.2s ease-out;
        }
        
        .loaded #loader-wrapper {
            visibility: hidden;
            opacity: 0;
            transition: all 0.2s 0.3s ease-out;
        }
    </style>
    
    <div id="loader-wrapper"><div id="loader"></div></div>
    
    <script>
        $(document).ready(function() {
            $(window).on("load", function() {
                $("#loader-wrapper").fadeOut(500);
                $("body").delay(500).addClass("loaded");
                $("#loader-all").delay(500).remove();
            });
        });
    </script>
</div>