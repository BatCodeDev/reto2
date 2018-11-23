<link rel="stylesheet" href="css/navBar.css">
<header>
    <div id="divLogo">
        <img src="img/logo.png" onclick="window.location.href='index.php'">
    </div>
    <div id="divSearch">
        <form method="post" action="searchForQuestion.php">
            <input type="text" name="searchQuestion">
            <button type="submit" id="search"></button>
        </form>
    </div>
    <div id="divNavTrigger" onclick="toggleNavbar();">
        <div class="divNavAxis"></div>
        <div class="divNavAxis"></div>
        <div class="divNavAxis"></div>
    </div>
</header>
<!--<footer>
    footer
</footer>-->