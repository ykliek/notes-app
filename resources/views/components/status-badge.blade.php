@props(['status'])
@php
    $classes = [
        'pending' => 'badge-warning',
        'in_progress' => 'badge-info',
        'done' => 'badge-success',
    ];
@endphp
<span {{ $attributes->merge(['class' => 'badge badge-soft '.($classes[$status] ?? 'badge-neutral')]) }}>
    {{ \App\Models\Note::STATUSES[$status] ?? $status }}
</span>
