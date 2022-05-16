<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCheckout" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Check Out</span>
    </a>
    <div id="collapseCheckout" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">

        @if (auth()->user()->userHasRole('Admin'))
        <a class="collapse-item" href="{{ route('admin.checkout.all') }}">All CheckOuts</a>
        @endif

        <a class="collapse-item" href="{{ route('admin.checkout.customer') }}">View Customers</a>
        <a class="collapse-item" href="{{ route('admin.checkout.show') }}">View User Checkout</a>
      </div>
    </div>
  </li>