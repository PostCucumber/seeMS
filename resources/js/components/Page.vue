<template>
    <div>
        <component v-for="(component, index) in components" v-bind:key="index" :is="components[index]" />
    </div>
</template>

<script>
    import columns from './Columns'
    import SearchBox from './SearchBox'

    export default {
        mounted() {
            console.log('Page component mounted.')
        },
        components: {
            columns,
            SearchBox 
        },
        data: function() {
            return {
                components: ['columns', 'search-box']
            };
        },
        props: {
            components: Array
        }
    }
</script>
