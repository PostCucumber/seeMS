<template>
    <div class="flex">
        <div class="w-full flex flex-wrap items-center h-screen text-center mx-auto">
            <div class="w-full">
                <h1 class="w-full">Click to add element</h1>
                <form method="/element/add" action="POST">
                    <button class="flex items-center justify-center text-gray-400 hover:text-gray-800 hover:border-gray-800 pb-4 mt-4 w-16 h-16 text-6xl border rounded-lg mx-auto">
                        +
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
