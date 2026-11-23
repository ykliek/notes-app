@php($note = $note ?? null)
<fieldset class="fieldset">
    <legend class="fieldset-legend">Заголовок</legend>
    <input id="title" name="title" value="{{ old('title', $note?->title) }}"
           class="input w-full @error('title') input-error @enderror" placeholder="Коротко про нотатку">
    <x-error name="title" />
</fieldset>

<fieldset class="fieldset">
    <legend class="fieldset-legend">Текст</legend>
    <textarea id="description" name="description" rows="5"
              class="textarea w-full @error('description') textarea-error @enderror"
              placeholder="Що потрібно запам'ятати?">{{ old('description', $note?->description) }}</textarea>
    <x-error name="description" />
</fieldset>

<div class="grid gap-4 sm:grid-cols-2">
    <fieldset class="fieldset">
        <legend class="fieldset-legend">Статус</legend>
        <select id="status" name="status" class="select w-full @error('status') select-error @enderror">
            @foreach (\App\Models\Note::STATUSES as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $note?->status ?? 'pending') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        <x-error name="status" />
    </fieldset>

    <fieldset class="fieldset">
        <legend class="fieldset-legend">Термін виконання</legend>
        <input type="date" id="due_date" name="due_date"
               value="{{ old('due_date', $note?->due_date?->format('Y-m-d')) }}"
               class="input w-full @error('due_date') input-error @enderror">
        <x-error name="due_date" />
    </fieldset>
</div>
