<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new post') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <form wire:submit.prevent="save">
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="username" class="block text-sm/6 font-medium text-gray-900">
                                    <h2 class="text-base/7 font-semibold text-gray-900">Title</h2>

                                </label>
                                <div class="flex space-x-4">
                                    <!-- Primer formulario -->
                                    <div class="mt-2 flex-1">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="username" id="username" autocomplete="username"
                                                wire:model="title"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                                                placeholder="Your title">
                                        </div>
                                        @error('title')
                                            <p class="text-red-500 text-m">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="flex space-x-3 mt-6">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 ...">
                                        <select name="category" id="category1" wire:model="category1"
                                            class="block flex-1 ...">
                                            <option value="" disabled selected>Choose a category</option>
                                            @foreach ($this->categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 ...">
                                        <select name="category" id="category2" wire:model="category2"
                                            class="block flex-1 ...">
                                            <option value="" disabled selected>Choose a category</option>
                                            @foreach ($this->categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 ...">
                                        <select name="category" id="category3" wire:model="category3"
                                            class="block flex-1 ...">
                                            <option value="" disabled selected>Choose a category</option>
                                            @foreach ($this->categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="about" class="block text-sm/6 font-medium text-gray-900">About</label>
                                <div class="mt-2">
                                    <textarea id="about" name="about" rows="3" wire:model="content"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                                    @error('content')
                                        <p class="text-red-500 text-m">{{ $message }}</p>
                                    @enderror
                                </div>
                                <p class="mt-3 text-sm/6 text-gray-600">Write here your content!</p>
                            </div>
                            <div class="col-span-full">
                                <label for="cover-photo" class="block text-sm/6 font-medium text-gray-900">Cover
                                    photo</label>
                                <div
                                    class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                    <div class="text-center">
                                        <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <div class="mt-4 flex text-sm/6 text-gray-600">
                                            <label for="file-upload"
                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" name="image" type="file" class="sr-only"
                                                    wire:model="image">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <form>
                        <button type=button" wire:click="cancel()"
                            class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 border-b-4 border-red-700 hover:border-red-500 rounded">
                            Cancel
                        </button>
                    </form>
                    <form>
                        <button type="button" wire:click="save()"
                            class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">
                            Save
                        </button>
                    </form>

                </div>
            </form>

        </div>
    </div>

</div>
