<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>welkome</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <header>




            <div class="container-fluid" id="nav" >
                <div id="extra"> 
                <div class="row" id="nav1">

                    <ul >

                        {section name=teller loop=$menu}
                        <li><a href="{$menu[teller].d_link}">{$menu[teller].d_item}
                            </a>
                        </li>
                        {/section}


                    </ul>

                </div>
                <div class="row">


                    <div id="buggerbutton">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                </div>
                </div>



            </div>

        </header>

        <div class="container" id="container"> 

            <div class="p-3 mb-2 bg-success hidemsg text-white" id='msg' >{$msg}</div>
            <div class="p-3 mb-2 bg-danger hidemsg text-white" id='error' >{$error}</div>
            <div class="row" id="row">



                {$inhoud}


            </div> 

         
         
        </div>

        <div class="container-fluid col-md-12" id="footer"  >
   <!-- Footer -->
            <footer class="page-footer font-small blue pt-4 col-md-12">


                <!-- Copyright -->
                <div class="footer-copyright text-center py-3" id='owner'>:
                    <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
                </div>
                <!-- Copyright -->

            </footer>

</div>


        {section name=teller loop=$jsInclude}
        <script src="{$jsInclude[teller]}"></script>
        {/section}


    </body>
</html>