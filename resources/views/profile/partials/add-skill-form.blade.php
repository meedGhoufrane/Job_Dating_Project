<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>


<header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ __('Skill s ') }}
    </h2>


</header>

<h2 class=" mt-6 text-gray-900 dark:text-gray-100">
    {{ __('Select ur Skill s ') }}
</h2>
<select id="select-state" name="state[]" multiple placeholder="Select a Skill..." autocomplete="off">
    @foreach ($skills as $skill)
        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
    @endforeach
</select>

<script>
    new TomSelect("#select-state", {
        maxItems: 10
    });
</script>
