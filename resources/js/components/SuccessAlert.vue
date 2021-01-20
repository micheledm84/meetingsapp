<template>
    <div>
        <div class="alert alert-success">{{ message_success }}</div>
    </div>
</template>

<script>

    export default {
        props: ['message_success'],

        mounted() {
            console.log('Component mounted.');
        },
        data: function() {
            return {
                //message_success: ''
            }
        },
        methods: {
        }
    }
</script>