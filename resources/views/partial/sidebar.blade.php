<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- Sidebar - Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            {{ __('label.app_name') }}
        </div>
    </a>

    {{-- Divider --}}
    <hr class="sidebar-divider my-0">

    {{-- Nav Item - Dashboard --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>
                {{ __('label.menu_home') }}
            </span>
        </a>
    </li>

    {{-- Divider --}}
    <hr class="sidebar-divider">

    {{-- Nav Item - Pages Collapse Menu --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{ __('label.menu_setting') }}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('batche') }}">
                    {{ __('กำหนดรอบหวย') }}
                </a>
                <a class="collapse-item" href="{{ route('price-setups') }}">
                    {{ __('กำหนดราคาถูกรางวัล') }}
                </a>
                <a class="collapse-item" href="{{ route('number-limit') }}">
                    {{ __('กำหนดเลขอั้น') }}
                </a>
                <a class="collapse-item" href="{{ route('payment-limit') }}">
                    {{ __('กำหนดรับผิดชอบ') }}
                </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('lottery-reward') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>
                {{ __('label.lottery_rewards') }}
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('lottery-bet') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>
                {{ __('label.lottery_bet') }}
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('list-cheat') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>
                {{ __('ตรวจสอบโพย') }}
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('list-bet-transactions') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>
                {{ __('label.check_bet_transactions') }}
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('check-bet-correct') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>
                {{ __('label.check_bet_correct') }}
            </span>
        </a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('bet-over-limit') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>
                {{ __('รายการโพยเกินกำหนด') }}
            </span>
        </a>
    </li> --}}

    <li class="nav-item">
        <a class="nav-link" href="{{ route('summary-by-type') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>
                {{ __('สรุปหวยรายประเภท') }}
            </span>
        </a>
    </li>


    {{-- Nav Item - Utilities Collapse Menu --}}

    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}

    {{-- Divider --}}
    <hr class="sidebar-divider">

    {{-- Sidebar Toggler (Sidebar) --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
