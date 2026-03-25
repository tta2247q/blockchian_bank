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
        --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
    }

    .search-container {
        background: linear-gradient(135deg, var(--primary-gradient-start) 0%, var(--primary-gradient-end) 100%);
        min-height: calc(100vh - 200px);
        padding: 2rem 0;
    }

    /* Search Hero Section */
    .search-hero {
        text-align: center;
        margin-bottom: 2rem;
        animation: fadeInDown 0.6s ease-out;
    }

    .search-icon {
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

    .search-icon i {
        font-size: 2.5rem;
        color: white;
    }

    .search-title {
        font-size: 2rem;
        font-weight: 800;
        color: white;
        margin-bottom: 0.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .search-subtitle {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
    }

    /* Search Card */
    .search-card {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 20px;
        box-shadow: var(--shadow-xl);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: fadeInUp 0.6s ease-out;
        border: none;
    }

    .search-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.25);
    }

    .card-header-custom {
        background: linear-gradient(135deg, var(--primary-gradient-start) 0%, var(--primary-gradient-end) 100%);
        padding: 1.5rem;
        border: none;
    }

    .card-header-custom h4 {
        margin: 0;
        color: white;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .card-header-custom h4 i {
        font-size: 1.25rem;
    }

    /* Search Input Group */
    .search-input-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .search-input-group .form-control {
        height: 55px;
        padding: 0.75rem 1rem 0.75rem 3rem;
        border: 2px solid #e5e7eb;
        border-radius: 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f9fafb;
    }

    .search-input-group .form-control:focus {
        outline: none;
        border-color: var(--primary-gradient-start);
        background: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .search-input-group i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        font-size: 1.1rem;
        pointer-events: none;
        transition: all 0.3s ease;
        z-index: 1;
    }

    .search-input-group .form-control:focus + i {
        color: var(--primary-gradient-start);
    }

    .btn-search {
        height: 55px;
        padding: 0 2rem;
        background: linear-gradient(135deg, var(--primary-gradient-start) 0%, var(--primary-gradient-end) 100%);
        color: white;
        border: none;
        border-radius: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-search:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    .btn-search:active {
        transform: translateY(0);
    }

    /* Filter Chips */
    .filter-section {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #e5e7eb;
    }

    .filter-label {
        font-size: 0.875rem;
        font-weight: 600;
        color: #6b7280;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .filter-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .filter-chip {
        padding: 0.5rem 1rem;
        background: #f3f4f6;
        border-radius: 12px;
        font-size: 0.875rem;
        cursor: pointer;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .filter-chip:hover {
        background: #e5e7eb;
        transform: translateY(-1px);
    }

    .filter-chip.active {
        background: linear-gradient(135deg, var(--primary-gradient-start) 0%, var(--primary-gradient-end) 100%);
        color: white;
        border-color: transparent;
    }

    /* Alert Messages */
    .alert-custom {
        border-radius: 15px;
        border: none;
        padding: 1rem 1.25rem;
        margin-top: 1.5rem;
        animation: slideInRight 0.3s ease-out;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .alert-info-custom {
        background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
        color: #0c4a6e;
        border-left: 4px solid var(--info-color);
    }

    .alert-warning-custom {
        background: linear-gradient(135deg, #fed7aa 0%, #fde68a 100%);
        color: #92400e;
        border-left: 4px solid var(--warning-color);
    }

    /* Search Results */
    .results-section {
        margin-top: 2rem;
        animation: fadeInUp 0.6s ease-out;
    }

    .result-stats {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        color: white;
    }

    .result-count {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .result-count i {
        margin-right: 0.5rem;
    }

    .view-toggle {
        display: flex;
        gap: 0.5rem;
    }

    .view-toggle button {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        color: white;
        transition: all 0.2s ease;
    }

    .view-toggle button.active {
        background: rgba(255, 255, 255, 0.3);
    }

    /* Result Cards */
    .result-card {
        background: white;
        border-radius: 15px;
        padding: 1.25rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        border-left: 4px solid var(--primary-gradient-start);
        box-shadow: var(--shadow-sm);
    }

    .result-card:hover {
        transform: translateX(5px);
        box-shadow: var(--shadow-md);
    }

    .result-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .result-type {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .type-block {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .type-transaction {
        background: linear-gradient(135deg, #f59e0b 0%, #ef4444 100%);
        color: white;
    }

    .result-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.75rem;
    }

    .result-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 0.75rem;
        margin-bottom: 0.75rem;
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }

    .detail-item i {
        color: var(--primary-gradient-start);
        width: 20px;
    }

    .detail-item .label {
        color: #6b7280;
        font-weight: 500;
    }

    .detail-item .value {
        color: #1f2937;
        font-family: monospace;
        word-break: break-all;
    }

    .result-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 0.75rem;
        padding-top: 0.75rem;
        border-top: 1px solid #e5e7eb;
        font-size: 0.75rem;
        color: #9ca3af;
    }

    .copy-btn {
        background: none;
        border: none;
        color: var(--primary-gradient-start);
        cursor: pointer;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        transition: all 0.2s;
    }

    .copy-btn:hover {
        background: rgba(102, 126, 234, 0.1);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem;
        background: white;
        border-radius: 15px;
    }

    .empty-state i {
        font-size: 4rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }

    .empty-state h5 {
        color: #6b7280;
        margin-bottom: 0.5rem;
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

    /* Responsive */
    @media (max-width: 768px) {
        .search-title {
            font-size: 1.5rem;
        }
        
        .btn-search {
            margin-top: 0.5rem;
            width: 100%;
        }
        
        .result-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .result-details {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="search-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <!-- Search Hero Section -->
                <div class="search-hero">
                    <div class="search-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h1 class="search-title">
                        Blockchain Explorer
                    </h1>
                    <p class="search-subtitle">
                        Tìm kiếm blocks, giao dịch và địa chỉ ví trên blockchain
                    </p>
                </div>

                <!-- Search Card -->
                <div class="search-card">
                    <div class="card-header-custom">
                        <h4>
                            <i class="fas fa-search"></i>
                            Tìm kiếm nâng cao
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form method="GET" action="{{ route('search') }}" id="searchForm">
                            <div class="search-input-group">
                                <input type="text" 
                                       name="q" 
                                       class="form-control" 
                                       value="{{ old('q', $q ?? '') }}" 
                                       placeholder="Nhập block index, hash, địa chỉ ví hoặc nội dung giao dịch..."
                                       id="searchInput">
                                <i class="fas fa-search"></i>
                                <button class="btn btn-search mt-2 mt-md-0 ms-md-2" type="submit" style="position: absolute; right: 0; top: 0; bottom: 0;">
                                    <i class="fas fa-arrow-right"></i> Tìm kiếm
                                </button>
                            </div>

                            <!-- Quick Filter Chips -->
                            <div class="filter-section">
                                <div class="filter-label">
                                    <i class="fas fa-filter"></i>
                                    Tìm nhanh:
                                </div>
                                <div class="filter-chips">
                                    <span class="filter-chip" data-filter="block">📦 Block</span>
                                    <span class="filter-chip" data-filter="transaction">💸 Giao dịch</span>
                                    <span class="filter-chip" data-filter="address">🏦 Địa chỉ</span>
                                    <span class="filter-chip" data-filter="hash">🔑 Hash</span>
                                </div>
                            </div>
                        </form>

                        <!-- Search Result Message -->
                        @if(isset($q) && $q)
                        <div class="alert-custom alert-info-custom">
                            <i class="fas fa-info-circle"></i>
                            <div>
                                <strong>Kết quả tìm kiếm cho từ khóa:</strong> 
                                <span class="fw-bold">{{ $q }}</span>
                                <br>
                                <small class="text-muted">Hiển thị kết quả demo - cần tích hợp backend để xử lý tìm kiếm thực tế</small>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Search Results -->
                @if(isset($q) && $q)
                <div class="results-section">
                    <div class="result-stats">
                        <div class="result-count">
                            <i class="fas fa-database"></i>
                            Tìm thấy <strong id="resultCount">0</strong> kết quả
                        </div>
                        <div class="view-toggle">
                            <button class="active" data-view="grid">
                                <i class="fas fa-th"></i>
                            </button>
                            <button data-view="list">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>

                    <div id="resultsContainer">
                        <!-- Results will be dynamically inserted here -->
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mock search data for demonstration
    const mockData = {
        blocks: [
            {
                type: 'block',
                index: 12345,
                hash: '0000a1b2c3d4e5f67890abcdef1234567890abcdef1234567890abcdef1234',
                timestamp: '2024-01-15 10:30:25',
                transactions: 156,
                miner: '0x742d35Cc6634C0532925a3b844Bc9e7598Fc1eB9'
            },
            {
                type: 'block',
                index: 12346,
                hash: '0000b2c3d4e5f67890abcdef1234567890abcdef1234567890abcdef12345',
                timestamp: '2024-01-15 10:35:42',
                transactions: 203,
                miner: '0x742d35Cc6634C0532925a3b844Bc9e7598Fc1eB9'
            }
        ],
        transactions: [
            {
                type: 'transaction',
                txHash: '0x8f5a1c3b9e2d4f6a7b8c9d0e1f2a3b4c5d6e7f8a9b0c1d2e3f4a5b6c7d8e9f0a',
                sender: '0x742d35Cc6634C0532925a3b844Bc9e7598Fc1eB9',
                receiver: '0xAb5801a7D398351b8bE11C439e05C5B3259aeC9B',
                amount: 1500000,
                timestamp: '2024-01-15 10:32:18',
                status: 'success'
            },
            {
                type: 'transaction',
                txHash: '0x9e2d4f6a7b8c9d0e1f2a3b4c5d6e7f8a9b0c1d2e3f4a5b6c7d8e9f0a1b2c3d',
                sender: '0xAb5801a7D398351b8bE11C439e05C5B3259aeC9B',
                receiver: '0x742d35Cc6634C0532925a3b844Bc9e7598Fc1eB9',
                amount: 2500000,
                timestamp: '2024-01-15 10:38:55',
                status: 'success'
            }
        ]
    };

    // Get search query from URL
    const urlParams = new URLSearchParams(window.location.search);
    const searchQuery = urlParams.get('q');
    
    if (searchQuery) {
        performSearch(searchQuery);
    }

    // Handle filter chips
    const filterChips = document.querySelectorAll('.filter-chip');
    filterChips.forEach(chip => {
        chip.addEventListener('click', function() {
            const filter = this.dataset.filter;
            const searchInput = document.getElementById('searchInput');
            
            // Update active state
            filterChips.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            
            // Set placeholder based on filter
            switch(filter) {
                case 'block':
                    searchInput.placeholder = 'Nhập block index (VD: 12345)';
                    break;
                case 'transaction':
                    searchInput.placeholder = 'Nhập mã giao dịch hoặc địa chỉ';
                    break;
                case 'address':
                    searchInput.placeholder = 'Nhập địa chỉ ví (VD: 0x742d...)';
                    break;
                case 'hash':
                    searchInput.placeholder = 'Nhập block hash';
                    break;
            }
        });
    });

    // Handle view toggle
    const viewButtons = document.querySelectorAll('.view-toggle button');
    viewButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            viewButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const view = this.dataset.view;
            const resultsContainer = document.getElementById('resultsContainer');
            if (resultsContainer) {
                resultsContainer.className = view === 'grid' ? 'row' : '';
                // Re-render with new view
                performSearch(searchQuery, view);
            }
        });
    });

    function performSearch(query, view = 'grid') {
        // Simulate search - in real app, this would be an AJAX call
        const results = [];
        
        // Search in blocks
        mockData.blocks.forEach(block => {
            if (block.hash.includes(query) || block.index.toString().includes(query) || block.miner.includes(query)) {
                results.push(block);
            }
        });
        
        // Search in transactions
        mockData.transactions.forEach(tx => {
            if (tx.txHash.includes(query) || tx.sender.includes(query) || tx.receiver.includes(query)) {
                results.push(tx);
            }
        });
        
        // Update result count
        const resultCountSpan = document.getElementById('resultCount');
        if (resultCountSpan) {
            resultCountSpan.textContent = results.length;
        }
        
        // Render results
        renderResults(results, view);
    }

    function renderResults(results, view) {
        const container = document.getElementById('resultsContainer');
        if (!container) return;
        
        if (results.length === 0) {
            container.innerHTML = `
                <div class="empty-state">
                    <i class="fas fa-search"></i>
                    <h5>Không tìm thấy kết quả</h5>
                    <p class="text-muted">Vui lòng thử lại với từ khóa khác</p>
                </div>
            `;
            return;
        }
        
        if (view === 'grid') {
            container.className = 'row';
            container.innerHTML = results.map(result => `
                <div class="col-md-6 mb-3">
                    <div class="result-card">
                        <div class="result-header">
                            <span class="result-type type-${result.type}">
                                <i class="fas fa-${result.type === 'block' ? 'cube' : 'exchange-alt'}"></i>
                                ${result.type === 'block' ? 'BLOCK' : 'GIAO DỊCH'}
                            </span>
                            <small class="text-muted">
                                <i class="far fa-clock"></i> ${result.timestamp}
                            </small>
                        </div>
                        <div class="result-title">
                            ${result.type === 'block' ? `Block #${result.index}` : `Giao dịch`}
                        </div>
                        <div class="result-details">
                            ${result.type === 'block' ? `
                                <div class="detail-item">
                                    <i class="fas fa-hashtag"></i>
                                    <span class="label">Hash:</span>
                                    <span class="value">${truncateHash(result.hash)}</span>
                                    <button class="copy-btn" onclick="copyToClipboard('${result.hash}')">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-exchange-alt"></i>
                                    <span class="label">Giao dịch:</span>
                                    <span class="value">${result.transactions}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-user"></i>
                                    <span class="label">Miner:</span>
                                    <span class="value">${truncateHash(result.miner)}</span>
                                </div>
                            ` : `
                                <div class="detail-item">
                                    <i class="fas fa-fingerprint"></i>
                                    <span class="label">TX Hash:</span>
                                    <span class="value">${truncateHash(result.txHash)}</span>
                                    <button class="copy-btn" onclick="copyToClipboard('${result.txHash}')">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-user"></i>
                                    <span class="label">Từ:</span>
                                    <span class="value">${truncateHash(result.sender)}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-user-check"></i>
                                    <span class="label">Đến:</span>
                                    <span class="value">${truncateHash(result.receiver)}</span>
                                </div>
                                <div class="detail-item">
                                    <i class="fas fa-coins"></i>
                                    <span class="label">Số tiền:</span>
                                    <span class="value fw-bold">${result.amount.toLocaleString()} VND</span>
                                </div>
                            `}
                        </div>
                        <div class="result-footer">
                            <span>
                                <i class="fas fa-check-circle text-success"></i>
                                Đã xác nhận
                            </span>
                            <span>
                                <i class="fas fa-link"></i>
                                Xem chi tiết
                            </span>
                        </div>
                    </div>
                </div>
            `).join('');
        } else {
            container.className = '';
            container.innerHTML = results.map(result => `
                <div class="result-card">
                    <div class="result-header">
                        <span class="result-type type-${result.type}">
                            <i class="fas fa-${result.type === 'block' ? 'cube' : 'exchange-alt'}"></i>
                            ${result.type === 'block' ? 'BLOCK' : 'GIAO DỊCH'}
                        </span>
                        <small class="text-muted">
                            <i class="far fa-clock"></i> ${result.timestamp}
                        </small>
                    </div>
                    <div class="result-title">
                        ${result.type === 'block' ? `Block #${result.index}` : `Giao dịch`}
                    </div>
                    <div class="result-details">
                        ${result.type === 'block' ? `
                            <div class="detail-item">
                                <i class="fas fa-hashtag"></i>
                                <span class="label">Hash:</span>
                                <span class="value">${result.hash}</span>
                                <button class="copy-btn" onclick="copyToClipboard('${result.hash}')">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-exchange-alt"></i>
                                <span class="label">Giao dịch:</span>
                                <span class="value">${result.transactions}</span>
                            </div>
                        ` : `
                            <div class="detail-item">
                                <i class="fas fa-fingerprint"></i>
                                <span class="label">TX Hash:</span>
                                <span class="value">${result.txHash}</span>
                                <button class="copy-btn" onclick="copyToClipboard('${result.txHash}')">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-user"></i>
                                <span class="label">Từ:</span>
                                <span class="value">${result.sender}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-user-check"></i>
                                <span class="label">Đến:</span>
                                <span class="value">${result.receiver}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-coins"></i>
                                <span class="label">Số tiền:</span>
                                <span class="value fw-bold">${result.amount.toLocaleString()} VND</span>
                            </div>
                        `}
                    </div>
                    <div class="result-footer">
                        <span>
                            <i class="fas fa-check-circle text-success"></i>
                            Đã xác nhận
                        </span>
                        <span>
                            <i class="fas fa-link"></i>
                            Xem chi tiết
                        </span>
                    </div>
                </div>
            `).join('');
        }
    }

    function truncateHash(hash) {
        if (!hash) return '';
        if (hash.length <= 20) return hash;
        return hash.substring(0, 12) + '...' + hash.substring(hash.length - 8);
    }

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Đã sao chép!', 'success');
        }).catch(() => {
            showToast('Không thể sao chép', 'error');
        });
    }

    function showToast(message, type) {
        const toast = document.createElement('div');
        toast.className = 'alert-custom alert-info-custom';
        toast.style.position = 'fixed';
        toast.style.bottom = '20px';
        toast.style.right = '20px';
        toast.style.zIndex = '9999';
        toast.style.minWidth = '200px';
        toast.style.animation = 'slideInRight 0.3s ease-out';
        toast.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
            <span>${message}</span>
        `;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.style.animation = 'slideInRight 0.3s ease-out reverse';
            setTimeout(() => toast.remove(), 300);
        }, 2000);
    }
});
</script>
@endsection