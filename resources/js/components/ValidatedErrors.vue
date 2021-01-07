<template>
    <div>
        <div class="alert alert-danger" v-if="errorsMeeting.length !== 0">
            <ul v-for="(arr, index) in errorsMeeting" :key="index">
                <li v-for="(error, index) in arr" :key="index">
                    {{ error }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['errorsMeeting'],
        mounted() {
            console.log('Component mounted.');
        },
        data: function() {
            return {
            }
        },
        methods: {
        }
    }
</script>