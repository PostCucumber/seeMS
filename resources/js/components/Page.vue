<template>
    <div>
        <!-- <component is="search-box"/> -->
        <!-- <component is="columns"/> -->
        <component v-for="i in componentCount" v-bind:key="i" :is="components[i-1]" />
        <!-- <component :is="components[0]"></component> -->
        <!-- <component :is="components[1]"></component> -->
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
            componentCount: Number
        }
    }
</script>
