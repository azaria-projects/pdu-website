<div class="d-flex align-items-center">
    <i class="icon-admin ti {{ isset($icon) ? $icon : 'ti-question-mark' }} pe-3 d-none"></i>
    <div class="d-flex flex-column">
        <h2 class="header-admin">{{ isset($header) ? $header : 'No Header' }}</h2>
        <small class="subheader-admin">{{ isset($subheader) ? $subheader : 'no subheader' }}</small>
    </div>
</div>