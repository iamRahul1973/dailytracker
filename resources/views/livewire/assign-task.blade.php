<form wire:submit.prevent="save">
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="mb-4">
            <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">Assign Task</h3>
        </div>
        <div class="flex space-x-4 mb-4">
            <div class="w-1/2">
                <label class="mb-2 block text-sm" for="project">Project</label>
                <select
                    class="form-select rounded-lg w-full border-gray-300 text-sm text-gray-700"
                    id="project"
                    wire:model="project"
                >
                    <option value="">Select a Project</option>
                    @foreach ($projectList as $project)
                        <option value="{{ $project->id }}">{{ str($project->name)->headline() }}</option>
                    @endforeach
                </select>
                @error('project')
                    <p class="text-red-500 text-sm pt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-1/2">
                <label class="mb-2 block text-sm" for="task">Task</label>
                <select
                    class="form-select rounded-lg w-full border-gray-300 text-sm text-gray-700"
                    id="task"
                    wire:model="task"
                >
                    <option value="">Select a Task</option>
                    @isset($taskList)
                        @foreach ($taskList as $task)
                            <option value="{{ $task->id }}">{{ str($task->name)->headline() }}</option>
                        @endforeach
                    @endisset
                </select>
                @error('task')
                    <p class="text-red-500 text-sm pt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex space-x-4">
            <div class="w-1/2">
                <label for="date" class="mb-2 block text-sm">Date</label>
                <input
                    type="date"
                    name="date"
                    id="date"
                    min="1"
                    class="form-input rounded-lg w-full border-gray-300 text-gray-700"
                    wire:model="date"
                />
                @error('date')
                    <p class="text-red-500 text-sm pt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-1/2">
                <label class="mb-2 block text-sm" for="project">Employee</label>
                <select
                    class="form-select rounded-lg w-full border-gray-300 text-sm text-gray-700"
                    id="developer"
                    wire:model="developer"
                >
                    <option value="">Select a Developer</option>
                    @foreach ($developerList as $developer)
                        <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                    @endforeach
                </select>
                @error('developer')
                    <p class="text-red-500 text-sm pt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <label for="note" class="mb-2 block text-sm">Note</label>
            <textarea
                name="note"
                id="note"
                class="form-textarea rounded-lg w-full border-gray-300 text-sm text-gray-700"
                wire:model="note"
            ></textarea>
            @error('note')
                <p class="text-red-500 text-sm pt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button
            type="submit"
            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm disabled:opacity-75"
            wire:loading.attr="disabled"
        >
            Save
            <svg
                wire:loading
                aria-hidden="true"
                class="mr-2 ml-2 w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                viewBox="0 0 100 101"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
        </button>
        <button
            type="button"
            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
            @click="showAssignTask = false"
        >
            Cancel
        </button>
    </div>
</form>
