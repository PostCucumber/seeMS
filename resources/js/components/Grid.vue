<template>
    <div class="flex flex-wrap items-start w-full">
        <button @click="toggleFocus(index)" v-for="(box, index) in 120" v-bind:key="index" :id="index" class="xl:w-1/12 lg:w-1/6 md:w-1/4 w-1/2 h-32 border-r border-b hover:bg-gray-500 focus:bg-gray-500 focus:outline-none cursor-pointer"></button>
    </div>
</template>

<script>

    export default {
        mounted() {
            console.log('Grid component mounted.')
        },
        components: {
        },
        data: function() {
            return {
            };
        },
        methods: {
            toggleFocus: function ($id) {
                console.log("toggling focus");
                document.getElementById($id).classList.add("bg-gray-500");
            }
        },
        props: {
        }
    }
</script>