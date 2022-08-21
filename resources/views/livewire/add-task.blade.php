<form wire:submit.prevent="save">
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="mb-4">
            <h3 class="text-lg leading-6 font-semibold text-gray-900" id="modal-title">Add New Task</h3>
        </div>
        <div class="w-full mb-4">
            <label class="mb-2 block text-sm" for="task">Task</label>
            <input
                type="text"
                id="task"
                class="form-input rounded-lg w-full border-gray-300 text-gray-700"
                wire:model.defer="task.name"
            />
            @error('task')
                <p class="text-red-500 text-sm pt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex space-x-4">
            <div class="w-1/2">
                <label class="mb-2 block text-sm" for="project">Project</label>
                <select
                    class="form-select rounded-lg w-full border-gray-300 text-sm text-gray-700"
                    id="project"
                    wire:model.defer="task.project_id"
                >
                    <option value="">Select a Project</option>
                    @isset($projects)
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ str($project->name)->headline() }}</option>
                        @endforeach
                    @endisset
                </select>
                @error('project_id')
                    <p class="text-red-500 text-sm pt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-1/2">
                <label for="estimated" class="mb-2 block text-sm">
                    Estimated Time
                    <span class="text-xs text-gray-500 font-semibold">(In Minutes)</span>
                </label>
                <input
                    type="number"
                    id="estimated"
                    min="1"
                    class="form-input rounded-lg w-full border-gray-300 text-gray-700"
                    wire:model.defer="task.estimated"
                />
                @error('estimated')
                    <p class="text-red-500 text-sm pt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-4">
            <label for="description" class="mb-2 block text-sm">Description</label>
            <textarea
                id="description"
                class="form-textarea rounded-lg w-full border-gray-300 text-sm text-gray-700"
                wire:model.defer="task.description"
            ></textarea>
            @error('description')
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
        </button>
        <button
            type="button"
            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
            @click="showAddTask = false"
        >
            Cancel
        </button>
    </div>
</form>
