<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                    <li>
                        <a href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i><span
                                class="right-nav-text">لوحة التحكم
                            </span> </a>
                    </li>

                    <!-- User Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users_management">
                            <div class="pull-left"><i class="fa-solid fa-users"></i><span class="right-nav-text">أدارة
                                    المستخدمين</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('users.create') }}">أضافة مستخدم</a> </li>
                            <li> <a href="{{ route('users.index') }}">جميع المستخدمين</a> </li>
                        </ul>
                    </li>

                    <!-- Role Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#roles_management">
                            <div class="pull-left"><i class="fa-solid fa-lock"></i><span class="right-nav-text">أدارة
                                    الصلاحيات</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="roles_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('roles.create') }}">أضافة صلاحية</a> </li>
                            <li> <a href="{{ route('roles.index') }}">جميع الصلاحيات</a> </li>
                        </ul>
                    </li>

                    <!-- Clients Class Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#clients_class_management">
                            <div class="pull-left"><i class="fa-solid fa-list"></i><span class="right-nav-text">أدارة
                                    تصنيف
                                    العملاء</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="clients_class_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('clients_class.create') }}">أضافة تصنيف العملاء</a> </li>
                            <li> <a href="{{ route('clients_class.index') }}">جميع تصنيف العملاء</a> </li>
                        </ul>
                    </li>

                    <!-- Clients Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#clients_management">
                            <div class="pull-left"><i class="fa-solid fa-users"></i><span class="right-nav-text">أدارة
                                    العملاء</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="clients_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('clients.create') }}"> أضافة عميل </a> </li>
                            <li> <a href="{{ route('clients.index') }}"> جميع العملاء</a> </li>
                        </ul>
                    </li>



                    <!-- Materials Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#materials_management">
                            <div class="pull-left"><i class="fa-solid fa-print"></i><span class="right-nav-text">أدارة
                                    الخامات</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="materials_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('materials.create') }}"> أضافة خامات</a> </li>
                            <li> <a href="{{ route('materials.index') }}"> جميع الخامات</a> </li>
                        </ul>
                    </li>

                    <!-- Prices Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#prices_management">
                            <div class="pull-left"><i class="fa-solid fa-money-bill-1"></i><span
                                    class="right-nav-text">أدارة
                                    الأسعار</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="prices_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('prices.create') }}"> أضافة أسعار</a> </li>
                            <li> <a href="{{ route('prices.index') }}"> جميع الأسعار</a> </li>
                        </ul>
                    </li>




                    <!-- Suppliers Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#suppliers_management">
                            <div class="pull-left"><i class="fa-solid fa-users"></i><span class="right-nav-text">أدارة
                                    الموردين</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="suppliers_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('suppliers.create') }}"> أضافة الموردين </a> </li>
                            <li> <a href="{{ route('suppliers.index') }}"> جميع الموردين </a> </li>

                        </ul>
                    </li>

                    <!-- Receive Cash Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#receive_cash_management">
                            <div class="pull-left"><i class="fa-solid fa-money-bill-1"></i><span
                                    class="right-nav-text">أدارة أستلام
                                    النقدية</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="receive_cash_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('receive_cash.create') }}">أضافة أستلام نقدية</a> </li>
                            <li> <a href="{{ route('receive_cash.index') }}">جميع أستلامات نقدية</a> </li>
                            <li> <a href="{{ route('receive_cash.cashReceive') }}"> أستلامات النقدية الكاش</a> </li>
                            <li> <a href="{{ route('receive_cash.onlineReceive') }}"> أستلامات النقدية الأونلاين</a>
                            </li>
                            <li> <a href="{{ route('receive_cash.reports') }}">تقاير أستلامات نقدية</a> </li>

                        </ul>
                    </li>


                    <!-- Cash out Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#cash_out_management">
                            <div class="pull-left"><i class="fa-solid fa-money-bill-1"></i><span
                                    class="right-nav-text">أدارة صرف
                                    نقدية</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="cash_out_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('cash_out.create') }}">أضافة صرف نقدية</a> </li>
                            <li> <a href="{{ route('cash_out.index') }}">جميع صرف نقدية</a> </li>
                            <li> <a href="{{ route('cash_out.reports') }}">تقاير صرق نقدية</a> </li>
                        </ul>
                    </li>


                    <!-- menu title -->
                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>

                    </li> --}}
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
