<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
      <div class="user-image">
       {{--  <img src="images/faces/face28.png"> --}}
      </div>
      <div class="user-name">
          Edward Spencer
      </div>
      <div class="user-designation">
          Developer
      </div>
    </div>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="icon-box menu-icon"></i>
          <span class="menu-title">Administration</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('categories.listes')}}">
          <i class="icon-file menu-icon"></i>
          <span class="menu-title">Catégories</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('product.listes')}}">
          <i class="icon-pie-graph menu-icon"></i>
          <span class="menu-title">Produits</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <i class="icon-command menu-icon"></i>
          <span class="menu-title">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pages/icons/feather-icons.html">
          <i class="icon-help menu-icon"></i>
          <span class="menu-title">Icons</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="docs/documentation.html">
          <i class="icon-book menu-icon"></i>
          <span class="menu-title">Documentation</span>
        </a>
      </li>
    </ul>
  </nav>
