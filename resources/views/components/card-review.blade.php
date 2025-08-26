<img src="{{ isset($reviewIcon) ? asset($reviewIcon) : '' }}" class="img-fluid mb-2" width="40" alt="{{ isset($reviewAlt) ? asset($reviewAlt) : 'no-data' }}">
<h3 class="review-name mb-0">{{ isset($reviewer) ? $reviewer : 'no data' }}</h3>
<small class="review-role">{{ isset($reviewRole) ? $reviewRole : 'no role' }}</small>
<p class="review-desc mt-3"><i>"{{ isset($review) ? $review : 'no review' }}"</i></p>