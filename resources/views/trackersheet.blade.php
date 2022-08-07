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
                    >Add New Task</button>
            </div>

            <div
                x-data="{ dateFilter: false }"
                class="bg-indigo-600 shadow-sm sm:rounded-lg"
            >
                <div class="p-6 bg-indigo-600 text-white flex justify-between font-semibold">
                    <div class="cursor-pointer text-orange-400 border-b border-orange-500">Today</div>
                    <div class="cursor-pointer">This Week</div>
                    <div class="cursor-pointer">This Month</div>
                    <div
                        class="cursor-pointer relative transition duration-150 ease-in flex items-center"
                        x-data="{open : false}"
                        @click="open = ! open"
                    >
                        Previous Months
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <ul
                            x-show="open"
                            @click.outside="open = false"
                            x-transition
                            class="absolute w-44 bg-white rounded-xl py-3 md:ml-8 top-8 md:top-8 right-0 md:left-16 text-gray-800 pl-6 text-sm font-normal leading-8 drop-shadow-lg"
                        >
                            <li class="cursor-pointer">July 2022</li>
                            <li class="cursor-pointer">June 2022</li>
                            <li class="cursor-pointer">May 2022</li>
                            <li class="cursor-pointer">April 2022</li>
                            <li class="cursor-pointer">March 2022</li>
                            <li class="cursor-pointer">February 2022</li>
                        </ul>
                    </div>
                    <div
                        class="cursor-pointer flex items-center"
                        @click="dateFilter = ! dateFilter"
                    >
                        Custom Date Range
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="p-6" x-show="dateFilter" x-transition.height>
                    <div class="flex space-x-4 text-white border border-white p-6 rounded-md">
                        <div class="flex-1">
                            <label for="start_date" class="mb-2 text-sm block">Starts on</label>
                            <input type="date" class="form-input rounded-lg w-full border-gray-300 text-gray-700">
                        </div>
                        <div class="flex-1">
                            <label for="start_date" class="mb-2 text-sm block">Ends on</label>
                            <input type="date" class="form-input rounded-lg w-full border-gray-300 text-gray-700">
                        </div>
                        <div class="flex-none place-self-end">
                            <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-white text-base font-medium text-black hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Deactivate</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <table class="table-auto w-full text-sm border-separate border-spacing-y-3">
                    <thead class="text-lef">
                        <tr>
                            <th class="p-4 text-left">Project</th>
                            <th class="p-4 text-left">Owner</th>
                            <th class="p-4 text-left">Task</th>
                            <th class="p-4 text-left">Developer</th>
                            <th class="p-4 text-left">Estimated</th>
                            <th class="p-4 text-left">Time Taken</th>
                            <th class="p-4 text-left">Status</th>
                            <th class="p-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th colspan="8" class="text-left pb-4">
                                <span class="bg-orange-500 text-white px-3 py-2 rounded-lg">2011 July 28</span>
                            </th>
                        </tr>
                        <tr class="bg-white shadow-md">
                            <td class="px-4 py-2 text-left">Cloud IMS</td>
                            <td class="px-4 py-2 text-left">
                                <img src="https://source.unsplash.com/random/50x50?face" alt="avatar" class="rounded-full">
                            </td>
                            <td class="px-4 py-2 text-left">Forgot Password</td>
                            <td class="px-4 py-2 text-left">
                                <img src="https://source.unsplash.com/random/50x50?face" alt="avatar" class="mr-2 rounded-full">
                            </td>
                            <td class="px-4 py-2 text-left">4 Hrs</td>
                            <td class="px-4 py-2 text-left">6 Hrs</td>
                            <td class="px-4 py-2 text-left">
                                <span class="bg-pink-500 text-white px-2 py-1 rounded-md font-semibold text-xs">Hold</span>
                            </td>
                            <td class="px-4 py-2 text-right relative" x-data="{ showActions : false }">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 ml-auto cursor-pointer"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    @click="showActions = ! showActions"
                                >
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                                <ul
                                    x-show="showActions"
                                    x-transition
                                    @click.outside="showActions = false"
                                    class="bg-slate-100 rounded-lg border border-slate-200 w-40 drop-shadow-md text-left px-4 py-4 leading-6 absolute right-6"
                                >
                                    <li>Edit</li>
                                    <li>Update Progress</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="bg-white shadow-md">
                            <td class="px-4 py-2 text-left">Cloud IMS</td>
                            <td class="px-4 py-2 text-left">
                                <img src="https://source.unsplash.com/random/50x50?face" alt="avatar" class="rounded-full">
                            </td>
                            <td class="px-4 py-2 text-left">Forgot Password</td>
                            <td class="px-4 py-2 text-left">
                                <img src="https://source.unsplash.com/random/50x50?face" alt="avatar" class="mr-2 rounded-full">
                            </td>
                            <td class="px-4 py-2 text-left">4 Hrs</td>
                            <td class="px-4 py-2 text-left">6 Hrs</td>
                            <td class="px-4 py-2 text-left">
                                <span class="bg-green-500 text-white px-2 py-1 rounded-md font-semibold text-xs">Completed</span>
                            </td>
                            <td class="px-4 py-2 text-right">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </td>
                        </tr>
                        <tr class="bg-white shadow-md">
                            <td class="px-4 py-2 text-left">Cloud IMS</td>
                            <td class="px-4 py-2 text-left">
                                <img src="https://source.unsplash.com/random/50x50?face" alt="avatar" class="rounded-full">
                            </td>
                            <td class="px-4 py-2 text-left">Forgot Password</td>
                            <td class="px-4 py-2 text-left">
                                <img src="https://source.unsplash.com/random/50x50?face" alt="avatar" class="mr-2 rounded-full">
                            </td>
                            <td class="px-4 py-2 text-left">4 Hrs</td>
                            <td class="px-4 py-2 text-left">6 Hrs</td>
                            <td class="px-4 py-2 text-left">
                                <span class="bg-purple-500 text-white px-2 py-1 rounded-md font-semibold text-xs">In Progress</span>
                            </td>
                            <td class="px-4 py-2 text-right">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="7" class="text-left py-4">
                                <span class="bg-orange-500 text-white px-3 py-2 rounded-lg">2011 July 28</span>
                            </th>
                        </tr>
                        <tr class="bg-white shadow-md">
                            <td class="px-4 py-2 text-left">Cloud IMS</td>
                            <td class="px-4 py-2 text-left">
                                <img src="https://source.unsplash.com/random/50x50?face" alt="avatar" class="rounded-full">
                            </td>
                            <td class="px-4 py-2 text-left">Forgot Password</td>
                            <td class="px-4 py-2 text-left">
                                <img src="https://source.unsplash.com/random/50x50?face" alt="avatar" class="mr-2 rounded-full">
                            </td>
                            <td class="px-4 py-2 text-left">4 Hrs</td>
                            <td class="px-4 py-2 text-left">6 Hrs</td>
                            <td class="px-4 py-2 text-left" colspan="2">
                                <span class="bg-red-500 text-white px-2 py-1 rounded-md font-semibold text-xs">Stuck</span>
                            </td>
                        </tr>
                        <tr class="bg-white shadow-md">
                            <td class="px-4 py-2 text-left">Cloud IMS</td>
                            <td class="px-4 py-2 text-left">
                                <img src="https://source.unsplash.com/random/50x50?face" alt="avatar" class="rounded-full">
                            </td>
                            <td class="px-4 py-2 text-left">Forgot Password</td>
                            <td class="px-4 py-2 text-left">
                                <img src="https://source.unsplash.com/random/50x50?face" alt="avatar" class="mr-2 rounded-full">
                            </td>
                            <td class="px-4 py-2 text-left">4 Hrs</td>
                            <td class="px-4 py-2 text-left">6 Hrs</td>
                            <td class="px-4 py-2 text-left" colspan="2">
                                <span class="bg-gray-500 text-white px-2 py-1 rounded-md font-semibold text-xs">Not Started Yet</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div
        x-data="{ showAddTask : false }"
        x-show="showAddTask"
        @open-add-task-modal.window="showAddTask = true"
        x-transition.opacity
        class="relative z-10"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
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
</x-app-layout>
