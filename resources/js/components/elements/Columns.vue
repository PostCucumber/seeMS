<template>
    <div class="flex flex-wrap w-full">
        <div class="w-full md:w-1/2 lg:w-1/4">
            <div class="flex items-center justify-center border rounded">
                <slot name="column1"></slot>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4">
            <div class="flex items-center justify-center border rounded">
                <slot name="column2"></slot>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4">
            <div class="flex items-center justify-center border rounded">
                <slot name="column3"></slot>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4">
            <div class="flex items-center justify-center border rounded">
                <slot name="column4"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Columns component mounted.')
        },
    }
</script>
