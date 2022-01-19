<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false" class="navbar-toggle collapsed"><span class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button> <a href="./index.php" class="navbar-brand">
                EMS
            </a>
        </div>
        <div id="app-navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">&nbsp;</ul>
            <?php
            if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                echo '<ul class="nav navbar-nav navbar-right">
            <li><a href="./login.php">Login</a>
            </li>
            <li><a href="./register.php">Register</a>
            </li>
            </ul>';
            } else {
                echo '<ul class="nav navbar-nav navbar-right">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                       '.$_SESSION['name'].' <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li> <a href="./logout.php">
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>';
            }
            ?>
        </div>
    </div>
</nav>