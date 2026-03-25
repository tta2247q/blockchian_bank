@extends('layouts.app')

@section('content')   
 <style>
        :root {
            --primary-gradient-start: #667eea;
            --primary-gradient-end: #764ba2;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --card-bg: rgba(255, 255, 255, 0.98);
            --shadow-sm: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 20px 40px -12px rgba(0, 0, 0, 0.15);
            --shadow-xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        body {
            background: linear-gradient(135deg, var(--primary-gradient-start) 0%, var(--primary-gradient-end) 100%);
            font-family: 'Segoe UI', 'Poppins', system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            padding: 2rem 0;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="70" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="80" r="2" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            opacity: 0.3;
            pointer-events: none;
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% { transform: translate(0, 0); }
            100% { transform: translate(100px, 100px); }
        }

        .container {
            position: relative;
            z-index: 1;
        }

        /* Header Section */
        .header-section {
            text-align: center;
            margin-bottom: 2rem;
            animation: fadeInDown 0.8s ease-out;
        }

        .bank-logo {
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

        .bank-logo i {
            font-size: 3rem;
            color: white;
        }

        .headline {
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
        }

        /* Form Card */
        .form-card {
            background: var(--card-bg);
            border-radius: 30px;
            box-shadow: var(--shadow-xl);
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
            transition: transform 0.3s ease;
        }

        .form-card:hover {
            transform: translateY(-5px);
        }

        .card-header-custom {
            background: linear-gradient(135deg, var(--primary-gradient-start) 0%, var(--primary-gradient-end) 100%);
            padding: 2rem;
            text-align: center;
            color: white;
        }

        .card-header-custom h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .card-header-custom p {
            margin: 0.5rem 0 0;
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .form-body {
            padding: 2rem;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-label i {
            color: var(--primary-gradient-start);
            width: 20px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1rem;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 2.5rem;
            border: 2px solid #e5e7eb;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f9fafb;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-gradient-start);
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-control:hover:not(:focus) {
            border-color: #d1d5db;
            background: white;
        }

        /* Amount Input Special Styling */
        .amount-wrapper {
            position: relative;
        }

        .currency-symbol {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-weight: 600;
            pointer-events: none;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary-gradient-start) 0%, var(--primary-gradient-end) 100%);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 1rem;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-submit:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit i {
            margin-right: 0.5rem;
        }

        /* Info Cards */
        .info-section {
            margin-top: 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1rem;
            text-align: center;
            color: white;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .info-card:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.25);
        }

        .info-card i {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .info-card .label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .info-card .value {
            font-size: 1.1rem;
            font-weight: 700;
            margin-top: 0.25rem;
        }

        /* Alert Messages */
        .alert-message {
            padding: 1rem;
            border-radius: 15px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            animation: slideInRight 0.3s ease-out;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #065f46;
            border-left: 4px solid var(--success-color);
        }

        .alert-error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #991b1b;
            border-left: 4px solid var(--danger-color);
        }

        .alert-warning {
            background: linear-gradient(135deg, #fed7aa 0%, #fde68a 100%);
            color: #92400e;
            border-left: 4px solid var(--warning-color);
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

        /* Loading State */
        .btn-submit.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .btn-submit.loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-body {
                padding: 1.5rem;
            }
            
            .headline {
                font-size: 1.75rem;
            }
            
            .bank-logo {
                width: 60px;
                height: 60px;
            }
            
            .bank-logo i {
                font-size: 2rem;
            }
        }

        /* Tooltip */
        .tooltip-icon {
            margin-left: 0.5rem;
            cursor: help;
            color: #9ca3af;
            transition: color 0.3s ease;
        }

        .tooltip-icon:hover {
            color: var(--primary-gradient-start);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <!-- Header -->
                <div class="header-section">
                    <div class="bank-logo">
                        <i class="fas fa-university"></i>
                    </div>
                    <h1 class="headline">
                        <i class="fas fa-exchange-alt"></i> Blockchain Bank
                    </h1>
                    <p class="subtitle">
                        Giao dịch an toàn, minh bạch và bảo mật trên nền tảng blockchain
                    </p>
                </div>

                <!-- Form Card -->
                <div class="form-card">
                    <div class="card-header-custom">
                        <h3>
                            <i class="fas fa-plus-circle"></i> Tạo giao dịch mới
                        </h3>
                        <p>Nhập thông tin chi tiết để thực hiện giao dịch</p>
                    </div>
                    
                    <div class="form-body">
                        <!-- Alert Messages (will be shown dynamically) -->
                        <div id="alertContainer"></div>

                        <form method="POST" action="{{ route('transaction.store') }}" id="transactionForm" novalidate>
                            @csrf
                            
                            <!-- Sender Field -->
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-user-circle"></i>
                                    Người gửi
                                    <span class="tooltip-icon" data-tooltip="Địa chỉ ví blockchain của người gửi">
                                        <i class="fas fa-question-circle"></i>
                                    </span>
                                </label>
                                <div class="input-icon">
                                    <i class="fas fa-user"></i>
                                    <input type="text" 
                                           name="sender" 
                                           class="form-control" 
                                           placeholder="Nhập địa chỉ ví người gửi"
                                           autocomplete="off">
                                </div>
                                <small class="text-muted" style="font-size: 0.75rem; margin-top: 0.25rem; display: block;">
                                    <i class="fas fa-info-circle"></i> Ví dụ: 0x742d35Cc6634C0532925a3b844Bc9e7598Fc1eB9
                                </small>
                            </div>

                            <!-- Receiver Field -->
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-user-check"></i>
                                    Người nhận
                                </label>
                                <div class="input-icon">
                                    <i class="fas fa-user-plus"></i>
                                    <input type="text" 
                                           name="receiver" 
                                           class="form-control" 
                                           placeholder="Nhập địa chỉ ví người nhận"
                                           autocomplete="off">
                                </div>
                            </div>

                            <!-- Amount Field -->
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-coins"></i>
                                    Số tiền
                                </label>
                                <div class="amount-wrapper">
                                    <div class="input-icon">
                                        <i class="fas fa-dollar-sign"></i>
                                        <input type="text" 
                                               name="amount" 
                                               class="form-control" 
                                               placeholder="Nhập số tiền hoặc bất kỳ giá trị nào" 
                                               autocomplete="off">
                                    </div>
                                    <span class="currency-symbol">VND</span>
                                </div>
                                <small class="text-muted" style="font-size: 0.75rem; margin-top: 0.25rem; display: block;">
                                    <i class="fas fa-shield-alt"></i> Giao dịch được bảo mật bởi công nghệ blockchain
                                </small>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn-submit" id="submitBtn">
                                <i class="fas fa-paper-plane"></i>
                                Tạo giao dịch
                            </button>
                        </form>

                        <!-- Additional Info Cards -->
                        <div class="info-section">
                            <div class="info-card">
                                <i class="fas fa-bolt"></i>
                                <div class="label">Thời gian xử lý</div>
                                <div class="value">&lt; 5 giây</div>
                            </div>
                            <div class="info-card">
                                <i class="fas fa-shield-alt"></i>
                                <div class="label">Bảo mật</div>
                                <div class="value">End-to-End</div>
                            </div>
                            <div class="info-card">
                                <i class="fas fa-chart-line"></i>
                                <div class="label">Phí giao dịch</div>
                                <div class="value">0.001 VND</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form validation and enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('transactionForm');
            const submitBtn = document.getElementById('submitBtn');
            const senderInput = document.querySelector('input[name="sender"]');
            const receiverInput = document.querySelector('input[name="receiver"]');
            const amountInput = document.querySelector('input[name="amount"]');

            // Add input validation
            function validateAddress(address) {
                // Simple validation for wallet address (can be customized)
                return address.length >= 1;
            }

            function validateAmount(amount) {
                return amount > 0 && !isNaN(amount) && amount <= 1000000000;
            }

            function showAlert(message, type = 'error') {
                const alertContainer = document.getElementById('alertContainer');
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert-message alert-${type}`;
                
                let icon = 'fa-exclamation-circle';
                if (type === 'success') icon = 'fa-check-circle';
                if (type === 'warning') icon = 'fa-exclamation-triangle';
                
                alertDiv.innerHTML = `
                    <i class="fas ${icon}"></i>
                    <span>${message}</span>
                    <i class="fas fa-times ms-auto" style="cursor: pointer;" onclick="this.parentElement.remove()"></i>
                `;
                
                alertContainer.appendChild(alertDiv);
                
                // Auto remove after 5 seconds
                setTimeout(() => {
                    if (alertDiv.parentElement) {
                        alertDiv.style.animation = 'slideInRight 0.3s ease-out reverse';
                        setTimeout(() => alertDiv.remove(), 300);
                    }
                }, 5000);
            }

            // Real-time validation
            function validateForm() {
                let isValid = true;
                
                if (!validateAddress(senderInput.value)) {
                    senderInput.style.borderColor = '#ef4444';
                    isValid = false;
                } else {
                    senderInput.style.borderColor = '#10b981';
                }
                
                if (!validateAddress(receiverInput.value)) {
                    receiverInput.style.borderColor = '#ef4444';
                    isValid = false;
                } else {
                    receiverInput.style.borderColor = '#10b981';
                }
                
                if (!validateAmount(parseFloat(amountInput.value))) {
                    amountInput.style.borderColor = '#ef4444';
                    isValid = false;
                } else {
                    amountInput.style.borderColor = '#10b981';
                }
                
                return isValid;
            }

            // Add input event listeners
            [senderInput, receiverInput, amountInput].forEach(input => {
                input.addEventListener('input', () => {
                    validateForm();
                });
            });

            // Handle form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (!validateForm()) {
                    showAlert('Vui lòng kiểm tra lại thông tin giao dịch!', 'warning');
                    return;
                }
                
                // Show loading state
                submitBtn.classList.add('loading');
                const originalHtml = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang xử lý giao dịch...';
                
                // Simulate API call (replace with actual form submission)
                setTimeout(() => {
                    // Create transaction preview
                    const transaction = {
                        sender: senderInput.value,
                        receiver: receiverInput.value,
                        amount: parseFloat(amountInput.value),
                        timestamp: new Date().toISOString(),
                        transactionId: '0x' + Math.random().toString(36).substr(2, 40)
                    };
                    
                    // Store transaction in localStorage for demo
                    let transactions = JSON.parse(localStorage.getItem('blockchain_transactions') || '[]');
                    transactions.unshift(transaction);
                    localStorage.setItem('blockchain_transactions', JSON.stringify(transactions));
                    
                    // Show success message
                    showAlert(`
                        <strong>Giao dịch thành công!</strong><br>
                        Mã giao dịch: ${transaction.transactionId.substring(0, 16)}...<br>
                        Số tiền: ${transaction.amount.toLocaleString()} VND
                    `, 'success');
                    
                    // Reset form
                    form.reset();
                    
                    // Reset button
                    submitBtn.classList.remove('loading');
                    submitBtn.innerHTML = originalHtml;
                    
                    // Reset border colors
                    [senderInput, receiverInput, amountInput].forEach(input => {
                        input.style.borderColor = '#e5e7eb';
                    });
                    
                }, 1500);
            });

            // Add tooltip functionality
            const tooltips = document.querySelectorAll('.tooltip-icon');
            tooltips.forEach(tooltip => {
                tooltip.addEventListener('mouseenter', function(e) {
                    const message = this.getAttribute('data-tooltip');
                    const tooltipDiv = document.createElement('div');
                    tooltipDiv.className = 'custom-tooltip';
                    tooltipDiv.textContent = message;
                    tooltipDiv.style.position = 'absolute';
                    tooltipDiv.style.background = '#1f2937';
                    tooltipDiv.style.color = 'white';
                    tooltipDiv.style.padding = '0.5rem 1rem';
                    tooltipDiv.style.borderRadius = '8px';
                    tooltipDiv.style.fontSize = '0.875rem';
                    tooltipDiv.style.zIndex = '1000';
                    tooltipDiv.style.maxWidth = '250px';
                    tooltipDiv.style.whiteSpace = 'normal';
                    
                    const rect = this.getBoundingClientRect();
                    tooltipDiv.style.top = rect.bottom + 5 + 'px';
                    tooltipDiv.style.left = rect.left + 'px';
                    
                    document.body.appendChild(tooltipDiv);
                    
                    this.addEventListener('mouseleave', function() {
                        tooltipDiv.remove();
                    });
                });
            });
        });
        
        // Add CSS for custom tooltip
        const style = document.createElement('style');
        style.textContent = `
            .custom-tooltip {
                animation: fadeInUp 0.2s ease-out;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            }
        `;
        document.head.appendChild(style);
    </script>
@endsection