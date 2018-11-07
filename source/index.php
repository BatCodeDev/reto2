<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="fullfade" onclick="toggleNavbar();"></div>
    <nav id="navBar">
    </nav>
    <div id="wrapper">
        <header>
            <div id="divLogo">
                <img src="img/logo.png" alt="">
            </div>
            <div id="divSearch">
                <form method="post">
                    <input type="text">
                    <button type="submit" id="search">

                    </button>
                </form>
            </div>
            <div id="divNavTrigger" onclick="toggleNavbar();">
                <div class="divNavAxis"></div>
                <div class="divNavAxis"></div>
                <div class="divNavAxis"></div>
            </div>
        </header>
        <div id="content">
            <div class="verticalThird">
                <div class="verticalHeader">
                    <h2>Categorias:</h2>
                </div>
            </div>
            <div class="verticalThird">
                <div class="verticalHeader">
                    <h2>Preguntas recientes:</h2>
                </div>
            </div>
            <div class="verticalThird">
                <div class="verticalHeader">
                    <h2>Preguntas destacadas:</h2>
                </div>
            </div>
        </div>
        <footer>
            footer
            <div onclick="toggle($('#navBar'), 'toggle')">goggogo</div>
        </footer>
    </div>

</body>
    <script>
        $(document).ready(function(){
           $("body").width($(window).width());
           $("body").height($(window).height());
        });
        function toggleNavbar() {
            toggle($('#navBar'), 'toggle');
            toggle($('#divNavTrigger'), 'trigger');
            goFade($('#fullfade'));
        }
        function toggle(toToggle, toggleClass) {
            if(toToggle.hasClass(toggleClass)){
                toToggle.removeClass(toggleClass);
            }else{
                toToggle.addClass(toggleClass);
            }
        }
        function goFade(element) {
            if(!element.is(":visible")){
                element.fadeIn(200);
            }else{
                element.fadeOut(200);
            }
        }
    </script>
</html>