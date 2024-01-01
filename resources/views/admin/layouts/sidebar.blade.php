<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="{{route('admin.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>

        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown {{setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Manage Category</span>
            </a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.category.*'])}}"><a class="nav-link" href="{{route('admin.category.index')}}">Category</a></li>
              <li class="{{setActive(['admin.sub-category.*'])}}"><a class="nav-link" href="{{route('admin.sub-category.index')}}">Sub Category</a></li>
              <li class="{{setActive(['child-category.category.*'])}}"><a class="nav-link" href="{{route('admin.child-category.index')}}">Child Category</a></li>

            </ul>
          </li>

          <li class="dropdown {{setActive(
            [
                'admin.order.*',
                'admin.pending-orders',
                'admin.processed-orders',
                'admin.dropped-off-orders',
                'admin.shipped-orders',
                'admin.out-for-delivery-orders',
                'admin.delivered-orders',
                'admin.cancelled',

            ])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                <span>Order</span>
            </a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.order.*'])}}">
                <a class="nav-link" href="{{route('admin.order.index')}}">All Orders</a>
                </li>
                <li class="{{setActive(['admin.pending-orders'])}}">
                    <a class="nav-link" href="{{route('admin.pending-orders')}}">All Pending Orders</a>
                </li>
                <li class="{{setActive(['admin.processed-orders'])}}">
                    <a class="nav-link" href="{{route('admin.processed-orders')}}">All Processed Orders</a>
                </li>
                <li class="{{setActive(['admin.dropped-off-orders'])}}">
                    <a class="nav-link" href="{{route('admin.dropped-off-orders')}}">All Dropped Off Orders</a>
                </li>
                <li class="{{setActive(['admin.shipped-orders'])}}">
                    <a class="nav-link" href="{{route('admin.shipped-orders')}}">All Shipped Orders</a>
                </li>
                <li class="{{setActive(['admin.out-for-delivery-orders'])}}">
                    <a class="nav-link" href="{{route('admin.out-for-delivery-orders')}}">All Out For Delivery Orders</a>
                </li>
                <li class="{{setActive(['admin.delivered-orders'])}}">
                    <a class="nav-link" href="{{route('admin.delivered-orders')}}">All Delivered Orders</a>
                </li>
                <li class="{{setActive(['admin.cancelled'])}}">
                    <a class="nav-link" href="{{route('admin.cancelled-orders')}}">All Canceled Orders</a>
                </li>

            </ul>
          </li>
          <li class="{{setActive(['admin.transaction'])}}"><a class="nav-link" href="{{route('admin.transaction')}}"><i class="far fa-square"></i> <span>Transaction</span></a></li>

          <li class="dropdown {{setActive(['admin.brand.*',
          'admin.products.*', 'admin.seller-products.*', 'admin.seller-pending-products.*', 'admin.reviews.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Products</span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.brand.*'])}}"><a class="nav-link" href="{{route('admin.brand.index')}}">Brands</a></li>
              <li class="{{setActive(['admin.products.*'])}}"><a class="nav-link" href="{{route('admin.products.index')}}">Product</a></li>
              <li class="{{setActive(['admin.seller-products.*'])}}"><a class="nav-link" href="{{route('admin.seller-products.index')}}">Seller Products</a></li>
              <li class="{{setActive(['admin.seller-pending-products.*'])}}"><a class="nav-link" href="{{route('admin.seller-pending-products.index')}}">Seller Pending Products</a></li>
              <li class="{{setActive(['admin.reviews.*'])}}"><a class="nav-link" href="{{route('admin.reviews.index')}}"> Product Reviews</a></li>

            </ul>
          </li>

          <li class="dropdown {{setActive(['admin.vendor-profile.*',
          'admin.flash-sale.*',
          'admin.vendor-profile.*',
          'admin.coupons.*',
          'admin.shipping-rule.*',
          'admin.payment-settings.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Ecommerce</span></a>
            <ul class="dropdown-menu">
              <li class="{{setActive(['admin.flash-sale.*'])}}"><a class="nav-link" href="{{route('admin.flash-sale.index')}}">Flash Sale</a></li>
              <li class="{{setActive(['admin.coupons.*'])}}"><a class="nav-link" href="{{route('admin.coupons.index')}}">Coupons</a></li>
              <li class="{{setActive(['admin.shipping-rule.*'])}}"><a class="nav-link" href="{{route('admin.shipping-rule.index')}}">Shipping Rule</a></li>
              <li class="{{setActive(['admin.vendor-profile.*'])}}"><a class="nav-link" href="{{route('admin.vendor-profile.index')}}">Vendor Profile</a></li>
              <li class="{{setActive(['admin.payment-settings.*'])}}"><a class="nav-link" href="{{route('admin.payment-settings.index')}}">Payment Settings</a></li>

            </ul>
          </li>

        <li class="dropdown {{setActive(['admin.slider.*', 'home-page-setting'])}}">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Website</span></a>
          <ul class="dropdown-menu">
            <li class="{{setActive(['admin.slider.*'])}}"><a class="nav-link" href="{{route('admin.slider.index')}}">Slider</a></li>
            <li class="{{setActive(['admin.home-page-setting'])}}"><a class="nav-link" href="{{route('admin.home-page-setting')}}">Home Page Setting</a></li>

          </ul>
        </li>

        <li class="{{setActive(['admin.settings.*'])}}"><a class="nav-link" href="{{route('admin.settings.index')}}"><i class="far fa-square"></i> <span>Settings</span></a></li>


        {{-- <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li> --}}
        {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
      </ul>

    </aside>
  </div>
