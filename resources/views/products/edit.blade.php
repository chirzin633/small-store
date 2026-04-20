<x-app-layout>
    <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex mt-4">
            <h2 class="text-xl font-semibold">Edit Product</h2>
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/{{ $product->image }}' }">
            <form
                enctype="multipart/form-data"
                method="POST"
                action="{{ route('products.update', $product) }}"
                class="flex gap-8">
                @csrf
                @method ('PUT')

                <div class="w-1/2">
                    <img :src="imageUrl" class="rounded" />
                </div>
                <div class="w-1/2">
                    <div class="flex flex-col gap-4">
                        <div>
                            <x-input-label for="image" :value="__('Image Product')" />
                            <x-text-input
                                id="image"
                                class="block w-full p-2 mt-1 border"
                                type="file"
                                name="image"
                                accept="image/*"
                                :value="$product->image"
                                @change="imageUrl = URL.createObjectURL($event.target.files[0])" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="name" :value="__('Product Name')" />
                            <x-text-input
                                id="name"
                                class="block w-full mt-1"
                                type="text"
                                name="name"
                                :value="$product->name"
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
                                :value="$product->price"
                                x-mask:dynamic="$money($input, ',')"
                                required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-area id="description" class="block w-full mt-1" name="description">
                                {{ $product->description }}
                            </x-text-area>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <x-primary-button class="justify-center w-full"> {{ __('Submit') }} </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
