<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" navigation-header">
        <span data-i18n="nav.category.admin">Admin</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Admin"></i>
      </li>
      <li class=" nav-item"><a href="#"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboards</span></a>
        <ul class="menu-content">
          <li<?php if(basename($_SERVER['PHP_SELF']) == "dashboard-customers.php") { ?> class="active"<?php } ?>><a class="menu-item" href="dashboard-customers.php" data-i18n="nav.lists.customers">Customers</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "dashboard-main.php") { ?> class="active"<?php } ?>><a class="menu-item" href="dashboard-main.php" data-i18n="nav.lists.main">Main</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "dashboard-sales.php") { ?> class="active"<?php } ?>><a class="menu-item" href="dashboard-sales.php" data-i18n="nav.lists.sales">Sales</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "dashboard-shoppers.php") { ?> class="active"<?php } ?>><a class="menu-item" href="dashboard-shoppers.php" data-i18n="nav.lists.shoppers">Shoppers</a></li>
        </ul>
      </li>
      <li class=" nav-item"><a href="#"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.lists.main">Lists</span></a>
        <ul class="menu-content">
          <li<?php if(basename($_SERVER['PHP_SELF']) == "activity-log.php") { ?> class="active"<?php } ?>><a class="menu-item" href="activity-log.php" data-i18n="nav.lists.changes">Activity</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "brand-list.php") { ?> class="active"<?php } ?>><a class="menu-item" href="brand-list.php" data-i18n="nav.lists.brands">Brands</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "district-list.php") { ?> class="active"<?php } ?>><a class="menu-item" href="district-list.php" data-i18n="nav.lists.districts">Districts</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "error-log.php") { ?> class="active"<?php } ?>><a class="menu-item" href="error-log.php" data-i18n="nav.lists.errors">Errors</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "product-list.php") { ?> class="active"<?php } ?>><a class="menu-item" href="product-list.php" data-i18n="nav.lists.products">Products</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "store-list.php") { ?> class="active"<?php } ?>><a class="menu-item" href="store-list.php" data-i18n="nav.lists.stores">Stores</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "user-list.php") { ?> class="active"<?php } ?>><a class="menu-item" href="user-list.php" data-i18n="nav.lists.users">Users</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "visitor-log.php") { ?> class="active"<?php } ?>><a class="menu-item" href="visitor-log.php" data-i18n="nav.lists.visitors">Visitors</a></li>
          <li<?php if(basename($_SERVER['PHP_SELF']) == "zipcode-list.php") { ?> class="active"<?php } ?>><a class="menu-item" href="zipcode-list.php" data-i18n="nav.lists.zipcodes">Zip Codes</a></li>
        </ul>
      </li>
      <li class=" nav-item"><a href="system-settings.php"><i class="la la-gear"></i><span class="menu-title" data-i18n="">System Settings</span></a></li>
      <li class=" navigation-header">
        <span data-i18n="nav.category.applications">Applications</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Applications"></i>
      </li>
      <li class=" nav-item"><a href="email.php"><i class="la la-envelope"></i><span class="menu-title" data-i18n="">Email</span></a></li>
      <li class=" navigation-header">
        <span data-i18n="nav.category.support">Support</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="Support"></i>
      </li>
    </ul>
  </div>
</div>
