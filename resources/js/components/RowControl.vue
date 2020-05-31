<template>
    <div class="w-full flex flex-wrap justify-center mx-auto pt-10">
        <h2 class="text-center w-full">Rows</h2>
        <button @click="addRow()" class="w-20 mr-2 flex items-center justify-center text-gray-400 hover:text-gray-800 hover:border-gray-800 focus:outline-none pb-4 mt-4 w-16 h-16 border rounded-lg">
            +
        </button>           
        <button @click="removeRow()" class="w-20 ml-2 flex items-center justify-center text-gray-400 hover:text-gray-800 hover:border-gray-800 focus:outline-none pb-4 mt-4 w-16 h-16 border rounded-lg" :disabled="rowCount < 1">
            –
        </button>
    </div>
</template>

<script>
    export default {
        props: [  
            'rowCount'
        ],
        methods: {
            addRow: function () {
                this.$emit('addRow');
            },
            removeRow: function () {
                this.$emit('removeRow');
            }
        },
        mounted() {
            console.log('Row Control component mounted.')
        },
    }
</script>
