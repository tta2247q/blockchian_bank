@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-gradient text-white">
                    <h4 class="mb-0">Chi tiết giao dịch</h4>
                </div>
                <div class="card-body">
                    <p><strong>Block index:</strong> {{ $block->block_index }}</p>
                    <p><strong>Hash:</strong> <code>{{ $block->hash }}</code></p>
                    <p><strong>Previous hash:</strong> <code>{{ $block->previous_hash }}</code></p>
                    <p><strong>Nội dung data:</strong></p>
                    <pre class="p-3 bg-light rounded">{{ $block->data }}</pre>
                    <p><strong>Thời gian tạo:</strong> {{ $block->created_at }}</p>
                    <a href="{{ route('explorer') }}" class="btn btn-outline-primary">Quay lại Explorer</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection