<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item has-treeview {{ (request()->is('customer/*')) ? 'menu-open' : '' }}">
	<a href="#" class="nav-link {{ (request()->is('customer/*')) ? 'active' : '' }}">
	  <i class="nav-icon fas fa-tree"></i>
	  <p>
	    Customer
	    <i class="fas fa-angle-left right"></i>
	  </p>
	</a>
	<ul class="nav nav-treeview">
	  <li class="nav-item">
	    <a href="{{route('customer.register')}}" class="nav-link {{ (request()->is('customer/register')) ? 'active' : '' }}">
	      <i class="far fa-circle nav-icon"></i>
	      <p>Customer Registration</p>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a href="{{route('customer.list')}}" class="nav-link {{ (request()->is('customer/list')) ? 'active' : '' }}">
	      <i class="far fa-circle nav-icon"></i>
	      <p>Customers List</p>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a href="pages/UI/buttons.html" class="nav-link">
	      <i class="far fa-circle nav-icon"></i>
	      <p>Buttons</p>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a href="pages/UI/sliders.html" class="nav-link">
	      <i class="far fa-circle nav-icon"></i>
	      <p>Sliders</p>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a href="pages/UI/modals.html" class="nav-link">
	      <i class="far fa-circle nav-icon"></i>
	      <p>Modals & Alerts</p>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a href="pages/UI/navbar.html" class="nav-link">
	      <i class="far fa-circle nav-icon"></i>
	      <p>Navbar & Tabs</p>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a href="pages/UI/timeline.html" class="nav-link">
	      <i class="far fa-circle nav-icon"></i>
	      <p>Timeline</p>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a href="pages/UI/ribbons.html" class="nav-link">
	      <i class="far fa-circle nav-icon"></i>
	      <p>Ribbons</p>
	    </a>
	  </li>
	</ul>
</li>
<li class="nav-item has-treeview {{ (request()->is('meter/*')) ? 'menu-open' : '' }}">
	<a href="#" class="nav-link {{ (request()->is('meter/*')) ? 'active' : '' }}">
	  <i class="nav-icon fas fa-tree"></i>
	  <p>
	    Meter
	    <i class="fas fa-angle-left right"></i>
	  </p>
	</a>
	<ul class="nav nav-treeview">
	  <li class="nav-item">
	    <a href="{{route('meter.naamsaari')}}" class="nav-link {{ (request()->is('meter/naamsaari')) ? 'active' : '' }}">
	      <i class="far fa-circle nav-icon"></i>
	      <p>Naamsaari</p>
	    </a>
	  </li>
	  <li class="nav-item">
	    <a href="{{route('meter.thaausaari')}}" class="nav-link {{ (request()->is('meter/thaausaari')) ? 'active' : '' }}">
	      <i class="far fa-circle nav-icon"></i>
	      <p>Thaausaari</p>
	    </a>
	  </li>
	</ul>
</li>
