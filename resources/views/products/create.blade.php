<x-app-layout>
    <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex mt-4">
            <h2 class="text-xl font-semibold">Create Product</h2>
        </div>

        <div class="mt-4">
            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                <div class="flex flex-col gap-4">
                    <div>
                        <x-input-label for="name" :value="__('Product Name')" />
                        <x-text-input
                            id="name"
                            class="block w-full mt-1"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input
                            id="price"
                            class="block w-full mt-1"
                            type="text"
                            name="price"
                            :value="old('price')"
                            required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-area id="description" class="block w-full mt-1" name="description">
                            {{ old('description') }}
                        </x-text-area>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <x-primary-button class="justify-center w-full"> {{ __('Submit') }} </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
