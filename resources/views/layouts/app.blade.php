<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Manajemen') - PT Asietex</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --primary-light: #818CF8;
            --secondary: #10B981;
            --danger: #EF4444;
            --warning: #F59E0B;
            --dark: #1F2937;
            --gray: #6B7280;
            --light-gray: #F3F4F6;
            --sidebar-width: 250px;
        }
        
        * { font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; }
        
        body {
            background: #F8FAFC;
            min-height: 100vh;
        }
        
        /* ===== NAVBAR ===== */
        .navbar-custom {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            box-shadow: 0 2px 20px rgba(79, 70, 229, 0.2);
            padding: 0.8rem 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        
        .navbar-custom .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem;
            color: white !important;
        }
        
        .navbar-custom .navbar-brand i {
            margin-right: 10px;
            font-size: 1.3rem;
        }
        
        .navbar-custom .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-size: 0.9rem;
        }
        
        .navbar-custom .nav-link:hover {
            color: white !important;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255,255,255,0.15);
            padding: 6px 16px 6px 12px;
            border-radius: 30px;
            color: white;
        }
        
        .user-info .user-avatar {
            width: 32px;
            height: 32px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }
        
        .user-info .user-name {
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .btn-logout {
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            border-radius: 20px;
            padding: 5px 16px;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            background: rgba(255,255,255,0.3);
            color: white;
        }
        
        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background: white;
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.05);
            padding: 1.5rem 0;
            overflow-y: auto;
            z-index: 999;
        }
        
        .sidebar .nav-link {
            color: var(--gray);
            padding: 0.7rem 1.5rem;
            margin: 0.2rem 1rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .sidebar .nav-link:hover {
            background: var(--light-gray);
            color: var(--primary);
        }
        
        .sidebar .nav-link.active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.25);
        }
        
        .sidebar .nav-link i {
            width: 24px;
            margin-right: 10px;
            font-size: 1rem;
        }
        
        .sidebar .nav-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #9CA3AF;
            padding: 0.5rem 1.5rem;
            margin-top: 1rem;
        }
        
        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: 70px;
            padding: 2rem;
            min-height: calc(100vh - 70px);
        }
        
        /* ===== CARDS ===== */
        .card-custom {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.06);
            border: none;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card-custom:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }
        
        .card-custom .card-header {
            background: transparent;
            border-bottom: 2px solid var(--light-gray);
            padding: 1.2rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
        }
        
        .card-custom .card-body {
            padding: 1.5rem;
        }
        
        /* ===== STAT CARDS ===== */
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.06);
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }
        
        .stat-card .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: white;
        }
        
        .stat-card .stat-icon.primary { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); }
        .stat-card .stat-icon.success { background: linear-gradient(135deg, #34D399, var(--secondary)); }
        .stat-card .stat-icon.warning { background: linear-gradient(135deg, #FBBF24, var(--warning)); }
        .stat-card .stat-icon.danger { background: linear-gradient(135deg, #F87171, var(--danger)); }
        
        .stat-card .stat-label {
            color: var(--gray);
            font-size: 0.85rem;
            margin-bottom: 2px;
        }
        
        .stat-card .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
        }
        
        /* ===== BUTTONS ===== */
        .btn-custom {
            border-radius: 10px;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
            color: white;
        }
        
        .btn-outline-primary-custom {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
        }
        
        .btn-outline-primary-custom:hover {
            background: var(--primary);
            color: white;
        }
        
        /* ===== TABLES ===== */
        .table-custom {
            border-radius: 12px;
            overflow: hidden;
        }
        
        .table-custom thead {
            background: var(--light-gray);
        }
        
        .table-custom thead th {
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--gray);
            padding: 0.8rem 1rem;
        }
        
        .table-custom tbody td {
            padding: 0.8rem 1rem;
            vertical-align: middle;
            font-size: 0.9rem;
        }
        
        /* ===== BADGES ===== */
        .badge-status {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-weight: 500;
            font-size: 0.75rem;
        }
        
        .badge-active { background: #D1FAE5; color: #065F46; }
        .badge-inactive { background: #FEE2E2; color: #991B1B; }
        .badge-pending { background: #FEF3C7; color: #92400E; }
        .badge-approved { background: #D1FAE5; color: #065F46; }
        .badge-rejected { background: #FEE2E2; color: #991B1B; }
        
        /* ===== ALERT ===== */
        .alert-custom {
            border-radius: 12px;
            border: none;
        }
        
        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                transform: translateX(-100%);
                transition: all 0.3s ease;
            }
            
            .sidebar.show {
                width: var(--sidebar-width);
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            
            .user-info .user-name {
                display: none;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid px-4">
            <button class="btn btn-link text-white d-lg-none me-2" type="button" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-coins"></i> PT Asietex
            </a>
            
            <div class="ms-auto d-flex align-items-center gap-3">
                <div class="user-info">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="user-name">{{ Auth::user()->name ?? 'User' }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="nav-label">Menu Utama</div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
               href="{{ route('dashboard') }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}" 
               href="{{ route('employees.index') }}">
                <i class="fas fa-users"></i> Data Karyawan
            </a>
            <a class="nav-link {{ request()->routeIs('transactions.*') ? 'active' : '' }}" 
               href="{{ route('transactions.index') }}">
                <i class="fas fa-exchange-alt"></i> Transaksi
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show alert-custom" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show alert-custom" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
        
        // Close sidebar on outside click (mobile)
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('sidebarToggle');
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(e.target) && !toggle.contains(e.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>
    @stack('scripts')
</body>
</html>