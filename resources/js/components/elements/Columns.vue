<template>
    <div class="flex flex-wrap w-full">
        <div class="w-full md:w-1/2 lg:w-1/4">
            <div class="flex items-center justify-center border rounded">
                <h2>Column 1</h2>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4">
            <div class="flex items-center justify-center border rounded">
                <h2>Column 2</h2>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4">
            <div class="flex items-center justify-center border rounded">
                <h2>Column 3</h2>
            </div>
        </div>
        <div class="w-full md:w-1/2 lg:w-1/4">
            <div class="flex items-center justify-center border rounded">
                <h2>Column 4</h2>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
        },
        mounted() {
            console.log('Columns component mounted.')
        },
    }
</script>
