<div class="card news shadow-none border-0 mb-4">
    <div class="card-body rounded">
        <div class="d-flex flex-column h-100 align-items-end">
            <img src="{{ asset($imgSource) }}" class="rounded w-100 mb-3" height="200" alt="{{ isset($imgDesc) ? $imgDesc : 'news-image' }}">
            <div class="p-2 mb-auto">
                <h3 class="card-title mb-2 w-100">{{ $newsTitle }}</h3>
                <p class="description pt-2 mb-auto">{{ $newsDesc }}</p>
            </div>

            <button type="button" class="btn btn-outline-secondary btn-redirect d-flex align-items-top gap-1">
                <i class="btn-icon ti ti-ad-2"></i>
                <span class="btn-text">LEARN MORE</span>
            </button>
        </div>
    </div>
</div>