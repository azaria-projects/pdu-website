<div class="infinite-scroll-wrapper mt-4">
    <div class="infinite-scroll-left" id="scroll-track">
        @for ($i = 0; $i < 12; $i++)
            <div class="slide"><img src="{{ asset('icons/icon-pertamina.png') }}" alt="icon-pertamina"></div>
            <div class="slide"><img src="{{ asset('icons/icon-petrochina.png') }}" class="square" alt="icon-petrochina"></div>
        @endfor
    </div>
</div>

<div class="infinite-scroll-wrapper">
    <div class="infinite-scroll-right" id="scroll-track">
        @for ($i = 0; $i < 12; $i++)
            <div class="slide"><img src="{{ asset('icons/icon-pertamina.png') }}" alt="icon-pertamina"></div>
            <div class="slide"><img src="{{ asset('icons/icon-petrochina.png') }}" class="square" alt="icon-petrochina"></div>
        @endfor
    </div>
</div>