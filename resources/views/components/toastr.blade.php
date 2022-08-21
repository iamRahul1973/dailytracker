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