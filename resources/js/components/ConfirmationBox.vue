<template>
    <div class="absolute z-50 flex items-center justify-center mx-auto">
        <div class="m-10 bg-white shadow rounded p-10">
            <p class="mb-4">Are you sure you want to do this?</p>
            <button @click="this.closeWindow" class="px-4 py-2 border rounded-full">No</button>
            <button @click="this.clearGrid" class="inline px-4 py-2 border rounded-full">Yes</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: [  
        ],
        mounted() {
            console.log('Confirmation Box component mounted.')
        },
        methods: {
            closeWindow: function () {
                this.$emit('closeConfirmation');
            },
            clearGrid: function () {
                this.$emit('clearGrid');
                this.$emit('closeConfirmation');
            }
        }
    }
</script>
