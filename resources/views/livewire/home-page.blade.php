<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome to your Home Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($posts->isEmpty())
                    <div class="text-center">
                        <p class="text-2xl">You have no posts yet</p>
                @endif
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($posts as $post)
                            <div class="mb-6">
                                <!-- Envolver toda la carta con un enlace -->
                                <a href="{{ route('post.visualize', $post->id) }}" class="block">
                                    <!-- Carta individual con imagen de fondo -->
                                    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
                                        <!-- Imagen de fondo en la carta -->
                                        <div class="h-48 bg-cover rounded-t-lg"
                                            style="background-image: url('{{ asset('storage/' . $post->image) }}')"
                                            title="Post image"></div>

                                        <div class="p-4 flex flex-col" style="height: 400px;">

                                            <div class="text-gray-900 font-bold text-xl mb-2">{{ $post->title }}</div>

                                            <div class="text-gray-700 text-base flex-1 overflow-y-auto" style="max-height: 200px; overflow-wrap: break-word;">
                                                {{ $post->content }}
                                            </div>

                                            <div class="flex items-center mt-4 mb-4">
                                                <div class="text-sm">
                                                    <p class="text-gray-900 leading-none">{{ $post->user->name }}</p>
                                                    <p class="text-gray-600">{{ $post->created_at->format('M d, Y') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div>
                                                @foreach ($post->categories as $category)
                                                    <span
                                                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{ $category->name }}</span>
                                                @endforeach
                                            </div>

                                        </div>
                                        </button>
                                    </div>

                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
