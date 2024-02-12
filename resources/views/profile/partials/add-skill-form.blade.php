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
<form action="{{ route('profile.updateSkills') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mt-1 relative">
        <select id="select-state" name="skills[]" multiple
            class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:border-blue-500 focus:shadow-outline"
            placeholder="Select a Skill..." autocomplete="off">
            @foreach ($skills as $skill)
                <option value="{{ $skill->id }}"{{ in_array($skill->id,$user->skills->pluck('id')->toArray()) ? ' selected' : '' }}>
                    {{ $skill->name }}</option>
            @endforeach

        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-900">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 13.707a1 1 0 0 1-1.414-1.414l3-3a1 1 0 0 1 1.414 1.414l-3 3z" />
            </svg>
        </div>
    </div>

    <div class="flex items-center mt-8 " style="margin-top: 2rem;">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
        @endif
    </div>

</form>

<script>
    new TomSelect("#select-state", {
        maxItems: 10
    });
</script>
