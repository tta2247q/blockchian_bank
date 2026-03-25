@extends('layouts.app')

@section('content')       <style>
        :root {
            --gradient-start: #667eea;
            --gradient-end: #764ba2;
            --card-bg: rgba(255, 255, 255, 0.95);
            --shadow-sm: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
        }

        body {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            font-family: 'Segoe UI', 'Poppins', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            padding: 2rem 0;
        }

        /* Header Styles */
        .header-section {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .headline {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #fff 0%, #f0f0f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Stats Cards */
        .stats-container {
            margin-bottom: 3rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem;
            text-align: center;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            background: rgba(255, 255, 255, 0.2);
        }

        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Block Cards */
        .block-card {
            background: var(--card-bg);
            border: none;
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            backdrop-filter: blur(0);
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .block-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }

        .block-card .card-header {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            color: white;
            padding: 1rem 1.25rem;
            border: none;
        }

        .block-number {
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .block-number i {
            font-size: 1.1rem;
        }

        .block-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .card-body-custom {
            padding: 1.25rem;
        }

        .info-row {
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid #e9ecef;
        }

        .info-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .info-label {
            font-weight: 600;
            color: #495057;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-label i {
            color: var(--gradient-start);
            width: 20px;
        }

        .info-content {
            color: #212529;
            word-break: break-all;
            font-family: 'Courier New', monospace;
            font-size: 0.85rem;
            background: #f8f9fa;
            padding: 0.5rem;
            border-radius: 8px;
            margin-top: 0.25rem;
        }

        .hash-text {
            font-size: 0.8rem;
        }

        .card-footer-custom {
            background: #f8f9fa;
            padding: 0.75rem 1.25rem;
            border-top: 1px solid #e9ecef;
            font-size: 0.75rem;
            color: #6c757d;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .time-icon {
            margin-right: 0.25rem;
        }

        .copy-btn {
            background: none;
            border: none;
            color: var(--gradient-start);
            cursor: pointer;
            transition: all 0.2s;
            padding: 0.25rem 0.5rem;
            border-radius: 6px;
        }

        .copy-btn:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: scale(1.05);
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

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

        /* Loading Animation */
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .headline {
                font-size: 2rem;
            }
            
            .stat-number {
                font-size: 1.5rem;
            }
            
            body {
                padding: 1rem 0;
            }
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        /* Toast Notification */
        .toast-notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 14px;
            z-index: 1000;
            animation: slideInRight 0.3s ease-out;
            box-shadow: var(--shadow-sm);
        }

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
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header-section">
            <h1 class="headline">
                <i class="fas fa-link"></i> Blockchain Explorer
            </h1>
            <p class="subtitle">
                <i class="fas fa-chart-line"></i> Xem chi tiết các block mới nhất và trạng thái chuỗi
            </p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-container">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-cubes"></i>
                        </div>
                        <div class="stat-number" id="totalBlocks">0</div>
                        <div class="stat-label">Tổng số Blocks</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-number" id="latestBlock">0</div>
                        <div class="stat-label">Block mới nhất</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <div class="stat-number" id="totalData">0</div>
                        <div class="stat-label">Tổng dữ liệu (KB)</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blocks Grid -->
        <div class="row" id="blocksContainer">
            <!-- Blocks will be dynamically inserted here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mock data for demonstration
        const blocksData = [
            {
                block_index: 1,
                data: "Genesis Block - Khởi tạo chuỗi khối",
                hash: "0000a1b2c3d4e5f67890abcdef1234567890abcdef1234567890abcdef1234",
                previous_hash: "0000000000000000000000000000000000000000000000000000000000000000",
                created_at: "2024-01-15 10:30:25"
            },
            {
                block_index: 2,
                data: "Giao dịch: Chuyển 50 BTC từ Alice sang Bob",
                hash: "0000b2c3d4e5f67890abcdef1234567890abcdef1234567890abcdef12345",
                previous_hash: "0000a1b2c3d4e5f67890abcdef1234567890abcdef1234567890abcdef1234",
                created_at: "2024-01-15 10:35:42"
            },
            {
                block_index: 3,
                data: "Smart Contract: Deploy hợp đồng thông minh",
                hash: "0000c3d4e5f67890abcdef1234567890abcdef1234567890abcdef123456",
                previous_hash: "0000b2c3d4e5f67890abcdef1234567890abcdef1234567890abcdef12345",
                created_at: "2024-01-15 10:42:18"
            },
            {
                block_index: 4,
                data: "Giao dịch: Chuyển 100 ETH cho dự án DeFi",
                hash: "0000d4e5f67890abcdef1234567890abcdef1234567890abcdef1234567",
                previous_hash: "0000c3d4e5f67890abcdef1234567890abcdef1234567890abcdef123456",
                created_at: "2024-01-15 10:48:03"
            },
            {
                block_index: 5,
                data: "NFT Mint: 1000 token không thể thay thế",
                hash: "0000e5f67890abcdef1234567890abcdef1234567890abcdef12345678",
                previous_hash: "0000d4e5f67890abcdef1234567890abcdef1234567890abcdef1234567",
                created_at: "2024-01-15 10:55:37"
            },
            {
                block_index: 6,
                data: "Cập nhật validator set - 5 node mới tham gia",
                hash: "0000f67890abcdef1234567890abcdef1234567890abcdef123456789",
                previous_hash: "0000e5f67890abcdef1234567890abcdef1234567890abcdef12345678",
                created_at: "2024-01-15 11:02:14"
            }
        ];

        // Format date
        function formatDate(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const diff = Math.floor((now - date) / 1000);
            
            if (diff < 60) return `${diff} giây trước`;
            if (diff < 3600) return `${Math.floor(diff / 60)} phút trước`;
            if (diff < 86400) return `${Math.floor(diff / 3600)} giờ trước`;
            return date.toLocaleDateString('vi-VN') + ' ' + date.toLocaleTimeString('vi-VN');
        }

        // Truncate text
        function truncateText(text, length = 20) {
            if (text.length <= length) return text;
            return text.substring(0, length) + '...';
        }

        // Copy to clipboard
        function copyToClipboard(text, element) {
            navigator.clipboard.writeText(text).then(() => {
                showToast('Đã sao chép!', 'success');
                
                // Visual feedback on button
                const originalHTML = element.innerHTML;
                element.innerHTML = '<i class="fas fa-check"></i>';
                setTimeout(() => {
                    element.innerHTML = originalHTML;
                }, 1500);
            }).catch(() => {
                showToast('Không thể sao chép', 'error');
            });
        }

        // Show toast notification
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = 'toast-notification';
            toast.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
                ${message}
            `;
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.animation = 'slideInRight 0.3s ease-out reverse';
                setTimeout(() => toast.remove(), 300);
            }, 2000);
        }

        // Render blocks
        function renderBlocks(blocks) {
            const container = document.getElementById('blocksContainer');
            container.innerHTML = '';
            
            blocks.forEach((block, index) => {
                const delay = index * 0.05;
                const card = document.createElement('div');
                card.className = 'col-md-6 col-lg-4 mb-4';
                card.style.animationDelay = `${delay}s`;
                
                card.innerHTML = `
                    <div class="block-card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="block-number">
                                    <i class="fas fa-cube"></i>
                                    Block #${block.block_index}
                                </div>
                                <span class="block-badge">
                                    <i class="fas fa-fingerprint"></i> ${truncateText(block.hash, 8)}
                                </span>
                            </div>
                        </div>
                        <div class="card-body-custom">
                            <div class="info-row">
                                <div class="info-label">
                                    <i class="fas fa-database"></i>
                                    Dữ liệu
                                </div>
                                <div class="info-content">
                                    ${escapeHtml(block.data)}
                                </div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">
                                    <i class="fas fa-hashtag"></i>
                                    Block Hash
                                    <button class="copy-btn ms-auto" onclick="copyToClipboard('${block.hash}', this)">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <div class="info-content hash-text">
                                    ${block.hash}
                                </div>
                            </div>
                            <div class="info-row">
                                <div class="info-label">
                                    <i class="fas fa-link"></i>
                                    Previous Hash
                                    <button class="copy-btn ms-auto" onclick="copyToClipboard('${block.previous_hash}', this)">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <div class="info-content hash-text">
                                    ${block.previous_hash === '0000000000000000000000000000000000000000000000000000000000000000' 
                                        ? '<span class="text-muted">Genesis Block</span>' 
                                        : block.previous_hash}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer-custom">
                            <div>
                                <i class="far fa-clock time-icon"></i>
                                ${formatDate(block.created_at)}
                            </div>
                            <div>
                                <i class="fas fa-check-circle text-success"></i>
                                <span class="text-success">Xác nhận</span>
                            </div>
                        </div>
                    </div>
                `;
                
                container.appendChild(card);
            });
        }

        // Escape HTML to prevent XSS
        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        // Update statistics
        function updateStatistics(blocks) {
            const totalBlocks = blocks.length;
            const latestBlock = blocks[blocks.length - 1].block_index;
            const totalDataSize = blocks.reduce((sum, block) => sum + (block.data.length || 0), 0);
            const totalKB = (totalDataSize / 1024).toFixed(2);
            
            document.getElementById('totalBlocks').textContent = totalBlocks;
            document.getElementById('latestBlock').textContent = latestBlock;
            document.getElementById('totalData').textContent = totalKB;
        }

        // Initialize page
        function init() {
            renderBlocks(blocksData);
            updateStatistics(blocksData);
            
            // Add refresh button to header
            const headerSection = document.querySelector('.header-section');
            const refreshBtn = document.createElement('button');
            refreshBtn.className = 'btn btn-light mt-3';
            refreshBtn.innerHTML = '<i class="fas fa-sync-alt"></i> Làm mới dữ liệu';
            refreshBtn.style.borderRadius = '25px';
            refreshBtn.style.padding = '0.5rem 1.5rem';
            refreshBtn.style.fontWeight = '500';
            refreshBtn.onclick = () => {
                refreshBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang làm mới...';
                setTimeout(() => {
                    refreshBtn.innerHTML = '<i class="fas fa-sync-alt"></i> Làm mới dữ liệu';
                    showToast('Đã cập nhật dữ liệu mới nhất!', 'success');
                }, 1000);
            };
            headerSection.appendChild(refreshBtn);
        }

        // Start the application
        init();
    </script>
@endsection