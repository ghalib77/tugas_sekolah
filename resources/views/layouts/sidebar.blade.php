<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/home">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Pages</li>
            <li class="@if (Route::current()->uri == '/biodata') active @endif">
                <a class="nav-link" href="/biodata"><i class='fab fa-phoenix-squadron'></i><span>Biodata</span></a>
            </li>
            <li class="@if (Route::current()->uri == '/kelas') active @endif">
                <a class="nav-link" href="/kelas"><i class='fab fa-phoenix-squadron'></i><span>Kelas</span></a>
            </li>
            <li class="@if (Route::current()->uri == '/register/data') active @endif">
                <a class="nav-link" href="/register/data"><i class='fab fa-phoenix-squadron'></i><span>Register
                        Data</span></a>
            </li>
        </ul>
    </aside>
</div>
