<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Trackersheet
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4" x-data>
                @can('add task')
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm"
                        @click="$dispatch('open-add-task-modal')"
                    >
                        Add New Task
                    </button>
                @endcan

                @can('assign task')
                    <button
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm"
                        @click="$dispatch('open-assign-task-modal')"
                    >
                        Assign Task
                    </button>
                @endcan
            </div>

            <livewire:status-filters />
            <livewire:trackersheet />
        </div>
    </div>

    @can('assign task')
        <div
            x-data="{ showAssignTask : false }"
            x-show="showAssignTask"
            x-cloak
            @open-assign-task-modal.window="showAssignTask = true"
            @close-assign-task-modal.window="showAssignTask = false"
            @keydown.escape.window="showAssignTask = false"
            class="relative z-10"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                x-show="showAssignTask"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            ></div>

            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                    <div
                        class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
                        x-show="showAssignTask"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <livewire:assign-task />
                    </div>
                </div>
            </div>
        </div>
    @endcan

    @can('add task')
        <div
            x-data="{ showAddTask : false }"
            x-show="showAddTask"
            @open-add-task-modal.window="showAddTask = true"
            @close-add-task-modal.window="showAddTask = false"
            @keydown.escape.window="showAddTask = false"
            class="relative z-10"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
            x-cloak
        >
            <div
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                x-show="showAddTask"
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            ></div>

            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                    <div
                        class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full"
                        x-show="showAddTask"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <livewire:add-task :projects="$projects" />
                    </div>
                </div>
            </div>
        </div>
    @endcan

    {{-- <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-6">
                            <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">
                                Cloud IMS - <span class="text-gray-400 text-sm">Forgot Password</span>
                            </h3>
                        </div>
                        <div class="flex space-x-4 mb-4">
                            <div class="w-1/2">
                                <label for="estimated" class="mb-2 block text-sm">Time Taken <span class="text-xs text-gray-500">(In Minutes)</span></label>
                                <input type="number" name="estimated" id="estimated" min="1" class="form-input rounded-lg w-full border-gray-300 text-gray-700">
                            </div>
                            <div class="w-1/2">
                                <label class="mb-2 block text-sm" for="task">Status</label>
                                <div class="relative">
                                    <ul class="text-sm h-0">
                                        <li class="text-white px-4 py-2 rounded-md font-semibold mt-2 bg-purple-700 flex justify-between">
                                            In Progress
                                            <svg
                                              aria-hidden="true"
                                              focusable="false"
                                              data-prefix="fas"
                                              data-icon="caret-down"
                                              class="w-2 ml-2"
                                              role="img"
                                              xmlns="http://www.w3.org/2000/svg"
                                              viewBox="0 0 320 512"
                                            >
                                              <path
                                                fill="currentColor"
                                                d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"
                                              ></path>
                                            </svg>
                                        </li>
                                        <li class="hidden text-white px-4 py-2 rounded-md font-semibold mt-2 bg-pink-700">Hold</li>
                                        <li class="hidden text-white px-4 py-2 rounded-md font-semibold mt-2 bg-red-700">Stuck</li>
                                        <li class="hidden text-white px-4 py-2 rounded-md font-semibold mt-2 bg-green-700">Completed</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="note" class="mb-2 block text-sm">Note</label>
                            <textarea name="note" id="note" class="form-textarea rounded-lg w-full border-gray-300 text-sm text-gray-700"></textarea>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Deactivate</button>
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @include('components.toastr')
</x-app-layout>
