@php use App\Models\Category;use App\Models\City;use App\Models\Theme;use Illuminate\Contracts\Auth\MustVerifyEmail; @endphp
<section class="max-w-sm">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Publish artwork') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Publish your artwork on our site") }}
        </p>
    </header>

    <form method="post" action="{{ route('artworks.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf

        <div class="flex flex-col gap-y-1">
            <x-input-label for="title" :value="__('Product title')"/>
            <x-text-input id="title" name="title" type="text" :value="old('title')" autofocus required/>
            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="image" :value="__('Product image')"/>
            <x-text-input id="image" name="image" type="file" :value="old('image')"
                          class="text-sm text-gray-900 bg-gray-200 border border-gray-300 focus:outline-none focus:border-gray-300" required/>
            <x-input-error :messages="$errors->get('image')" class="mt-2"/>
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="category_id" :value="__('Category')"/>
            <x-select-input id="category_id" name="category_id" required>
                @foreach(Category::get() as $category)
                    <option value="{{ $category->id }}">{{__(ucfirst($category->name))}}</option>
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2"/>
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="theme_id" :value="__('Theme')"/>
            <x-select-input id="theme_id" name="theme_id" required>
                @foreach(Theme::get() as $theme)
                    <option value="{{ $theme->id }}">{{__(ucfirst($theme->name))}}</option>
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('theme_id')" class="mt-2"/>
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="price" :value="__('Product price')"/>
            <x-text-input id="price" name="price" type="text" :value="old('price')" required/>
            <x-input-error :messages="$errors->get('price')" class="mt-2"/>
        </div>

        <div class="flex flex-col gap-y-1">
            <x-input-label for="quantity" :value="__('Product quantity')"/>
            <x-text-input id="quantity" name="quantity" type="text" :value="old('quantity')" required/>
            <x-input-error :messages="$errors->get('quantity')" class="mt-2"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{__('Create')}}</x-primary-button>

            @if(session('status') === 'artwork-created')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-green-600">
                    {{__('Created')}}
                </p>
            @endif
        </div>
    </form>
</section>
