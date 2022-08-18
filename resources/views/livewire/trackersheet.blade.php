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
            @forelse ($grouped as $day => $activities)
                <tr>
                    <th
                        colspan="8"
                        @class([
                            'text-left',
                            'pb-4' => $loop->first,
                            'py-4' => ! $loop->first
                        ])
                    >
                        <span class="bg-orange-500 text-white px-3 py-2 rounded-lg">{{ $day }}</span>
                    </th>
                </tr>

                @foreach ($activities as $activity)
                    <tr class="bg-white shadow-md">
                        <td class="px-4 py-2 text-left">
                            {{ str($activity->task->project->name)->title() }}
                        </td>
                        <td class="px-4 py-2 text-left">
                            <img src="{{ $activity->task->project->manager->gravatar() }}" alt="avatar" class="rounded-full w-10">
                        </td>
                        <td class="px-4 py-2 text-left">
                            {{ str($activity->task->name)->title() }}
                        </td>
                        <td class="px-4 py-2 text-left">
                            <img src="{{ $activity->assignedTo->gravatar() }}" alt="avatar" class="mr-2 rounded-full w-10">
                        </td>
                        <td class="px-4 py-2 text-left">
                            {{ minutesToHours($activity->task->estimated) }}
                        </td>
                        <td class="px-4 py-2 text-left">
                            {{ $activity->task->time_taken ? minutesToHours($activity->task->time_taken) : '-' }}
                        </td>
                        <td class="px-4 py-2 text-left">
                            <span class="{{ \App\Models\Progress::getClass($activity->status) }} text-white px-2 py-1 rounded-md font-semibold text-xs">
                                {{ str($activity->status)->headline() }}
                            </span>
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
                @endforeach

            @empty
                <h4>Sorry, There is nothing to show here !</h4>
            @endforelse
        </tbody>
    </table>
</div>