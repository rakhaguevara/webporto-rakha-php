<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="dashboard-wrapper">

    <aside class="sidebar" id="sidebar">

        <button class="sidebar-toggle" id="sidebarToggle">
            <i class='bx bx-chevron-left'></i>
        </button>

        <!-- User Panel -->
        <div class="user-panel">
            <div class="user-panel-image">
                <i class='bx bxs-user'></i>
            </div>
            <div class="user-panel-info">
                <p class="user-panel-name"><?= $_SESSION['username'] ?? 'Admin' ?></p>
                <p class="user-panel-role">Owner</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <ul style="list-style: none; padding: 0; margin: 0;">

                <li class="nav-item">
                    <a href="dashboard.php"
                        class="nav-link <?= $currentPage === 'dashboard.php' ? 'active' : '' ?>">
                        <i class='bx bxs-dashboard nav-icon'></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="project.php"
                        class="nav-link <?= $currentPage === 'project.php' ? 'active' : '' ?>">
                        <i class='bx bxs-briefcase nav-icon'></i>
                        <span class="nav-text">Project</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="coming_soon.php"
                        class="nav-link <?= $currentPage === 'coming_soon.php' ? 'active' : '' ?>">
                        <i class='bx bxs-category nav-icon'></i>
                        <span class="nav-text">Kategori</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="coming_soon.php"
                        class="nav-link <?= $currentPage === 'coming_soon.php' ? 'active' : '' ?>">
                        <i class='bx bxs-image nav-icon'></i>
                        <span class="nav-text">Foto</span>
                    </a>
                </li>

            </ul>
        </nav>

    </aside>