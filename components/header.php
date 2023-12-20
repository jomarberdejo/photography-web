<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand " href="./index.php">Photography</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link fw-bold  mx-4 <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>" aria-current="page" href="./index.php">All Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold mx-4  <?php echo (basename($_SERVER['PHP_SELF']) == 'save.php') ? 'active' : ''; ?>" href="./save.php">Favorites</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold mx-4  <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>" href="./dashboard.php">Dashboard</a>
                </li>



            </ul>
            <form class="d-flex <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'd-none' : 'flex'; ?>" onsubmit="handleSearch(event)" >
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search-input">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>