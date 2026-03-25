@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-gradient-start: #667eea;
        --primary-gradient-end: #764ba2;
        --success-color: #10b981;
        --warning-color: #f59e0b;
        --danger-color: #ef4444;
        --info-color: #3b82f6;
        --dark-bg: #1f2937;
        --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, var(--primary-gradient-start) 0%, var(--primary-gradient-end) 100%);
        border-radius: 30px;
        padding: 3rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        animation: fadeInUp 0.8s ease-out;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1%, transparent 1%);
        background-size: 50px 50px;
        animation: moveBackground 30s linear infinite;
        pointer-events: none;
    }

    @keyframes moveBackground {
        0% { transform: translate(0, 0); }
        100% { transform: translate(50px, 50px); }
    }

    .hero-content {
        position: relative;
        z-index: 1;
        text-align: center;
        color: white;
    }

    .hero-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        backdrop-filter: blur(10px);
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    .hero-icon i {
        font-size: 2.5rem;
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .hero-subtitle {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        opacity: 0.95;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-hero-primary {
        background: white;
        color: var(--primary-gradient-start);
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-lg);
    }

    .btn-hero-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-xl);
        color: var(--primary-gradient-end);
    }

    .btn-hero-secondary {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .btn-hero-secondary:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        color: white;
    }

    /* Stats Cards */
    .stats-section {
        margin-bottom: 2rem;
    }

    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
        border: 1px solid rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-gradient-start), var(--primary-gradient-end));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .stat-card:hover::before {
        transform: scaleX(1);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border-radius: 15px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .stat-icon i {
        font-size: 1.5rem;
        color: var(--primary-gradient-start);
    }

    .stat-value {
        font-size: 2rem;
        font-weight: 800;
        color: var(--dark-bg);
        margin-bottom: 0.25rem;
    }

    .stat-label {
        color: #6b7280;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-trend {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
        border-radius: 20px;
        background: #f3f4f6;
    }

    .trend-up {
        color: var(--success-color);
    }

    .trend-down {
        color: var(--danger-color);
    }

    /* Feature Cards */
    .feature-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: var(--shadow-sm);
        height: 100%;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .feature-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .feature-icon i {
        font-size: 2rem;
        color: var(--primary-gradient-start);
    }

    .feature-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        color: var(--dark-bg);
    }

    .feature-description {
        color: #6b7280;
        line-height: 1.6;
    }

    /* Recent Transactions */
    .recent-section {
        background: white;
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: var(--shadow-sm);
        margin-top: 2rem;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--dark-bg);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title i {
        color: var(--primary-gradient-start);
    }

    .transaction-item {
        padding: 1rem;
        border-bottom: 1px solid #e5e7eb;
        transition: all 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .transaction-item:last-child {
        border-bottom: none;
    }

    .transaction-item:hover {
        background: #f9fafb;
        transform: translateX(5px);
    }

    .transaction-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex: 1;
    }

    .transaction-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .transaction-icon i {
        font-size: 1rem;
        color: var(--primary-gradient-start);
    }

    .transaction-details {
        flex: 1;
    }

    .transaction-hash {
        font-family: monospace;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--dark-bg);
    }

    .transaction-meta {
        font-size: 0.75rem;
        color: #9ca3af;
        margin-top: 0.25rem;
    }

    .transaction-amount {
        font-weight: 700;
        color: var(--success-color);
    }

    .transaction-status {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-success {
        background: #d1fae5;
        color: #065f46;
    }

    .status-pending {
        background: #fed7aa;
        color: #92400e;
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 1.5rem;
        }
        
        .hero-title {
            font-size: 2rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
        
        .stat-card {
            margin-bottom: 1rem;
        }
        
        .transaction-item {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    /* Loading Animation */
    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }

    .loading {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 1000px 100%;
        animation: shimmer 2s infinite;
    }
</style>

<div class="container-fluid px-4">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-icon">
                <i class="fas fa-university"></i>
            </div>
            <h1 class="hero-title">
                Chào mừng đến với Blockchain Bank
            </h1>
            <p class="hero-subtitle">
                Quản lý giao dịch blockchain demo với giao diện hiện đại, bảo mật và dễ sử dụng
            </p>
            <div class="hero-buttons">
                <a href="{{ route('transaction.create') }}" class="btn-hero-primary">
                    <i class="fas fa-plus-circle me-2"></i>Tạo giao dịch
                </a>
                <a href="{{ route('explorer') }}" class="btn-hero-secondary">
                    <i class="fas fa-cubes me-2"></i>Xem chuỗi
                </a>
                <a href="{{ route('search') }}" class="btn-hero-secondary">
                    <i class="fas fa-search me-2"></i>Tìm kiếm
                </a>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="stats-section">
        <div class="row g-3">
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <div class="stat-value" id="totalBlocks">0</div>
                    <div class="stat-label">Tổng số Blocks</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i> +12%
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <div class="stat-value" id="totalTransactions">0</div>
                    <div class="stat-label">Tổng giao dịch</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i> +8%
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-value" id="totalVolume">0</div>
                    <div class="stat-label">Khối lượng giao dịch</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i> +23%
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-value" id="activeUsers">0</div>
                    <div class="stat-label">Người dùng hoạt động</div>
                    <div class="stat-trend trend-up">
                        <i class="fas fa-arrow-up"></i> +5%
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Nền tảng an toàn</h3>
                <p class="feature-description">
                    Lưu trữ giao dịch theo chuỗi block, đảm bảo tính toàn vẹn và không thể thay đổi dữ liệu
                </p>
                <div class="mt-3">
                    <span class="badge bg-success">Bảo mật cao</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="feature-title">Truy cập nhanh</h3>
                <p class="feature-description">
                    Sử dụng các chức năng đăng nhập, đăng ký, tìm kiếm dễ dàng với tốc độ xử lý tức thì
                </p>
                <div class="mt-3">
                    <span class="badge bg-info">Tốc độ cao</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="feature-title">Theo dõi thời gian thực</h3>
                <p class="feature-description">
                    Cập nhật trạng thái giao dịch và số dư tài khoản theo thời gian thực, minh bạch và chính xác
                </p>
                <div class="mt-3">
                    <span class="badge bg-warning">Live Updates</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="feature-title">Đa nền tảng</h3>
                <p class="feature-description">
                    Hỗ trợ trên mọi thiết bị với giao diện responsive, trải nghiệm nhất quán trên desktop và mobile
                </p>
                <div class="mt-3">
                    <span class="badge bg-primary">Cross-platform</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Transactions Section -->
    <div class="recent-section">
        <div class="section-header">
            <div class="section-title">
                <i class="fas fa-history"></i>
                Giao dịch gần đây
            </div>
            <a href="{{ route('explorer') }}" class="btn btn-sm btn-outline-primary">
                Xem tất cả <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
        <div id="recentTransactions">
            <!-- Transactions will be loaded here -->
            <div class="text-center py-4">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2 text-muted">Đang tải dữ liệu...</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Mock data for demonstration
    const mockStats = {
        totalBlocks: 12456,
        totalTransactions: 89432,
        totalVolume: '2.5B',
        activeUsers: 1234
    };

    const mockTransactions = [
        {
            hash: '0x8f5a1c3b9e2d4f6a7b8c9d0e1f2a3b4c5d6e7f8a9b0c1d2e3f4a5b6c7d8e9f0a',
            type: 'transfer',
            amount: 1500000,
            from: '0x742d35Cc6634C0532925a3b844Bc9e7598Fc1eB9',
            to: '0xAb5801a7D398351b8bE11C439e05C5B3259aeC9B',
            timestamp: '2024-01-15 10:30:25',
            status: 'success'
        },
        {
            hash: '0x9e2d4f6a7b8c9d0e1f2a3b4c5d6e7f8a9b0c1d2e3f4a5b6c7d8e9f0a1b2c3d',
            type: 'transfer',
            amount: 2500000,
            from: '0xAb5801a7D398351b8bE11C439e05C5B3259aeC9B',
            to: '0x742d35Cc6634C0532925a3b844Bc9e7598Fc1eB9',
            timestamp: '2024-01-15 10:35:42',
            status: 'success'
        },
        {
            hash: '0x1a2b3c4d5e6f7a8b9c0d1e2f3a4b5c6d7e8f9a0b1c2d3e4f5a6b7c8d9e0f1a2',
            type: 'contract',
            amount: 5000000,
            from: '0x742d35Cc6634C0532925a3b844Bc9e7598Fc1eB9',
            to: 'Smart Contract',
            timestamp: '2024-01-15 10:42:18',
            status: 'pending'
        },
        {
            hash: '0xb2c3d4e5f6a7b8c9d0e1f2a3b4c5d6e7f8a9b0c1d2e3f4a5b6c7d8e9f0a1b2',
            type: 'transfer',
            amount: 800000,
            from: '0xAb5801a7D398351b8bE11C439e05C5B3259aeC9B',
            to: '0x742d35Cc6634C0532925a3b844Bc9e7598Fc1eB9',
            timestamp: '2024-01-15 10:48:03',
            status: 'success'
        }
    ];

    // Update statistics
    function updateStats() {
        document.getElementById('totalBlocks').textContent = mockStats.totalBlocks.toLocaleString();
        document.getElementById('totalTransactions').textContent = mockStats.totalTransactions.toLocaleString();
        document.getElementById('totalVolume').textContent = mockStats.totalVolume;
        document.getElementById('activeUsers').textContent = mockStats.activeUsers.toLocaleString();
        
        // Animate numbers
        animateNumber('totalBlocks', 0, mockStats.totalBlocks, 1000);
        animateNumber('totalTransactions', 0, mockStats.totalTransactions, 1000);
    }

    function animateNumber(elementId, start, end, duration) {
        const element = document.getElementById(elementId);
        const range = end - start;
        const increment = range / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= end) {
                clearInterval(timer);
                current = end;
            }
            element.textContent = Math.floor(current).toLocaleString();
        }, 16);
    }

    // Format amount
    function formatAmount(amount) {
        return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
    }

    // Truncate hash
    function truncateHash(hash) {
        if (!hash) return '';
        if (hash.length <= 20) return hash;
        return hash.substring(0, 10) + '...' + hash.substring(hash.length - 8);
    }

    // Format time
    function formatTime(timestamp) {
        const date = new Date(timestamp);
        const now = new Date();
        const diff = Math.floor((now - date) / 1000);
        
        if (diff < 60) return `${diff} giây trước`;
        if (diff < 3600) return `${Math.floor(diff / 60)} phút trước`;
        if (diff < 86400) return `${Math.floor(diff / 3600)} giờ trước`;
        return date.toLocaleDateString('vi-VN');
    }

    // Render transactions
    function renderTransactions(transactions) {
        const container = document.getElementById('recentTransactions');
        
        if (!transactions || transactions.length === 0) {
            container.innerHTML = `
                <div class="text-center py-4">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Chưa có giao dịch nào</p>
                </div>
            `;
            return;
        }
        
        container.innerHTML = transactions.map(tx => `
            <div class="transaction-item">
                <div class="transaction-info">
                    <div class="transaction-icon">
                        <i class="fas fa-${tx.type === 'contract' ? 'file-contract' : 'exchange-alt'}"></i>
                    </div>
                    <div class="transaction-details">
                        <div class="transaction-hash">
                            ${truncateHash(tx.hash)}
                            <button class="btn btn-sm btn-link p-0 ms-2" onclick="copyToClipboard('${tx.hash}')" style="font-size: 0.75rem;">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                        <div class="transaction-meta">
                            <i class="fas fa-user"></i> ${truncateHash(tx.from)} 
                            <i class="fas fa-arrow-right mx-1"></i> 
                            <i class="fas fa-user-check"></i> ${tx.type === 'contract' ? tx.to : truncateHash(tx.to)}
                        </div>
                    </div>
                </div>
                <div class="transaction-amount">
                    ${formatAmount(tx.amount)}
                </div>
                <div class="transaction-status status-${tx.status}">
                    ${tx.status === 'success' ? '<i class="fas fa-check-circle"></i> Thành công' : '<i class="fas fa-clock"></i> Đang xử lý'}
                </div>
                <div class="text-muted" style="font-size: 0.75rem; min-width: 100px;">
                    <i class="far fa-clock"></i> ${formatTime(tx.timestamp)}
                </div>
            </div>
        `).join('');
    }

    // Copy to clipboard
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showNotification('Đã sao chép!', 'success');
        }).catch(() => {
            showNotification('Không thể sao chép', 'error');
        });
    }

    // Show notification
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = 'toast-notification';
        notification.style.cssText = `
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: ${type === 'success' ? '#10b981' : '#ef4444'};
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            z-index: 9999;
            animation: slideInRight 0.3s ease-out;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        `;
        notification.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
            ${message}
        `;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideInRight 0.3s ease-out reverse';
            setTimeout(() => notification.remove(), 300);
        }, 2000);
    }

    // Initialize page
    document.addEventListener('DOMContentLoaded', () => {
        updateStats();
        
        // Simulate loading delay
        setTimeout(() => {
            renderTransactions(mockTransactions);
        }, 1000);
        
        // Auto refresh stats every 30 seconds
        setInterval(() => {
            // In real app, fetch new data here
            console.log('Refreshing data...');
        }, 30000);
    });
</script>

<!-- Add animation keyframes if not present -->
<style>
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
</style>
@endsection