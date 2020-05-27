<template>
    <div>
        <component v-for="(component, index) in components" v-bind:key="index" :is="components[index]" />
    </div>
</template>

<script>
    import columns from './elements/Columns'
    import SearchBox from './elements/SearchBox'
    import navigation from './elements/Navigation'

    export default {
        mounted() {
            console.log('Page component mounted.')
        },
        components: {
            columns,
            SearchBox,
            navigation 
        },
        data: function() {
            return {
            };
        },
        props: {
            components: Array
        }
    }
</script>
