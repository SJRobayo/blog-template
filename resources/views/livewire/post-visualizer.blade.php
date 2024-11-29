<div class="max-w-screen-lg mx-auto p-5 sm:p-10 md:p-16">
    <div class=" rounded overflow-hidden flex flex-col mx-auto">

        <div class="relative">
            <a href="#">
                <div class="h-[500px] bg-center rounded-t-lg"
                    style="background-image: url('{{ asset('storage/' . $post->image) }}');
                    background-size: cover; background-repeat: no-repeat;"
                    title="Post image">
                </div>
            </a>
        </div>

        <!-- Título alineado con la imagen -->
        <a href="#"
            class="text-xl sm:text-4xl font-semibold inline-block hover:text-indigo-600 transition duration-500 ease-in-out mt-4">
            {{ $post->title }}
        </a>

        <p class="text-gray-700 py-5 text-base leading-8">
            {{ $post->content }}
        </p>

        <div class="py-5 text-sm font-regular text-gray-900 flex">
            <span class="mr-3 flex flex-row items-center">
                <svg class="text-indigo-600" fill="currentColor" height="13px" width="13px" version="1.1"
                    id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                    y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256
                               c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128
                               c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z"></path>
                        </g>
                    </g>
                </svg>
                <span class="ml-1">{{ $post->created_at }}</span></span>
            <a href="#" class="flex flex-row items-center hover:text-indigo-600">
                <svg class="text-indigo-600" fill="currentColor" height="16px" aria-hidden="true" role="img"
                    focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                    </path>
                    <path d="M0 0h24v24H0z" fill="none"></path>
                </svg>
                <span class="ml-1">{{ $post->user->name }}</span></a>
        </div>

        <hr>
    </div>

    <section class="py-6 relative">
        <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
            <div class="w-full flex-col justify-start items-start lg:gap-10 gap-6 inline-flex">
                <h2 class="text-gray-900 text-3xl font-bold font-manrope leading-normal">{{ $post->comments->count() }}
                    Comments</h2>
                <div class="w-full flex-col justify-start items-start lg:gap-9 gap-6 flex">
                    <div class="w-full relative flex justify-between gap-2">
                        <textarea wire:model="comment"
                            class="w-full py-3 px-5 rounded-lg border border-gray-300 bg-white shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] focus:outline-none text-gray-900 placeholder-gray-400 text-lg font-normal leading-relaxed resize-none overflow-hidden"
                            placeholder="Write comments here...." rows="1"
                            oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'"></textarea>
                        <button wire:click="postComment()" class="absolute right-6 bottom-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none">
                                <path
                                    d="M11.3011 8.69906L8.17808 11.8221M8.62402 12.5909L8.79264 12.8821C10.3882 15.638 11.1859 17.016 12.2575 16.9068C13.3291 16.7977 13.8326 15.2871 14.8397 12.2661L16.2842 7.93238C17.2041 5.17273 17.6641 3.79291 16.9357 3.06455C16.2073 2.33619 14.8275 2.79613 12.0679 3.71601L7.73416 5.16058C4.71311 6.16759 3.20259 6.6711 3.09342 7.7427C2.98425 8.81431 4.36221 9.61207 7.11813 11.2076L7.40938 11.3762C7.79182 11.5976 7.98303 11.7083 8.13747 11.8628C8.29191 12.0172 8.40261 12.2084 8.62402 12.5909Z"
                                    stroke="#111827" stroke-width="1.6" stroke-linecap="round" />
                            </svg>
                        </button>

                    </div>
                    @foreach ($post->comments as $comment)
                        <div class="w-full">

                            <div
                                class="w-full p-6 bg-white rounded-2xl border border-gray-200 flex-col justify-start items-start gap-8 flex">
                                <div class="w-full flex-col justify-center items-start gap-3.5 flex">
                                    <div class="w-full justify-between items-center inline-flex">
                                        <div class="justify-start items-center gap-2.5 flex">
                                            <div
                                                class="w-10 h-10 bg-gray-300 rounded-full justify-start items-start gap-2.5 flex">
                                                <img class="rounded-full object-cover"
                                                    src="https://pagedone.io/asset/uploads/1714988283.png"
                                                    alt="Jenny wilson image" />
                                            </div>
                                            <div class="flex-col justify-start items-start gap-1 inline-flex">
                                                <h5 class="text-gray-900 text-sm font-semibold leading-snug">
                                                    {{ $comment->user->name }}</h5>
                                                <h6 class="text-gray-500 text-xs font-normal leading-5">
                                                    {{ $comment->created_at }}</h6>
                                            </div>
                                        </div>
                                        <div class="w-6 h-6 relative">
                                            <div class="w-full h-fit flex">
                                                <div class="relative w-full">
                                                    <div class=" absolute left-0 top-0 py-2.5 px-4 text-gray-300"></div>
                                                    <button id="dropdown-button" data-target="dropdown-1"
                                                        class="w-full justify-center dropdown-toggle flex-shrink-0 z-10 flex items-center text-base font-medium text-center text-gray-900 bg-transparent  absolute right-0 top-0"
                                                        type="button">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path
                                                                d="M12.0161 16.9893V17.0393M12.0161 11.9756V12.0256M12.0161 6.96191V7.01191"
                                                                stroke="black" stroke-width="2.5"
                                                                stroke-linecap="round" />
                                                        </svg>
                                                    </button>
                                                    <div id="dropdown-1"
                                                        class="absolute top-10 right-0 z-20 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 open hidden">
                                                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                            aria-labelledby="dropdown-button">
                                                            <li>
                                                                <a href="#"
                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Save</a>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-800 text-sm font-normal leading-snug">{{ $comment->body }}</p>
                                </div>
                                <div class="w-full justify-between items-center inline-flex">
                                    <div class="justify-start items-center gap-4 flex">
                                        <div class="justify-start items-center gap-1.5 flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                wire:click="showReplies()" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M7.04962 9.99504L7 10M12 10L11.9504 10.005M17 10L16.9504 10.005M10.5 3H13.5C16.7875 3 18.4312 3 19.5376 3.90796C19.7401 4.07418 19.9258 4.25989 20.092 4.46243C21 5.56878 21 7.21252 21 10.5V12.4777C21 13.8941 21 14.6023 20.8226 15.1779C20.4329 16.4427 19.4427 17.4329 18.1779 17.8226C17.6023 18 16.8941 18 15.4777 18C15.0811 18 14.8828 18 14.6985 18.0349C14.2966 18.1109 13.9277 18.3083 13.6415 18.6005C13.5103 18.7345 13.4003 18.8995 13.1803 19.2295L13.1116 19.3326C12.779 19.8316 12.6126 20.081 12.409 20.198C12.1334 20.3564 11.7988 20.3743 11.5079 20.2462C11.2929 20.1515 11.101 19.9212 10.7171 19.4605L10.2896 18.9475C10.1037 18.7244 10.0108 18.6129 9.90791 18.5195C9.61025 18.2492 9.23801 18.0748 8.83977 18.0192C8.70218 18 8.55699 18 8.26662 18C7.08889 18 6.50002 18 6.01542 17.8769C4.59398 17.5159 3.48406 16.406 3.12307 14.9846C3 14.5 3 13.9111 3 12.7334V10.5C3 7.21252 3 5.56878 3.90796 4.46243C4.07418 4.25989 4.25989 4.07418 4.46243 3.90796C5.56878 3 7.21252 3 10.5 3Z"
                                                    stroke="black" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>

                                            <h5 class="text-gray-900 text-sm font-normal leading-snug">2 Replies</h5>
                                        </div>
                                        <div class="justify-start items-center gap-1.5 flex">
                                            <a href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M16 14C16 15.6569 14 17 12 17C10 17 8 15.6569 8 14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM10 9C10 9.55228 9.55228 10 9 10C8.44772 10 8 9.55228 8 9C8 8.44772 8.44772 8 9 8C9.55228 8 10 8.44772 10 9ZM16 9C16 9.55228 15.5523 10 15 10C14.4477 10 14 9.55228 14 9C14 8.44772 14.4477 8 15 8C15.5523 8 16 8.44772 16 9Z"
                                                        stroke="#111827" stroke-width="1.6" stroke-linecap="round" />
                                                </svg>
                                            </a>
                                            <h5 class="text-gray-900 text-sm font-normal leading-snug">Reactions</h5>
                                        </div>
                                    </div>
                                    <div class="justify-end items-center gap-1 flex">
                                        <h5 class="text-gray-500 text-sm font-normal leading-snug">30</h5>
                                    </div>
                                </div>

                            </div>
                            @if($this->commentReplies)
                            <div >
                                <div class="w-full relative flex justify-between gap-2 mt-4">
                                    <textarea wire:model="reply"
                                        class="w-full py-3 px-5 rounded-lg border border-gray-300 bg-white shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] focus:outline-none text-gray-900 placeholder-gray-400 text-lg font-normal leading-relaxed resize-none overflow-hidden"
                                        placeholder="Reply..." rows="1"
                                        oninput="this.style.height = ''; this.style.height = this.scrollHeight + 'px'"></textarea>
                                    <button wire:click="replyComment({{$comment->id}})" class="absolute right-6 bottom-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20" fill="none">
                                            <path
                                                d="M11.3011 8.69906L8.17808 11.8221M8.62402 12.5909L8.79264 12.8821C10.3882 15.638 11.1859 17.016 12.2575 16.9068C13.3291 16.7977 13.8326 15.2871 14.8397 12.2661L16.2842 7.93238C17.2041 5.17273 17.6641 3.79291 16.9357 3.06455C16.2073 2.33619 14.8275 2.79613 12.0679 3.71601L7.73416 5.16058C4.71311 6.16759 3.20259 6.6711 3.09342 7.7427C2.98425 8.81431 4.36221 9.61207 7.11813 11.2076L7.40938 11.3762C7.79182 11.5976 7.98303 11.7083 8.13747 11.8628C8.29191 12.0172 8.40261 12.2084 8.62402 12.5909Z"
                                                stroke="#111827" stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>

                                </div>
                                <div
                                    class="w-full lg:pl-60 md:pl-20 sm:pl-10 pl-7 flex-col justify-start items-end gap-2.5 flex mt-4">

                                    <div
                                        class="w-full p-6 bg-gray-50 rounded-2xl border border-gray-200 flex-col justify-start items-start gap-8 flex">
                                        <div class="w-full flex-col justify-center items-start gap-3.5 flex">
                                            <div class="w-full justify-between items-center inline-flex">
                                                <!-- Información del usuario que responde -->
                                                <div class="justify-start items-center gap-2.5 flex">
                                                    <div
                                                        class="w-10 h-10 bg-stone-300 rounded-full justify-start items-start gap-2.5 flex">
                                                        <img class="rounded-full object-cover"
                                                            src="https://pagedone.io/asset/uploads/1710225753.png"
                                                            alt="Kevin Patel image" />
                                                    </div>
                                                    <div class="flex-col justify-start items-start gap-1 inline-flex">
                                                        <h5 class="text-gray-900 text-sm font-semibold leading-snug">
                                                            Kevin Patel</h5>
                                                        <h6 class="text-gray-500 text-xs font-normal leading-5">60 mins
                                                            ago</h6>
                                                    </div>
                                                </div>

                                            </div>
                                            <p class="text-gray-800 text-sm font-normal leading-snug">Absolutely! I was
                                                amazed at how much they grew throughout the story. The way the author
                                                portrayed their struggles and triumphs was truly inspiring.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

</div>
