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
                x-cloak
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
    <div class="p-6" x-show="dateFilter" x-transition.height x-cloak>
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