<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">


                    <!-- User Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users_management">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">أدارة
                                    المستخدمين</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('users.create') }}">أضافة مستخدم</a> </li>
                            <li> <a href="{{ route('users.index') }}">كل المستخدمين</a> </li>
                        </ul>
                    </li>

                    <!-- Clients Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#clients_management">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">أدارة
                                    العملاء</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="clients_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('clients.create') }}"> أضافة عميل </a> </li>
                            <li> <a href="{{ route('clients.index') }}"> كل العملاء</a> </li>
                        </ul>
                    </li>

                    <!-- Clients Class Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#clients_class_management">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">أدارة تصنيف
                                    العملاء</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="clients_class_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('clients_class.create') }}">أضافة تصنيف العملاء</a> </li>
                            <li> <a href="{{ route('clients_class.index') }}">كل تصنيف العملاء</a> </li>
                        </ul>
                    </li>

                    <!-- Materials Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#materials_management">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">أدارة
                                    الخامات</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="materials_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('materials.create') }}"> أضافة خامات</a> </li>
                            <li> <a href="{{ route('materials.index') }}"> كل الخامات</a> </li>
                        </ul>
                    </li>

                    <!-- Prices Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#prices_management">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">أدارة
                                    الأسعار</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="prices_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('prices.create') }}"> أضافة أسعار</a> </li>
                            <li> <a href="{{ route('prices.index') }}"> كل الأسعار</a> </li>
                        </ul>
                    </li>




                    <!-- Suppliers Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#suppliers_management">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">أدارة مزودى
                                    الخدمات</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="suppliers_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('suppliers.create') }}"> أضافة مزود الخدمات </a> </li>
                            <li> <a href="{{ route('suppliers.index') }}"> كل مزودى الخدمات </a> </li>

                        </ul>
                    </li>

                    <!-- Receive Cash Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#receive_cash_management">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">أدارة أستلام
                                    النقدية</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="receive_cash_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('receive_cash.create') }}">أضافة أستلام نقدية</a> </li>
                            <li> <a href="{{ route('receive_cash.index') }}">كل أستلامات نقدية</a> </li>
                            <li> <a href="{{ route('receive_cash.cashReceive') }}"> أستلامات النقدية الكاش</a> </li>
                            <li> <a href="{{ route('receive_cash.onlineReceive') }}"> أستلامات النقدية الأونلاين</a>
                            </li>
                            <li> <a href="{{ route('receive_cash.reports') }}">تقاير أستلامات نقدية</a> </li>

                        </ul>
                    </li>


                    <!-- Cash out Management -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#cash_out_management">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">أدارة صرف
                                    نقدية</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="cash_out_management" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('cash_out.create') }}">أضافة صرف نقدية</a> </li>
                            <li> <a href="{{ route('cash_out.index') }}">كل صرف نقدية</a> </li>
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
