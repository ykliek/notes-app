@php($note = $note ?? null)
<p>
    <label for="title">Заголовок</label><br>
    <input id="title" name="title" value="{{ old('title', $note?->title) }}" style="width:100%;padding:8px">
    <x-error name="title" />
</p>
<p>
    <label for="description">Текст</label><br>
    <textarea id="description" name="description">{{ old('description', $note?->description) }}</textarea>
    <x-error name="description" />
</p>
<p>
    <label for="status">Статус</label><br>
    <select id="status" name="status" style="padding:6px">
        @foreach (\App\Models\Note::STATUSES as $value => $label)
            <option value="{{ $value }}" @selected(old('status', $note?->status ?? 'pending') === $value)>{{ $label }}</option>
        @endforeach
    </select>
    <x-error name="status" />
</p>
<p>
    <label for="due_date">Термін виконання</label><br>
    <input type="date" id="due_date" name="due_date" value="{{ old('due_date', $note?->due_date?->format('Y-m-d')) }}" style="padding:6px">
    <x-error name="due_date" />
</p>
