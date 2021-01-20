<template>
    <div>
        <admin-operations @pass-operations="onPassOperations"></admin-operations>    
        <hr>
        <insert-employee v-if="operationNumber == 1" :permissions="permissions" ></insert-employee></div>
</template>

<script>
    import AdminOperations from "./AdminOperations.vue"
    import InsertEmployee from "./InsertEmployee.vue"
    /*import ReportMeeting from "./ReportMeeting.vue"
    import ValidatedErrors from "./ValidatedErrors.vue"*/

    export default {
        components: {
            'admin-operations': AdminOperations,
            'insert-employee': InsertEmployee
            /*,
            'report-meeting': ReportMeeting,
            'validated-errors': ValidatedErrors*/
        },
        props: ['permissions'],
        mounted() {
            console.log('Component mounted.');
        },
        data: function() {
            return {
                operationNumber: 0
                //permissions: JSON.parse(this.permissions)
                /*displayTable: false,
                meetingsSelected: {},
                errorsMeeting: []*/
            }
        },
        methods: {
            onPassOperations(value) {
                //console.log(value) 
                alert(value);
                this.operationNumber = value;
            }/*
            onPassErrors(value) {
                console.log('errors passed');
                const values = Object.values(value);
                this.errorsMeeting = values;
            }*/
        }
    }
</script>