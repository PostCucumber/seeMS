<template>
    <div>
        <columns></columns>
        <!-- <component v-for="i in components" v-bind:key="i" v-bind:is="components[i]"></component> -->
    </div>
</template>

<script>
import columns from './Columns';

    export default {
        props: {
            pickingElement: Boolean
        },
        mounted() {
            console.log('Component mounted.')
        },
        data: function() {
            return {
                components: ['columns']
            }
        }
    }
</script>
