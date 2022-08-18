<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Trackersheet
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4" x-data>
                <button
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm"
                    @click="$dispatch('open-add-task-modal')"
                >
                    Add New Task
                </button>

                <button
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm"
                    @click="$dispatch('open-assign-task-modal')"
                >
                    Assign Task
                </button>
            </div>

            <livewire:status-filters />
            <livewire:trackersheet />
        </div>
    </div>

    <div
        x-data="{ showAssignTask : false }"
        x-show="showAssignTask"
        x-cloak
        @open-assign-task-modal.window="showAssignTask = true"
        @close-assign-task-modal.window="showAssignTask = false"
        @keydown.escape.window="showAssignTask = false"
        x-transition.opacity
        class="relative z-10"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
    >
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                    <livewire:assign-task />
                </div>
            </div>
        </div>
    </div>

    <div
        x-data="{ showAddTask : false }"
        x-show="showAddTask"
        @open-add-task-modal.window="showAddTask = true"
        @keydown.escape.window="showAddTask = false"
        x-transition.opacity
        class="relative z-10"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
        x-cloak
    >
        <!--
            Background backdrop, show/hide based on modal state.

            Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
            Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                <!--
                    Modal panel, show/hide based on modal state.

                    Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-4">
                            <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">Update Task</h3>
                        </div>
                        <div class="flex space-x-4 mb-4">
                            <div class="w-1/2">
                                <label class="mb-2 block text-sm" for="project">Project</label>
                                <select class="form-select rounded-lg w-full border-gray-300 text-sm text-gray-700" id="project">
                                    <option value="">Select a Project</option>
                                    <option value="1">Project One</option>
                                    <option value="2">Project Two</option>
                                </select>
                            </div>
                            <div class="w-1/2">
                                <label class="mb-2 block text-sm" for="task">Task</label>
                                <input type="text" name="task" id="task" class="form-input rounded-lg w-full border-gray-300 text-gray-700">
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-1/3">
                                <label for="estimated" class="mb-2 block text-sm">Estimated</label>
                                <input type="number" name="estimated" id="estimated" min="1" class="form-input rounded-lg w-full border-gray-300 text-gray-700">
                            </div>
                            <div class="w-1/3">
                                <label for="estimated" class="mb-2 block text-sm">Time Taken</label>
                                <input type="number" name="estimated" id="estimated" min="1" class="form-input rounded-lg w-full border-gray-300 text-gray-700">
                            </div>
                            <div class="w-1/3">
                                <label for="estimated" class="mb-2 block text-sm">Status</label>
                                <select class="form-select rounded-lg w-full border-gray-300 text-sm text-gray-700" id="project">
                                    <option value="1">In Progress</option>
                                    <option value="2">Hold</option>
                                    <option value="2">Completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="note" class="mb-2 block text-sm">Note</label>
                            <textarea name="note" id="note" class="form-textarea rounded-lg w-full border-gray-300 text-sm text-gray-700"></textarea>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Deactivate</button>
                        <button
                            type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            @click="showAddTask = false"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    {{-- Toastr --}}
    <div
        x-data="{
            show : false,
            type : 'info',
            message : 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
            get color() {
                switch (this.type) {
                    case 'success':
                        return 'green';
                        break;
                    case 'error':
                        return 'red';
                        break;
                    case 'warning':
                        return 'yellow';
                        break;
                    default:
                        return 'blue';
                        break;
                }
            }
        }"
        x-show="show"
        x-cloak
        x-transition.opacity
        @toastr.window="
            show = true;
            message = $event.detail.message;
            type = $event.detail.type;
            setTimeout(() => show = false, 2000)
        "
        class="fixed top-1 right-1 drop-shadow-lg px-6 pt-2 pb-3 rounded-md border-l-4 w-72"
        :class="`border-${color}-500 bg-${color}-300`"
    >
        <h4
            class="font-semibold pb-2"
            :class="`text-${color}-700`"
            x-text="type.toUpperCase()"
        ></h4>
        <p
            class="text-sm"
            :class="`text-${color}-500`"
            x-text="message"
        ></p>
        <span
            class="absolute top-1 right-2 cursor-pointer"
            @click="show = false"
        >
            &times;
        </span>
    </div>
</x-app-layout>
