<header>
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="<?php echo ROOT; ?>/index.php">
            <img src="<?php echo ROOT; ?>/images/logo.svg" alt="logo" />
        </a>

        <!-- Menu icons -->
        <nav class="menu">
            <ul>
                <li class="hidden-md-up">
                    <a href="#" data-toggle="collapse" data-target="#search" aria-expanded="false">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
            </ul>
        </nav>

        <!-- Form search -->
        <form id="search"
            class="search collapse"
            action="<?php echo ROOT; ?>/templates/search.php"
            method="GET"
            name="search">

            <div>
                <input type="text" name="info" placeholder="Buscar" />
                <button class="hidden-md-up" type="submit">Search</button>
                <button class="fa fa-search hidden-sm-down" type="submit"></button>
            </div>
        </form>
    </div>
</header>
